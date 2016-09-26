<?php

use Behat\Behat\Tester\Exception\PendingException;
use Behat\Behat\Context\Context;
use Behat\Behat\Context\SnippetAcceptingContext;
use Behat\Gherkin\Node\PyStringNode;
use Behat\Gherkin\Node\TableNode;
use User;
use DBSingleton;

/**
 * Defines application features from the specific context.
 */
class FeatureContext implements Context, SnippetAcceptingContext
{
    /**
     * Initializes context.
     *
     * Every scenario gets its own context instance.
     * You can also pass arbitrary arguments to the
     * context constructor through behat.yml.
     */
    var $user;
    var $user_list;
    public function __construct()
    {

    }

    /**
     * @Given je suis :arg1
     */
    public function jeSuis($arg1)
    {
        $this->user = new User();
        $this->user->setRole($arg1);

    }

    /**
     * @When j’ajoute un :arg1
     */
    public function jAjouteUn($arg1)
    {

        $db = DBSingleton::getInstance();
        $this->user_list = $this->user->getUsersList($db);

    }

    /**
     * @When je renseigne un pseudo valide :arg1
     */
    public function jeRenseigneUnPseudoValide($arg1)
    {
        $pseudo_valide = true;
        if(
            isset($arg1) &&
            preg_match("/^[a-z0-9]+$/i", $arg1) &&
            strlen($arg1)<=30 
            ) 
        {
            foreach ($this->user_list as $user) {
                if ($user['pseudo'] == $arg1){
                    $pseudo_valide = false;
                    break;
                }
            }

        }else{
            $pseudo_valide = false;            
        }
        if($pseudo_valide == false){
        echo "pseudo invalide";
    }
        return $pseudo_valide;
    }


    /**
     * @When je renseigne un e-mail valide :arg1
     */
    public function jeRenseigneUnEMailValide($arg1)
    {
     $email_valide = true;
     if(
        isset($arg1) &&
        preg_match("/^[a-z0-9\-_.]+@[a-z0-9\-_.]+\.[a-z]+$/i", $arg1) &&
        strlen($arg1)<=30 
        ) 
     {
        foreach ($this->user_list as $user) {
            if ($user['email'] == $arg1){
                $email_valide = false;
                break;
            }
        }   
        }else{
            $email_valide = false;            
        }
        if($email_valide == false){
        echo "email invalide";
    }
    return $email_valide;
}
    /**
     * @Then un mot de passe est généré automatiquement
     */
    public function unMotDePasseEstGenereAutomatiquement()
    {
        $lettres = array_merge(range('a','z'),range('A','Z'),range('0','9'));
         shuffle ( $lettres );
        $lettres_finales = implode( $lettres);
        return substr($lettres_finales , 0 , 9);
    }

    /**
     * @Then une entrée est créée dans la table contributeurs :arg1 :arg2 
     */
    public function uneEntreeEstCreeeDansLaTableContributeurs($pseudo, $email )
    {
        // "pseudo" "e-mail" 
        if($this->jeRenseigneUnPseudoValide($pseudo) && 
            $this->jeRenseigneUnEMailValide($email) ) {
            $pwd = $this->unMotDePasseEstGenereAutomatiquement();
            $db = DBSingleton::getInstance();
            $sql = "INSERT INTO utilisateurs ( pseudo, password, email) VALUES ( '$pseudo', '$pwd', '$email');";
            echo $sql;
            $db->query($sql);
        }else{
            echo "pseudo ou email invalide";
        }

    }

    /**
     * @Then un e-mail est envoyé au nouveau contributeur :arg1 :arg2 :arg3
     */
    public function unEMailEstEnvoyeAuNouveauContributeur($email, $pseudo, $pwd)
    {
        throw new PendingException();
    }

    /**
     * @When je renseigne un pseudo invalide :arg1
     */
    public function jeRenseigneUnPseudoInvalide($arg1)
    {
        return jeRenseigneUnPseudoValide($arg1);
    }

    /**
     * @Then un message d’erreur est affiché :arg1
     */
    public function unMessageDErreurEstAffiche($arg1)
    {
        throw new PendingException();
    }

