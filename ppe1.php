<html lang="fr-FR">
<?php include("public/utils/head.php"); ?>
<body>
<?php include('public/utils/menu.php'); ?>

<img src="public/img/keyboard.jpg" alt="coding"
     style="width:100%; height : auto; overflow : hidden; opacity : 0.85;">
<div class="container bg-light">
    <div class="row text-black presentation">
        <div class="col-md-12">

            <!--  PRESENTATION PPE 1 -->
            <h1 class="display-4" style="padding-top: 3%">
                PPE 1 - Développement de la partie comptable </h1>
            <p class="lead text-justify"> extrait du Cahier des charges : "
                <span class="font-italic">
                     Le suivi des frais est actuellement géré de plusieurs façons selon le
                laboratoire d'origine des visiteurs. On souhaite uniformiser cette gestion
                L'application doit permettre d'enregistrer tout frais engagé, aussi bien pour l'activité directe
                (déplacement, restauration et hébergement) que pour les activités annexes (événementiel, conférences,
                autres), et de présenter un suivi daté des opérations menées par le service comptable (réception des
                pièces, validation de la demande de remboursement, mise en paiement, remboursement effectué)
                </span> ".
            </p>
            <p class="text-center font-weight-bold">
                Il est question ici de construire l'interface du site de GSB destinée aux comptables de l'entreprise.
            </p>
            <hr class="my-4">
            <div class="text-center">
                <a class="btn btn-info" href="public/docs/GSB-CDC-AppliFrais.doc" download>Télécharger le cahier des
                    charges</a>
                <a class="btn btn-info" href="">Autres téléchargements</a>
            </div>
        </div>
    </div>





    <div class="row w-image text-black bg-white">
        <div class="col-md-12">
            <div id="TDM" class="Title1">
                <i class="fas fa-code"></i> Tâche n° 1 : Coder la page de validation d’une fiche de frais
            </div>

            <!--  ____ TABLE DES MATIERES ____   -->
            <div class="list-group">
                <li class="list-group-item list-group-item-info">Table des matières</li>
                <a href="#step1" class="list-group-item list-group-item-action ">
                    1. Création d'une nouvelle table dans la base de données
                </a>
                <a href="#step2" class="list-group-item list-group-item-action">
                    2. Modifications des fonctions d'authentification
                </a>
                <a href="#step3" class="list-group-item list-group-item-action">
                    3. Gestion de l'affichage après connexion selon la fonction de l'utilisateur
                </a>
                <a href="#step4" class="list-group-item list-group-item-action">
                    4. Création vue et controleur de validation de frais
                </a>
                <a href="#step5" class="list-group-item list-group-item-action">
                    5. Récupération de la liste des visiteurs
                </a>
                <a href="#step6" class="list-group-item list-group-item-action">
                    6. Réupération des frais Forfait du visiteur et du mois sélectionné
                </a>
                <a href="#step7" class="list-group-item list-group-item-action">
                    7. Boutons "corriger" et "réinitialiser"
                </a>
                <a href="#step8" class="list-group-item list-group-item-action">
                    8. Affichage des frais hors forfait
                </a>
                <a href="#step9" class="list-group-item list-group-item-action">

                </a>
                <a href="#step10" class="list-group-item list-group-item-action">

                </a>
            </div>

            <!-- ________________________________________________ETAPE 1 _________________________________________ -->
            <div id="step1" class="step">
                <div class="Title2 mx-auto">
                    1. Création d'une nouvelle table dans la base de données
                    <a class="badge badge-info" style="margin-bottom: 1%" href="#TDM"><i class="fas fa-bars"></i></a>
                </div>

                <p class="text-justify explication">
                    Le site va proposer 2 interfaces selon si l'utilisateur est comptable ou visiteur. Chacun n'aura pas
                    accès aux mêmes fonctionnalités.
                    Pour séparer ces deux interfaces, ils faut distinguer les deux catégories d'utilisateurs potentiels.
                    <br>
                    Actuellement, la base données contient les tables suivantes :
                <p>
                <ul>
                    <li>visiteur</li>
                    <li>etat</li>
                    <li>fichefrais</li>
                    <li>fraisforfait</li>
                    <li>lignefraisforfait</li>
                    <li>lignefraishorsforfait</li>
                </ul>
                <p class="text-justify">
                    Modifier le nom de la table "visiteur" et y ajouter une colonne permettant de déterminer la fonction de
                    l'utilisateur peut s'averer être complexe, notamment car cette table est utilisée dans le code source
                    (ce qui demanderait de le changer lui aussi, toute les fois ou cette table est utilisée). Bien que la
                    base de données utilisée lors de ce developpement ne contienne peu de tuples, l'on suppose que la base de
                    données réelle est bien plus conséquente, et rajouter une donnée à chaque tuple pourrait être long.
                    <br>
                    <br>
                    Il semble donc plus judicieux de créer une nouvelle table sur la base de celle des visiteurs,
                    représentant les comptables, et portant le même nom.
                    <br>
                    <br>
                </p>

                <img class="mx-auto d-block screen" src="public/img/screens/BDD_TableComptable.PNG" alt="creation table comptables">

                <p class="text-justify explication">
                    Pour pouvoir par la suite accéder à la page d'intranet du coté des comptables, il faut ajouter des
                    données fictives, entrées aléatoirement.
                </p>

                <img class="mx-auto d-block screen" src="public/img/screens/BDD_TableComptable_ajout.PNG" alt="creation vues">

            </div>

            <!-- ________________________________________________ETAPE 2 _________________________________________ -->
            <div class="step">
                <div id="step2" class="Title2 mx-auto">
                    2. Modification des fonctions d'authentification
                    <a class="badge badge-info" style="margin-bottom: 1%" href="#TDM"><i class="fas fa-bars"></i></a>
                </div>

                <p class="text-justify explication">
                    Afin de déterminer le statut de l'utilisateur, à savoir s'il est visiteur ou comptable, et d'éviter la
                    lecture de 2 tables entières dans la base de données du coté PHP,
                    il est préférable d'ajouter une liste déroulante, disponible directement dans les classes du framework Bootstrap,
                    où l'utilisateur pourra choisir sa fonction.
                </p>


                <pre><code class="html">
 &lt;!-- Select menu to determinate the status of the user --&gt;
    &lt;div class="form-group"&gt;
        &lt;select class="form-control" name="fct"&gt;
             &lt;option&gt;Visiteur &lt;/option&gt;
              &lt;option&gt;Comptable &lt;/option&gt;
        &lt;/select&gt;
    &lt;/div&gt;
                </code></pre>

                <img class="mx-auto d-block screen" src="public/img/screens/AuthViewScreen2.PNG" alt="creation table comptables">

                <p class="text-justify explication">
                    Afin que l'information de statut du visiteur soit récupérée avec la méthode "POST", l'attribut
                    "name" a été rajouté à la liste déroulante dans la partie HTML (cf code ci-dessus).
                    <br>
                    Dans le controleur correspondant à la page, le paramètre est récupéré dans une variable et comparé.
                    Selon le resultat, on appelle une fonction, qui va récuperer les infos de l'utilisateur dans la
                    table correspondante dans la base de données.
                    <br>
                    Comme la fonction getInfosVisiteur(), on crée la fonction getInfosComptable.
                    <br>
                </p>

                <p class="font-weight-bold">
                    Récupération de la variable "fct" et comparaison dans le fichier "c_connexion.php":
                </p>

                <pre><code class="php">
