<?php
foreach ($data[0] as $bed) {?>
    <div class="row px-1 my-2">
        <div class="col-12 card py-2">
            <h4>Beetnummer: <?= $bed['bedNr'] ?></h4>
            <p>Fläche (qm): <?= (intval($bed['area'])/10000) ?></p>
            <p>Kulturensätze:
                <?php if (count($data[1][$bed['bedNr']]) > 0) {
                    echo implode(", ", $data[1][$bed['bedNr']]);
                    } else {
                    echo "keine feste vorhanden, Expirementierraum!";
                }?></p>
        </div>
    </div>
<?php }