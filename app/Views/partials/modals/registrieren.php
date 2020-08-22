<!-- Adapted from https://getbootstrap.com/docs/4.0/components/modal/ -->
<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
<?php require_once("../app/Views/partials/alerts.php"); ?>
<div class="row text-center justify-content-center">
    <div class="col-8 mb-4">
        <h2 class="modal-title">Registrieren</h2>
    </div>
</div>
<div class="row mt-3">
    <div class="col-12 px-0">
        <input type="text" class="w-100" id="ip-reg__first-name" placeholder="Vorname">
    </div>
</div>
<div class="row mt-3">
    <div class="col-12 px-0">
        <input type="text" class="w-100" id="ip-reg__last-name" placeholder="Nachname">
    </div>
</div>
<div class="row mt-3">
    <div class="col-12 px-0">
        <input type="email" class="w-100" id="ip-reg__email" placeholder="E-mail">
    </div>
</div>
<div class="row mt-3">
    <div class="col-12 px-0">
        <input type="password" class="w-100" id="ip-reg__pass1" placeholder="Passwort">
    </div>
</div>
<div class="row mt-3">
    <div class="col-12 px-0">
        <input type="password" class="w-100" id="ip-reg__pass2" placeholder="Passwort wiederholen">
    </div>
</div>
<div class="row my-5">
    <button type="button" class="btn btn-block button-orange" onclick="registerUser()" id="reg__button">Registrieren</button>
</div>
