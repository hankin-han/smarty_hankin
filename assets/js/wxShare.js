wx.config({
    debug: false,
    appId: window.APPID,
    timestamp: window.TIMESTAMP,
    nonceStr: window.NONCESTR,
    signature: window.SIGNATURE,
    jsApiList: [
    	'updateAppMessageShareData',
    	'updateTimelineShareData',
        'onMenuShareQZone',
        'onMenuShareWeibo',
        'chooseImage', 'uploadImage', 'previewImage'
    ]
});
 wx.ready(function() {
    console.dir(wxConfig);
    //分享给朋友 、分享到QQ
    wx.updateAppMessageShareData({
        title: wxConfig.title,
        desc:  wxConfig.desc,
        link:  wxConfig.link,
        imgUrl: wxConfig.imgUrl,
        success: function () {},
        cancel: function () {}
    });

    //分享到朋友圈 、分享到QQ空间
    wx.updateTimelineShareData({
        title: wxConfig.title,
        desc:  wxConfig.desc,
        link:  wxConfig.link,
        imgUrl: wxConfig.imgUrl,
        success: function () {},
        cancel: function () {}
    });

    //分享到腾讯微博
    wx.onMenuShareQZone({
        title: wxConfig.title,
        desc:  wxConfig.desc,
        link:  wxConfig.link,
        imgUrl: wxConfig.imgUrl,
        success: function () {},
        cancel: function () {}
    });
    //分享到腾讯微博
    wx.onMenuShareWeibo({
        title: wxConfig.title,
        desc:  wxConfig.desc,
        link:  wxConfig.link,
        imgUrl: wxConfig.imgUrl,
        success: function () {},
        cancel: function () {}
    });
});

wx.error(function(res){
    // config信息验证失败会执行error函数，如签名过期导致验证失败，具体错误信息可以打开config的debug模式查看，也可以在返回的res参数中查看，对于SPA可以在这里更新签名。
    console.log(res);
});