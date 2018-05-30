<?php include 'data.php';?>
<script>
    var gelenM=<?=$gidenMalzeme?>;
    var gToplu=<?=$gidenToplu?>;
    var gelenMazlzemeIsim=[];
    var gelenYanMazlzemeIsim=[];
    var gelenMiktar=[];
    for (var i=0;i<gelenM.length;i++){
        gelenMazlzemeIsim.push([gelenM[i].isim,gelenM[i].id]);
    }
    for (var i=0;i<gToplu[1].length;i++){
        gelenYanMazlzemeIsim.push([gToplu[1][i].isim,gToplu[1][i].id]);
    }
    for (var i=0;i<gToplu[2].length;i++){
        gelenMiktar.push([gToplu[2][i].isim,gToplu[2][i].id]);
    }
</script>

