<?php


include_once 'Db.php';
include_once 'Actions.php';
include_once 'Session.php';

class Events
{
    private $action = null;
    private $rq = null;
    private $db = null;
    private $session = null;
    private $rqList = [ //Liste des requetes qu'on peut effectuer sur le serveur
        'validation',
        'inscription',
        'CGU',
        'connexion',
        'quiSommesNous',
        'formInscription',
        'formConnexion',
        'deconnexion',
         'acceuil',
        'espaceMembre',
        'addEvent',
        'formCreaEvent',
        'formNewMdp',
        'vosEvenements',
        'pageEventInfos',
        'formAjoutInv',
        'formFournitures',
        'mdpOublie',
        'formMdpOublie',
        'commentaire',
        'formQuantite',
        'afficheInv',
        'afficheFour',
        'afficheComm',
        'historiqueEvents',
        'contactForm',
        'ajoutParticipant',
        'supprParticipant',
        'afficheParticipants',
        'index',
        'modifEvent',
        'suppEvent',
        'formModifEvent',
        'privacy',
        'downloadAppli'
    ];

    public function __construct()
    {
        $this->action = new Actions(); //Instance de la classe d'action
        $this->session = new Session(); //Instance de la classe de la session
        $this->db = new Db(); //Instance de la classe db
        if(isset($_GET['rq'])) $this->rq = $_GET['rq'];
        $this->gestionRequetes($this->rq);
    }

    /**
     * Accessseur qui va servir dans index.php
     * Contient la requête passé au serveur
     *    @return null
     */

    public function getRq()
    {
        return $this->rq;
    }

    /**
     * Fonction qui verifie si la requete passée est dans le tableau des requetes
     * @param $rq requete effectue
     * @return bool
     */
    public function reqValid($rq){
        if(in_array($rq, $this->rqList)) return true;
        return false;
    }

    /**
     * Envoie les données vers le send d'action
     */
    public function send(){
        $this->action->send();
    }

    /**
     * Lecture des fichiers se trouvant dans le INC
     * @param $nomForm nom du formulaire ou la page passe
     * @return string le fichier
     */
    public function lectureForm($nomForm){
        $nomFichier = 'INC/'.$nomForm.'.php';
        return implode("\n", file($nomFichier));
    }


    /**
     * Renvoie la page d'inscription
     */
    private function inscription(){
        $this->action->affichageDefaut('.intro-text', $this->lectureForm('inscription'));
    }

    public function popUp(){
        $info = $this->db->procCall('infoPopUp', [$_SESSION['user']['idUser']]);
        $infoPopUp =  $info[0]['invitations'];
        if($infoPopUp != 0) $this->action->ajouterAction('popUp', $infoPopUp);
    }

    /**
     * Telechargement de l'application
     */

    private function downloadAppli(){
        $this->action->ajouterAction('downloadAppli', 'TEST.rar');
    }

    /**
     * Renvoie la page de modification d'event
     */
    private function modifEvent(){
        $infoEvent = $this->db->procCall('infoEvent', [$_SESSION['idEvent']]);
        $this->action->affichageDefaut('.intro-text', $this->lectureForm('modifEvent'));
        $this->action->ajouterAction('champEvent', $infoEvent);
    }

    /**
     * On modifie l"événement
     * On insère dans la base de données toutes les données
     */
    private function formModifEvent(){
        $this->db->procCall('modifEvent', [$_SESSION['idEvent'],$_POST['nomEvent'], $_POST['adresse'], $_POST['date'], $_POST['heure']]);
        $invites = $this->db->procCall('listeInvites', [$_SESSION['idEvent']]);
        $emails =[];
        foreach ($invites as $key => $value){
            $emails [] = $invites[$key]['email'];
        }
        $sendEmail = implode(", ", $emails);
        mail($sendEmail, "Modification de l'evenement",  "L'événement auquel vous avez été invité a été modifié, veuillez vous rendre sur notre page pour les voir");
        $this->vosEvenements();
    }

    /**
     * Appel la fonction de supp d'event
     */
    private function suppEvent(){
        $invites = $this->db->procCall('listeInvites', [$_SESSION['idEvent']]);
        $emails =[];
        foreach ($invites as $key => $value){
            $emails [] = $invites[$key]['email'];
        }
        $sendEmail = implode(", ", $emails);
        mail($sendEmail, "Suppression de l'evenement", "L'événement auquel vous avez été invité a été annulé par l'hôte de la soirée");
        $this->db->procCall('suppEvent',[$_SESSION['idEvent']]);
        $this->vosEvenements();
    }

    /**
     * Rnvoie la page des conditions generales
     */
    private function CGU(){
        $cgu['title'] = "Conditions générales d'utilisation - MANAGIS";
        $cgu['text'] = $this->lectureForm("cgu");
        $this->action->ajouterAction('cgu', $cgu);
    }

        /**
     * Envoi de mail pour le contact
     */
    private function contactForm(){
        mail('contact.managis@gmail.com', 'Contact de '.$_POST['name'],'Mail de contact '.$_POST['email']. ' Message: '. $_POST['message']);
        $this->action->ajouterAction('successMail', 'Nous avons reçu votre demande, nous essayeront de vous répondre le plus vite possible! ');
    }

    /**
     * La sous requete qui est la validation de chaque formulaire
     */
    private function validation(){
        $sRequest= '';
        if(isset($_POST['envoiForm'])) $sRequest = $_POST['envoiForm']; //Recupere le nm du formulaire
        $this->gestionRequetes($sRequest); //On renvoie vers la fonction qui gère les requetes
    }

