$(document).ready(function () {

    $("body").delegate(".login", "click", function () {
        var user = $("input[name=user]").val();
        var password = $("input[name=password]").val();
        if (user == "" && password == "") {
            alert("bos");
        } else {
            var veri = [user, password];
            $.post('../phpKontrol/loginadmin.php', {a: veri},
                function (data) {
                    var gelensorgu = JSON.parse(data);
                    if (gelensorgu == "1") {
                        $(location).attr('href', '../sayfalar/AdminPanel.php');
                    } else {
                        alert("Giriş Başarisiz");
                    }
                });
        }

    });
    $("body").delegate(".homepage", "click", function () {
        $(location).attr('href', '../sayfalar/index.php');
    });
});