    /**
     * @Then un nouveau pseudo est demandé
     */
    public function unNouveauPseudoEstDemande()
    {
       
    }

    /**
     * @When je renseigne un e-mail invalide :arg1
     */
    public function jeRenseigneUnEMailInvalide($arg1)
    {
        throw new PendingException();
    }

    /**
     * @Then un nouvel e-mail est demandé
     */
    public function unNouvelEMailEstDemande()
    {
        throw new PendingException();
    }

    /**
     * @When je supprime un contributeur
     */
    public function jeSupprimeUnContributeur()
    {
        throw new PendingException();
    }

    /**
     * @When je renseigne un pseudo correct :arg1
     */
    public function jeRenseigneUnPseudoCorrect($arg1)
    {
        throw new PendingException();
    }

    /**
     * @Then l'entrée de la table est supprimée
     */
    public function lEntreeDeLaTableEstSupprimee()
    {
        throw new PendingException();
    }

    /**
     * @Then un message de confirmation est affiché
     */
    public function unMessageDeConfirmationEstAffiche()
    {
        throw new PendingException();
    }

    /**
     * @When je renseigne un pseudo incorrect :arg1
     */
    public function jeRenseigneUnPseudoIncorrect($arg1)
    {
        throw new PendingException();
    }

    /**
     * @Then un message d'erreur est affiché
     */
    public function unMessageDErreurEstAffiche2()
    {
        throw new PendingException();
    }

    /**
     * @When je supprime un utlisateur
     */
    public function jeSupprimeUnUtlisateur()
    {
        throw new PendingException();
    }

    /**
     * @When je renseigne un email correct :arg1
     */
    public function jeRenseigneUnEmailCorrect($arg1)
    {
        throw new PendingException();
    }

    /**
     * @When je renseigne un email incorrect :arg1
     */
    public function jeRenseigneUnEmailIncorrect($arg1)
    {
        throw new PendingException();
    }

    /**
     * @Then un nouveau email est demandé
     */
    public function unNouveauEmailEstDemande()
    {
        throw new PendingException();
    }

    /**
     * @When je modifie un :arg1
     */
    public function jeModifieUn($arg1)
    {
        throw new PendingException();
    }

    /**
     * @When je renseigne un pseudo contributeur correct :arg1
     */
    public function jeRenseigneUnPseudoContributeurCorrect($arg1)
    {
        throw new PendingException();
    }

    /**
     * @When je renseigne un nouveau pseudo contributeur valide :arg1
     */
    public function jeRenseigneUnNouveauPseudoContributeurValide($arg1)
    {
        throw new PendingException();
    }

    /**
     * @Then l'entrée de la table est actualisée
     */
    public function lEntreeDeLaTableEstActualisee()
    {
        throw new PendingException();
    }

    /**
     * @When je renseigne un nouveau pseudo contributeur invalide :arg1
     */
    public function jeRenseigneUnNouveauPseudoContributeurInvalide($arg1)
    {
        throw new PendingException();
    }

    /**
     * @Then un nouveau pseudo_contributeur est demandé
     */
    public function unNouveauPseudoContributeurEstDemande()
    {
        throw new PendingException();
    }

    /**
     * @When je renseigne un email contributeur correct :arg1
     */
    public function jeRenseigneUnEmailContributeurCorrect($arg1)
    {
        throw new PendingException();
    }

    /**
     * @When je renseigne un nouveau email contributeur valide :arg1
     */
    public function jeRenseigneUnNouveauEmailContributeurValide($arg1)
    {
        throw new PendingException();
    }

    /**
     * @When je renseigne un nouveau email contributeur invalide :arg1
     */
    public function jeRenseigneUnNouveauEmailContributeurInvalide($arg1)
    {
        throw new PendingException();
    }

    /**
     * @Then un nouveau email_contributeur est demandé
     */
    public function unNouveauEmailContributeurEstDemande()
    {
        throw new PendingException();
    }