    /**
     * Gestion de l'inscription au moment de validation du formulaire
     */
    private function formInscription(){
        if(empty($_SESSION['idEvent'])) {
            $idUser = $this->db->procCall('verifPseudo', [$_POST['pseudo']]); //On appelle la procèdure qui va verifier le pseudo
            $idMail = $this->db->procCall('verifEmail', [$_POST['email']]); //On appelle la procèdure qui va verifier le mail

            //Captcha
            $reponse = [];
            $clePriv = "6Lf1PsQUAAAAAAlTkF4jj-uRn93zUJQ-b_LuBetz";
            $rep = $_POST['g-recaptcha-response'];
            $remoteIp = $_SERVER['REMOTE_ADDR'];

            $api_url = "https://www.google.com/recaptcha/api/siteverify?secret="
                . $clePriv
                . "&response=" . $rep
                . "&remoteip=" . $remoteIp;

            $decode = json_decode(file_get_contents($api_url, true));
            foreach ($decode as $key => $value) {
                $reponse [] = $value;
            }

            //Verification si le user existe deja au moment de la verification
            if ($idUser || $idMail) {
                $this->action->affichageDefaut('.intro-text', $this->lectureForm('inscription'));
                $this->action->ajouterAction('errorUser', 'Le pseudo ou le mail est déjà utilisé');//On renvoie vers la balise error user avec le texte a afficher
            } //Si on ne cooche pas captcha
            else if (empty($rep)) {
                $this->action->ajouterAction('errorUser', 'Veuillez valider le reCAPTCHA');
            }
            //On verifie si les deux champs de mot de passe existe
            else if ($_POST['mdp'] != $_POST['confirmationMdp']) {
                $this->action->affichageDefaut('.intro-text', $this->lectureForm('inscription'));
                $this->action->ajouterAction('errorPass', 'Les deux mots de passes ne sont pas identiques');
            } //Sinon on peut effectuer l'inscription
            else {
                $this->db->procCall('creationUser', [$_POST['pseudo'], $_POST['email'], hash('md5', $_POST['mdp'])]); //On crée le user avec les champs recupères
                $idUser = $this->db->procCall('connexionUser', [$_POST['pseudo'], hash('md5', $_POST['mdp'])]); //On effectue la connexion de user pour qu'il soit deja connecte au moment de l'inscriptioin
                //On memorise les valeurs recuperés de la procèdure dans la superglobale
                $_SESSION['user'] = $idUser[0];
                $_SESSION['user']['pseudo'] = $idUser[0]['pseudo'];
                $_SESSION['user']['idUser'] = $idUser[0]['idUser'];
                if ($idUser) {
                    $datas = [
                        'pseudo' => $_SESSION['user']['pseudo']
                    ];
                    $this->affichageConnecte();
                }
            }
        }
        else {
            $idUser = $this->db->procCall('verifPseudo', [$_POST['pseudo']]); //On appelle la procèdure qui va verifier le pseudo
            $idMail = $this->db->procCall('verifEmail', [$_POST['email']]); //On appelle la procèdure qui va verifier le mail

            //Captcha
            $reponse = [];
            $clePriv = "6Lf1PsQUAAAAAAlTkF4jj-uRn93zUJQ-b_LuBetz";
            $rep = $_POST['g-recaptcha-response'];
            $remoteIp = $_SERVER['REMOTE_ADDR'];

            $api_url = "https://www.google.com/recaptcha/api/siteverify?secret="
                . $clePriv
                . "&response=" . $rep
                . "&remoteip=" . $remoteIp;

            $decode = json_decode(file_get_contents($api_url, true));
            foreach ($decode as $key => $value) {
                $reponse [] = $value;
            }

            //Verification si le user existe deja au moment de la verification
            if ($idUser || $idMail) {
                $this->action->affichageDefaut('.intro-text', $this->lectureForm('inscription'));
                $this->action->ajouterAction('errorUser', 'Le pseudo ou le mail est déjà utilisé');//On renvoie vers la balise error user avec le texte a afficher
            } //Si on ne cooche pas captcha
            else if ($reponse[0] == false) {
                $this->action->ajouterAction('errorUser', 'Veuillez valider le reCAPTCHA');
            } //On verifie si les deux champs de mot de passe existe
            else if ($_POST['mdp'] != $_POST['confirmationMdp']) {
                $this->action->affichageDefaut('.intro-text', $this->lectureForm('inscription'));
                $this->action->ajouterAction('errorPass', 'Les deux mots de passes ne se correspondent pas');
            } //Sinon on peut effectuer l'inscription
            else {
                $this->db->procCall('creationUser', [$_POST['pseudo'], $_POST['email'], hash('md5', $_POST['mdp'])]); //On crée le user avec les champs recupères
                $idUser = $this->db->procCall('connexionUser', [$_POST['pseudo'], hash('md5', $_POST['mdp'])]); //On effectue la connexion de user pour qu'il soit deja connecte au moment de l'inscriptioin
                //On memorise les valeurs recuperés de la procèdure dans la superglobale
                $_SESSION['user'] = $idUser[0];
                $_SESSION['user']['pseudo'] = $idUser[0]['pseudo'];
                $_SESSION['user']['idUser'] = $idUser[0]['idUser'];
                $this->db->procCall('ajouterInvites', [$_SESSION['user']['pseudo'], $_SESSION['idEvent']]);
                $_SESSION['idEvent'] = [];
                if ($idUser) {
                    $datas = [
                        'pseudo' => $_SESSION['user']['pseudo']
                    ];
                    $this->affichageConnecte();
                }
            }
        }
    }


    /**
     * On renvoie le formulaire de connexion
     */
    private function connexion(){
        $this->action->affichageDefaut('.intro-text', $this->lectureForm('connexion'));
        $this->action->affichageDefaut('#navbarResponsive', '<ul class="navbar-nav text-uppercase ml-auto"><li class="nav-item"><a class="nav-link js-scroll-trigger" href="index.php">Accueil</a></li></ul>');
    }

