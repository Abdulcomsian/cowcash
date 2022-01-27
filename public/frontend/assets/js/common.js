$("#header .menuBtn").click(function () {
    if ($("#header .mobileMenu").css("display") == "none") {
        $("#header .mobileMenu").css("display", "block")
    } else {
        $("#header .mobileMenu").css("display", "none")
    }
})
