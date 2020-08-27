<?php
foreach ($data[0] as $variety) {?>
    <div class="row px-1 my-2">
        <div class="col-12 card py-2">
            <h4>Kultur: <?= $variety->getVarietyName() ?></h4>
            <p>Gesamtkulturfläche im Garten: <?= $data[1][$variety->getVegDataId()] ?> qm</p>
            <p>Anzahl Aussaatsfolgen: <?= $data[2][$variety->getVegDataId()] ?></p>
            <p>Kulturdauer (Wochen): <?= $variety->getWeeksToMaturity() ?></p>
            <p>Quadratmeter / Portion: <?= round($variety->getQcmPerServing() / 10000, 2) ?></p>
            <p>Max. niedrige Temperatur: <?= $variety->getLowTemp() ?></p>
        </div>
    </div>
<?php }