    /**
     * Gestion de la connexion
     */
    private function formConnexion(){
       $user = $this->db->procCall('connexionUser', [$_POST['pseudo'], hash('md5', $_POST['mdp'])]); //Porcedure qui permet de se connecter appellé
       //Si la procèdure renvoie quelque chose
       if($user){
           //On memorise les données retournés dans la superglobale
           $_SESSION['user'] = $user[0];
           $_SESSION['user']['idUser'] = $user[0]['idUser'];
           $_SESSION['user']['pseudo'] = $user[0]['pseudo'];
           $this->affichageConnecte();
       }
       //Sinon on renvoie ceci à l'utilisateur
       else {
           $this->action->ajouterAction( 'errorUser',"Le pseudo ou le mot de passe est incorrect");
       }
    }

    /**
     * Affiche la nouvelle navbar après la connexion
     *
     */
    private function affichageConnecte(){
        $vosEvenements =
            '<li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle btn btn-outline-light" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="glyphicon glyphicon-calendar"></span> Gestion des événements
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                    <a class="dropdown-item" href="addEvent.php">CREER VOTRE EVENEMENT</a>
                    <a class="dropdown-item" href="vosEvenements.php">EVENEMENTS A VENIR</a>
                    <a class="dropdown-item" href="historiqueEvents.php">HISTORIQUE DE VOS EVENEMENTS</a>
                </div>
                </li>';
        $gestionCompte =
            '<li class="nav-item">
                <a href="espaceMembre.php" id="espaceMembre" class="nav-link js-scroll-trigger">Gestion de  compte</a>
            </li>';
        $deconnexion =
            '<li class="nav-item">
                <a href="deconnexion.php" id="deconnexion" class="nav-link js-scroll-trigger"> Déconnexion</a>
            </li>';
        $introText =
            '<div class="intro-lead-in">Bienvenue sur Managis</div>
             <div class="intro-heading text-uppercase">Organisez au mieux vos événements! </div>
             <a class="btn btn-primary btn-xl text-uppercase js-scroll-trigger" href="addEvent.php">Commencez dès maintenant !</a>';
        $this->action->affichageDefaut('#navbarResponsive', '<ul class="navbar-nav text-uppercase ml-auto">'.$vosEvenements. $gestionCompte. $deconnexion.'</ul>');
        $this->action->affichageDefaut('.intro-text', $introText);
        $this->popUp();
    }

    /**
     * Gestion de la deconnexion
     */
    private function deconnexion(){
        //On vide les superglobales pour eviter d'avoir des erreurs
        $_SESSION['user'] = [];
        $_SESSION['idEvent'] = [];
        $this->action->ajouterAction('deconnexion', '');
    }

    /**
     * Renvoie le formulaire d'ajout de l'evenement
     */
    private function addEvent(){
       $this->action->affichageDefaut('.intro-text', $this->lectureForm('addEvent'));
       $this->popUp();
    }

    /**
     * Creation de l'evenement
     */
    private function formCreaEvent(){
        $this->db->procCall('creerEvent', [$_POST['nomEvent'], $_SESSION['user']['pseudo'], $_POST['adresse'], $_POST['date'], $_POST['heure']]);//Appel de la procèdure qui va servir de creation de l'evenement
        $this->vosEvenements(); //On appelle directement vos evenements

    }

    /**
     * Espace membre pour l'utilisateur
     */
    private function espaceMembre(){
            $this->action->affichageDefaut('.intro-text', $this->lectureForm('gestionCompte')); //On affiche la page de gestion de compte
           $infoMembre=  $this->db->procCall('espaceMembre', [$_SESSION['user']['pseudo']]); //On appelle la procedure qui affiche les donnes du client
           $this->action->ajouterAction('espaceMembre', $infoMembre); //On affiche au niveau de l'utilisateur les infos
    }

    /**
     * Changement du mot de passe
     */
    private function formNewMdp(){
        $verifMdp = $this->db->procCall('connexionUser', [$_SESSION['user']['pseudo'], hash('md5', $_POST['ancienMDP'])]); //On verifier si l'ancien mot de passe mis est bien celui la
        if($_POST['newMDP'] !=$_POST['confirmationMDP'] || !$verifMdp){ //Verification des donnes transmis dans le formulaire
            $this->action->ajouterAction('errorPass', "L'un des mot de passe ne correspond pas");
        }
        //On change de mot de passe pour l'utilisatur
        else {
            $this->db->procCall('modifMdp', [$_SESSION['user']['pseudo'], hash('md5', $_POST['newMDP'])]);
            $infoMembre=  $this->db->procCall('espaceMembre', [$_SESSION['user']['pseudo']]); //On appelle la procedure qui affiche les donnes du client

            $this->action->affichageDefaut('.intro-text', $this->lectureForm('gestionCompte'));

            $this->action->ajouterAction('espaceMembre', $infoMembre); //On affiche au niveau de l'utilisateur les infos
            $this->action->ajouterAction('modifMdp', 'Votre mot de passe a été changé avec succes');
        }
    }

    /**
     * Renvoie la page avec les evenements futur
     * L'utilisateur possède deux champs dont lequels il peut choisir
     * Soit les soirées où il organise
     * Soit les soirées où il est invité
     */
    private function vosEvenements(){
        $this->action->affichageDefaut('.intro-text', $this->lectureForm('pageEvent'));//Charge la page

        $vosInvitFutur =  $this->db->procCall('vosInvitFutur', [$_SESSION['user']['idUser'],$_SESSION['user']['pseudo']]); //Appelle la procèdure juste avec les evenements ou le user a ete invite
        $vosEventFutur = $this->db->procCall('vosEventFutur', [$_SESSION['user']['pseudo']]); //Appelle la procedure juste avec les evenements du user

        $this->action->ajouterAction('vosEventFutur', $vosEventFutur);//On envois les données vers le client sur les event futur crées pas l'utilisateur
        $this->action->ajouterAction('vosInvitFutur', $vosInvitFutur);//On envbois les données vers le client sur les event futur où le user a été invité

        $this->popUp();

    }

