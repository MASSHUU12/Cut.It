$(() => {
    if (getCookie("langChecked") != "true") {
        let lang = navigator.language || navigator.userLanguage;
        let l = lang.slice(0, 2);

        document.cookie = "langChecked=true";
        window.location.replace("/language/" + l);
    }
});

function getCookie(cname) {
    let name = cname + "=";
    let ca = decodeURIComponent(document.cookie).split(";");

    for (let i = 0; i < ca.length; i++) {
        let c = ca[i];

        while (c.charAt(0) == " ") {
            c = c.substring(1);
        }

        if (c.indexOf(name) == 0) return c.substring(name.length, c.length);
    }
    return "";
}