<!-- Adapted from https://getbootstrap.com/docs/4.0/components/modal/ -->
<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
<div class="row mb-4 text-center justify-content-center">
    <div class="col-12 px-0">
        <h2 class="modal-title">Wilkommen, <?= $data[0] ?>!</h2>
    </div>
</div>
<div class="row mt-3">
    <div class="col-12 px-0">
        <h4>Alles fertig eingerichtet, viel Spaß und Erfolg wünschen wir Ihnen.</h4>
    </div>
</div>
<div class="row my-5">
    <button type="button" class="btn btn-block button-orange" data-dismiss="modal" aria-label="Close" aria-hidden="true" onclick="location.reload()">Abschließen</button>
</div>