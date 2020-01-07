var reg;
var sub;
var isSubscribed = false;
var isBlock = false;
var autoRegist = true;
var domainName = 'https://xosodaiphat.com';
//regist js file control notify
var isInit = false;
var OperatingSystem = getMobileOperatingSystem();
if (OperatingSystem == 'iOS') {
    if ($('#btntaiapp').length > 0) {
        $('#btntaiapp').attr("href", 'https://apps.apple.com/vn/app/xo-so-truc-tiep-xs-%C4%91%E1%BA%A1i-ph%C3%A1t/id1482591808?l=vi&amp;mt=8');
		$('#btntaiapp').attr("target", '');
    }
}
function firtInitialiseUI() {
    if (isInit === true) {
        return;
    }
    // Set the initial subscription value
    if (Notification.permission === 'denied') {
        isSubscribed = false;
        console.log('User is BLOCK Notify.');
        isBlock = true;
        return;
    }
    if (!reg) {
        console.log('reg is null.');
        $("#NotifyPannel").hide();// uncoment when public
        return;
    }
    reg.pushManager.getSubscription()
        .then(function (subscription) {
            isSubscribed = !(subscription === null);

            if (isSubscribed) {
                console.log('User IS subscribed.');
            } else {
                console.log('User is NOT subscribed.' + isSubscribed);
            }
            if (autoRegist && isSubscribed === false && localStorage.getItem("RegistNotify") !== "1" && sessionStorage.getItem("RegistNotify") !== "1") {
                console.log('Start subscribed.');
                subscribeNotify();
                //$("#NotifyRegistAds").show();
            }

        });

}
function initialiseUI() {
    if (isInit === true) {
        return;
    }
    isInit = true;
    // Set the initial subscription value
    if (Notification.permission === 'denied') {
        isSubscribed = false;
        $("#NotifyNote").html("Bạn đã khóa tính năng nhận thông báo mới từ xosodaiphat.com");
        $("#NotifyNote").show();
        console.log('User is BLOCK Notify.');
        isBlock = true;
        return;
    }
    if (!reg) {
        console.log('reg is null.');
        $("#NotifyNote").html("Trình duyệt bạn dùng không hỗ trợ tính năng nhận thông báo trực tiếp.");
        $("#NotifyNote").show();
        $("#NotifyPannel").hide();// uncoment when public
        return;
    }
    reg.pushManager.getSubscription()
        .then(function (subscription) {
            isSubscribed = !(subscription === null);

            if (isSubscribed) {
                $("#NotifyNote").html("Bạn đã đăng ký nhận thông báo mới từ xosodaiphat.com. Cảm ơn bạn đã quan tâm theo dõi!");
                $("#NotifyNote").show();
                console.log('User IS subscribed.');
            } else {
                $("#NotifyNote").html("Đăng ký nhận thông báo mới từ xosodaiphat.com");
                $("#NotifyNote").show();
                console.log('User is NOT subscribed.');

            }
            if (autoRegist && isSubscribed === false && localStorage.getItem("RegistNotify") !== "1" && sessionStorage.getItem("RegistNotify") !== "1") {
                subscribeNotify();
                //$("#NotifyRegistAds").show();
            }
        });

}
function showNote() {
    if (isInit === false) {
        initialiseUI();
    }
    $("#NotifyNote").show();
}
function hideNote() {
    $("#NotifyNote").hide();
}
if ('serviceWorker' in navigator && 'PushManager' in window) {
    console.log('Service Worker is supported');
    navigator.serviceWorker.register('/sw.js').then(function () {
        return navigator.serviceWorker.ready;

    }).then(function (serviceWorkerRegistration) {
        $("#NotifyPannel").show();
        console.log('Service Worker is ready :^)');
        reg = serviceWorkerRegistration;
        if (isInit === false) {
            firtInitialiseUI();
        }
    }).catch(function (error) {
        console.log('Service Worker Error hide pannel :^(', error);
        //$("#NotifyPannel").hide();// uncoment when public
    });
}
else {
    console.log('Service Worker is Not supported');
    //$("#NotifyPannel").hide();// uncoment when public
}
function ShowNotifyConfig() {
    if (isInit === false) {
        initialiseUI();
    }
    if (isSubscribed === false) {
        if (isBlock) {
            $("#NoteLockNotify").show();
        }
        else {
            $("#NoteLockNotify").hide();
        }
        $("#NotifyConfigUnRegist").hide();
        $("#NotifyConfigRegist").show();
    }
    else {
        $("#NotifyConfigRegist").hide();
        $("#NotifyConfigUnRegist").show();
    }
    $("#NotifyConfig").toggle('fast');
}
function CancelAds() {
    $("#NotifyRegistAds").hide();
    sessionStorage.setItem("RegistNotify", "1");
}
function subscribeNotify() {
    isInit = false;
    console.log('Đang đăng ký...');
    reg.pushManager.subscribe({ userVisibleOnly: true }).
        then(function (pushSubscription) {
            console.log('Đang đăng ký 2...');
            sub = pushSubscription;
            console.log(sub);
            var key = btoa(String.fromCharCode.apply(null, new Uint8Array(sub.getKey('p256dh'))));
            var auth = btoa(String.fromCharCode.apply(null, new Uint8Array(sub.getKey('auth'))));
            console.log(key);
            console.log(auth);
            $.ajax({
                url: domainName + '/Notify/Regist.aspx?endpoint=' + sub.endpoint + '&Key=' + key + '&auth=' + auth,
                type: 'GET',
                dataType: 'json',
                success: function (data) {
                    $("#NotifyNote").html("Bạn đã đăng ký thành công. Cảm ơn bạn đã quan tâm theo dõi xosodaiphat.com");
                    $("#NotifyNote").show();
                    console.log('Đăng ký thành công: ' + sub.endpoint);
                    localStorage.setItem("RegistEndPoint", sub.endpoint);
                },
                error: function () {
                    $("#NotifyNote").html("Bạn chưa đăng ký thành công. Vui lòng thử lại sau");
                    $("#NotifyNote").show();
                    console.log('Xảy ra lỗi: Sự kiện Click nút đăng ký');

                }
            });
            isSubscribed = true;
        });
    $("#NotifyConfig").hide();
    $("#NotifyRegistAds").hide();
    localStorage.setItem("RegistNotify", "1");
    sessionStorage.setItem("RegistNotify", "1");
}

