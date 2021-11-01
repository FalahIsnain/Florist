<nav class="navbar smart-scroll navbar-expand-lg navbar-light">
    <div class=" container">

        <div class="container-fluid">
            <a class="navbar-brand" href="#">IS9</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="<?= base_url('Pages') ?>">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url('Pages/about') ?>">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url('Pages/contact') ?>">contact</a>
                    </li>
                </ul>
            </div>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto mb-2 mb-lg-0">


                    <li class=" nav-item">
                        <a href="<?= base_url('Login/logout') ?>">
                            <button class="btn btn-danger" type="button">Logout</button>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav>