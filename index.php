<html lang="fr-FR">
<?php include("public/utils/head.php"); ?>
<body>
<?php include('public/utils/menu.php'); ?>

<!-- TEXTE PRESENTATION -->

<img src="public/img/keyboard.jpg" alt="coding"
     style="width:100%; height : auto ; overflow : hidden; opacity : 0.85;">
<div class="container bg-light">
    <div class="row text-black presentation">
        <div class="col-md-12">
            <h1 class="display-4" style="padding-top: 3%">
                Qu'est-ce qu'un Projet Personnalisé Encadré? </h1>
            <p class="lead text-justify">Il s'agit d'un travail à réaliser dans un contexte professionnel pseudo-réel,
                et qui est fondamental pour la préparation des épreuves E4 et E6 du BTS, intitulées respectivement
                "Conception et maintenance de solutions informatiques" et "Parcours de professionnalisation".
            <hr class="my-4">
            <p class="text-justify">
                Les PPE ont pour but de mettre en oeuvre les savoirs abordés dans les différents cours, pour acquérir
                des compétences globales, mais aussi spécifiques à la spécialité choisie (SLAM).
                <br>
                Un PPE est différent d'un TP classique, car ici l'on est placé dans un contexte professionnel
                pseudo-réel bien défini et donc d’un certain niveau de complexité avec un nombre important de documents
                à lire et comprendre.
                <br>
                Le travail est donc réalisé avec un existant, qu'il faut comprendre avant d’intervenir dessus. Plusieurs
                missions professionnelles sont ainsi proposées et il appartient à celui qui le réalise de l'organiser
                comme bon lui semble, car il n’êtes pas guidé pas à pas dans la réalisation des différents travaux.
            </p>
        </div>
    </div>


    <div class="row w-image text-black bg-white">
        <div class="col-md-8">
            <h1 class="display-4"> GSB - Contexte professionnel et missions</h1>
            <p class="lead text-justify font-italic">"Le laboratoire Galaxy Swiss Bourdin (GSB) est issu de la fusion
                entre le géant
                américain Galaxy (spécialisé dans le secteur des maladies virales dont le SIDA et les hépatites) et le
                conglomérat européen Swiss Bourdin (travaillant sur des médicaments plus conventionnels), lui même déjà
                union de trois petits laboratoires."
            <hr class="my-4">
            <p class="text-justify">
                Pour ces PPE, le contexte professionnel est celui d'un laboratoire pharmaceutique appelé Galaxy Swiss
                Bourdin.
            </p>
                <a class="btn btn-info" href="public/docs/GSB-Organisation.docx" download>Télécharger le document de présentation</a>

           <p class="text-justify">
               <br>
                Différentes missions sont proposées, comprenant chacune plusieurs tâches. Il s'agit là d'exemples, et
                seules 2 sont à exploiter (représentant donc à chaque fois un PPE). Il n'est cependant pas obligatoire
                de réaliser toutes les tâches qui sont présentées.
                Le but à l’examen est de présenter 2 situations professionnelles touchant des technologies différentes
                et exploitant toujours une base de données.
               <br>
                Cliquer sur un item ci dessous pour découvrir la ou les missions:

            </p>
        </div>

        <div class="col-md-4 my-auto">
            <img class="logoGSB" src="public/img/LogoGSB.png" alt="GSB logo">
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-header font-weight-bold">
                    Développement de la partie comptable (PHP)
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">Coder la page de validation d’une fiche de frais
                    </li>
                    <li class="list-group-item">Coder la page de suivi de paiement
                    </li>
                    <li class="list-group-item">Générer la documentation
                    </li>
                    <li class="list-group-item">Gérer le refus de certains frais Hors Forfait
                    </li>
                    <li class="list-group-item">Sécuriser les mots de passes stockés
                    </li>
                    <li class="list-group-item">Mettre en place la gestion plus fine de l'indemnisation kilométrique
                    </li>
                    <li class="list-group-item">Générer un état de frais au format PDF
                    </li>
                    <li class="list-group-item">Instaurer davantage d'écologie dans l'application
                    </li>
                </ul>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-header font-weight-bold">
                    Gestion de la clôture (C#)
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">Créer la classe d'accès aux données</li>
                    <li class="list-group-item">Créer la classe de gestion de dates</li>
                    <li class="list-group-item">Création de l'application</li>
                    <li class="list-group-item">Créer un service windows</li>
                </ul>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-header font-weight-bold">
                    Application mobile
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">Cras justo odio</li>
                    <li class="list-group-item">Dapibus ac facilisis in</li>
                    <li class="list-group-item">Vestibulum at eros</li>
                    <li class="list-group-item">Générer la documentation
                    </li>
                    <li class="list-group-item">Générer la documentation
                    </li>
                </ul>
            </div>
        </div>

    </div>
</div>


<footer><p>&copy;2019 Created and designed by <a href="mailto:camille.walbott@gmail.com">Camille Walbott</a>
    <p></footer>
</body>
</html>

