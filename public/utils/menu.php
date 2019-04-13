<header>
    <!-- Navbar -->
    <!-- TITRE -->
    <nav class="navbar navbar-expand-lg navbar-light fixed-top" style="height: 5%; background-color: #e3f2fd;">
        <label class="navbar-brand" style="font-family: riesling ; font-size: 40px; padding-top: 1%; font-weight: bold;">CAMILLE WALBOTT - PPE</label>

        <!-- Bouton menu navbar (responsive) -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- items navbar -->
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">

                <li class="nav-item <?php active(''); ?>">
                    <a class="nav-link" href="index.php">Présentation des PPE<span class="sr-only">(current)</span></a>
                </li>


                <!-- dropdown -->
                <li class="nav-item dropdown" <?php active('ppe1'); ?>>
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        PPE
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="ppe1">PPE 1 - Développement de la partie comptable</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">PPE 2  - </a>
                    </div>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="#">Site GSB</a>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Télécharger
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="#">code source et documents originaux</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">code source et documents modifiés</a>
                    </div>
                </li>
            </ul>

            <!-- liens externes (LINKED IN)-->
            <div class="form-inline my-2 my-lg-0">
                <a href="https://www.camillew.fr/" target="_blank" style="color: black; text-decoration: none;"><i class="fas fa-home" style="font-size: 35px;"></i></a>
            </div>
        </div>
    </nav>
</header>