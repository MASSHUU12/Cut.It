$("#copy-link").click(() => {
    $("#shortened-link").select();
    navigator.clipboard.writeText($("#shortened-link").text());
});
