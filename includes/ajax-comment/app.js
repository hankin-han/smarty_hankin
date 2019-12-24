$(document).ready(function() {
	var __cancel = $('#cancel-comment-reply-link'),
		__cancel_text = __cancel.text(),
		__list = 'comment-list';//your comment wrapprer
	$(document).on("submit", "#commentform", function() {
		$.ajax({
			url: ajaxcomment.ajax_url,
			data: $(this).serialize() + "&action=ajax_comment",
			type: $(this).attr('method'),
			beforeSend: faAjax.createButterbar("提交中...."),
			error: function(request) {
				var t = faAjax;
				t.createButterbar(request.responseText);
			},
			success: function(data) {
				faAjax.createButterbar("提交成功"),
				$('textarea').each(function() {
					this.value = ''
				});
				var t = faAjax,
					cancel = t.I('cancel-comment-reply-link'),
					temp = t.I('wp-temp-form-div'),
					respond = t.I(t.respondId),
					post = t.I('comment_post_ID').value,
					parent = t.I('comment_parent').value;
				if (parent != '0') {
					$('#respond').before('<ol class="children">' + data + '</ol>');
				} else if (!$('.' + __list ).length) {
					if (ajaxcomment.formpostion == 'bottom') {
						$('#respond').before('<ol class="' + __list + '">' + data + '</ol>');
					} else {
						$('#respond').after('<ol class="' + __list + '">' + data + '</ol>');
					}

				} else {
					if (ajaxcomment.order == 'asc') {
						$('.' + __list ).append(data); // your comments wrapper
					} else {
						$('.' + __list ).prepend(data); // your comments wrapper
					}
				}
				t.createButterbar("提交成功");
				cancel.style.display = 'none';
				cancel.onclick = null;
				t.I('comment_parent').value = '0';
				if (temp && respond) {
					temp.parentNode.insertBefore(respond, temp);
					temp.parentNode.removeChild(temp)
				}
			}
		});
		return false;
	});
	faAjax = {
		I: function(e) {
			return document.getElementById(e);
		},
		clearButterbar: function(e) {
			if ($(".butterBar").length > 0) {
				$(".butterBar").remove();
			}
		},
		createButterbar: function(message) {
			var t = this;
			t.clearButterbar();
			$("body").append('<div class="butterBar butterBar--center"><p class="butterBar-message">' + message + '</p></div>');
			setTimeout("$('.butterBar').remove()", 3000);
		}
	};
});

$(document).ready(function() { 
	$.fn.postLike = function() {
	 if ($(this).hasClass('current')) {
	 	faAjax.createButterbar("已经点过赞了");
	 	return false;
	 } else {
		 $(this).addClass('current');
		 var id = $(this).data("id"),
		 action = $(this).data('action'),
		 rateHolder = $(this).children('.like-count');
		 var ajax_data = {
			 action: "hankin_like",
			 um_id: id,
			 um_action: action
	 	};
	 $.post("/wp-admin/admin-ajax.php", ajax_data,
	 function(data) {
	 	faAjax.createButterbar("谢谢点赞");
	 	$(rateHolder).html(data);
	 });
	 	return false;
	 }
	};
	$(document).on("click", ".btn-link-like,.btn-link-like2",function() {
	 	$(this).postLike();
	});
});

