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
			$this->current_user->removeRight($droit);
    }

    /**
     * @When j’ajoute un droit (in)valide au contributeur :droit
     */
    public function jAjouteUnDroitAuContributeur($droit)
    {
			$this->current_user->addRight($droit);
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
}
