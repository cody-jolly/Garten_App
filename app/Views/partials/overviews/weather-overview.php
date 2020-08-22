<?php
?>
<div class="row px-1 my-2">
    <div class="col-10 offset-1 card py-2">
        <h4>Aktuell: <?= $data['weather'][0]['description'] ?></h4>
        <h3>Temperatur</h3>
        <p>Aktuell: <?= intval($data['main']['temp'] - 273.15) ?> C</p>
        <p>Min: <?= intval($data['main']['temp_min'] - 273.15) ?> C</p>
        <p>Max: <?= intval($data['main']['temp_max'] - 273.15) ?> C</p>
    </div>
</div>
