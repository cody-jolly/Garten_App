<div class="container-fluid px-0" id="wrap">
    <?php require_once ("../app/Views/partials/nav-top-unreg.php"); ?>
    <?php require_once ("../app/Views/partials/modal.php"); ?>
    <div class="row w-100 vh-100 justify-content-center no-gutters px-5" id="ueber__main">
        <div class="col-lg-3 col-md-4 col-sm-6 text-center align-items-center">
            <div class="row h-25 my-5"></div>
            <h1 class="mt-5">Über Uns</h1>
            <h4 class="mt-5">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</h4>
        </div>
    </div>

    <div class="row w-100 vh-100 no-gutters px-5 py-md-0 py-5 justify-content-center align-items-center align-content-center">
        <div class="col-xl-4 col-md-6 col-sm-8 img-tri overflow-hidden">
            <div class="row mb-2">
                <div class="col-6 pl-0 pr-1">
                    <img src="<?= $rootpath ?>images/veg_1.jpg" alt="Vegetables on Table" class="w-100">
                </div>
                <div class="col-6 pr-0 pl-1">
                    <img src="<?= $rootpath ?>images/veg_1.jpg" alt="Vegetables on Table" class="w-100">
                </div>
            </div>
            <div class="row">
                <div class="col-12 px-0 h-50">
                    <img src="<?= $rootpath ?>images/veg_2.jpg" alt="Vegetables on Table" class="w-100">
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-5 col-sm-8 ml-md-5 px-md-4 mt-md-0 mt-5">
            <h2>Unsere Ziele</h2>
            <p class="mt-5">Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
        </div>
    </div>

    <div class="row w-100 min-vh-100 no-gutters px-5 py-5 green-background">
        <div class="row w-100 justify-content-center align-items-center mt-5">
            <div class="col-md-6">
                <h2 class="text-center">App Beschreibung</h2>
            </div>
        </div>
        <div class="row justify-content-center align-items-center align-content-center py-md-5 py-0 my-5">
            <div class="col-xl-3 col-md-5 col-sm-8 mr-md-5 px-md-4">
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
            </div>
            <div class="col-xl-4 col-md-6 col-sm-8 mt-md-0 mt-5 d-md-flex d-none px-0">
                <img src="<?= $rootpath ?>images/radishes_1.jpg" alt="Radishes" class="w-100">
            </div>
        </div>
        <div class="row justify-content-center align-items-center align-content-center my-md-5 py-md-5 py-0 my-0">
            <div class="col-xl-4 col-md-6 col-sm-8 img-tri overflow-hidden">
                <div class="row mb-2">
                    <div class="col-6 pl-0 pr-1">
                        <img src="<?= $rootpath ?>images/veg_1.jpg" alt="Vegetables on Table" class="w-100">
                    </div>
                    <div class="col-6 pr-0 pl-1">
                        <img src="<?= $rootpath ?>images/veg_1.jpg" alt="Vegetables on Table" class="w-100">
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 px-0 h-50">
                        <img src="<?= $rootpath ?>images/veg_2.jpg" alt="Vegetables on Table" class="w-100">
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-5 col-sm-8 ml-md-5 px-md-4 mt-md-0 mt-5">
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
            </div>
        </div>
        <div class="row justify-content-center align-items-center align-content-center my-md-5 py-md-5 py-0 my-2">
            <div class="col-xl-3 col-md-5 col-sm-8 mr-md-5 px-md-4">
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                <p class="mt-2">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
            </div>
            <div class="col-xl-4 col-md-6 col-sm-8 mt-md-0 mt-5 px-0">
                <img src="<?= $rootpath ?>images/radishes_1.jpg" alt="Radishes" class="w-100">
            </div>
        </div>
        <div class="row w-100 my-5 pb-5 justify-content-center align-items-center">
            <div class="col-xl-4 col-md-6 col-sm-8 pl-md-0 pl-5">
                <a href="#" class="btn btn-block button-orange mt-5" data-toggle="modal" data-target="#modal" onclick="loadModal('registrieren')">Registrieren</a>
            </div>
        </div>
    </div>

    <div class="row w-100 min-vh-100 align-content-center justify-content-center" id="uu__faq">
        <div class="col-11 pb-5 mb-5">
            <div class="row my-5 justify-content-center align-items-center">
                <div class="col-3 text-center">
                    <h2>FAQ</h2>
                </div>
            </div>
            <div class="row my-5 justify-content-center align-items-center">
                <div class="col-md-6 col-lg-4 col-8 text-center">
                    <p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
                </div>
            </div>
            <div class="row my-3 justify-content-center">
                <div class="col-lg-6 col-md-8 col-10">
                    <a class="uu__faq-toggle" data-toggle="collapse" data-parent="#uu__faq" href="#collapse1">Lorem ipsum dolor sit?</a>
                    <hr>
                    <div id="collapse1" class="collapse in">
                        <div class="faq__info">
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row my-3 justify-content-center">
                <div class="col-lg-6 col-md-8 col-10">
                    <a class="uu__faq-toggle" data-toggle="collapse" data-parent="#uu__faq" href="#collapse2">Lorem ipsum dolor sit?</a>
                    <hr>
                    <div id="collapse2" class="collapse in">
                        <div class="faq__info">
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row my-3 justify-content-center">
                <div class="col-lg-6 col-md-8 col-10">
                    <a class="uu__faq-toggle" data-toggle="collapse" data-parent="#uu__faq" href="#collapse3">Lorem ipsum dolor sit?</a>
                    <hr>
                    <div id="collapse3" class="collapse in">
                        <div class="faq__info">
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row my-3 justify-content-center">
                <div class="col-lg-6 col-md-8 col-10">
                    <a class="uu__faq-toggle" data-toggle="collapse" data-parent="#uu__faq" href="#collapse4">Lorem ipsum dolor sit?</a>
                    <hr>
                    <div id="collapse4" class="collapse in">
                        <div class="faq__info">
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row my-3 justify-content-center">
                <div class="col-lg-6 col-md-8 col-10">
                    <a class="uu__faq-toggle" data-toggle="collapse" data-parent="#uu__faq" href="#collapse5">Lorem ipsum dolor sit?</a>
                    <hr>
                    <div id="collapse5" class="collapse in">
                        <div class="faq__info">
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="<?= $rootpath ?>js/unreg-modals.js"></script>