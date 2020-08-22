<div class="container-fluid px-0" id="wrap">
    <?php require_once ("../app/Views/partials/nav-top-reg.php"); ?>
    <?php require_once ("../app/Views/partials/modal.php"); ?>
    <div class="row w-100 mx-0 py-5" id="dashboard__main">
        <div class="col-12">
            <div class="row justify-content-center w-100 my-5 pt-5">
                <div class="col-lg-5 col-md-6 col-10 mb-3 mb-md-0 text-center">
                    <h1>Anbauplan</h1>
                </div>
            </div>
        </div>
    </div>

    <div class="row w-100 p-md-5 pb-5 mt-5 mx-0 justify-content-around align-items-start#">
        <div class="col-lg-4 col-md-8 col-11 my-3">
            <div class="card w-auto px-xl-2 px-1">
                <div class="card-header text-center">
                    <h3>Kulturen</h3>
                </div>
                <div class="card-body variety-overview overview"></div>
            </div>
        </div>
        <div class="col-lg-4 col-md-8 col-11 my-3">
            <div class="card w-auto px-xl-2 px-1">
                <div class="card-header text-center">
                    <h3>Beetübersicht</h3>
                </div>
                <div class="card-body garden-bed-overview overview"></div>
            </div>
        </div>
        <div class="col-lg-4 col-md-8 col-11 my-3">
            <div class="card w-auto px-xl-2 px-1">
                <div class="card-header text-center">
                    <h3>Anbau-Übersicht</h3>
                </div>
                <div class="card-body overview production-overview"></div>
            </div>
        </div>
    </div>
</div>
<script src="<?= $rootpath ?>js/reg-modals.js"></script>
<script src="<?= $rootpath ?>js/overviews.js"></script>