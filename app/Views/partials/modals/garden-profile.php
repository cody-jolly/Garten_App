<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
<div class="row my-3"">
    <div class="col-12 px-0 my">
        <div class="row my-3">
            <div class="col-10 offset-1">
                <h3 class="text-center">Gartenprofil</h3>
            </div>
        </div>

        <div class="w-auto px-xl-2 px-1">
            <div class="mt-2 text-center">
                <h4>Beetübersicht</h4>
            </div>
            <div class="card-body garden-bed-overview overview-small"></div>
            <!-- Load bed-overview -->
            <script>loadOverview('bed-overview', '.garden-bed-overview');</script>
            <div class="card-footer">
                <a class="my-2 pr-5" data-toggle="collapse" href="#addBedCard" role="button" aria-expanded="false" aria-controls="addBedCard">Beet Hinzufügen</a>
                <a class="my-2" data-toggle="collapse" href="#deleteBedCard" role="button" aria-expanded="false" aria-controls="deleteBedCard">Beet löschen</a>
                <?php require_once("../app/Views/partials/alerts.php"); ?>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="card mb-2 collapse" id="addBedCard">
                        <div class="card-header">
                            <button type="button" class="close" >
                                <span data-toggle="collapse" href="#addBedCard" role="button" aria-expanded="false" aria-controls="addBedCard">&times;</span>
                            </button>
                        </div>
                        <div class="row mt-3">
                            <div class="col-10 offset-1">
                                <p>Beetnummer?</p>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-10 offset-1">
                                <input type="number" class="w-100" id="ip-gardenBeds__bedNr">
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-10 offset-1">
                                <p>Wie lang ist das Beet?(cm)</p>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-10 offset-1">
                                <input type="number" class="w-100" id="ip-gardenBeds__length" placeholder="Länge (cm)">
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-10 offset-1">
                                <p>Wie breit ist das Beet?(cm)</p>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-10 offset-1">
                                <input type="number" class="w-100" id="ip-gardenBeds__width" placeholder="Breite (cm)">
                            </div>
                        </div>
                        <div class="row justify-content-center my-5">
                            <div class="col-10 offset-1"></div>
                            <button type="button" class="btn button-orange" id="garden-profile__addBeds" onclick="addBed(true)">Gartenbeet hinzufügen</button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="card mb-2 collapse" id="deleteBedCard">
                        <div class="card-header">
                            <button type="button" class="close" >
                                <span data-toggle="collapse" href="#deleteBedCard" role="button" aria-expanded="false" aria-controls="deleteBedCard">&times;</span>
                            </button>
                        </div>
                        <div class="row mt-3">
                            <div class="col-10 offset-1">
                                <p>Beetnummer?</p>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-10 offset-1">
                                <input type="number" class="w-100" id="ip-deleteBed__bedNr">
                            </div>
                        </div>
                        <div class="row justify-content-center my-5">
                            <div class="col-10 offset-1"></div>
                            <button type="button" class="btn button-orange" id="garden-profile__deleteBeds" onclick="deleteBed()">Gartenbeet löschen</button>
                        </div>
                    </div>
                </div>
            </div>

        </div>


        <div class="row align-items-baseline py-2">
            <div class="col-6 text-center">
                <h4>Haushaltsgröße</h4>
            </div>
            <div class="col-4">
                <input type="number" id="ip-gp__household" value="<?= $data[0]['household'] ?>">
            </div>
        </div>

        <div class="row mt-3">
            <div class="col-12 text-center">
                <h4>Gewünschte Gemüsesorten</h4>
            </div>
            <div class="py-2">
                <?php //List varieties from database ?>
                <?php $i = 1; ?>
                <?php $j = 0; ?>
                <?php foreach ($data[1] as $variety) { ?>
                    <div class="row mt-1 px-5">
                        <div class="col-2 px-3">
                            <input type="checkbox" id="ip-varieties__<?= implode($variety) ?>" value="<?= $i ?>"
                                <?php foreach ($data[0]['varieties'] as $var) {
                                    if ($var->getVegDataId() == $i) {
                                        ?> checked <?php
                                    }
                                }?>>
                        </div>
                        <div class="col-8 px-0">
                            <p><?= ucfirst(implode($variety)) ?></p>
                        </div>
                    </div>
                    <?php $i++; ?>
                <?php } ?>
            </div>
        </div>


        <div class="row my-1">
            <button type="button" class="btn btn-block button-orange" onclick="updateGP()">Änderungen Speichern</button>
        </div>
    </div>
</div>