switch ($action) {
case 'demandeConnexion':
    include 'vues/v_connexion.php';
    break;
case 'valideConnexion':
    $login = filter_input(INPUT_POST, 'login', FILTER_SANITIZE_STRING);
    $mdp = filter_input(INPUT_POST, 'mdp', FILTER_SANITIZE_STRING);
    $fct = filter_input(INPUT_POST, 'fct', FILTER_SANITIZE_STRING);

    if ($fct == 'Visiteur') {
        $user = $pdo->getInfosVisiteur($login, $mdp);
        if (!is_array($user)) {
            ajouterErreur('Login ou mot de passe incorrect');
            include 'vues/v_erreurs.php';
            include 'vues/v_connexion.php';
        } else {
            $id = $user['id'];
            $nom = $user['nom'];
            $prenom = $user['prenom'];
            connecter($id, $nom, $prenom);
            header('Location: index.php');
        }
    } elseif ($fct == 'Comptable') {
        $user = $pdo->getInfosComptable($login, $mdp);
        if (!is_array($user)) {
            ajouterErreur('Login ou mot de passe incorrect');
            include 'vues/v_erreurs.php';
            include 'vues/v_connexion.php';
        } else {
            $id = $user['id'];
            $nom = $user['nom'];
            $prenom = $user['prenom'];
            connecter($id, $nom, $prenom);
            header('Location: index.php');
        }
    }

    break;
                    </code></pre>


                <p class="font-weight-bold">
                    Création de la fonction getInfosComptable() dans le fichier "class.pdogsb.inc.php" :
                </p>

                <pre><code class="php">
public function getInfosComptable($login, $mdp)
    {
        $requetePrepare = PdoGsb::$monPdo->prepare(
            'SELECT comptable.idComptable AS id, comptable.nom AS nom, '
            . 'comptable.prenom AS prenom '
            . 'FROM comptable '
            . 'WHERE comptable.login = :unLogin AND comptable.mdp = :unMdp'
        );
        $requetePrepare->bindParam(':unLogin', $login, PDO::PARAM_STR);
        $requetePrepare->bindParam(':unMdp', $mdp, PDO::PARAM_STR);
        $requetePrepare->execute();
        return $requetePrepare->fetch();
    }
                    </code></pre>
            </div>


            <!-- ________________________________________________ETAPE 3 _________________________________________ -->
            <div id="step3" class="step">
                <div class="Title2 mx-auto">
                    3. Gestion de l'affichage après connexion selon la fonction de l'utilisateur
                    <a class="badge badge-info" style="margin-bottom: 1%" href="#TDM"><i class="fas fa-bars"></i></a>
                </div>

                <p class="text-justify explication">
                    Après avoir cliqué sur le bouton "connexion", et contrôlé les paramètres entrés (abordé par la
                    suite), l'index redirige vers le controleur c_acceuil, qui lui se charge d'afficher l'entete et
                    l'accueil de l'intranet.
                    <br>
                    Etant donné qu'il existe 2 status distincts, (Comptable et visiteur), on crée 2 vues d'accueils et 2
                    vues d'entêtes, une pour chaque statuts, que la vue accueil appelera selon le statut :
                </p>

                <img class="mx-auto d-block screen" src="public/img/screens/sourcetree_createviews.PNG" alt="creation vues">

                <p class="text-justify explication">
                    Pour contrôler la connexion, l'index va faire appelle à une fonction 'estConnecte()' dans le fichier
                    'fct.inc.php'. Cette fonction vérifie si la variable $_SESSION (qui est un tableau) est initiée et
                    possède une valeur 'id'.
                    Ce tableau est initié dans la fonction connecter(), définie juste en dessous dans le même fichier.
                    <br>
                    Pour pouvoir ultérieurement controler le statut de l'utilisateur, et donc afficher la bonne vue, une
                    autre valeur va être attribuée à $_SESSION. Un paramètre va également être rajouté dans la fonction :
                </p>


                <pre><code class="php">
function connecter($id, $nom, $prenom, $fct)
{
    $_SESSION['id'] = $id;
    $_SESSION['nom'] = $nom;
    $_SESSION['prenom'] = $prenom;
    $_SESSION['fct'] = $fct;
}
                </code></pre>


                <p class="font-weight-bold">
                    On oublie pas de modifier le controleur 'c_connexion.php', qui appelle la fonction 'connecter()' afin de bien prendre en compte le nouveau paramètre :
                </p>

                <pre><code class="php">
if ($fct == 'Visiteur') {
    $user = $pdo->getInfosVisiteur($login, $mdp);
    if (!is_array($user)) {
        ajouterErreur('Login ou mot de passe incorrect');
        include 'vues/v_erreurs.php';
        include 'vues/v_connexion.php';
    } else {
        $id = $user['id'];
        $nom = $user['nom'];
        $prenom = $user['prenom'];
        connecter($id, $nom, $prenom, $fct);
        header('Location: index.php');
    }
} elseif ($fct == 'Comptable') {
    $user = $pdo->getInfosComptable($login, $mdp);
    if (!is_array($user)) {
        ajouterErreur('Login ou mot de passe incorrect');
        include 'vues/v_erreurs.php';
        include 'vues/v_connexion.php';
    } else {
        $id = $user['id'];
        $nom = $user['nom'];
        $prenom = $user['prenom'];
        connecter($id, $nom, $prenom, $fct);
        header('Location: index.php');
    }
}
                    </code></pre>

                <p class="font-weight-bold">
                    On modifie le fichier "v_accueil.php" qui va rediriger vers la bonne vue selon le paramètre $_SESSION['fct'] :
                </p>

                <pre><code class="php">
if ($_SESSION['fct']==='Visiteur') {
    include 'v_accueil_visiteur.php';
} elseif ($_SESSION['fct']==='Comptable'){
    include 'v_accueil_comptable.php';
}
                    </code></pre>


                <p class="font-weight-bold">
                    On crée la vue "v_acceuil_comptable" :
                </p>

                <img class="mx-auto d-block screen" src="public/img/screens/vueComptableAccueil.PNG" alt="creation vue comptable">

                <p>
                    Enfin, on modifie les liens de redirection des boutons de l'accueil et de l'entête (concernant dans
                    un premier temps la validation des frais) en y ajoutant un uc et une action qui seront réabordées
                    dans le point suivant:
                </p>

                <pre><code class="html">
 &lt;li  &lt;?php if ($uc == 'validationFrais') { ?> class="active" &lt;?php } ?>>
     &lt;a href="index.php?uc=validationFrais&action=nValue">
        &lt;span class="glyphicon glyphicon-ok"> &lt;/span>
         Valider les fiches de frais
     &lt;/a>
  &lt;/li>
                    </code>
                </pre>
         </div>

            <!-- ________________________________________________ETAPE 4 _________________________________________ -->
            <div id="step4" class="step">
                <div class="Title2 mx-auto">
                    4. Création vue et controleur de validation de frais
                    <a class="badge badge-info" style="margin-bottom: 1%" href="#TDM"><i class="fas fa-bars"></i></a>
                </div>

                <p class="text-justify explication">
                    Comme dit dans le point précédent, on crée une nouvelle vue et un nouveau controleur, respectivement de noms "v_validationfrais.php" et "c_validationfrais".
                </p>

                <img class="mx-auto d-block screen" src="public/img/screens/sourcetree_createcontrolerview_validationfrais.PNG" alt="creation vue controlleur validationfrais">

                <p class="font-weight-bold explication">
                    Ensuite, l'on retourne dans l'index pour pouvoir rediriger vers ce nouveau controleur en cas de $uc = "validationfrais" :
                </p>

                <pre><code class="php">
switch ($uc) {
case 'connexion':
    include 'controleurs/c_connexion.php';
    break;
case 'accueil':
    include 'controleurs/c_accueil.php';
    break;
case 'gererFrais':
    include 'controleurs/c_gererFrais.php';
    break;
case 'etatFrais':
    include 'controleurs/c_etatFrais.php';
    break;
case 'deconnexion':
    include 'controleurs/c_deconnexion.php';
    break;
case 'validationFrais':
    include 'controleurs/c_validationfrais.php';
    break;
}
                    </code></pre>

                <p class="font-weight-bold explication">
                    On se positionne maintenant dans le nouveau controleur, pour pouvoir y récuperer et contrôler l'action reçue par la methode get :
                </p>

                <pre><code class="php">
$action = filter_input(INPUT_GET, 'action', FILTER_SANITIZE_STRING);
if ($action ==='nValue'){ };
require 'vues/v_validationfrais.php';
                    </code> </pre>
            </div>


            <!-- ________________________________________________ETAPE 5 _________________________________________ -->
            <div id="step5" class="step">
                <div class="Title2 mx-auto">
                    5. Récupération de la liste des visiteurs et des mois correspondants
                    <a class="badge badge-info" style="margin-bottom: 1%" href="#TDM"><i class="fas fa-bars"></i></a>
                </div>

                <p class="text-justify explication">
                    Afin de pouvoir récupérer les visiteurs, et d'en utiliser leurs données par la suite, on crée une
                    fonction getAllVisiteurs() dans la classe "class.pdogsb.inc.php" :
                </p>

                <br>

                <pre><code class="php">
/**
  * Retourne un tableau associatif avec le nom, prenom et id de chaque visiteurs de la table visiteur
  */
public function getAllVisiteurs(){
   $requetePrepare = PdoGsb::$monPdo->prepare(
      'SELECT visiteur.nom AS nom, visiteur.prenom AS prenom, visiteur.id AS id '
      . 'FROM visiteur '
   );
   $requetePrepare->execute();
   return $requetePrepare->fetchAll();
}
                    </code></pre>

                <p class="text-justify explication">
                    Puis on l'appelle dans le controleur "c_validationfrais.php", en l'attribuant à une variable
                    $lesVisiteurs, à la suite de la récupération de l'action.
                </p>
                <p class="text-justify">
                    On crée ensuite dans la vue un premier formulaire avec un Selecteur, ou l'on va afficher tous les
                    noms des visiteurs récupérés, puis un second qui va récupérer les mois de chaque visiteurs. Pour
                    pouvoir afficher les mois du premier visiteur affiché par défaut dans le premier selecteur, l'on
                    doit récupérer l'id dans la première ligne du tableau $lesVisiteurs, et on le met en paramètre de la
                    fonction getLesMoisDisponibles() issue de la classe PDO
                </p>
                <p class="text-justify">
                    A chaque sélection de visiteur, le controleur doit pouvoir afficher les mois correspondant à ce
                    visiteur. Pour cela, et pour éviter d'utiliser un bouton à chaque changement (qui rendrait la
                    manipulation longue), on va utiliser du javascript pour qu'a chaque sélection de visiteur
                    (onChange), un submit soit envoyé et que le controleur récupère la liste des mois correspondant. On
                    va donc créer également une nouvelle action 'valueName", qui indique au controleur que l'on a
                    changé de visiteur. Le submit va alors pouvoir envoyer avec la méthode POST l'id du visiteur
                    choisi.
                </p>
                <p class="text-justify">
                    Enfin, pour que ce nom reste affiché après l'avoir selectionné, on teste avec un if si l'id
                    correspond au nom choisi pour mettre ce choix en "selected"
                </p>
                <br>

                <p class="font-weight-bold">
                    "c_validationfrais.php" :
                </p>

                <pre><code class="php">
