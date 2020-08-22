<!-- Adapted from https://getbootstrap.com/docs/4.0/components/modal/ -->
<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
<?php require_once("../app/Views/partials/alerts.php"); ?>
<div class="row mb-4 text-center justify-content-center">
    <div class="col-4">
        <h2 class="modal-title">Login</h2>
    </div>
</div>
<div class="row">
    <div class="col-5-sm mr-2">
        <h4>Noch nicht dabei?</h4>
    </div>
    <div class="col-4-sm">
        <a href="#" onclick="loadModal('registrieren')">Registrieren</a>
    </div>
</div>
<div class="row mt-3">
    <div class="col-12 px-0">
        <input type="email" class="w-100" id="ip-login__email" placeholder="E-mail">
    </div>
</div>
<div class="row mt-3">
    <div class="col-12 px-0">
        <input type="password" class="w-100" id="ip-login__pass" placeholder="Passwort">
    </div>
</div>
<div class="row my-5">
    <button type="button" class="btn btn-block button-orange" id="login__button" onclick="loginUser()">Login</button>
</div>