    /**
     * Affiche l'historique des événements
     * Soit les soirées où l'utilisateur a été invité
     * Soit les soirées où l'utilisateur a organisé
     */
    private function historiqueEvents(){
        $this->action->affichageDefaut('.intro-text', $this->lectureForm('historiqueEvents'));

        $vosInvitPasse =  $this->db->procCall('vosInvitPasse', [$_SESSION['user']['idUser'],$_SESSION['user']['pseudo']]); //Appelle la procèdure juste avec les evenements ou le user a ete invite
        $vosEventPasse = $this->db->procCall('vosEventPasse', [$_SESSION['user']['pseudo']]); //Appelle la procedure juste avec les evenements du user

        $this->action->ajouterAction('vosEventPasse', $vosEventPasse);//On envois les données vers le client
        $this->action->ajouterAction('vosInvitPasse', $vosInvitPasse);//On envbois les données vers ke client
    }

    /**
     * On affiche un tableau avec 3 données
     * Le nombre d'invités
     * Le nombre de fournitures
     * Le nombre de commentaires
     * @param $id de l'evenement
     */
    public function pageEventInfos($id){
        //On mémorise l'id du event dans la superglobale
        if(!empty($_SESSION['user'])) {
            $_SESSION['idEvent'] = $id;
            $nomEvent = $this->db->procCall('infoEvent', [$id]);
            //On renvoie le tableau à la page
            $this->action->affichageDefaut('#nombreInvFourComm', $this->lectureForm('infoSup'));
            $this->action->ajouterAction('affichageNomEvent', $nomEvent[0]['nomEvent']);
            //On appelle les procèdures nécessaires
            $nombreInv = $this->db->procCall('nombreInv', [$id]);
            $nombreComm = $this->db->procCall('nombreComm', [$id]);
            $nombreFour = $this->db->procCall('nombreFour', [$id]);
            $nombreParticipant =  $this->db->procCall('nombreParticipant', [$id]);

            $afficheInv =  $this->db->procCall('listeInvites', [$id]);
            $verif = array_intersect([$afficheInv[0]['pseudo']], [$_SESSION['user']['pseudo']]);

            $afficherSuppr = array_intersect([$afficheInv[0]['pseudo']], [$_SESSION['user']['pseudo']]);

            $this->action->affichageDefaut('#afficheInfos', "");

            //On affiche le tableau avec les données niveau
            $this->action->ajouterAction('infoEvent', [$nombreInv, $nombreFour, $nombreComm, $nombreParticipant, $id]);
            if($afficherSuppr) $this->action->ajouterAction('afficherSuppr', '');
            if(empty($verif)){
                $this->action->ajouterAction('afficheParticipe', $id);
            }

            $vosInvitFutur =  $this->db->procCall('vosInvitFutur', [$_SESSION['user']['idUser'],$_SESSION['user']['pseudo']]);
            foreach ($vosInvitFutur as $key => $value){
                $participe =   $this->db->procCall('listeParticipant', [$vosInvitFutur[$key]['idEvent']]);
                foreach ($participe as $key => $value) {
                    $verif = array_intersect([$participe[$key]['pseudo']], [$_SESSION['user']['pseudo']]);
                    if ($verif) $this->action->ajouterAction('participe', $participe[$key]['idEvent']);
                }
            }
        }
        else {
            $_SESSION['idEvent'] = $id;
           include_once 'infoSupAno.php';
        }
    }

    /**
     * Client peux se rediriger vers index.php
     */
    private function index(){
        $this->action->ajouterAction('retourIndex', '');
    }

    /**
     * Ajoute à la liste des participants
     */

    private function ajoutParticipant(){
        $nombreInv = $this->db->procCall('nombreInv', [$_SESSION['idEvent']]);
        $nombreComm = $this->db->procCall('nombreComm', [$_SESSION['idEvent']]);
        $nombreFour = $this->db->procCall('nombreFour', [$_SESSION['idEvent']]);

        $this->db->procCall('ajoutParticipant', [$_SESSION['idEvent'], $_SESSION['user']['idUser']]);
        $nombreParticipant =  $this->db->procCall('nombreParticipant', [$_SESSION['idEvent']]);
        $listeParticipant =  $this->db->procCall('listeParticipant', [$_SESSION['idEvent']]);

        $afficheInv =  $this->db->procCall('listeInvites', [$_SESSION['idEvent']]);
        $verif = array_intersect([$afficheInv[0]['pseudo']], [$_SESSION['user']['pseudo']]);

        $this->action->ajouterAction('infoEvent', [$nombreInv, $nombreFour, $nombreComm, $nombreParticipant, $_SESSION['idEvent']]);
        if(empty($verif)){
            $this->action->ajouterAction('afficheParticipe',  $_SESSION['idEvent']);
        }

        $this->action->ajouterAction('ajoutParticipant', $_SESSION['idEvent']);
        $this->action->ajouterAction('listeParticipant', $listeParticipant);

    }

    /**
     * Enleve le participant de la liste des participants
     */
    private function supprParticipant(){
        $nombreInv = $this->db->procCall('nombreInv', [$_SESSION['idEvent']]);
        $nombreComm = $this->db->procCall('nombreComm', [$_SESSION['idEvent']]);
        $nombreFour = $this->db->procCall('nombreFour', [$_SESSION['idEvent']]);

        $this->db->procCall('supprParticipant', [$_SESSION['idEvent'], $_SESSION['user']['idUser']]);
        $nombreParticipant =  $this->db->procCall('nombreParticipant', [$_SESSION['idEvent']]);

        $afficheInv =  $this->db->procCall('listeInvites', [$_SESSION['idEvent']]);
        $verif = array_intersect([$afficheInv[0]['pseudo']], [$_SESSION['user']['pseudo']]);

        
        $this->action->ajouterAction('supprParticipant', $_SESSION['idEvent']);
        $this->action->ajouterAction('infoEvent', [$nombreInv, $nombreFour, $nombreComm, $nombreParticipant]);
        $listeParticipant =  $this->db->procCall('listeParticipant', [$_SESSION['idEvent']]);
        $this->action->ajouterAction('listeParticipant', $listeParticipant);

        if(empty($verif)){
            $this->action->ajouterAction('afficheParticipe',  $_SESSION['idEvent']);
        }
    }