$action = filter_input(INPUT_GET, 'action', FILTER_SANITIZE_STRING);
$lesVisiteurs = $pdo->getAllVisiteurs();

if ($action ==='nValue'){
    $selectedId = $lesVisiteurs[0]['id'] ;
    $lesMoisVisiteur = $pdo->getLesMoisDisponibles($selectedId);
    $selectedMonth = $lesMoisVisiteur[0]['mois'];


} elseif ($action === 'valueName'){
    $selectedId = $_POST['selectName'];
    $lesMoisVisiteur = $pdo->getLesMoisDisponibles($selectedId);
    $selectedMonth = $lesMoisVisiteur[0]['mois'];
                    </code></pre>

                <p class="font-weight-bold">
                    "v_validationfrais.php" :
                </p>

                <pre><code class="html">
&lt;div class="container">
      &lt;div class="row">
          &lt;div class="col-md-12 bold" style="float : left">
            Choisir le visiteur :
              &lt;!-- 'Visiteur' choice select -->
              &lt;form id='formulaireVisiteur' method='post' action='index.php?uc=validationFrais&action=valueName'>
                  &lt;select name="selectName" onChange='onVisitorSelectChange()'>
                      &lt;?php
                    foreach ($lesVisiteurs as $unVisiteur) {
                        $nom = $unVisiteur['nom'];
                        $prenom = $unVisiteur['prenom'];
                        $idVisiteur = $unVisiteur['id'];?>
                          &lt;option value='  &lt;?php echo $idVisiteur ?>'   &lt;?php if($selectedId === $idVisiteur) { echo "selected";} ?>>  &lt;?php echo $prenom . " " . $nom ?> &lt;/option>
                        &lt;?php } ?>
                  &lt;/select>
              &lt;/form>

            Mois :
            &lt;!-- 'month' choice select -->
              &lt;form id='formulaireMoisVisiteur' method='post' action='index.php?uc=validationFrais&action=valueMonth&id=  &lt;?php echo $selectedId ?>'>
                  &lt;select name ="selectMonth" onChange='onMonthSelectChange()'>
                      &lt;?php
                    foreach ($lesMoisVisiteur as $unMois) {
                        $annee = $unMois['numAnnee'];
                        $mois = $unMois['numMois'];
                        $moisAnnee = $mois.'/'.$annee; ?>
                          &lt;option value='  &lt;?php echo $moisAnnee ?>'   &lt;?php if($unMois['mois'] === $selectedMonth) { echo "selected";} ?>>  &lt;?php echo $moisAnnee ?> &lt;/option>
                        &lt;?php } ?>

                  &lt;/select>
              &lt;/form>
          &lt;/div>
      &lt;/div>
                    </code> </pre>

                <p class="font-weight-bold">
                    javascript "v_validationfrais.php" :
                </p>

                <pre><code class="javascript">
 function onVisitorSelectChange() {
        document.getElementById('formulaireVisiteur').submit();
    }
function onMonthSelectChange() {
        document.getElementById('formulaireMoisVisiteur').submit();
    }
                    </code></pre>
            </div>

            <!-- ________________________________________________ETAPE 6 _________________________________________ -->
            <div id="step6" class="step">
                <div class="Title2 mx-auto">
                    6. Réupération des frais Forfait du visiteur et du mois sélectionné
                    <a class="badge badge-info" style="margin-bottom: 1%" href="#TDM"><i class="fas fa-bars"></i></a>
                </div>

                <p class="text-justify explication">
                    Après avoir selectionné un mois pour un visiteur, le formulaire du mois va rediriger vers une
                    nouvelle action du nom de "valueMonth". Dans cette action, l'id du visiteur et le mois vont être
                    récupérés à nouveau, et le mois selectionné va être convertis afin de pouvoir être compatible avec
                    la fonction qui appelle les frais forfaitaires du visiteur : la fonction getLesFraisForfait() de la
                    classe pdo. l'id sera également nécessaire.
                </p>
                <p class="text-justify explication font-weight-bold">
                    Chaque donnée récupérée par cette fonction va être stockée dans une variable initialement mise à "0" (en cas ou il y aurait une erreur, il vaut mieux afficher un zéro):
                </p>

                <pre><code class="php">
}elseif ($action ==='valueMonth'){
    $selectedId = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_STRING);
    $lesMoisVisiteur = $pdo->getLesMoisDisponibles($selectedId);
    $selectedMonth = $_POST['selectMonth'];
    $selectedMonth = strval($selectedMonth);
    $selectedMonth = '00/'.$selectedMonth;
    $selectedMonth = getMois($selectedMonth); }

