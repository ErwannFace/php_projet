<?php
session_start();
use Behat\Behat\Tester\Exception\PendingException;
use Behat\Behat\Context\Context;
use Behat\Behat\Context\SnippetAcceptingContext;
use Behat\Gherkin\Node\PyStringNode;
use Behat\Gherkin\Node\TableNode;

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

    private $operator;
		private $current_user;
    private $user;
    private $user_list;
    private $current_bloc;
    
    public function __construct() {}

    /**
     * @Given un utilisateur existe avec le pseudo :pseudo et l’e-mail :email
     */
    public function unUtilisateurExiste($pseudo, $email)
    {
			$this->current_user = new User();
			$this->current_user->setPseudo($pseudo);
			$this->current_user->setEmail($email);
			$this->current_user->generatePassword();
			$this->current_user->setRank('contributeur');
			$this->current_user->create();
    }

    /**
     * @Given je suis :role
     */
    public function jeSuis($role)
    {
		if ($role != 'visiteur') {
            $this->operator = new User();
			$this->operator->setRank($role);
        }
    }

    /**
     * @When j’ajoute un :role
     */
    public function jAjouteUn($role)
    {
			$this->current_user = new User();
			$this->current_user->setRank($role);
    }

    /**
     * @When je renseigne un pseudo (in)valide :pseudo
     */
    public function jeRenseigneUnPseudoValide($pseudo)
    {
			$this->current_user->setPseudo($pseudo);
    }

    /**
     * @When je renseigne un e-mail (in)valide :email
     */
    public function jeRenseigneUnEMailValide($email)
    {
			$this->current_user->setEmail($email);
		}

    /**
     * @Then un mot de passe est généré automatiquement
     */
    public function unMotDePasseEstGenereAutomatiquement()
    {
			$this->current_user->generatePassword();
    }

    /**
     * @Then (auc)une entrée (n’)est créée dans la table utilisateurs
     */
    public function uneEntreeEstCreeeDansLaTableUtilisateurs()
    {
			$this->current_user->create();
    }

    /**
     * @Then un e-mail est envoyé au nouvel utilisateur
     */
    public function unEMailEstEnvoyeAuNouvelUtilisateur()
    {
			$this->current_user->sendEmail();
    }

    /**
     * @When je modifie/supprime un utilisateur avec un pseudo/email (in)correct :arg
     */
    public function jeModifieUnUtilisateur($arg)
    {
			$this->current_user = User::select($arg);
    }

    /**
     * @Then l’entrée de la table utilisateurs (n’)est (pas )modifiée
     */
    public function updateDBUserEntry()
    {
			if ( isset($this->current_user) ) {
				$this->current_user->update();
			}
    }

    /**
     * @Then l’entrée de la table utilisateurs (n’)est (pas )supprimée
     */
    public function deleteDBUserEntry()
    {
			if ( isset($this->current_user) ) {
				$this->current_user->delete();
			}
    }

    /**
     * @When je retire un droit (in)valide au contributeur :droit
     */
    public function jeRetireUnDroitAuContributeur($droit)
    {
			$this->current_user->setRight('remove', $droit);
    }

    /**
     * @When j’ajoute un droit (in)valide au contributeur :droit
     */
    public function jAjouteUnDroitAuContributeur($droit)
    {
    	$this->current_user->setRight('add', $droit);
    }

		/*
     * @When je filtre les bloc par :champ avec la valeur :valeur
     */
    var $blocs_list;
    public function jeFiltreLesBlocParAvecLaValeur($champ, $valeur)
    {
			//Id Date Titre Format Media
			if (isset($valeur)){
				foreach ($this->$blocs_list as $bloc) {
					if ($bloc['date'] == $valeur){
						return $bloc;
					}
				}
				foreach ($this->$blocs_list as $bloc) {
					if ($bloc['titre'] == $valeur){
						return $bloc;
					}
				}
				foreach ($this->$blocs_list as $bloc) {
					if ($bloc['media'] == $valeur){
						return $bloc;
					}
				}
			}
		}

    /**
     * @Then un sous-ensemble des blocs est retourné
     */
    public function unSousEnsembleDesBlocsEstRetourne()
    {
      $this->blocs_list = Bloc::filtre($champ, $valeur);
    }

    /**
     * @Given un bloc existe avec la date :date et le titre :titre et le type de média :type
     */
    public function unBlocExisteAvecLaDateEtLeTitreEtLeTypeDeMedia($date, $titre, $type)
    {
        $this->current_bloc = new Bloc($date, $titre, $type);
    }

    /**
     * @When je me connecte avec comme pseudo/email :pseudo et comme mot de passe :mdp
     */
    public function jeMeConnecte($pseudo, $mdp)
    {
        User::Connection($pseudo, $mdp);
    }

    /**
     * @When j’ai fait moins de x essais :arg1
     */
    public function jAiFaitMoinsDeXEssais($arg1)
    {
        $_SESSION['number_of_tries'] = ($arg1 - 1);
    }

    /**
     * @When j’ai fait au moins x essais :arg1
     */
    public function jAiFaitAuMoinsXEssais($arg1)
    {
        $_SESSION['number_of_tries'] = $arg1;
    }

    /**
     * @When je suis sur la page modal de connection
     */
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
     * @Then ma connection est validée
     */
    public function maConnectionEstValidee()
    {
        throw new PendingException();
    }

    /**
     * @When je me connecte
     */
    public function jeMeConnecte2()
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
     * @Then ma connection n'est pas validée
     */
    public function maConnectionNEstPasValidee()
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
     * @Then ma connection n'est pas validé
     */
    public function maConnectionNEstPasValide()
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
     * @Then Alors ma connection n'est pas validé
     */
    public function alorsMaConnectionNEstPasValide()
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
     * @When j'ajoute un bloc
     */
    public function jAjouteUnBloc()
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
     * @Then le bloc est ajouté
     */
    public function leBlocEstAjoute()
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
     * @Then je rentre mon format :arg1
     */
    public function jeRentreMonFormat($arg1)
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
     * @Then j'ajoute un media pour confirmer l’ajout du Bloc
     */
    public function jAjouteUnMediaPourConfirmerLAjoutDuBloc()
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
     * @When que je  modifie un Bloc :arg1
     */
    public function queJeModifieUnBloc($arg1)
    {
        throw new PendingException();
    }

    /**
     * @Then je dois ajouter un media valide
     */
    public function jeDoisAjouterUnMediaValide()
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
     * @When je modifie un bloc :arg1
     */
    public function jeModifieUnBloc($arg1)
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
     * @When je modifie un artcile :arg1
     */
    public function jeModifieUnArtcile($arg1)
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
     * @Then le bloc est modifié
     */
    public function leBlocEstModifie()
    {
        throw new PendingException();
    }

    /**
     * @When je veux modifier un Bloc :arg1
     */
    public function jeVeuxModifierUnBloc($arg1)
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
     * @Then je cree le bloc
     */
    public function jeCreeLeBloc()
    {
        throw new PendingException();
    }

    /**
     * @Then je ne  cree pas le bloc
     */
    public function jeNeCreePasLeBloc()
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
     * @Then je modifie le bloc
     */
    public function jeModifieLeBloc()
    {
        throw new PendingException();
    }

    /**
     * @Then je modifie pas le bloc
     */
    public function jeModifiePasLeBloc()
    {
        throw new PendingException();
    }

    /**
     * @When je supprime un Bloc :arg1
     */
    public function jeSupprimeUnBloc($arg1)
    {
        throw new PendingException();
    }

    /**
     * @Then le bloc est supprimé
     */
    public function leBlocEstSupprime()
    {
        throw new PendingException();
    }

    /**
     * @Then je ne suis pas connecté
     */
    public function jeNeSuisPasConnecte()
    {
        throw new PendingException();
    }

    /**
     * @Then je ne suis pas connecte
     */
    public function jeNeSuisPasConnecte2()
    {
        throw new PendingException();
    }

    /**
     * @When j'ajoute un bloc :arg1
     */
    public function jAjouteUnBloc2($arg1)
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
     * @When j’ai rentré un média incompatible :arg1"
     */
    public function jAiRentreUnMediaIncompatible2($arg1)
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
     * @When que je modifie un Bloc :arg1
     */
    public function queJeModifieUnBloc2($arg1)
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
     * @Then le media est modifié
     */
    public function leMediaEstModifie()
    {
        throw new PendingException();
    }

    /**
     * @When je modifie un Bloc :arg1
     */
    public function jeModifieUnBloc2($arg1)
    {
        throw new PendingException();
    }

    /**
     * @Then le Bloc est modifié
     */
    public function leBlocEstModifie2()
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
     * @When je filtre les bloc par :arg1 avec la valeur :arg2
     */
    public function jeFiltreLesBlocParAvecLaValeur2($arg1, $arg2)
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
     * @When aucun bloc existe
     */
    public function aucunBlocExiste()
    {
        throw new PendingException();
    }

    /**
     * @Then aucun bloc n'est retourné
     */
    public function aucunBlocNEstRetourne()
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
     * @When je me connecte avec identifiants invalides pseudo :arg1  mot de passe :arg2
     */
    public function jeMeConnecteAvecIdentifiantsInvalidesPseudoMotDePasse($arg1, $arg2)
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
     * @Then mon nombre d’essais est augmenté de un
     */
    public function monNombreDEssaisEstAugmenteDeUn()
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
     * @When j’ai fait au moins :arg1 essais
     */
    public function jAiFaitAuMoinsEssais($arg1)
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
     * @Then je ne reçois pas d'e-mail
     */
    public function jeNeRecoisPasDEMail()
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
}