    /**
     * Affiche le tableau avec les invites
     * Avec la possibilité de rajouter les invites
     * On ne peut pas apporter de modifications lorsque l'evenement est passé
     */
    private function afficheInv(){
        //On appelle les procèdures requises
       $afficheInv =  $this->db->procCall('listeInvites', [$_SESSION['idEvent']]);
        $tousLesUser = $this->db->procCall('tousLesUsers', ['']);
        //Si le user connecté est le premier sur la liste d'invités il est hote donc il a droit de supprimer les invités
        $afficherSuppr = array_intersect([$afficheInv[0]['pseudo']], [$_SESSION['user']['pseudo']]);

        foreach($afficheInv as $key => $value){
            $afficheParticip [] = $value['pseudo'];
        }

        //On affiche le formulaire ainsi que le tableau niveau client
        $this->action->affichageDefaut('#afficheInfos', $this->lectureForm('listeInvites'));

        //On affiche les données dans le tableau niveau user
        $this->action->ajouterAction('listeInvites', $afficheInv);
        $this->action->ajouterAction('tousLesPseudos', $tousLesUser);

        //Affichage de la possibilité de suppression si le user est hote
        if($afficherSuppr) $this->action->ajouterAction('afficherSuppr', '');

    }

    /**
     * Affiche le tableau avec les fournitures
     * Avec la possibilité de rajouter les fournitures
     */
    private function afficheFour(){
        //On appelle les procèdures requises
        $verifInvite = $this->db->procCall('listeInvites', [$_SESSION['idEvent']]);
        $listeFour = $this->db->procCall('listeFourniture',[$_SESSION['idEvent']]);

        //Si le user connecté est le premier sur la liste d'invités il est hote donc il a droit de supprimer les fournitures
        $afficherSuppr = array_intersect([$verifInvite[0]['pseudo']], [$_SESSION['user']['pseudo']]);
        //On affiche le formulaire ainsi que le tableau niveau client
        $this->action->affichageDefaut('#afficheInfos', $this->lectureForm('listeFourniture'));


        //On affiche les données dans le tableau niveau user
        $this->action->ajouterAction('listeFourniture', $listeFour);
        //Affichage de la possibilité de suppression si le user est hote
        if($afficherSuppr) $this->action->ajouterAction('afficherSuppr', '');


    }

    /**
     * Affiche le tableau avec les commentaires
     * Avec la possibilité de rajouter les commentaires
     */
    private function afficheComm(){
        //Procedures requises
        $verifInvite = $this->db->procCall('listeInvites', [$_SESSION['idEvent']]);
        $listeComm = $this->db->procCall('listeCommentaire',[$_SESSION['idEvent']]);
        //Si le user connecté est le premier sur la liste d'invités il est hote donc il a droit de supprimer les commentaires
        $afficherSuppr = array_intersect([$verifInvite[0]['pseudo']], [$_SESSION['user']['pseudo']]);
        //On affiche le formulaire ainsi que le tableau niveau client
        $this->action->affichageDefaut('#afficheInfos', $this->lectureForm('listeCommentaire'));

        //On affiche les données dans le tableau niveau user
        $this->action->ajouterAction('listeComm', $listeComm);
        //Affichage de la possibilité de suppression si le user est hote
        if($afficherSuppr) $this->action->ajouterAction('afficherSuppr', '');
    }
    private function afficheParticipants(){
       $listeParticipant =  $this->db->procCall('listeParticipant', [$_SESSION['idEvent']]);
        $this->action->affichageDefaut('#afficheInfos', $this->lectureForm('listeParticipant'));
        $this->action->ajouterAction('listeParticipant', $listeParticipant);
    }
    /**
     * Ajout de l'invite
     */
    private function formAjoutInv(){
        //Appel des procèdures requises
        $user = $this->db->procCall('verifPseudo', [$_POST['pseudoInv']]);
        $pseudo = $_POST['pseudoInv'];
        $verifInvite = $this->db->procCall('listeInvites', [$_SESSION['idEvent']]);

        $list =  [];
        //On recupere les pseudos
        foreach($verifInvite as $key){
            $list [] = $key['pseudo'];
        }

        //Verifie si le pseudo mis dans le formulaire existe dans la BDD
        $resultatSansEspaces = array_intersect($list, [$_POST['pseudoInv']]);
        $enleverEspaces = trim($pseudo);
        $resultatAvecEspaces = array_intersect($list, [$enleverEspaces]);
        $afficherSuppr = array_intersect([$verifInvite[0]['pseudo']], [$_SESSION['user']['pseudo']]);
        $testMail = strpos($pseudo, '@');

        //On renvoie vers le client le message d'erreur si le pseudo transmis n'existe pas
        if(!$user && !$resultatSansEspaces && !$resultatAvecEspaces && !empty($pseudo) && $testMail){
            mail($pseudo, 'Invitation dans un nouvel evenement', 'Bonjour, un de vos amis vous a invité à son événement rejoignez le ici: https://managis.be/index.php?rq='.$_SESSION['idEvent']);
            $this->action->ajouterAction('succInv', "Un mail d'invitation a été envoyé");
        }

        else if(empty($pseudo)){
            $this->action->ajouterAction('errorInv', "Veuillez spécifier le pseudo");
        }

        else if($resultatAvecEspaces || $resultatSansEspaces){
            $this->action->ajouterAction('errorInv', "La personne invité se trouve dans la liste");
        }

        else if(empty($user)) {
            $this->action->ajouterAction('errorInv', "La personne specifé n'est inscrite, veuillez spécifier son mail pour l'inviter à votre événement !");
        }

        //Sinon on rajoute l'invite et on l'affiche dans la liste
        else {
            $this->db->procCall('ajouterInvites',[$_POST['pseudoInv'], $_SESSION['idEvent']]);
            $invites= $this->db->procCall('listeInvites', [$_SESSION['idEvent']]);
            $nombreInv = $this->db->procCall('nombreInv', [$_SESSION['idEvent']]);
            $nombreComm = $this->db->procCall('nombreComm', [$_SESSION['idEvent']]);
            $nombreFour = $this->db->procCall('nombreFour', [$_SESSION['idEvent']]);
            $nombreParticipant =  $this->db->procCall('nombreParticipant', [$_SESSION['idEvent']]);
            $pseudos = $this->db->procCall('tousLesUsers', ['']);
            $mailInv = $this->db->procCall('mailInv', [$user[0]['idUser']]);
            $mail= $mailInv[0]['email'];

            $this->action->affichageDefaut('#listeInvites', $this->lectureForm('listeInvites'));
            $this->action->affichageDefaut('#nombreInvFourComm', $this->lectureForm('infoSup'));

            $this->action->ajouterAction('succInv', 'Le pseudo a été rajouté avec succes');
            $this->action->ajouterAction('tousLesPseudos', $pseudos);
            $this->action->ajouterAction('listeInvites', $invites);
            $this->action->ajouterAction('infoEvent', [$nombreInv, $nombreFour, $nombreComm, $nombreParticipant]);
            mail($mail, "Invitation à l'evenement", "Vous avez été invité à l'événement, veuillez vous connecter pour précisez si vous participez à l'événement https://managis.be");

            if($afficherSuppr) $this->action->ajouterAction('afficherSuppr', '');
        }
    }

