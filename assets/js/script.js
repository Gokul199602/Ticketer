function openPage(url)
{
    var encodedUrl = encodeURI(url);
    console.log(encodedUrl);
    $("#mainContainer").load(encodedUrl);
}