    /**
     * @When je modifie un contributeur :arg1
     */
    public function jeModifieUnContributeur($arg1)
    {
        throw new PendingException();
    }

    /**
     * @When je retire un droit valide du contributeur :arg1
     */
    public function jeRetireUnDroitValideDuContributeur($arg1)
    {
        throw new PendingException();
    }

    /**
     * @When je retire un droit invalide du contributeur :arg1
     */
    public function jeRetireUnDroitInvalideDuContributeur($arg1)
    {
        throw new PendingException();
    }

    /**
     * @Then un message d’erreur est affiché
     */
    public function unMessageDErreurEstAffiche3()
    {
        throw new PendingException();
    }

    /**
     * @Then retour à l’interface de gestion des droits
     */
    public function retourALInterfaceDeGestionDesDroits()
    {
        throw new PendingException();
    }

    /**
     * @When j'ajoute un droit valide du contributeur :arg1
     */
    public function jAjouteUnDroitValideDuContributeur($arg1)
    {
        throw new PendingException();
    }

    /**
     * @When j'ajoute un droit invalide du contributeur :arg1
     */
    public function jAjouteUnDroitInvalideDuContributeur($arg1)
    {
        throw new PendingException();
    }

    /**
     * @When j'ajoute un droit incorrect du contributeur :arg1
     */
    public function jAjouteUnDroitIncorrectDuContributeur($arg1)
    {
        throw new PendingException();
    }

    /**
     * @When je renseigne un email contributeur incorrect :arg1
     */
    public function jeRenseigneUnEmailContributeurIncorrect($arg1)
    {
        throw new PendingException();
    }

    /**
     * @When je renseigne un pseudo contributeur incorrect :arg1
     */
    public function jeRenseigneUnPseudoContributeurIncorrect($arg1)
    {
        throw new PendingException();
    }

    /**
     * @When je suis sur la page modal de connection
     */
    //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    public function jeSuisSurLaPageModalDeConnection()
    {
        throw new PendingException();
    }

    /**
     * @When je saisis un pseudo valide :arg1
     */
    public function jeSaisisUnPseudoValide($arg1)
    {
        throw new PendingException();
    }

    /**
     * @When je saisis un mot de passe valide :arg1
     */
    public function jeSaisisUnMotDePasseValide($arg1)
    {
        throw new PendingException();
    }

    /**
     * @When je clique sur se connecter
     */
    public function jeCliqueSurSeConnecter()
    {
        throw new PendingException();
    }

    /**
     * @Then ma connection est validée
     */
    public function maConnectionEstValidee()
    {
        throw new PendingException();
    }

    /**
     * @Then j’arrive sur la page accueil
     */
    public function jArriveSurLaPageAccueil()
    {
        throw new PendingException();
    }

    /**
     * @When je saisis un email valide :arg1
     */
    public function jeSaisisUnEmailValide($arg1)
    {
        throw new PendingException();
    }

    /**
     * @When je saisis un pseudo non valide :arg1
     */
    public function jeSaisisUnPseudoNonValide($arg1)
    {
        throw new PendingException();
    }

    /**
     * @Then un message d’erreur apparaît :arg1
     */
    public function unMessageDErreurApparait($arg1)
    {
        throw new PendingException();
    }

    /**
     * @Then je suis renvoyé sur la modal de connection vierge
     */
    public function jeSuisRenvoyeSurLaModalDeConnectionVierge()
    {
        throw new PendingException();
    }

    /**
     * @When je saisis un email non valide :arg1
     */
    public function jeSaisisUnEmailNonValide($arg1)
    {
        throw new PendingException();
    }

    /**
     * @When je saisis un mot de passe  non valide  :arg1
     */
    public function jeSaisisUnMotDePasseNonValide($arg1)
    {
        throw new PendingException();
    }

    /**
     * @When je saisis un pseudo  valide :arg1
     */
    public function jeSaisisUnPseudoValide2($arg1)
    {
        throw new PendingException();
    }

    /**
     * @Then un message d’errreur apparaît :arg1
     */
    public function unMessageDErrreurApparait($arg1)
    {
        throw new PendingException();
    }

