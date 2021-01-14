$.getJSON('/RECOMENSSEM/js/lang.json', function(json){
    $('.translate').click(function(){
        let lang = $(this).attr('id');
        $('.lang').each(function(index, value){
            $(this).text(json[lang][$(this).attr('key')]);
        });//Close 4each
    });//Close Click
});//Close JSON