
$("#gdpr-button").on("click", function () {
    setCookie("gka_gdpr", 1, 365);
    $("#gdpr-cookies").fadeOut();
});

if(getCookie("gka_gdpr") == 1) {
    $("#gdpr-cookies").hide();
}