    /**
     * @When je saisis un mot de passe  non valide :arg1
     */
    public function jeSaisisUnMotDePasseNonValide2($arg1)
    {
        throw new PendingException();
    }

    /**
     * @When je saisis un email  valide :arg1
     */
    public function jeSaisisUnEmailValide2($arg1)
    {
        throw new PendingException();
    }

    /**
     * @When je suis sur le modal de connection
     */
    public function jeSuisSurLeModalDeConnection()
    {
        throw new PendingException();
    }

    /**
     * @When j’ai déjà saisis mes identifiants non valide :arg2 fois  :arg1
     */
    public function jAiDejaSaisisMesIdentifiantsNonValideFois($arg1, $arg2)
    {
        throw new PendingException();
    }

    /**
     * @Then un :arg1 d’erreur apparaît :arg2
     */
    public function unDErreurApparait($arg1, $arg2)
    {
        throw new PendingException();
    }

    /**
     * @Then mon compte est bloqué pendant X temps
     */
    public function monCompteEstBloquePendantXTemps()
    {
        throw new PendingException();
    }

    /**
     * @When je suis sur la modal « ajouter un Bloc » :arg1
     */
    public function jeSuisSurLaModalAjouterUnBloc($arg1)
    {
        throw new PendingException();
    }

    /**
     * @When j’ai rentré un titre :arg1
     */
    public function jAiRentreUnTitre($arg1)
    {
        throw new PendingException();
    }

    /**
     * @When un format :arg1
     */
    public function unFormat($arg1)
    {
        throw new PendingException();
    }

    /**
     * @When un média compatible :arg1
     */
    public function unMediaCompatible($arg1)
    {
        throw new PendingException();
    }

    /**
     * @When je confirme l’ajout de Bloc
     */
    public function jeConfirmeLAjoutDeBloc()
    {
        throw new PendingException();
    }

    /**
     * @Then j’arrive sur la page accueil avec un bloc supplémentaire
     */
    public function jArriveSurLaPageAccueilAvecUnBlocSupplementaire()
    {
        throw new PendingException();
    }

    /**
     * @When j’ai oublié de rentrer un titre :arg1
     */
    public function jAiOublieDeRentrerUnTitre($arg1)
    {
        throw new PendingException();
    }

    /**
     * @When j’ai rentré un format :arg1
     */
    public function jAiRentreUnFormat($arg1)
    {
        throw new PendingException();
    }

    /**
     * @When j’ai rentré un média compatible :arg1
     */
    public function jAiRentreUnMediaCompatible($arg1)
    {
        throw new PendingException();
    }

    /**
     * @When le bouton de confirmation d’ajout de Bloc n’est pas cliquable
     */
    public function leBoutonDeConfirmationDAjoutDeBlocNEstPasCliquable()
    {
        throw new PendingException();
    }

    /**
     * @Then je rentre mon titre :arg1
     */
    public function jeRentreMonTitre($arg1)
    {
        throw new PendingException();
    }

    /**
     * @When j’ai oublié de rentré un format :arg1
     */
    public function jAiOublieDeRentreUnFormat($arg1)
    {
        throw new PendingException();
    }

    /**
     * @When je clique sur ajouter Bloc
     */
    public function jeCliqueSurAjouterBloc()
    {
        throw new PendingException();
    }

    /**
     * @Then je rentre mon format :arg1
     */
    public function jeRentreMonFormat($arg1)
    {
        throw new PendingException();
    }

    /**
     * @When je suis sur la modal « ajouter un Bloc »
     */
    public function jeSuisSurLaModalAjouterUnBloc2()
    {
        throw new PendingException();
    }

    /**
     * @When j’ai rentrer un titre :arg1
     */
    public function jAiRentrerUnTitre($arg1)
    {
        throw new PendingException();
    }

    /**
     * @When j’ai oublié de rentré un média :arg1
     */
    public function jAiOublieDeRentreUnMedia($arg1)
    {
        throw new PendingException();
    }

