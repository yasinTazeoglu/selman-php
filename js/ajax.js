var GELENYEMEK = [];
$(function () {
    $("#send").click(function () {
        let giden = [];
        if (eklenenyanM.length > 0) {
            giden = [eklenenAnaM, eklenenyanM];
        } else {
            giden = [eklenenAnaM, [-1, -1]];
        }
        if (eklenenAnaM.length > 0) {
            $.post('../phpKontrol/islem.php', {a: giden},
                function (data) {
                    GELENYEMEK = JSON.parse(data);
                    if (GELENYEMEK === "false") {
                        alert("malesef yemek bulunamadi");
                    } else {
                        $.yazdir(GELENYEMEK);

                    }
                });
        }
        else {
            alert("hic malzeme secemedin");
        }
    });
    $("body").delegate(".onay", "click", function () {
        var clas = $(this).attr("class").split(" ")[2];
        $.tum().forEach(function (item) {
            if (item.id === clas) {
                $('.gallery').html("");
                $.eatShow(item);
            }
        })
    });
    $.yazdir = function (dizi) {
        $('.gallery').html("");
        $(".gallery").css({
            "background": "#f1f1f1",
            "height": "875px",
            "margin-bottom": "10px",
            "margin-left": "10px",
            "width": "780px",
            "padding-top": "8px",
            "overflow": "auto"
        });
        $("hr").css("margin", "0");
        const onerilen = dizi.onerilen;
        const yapilan = dizi.yapilan;
        if (yapilan.length === 0) {
            $('.gallery').append('<h2 class="baslik">ONERİLEN YEMEKLER</h2><hr class="malz">');
            onerilen.forEach(function (item) {
                $('.gallery').append($.div(item));
            });

        } else if (onerilen.length === 0) {
            $('.gallery').append('<h2 class="baslik">YAPABİLECEGİNİZ YEMEKLER</h2><hr class="malz">');
            yapilan.forEach(function (item) {
                $('.gallery').append($.div(item));
            });
        } else {
            $('.gallery').append('<h2 class="baslik">YAPABİLECEGİNİZ YEMEKLER</h2><hr class="malz">');
            yapilan.forEach(function (item) {
                $('.gallery').append($.div(item));
            });
            $('.gallery').append('<h2 class="baslik">ONERİLEN YEMEKLER</h2><hr class="malz">');
            onerilen.forEach(function (item) {
                $('.gallery').append($.div(item));
            })
        }


    };
    $.div = function (item) {
        var isim = item.isim;
        var tarif = item.tarif.substring(0, 13) + "...";
        if (isim.length > 12) {
            isim = isim.substring(0, 12) + "...";
        }
        return '<div class="list"><div class="isim">' + isim + '</div><div class="label">' + tarif + '</div><span class="buton onay ' + item.id + '">Gorüntüle</span><span class="buton del">sil</span></div>' +
            '<hr class="malz">'
    };
    $.tum = function () {
        const tum = [];
        (GELENYEMEK.yapilan).forEach(function (item) {
            tum.push(item);
        });
        (GELENYEMEK.onerilen).forEach(function (item) {
            tum.push(item);
        });
        return tum;
    };
    $.eatShow = function (item) {
        const baslik = '<div style="width:100%; text-align: center;"><h2>' + item.isim + '</h2></div><hr class="malz">';
        var malzeme = '';
        (item.malzeme).forEach(function (m) {
            var mzm = '';
            (m.asMalzeme).forEach(function (i) {
                mzm += i + " ";
            });
            malzeme += '<div style="margin-bottom:2px">' + mzm + '</div>'
        });
        var yan = '';
        (item.yan).forEach(function (m) {
            var yn = '';
            for (let i = 0; i < 3; i++) {
                yn += m[i] + " ";
            }
            console.log(m);
            if (m[3] === 1) {
                yan += '<div style="margin-bottom:2px">' + yn + '</div>'
                console.log(yn);
            } else {
                yan += '<div style="margin-bottom:2px;color:red;">' + yn + '</div>'
                console.log(yn);
            }
        });


        var tarif = '<div style="width:100%;"><div style="margin:0 20px">' + item.tarif + '</div></div>';
        $('.gallery').append(baslik);
        $('.gallery').append('<div style="padding: 20px;">' + malzeme + '</div>');
        $('.gallery').append('<div style="padding: 20px;">' + yan + '</div>');
        $('.gallery').append(tarif);
    }


});

