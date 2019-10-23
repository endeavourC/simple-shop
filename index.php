<?php
session_start();
$title="Strona Główna";
require_once('views/header.php');
?>
<section class="page-banner">
    <div class="bg-overlay"></div>
    <div class="slideshow">
        <div class="slideshow-item"></div>
    </div>
    <div class="container col-12 flex flex-col flex-align-center flex-justify-center pt-12 pb-12">
        <h2 class="display-1 text-center white">Najwyższa Jakość & Innowacyjny Design</h2>
        <a href="panel.php" class="link btn mt-4 bg-primary white">Zobacz najnowsze produkty</a>
    </div>
</section>
<section class="about-us">
    <div class="container flex flex-sm-col flex-row">
        <div class="col-6 col-sm-12 pt-5 pb-5 pl-2 flex flex-col flex-justify-center">
            <h3 class="mb-2 primary">O nas</h3>
            <p class="pr-4">Firma Zakład Stolarski Waldemar umieszczona w Kluczborku powstała aby sprostać oczekiwaniom najbardziej wymagających klientów. Nasz zakład stolarski produkuje najlepszej jakości produkty opare o najnowsze trendy designowe. Posiadając 19 lat doświadczenia jesteśmy w stanie wyprodukować każdy rodzaj drzwi,mebli,skrzyń jaki tylko istnieje. Nasi klienci, a mamy ich mnóstwo są zawsze zadowoleni i z chęcia do nas wracają</p>
            <a href="panel.php" class="btn link bg-primary white mt-4 block" style="width: 250px; font-size: 14px;">Zapoznaj się z naszą ofertom.</a>
        </div>
        <div class="col-6 pt-5 pb-5 col-sm-12">
            <img src="img/page-banner-3.jpg" style="width:100%;" alt="Nasza narzędzia stolarskie">
        </div>
    </div>
</section>
<section class="contact">
    <div class="container flex flex-sm-col flex-row">
        <div class="col-6 col-sm-12">
            <img src="img/page-banner-2.jpg" style="width:100%;" alt="Obróbka desek w zakład stolarski waldemar">
        </div>
        <div class="col-6 col-sm-12 pl-2 pr-2 flex flex-col flex-justify-center">
            <h3 class="mb-2 primary">Skontaktuj się z nami</h3>
            <p>Jeżeli masz jakieś pytania lub jesteś zainteresowany kupieniem u nas produktów, skontaktuj się z nami. Z chęcia udzielimy odpowiedzi na męczace cię pytania i dobierzemy odpowiedni produkt do twoich potrzeb.</p>
            <p class="display-2 bold pt-4 primary">Numer telefonu: +48 123 123 123</p>
            <p class="display-2 bold pt-4 primary">Adres E-mail: zakladstolarski@waldemar.pl</p>
        </div>
    </div>
</section>
<?php
require_once('views/footer.php');
