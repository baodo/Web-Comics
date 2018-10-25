document.onkeydown = function(evt) {
	if (
		!$(event.target).closest('.search_info').length && !$(event.target).closest('#text-search').length
		&& !$(event.target).closest('.comments-container textarea').length
	) {
		evt = evt || window.event;
		switch (evt.keyCode) {
			case 37:
				var linkPrev = $('.link-prev-chap').attr('href');
				if(typeof linkPrev != 'undefined') {
					window.location = linkPrev;
				}
				break;
			case 39:
				var linkNext = $('.link-next-chap').attr('href');
				if(typeof linkNext != 'undefined'){
					window.location = linkNext;
				}
				break;
			case 65:
				var linkPrev = $('.link-prev-chap').attr('href');
				if(typeof linkPrev != 'undefined') {
					window.location = linkPrev;
				}
				break;
			case 68:
				var linkNext = $('.link-next-chap').attr('href');
				if(typeof linkNext != 'undefined'){
					window.location = linkNext;
				}
				break;
		}
	};

};
function insertAtCaret(areaId, text) {
	var txtarea = document.getElementById(areaId);
	if (!txtarea) {
		return;
	}

	var scrollPos = txtarea.scrollTop;
	var strPos = 0;
	var br = ((txtarea.selectionStart || txtarea.selectionStart == '0') ?
		"ff" : (document.selection ? "ie" : false));
	if (br == "ie") {
		txtarea.focus();
		var range = document.selection.createRange();
		range.moveStart('character', -txtarea.value.length);
		strPos = range.text.length;
	} else if (br == "ff") {
		strPos = txtarea.selectionStart;
	}

	var front = (txtarea.value).substring(0, strPos);
	var back = (txtarea.value).substring(strPos, txtarea.value.length);
	txtarea.value = front + text + back;
	strPos = strPos + text.length;
	if (br == "ie") {
		txtarea.focus();
		var ieRange = document.selection.createRange();
		ieRange.moveStart('character', -txtarea.value.length);
		ieRange.moveStart('character', strPos);
		ieRange.moveEnd('character', 0);
		ieRange.select();
	} else if (br == "ff") {
		txtarea.selectionStart = strPos;
		txtarea.selectionEnd = strPos;
		txtarea.focus();
	}

	txtarea.scrollTop = scrollPos;
}