$etp = '0';
$nuit ='0';
$km='0';
$repas='0';


$lesFraisVisiteur = $pdo->getLesFraisForfait($selectedId,$selectedMonth);
 if (isset($lesFraisVisiteur)) {
     foreach ($lesFraisVisiteur as $uneLigne) {
         switch ($uneLigne['idfrais']) {
             case 'ETP' :
                 $etp = $uneLigne['quantite'];
                 break;
             case 'KM':
                 $km = $uneLigne['quantite'];
                 break;
             case 'NUI':
                 $nuit = $uneLigne['quantite'];
                 break;
             case 'REP':
                 $repas = $uneLigne['quantite'];
         }
     }
 }
                    </code></pre>

                <p class="text-justify font-weight-bold">
                    Affichage dans la vue :
                </p>

                <pre><code class="html">
 &lt;div class="row">
        &lt;div class="col-md-5">
            &lt;div>
                &lt;h2> Valider la fiche de frais &lt;/h2>
                &lt;h3> Eléments forfaitisés&lt;/h3>
            &lt;/div>
            &lt;form id="formulaireFraisForfait" method="post" action="">
                &lt;div class="form-group">
                    &lt;label for="forfaitEtape">Forfait Etape&lt;/label>
                    &lt;input type="number" class="form-control input1" name="forfaitEtape" value="&lt;?php echo $etp ?>">
                &lt;/div>
                &lt;div class="form-group">
                    &lt;label for="fraisKm">Frais Kilométriques&lt;/label>
                    &lt;input type="number" class="form-control input1" name="fraisKm" value="&lt;?php echo $km ?>">
                &lt;/div>
                &lt;div class="form-group">
                    &lt;label for="nuitHotel">Nuitée Hôtel&lt;/label>
                    &lt;input type="number" class="form-control input1" name="nuitHotel" value="&lt;?php echo $nuit ?>">
                &lt;/div>
                &lt;div class="form-group">
                    &lt;label for="repasRestaurant">Repas Restaurant&lt;/label>
                    &lt;input type="number" class="form-control input1" name="repasRestaurant" value="&lt;?php echo $repas ?>">
                &lt;/div>
                &lt;p>
                    &lt;button type="submit" class="btn btn-success btn-xs">Corriger&lt;/button>
                    &lt;a type="button" href="" class="btn btn-danger btn-xs">Réinitialiser&lt;/a>

                &lt;/p>
            &lt;/form>
        &lt;/div>
    &lt;/div>
                    </code></pre>
            </div>

            <!-- ________________________________________________ETAPE 7 _________________________________________ -->
            <div id="step7" class="step">
                <div class="Title2 mx-auto">
                    7. Boutons "corriger" et "réinitialiser"
                    <a class="badge badge-info" style="margin-bottom: 1%" href="#TDM"><i class="fas fa-bars"></i></a>
                </div>

                <p class="text-justify explication">
                    La encore, une nouvelle action va être créée pour chaque bouton.
                    Le bouton "corriger" est associé au formulaire, et va donc activer le submit. L'action
                    "valueCorrect" sera donc mise dans la propriété action du formulaire, et les données insérées dans
                    le formulaire seront transmises via la méthode POST.
                </p>
                <p class=" text-justify">
                    Le bouton "réinitialiser" sera quant à lui un simple lien de classe "button" pour en hériter son
                    design, et aura pour href le lien avec l'action "valueReset". Chaque bouton renvoie évidemment l'id
                    et le mois selectionné pour ne pas perdre l'affichage de ces derniers dans les selecteurs au dessus.
                </p>
                <p class=" text-justify">
                    Deux div sont également ajoutées en dessous : une verte pour confirmer que la correction a été faite, une autre pour signaler que les frais entrés ne sont pas valides.
                    En effet, les frais doivent être des entiers positifs.
                </p>

                <img class="mx-auto d-block screen" src="public/img/screens/VueComptableValidationFrais.PNG" alt=" Vue comptable validation frais">

                <pre><code class="html">
 &lt;div class="row">
        &lt;div class="col-md-5">
            &lt;div>
                &lt;h2> Valider la fiche de frais &lt;/h2>
                &lt;h3> Eléments forfaitisés&lt;/h3>
            &lt;/div>
            &lt;form id="formulaireFraisForfait" method="post" action="index.php?uc=validationFrais&action=valueCorrect&id=&lt;?php echo $selectedId ?>&month=&lt;?php echo$selectedMonth?>">
                &lt;div class="form-group">
                    &lt;label for="forfaitEtape">Forfait Etape&lt;/label>
                    &lt;input type="number" class="form-control input1" name="forfaitEtape" value="&lt;?php echo $etp ?>">
                &lt;/div>
                &lt;div class="form-group">
                    &lt;label for="fraisKm">Frais Kilométriques&lt;/label>
                    &lt;input type="number" class="form-control input1" name="fraisKm" value="&lt;?php echo $km ?>">
                &lt;/div>
                &lt;div class="form-group">
                    &lt;label for="nuitHotel">Nuitée Hôtel&lt;/label>
                    &lt;input type="number" class="form-control input1" name="nuitHotel" value="&lt;?php echo $nuit ?>">
                &lt;/div>
                &lt;div class="form-group">
                    &lt;label for="repasRestaurant">Repas Restaurant&lt;/label>
                    &lt;input type="number" class="form-control input1" name="repasRestaurant" value="&lt;?php echo $repas ?>">
                &lt;/div>
                &lt;p>
                    &lt;button type="submit" class="btn btn-success btn-xs">Corriger&lt;/button>
                    &lt;a type="button" href="index.php?uc=validationFrais&action=valueReset&id=&lt;?php echo $selectedId ?>&month=&lt;?php echo$selectedMonth?>" class="btn btn-danger btn-xs">Réinitialiser&lt;/a>
                     &lt;div class="alert alert-success text-center" &lt;?php echo $hidden ?> > Les frais ont été corrigés.&lt;/div>
                    &lt;div class="alert alert-danger text-center" &lt;?php echo $hidden2 ?> > Frais invalides : les frais doivent être des entiers positifs&lt;/div>
                &lt;/p>
            &lt;/form>
        &lt;/div>
    &lt;/div>
                    </code></pre>

                <img class="mx-auto d-block screen" src="public/img/screens/fraisInvalidescreen.PNG" alt=" frais non valides">
                <img class="mx-auto d-block screen" src="public/img/screens/fraiscorriges.PNG" alt=" frais corrigés">

                <p class="explication text-justify">
                    Du coté du controleur, on va donc comparer à nouveau l'action. Si celle-ci est valueReset, la page
                    va simplement etre rechargée avec l'id et le mois selectionner. Si elle est égale a valueCorrect,
                    l'on va vérifier si chaque valeur récupérée via la méthode POST est un entier positif grâce à la
                    fonction estEntierPositif(). Si toutes les valeurs retourne "true", chaque valeur entrée sera mise
                    dans un tableau associatif, lui-même utilisé dans la méthode majFraisForfait de la classe PDO.
                </p>
                <p> On oublie pas également de rajouter les variables $hidden et $hidden 2, initialement égale à
                    "hidden" pour pouvoir masquer les divs. Lors de la correction ou si les chiffres saisis ne sont pas
                    des entiers positifs, la variable correspondante est remise a vide afin de pouvoir afficher la div
                    d'alerte.
                </p>

                <pre><code class="php">
