function openPage(url)
{
    var encodedUrl = encodeURI(url);
    console.log(encodedUrl);
    $("#mainContainer").load(encodedUrl);
}

function activeClass(el){
    $("#navlinks li").parent().find('li').removeClass("is_active");
    $(el).addClass("is_active");
}