$(document).ready(function(){
	$('.menu-fixed').scrollToFixed();
	$("[data-toggle=tooltip]").tooltip();

	$(document).on("click", '.comments-container textarea', function (event) {
		if(login == 1) {
			$('#id_textarea').val($(this).prop('id'));
		}else{
			loadLogin();
		}
	});

	$(document).on("click", '.comments-container .click_emoji', function (event) {
		if(login == 1) {
			$('#list_emoji').modal('show');
			var id = $(this).parent().parent().parent().find('textarea').prop('id');
			$('#id_textarea').val(id);
		}else{
			loadLogin();
		}
	});

	$(document).on("click", '.comment-head .reply', function (event) {
		if(login == 1) {
			var id = $(this).data('id');
			if($('.comments-container').find('.reply_' + id).length == 0){
				var user = $(this).data('user');
				var element = $($('.main_comment').clone()).insertAfter($(this).parent().parent().parent().parent());
				element.removeClass('main_comment');
				element.addClass('reply_comment').find('.widget-area').removeClass('widget-area').addClass('widget-area-reply');
				element.find('textarea').attr('id', 'content_comment_' + id).val("").focus();
				element.find('textarea').attr('data-id', id);
				element.find('textarea').attr('data-user', user);
				element.addClass('reply_' + id);
			}
		}else{
			loadLogin();
		}
	});

	$(document).on("click", '.comment-head .remove_comnent', function (event) {
		var id = $(this).data('id');
		var book_id = $('#book_id').val();
		var result = confirm("Bạn có chắc muốn xoá comment này không?");
		var that = $(this);
		if(book_id == ""){
			book_id = $(this).data('bookid');
		}
		if (result == true) {
			$.ajax({
				method: "POST",
				url: urlCommentRemove,
				data: {id: id, book_id: book_id}
			}).done(function (data) {
				that.parent().parent().parent().parent().remove();
				$('.comments-list .parent_' + id).remove();
			});
		}
	});

	$(document).on("click", '.comment-head .bannick_comnent', function (event) {
		var id = $(this).data('id');
		var result = confirm("Bạn có chắc muốn xoá Cấm Bình Luận thành viên này không?");
		var that = $(this);
		if (result == true) {
			$.ajax({
				method: "POST",
				url: urlCommentBannick,
				data: {id: id}
			}).done(function (data) {
			});
		}
	});

	$(document).on("click", '#list_emoji .emoji_comment', function (event) {
		if(login == 1) {
			var code = $(this).data("code");
			insertAtCaret($('#id_textarea').val(), code);
		}else{
			loadLogin();
		}
	});

	$(document).on("click", '.submit_comment', function (event) {
		if(login == 1) {
			var content = $(this).parent().find('textarea').val();
			var parrent = $(this).parent().find('textarea').data("id");
			var user = $(this).parent().find('textarea').data("user");
			var book_id = $('#book_id').val();
			var episode_name = $('#episode_name').val();
			var episode_id = $('#episode_id').val();
			var slug = $('#slug').val();
			var data = {slug: slug, content: content, book_id: book_id, episode_name: episode_name, episode_id: episode_id};
			var that = $(this);
			if(typeof parrent != undefined){
				data.parent_id = parrent;
			}
			if(typeof user != undefined){
				data.user = user;
			}
			if(content == ""){
				alert("Vui lòng nhập nội dung bình luận.");
			}else{
				$.ajax({
					method: "POST",
					url: urlComment,
					data: data
				}).done(function (html) {
					if(typeof parrent != 'undefined'){
						$('.child_' + parrent).append(html);
						that.parent().parent().parent().parent().remove();
					}else{
						$('.comments-list').prepend(html);
						that.parent().find('textarea').val("");
					}
					$('.comment-content').readmore({
						maxHeight: 105,
						speed: 100,
						moreLink: '<p class="readmore"><a href="#">Xem Thêm</a></p>',
						lessLink: '<p class="readmore"><a href="#">Rút Gọn</a></p>',
						embedCSS: true,
						sectionCSS: 'display: block; width: 100%;',
						startOpen: false,
						expandedClass: 'readmore-js-expanded',
						collapsedClass: 'readmore-js-collapsed'
					});
				});
			}
		}else{
			loadLogin();
		}
	});

	var loadmore = 0;
	$(document).on("click", '.load_more_comment', function (event) {
		var book_id = $('#book_id').val();
		var total_page = $('#total_page').val();
		var current_page = $('#current_page').val();
		var page_new = parseFloat(current_page) + 1;
		if(parseFloat(current_page) <= parseFloat(total_page)){
			loadmore = 1;
			$('.load_more_comment').text("Đang tải thêm bình luận....");
			$.ajax({
				method: "POST",
				url: urlCommentLoad,
				data: {book_id: book_id, page: page_new}
			}).done(function (html) {
				$(".comments-list").append(html);
				loadmore = 0;
				if(page_new < total_page){
					$('#current_page').val(page_new);
				}else{
					$('.load_more_comment').hide();
				}
				$('.load_more_comment').text("Tải Thêm Bình Luận");
				$('.comment-content').readmore({
					maxHeight: 105,
					speed: 100,
					moreLink: '<p class="readmore"><a href="#">Xem Thêm</a></p>',
					lessLink: '<p class="readmore"><a href="#">Rút Gọn</a></p>',
					embedCSS: true,
					sectionCSS: 'display: block; width: 100%;',
					startOpen: false,
					expandedClass: 'readmore-js-expanded',
					collapsedClass: 'readmore-js-collapsed'
				});
			});
		}
	});

	(function blink() {
		$('.blink-text').fadeOut(500).fadeIn(500, blink);
	})();
	$('.content').addClass($('#oldClass').val());
	if($('#oldClass').val() == 'classColor2'){
		$('body').css('background', '#5a5a5a');
	}else{
		$('body').css('background', '');
	}

	if (window.location.hash == '#_=_'){
		if (history.replaceState) {
			var cleanHref = window.location.href.split('#')[0];
			history.replaceState(null, null, cleanHref);
		} else {
			window.location.hash = '';
		}
	}
	$('.list_book_p02 #type_order').change(function(){
		$('#form_order').submit();
	});
	$('#btn_filter_category').click(function(){
		$("#list_filter_category").toggle();
	});
	$('body').click(function(event) {
		if (!$(event.target).closest('.search_info').length && !$(event.target).closest('#text-search').length) {
			$('.search_info').hide();
		};

		if (!$(event.target).closest('.dtl_edit_info').length && !$(event.target).closest('#settingText').length) {
			$('.dtl_edit_info').hide();
		};
		if (!$(event.target).closest('#list_filter_category').length && !$(event.target).closest('#btn_filter_category').length) {
			$('#list_filter_category').hide();
		};
	});

	//$('.audio_height').mCustomScrollbar({theme:"dark"});
	var autocomplete = null;
	$("#text-search").bind( "keyup", function( event ) {
		var key = event.keyCode;
		if (key != 38 && key != 40 && key != 37 && key != 39 && key != 13) {
			if($('#text-search').val().trim().length > 0){
				clearTimeout(autocomplete);
				autocomplete = setTimeout(function(){
					$.ajax({
						type: "POST",
						url: urlSearch,
						data: { search: $('#text-search').val()}
					}).done(function( msg ) {
						$('.search_info').show();
						$('.search_info').html(msg);
						$('.search_info').mCustomScrollbar({theme:"dark"});
					});
				}, 500);
			}else{
				$('.search_info').hide();
			}
		}else if($('#text-search').val().trim().length > 0 && $('#text-search').is(":focus") == true && key == 13 && $('.search_txt a.active').length == 0) {
			var text = $( "#text-search" ).val();
			window.location.href = document.location.origin + "/tim-kiem.html?q=" + text;
		}
	});

	$('#text-search').click(function(){
		if($('#text-search').val() != '' && $('.search_info').is(':hidden') == true){
			$.ajax({
				type: "POST",
				url: urlSearch,
				data: { search: $('#text-search').val()}
			}).done(function( msg ) {
				$('.search_info').show();
				$('.search_info').html(msg);
				$('.search_info').mCustomScrollbar({theme:"dark"});
			});
		}
	});
	$("#btn_search").click(function() {
		var text = $( "#text-search" ).val();
		if (text != ""){
			window.location.href = document.location.origin + "/tim-kiem.html?q=" + text;
		}
	});
	$(this).keyup(function(e){
		var key = e.keyCode;

		if (key === 38 || key === 40) {
			var items = $('.search_txt >a');
			var num = items.length;
			if (num === 0) {
				return;
			}

			var selected = $('.search_txt >a.active');
			var select = null;
			var first_item = $('.search_txt >a:first-child');
			var last_item = $('.search_txt >a:last-child');

			if (selected.length === 0) {
				if (key === 38) {
					select = last_item;
				} else if(key === 40) {
					select = first_item;
				}
			} else {
				var idx = selected.index(items);

				if (key === 38) {
					if (idx === 0) {
						select = last_item;
					} else {
						select = selected.prev();
					}
				} else if (key === 40) {
					if (idx >= (num-1)) {
						select = first_item;
					} else {
						select = selected.next();
					}
				}
			}

			if (select !== null) {
				items.removeClass('active');
				select.addClass('active');
				$(".search_info").mCustomScrollbar("scrollTo", '.search_txt a.active', {scrollInertia: 50});
			}
		} else if (key === 13) {
			if ($('.search_info').is(":visible")) {
				e.preventDefault();
				var selected = $('.search_txt a.active');
				if (selected.length === 1) {
					window.location.href = selected.attr('href');
				}
			}
		}
	});


	$('.notifCentered >p').on('click', function(){
		$(this).siblings('p').removeClass('open');

		if ($(this).hasClass('open')) {
			$(this).removeClass('open');
		} else {
			$(this).addClass('open');
			if($(this).data('id') == 'notification' && $('#id_notification').val() != ''){
				$.ajax({
					type: 'POST',
					cache: false,
					url: urlNotification,
					cache: false,
					data: {id: $('#id_notification').val()},
					success: function(data){
						if((parseFloat($('#total_notification').text()) - parseFloat($('#id_notification').data('totalnotification'))) == 0){
							$('#total_notification').remove();
						}else{
							$('#total_notification').text((parseFloat($('#total_notification').text()) - parseFloat($('#id_notification').data('totalnotification'))));
						}
						$('#id_notification').val('');
					}
				});
			}
		}
		OneSignal.isPushNotificationsEnabled(function (isEnabled) {
			if(!isEnabled){
				$('#notification_modal').modal('show');
			}
		});
	});

	$(this).on('click', function(e){
		var o = e.toElement ? $(e.toElement) : $(e.target);
		var outside = (o.closest('.notifCentered >div').length === 0);
		var isClick = (o.closest('.notifCentered >p').length === 1);

		if (outside === true && isClick === false) {
			$('.notifCentered >p').removeClass('open');
		}
	});
	if(device == 0){
		/* Show tooltip when hover on item */
		$('.ind_info >div >a').popover({
			placement: 'right',
			trigger: 'manual',
			html: true,
			content: function() {
				return $(this).parent().parent().prev('div').html();
			},
			selector: true
		}).on('mouseenter', function () {
			$('.ind_info >div >a').not(this).popover('hide');

			var _this = this;
			$(this).popover('show');
			$(this).siblings('.popover').on('mouseleave', function () {
				$(_this).popover('hide');
			});
		}).on('mouseleave', function () {
			var _this = this;
			setTimeout(function () {
				if (!$('.popover:hover').length) {
					$(_this).popover('hide');
				}
			}, 50);
		}).on('hide.bs.popover', function(e,x) {
			var popoverID = $(this).attr('aria-describedby');
			var content = $('#' + popoverID + ' .popover-content').html();
			$(this).parent().parent().prev('div').html(content);
		});
	}
	$('.carousel1').carousel({
		interval: 2000
	});
	
	$(document).on('click', ".request-notification", function() {
		$('#notification_modal').modal('hide');
		OneSignal.registerForPushNotifications({
			modalPrompt: true
		});
	});

	$(document).on('click', ".subscribeBook", function() {
		var selector = $(this);
		if(login == 1){
			var isPushSupported = OneSignal.isPushNotificationsSupported();
			if (isPushSupported) {
				OneSignal.isPushNotificationsEnabled(function (isEnabled) {
					if(isEnabled){
						var id = selector.data('id');
						$.ajax({
							url: urlSubcribe,
							type: "POST",
							data: {id: id},
							success: function (data) {
								if (data != '') {
									if (data == 0) {
										selector.html('<span class="glyphicon glyphicon-record"></span>Theo Dõi');
									} else {
										selector.html('<span class="glyphicon glyphicon-record"></span>Huỷ Theo Dõi');
									}
								}
							}

						});
					}else{
						$('#notification_modal').modal('show');
					}
				});
			}else{
				alert("Trình duyệt của bạn đang sử dụng không hỗ trợ tính năng này.")
			}
		}else{
			loadLogin();
		}
	});

	$(document).on('click', ".bookmarkBook", function() {
		if(login == 1){
			var selector = $(this);
			$.ajax({
				url: urlBookmark,
				type: "POST",
				data: {id: selector.data('id')},
				success: function(data){
					if(data != ''){
						if(data == 0){
							selector.html('<span class="glyphicon glyphicon-bookmark"></span>Đánh Dấu');
						}else{
							selector.html('<span class="glyphicon glyphicon-bookmark"></span>Huỷ Đánh Dấu');
						}
					}
				}
			});
		}else{
			loadLogin();
		}
	});
	var runlike = 0;
	$(document).on('click', ".like, .dislike", function() {
		if(login == 1){
			if(runlike == 0){
				runlike = 1;
				var selector = $(this);
				if(selector.children().hasClass("glyphicon-thumbs-up") == true){
					type = 1;
				}else{
					type = 0;
				}

				$.ajax({
					url: urlLike,
					type: "POST",
					data: {id: selector.data('id'), type: type},
					success: function(data){
						if(data != ''){
							data = $.parseJSON(data);
							if(data['status'] == 0){
								if(data['data']['status'] == 0){
									alert('Bạn đã nhấn "Không Thích" truyện này rồi!');
								}else{
									alert('Bạn đã nhấn "Thích" truyện này rồi!');
								}
							}else{
								if(data['data']['typeOld'] == 1){
									if(data['data']['status'] == 1){
										selector.html('<span class="glyphicon glyphicon-thumbs-up like_active"></span><span class="total_like">' + (parseFloat(selector.children('.total_like').text()) + 1) + '</span>');
									}else if(data['data']['status'] == 0){
										selector.html('<span class="glyphicon glyphicon-thumbs-down dislike_active"></span><span class="total_dislike">' + (parseFloat(selector.children('.total_dislike').text()) + 1) + '</span>');
									}
								}else{
									if(data['data']['status'] == 1){
										selector.html('<span class="glyphicon glyphicon-thumbs-up like_active"></span><span class="total_like">' + (parseFloat(selector.children('.total_like').text()) + 1) + '</span>');
										selector.parent().find('.dislike').html('<span class="glyphicon glyphicon-thumbs-down"></span><span class="total_dislike">' + (parseFloat(selector.parent().find('.total_dislike').text()) - 1) + '</span>');
									}else if(data['data']['status'] == 0){
										selector.parent().find('.like').html('<span class="glyphicon glyphicon-thumbs-up"></span><span class="total_like">' + (parseFloat(selector.parent().find(".total_like").text()) - 1) + '</span>');
										selector.html('<span class="glyphicon glyphicon-thumbs-down dislike_active"></span><span class="total_dislike">' + (parseFloat(selector.children('.total_dislike').text()) + 1) + '</span>');
									}
								}
							}
						}
						runlike = 0;
					}
				});
			}
		}else{
			loadLogin();
		}
	});

	$('#button_login').click(function(){
		$.ajax({
			type: 'POST',
			cache: false,
			url: urlLogin,
			cache: false,
			data: {email: $('#email_login').val(),  password: $('#password_login').val(), expire: ($("#expire").is(':checked') ? 1 : 0)},
			success: function(data){
				if(data != ''){
					data = $.parseJSON(data);
					$('.login_input p.error').remove();
					for (key in data['error']) {
						if(key == 'email'){
							$('#email_login').after('<p class="error">' + data['error'][key] + '</p>');
						} else if(key == 'password'){
							$('#password_login').after('<p class="error">' + data['error'][key] + '</p>');
						}
					}
				}else{
					location.reload(true);
				}
			}
		});
	});

	$("#loginModal").keypress(function (e) {
		if ((e.keyCode == 13) && ($('#email_login, #password_login').is(':focus'))) {
			e.preventDefault();
			$.ajax({
				type: 'POST',
				cache: false,
				url: urlLogin,
				cache: false,
				data: {email: $('#email_login').val(),  password: $('#password_login').val(), expire: ($("#expire").is(':checked') ? 1 : 0)},
				success: function(data){
					if(data != ''){
						data = $.parseJSON(data);
						$('.login_input p.error').remove();
						for (key in data['error']) {
							if(key == 'email'){
								$('#email_login').after('<p class="error">' + data['error'][key] + '</p>');
							} else if(key == 'password'){
								$('#password_login').after('<p class="error">' + data['error'][key] + '</p>');
							}
						}
					}else{
						location.reload(true);
					}
				}
			});
		}
	});

	$('.description-book').readmore({
		maxHeight: 105,
		speed: 100,
		moreLink: '<p class="readmore"><a href="#">Xem Thêm</a></p>',
		lessLink: '<p class="readmore"><a href="#">Rút Gọn</a></p>',
		embedCSS: true,
		sectionCSS: 'display: block; width: 100%;',
		startOpen: false,
		expandedClass: 'readmore-js-expanded',
		collapsedClass: 'readmore-js-collapsed'
	});

	$('.comment-content').readmore({
		maxHeight: 105,
		speed: 100,
		moreLink: '<p class="readmore"><a href="#">Xem Thêm</a></p>',
		lessLink: '<p class="readmore"><a href="#">Rút Gọn</a></p>',
		embedCSS: true,
		sectionCSS: 'display: block; width: 100%;',
		startOpen: false,
		expandedClass: 'readmore-js-expanded',
		collapsedClass: 'readmore-js-collapsed'
	});



	$(document).on('change', ".selectEpisode", function() {
		window.location.href = $(this).val();
	});
	$('.report_error').click(function(){
		$('#report_error').modal('show');
	});
	$('#typeError').on('change', function() {

		if($("#typeError").val() != '-1'){
			$("#contentError").prop('disabled', true);
		}else{
			$("#contentError").prop('disabled', false);
		}
	})
	$(document).on('click', "#report_error #submit_error", function(e) {
		var contentError = $("#contentError").val();
		var typeError = $("#typeError").val();
		var captcha = $("#captcha").val();

		var order = $("#order").val();
		var book_id = $("#book_id").val();
		var idcaptcha = $("#idcaptcha").val();
		var episode_id = $("#episode_id").val();
		$('p.error').remove();
		$('div.form-group').removeClass('has-error');
		if(typeError == 0){
			$('#typeError').parents( "div.form-group" ).addClass('has-error');
			$('#typeError').after('<p class="error">Vui Lòng Chọn Loại Lỗi.</p>');
		}else if(typeError == '-1' && contentError.trim() == ''){
			$('#contentError').parents( "div.form-group" ).addClass('has-error');
			$('#contentError').after('<p class="error">Vui Lòng Nhập Nội Dung Báo Lỗi.</p>');
		}if(captcha.trim() == ''){
			$('#captcha').parents( "div.form-group" ).addClass('has-error');
			$('#captcha').after('<p class="error">Vui Lòng Nhập Mã Xác Nhận.</p>');
		}else{
			$.ajax({
				type: 'POST',
				cache: false,
				url: urlError,
				cache: false,
				data: { episode_id: episode_id, contentError: contentError, book_id: book_id, typeError: typeError, order:order, captcha:captcha, idcaptcha: idcaptcha},
				success: function(data){
					data = $.parseJSON(data);
					if(data['status'] == 0){
						for (var key in data['error']) {
							$('#' + key).parents( "div.form-group" ).addClass('has-error');
							$('#' + key).after('<p class="error">' + data['error'][key] + '</p>');
						}
					}else{
						$('.modal-backdrop').remove();
						$('#report_error').modal('hide');
						$('body').removeClass('modal-open');
						$('#report_error').remove();
						$('.report_error').attr("disabled", true);
						alert("Báo lỗi thành công. Cảm ơn bạn.");
					}
				}
			});
		}
	});

	$("#settingText").click(function() {
		$(".dtl_edit_info").toggle();
	});

	$("#fontText").change(function() {
		var font = $(this).val();
		$('.dtl_text').css("font-family", font);
		if(login == 1){
			$.ajax({
				type: 'POST',
				cache: false,
				url: urlSettingFont,
				cache: false,
				data: { font: font},
			});
		}else{
			var date = new Date();
			date.setTime(date.getTime() + (365 * 24 * 60 * 60 * 1000));
			var expires = "; expires=" + date.toGMTString();
			document.cookie = "font_text=" + font + expires + "; path=/";
		}
	});

	$("#sizeText").change(function() {
		var size = $(this).val();
		$('.dtl_text').css("font-size", size + "px");
		if(login == 1){
			$.ajax({
				type: 'POST',
				cache: false,
				url: urlSettingFont,
				cache: false,
				data: { size: size},
			});
		}else{
			var date = new Date();
			date.setTime(date.getTime() + (365 * 24 * 60 * 60 * 1000));
			var expires = "; expires=" + date.toGMTString();
			document.cookie = "size_text=" + size + expires + "; path=/";
		}
	});

	$("#backgroundText").change(function() {
		var backgroundID = $(this).val();
		var background = $(this).find(':selected').attr('data-color');
		if(background == 'classColor2'){
			$('body').css('background', '#5a5a5a');
		}else{
			$('body').css('background', '');
		}
		$('.content').removeClass($('#oldClass').val());
		$('.content').addClass(background);
		$('#oldClass').val(background);
		if(login == 1){
			$.ajax({
				type: 'POST',
				cache: false,
				url: urlSettingFont,
				cache: false,
				data: { backgroundID: backgroundID},
			});
		}else{
			var date = new Date();
			date.setTime(date.getTime() + (365 * 24 * 60 * 60 * 1000));
			var expires = "; expires=" + date.toGMTString();
			document.cookie = "backgound_text=" + backgroundID + expires + "; path=/";
		}
	});
	$('#list_filter_category a').click(function(){
		if($(this).hasClass('active') == true){
			$(this).removeClass('active');
		}else{
			$(this).addClass('active');
		}
	});

	/*$('a[data-toggle="dropdown"]').click(function(e){
		if ($(window).width() >= 768) {
			e.stopPropagation();
		}
	});*/

});