$hidden2 = $hidden = 'hidden';

      [...]

}elseif ($action === 'valueReset'){
    $selectedId = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_STRING);
    $selectedMonth = filter_input(INPUT_GET, 'month', FILTER_SANITIZE_STRING);
    $lesMoisVisiteur = $pdo->getLesMoisDisponibles($selectedId);

}elseif ($action === 'valueCorrect'){
    $selectedId = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_STRING);
    $selectedMonth = filter_input(INPUT_GET, 'month', FILTER_SANITIZE_STRING);
    $lesMoisVisiteur = $pdo->getLesMoisDisponibles($selectedId);

    if (estEntierPositif($_POST['forfaitEtape'])){
        if (estEntierPositif($_POST['fraisKm'])){
            if (estEntierPositif($_POST['nuitHotel'])){
                if (estEntierPositif($_POST['repasRestaurant'])){
                    $lesFrais = [
                        "ETP" => $_POST['forfaitEtape'],
                        "KM" => $_POST['fraisKm'],
                        "NUI" => $_POST['nuitHotel'],
                        "REP" => $_POST['repasRestaurant'],
                    ];
                    $pdo->majFraisForfait($selectedId, $selectedMonth, $lesFrais);
                    $hidden = '';
                }else{
                    $hidden2 = '';
                }
            }else {
                $hidden2 = '';
            }
        }else {
            $hidden2 = '';
        }
    }else {
        $hidden2 = '';
    }
}
                    </code></pre>
            </div>

            <!-- ________________________________________________ETAPE 8 _________________________________________ -->
            <div id="step8" class="step">
                <div class="Title2 mx-auto">
                    8. Affichage des frais hors forfait
                    <a class="badge badge-info" style="margin-bottom: 1%" href="#TDM"><i class="fas fa-bars"></i></a>
                </div>

                <p class="text-justify explication"> Il faut a présent afficher dans la partie inférieur de la page les
                    frais hors forfait, qui seront présentés dans un tableau, avec un frais par ligne.
                    <br>Dans chaque ligne du tableau, on met un formulaire, qui contiendra
                    ensuite les cases de la lignes, elles mêmes contenant des inputs et des boutons.
                </p>

                <img class="mx-auto d-block screen" src="public/img/screens/VueComptableHorsForfait.PNG" alt="vue comptable hors forfait">

                <p class="text-justify explication font-weight-bold"> Pour ce faire, il
                    faut d'abord récupérer les frais hors forfaits grâce à la méthode getLesFraisHorsForfait() de la
                    classe Pdo où l'on passe à nouveau en argument l'id et le mois selectionnés. On récupère également le nombre de justificatif qu'à fournit le visiteur :
                </p>

                <pre><code class="php">
 //RECUPERATION DES FRAIS HORS FORFAIT
