<!-- Adapted from https://getbootstrap.com/docs/4.0/components/modal/ -->
<?php require_once("../app/Views/partials/alerts.php"); ?>
<div class="row my-4 text-center justify-content-center">
    <div class="col-12 px-0">
        <h4>Um alles so gut wie möglich für Sie einzurichten, haben wir ein paar Fragen zu ihrem Garten.</h4>
    </div>
</div>
<div class="row mt-3">
    <div class="col-12 px-0">
        <p>In welcher Stadt befindet sich Ihrer Garten?</p>
    </div>
</div>
<div class="row mt-3">
    <div class="col-12 px-0">
        <input type="text" class="w-100" id="ip-gardenReg__city" placeholder="Stadt">
    </div>
</div>
<div class="row mt-3">
    <div class="col-12 px-0">
        <p>In welchem Land befindet sich Ihrer Garten?</p>
    </div>
</div>
<div class="row mt-3">
    <div class="col-12 px-0">
        <select class="w-100" id="ip-gardenReg__country">
        <?php require_once ("../app/Views/partials/countries.php"); ?>
        </select>
    </div>
</div>
<div class="row mt-3">
    <div class="col-12 px-0">
        <p>Wie viele Haushaltsmitglieder sollen von Ihrem Garten ernährt werden?</p>
    </div>
</div>
<div class="row mt-3">
    <div class="col-12 px-0">
        <input type="number" class="w-100" id="ip-gardenReg__household" placeholder="Anzahl Haushaltsmitglieder">
    </div>
</div>
<div class="row my-5">
    <button type="button" class="btn btn-block button-orange" id="garden-reg__button" onclick="gardenReg()">Senden</button>
</div>