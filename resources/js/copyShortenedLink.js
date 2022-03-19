$("#copy-link").click(() => {
    let temp = $("<input>").val($("#shortened-link").text()).select();
    navigator.clipboard.writeText(temp.val());
});