    /**
     * @When un message d’erreur apparait :arg1
     */
    public function unMessageDErreurApparait2($arg1)
    {
        throw new PendingException();
    }

    /**
     * @Then je dois ajouter un media pour confirmer l’ajout du Bloc
     */
    public function jeDoisAjouterUnMediaPourConfirmerLAjoutDuBloc()
    {
        throw new PendingException();
    }

    /**
     * @When j’ai rentré un média incompatible :arg1
     */
    public function jAiRentreUnMediaIncompatible($arg1)
    {
        throw new PendingException();
    }

    /**
     * @Then je dois ajouter un media compatible pour confirmer l’ajout du Bloc
     */
    public function jeDoisAjouterUnMediaCompatiblePourConfirmerLAjoutDuBloc()
    {
        throw new PendingException();
    }

    /**
     * @When que je veux modifier un Bloc :arg1
     */
    public function queJeVeuxModifierUnBloc($arg1)
    {
        throw new PendingException();
    }

    /**
     * @When je suis sur la modal «modifier un Bloc»
     */
    public function jeSuisSurLaModalModifierUnBloc()
    {
        throw new PendingException();
    }

    /**
     * @Then je dois ajouter un media valide pour confirmer l’ajout du Bloc
     */
    public function jeDoisAjouterUnMediaValidePourConfirmerLAjoutDuBloc()
    {
        throw new PendingException();
    }

    /**
     * @When je n’ai pas rentré un média :arg1
     */
    public function jeNAiPasRentreUnMedia($arg1)
    {
        throw new PendingException();
    }

    /**
     * @When je veux modifier un bloc :arg1
     */
    public function jeVeuxModifierUnBloc($arg1)
    {
        throw new PendingException();
    }

    /**
     * @When je n’ai pas rentré un titre :arg1
     */
    public function jeNAiPasRentreUnTitre($arg1)
    {
        throw new PendingException();
    }

    /**
     * @When une message d’erreur apparait :arg1
     */
    public function uneMessageDErreurApparait($arg1)
    {
        throw new PendingException();
    }

    /**
     * @When je n’ai rentré un titre :arg1
     */
    public function jeNAiRentreUnTitre($arg1)
    {
        throw new PendingException();
    }

    /**
     * @When je n’ai pas rentré un format :arg1
     */
    public function jeNAiPasRentreUnFormat($arg1)
    {
        throw new PendingException();
    }

    /**
     * @When je veux modifier un artcile :arg1
     */
    public function jeVeuxModifierUnArtcile($arg1)
    {
        throw new PendingException();
    }

    /**
     * @When j’ai rentrer un titre  :arg1
     */
    public function jAiRentrerUnTitre2($arg1)
    {
        throw new PendingException();
    }

    /**
     * @When j’ai rentré un format un format :arg1
     */
    public function jAiRentreUnFormatUnFormat($arg1)
    {
        throw new PendingException();
    }

    /**
     * @When J’ai cliqué sur « valider »
     */
    public function jAiCliqueSurValider()
    {
        throw new PendingException();
    }

    /**
     * @Then une modal de confirmation apparaît
     */
    public function uneModalDeConfirmationApparait()
    {
        throw new PendingException();
    }

    /**
     * @When je veux modifier un Bloc :arg1
     */
    public function jeVeuxModifierUnBloc2($arg1)
    {
        throw new PendingException();
    }

    /**
     * @When j’ai bien modifié le Bloc
     */
    public function jAiBienModifieLeBloc()
    {
        throw new PendingException();
    }

    /**
     * @When J’ai cliqué sur « valider » dans la modal de confirmation
     */
    public function jAiCliqueSurValiderDansLaModalDeConfirmation()
    {
        throw new PendingException();
    }

    /**
     * @Then je suis sur accueil
     */
    public function jeSuisSurAccueil()
    {
        throw new PendingException();
    }

    /**
     * @Then mon Bloc est modifié
     */
    public function monBlocEstModifie()
    {
        throw new PendingException();
    }

    /**
     * @When ce Bloc a été supprimé entre-temps
     */
    public function ceBlocAEteSupprimeEntreTemps()
    {
        throw new PendingException();
    }

