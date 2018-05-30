var eklenenAnaM = [];
var eklenenyanM = [];
$.genel = {
    mybtn: function (a, id, cancel) {
        var gT = $(a).text();
        var gI = ($(a).attr("class")).split(" ")[1];
        $("#dialogboxhead").text("lütfen " + gT + " miktarini girin");

        $("#dialogboxbody").html('<input class="miktarText" min="0" oninput=' +
            '"this.value = Math.abs(this.value)" ' +
            'type="number" step="0.001">&nbsp&nbsp&nbsp&nbsp' + miktarDizi(gelenMiktar));

        $("#dialogboxfoot").html('<button id="' + id + '" class="' + gT + '_' + gI +
            '">Ekle</button>&nbsp&nbsp<button id="' + cancel + '">Cancel</button>');
    },
    mybtnYan: function (a, diziAdd, diziDelete, clasD, clasDizi, delet) {
        var gT = $(a).text();
        var gelenIsim = $(a).attr("class").split(" ")[1];
        diziAdd.push(gelenIsim);
        $("." + clasD).append('<div class="' + gT + '"></div><br>');
        $("#dialogboxhead").text("lütfen malzeme secin");
        $("#dialogboxfoot").html('<button id="ok">OK</button>');
        for (var i = 0; i < diziDelete.length; i++) {
            if (gT == diziDelete[i][0]) {
                diziDelete.splice(i, 1);
            }
        }

        $("#dialogboxbody").html(dizi(diziDelete, clasDizi));
        $("div." + gT).append('<span> ' + gT + '</span>&nbsp&nbsp&nbsp');
        $("div." + gT).append('<button id="' + delet + '" class="' + gT + '_' +
            gelenIsim[1] + '">Sil</button>');
        $("div." + gT).css({
            "padding": "5px", "margin": "2px",
            "display": "inline", "width": "100%"
        });


    },
    add: function (a, diziAdd, diziDelete, clasD, clasDizi, delet, edit) {
        const mT = $(".miktarText").val();
        const slc = $(".select :selected");
        if (mT !== "0" && mT !== "") {
            const gelenIsim = $(a).attr("class").split("_");
            diziAdd.push([mT, slc.val(), gelenIsim[1]]);
            $(".n").text("");
            $("." + clasD).append('<div class="' + gelenIsim[0] + '"></div><br>');
            $("div." + gelenIsim[0]).append('<span>' + mT + ' ' + slc.text() + '</span>');
            $("#dialogboxhead").text("lütfen malzeme secin");

            $("#dialogboxfoot").html('<button id="ok">OK</button>');

            for (var i = 0; i < diziDelete.length; i++) {
                if (gelenIsim[0] == diziDelete[i][0]) {
                    diziDelete.splice(i, 1);
                }
            }

            $("#dialogboxbody").html(dizi(diziDelete, clasDizi));
            $("div." + gelenIsim[0]).append('<span> ' + gelenIsim[0] + '</span>&nbsp&nbsp&nbsp');
            $("div." + gelenIsim[0]).append('<button id="' + delet + '" class="' + gelenIsim[0] + '_' +
                gelenIsim[1] + '">Sil</button>&nbsp&nbsp&nbsp<button class="' + gelenIsim[0] +
                '_' + gelenIsim[1] + '" id="' + edit + '">Duzenle</button>');
            $("div." + gelenIsim[0]).css({
                "padding": "5px", "margin": "2px", "width": "100%"
            });
            $("." + clasD).css({
                "height": "auto"
            });
        }
        else {
            alert("lütfen sıfırdan büyük bir deger girin")
        }
    },
    cancel: function (dizim, clas) {
        $("#dialogboxhead").text("lütfen malzeme secin");
        $("#dialogboxfoot").html('<button id="ok">OK</button>');
        $("#dialogboxbody").html(dizi(dizim, clas));
    },
    malzemeadd: function (dizim, clas) {
        $("#dialogboxbody").html(dizi(dizim, clas));
        $.sabit();
    },
    delete: function (a, gelenDizi, eklenenDizi) {
        const silinenMalzeme = $(a).attr("class").split('_');
        gelenDizi.push(silinenMalzeme);
        ($(a).parent()).remove();
        for (let i = 0; i < eklenenDizi.length; i++) {
            if (silinenMalzeme[1] === eklenenDizi[i][2]) {
                eklenenDizi.splice(i, 1);
            }
        }
        (($(a).parent()).parent()).css({
            "height": "auto"
        });
    },
    edit: function (a, editok) {
        const winW = window.innerWidth;
        const winH = window.innerHeight;
        $("#dialogoverlay").css({"display": "block", "height": winH + "px"});
        $("#dialogbox").css({"left": (winW / 2) - (550 * .5) + "px", "top": "100px", "display": "block"});
        $("#dialogboxhead").text("lütfen " + $(a).parent().attr("class") + " miktarini girin");

        // language=HTML format=false
        $("#dialogboxbody").html(`<input class="miktarText" min="0" oninput="this.value = Math.abs(this.value)" type="number" step="0.001">&nbsp&nbsp&nbsp&nbsp${miktarDizi(gelenMiktar)}`);

        $("#dialogboxfoot").html('<button id="' + editok + '" class="' + $(a).attr("class") +
            '">Ok</button>&nbsp&nbsp<button id="ok">Cancel</button>');
    },
    editok: function (a, delet, eklenendiz, edit) {
        var isim = $(a).attr("class").split("_");
        $("div." + isim[0]).children().remove();
        $("div." + isim[0]).text("").html("");
        $("div." + isim[0]).append('<span>' + $(".miktarText").val() + ' ' + $(".select :selected").text() + '</span>');
        $("div." + isim[0]).append('<span> ' + isim[0] + '</span>&nbsp&nbsp&nbsp');
        $("div." + isim[0]).append('<button id="' + delet + '" class="' + isim[0] + '_' + isim[1] + '">' +
            'Sil</button>&nbsp&nbsp&nbsp<button class="' + isim[0] + '" id="' + edit + '">Duzenle</button>');
        $("#dialogbox").css("display", "none");
        $("#dialogoverlay").css("display", "none");
        for (var i = 0; i < eklenendiz.length; i++) {
            if (isim[1] === eklenendiz[i][2]) {
                eklenendiz[i][0] = $(".miktarText").val();
                eklenendiz[i][1] = $(".select :selected").val();
            }
        }
    },
    savebtn: function () {
        var isim = $(".Addisim").val();
        var tarif = $(".Addtarif").val();
        var malzeme = $(".Addmalzeme").val();
        if (isim === "" || tarif === "" || malzeme === "") {
            alert("Lütfen boş bırakmayın");
        } else {
            alert("yemeginiz kontrol edildikten sonra yayınlanacaktir");
            $.genel.malzemefun(isim, malzeme, tarif);
            $(".Addisim").val("");
            $(".Addtarif").val("");
            $(".Addmalzeme").val("");
        }

    },
    malzemefun: function (isim, malzeme, tarif) {
        var tumMalzeme = [];
        var malzemeLength = malzeme.split(",");
        for (var i = 0; i < malzemeLength.length; i++) {
            var malzemeTane = malzemeLength[i].split("-");
            var k = [];
            for (var l = 0; l < malzemeTane.length; l++) {
                if (l < 3) {
                    k.push(malzemeTane[l].trim());
                }
            }
            tumMalzeme.push(k);
        }
        const Syemek_Malzeme = [isim, tumMalzeme, tarif];
        $.post('../phpKontrol/yemekKayit.php', {a: Syemek_Malzeme},
            function (data) {
                var kayitKontorol = JSON.parse(data);
                if (kayitKontorol === "true") {
                    console.log(Syemek_Malzeme);
                } else {
                    console.log(data);
                }
            });
    }
};
$.sabit = function () {
    var winW = window.innerWidth;
    var winH = window.innerHeight;
    $("#dialogoverlay").css({"display": "block", "height": winH + "px"});
    $("#dialogbox").css({"left": (winW / 2) - (550 * .5) + "px", "top": "100px", "display": "block"});
    $("#dialogboxhead").text("Lütfen malzeme secin");
    $("#dialogboxfoot").html('<button id="ok">OK</button>');
};

