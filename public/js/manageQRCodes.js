let locale = $("html").attr("lang");
let seen = false;

$("#qr-show").click(() => {
    if (locale == "en")
        seen
            ? ((seen = false), $("#qr-show").text("Show QR code"))
            : ((seen = true), $("#qr-show").text("Hide QR code"));
    else
        seen
            ? ((seen = false), $("#qr-show").text("Pokaż kod QR"))
            : ((seen = true), $("#qr-show").text("Ukryj kod QR"));

    $("#qr-qr").toggle(200);
});

$("#qr-qr").click(() => {
    const link = document.createElement("a");
    link.href = $("#qr-qr").attr("src");
    link.download = "qr-code";
    link.click();
});
