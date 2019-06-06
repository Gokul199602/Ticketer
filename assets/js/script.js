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


$("#toRegister a").click(function(){
    $(".loginContainer").hide();
    $(".registerContainer").show();
})


$("#toLogin a").click(function(){
    $(".loginContainer").show();
    $(".registerContainer").hide();
})


function logout()
{
    $.post('../includes/logout.php',function(){
        location.reload()
    });
}


