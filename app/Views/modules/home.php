<div class="container-fluid px-0" id="wrap">
    <?php require_once ("../app/Views/partials/nav-top-unreg.php"); ?>
    <?php require_once ("../app/Views/partials/modal.php"); ?>
    <div class="row w-100 vh-100 justify-content-center no-gutters px-5" id="home__main">
        <div class="col-lg-3 col-md-4 col-sm-6 text-center align-items-center">
            <div class="row h-25 mt-5"></div>
            <h1 class="mt-5">Irgendwas Spannendes</h1>
            <h4 class="mt-5">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</h4>
            <a href="<?= $rootpath ?>ueber" class="btn btn-block py-2 button-white mt-5">Mehr Erfahren</a>
            <a href="#" class="btn btn-block py-2 button-orange mt-3" data-toggle="modal" data-target="#modal" onclick="loadModal('login')">Login / Registrieren</a>
        </div>
    </div>

    <div class="row w-100 vh-100 no-gutters px-5 py-md-0 py-5 justify-content-center align-items-center align-content-center">
        <div class="col-xl-4 col-md-6 col-sm-8">
            <img src="<?= $rootpath ?>images/veg_1.jpg" alt="Vegetables on Table" class="w-100">
        </div>
        <div class="col-xl-3 col-md-5 col-sm-8 ml-md-5 px-md-4 mt-md-0 mt-5">
            <h2>Das macht das App für dich / die Welt…</h2>
            <p class="mt-5">Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
            <a href="<?= $rootpath ?>ueber" class="btn btn-block button-orange mt-5">Mehr Lesen</a>
        </div>
    </div>

    <div class="row w-100 min-vh-75 no-gutters px-5 py-md-0 py-5 justify-content-center align-items-center align-content-center green-background">
        <div class="row w-100 mt-5">
            <div class="col-12 text-center">
                <h2>Kundenrezensionen</h2>
            </div>
        </div>
        <div class="row w-100 pb-5">
            <div class="col-md-4 col-12 px-5 py-5 text-center justify-content-center align-content-around">
                <img src="<?= $rootpath ?>images/marit_mustermann.jpg" alt="Marit Mustermann" class="rounded-circle w-50 m-4">
                <p>“Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.”</p>
                <h4>Marit Mustermann</h4>
            </div>
            <div class="col-md-4 col-12 px-5 py-5 text-center justify-content-center align-content-around">
                <img src="<?= $rootpath ?>images/marit_mustermann.jpg" alt="Marit Mustermann" class="rounded-circle w-50 m-4">
                <p>“Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.”</p>
                <h4>Marit Mustermann</h4>
            </div>
            <div class="col-md-4 col-12 px-5 py-5 text-center justify-content-center align-content-around">
                <img src="<?= $rootpath ?>images/marit_mustermann.jpg" alt="Marit Mustermann" class="rounded-circle w-50 m-4">
                <p>“Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.”</p>
                <h4>Marit Mustermann</h4>
            </div>
        </div>
    </div>

    <div class="row w-100 vh-100 no-gutters px-5 py-md-0 py-5 justify-content-center align-items-center align-content-center">
        <div class="col-xl-3 col-md-5 col-sm-8 mr-md-5 px-md-4">
            <h2>App Beschreibung</h2>
            <p class="mt-5">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
            <a href="<?= $rootpath ?>ueber" class="btn btn-block button-orange mt-5">Mehr Lesen</a>
        </div>
        <div class="col-xl-4 col-md-6 col-sm-8 mt-md-0 mt-5">
            <img src="<?= $rootpath ?>images/radishes_1.jpg" alt="Radishes" class="w-100">
        </div>
    </div>

    <div class="row w-100 vh-100 no-gutters p-5 justify-content-center tan-background" id="kontakt">
        <div class="row w-100 mt-5">
            <div class="col-12 pt-5 text-center">
                <h2>Kontakt</h2>
            </div>
        </div>
        <div class="row justify-content-center align-items-start">
            <div class="col-lg-2 col-md-3 mr-5 d-md-flex d-none">
                <img src="<?= $rootpath ?>images/contact.jpg" alt="Vegetables on Table" class="w-100 rounded-circle">
            </div>
            <div class="col-lg-3 col-md-4 pl-md-5 text-md-left text-center">
                <h4>Hauptstr. 1234</h4>
                <h4>5555 Musterstadt</h4>
                <h4 class="my-4">muster@muster.de</h4>
                <h4>+49 5555 5555</h4>
            </div>
        </div>
    </div>
</div>
<script src="<?= $rootpath ?>js/unreg-modals.js"></script>




