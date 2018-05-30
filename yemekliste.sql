-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 24 Nis 2018, 08:57:05
-- Sunucu sürümü: 10.1.31-MariaDB
-- PHP Sürümü: 7.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `yemekliste`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `malzemeler`
--

CREATE TABLE `malzemeler` (
  `id` int(11) NOT NULL,
  `isim` varchar(255) COLLATE utf8_turkish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `malzemeler`
--

INSERT INTO `malzemeler` (`id`, `isim`) VALUES
(1, 'patlican'),
(2, 'domates'),
(3, 'sogan'),
(4, 'yag'),
(5, 'bulgur'),
(6, 'salca'),
(7, 'mercimek'),
(8, 'pirinc'),
(9, 'un'),
(10, 'patates'),
(11, 'havuc'),
(12, 'Ispanak'),
(13, 'yogurt'),
(14, 'yumurta'),
(15, 'karniBahar');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `malzemesave`
--

CREATE TABLE `malzemesave` (
  `id` int(11) NOT NULL,
  `miktar` int(11) NOT NULL,
  `miktartur` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `isim` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `yemek_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `malzemesave`
--

INSERT INTO `malzemesave` (`id`, `miktar`, `miktartur`, `isim`, `yemek_id`) VALUES
(7, 1, 'kilo', 'mercimek', 5),
(8, 2, 'litre', 'su', 5),
(9, 3, 'adet', 'sogan', 6),
(10, 4, 'gram', 'patates', 6),
(11, 1, 'kilo', 'patates', 7),
(12, 2, 'adet', 'su', 7);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `miktar_tur`
--

CREATE TABLE `miktar_tur` (
  `id` int(11) NOT NULL,
  `isim` varchar(255) COLLATE utf8_turkish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `miktar_tur`
--

INSERT INTO `miktar_tur` (`id`, `isim`) VALUES
(1, 'adet'),
(2, 'su bardagi'),
(3, 'litre'),
(4, 'ml'),
(5, 'yemek kasigi'),
(6, 'cay kasigi'),
(7, 'cay bardagi');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `yan_malzemeler`
--

CREATE TABLE `yan_malzemeler` (
  `id` int(11) NOT NULL,
  `isim` varchar(255) COLLATE utf8_turkish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `yan_malzemeler`
--

INSERT INTO `yan_malzemeler` (`id`, `isim`) VALUES
(1, 'tuz'),
(2, 'karabiber'),
(3, 'kirmiziBiber'),
(4, 'kimyon'),
(5, 'kekik');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `yemekler`
--

CREATE TABLE `yemekler` (
  `id` int(11) NOT NULL,
  `isim` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `tarif` varchar(1500) COLLATE utf8_turkish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `yemekler`
--

INSERT INTO `yemekler` (`id`, `isim`, `tarif`) VALUES
(1, 'mercimek corbasi', 'Çorba tenceresini ocağa alalım tereyağını eritelim. Tereyağı eriyince yemeklik doğranmış soğanları ilave edelim. Soğanlardan sonra havuçları ufak doğranmış şekilde ilave edelim. 1-2 dakika soğanla beraber havucu kavurduktan sonra kırmızı mercimeği ekleyelim. Küçük doğranmış patatesleri de ekledikten sonra 1 litre suyu ilave edelim. Çorbayı karıştıralım ve tencerenin kapağını kapatarak çorbayı pişirelim. Sebzeler pişince tuzunu, karabiberini ve toz kırmızı biberi ekleyip karıştıralım. Çorbayı püre haline getirmek için el blendırından geçirelim. Çorbamız böylelikle servise hazır hale gelecektir. Toplamda 10 dakikada hazırlayabilir. 15 dakikada pişirebilirsiniz. Bu malzemeler yaklaşık 4-6 kişiliktir. Toplam kalori miktarı 385\'dir. Çorbamız çeşitli sebeplerden dolayı koyu veya sıvı olabilir, telaş yapmanıza hiç gerek yok. Malzemeyi tutturamamış olabilir veya ölçüyü kaçırmış olabiliriz. Gayet normal böyle şeyler. Malzeme listesinde geçen su bardağı ölçüsü 250ml olan su bardaklarından. Her evdeki su bardağı değişkenlik gösterebilir o yüzden çorbanın kıvamı değişebilir. Eğer çorba koyu olursa sıcak su ilave edebiliriz. Eğer çorbamız sıvı olursa kıvamını koyulaştırmak için içerisine biraz tereyağı katabilirsiniz. Çok sıvı olursa eğer önce bir miktar un alarak tereyağında kavurduktan sonra çorbadan biraz alıp kavrulmuş una ekleyelim ve tekrar çorbaya ilave edip koyuluğunu ayarlayalım. Ek olarak acılı seviyorsanız tereyağında kırmızı pul biber kızdırarak yiyebilirsiniz.'),
(2, 'pogaca', 'Ilık su ve sütü geniş bir karıştırma kabına alın. Yaş maya ve toz şekeri ekleyip karıştırdıktan sonra mayanın aktive olması için 5 dakika kadar bekletin.\r\n\r\nMaya tamamen eridikten sonra ayçiçek yağı, yumurta ve tuzu katın. Tüm malzemeyi elinizle karıştırın.\r\n\r\nElenmiş unu, azar azar ekleyip hamuru toparlanana kadar yoğurmaya başlayın.\r\n\r\nYumuşak ve yapışmayacak bir kıvamda bir hamur elde ettiğiniz zaman üzerini nemli bir bezle kapatıp 40-45 dakika kadar oda ısısında dinlendirin.\r\n\r\nMayalanan hamurdan yumurta büyüklüğünde parçalar kopartıp avuç içinizde yuvarlayarak şekil verin.\r\n\r\nTepsiye aralıklı olarak dizdiğiniz mayalı hamurların üzerine sıvı yağla çırpılmış yumurta sarısı sürün. Tepsi mayası olarak da bilinen son mayalandırma işlemi için 10-15 dakika kadar bekletin.\r\n\r\nArzuya göre üzerlerine ince kıyılmış dereotu serpiştirdikten sonra önceden ısıtılmış 180 derecede 25-30 dakika pişirin. Ekmek yerine geçecek puf puf kabarmış mayalı poğaçalarınız hazır.'),
(3, 'kısır', 'Taze soğanları incecik kıyın. Bol suda yıkayıp, suyunu süzdürdüğünüz kıvırcık marul ve maydanozları doğrayın.\r\n\r\nKabuğunu soyduğunuz salatalıkları küçük küpler halinde kesin.\r\n\r\nİnce bulguru oval bir tencereye alın. Biber ve domates salçasını sıcak su ile karıştırın.\r\n\r\nBulguru salçalı sıcak su ile ıslattıktan sonra kapağını kapattığınız tencerede şişmesi için 15 dakika kadar bekletin.\r\n\r\nKısırın sosu için; limon suyu, zeytinyağı, tuz, nane ve sumağı küçük bir kapta karıştırın.\r\n\r\nDoğradığınız yeşillik ve salatalıkları, suyunu çeken ince bulgur ile harmanlayın.\r\n\r\nHazırladığınız sosu ekleyin, karıştırdıktan sonra bekletmeden servis edin. Sevdiklerinizle paylaşın.');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `yemeksave`
--

CREATE TABLE `yemeksave` (
  `id` int(11) NOT NULL,
  `isim` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `tarif` varchar(255) COLLATE utf8_turkish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `yemeksave`
--

INSERT INTO `yemeksave` (`id`, `isim`, `tarif`) VALUES
(5, 'mercimek corbasi', 'mercimek corbasi tarifi'),
(6, 'princ pilavi', 'princ tarif'),
(7, 'patates sulusu', 'sun');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `yemek_malzeme`
--

CREATE TABLE `yemek_malzeme` (
  `id` int(11) NOT NULL,
  `yemek_id` int(11) NOT NULL,
  `malzeme_id` int(11) NOT NULL,
  `miktar` int(11) NOT NULL,
  `miktar_tur_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `yemek_malzeme`
--

INSERT INTO `yemek_malzeme` (`id`, `yemek_id`, `malzeme_id`, `miktar`, `miktar_tur_id`) VALUES
(1, 1, 3, 1, 1),
(2, 1, 7, 1, 2),
(3, 1, 10, 1, 1),
(4, 2, 4, 1, 2),
(5, 2, 9, 3, 2),
(6, 2, 13, 4, 1),
(7, 3, 2, 1, 1),
(8, 3, 3, 1, 1),
(9, 3, 5, 1, 2),
(10, 3, 6, 2, 5);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `yemek_yan_malzeme`
--

CREATE TABLE `yemek_yan_malzeme` (
  `id` int(11) NOT NULL,
  `yemek_id` int(11) NOT NULL,
  `malzeme_id` int(11) NOT NULL,
  `miktar` int(11) NOT NULL,
  `miktar_tur_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `yemek_yan_malzeme`
--

INSERT INTO `yemek_yan_malzeme` (`id`, `yemek_id`, `malzeme_id`, `miktar`, `miktar_tur_id`) VALUES
(1, 3, 1, 3, 6),
(2, 3, 2, 1, 6),
(3, 3, 3, 2, 6),
(4, 3, 5, 1, 6),
(5, 2, 1, 1, 6),
(6, 2, 4, 1, 6),
(7, 1, 1, 2, 6),
(8, 1, 2, 1, 6),
(9, 1, 3, 1, 6);

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `malzemeler`
--
ALTER TABLE `malzemeler`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `malzemesave`
--
ALTER TABLE `malzemesave`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `miktar_tur`
--
ALTER TABLE `miktar_tur`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `yan_malzemeler`
--
ALTER TABLE `yan_malzemeler`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `yemekler`
--
ALTER TABLE `yemekler`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `yemeksave`
--
ALTER TABLE `yemeksave`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `yemek_malzeme`
--
ALTER TABLE `yemek_malzeme`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `yemek_yan_malzeme`
--
ALTER TABLE `yemek_yan_malzeme`
  ADD PRIMARY KEY (`id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `malzemeler`
--
ALTER TABLE `malzemeler`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Tablo için AUTO_INCREMENT değeri `malzemesave`
--
ALTER TABLE `malzemesave`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Tablo için AUTO_INCREMENT değeri `miktar_tur`
--
ALTER TABLE `miktar_tur`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Tablo için AUTO_INCREMENT değeri `yan_malzemeler`
--
ALTER TABLE `yan_malzemeler`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Tablo için AUTO_INCREMENT değeri `yemekler`
--
ALTER TABLE `yemekler`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Tablo için AUTO_INCREMENT değeri `yemeksave`
--
ALTER TABLE `yemeksave`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Tablo için AUTO_INCREMENT değeri `yemek_malzeme`
--
ALTER TABLE `yemek_malzeme`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Tablo için AUTO_INCREMENT değeri `yemek_yan_malzeme`
--
ALTER TABLE `yemek_yan_malzeme`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
