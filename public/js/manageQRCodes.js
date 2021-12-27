$("#qr-show").click(() => {
    $("#qr-qr").toggle();
});

$("#qr-qr").click(() => {
    const link = document.createElement("a");
    link.href = $("#qr-qr").attr("src");
    link.download = "qr-code";
    link.click();
});

// https://duckduckgo.com
