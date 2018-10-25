
if(login == 1){
	var OneSignal = window.OneSignal || [];
	OneSignal.push(function() {
		OneSignal.init({
			allowLocalhostAsSecureOrigin: true,
			appId: "2a08ec9b-9ff2-41ba-87ea-4997b2698b14",
			autoRegister: false,
			notifyButton: {
				enable: false
			},
			httpPermissionRequest: {
				enable: true
			},
			welcomeNotification: {
				title: 'TruyenQQ.Com',
				message: 'Cảm ơn bạn đã đăng ký!'
			},
			promptOptions: {
				siteName: 'TruyenQQ.Com',
				actionMessage: 'Bạn có muốn nhận thông báo khi có chương mới không?',
				exampleNotificationTitle: 'Thông báo mẫu',
				exampleNotificationMessage: 'Ví dụ cách thông báo sẽ hiển thị',
				exampleNotificationCaption: 'Bạn có thể dừng nhận thông báo bất kỳ lúc nào',
				acceptButtonText: 'Có',
				cancelButtonText: 'Không'
			}
		});

		var isPushSupported = OneSignal.isPushNotificationsSupported();
		if (isPushSupported) {
			OneSignal.getUserId().then(function (userId) {
				if (userId != null) {
					console.log(userId);
					OneSignal.setSubscription(true);
					var myDate = new Date();
					myDate.setDate(myDate.getDate() + 1);
					document.cookie = "web_player_new=" + userId + ";expires=" + myDate + ";domain=.truyenqq.com;path=/";
					OneSignal.sendTag("user_id", user_id);
					OneSignal.sendTag("device", "pc");
				}
			});
		}
	});
}