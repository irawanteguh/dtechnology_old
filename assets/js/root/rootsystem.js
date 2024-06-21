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
                warnAfter         : 1800000,                               // warn after 30 minutes
                redirAfter        : 1810000,                               // redirect after 30 minutes and 10 seconds
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
