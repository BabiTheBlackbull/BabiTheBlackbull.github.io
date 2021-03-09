/* $.getJSON('/RECOMENSSEM/js/lang.json', function(json){
    $('.translate').click(function(){
        let lang = $(this).attr('id');
        $('.lang').each(function(index, value){
            $(this).text(json[lang][$(this).attr('key')]);
        });//Close 4each
    });//Close Click
});//Close JSON */

$.getJSON('/RECOMENSSEM/js/lang.json', function(json){
    $('.translate').click(function(){
        var myCookie = getCookie("lang");
        if (myCookie == null) {
            // do cookie doesn't exist stuff;
            let lang = $(this).attr('id');
            document.cookie = "lang="+ lang;
            $('.lang').each(function(index, value){
            $(this).text(json[lang][$(this).attr('key')]);
        });//Close 4each
        }
        else {
            let str = document.cookie;
            var arr = str.split("=");
            var arr2 = arr[1].split(";");

            $('.lang').each(function(index, value){
                $(this).text(json[arr2[0]][$(this).attr('key')]);
            });//Close 4each
        }
        
    });//Close Click
});//Close JS
