<?php
include '../sayfaiciTag/header.php'; ?>
<script>
    $(document).ready(function () {
        $(".nbs").html('&nbsp;').css("width","40px");
    });
</script>
<div class="body">
    <div class="featured">
        <div class="gallery">
            <div class="modal-content">
                <div class="container">
                    <h1>Yemek Ekleme Bölümü</h1>
                    <p>Eklediğiniz yemekler kontrol edilir.Malzeme eklerken örn. 1-su bardağı-fasulye<br> olarak girin
                        malzemelerin arasina virgül koyun</p>
                    <hr class="yemekb">
                    <label for="isim"><b>Yemeğin ismi</b></label>
                    <input type="text" placeholder="İsim..." class="Addisim" name="isim" required>

                    <label for="malzeme"><b>Malzemeler</b></label>
                    <input type="text" placeholder="Malzemeler..." class="Addmalzeme" name="malzeme" required>
                    <label for="tarif"><b>Yemeğin Tarifi</b></label>
                    <textarea placeholder="Tarif..." name="tarif" class="Addtarif" required></textarea>
                    <br>
                    <p>Daha fazla yemek tarifi ekleme istiyorsaniz <a href="#" style="color:dodgerblue">tıklayın</a>.
                    </p>
                    <div class="clearfix">
                        <button type="button" class="clearbtn">Temizle</button>
                        <button type="button" class="savebtn">Kaydet</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include '../sayfaiciTag/footer.php';
?>

