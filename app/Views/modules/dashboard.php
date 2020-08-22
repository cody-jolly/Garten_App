<div class="container-fluid px-0" id="wrap">
    <?php require_once ("../app/Views/partials/nav-top-reg.php"); ?>
    <?php require_once ("../app/Views/partials/modal.php"); ?>
    <div class="row w-100 mx-0 py-5" id="dashboard__main">
        <div class="col-12">
            <div class="row justify-content-center w-100 my-5 pt-5">
                <div class="col-lg-5 col-md-6 col-10 mb-3 mb-md-0 text-center">
                    <h1>Wilkommen, <?php if ($data['gardenReg'] != "newGardenReg") { echo $data['user']; } ?></h1>
                </div>
                <div class="col-lg-5 col-md-6 col-10 text-center">
                    <div class="card">
                        <div class="card-header">
                            <h2 class="d-inline-block">Wetter in</h2>
                            <input class="mw-100" id="dash__wetter-ip" type="text" value="<?php if ($data['gardenReg'] != "newGardenReg") { echo $data['city']; } ?>">
                            <button class="btn-block col-6 offset-3 mt-2 btn button-orange d-none" id="dash__wetter-btn">Wetter neu laden</button>
                        </div>
                        <div class="card-body <?php if ($data['gardenReg'] != "newGardenReg") {?>weather-overview<?php } ?>">
                            <h2>Bald sehen Sie das Wetter hier!</h2>
                            <div class="col-10 mx-auto">
                                <div class="row mb-2">
                                    <div class="col-6 pl-0 pr-1">
                                        <img src="<?= $rootpath ?>images/veg_1.jpg" alt="Vegetables on Table" class="w-100">
                                    </div>
                                    <div class="col-6 pr-0 pl-1">
                                        <img src="<?= $rootpath ?>images/veg_1.jpg" alt="Vegetables on Table" class="w-100">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="row w-100 p-md-5 pb-5 mt-5 mx-0 justify-content-around align-items-start#">
        <!--  TODO: add task model overview here (for further development)
        <div class="col-lg-4 col-md-8 col-11 my-3">
            <div class="card w-auto px-xl-2 px-1">
                <div class="card-header text-center">
                    <h3>To Do</h3>
                </div>
                <div class="card-body overview">
                    <h2>TODO: Insert To Do Liste hier!!!</h2>
                    <p>.............................</p>
                    <p>.............................</p>
                    <p>.............................</p>
                    <p>.............................</p>
                    <p>.............................</p>
                </div>
            </div>
        </div>-->
        <div class="col-lg-6 col-md-8 col-11 my-3">
            <div class="card w-auto px-xl-2 px-1">
                <div class="card-header text-center">
                    <h3>Kulturenübersicht</h3>
                </div>
                <div class="card-body <?php if ($data['gardenReg'] != "newGardenReg") {?>variety-overview<?php } ?> overview"></div>
            </div>
        </div>
        <div class="col-lg-6 col-md-8 col-11 my-3">
            <div class="card w-auto px-xl-2 px-1">
                <div class="card-header text-center">
                    <h3>Beetübersicht</h3>
                </div>
                <div class="card-body <?php if ($data['gardenReg'] != "newGardenReg") {?>garden-bed-overview<?php } ?> overview"></div>
            </div>
        </div>
    </div>
</div>
<?php if ($data['gardenReg'] == "newGardenReg") { ?>
<script type="text/javascript">
    loadModal('garden-reg');
    $('#modal').modal();
</script>
<?php } ?>
<script src="<?= $rootpath ?>js/overviews.js"></script>
<script src="<?= $rootpath ?>js/reg-modals.js"></script>