$.anaMalzeme = function () {
    $(".MAdd").click(function () {
        $.genel.malzemeadd(gelenMazlzemeIsim, "anamalzeme");
    });

    $("body").delegate(".anamalzeme", "click", function () {
        $.genel.mybtn(this, "addana", "cancelana");
    });

    $("body").delegate("#addana", "click", function () {
        $.genel.add(this, eklenenAnaM, gelenMazlzemeIsim, "appn", "anamalzeme", "deleteana", "edit");
    });
    $("body").delegate("#cancelana", "click", function () {
        $.genel.cancel(gelenMazlzemeIsim, "anamalzeme");
    });

    $("body").delegate("#deleteana", "click", function () {
        $.genel.delete(this, gelenMazlzemeIsim, eklenenAnaM);

    });
    $("body").delegate("#edit", "click", function () {
        $.genel.edit(this, "editOk");

    });
    $("body").delegate("#editOk", "click", function () {
        $.genel.editok(this, "deleteana", eklenenAnaM, "edit");

    });

};
$.yanMazleme = function () {
    $(".YMAdd").click(function () {
        $.genel.malzemeadd(gelenYanMazlzemeIsim, "yanmalzeme");
    });
    $("body").delegate(".yanmalzeme", "click", function () {
        $.genel.mybtnYan(this, eklenenyanM, gelenYanMazlzemeIsim, "appnY", "yanmalzeme", "deleteyan");
    });
    $("body").delegate("#addyan", "click", function () {
        $.genel.add(this, eklenenyanM, gelenYanMazlzemeIsim, "appnY", "yanmalzeme", "deleteyan", "edityan");
    });
    $("body").delegate("#cancelyan", "click", function () {
        $.genel.cancel(gelenYanMazlzemeIsim, "yanmalzeme");
    });
    $("body").delegate("#deleteyan", "click", function () {
        $.genel.delete(this, gelenYanMazlzemeIsim, eklenenyanM);

    });
    $("body").delegate("#edityan", "click", function () {
        $.genel.edit(this, "editOkyan");

    });
    $("body").delegate("#editOkyan", "click", function () {
        $.genel.editok(this, "deleteyan", eklenenyanM, "edityan");

    });
};
$.savaMalzeme = function () {
    $(".savebtn").click(function () {
        $.genel.savebtn();
    });
};
$.general = function () {
    $("body").delegate("#ok", "click", function () {
        $("#dialogbox").css("display", "none");
        $("#dialogoverlay").css("display", "none");
    });
    $.anaMalzeme();
    $.yanMazleme();
    $.savaMalzeme();
};