function unsubscribe() {
    isInit = false;
    reg.pushManager.getSubscription()
        .then(function (subscription) {
            if (subscription) {
                console.log('subscription: ', subscription);
                var endPoint = subscription.endpoint;
                var unsubDes = subscription.unsubscribe();

                console.log('unsubDes: ', unsubDes);
                $.ajax({
                    url: domainName + '/Notify/UnRegist.aspx?event=' + endPoint,
                    type: 'GET',
                    dataType: 'json',
                    success: function (data) {
                        console.log('Hủy Đăng ký: ');
                        console.log(unsubDes);
                        $("#NotifyNote").html("Bạn đã hủy đăng ký nhận tin mới từ xosodaiphat.com");
                        $("#NotifyNote").show();
                    },
                    error: function () {
                        console.log('Xảy ra lỗi: Sự kiện Click nút hủy đăng ký');
                        $("#NotifyNote").html("Bạn đã hủy đăng ký nhận tin mới từ xosodaiphat.com");
                        $("#NotifyNote").show();
                    }
                });
            }
        })
        .catch(function (error) {
            console.log('Error unsubscribing', error);
        })
        .then(function () {
            $("#NotifyNote").html("Bạn đã hủy đăng ký nhận tin mới từ xosodaiphat.com");
            $("#NotifyNote").show();
            console.log('User is unsubscribed.');
            isSubscribed = false;

        });
    $("#NotifyConfig").hide();
}
function getMobileOperatingSystem() {
    var userAgent = navigator.userAgent || navigator.vendor || window.opera;
    if (/windows phone/i.test(userAgent)) {
        return "Windows Phone";
    }
    if (/android/i.test(userAgent)) {
        return "Android";
    }
    if (/iPad|iPhone|iPod/.test(userAgent) && !window.MSStream) {
        return "iOS";
    }
    return "unknown";
}