    /**
     * Formulaire des fournitures
     */
    private function formFournitures(){
        $verifFourniture= $this->db->procCall('listeFourniture', [$_SESSION['idEvent']]);
        $verifInvite = $this->db->procCall('listeInvites', [$_SESSION['idEvent']]);
        $list =  [];

        foreach($verifFourniture as $key){
            $list [] = $key['fourniture'];
        }

        //On verifie si la fourniture transmise se trouve déjà dans la BDD
        $resultatSansEspaces = array_intersect($list, [$_POST['fourniture']]);
        $enleverEspaces= trim($_POST['fourniture']);
        $resultatAvecEspaces = array_intersect($list, [$enleverEspaces]);
        $afficherSuppr = array_intersect([$verifInvite[0]['pseudo']], [$_SESSION['user']['pseudo']]); //Droits d'admin

        //On renvoie le message d'erreur au client
        if($_POST['fourniture'] == ''  || $resultatSansEspaces || $resultatAvecEspaces){
            $this->action->ajouterAction('errorUser', 'La fourniture se trouve déjà dans la liste');
        }

        //Sinon on ajoute la fourniture à la liste et on la fait afficher
        else {
            $this->db->procCall('ajouterFournitures', [$_SESSION['idEvent'], $_POST['fourniture']]);

            $this->action->affichageDefaut('#fournitures', $this->lectureForm('listeFourniture'));

            $listeFournitures = $this->db->procCall('listeFourniture', [$_SESSION['idEvent']]);
            $nombreInv = $this->db->procCall('nombreInv', [$_SESSION['idEvent']]);
            $nombreComm = $this->db->procCall('nombreComm', [$_SESSION['idEvent']]);
            $nombreFour = $this->db->procCall('nombreFour', [$_SESSION['idEvent']]);
            $nombreParticipant =  $this->db->procCall('nombreParticipant', [$_SESSION['idEvent']]);

            $afficheInv =  $this->db->procCall('listeInvites', [$_SESSION['idEvent']]);
            $verif = array_intersect([$afficheInv[0]['pseudo']], [$_SESSION['user']['pseudo']]);

            $this->action->ajouterAction('modifMdp', 'La fourniture a été ajoutée avec succes');
            $this->action->ajouterAction('infoEvent', [$nombreInv, $nombreFour, $nombreComm, $nombreParticipant, $_SESSION['idEvent']]);
            $this->action->ajouterAction('listeFourniture', $listeFournitures);

            if(empty($verif)){
                $this->action->ajouterAction('afficheParticipe', $_SESSION['idEvent']);
            }
            $vosInvitFutur =  $this->db->procCall('vosInvitFutur', [$_SESSION['user']['idUser'],$_SESSION['user']['pseudo']]);
            foreach ($vosInvitFutur as $key => $value){
                $participe =   $this->db->procCall('listeParticipant', [$vosInvitFutur[$key]['idEvent']]);
                foreach ($participe as $key => $value){
                    $verif = array_intersect([$participe[$key]['pseudo']], [$_SESSION['user']['pseudo']]);
                    if($verif) $this->action->ajouterAction('participe', $participe[$key]['idEvent']);
                }

            }

            if($afficherSuppr) $this->action->ajouterAction('afficherSuppr', '');

        }
    }

    /**
     * Formulaire des quantites souhaités pour le event
     */
    private function formQuantite(){
        $listeQuantite = [];
        //On envoie les clés(nom de fourniture) et valeurs(quantite desiré) vers la BDD
        foreach ($_POST['fourniture'] as $key => $value){
            $listeQuantite['valeurs'] = $_POST['fourniture'][$key];
            $listeQuantite['cle'] = $key;
            $this->db->procCall('ajoutQuantite', [$_SESSION['idEvent'], $listeQuantite['cle'],$listeQuantite['valeurs']]);
        }

    }

