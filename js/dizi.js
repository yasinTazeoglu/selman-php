function dizi(gelenDizi,clas) {
    var buton ="";
    for (var i=0;i<gelenDizi.length;i++){
        buton+='<button class="myButton '+gelenDizi[i][1]+' '+clas+'" id="'
            +gelenDizi[i][0]+'">'+gelenDizi[i][0]+'</button>';
    }
    return buton;
}
function miktarDizi(dizi){
    var vO='<select class="select">';
    var vT="";
    var vTh='</select>';
    for(var i=0;i<dizi.length;i++){
        vT+='<option value="'+dizi[i][1]+'">'+dizi[i][0]+'</option> ';
    }
    var rtrn=vO+vT+vTh;
    return rtrn;
}