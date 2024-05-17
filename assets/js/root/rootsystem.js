function todesimal(bilangan){
    var	reverse = bilangan.toString().split('').reverse().join(''),
        ribuan 	= reverse.match(/\d{1,3}/g);
        ribuan	= ribuan.join('.').split('').reverse().join('');
    return ribuan;
};

if (window.location.href !== url+'index.php/auth/sign') {

    var sessiontimeout = function() {
        var timeout = function() {
            $.sessionTimeout({
                title             : "Session Timeout Notification",
                message           : "Your session is about to expire.",
                keepAliveUrl      : window.location.href,
                redirUrl          : url+'index.php/auth/sign',
                logoutUrl         : url+'index.php/auth/sign',
                warnAfter         : 600000,                                 //warn after 5 seconds
                redirAfter        : 610000,                                //redirect after 10 secons,
                ignoreUserActivity: true,
                countdownMessage  : "Redirecting in {timer} seconds.",
                countdownBar      : true
            });
        }
    
        return {
            init: function() {
                timeout();
            }
        };
    }();
    
    jQuery(document).ready(function() {
        sessiontimeout.init();
    });
};
