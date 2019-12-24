<?php 
$i_dashang_check = cs_get_option('i_dashang_check');//打赏功能
$i_dashang_weixin = cs_get_option('i_dashang_weixin');//打赏微信
$i_dashang_zhifubao = cs_get_option('i_dashang_zhifubao');//打赏支付宝

?>
<?php if($i_dashang_check):?>
<div class="modal fade bd-example-modal-lg" id="gratuityModal" tabindex="-1" role="dialog" aria-labelledby="gratuityModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="gratuityModalLabel">赞赏作者</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body p-0">
        <div class="qr_pay">
          <?php if($i_dashang_zhifubao):?>
              <img src="<?= $i_dashang_zhifubao?>" class="qr_pay_alipay" style="display: block;">
           <?php endif;?>
            <?php if($i_dashang_weixin):?>
              <img src="<?= $i_dashang_weixin?>" class="qr_pay_wechatpay" style="display: none;">
           <?php endif;?>
        </div>
      </div>
      <div class="modal-footer">
        <p class="text-center text-muted">请通过微信、支付宝 APP 扫一扫 </p>
        <p class="text-center text-muted">感谢您对作者的支持！</p>
        <p class="text-center text-muted"> 
          <a class="btn btn-primary btn-like btn-link-like2" href="javascript:void(0);" id="qr_pay_alipay_click">&nbsp;支付宝</a>
          <a class="btn btn-success mt-3 mb-3" href="javascript:void(0);" id="qr_pay_wechatpay_click">微信支付</a>
        </p>
      </div>
    </div>
  </div>
</div>
<script type="text/javascript">
  $("#qr_pay_alipay_click").click(function(){
        $(".qr_pay_wechatpay").hide();
      $(".qr_pay_alipay").css({"display":"block"});
  });
  $("#qr_pay_wechatpay_click").click(function(){
      $(".qr_pay_wechatpay").css({"display":"block"});
      $(".qr_pay_alipay").hide();
  });
</script>
<?php endif;?>