    /**
     * Ajout des commentaires par rapport à l'event
     */
    private function commentaire(){
        $commentaire = $_POST['commentaire'];
        $verifInvite = $this->db->procCall('listeInvites', [$_SESSION['idEvent']]); //Droits d'admin
        $afficherSuppr = array_intersect([$verifInvite[0]['pseudo']], [$_SESSION['user']['pseudo']]);//Droits d'admin

        //Verification si le commentaires n'est pas nul
        if(empty($_POST['commentaire'])){
            $this->action->ajouterAction('errorComm', "Veuillez introduire un commentaire avant de l'ajouter");
        }
        //Sinon on ajoute le commentaire à la liste et on l'affiche
        else {
            $this->db->procCall('ajoutCommentaire', [$_SESSION['idEvent'], $_SESSION['user']['idUser'], $commentaire]);
            $this->action->affichageDefaut('#fournitures', $this->lectureForm('listeFourniture'));

            $listeComm = $this->db->procCall('listeCommentaire', [$_SESSION['idEvent']]);
            $listeFournitures = $this->db->procCall('listeFourniture', [$_SESSION['idEvent']]);
            $nombreInv = $this->db->procCall('nombreInv', [$_SESSION['idEvent']]);
            $nombreComm = $this->db->procCall('nombreComm', [$_SESSION['idEvent']]);
            $nombreFour = $this->db->procCall('nombreFour', [$_SESSION['idEvent']]);
            $nombreParticipant =  $this->db->procCall('nombreParticipant', [$_SESSION['idEvent']]);

            $afficheInv =  $this->db->procCall('listeInvites', [$_SESSION['idEvent']]);
            $verif = array_intersect([$afficheInv[0]['pseudo']], [$_SESSION['user']['pseudo']]);

            $this->action->ajouterAction('infoEvent', [$nombreInv, $nombreFour, $nombreComm, $nombreParticipant, $_SESSION['idEvent']]);
            $this->action->ajouterAction('listeComm', $listeComm);
            $this->action->ajouterAction('listeFourniture', $listeFournitures);

            if(empty($verif)){
                $this->action->ajouterAction('afficheParticipe', $_SESSION['idEvent']);
            }
            $vosInvitFutur =  $this->db->procCall('vosInvitFutur', [$_SESSION['user']['idUser'],$_SESSION['user']['pseudo']]);
            foreach ($vosInvitFutur as $key => $value){
                $participe =   $this->db->procCall('listeParticipant', [$vosInvitFutur[$key]['idEvent']]);
                foreach ($participe as $key => $value){
                    $verif = array_intersect([$participe[$key]['pseudo']], [$_SESSION['user']['pseudo']]);
                    if($verif) $this->action->ajouterAction('participe', $participe[$key]['idEvent']);
                }

            }

            if($afficherSuppr) $this->action->ajouterAction('afficherSuppr', '');
        }
    }

    /**
     * Renvoie le formulaire de mot de passe oublié
     */
    private function mdpOublie(){
        $this->action->affichageDefaut('.intro-text', $this->lectureForm('mdpOublie'));
    }

    /**
     * On gere le formulaire de mot de passe oublié
     */
    private function formMdpOublie()
    {
        $verifPseudo = $this->db->procCall('verifPseudo', [$_POST['pseudo']]);
        $verifMail = $this->db->procCall('verifEmail', [$_POST['email']]);

        $mail = $_POST['email'];
        $pseudo = $_POST['pseudo'];

        //On verifie l'existence et du mail transmis dans le formulaire
        if (!$verifMail || !$verifPseudo || $_POST['pseudo'] = '' || $_POST['email'] = '') {
            $this->action->ajouterAction('errorUser', 'Le pseudo ou le mail est incorrect');
        }
        //Sinon on genere le nouveau mot de passe et on le transmet par mail du user
        else {
            $this->action->ajouterAction('modifMdp', 'Votre mot de passe vous a été envoyé par mail, veuillez passer à la connexion <a href="connexion.php"> Connectez vous! </a>');
            $chaineNewMdp = "abcdefghijklmnopqrstuvwxyz0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ";
            $melangeChaine = str_shuffle($chaineNewMdp);
            $nouveauMdp = substr($melangeChaine, 0, 8);
            $this->db->procCall('modifMdp', [$pseudo, hash('md5', $nouveauMdp)]);
            mail($mail, 'Recuperation du mot de passe', 'Bonjour ' . $pseudo . ' voici votre nouveau mot de passe: ' . $nouveauMdp);
        }
    }

    /**
     * Suppression du commentaire
     * @param $req requete effecuté par le client
     */
    private function supprimerCommentaire($req){
        $verifInvite = $this->db->procCall('listeInvites', [$_SESSION['idEvent']]);
        $nombreFour = $this->db->procCall('nombreFour', [$_SESSION['idEvent']]);
        $nombreInv = $this->db->procCall('nombreInv', [$_SESSION['idEvent']]);
        $afficherSuppr = array_intersect([$verifInvite[0]['pseudo']], [$_SESSION['user']['pseudo']]);
        $requeteComm = [];

        foreach ($req as $key => $value){
            $requeteComm = $value;
        }
        //On retire le commentaire de la liste et on affiche le nouveau chiffre avec le nombre de commentaires
        $this->db->procCall('supprCommentaire', [$_SESSION['idEvent'],$requeteComm]);
        $nombreComm = $this->db->procCall('nombreComm', [$_SESSION['idEvent']]);
        $nombreParticipant =  $this->db->procCall('nombreParticipant', [$_SESSION['idEvent']]);
        $this->action->affichageDefaut('#commentaires', $this->lectureForm('listeCommentaire'));
        $listeComm = $this->db->procCall('listeCommentaire', [$_SESSION['idEvent']]);
        $this->action->ajouterAction('listeComm', $listeComm);
        $this->action->ajouterAction('infoEvent', [$nombreInv, $nombreFour, $nombreComm, $nombreParticipant]);
        if($afficherSuppr) $this->action->ajouterAction('afficherSuppr', '');

    }