    /**
     * @When je valide la modification
     */
    public function jeValideLaModification()
    {
        throw new PendingException();
    }

    /**
     * @Then une fenetre de confirmation de création ou d'abandon du Bloc apparaît
     */
    public function uneFenetreDeConfirmationDeCreationOuDAbandonDuBlocApparait()
    {
        throw new PendingException();
    }

    /**
     * @When j’ai bien modifier le Bloc
     */
    public function jAiBienModifierLeBloc()
    {
        throw new PendingException();
    }

    /**
     * @When ce Bloc a été modifié entre-temps
     */
    public function ceBlocAEteModifieEntreTemps()
    {
        throw new PendingException();
    }

    /**
     * @Then une fenetre de confirmation de modification ou d'abandon du Bloc apparaît
     */
    public function uneFenetreDeConfirmationDeModificationOuDAbandonDuBlocApparait()
    {
        throw new PendingException();
    }

    /**
     * @When je veux supprimer un Bloc :arg1
     */
    public function jeVeuxSupprimerUnBloc($arg1)
    {
        throw new PendingException();
    }

    /**
     * @When je clique sur « supprimer le Bloc »
     */
    public function jeCliqueSurSupprimerLeBloc()
    {
        throw new PendingException();
    }

    /**
     * @Then un message de confirmation apparaît
     */
    public function unMessageDeConfirmationApparait()
    {
        throw new PendingException();
    }

    /**
     * @When j’ai cliqué sur « supprimer le Bloc »
     */
    public function jAiCliqueSurSupprimerLeBloc()
    {
        throw new PendingException();
    }

    /**
     * @When je clique sur « confirmer »
     */
    public function jeCliqueSurConfirmer()
    {
        throw new PendingException();
    }

    /**
     * @Then je retourne sur accueil avec un Bloc en moins.
     */
    public function jeRetourneSurAccueilAvecUnBlocEnMoins()
    {
        throw new PendingException();
    }

    /**
     * @When j’ai cliquer sur « supprimer le Bloc »
     */
    public function jAiCliquerSurSupprimerLeBloc()
    {
        throw new PendingException();
    }

    /**
     * @When je clique sur « annuler»
     */
    public function jeCliqueSurAnnuler()
    {
        throw new PendingException();
    }

    /**
     * @Then je retourne sur accueil .
     */
    public function jeRetourneSurAccueil()
    {
        throw new PendingException();
    }

    /**
     * @Given un bloc existe avec la valeur :arg1 pour le champ :arg2
     */
    public function unBlocExisteAvecLaValeurPourLeChamp($arg1, $arg2)
    {
        throw new PendingException();
    }

    /**
     * @Given je suis visiteur
     */
    ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    public function jeSuisVisiteur()
    {
        throw new PendingException();
    }

    /**
     * @When je filtre les bloc par :champ avec la valeur :valeur
     */
    var $blocs_list;
    public function jeFiltreLesBlocParAvecLaValeur($champ, $valeur)
    {
        //Id Date Titre Format Media
        if (isset($valeur)){
            foreach ($this->$blocs_list as $bloc) {
                if ($bloc['date'] == $valeur){
                    break;
                    return $bloc;
                }
            }
            foreach ($this->$blocs_list as $bloc) {
                if ($bloc['titre'] == $valeur){
                    break;
                    return $bloc;
                }
            }
            foreach ($this->$blocs_list as $bloc) {
                if ($bloc['media'] == $valeur){
                    break;
                    return $bloc;
                }
            }
        }        
    }


    /**
     * @When aucun bloc existe
     */
    public function aucunBlocExiste()
    {
        throw new PendingException();
    }

    /**
     * @When un bloc existe
     */
    public function unBlocExiste()
    {
        throw new PendingException();
    }

    /**
     * @Then un sous-ensemble des blocs est retourné
     */
    public function unSousEnsembleDesBlocsEstRetourne()
    {
        throw new PendingException();
    }