function loadLogin(){
	$('#loginModal').modal('show');
}

function layoutDdownloadEbook(){
	if(login == 1){
		$('#download-book').modal('show');
	}else{
		loadLogin();
	}
}

function downloadEbook(book, format){
	$('.down_content .down_func, .down_content .down_note').hide();
	$('.down_content .load-download').show();
	$.ajax({
		url: urlDownload,
		type: "Post",
		data:{book: book, format: format},
		success: function(data){
			$('.down_content .down_func, .down_content .down_note').show();
			$('.down_content .load-download').hide();
			$('#download-book').modal('hide');
			window.location.href = data;
		}
	});
}

function getCategoryFilter(page){
	var url = "/frontend/category/filter";
	if (!page){
		page = 1;
	}

	var arrayCategory = [];
	var arrayCountry = [];
	var arrayChar = [];
	var arrayPending = [];

	$("#list_filter_category ul li a.active").each(function(index, element) {
		if ($(this).data("category") != undefined){
			arrayCategory.push($(this).data("category"));
		}

		if ($(this).data("country") != undefined){
			arrayCountry.push($(this).data("country"));
		}

		if ($(this).data("char") != undefined){
			arrayChar.push($(this).data("char"));
		}

		if ($(this).data("pending") != undefined){
			arrayPending.push($(this).data("pending"));
		}
	});

	$.ajax({
		url: url,
		type: "Post",
		data:{
			arrayCountry: arrayCountry.join(','),
			arrayCategory: arrayCategory.join(','),
			arrayPending: arrayPending.join(','),
			arrayChar: arrayChar.join(','),
			page: page,
			type: $('#type_category').val(),
		},

		success: function(data){
			$('#content_category').html(data);
			$('#list_filter_category').hide();
		}
	});
}
function getPeople(page){
	var url = "/frontend/people/loadpage";
	$.ajax({
		url: url,
		type: "Post",
		data:{
			id: $('#id_people').val(),
			page: page,
			type: $('#type_people').val(),
		},
		success: function(data){
			$('#content_people #home').html(data);
		}
	});
}