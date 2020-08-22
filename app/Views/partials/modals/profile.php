<!-- Adapted from https://getbootstrap.com/docs/4.0/components/modal/ -->
<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
<?php require_once("../app/Views/partials/alerts.php"); ?>
<div class="row text-center justify-content-center">
    <div class="col-8 mb-4">
        <h2 class="modal-title">Profil</h2>
    </div>
</div>
<div class="row mt-3">
    <div class="col-12 px-0">
        <h3>Vorname</h3>
        <input type="text" class="w-100" id="ip-upd__first-name" value="<?= $data[0]['firstName'] ?>">
    </div>
</div>
<div class="row mt-3">
    <div class="col-12 px-0">
        <h3>Nachname</h3>
        <input type="text" class="w-100" id="ip-upd__last-name" value="<?= $data[0]['lastName'] ?>">
    </div>
</div>
<div class="row mt-3">
    <div class="col-12 px-0">
        <h3>Email</h3>
        <input type="email" class="w-100" id="ip-upd__email" value="<?= $data[0]['email'] ?>">
    </div>
</div>
<div class="row mt-3">
    <div class="col-12 px-0">
        <h3>City</h3>
        <input type="email" class="w-100" id="ip-upd__city" value="<?= $data[1] ?>">
    </div>
</div>
<div class="row my-5">
    <button type="button" class="btn btn-block button-orange" onclick="updateUser()" id="update__button">Speichern</button>
</div>
