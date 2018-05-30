$(document).ready(function () {

    $("body").delegate(".exit", "click", function () {
        $.post('../phpKontrol/adminpanelKontrol.php',{exit:"exit"},
            function (data) {
                const veri = JSON.parse(data);
                if(veri==="1"){
                    window.location.reload();
                }
            });
    });
    $("body").delegate(".onaylanmayan","click",function () {
        $(".content").load('/neverThink/sayfaiciTag/onaylanmayanYemek.php');
    });
    $("body").delegate(".buton","click",function () {
        $(this).parent().remove();
    });
});