    /**
     * Suppression de la fourniture
     * @param $req requete effecuté par le client
     */
    private function supprimerFourniture($req){
        $verifInvite = $this->db->procCall('listeInvites', [$_SESSION['idEvent']]);
        $afficherSuppr = array_intersect([$verifInvite[0]['pseudo']], [$_SESSION['user']['pseudo']]);
        $requeteFour = [];
        $nombreComm = $this->db->procCall('nombreComm', [$_SESSION['idEvent']]);
        $nombreInv = $this->db->procCall('nombreInv', [$_SESSION['idEvent']]);
        foreach ($req as $key => $value){
            $requeteFour = $value;
        }
        //On retire la fourniture de la liste et on affiche le nombre de fournitures dans le tableau
        $this->db->procCall('supprFourniture', [$_SESSION['idEvent'],$requeteFour]);
        $nombreFour = $this->db->procCall('nombreFour', [$_SESSION['idEvent']]);

        $this->action->affichageDefaut('#fournitures', $this->lectureForm('listeFourniture'));

        $listeFourniture = $this->db->procCall('listeFourniture', [$_SESSION['idEvent']]);
        $nombreParticipant =  $this->db->procCall('nombreParticipant', [$_SESSION['idEvent']]);

        $this->action->ajouterAction('listeFourniture', $listeFourniture);
        $this->action->ajouterAction('infoEvent', [$nombreInv, $nombreFour, $nombreComm, $nombreParticipant]);
        if($afficherSuppr) $this->action->ajouterAction('afficherSuppr', '');
    }

    /**
     * Suppression de l'invite
     * @param $req requete effecuté par le client
     */
    private function supprimerInvite($req){
        $verifInvite = $this->db->procCall('listeInvites', [$_SESSION['idEvent']]);
        $tousLesUser = $this->db->procCall('tousLesUsers', ['']);
        $nombreComm = $this->db->procCall('nombreComm', [$_SESSION['idEvent']]);
        $nombreFour = $this->db->procCall('nombreFour', [$_SESSION['idEvent']]);
        $afficherSuppr = array_intersect([$verifInvite[0]['pseudo']], [$_SESSION['user']['pseudo']]);
        $requeteInv = [];

        foreach ($req as $key => $value){
            $requeteInv = $value;
        }
        $mailInv = $this->db->procCall('mailSupprInvite', [$requeteInv]);
        mail($mailInv[0]['email'], "Votre suppression de la liste d'invites", "Vous avez été retiré de la liste d'invités pour plus d'informations veuillez contacter l'hôte");
        //On enleve l'invite de la liste
        $this->db->procCall('supprInvites', [$_SESSION['idEvent'],$requeteInv]);
        $nombreInv = $this->db->procCall('nombreInv', [$_SESSION['idEvent']]);
        $this->action->affichageDefaut('#listeInvites', $this->lectureForm('listeInvites'));

        $listeInv = $this->db->procCall('listeInvites', [$_SESSION['idEvent']]);
        $nombreParticipant =  $this->db->procCall('nombreParticipant', [$_SESSION['idEvent']]);

        $this->action->ajouterAction('listeInvites', $listeInv);
        $this->action->ajouterAction('tousLesPseudos', $tousLesUser);
        $this->action->ajouterAction('infoEvent', [$nombreInv, $nombreFour, $nombreComm, $nombreParticipant]);

        if($afficherSuppr) $this->action->ajouterAction('afficherSuppr', '');
    }

    /**
     * Gestionnaire de toutes les requetes effectués
     * @param string $rq la requete reçue
     * @return bool
     */
    private function gestionRequetes($rq= ''){
        // Verifie si la requete est valide et la transmet à la fonction convenue
        if($this->reqValid($rq)){
            $nomFonction = $rq;
            $this->$nomFonction();
        }

        //Si on se trouve dans un event on peut supprimer les commentaires ou invite ou fourniture
        if(!empty($_SESSION['idEvent'])){

            $listeComm = $this->db->procCall('listeCommentaire', [$_SESSION['idEvent']]);
            $listeFour = $this->db->procCall('listeFourniture', [$_SESSION['idEvent']]);
            $listeInv = $this->db->procCall('listeInvites', [$_SESSION['idEvent']]);

            $listeCommentaires = [];
            $listeFournitures = [];
            $listeInvites = [];

            foreach ($listeComm as $key){
                $listeCommentaires [] = $key['commentaire'];
            }

            $requeteComm = array_intersect($listeCommentaires, [$rq]);//Verification de la requete avec la liste des commentaires

            if($requeteComm){
                $this->supprimerCommentaire($requeteComm);//Si c'est correct on l'envoie vers la fonction adéquate
            }

            foreach ($listeFour as $key){
                $listeFournitures[] = $key['fourniture'];
            }
            $requeteFour = array_intersect($listeFournitures, [$rq]);//Verification de la requete avec la liste des fournitures

            if($requeteFour){
                $this->supprimerFourniture($requeteFour);//Si c'est correct on l'envoie vers la fonction adéquate
            }

            foreach ($listeInv as $key){
                $listeInvites [] = $key['pseudo'];
            }

            $requeteInv = array_intersect($listeInvites, [$rq]);//Verification de la requete avec la liste des invites

            if($requeteInv){
                $this->supprimerInvite($requeteInv);//Si c'est correct on l'envoie vers la fonction adéquate
            }

        }

        //Si la requete est un int on la renvoie vers la fonction
        if((int) $rq){
            $this->pageEventInfos($rq);
        }

        else {
            return false;
        }

    }
}
