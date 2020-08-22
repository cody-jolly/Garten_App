<?php
foreach ($data[0] as $set) {?>
<div class="row px-1 my-2">
    <div class="col-12 card py-2">
        <p>Kultur: <?= $data[1][$set['vegDataId']] ?></p>
        <p>Beetnummer: <?= $set['bedNr'] ?></p>
        <p>Aussaatdatum (KW): <?= $set['sowingWeek'] ?></p>
        <p>Beetfläche (qm): <?= round((intval($set['varietyArea']) / 10000), 2) ?></p>
    </div>
</div>
<?php }