    /**
     * @When je me connecte avec comme pseudo :arg1 et comme mot de passe :arg2
     */
    public function jeMeConnecteAvecCommePseudoEtCommeMotDePasse($arg1, $arg2)
    {
        throw new PendingException();
    }

    /**
     * @When mon couple pseudo\/mot de passe est valide
     */
    public function monCouplePseudoMotDePasseEstValide()
    {
        throw new PendingException();
    }

    /**
     * @Then je suis connecté en tant que :arg1
     */
    public function jeSuisConnecteEnTantQue($arg1)
    {
        throw new PendingException();
    }

    /**
     * @When mon couple pseudo\/mot de passe est invalide
     */
    public function monCouplePseudoMotDePasseEstInvalide()
    {
        throw new PendingException();
    }

    /**
     * @When j’ai fait moins de :arg1 essais
     */
    public function jAiFaitMoinsDeEssais($arg1)
    {
        throw new PendingException();
    }

    /**
     * @Then mon nombre d’essais est augmenté de un
     */
    public function monNombreDEssaisEstAugmenteDeUn()
    {
        throw new PendingException();
    }

    /**
     * @Then un nouveau couple d’identifiants est demandé
     */
    public function unNouveauCoupleDIdentifiantsEstDemande()
    {
        throw new PendingException();
    }

    /**
     * @When j’ai fait au moins :arg1 essais
     */
    public function jAiFaitAuMoinsEssais($arg1)
    {
        throw new PendingException();
    }

    /**
     * @Then le compte associé au pseudo est bloqué :arg1
     */
    public function leCompteAssocieAuPseudoEstBloque($arg1)
    {
        throw new PendingException();
    }

    /**
     * @When je me connecte avec comme e-mail :arg1 et comme mot de passe :arg2
     */
    public function jeMeConnecteAvecCommeEMailEtCommeMotDePasse($arg1, $arg2)
    {
        throw new PendingException();
    }

    /**
     * @When mon couple e-mail\/mot de passe est valide
     */
    public function monCoupleEMailMotDePasseEstValide()
    {
        throw new PendingException();
    }

    /**
     * @When mon couple e-mail\/mot de passe est invalide
     */
    public function monCoupleEMailMotDePasseEstInvalide()
    {
        throw new PendingException();
    }

    /**
     * @Then le compte associé au e-mail est bloqué :arg1
     */
    public function leCompteAssocieAuEMailEstBloque($arg1)
    {
        throw new PendingException();
    }

    /**
     * @When je demande la génération d’un nouveau mot de passe pour l’utilisateur avec le pseudo :arg1
     */
    public function jeDemandeLaGenerationDUnNouveauMotDePassePourLUtilisateurAvecLePseudo($arg1)
    {
        throw new PendingException();
    }

    /**
     * @When mon pseudo est correct
     */
    public function monPseudoEstCorrect()
    {
        throw new PendingException();
    }

    /**
     * @Then un e-mail est envoyé à :arg1
     */
    public function unEMailEstEnvoyeA($arg1)
    {
        throw new PendingException();
    }

    /**
     * @When mon pseudo est incorrect
     */
    public function monPseudoEstIncorrect()
    {
        throw new PendingException();
    }

    /**
     * @When je demande la génération d’un nouveau mot de passe pour l’utilisateur avec l’e-mail :arg1
     */
    public function jeDemandeLaGenerationDUnNouveauMotDePassePourLUtilisateurAvecLEMail($arg1)
    {
        throw new PendingException();
    }

    /**
     * @When mon e-mail est correct
     */
    public function monEMailEstCorrect()
    {
        throw new PendingException();
    }

    /**
     * @When mon e-mail est incorrect
     */
    public function monEMailEstIncorrect()
    {
        throw new PendingException();
    }

    /**
     * @When j’ai fait moins de x essais :arg1
     */
    public function jAiFaitMoinsDeXEssais($arg1)
    {
        throw new PendingException();
    }

    /**
     * @When j’ai fait au moins x essais :arg1
     */
    public function jAiFaitAuMoinsXEssais($arg1)
    {
        throw new PendingException();
    }
}
