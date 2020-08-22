<!-- Adapted from https://getbootstrap.com/docs/4.0/components/modal/ -->
<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
<?php require_once("../app/Views/partials/alerts.php"); ?>
<div class="row mb-4 text-center justify-content-center">
    <div class="col-12 px-0">
        <h4>Beschreiben Sie bitte Ihre Gartenbeete.</h4>
    </div>
</div>
<div class="row mt-3">
    <div class="col-12 px-0">
        <p>Beetnummer?</p>
    </div>
</div>
<div class="row mt-3">
    <div class="col-12 px-0">
        <input type="number" class="w-100" id="ip-gardenBeds__bedNr">
    </div>
</div>
<div class="row mt-3">
    <div class="col-12 px-0">
        <p>Wie lang ist das Beet?(cm)</p>
    </div>
</div>
<div class="row mt-3">
    <div class="col-12 px-0">
        <input type="number" class="w-100" id="ip-gardenBeds__length" placeholder="Länge (cm)">
    </div>
</div>
<div class="row mt-3">
    <div class="col-12 px-0">
        <p>Wie breit ist das Beet?(cm)</p>
    </div>
</div>
<div class="row mt-3">
    <div class="col-12 px-0">
        <input type="number" class="w-100" id="ip-gardenBeds__width" placeholder="Breite (cm)">
    </div>
</div>
<div class="row my-5">
    <button type="button" class="btn btn-block button-orange" id="garden-beds__addBeds" onclick="addBed(false)">Gartenbeet hinzufügen</button>
</div>
<div class="row my-3 d-none" id="bed-overview-wrap">
    <div class="col-12 px-0">
        <div class="card w-auto px-xl-2 px-1">
            <div class="card-header text-center">
                <h3>Beetübersicht</h3>
            </div>
            <div class="card-body garden-bed-overview overview">
            </div>
        </div>
    </div>
</div>
