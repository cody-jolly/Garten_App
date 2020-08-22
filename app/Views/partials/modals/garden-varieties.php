<!-- Adapted from https://getbootstrap.com/docs/4.0/components/modal/ -->
<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
<?php require_once("../app/Views/partials/alerts.php"); ?>
<div class="row mb-5 text-center justify-content-center">
    <div class="col-12 px-0">
        <h4>Welche Gemüsesorten möchten Sie anbauen. (Diese Liste wird zukünftig noch weiter ausgebaut.)</h4>
    </div>
</div>
<div class="overview">
    <?php //List varieties from database ?>
    <?php $i = 1; ?>
    <?php foreach ($data as $variety) { ?>
    <div class="row mt-1">
        <div class="col-2 px-3">
            <input type="checkbox" id="ip-varieties__<?= implode($variety) ?>" value="<?= $i ?>">
        </div>
        <div class="col-10 px-0">
            <p><?= ucfirst(implode($variety)) ?></p>
        </div>
    </div>
    <?php $i++; ?>
    <?php } ?>
</div>
<div class="row my-5">
    <button type="button" class="btn btn-block button-orange" id="varieties-reg__button" onclick="varietiesReg()">Senden</button>
</div>