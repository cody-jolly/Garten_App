<?php
foreach ($data[0] as $set) {?>
    <div class="row px-1 my-2">
        <div class="col-12 card py-2">
            <p>Kultur: <?= $data[1][$set['vegDataId']] ?></p>
            <p>Beetnummer: <?= $set['bedNr'] ?></p>
            <p>Erste Erntewoche (KW): <?= $set['firstHarvestWeek'] ?></p>
            <p>Letzte Erntewoche (KW): <?= intval($set['firstHarvestWeek']) + intval($set['harvestWindow']) ?></p>
            <p>Fläche zu ernten / Woche (qm): <?= $data[2][$set['vegDataId']] ?></p>
        </div>
    </div>
<?php }