$lesFraisHFVisiteur = $pdo->getLesFraisHorsForfait($selectedId, $selectedMonth);

 //RECUPERATION DES JUSTIFICATIFS
$nbJustificatifs = $pdo->getNbjustificatifs($selectedId, $selectedMonth);
                    </code></pre>

                <p class="text-justify font-weight-bold explication">
                    On mets dans un foreach le formulaire et les boutons, en parametrant une nouvelle action pour chaque :
                </p>

                <pre><code class="html">
 &lt;div class="panel panel-orange">
        &lt;div class="panel-heading panel-heading-orange">Descriptif des éléments hors forfait&lt;/div>
            &lt;table class="table table-bordered table-responsive">
                    &lt;tr>
                        &lt;th class="font-weight-bold"> Date&lt;/th>
                        &lt;th class="font-weight-bold"> Libellé&lt;/th>
                        &lt;th class="font-weight-bold"> Montant&lt;/th>
                        &lt;th class="font-weight-bold">&lt;/th>
                    &lt;/tr>
                    &lt;?php
                    foreach ($lesFraisHFVisiteur as $unFraisHF) {
                        ?>
                        &lt;tr>
                            &lt;form id="HorsForfait&lt;?php echo $unFraisHF['id'] ?>" method="post"
                                  action="index.php?uc=validationFrais&action=HFCorrect&id=&lt;?php echo $selectedId ?>&month=&lt;?php echo $selectedMonth ?>">
                                &lt;th>
                                    &lt;input type="date" class="form-control" name="date"
                                           value="&lt;?php echo $unFraisHF['date'] ?>">
                                &lt;/th>
                                &lt;th>
                                    &lt;input type="text" class="form-control" name="libelle"
                                           value="&lt;?php echo $unFraisHF['libelle'] ?>">
                                &lt;/th>
                                &lt;th>
                                    &lt;input type="number" class="form-control" name="montant" step="0.01"
                                           value="&lt;?php echo $unFraisHF['montant'] ?>">
                                &lt;/th>
                                &lt;th>
                                    &lt;button type="submit" class="btn btn-success btn-xs">Corriger&lt;/button>
                                    &lt;a type="button"
                                       href="index.php?uc=validationFrais&action=HFdenied&id=&lt;?php echo $selectedId ?>&month=&lt;?php echo $selectedMonth ?>&idHF=&lt;?php echo $unFraisHF['id'] ?>"
                                       class="btn btn-danger btn-xs">Refuser&lt;/a>
                                &lt;/th>
                            &lt;/form>
                        &lt;/tr>
                        &lt;?php
                    }
                    ?>
            &lt;/table>
            &lt;div class="alert alert-success text-center" &lt;?php echo $hidden3 ?> > Les frais ont été corrigés. &lt;/div>
        &lt;/div>
 &lt;/div>
 &lt;div class="row">
       &lt;div class="col-12">
            &lt;form id="nbJustificatifs" method="post"
                  action="index.php?uc=validationFrais&action=ValidFiche&id= &lt;?php echo $selectedId ?>&month= &lt;?php echo $selectedMonth ?>">
                  &lt;input type="number" class="form-control input1" name="justificatifs" value=" &lt;?php echo $nbJustificatifs?>">
                  &lt;button type="submit" class="btn btn-success btn-xs">Valider fiche &lt;/button>
            &lt;/form>
            &lt;br>
            &lt;br>
       &lt;/div>
 &lt;/div>
                    </code></pre>

                <p class="text-justify font-weight-bold explication">
                    On définit maintenant les procédure à suivre selon les actions "HFCorrect", qui corrigera les frais
                    hors forfait, "HFDenied" qui refusera un frais hors forfait et "ValidFiche" qui enverra le nouveau
                    nombre de justificatifs saisi et passera en "valider" la fiche de frais. Elles appeleront
                    respectivement majFraisHorForfait(), refusHorsForfait() (fonctions créées dans la classe pdo: cf plus
                    bas) ainsi que majNbJustificatifs() et majEtatFicheFrais() :
                </p>

                <pre><code class="php">
}elseif ($action === 'HFCorrect'){
    $selectedId = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_STRING);
    $selectedMonth = filter_input(INPUT_GET, 'month', FILTER_SANITIZE_STRING);
    $dateFraisHF = $_POST['date'];
    $lesFraisHF = [
        "date" => $dateFraisHF,
        "montant" => $_POST['montant'],
        "libelle" => $_POST['libelle']
    ];
    $lesMoisVisiteur = $pdo->getLesMoisDisponibles($selectedId);
    $pdo->majFraisHorsForfait($selectedId, $selectedMonth, $lesFraisHF);
    $hidden3 = '';

}elseif ($action === 'HFdenied'){
    $selectedId = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_STRING);
    $selectedMonth = filter_input(INPUT_GET, 'month', FILTER_SANITIZE_STRING);
    $idHF = filter_input(INPUT_GET, 'idHF', FILTER_SANITIZE_STRING);
    $pdo->refusFraisHorsForfait($selectedId, $selectedMonth, $idHF);
    $lesMoisVisiteur = $pdo->getLesMoisDisponibles($selectedId);

}else if ($action === 'ValidFiche'){
    $selectedId = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_STRING);
    $selectedMonth = filter_input(INPUT_GET, 'month', FILTER_SANITIZE_STRING);
    $lesMoisVisiteur = $pdo->getLesMoisDisponibles($selectedId);
    $nbJustificatifs = $_POST['justificatifs'];

    $pdo->majNbJustificatifs($selectedId, $selectedMonth, $nbJustificatifs);
    $pdo->majEtatFicheFrais($selectedId, $selectedMonth, 'VA');
    $hidden4='';
}
                    </code></pre>
            </div>

            <p class="text-justify font-weight-bold explication">
                Comme dit précedemment, la création des fonctions majFraisHorsForfait() et refusFraisHorsForfait() on
                été rajoutée à la classe Pdo. Dans cette deuxième fonction, la terme "REFUSE:" a été ajouté par
                concaténation au libellé du frais :
            </p>

            <pre><code class="php">
