document.cookie = "lang=es";

window.onload = function() {
    var myCookie = getCookie("lang");
    if (myCookie == null) {}
    else{
        let str = document.cookie;
        var arr = str.split("=");
        var arr2 = arr[1].split(";");
    eventFire(document.getElementById(arr2[0]), 'click');
}
};

function eventFire(el, etype){
    if (el.fireEvent) {
         el.fireEvent('on' + etype);
       } else {
           var evObj = document.createEvent('Events');
           evObj.initEvent(etype, true, false);
           el.dispatchEvent(evObj);
       }
}

function getCookie(name) {
    var dc = document.cookie;
    var prefix = name + "=";
    var begin = dc.indexOf("; " + prefix);
    if (begin == -1) {
        begin = dc.indexOf(prefix);
        if (begin != 0) return null;
    }
    else
    {
        begin += 2;
        var end = document.cookie.indexOf(";", begin);
        if (end == -1) {
        end = dc.length;
        }
    }
    // because unescape has been deprecated, replaced with decodeURI
    //return unescape(dc.substring(begin + prefix.length, end));
    return decodeURI(dc.substring(begin + prefix.length, end));
} 