<!-- Adapted from Bootstrap (https://getbootstrap.com/docs/4.5/components/navbar/) -->
<nav class="navbar fixed-top navbar-expand-md navbar-light top-nav">
    <a class="navbar-brand flex-grow-1" href="<?= $rootpath ?>home">Garten App</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarToggler" aria-controls="navbarToggler" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse justify-content-end" id="navbarToggler">
        <ul class="navbar-nav mt-2 mt-md-0">
            <li class="nav-item active">
                <a class="nav-link mr-5 active" href="<?= $rootpath ?>home">Start</a>
            </li>
            <li class="nav-item mr-5">
                <a class="nav-link" href="<?= $rootpath ?>ueber">Über Uns</a>
            </li>
            <li class="nav-item mr-5">
                <a class="nav-link" href="<?= $rootpath ?>home#kontakt">Kontakt</a>
            </li>
            <li class="nav-item mr-5">
                <a class="nav-link" href="#" data-toggle="modal" data-target="#modal" onclick="loadModal('login')">Login</a>
            </li>
            <li class="nav-item mr-5">
                <a class="nav-link" href="#" data-toggle="modal" data-target="#modal" onclick="loadModal('registrieren')">Registrieren</a>
            </li>
        </ul>
    </div>
</nav>