public function majFraisHorsForfait($idVisiteur, $mois, $lesFrais){

      $date = $lesFrais['date'];
      $libelle = $lesFrais['libelle'];
      $montant = $lesFrais['montant'];

      $requetePrepare = PdoGSB::$monPdo->prepare(
            'UPDATE lignefraishorsforfait '
            . 'SET lignefraishorsforfait.date = :uneDate, '
            . 'lignefraishorsforfait.libelle = :unLibelle, '
            . 'lignefraishorsforfait.montant = :unMontant '
            . 'WHERE lignefraishorsforfait.idvisiteur = :unIdVisiteur '
            . 'AND lignefraishorsforfait.mois = :unMois '
      );
      $requetePrepare->bindParam(':uneDate', $date, PDO::PARAM_STR);
      $requetePrepare->bindParam(':unLibelle', $libelle, PDO::PARAM_STR);
      $requetePrepare->bindParam(':unMontant', $montant, PDO::PARAM_STR);
      $requetePrepare->bindParam(':unIdVisiteur', $idVisiteur, PDO::PARAM_STR);
      $requetePrepare->bindParam(':unMois', $mois, PDO::PARAM_STR);
      $requetePrepare->execute();

}

    public function refusFraisHorsForfait($idVisiteur, $mois, $idFrais){
        $requetePrepare = PdoGSB::$monPdo->prepare(
            'UPDATE lignefraishorsforfait '
            . 'SET lignefraishorsforfait.libelle = CONCAT( "REFUSE:", lignefraishorsforfait.libelle) '
            . 'WHERE lignefraishorsforfait.idvisiteur = :unIdVisiteur '
            . 'AND lignefraishorsforfait.mois = :unMois '
            . 'AND lignefraishorsforfait.id = :idFrais'
        );
        $requetePrepare->bindParam(':idFrais', $idFrais, PDO::PARAM_INT);
        $requetePrepare->bindParam(':unIdVisiteur', $idVisiteur, PDO::PARAM_STR);
        $requetePrepare->bindParam(':unMois', $mois, PDO::PARAM_STR);
        $requetePrepare->execute();
}
                </code></pre>
            
        </div>
    </div>
</div>
