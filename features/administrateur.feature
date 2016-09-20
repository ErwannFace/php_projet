# language: fr
Fonctionnalité: Opérations d’un Administrateur

	Scénario: Un Administrateur ajoute un contributeur
	Étant donné que je suis "administrateur"
	Quand j’ajoute un "contributeur"
		Et je renseigne un pseudo valide "toto"
		Et je renseigne un e-mail valide "toto@facesimplon.com"
	Alors un mot de passe est généré automatiquement
		Et une entrée est créée dans la table utilisateurs
		Et un e-mail est envoyé au nouvel utilisateur

	Scénario: Un Administrateur essaye d’ajouter un contributeur avec un pseudo invalide
	Étant donné que je suis "administrateur"
	Quand j’ajoute un "contributeur"
		Et je renseigne un pseudo invalide "toto"
	Alors aucune entrée n’est créée dans la table utilisateurs

	Scénario: Un Administrateur essaye d’ajouter un contributeur avec un e-mail invalide
	Étant donné que je suis "administrateur"
	Quand j’ajoute un "contributeur"
		Et je renseigne un e-mail invalide "toto@facesimplon.com"
	Alors aucune entrée n’est créée dans la table utilisateurs

	Scénario: Un Administrateur supprime un contributeur avec un pseudo correct
	Étant donné que je suis "administrateur"
	Quand je supprime un contributeur avec un pseudo correct "toto"
	Alors l’entrée de la table utilisateurs est supprimée

	Scénario: Un Administrateur essaye de supprimer un contributeur avec un pseudo incorrect
	Étant donné que je suis "administrateur"
	Quand je supprime un contributeur avec un pseudo incorrect "toto"
	Alors l’entrée de la table utilisateurs n’est pas supprimée

	Scénario: Un Administrateur supprime un contributeur avec un e-mail correct
	Étant donné que je suis "administrateur"
	Quand je supprime un contributeur avec un email correct "toto@facesimplon.com"
	Alors l’entrée de la table utilisateurs est supprimée

	Scénario: Un Administrateur essaye de supprimer un contributeur avec un e-mail incorrect
	Étant donné que je suis "administrateur"
	Quand je supprime un contributeur avec un email incorrect "toto@facesimplon.com"
	Alors l’entrée de la table utilisateurs n’est pas supprimée

	Scénario: Un Administrateur modifie un contributeur
	Étant donné que je suis "administrateur"
	Quand je modifie un "pseudo_contributeur" 
		Et je renseigne un pseudo contributeur correct "pseudo_contributeur"
		Et je renseigne un nouveau pseudo contributeur valide "pseudo_contributeur"
	Alors l'entrée de la table est actualisée
		Et un message de confirmation est affiché

	Scénario: Un Administrateur modifie un contributeur
	Étant donné que je suis "administrateur"
	Quand je modifie un "pseudo_contributeur" 
		Et je renseigne un pseudo contributeur correct "pseudo_contributeur"
		Et je renseigne un nouveau pseudo contributeur invalide "pseudo_contributeur"
	Alors un message d'erreur est affiché
		Et un nouveau pseudo_contributeur est demandé


	Scénario: Un Administrateur modifie un contributeur
	Étant donné que je suis "administrateur"
	Quand je modifie un "email_contributeur" 
		Et je renseigne un email contributeur correct "email_contributeur"
		Et je renseigne un nouveau email contributeur valide "email_contributeur"
	Alors l'entrée de la table est actualisée
		Et un message de confirmation est affiché


	Scénario: Un Administrateur modifie un contributeur
	Étant donné que je suis "administrateur"
	Quand je modifie un "email_contributeur" 
		Et je renseigne un email contributeur correct "email_contributeur"
		Et je renseigne un nouveau email contributeur invalide "email_contributeur"
	Alors un message d'erreur est affiché
		Et un nouveau email_contributeur est demandé


	Scénario: Un Administrateur modifie un droit de contributeur
	Étant donné que je suis "administrateur"
	Quand je modifie un contributeur "id"
		Et je renseigne un email contributeur correct "email_contributeur"
		Et je retire un droit valide du contributeur "droit_contributeur"
	Alors l'entrée de la table est actualisée
		Et un message de confirmation est affiché


	Scénario: Un Administrateur modifie un droit de contributeur
	Étant donné que je suis "administrateur"
	Quand je modifie un contributeur "id"
		Et je renseigne un pseudo contributeur correct "pseudo_contributeur"
		Et je retire un droit valide du contributeur "droit_contributeur"
	Alors l'entrée de la table est actualisée
		Et un message de confirmation est affiché

	Scénario: Un Administrateur modifie un droit de contributeur
	Étant donné que je suis "administrateur"
	Quand je modifie un contributeur "id" 
		Et je renseigne un pseudo contributeur correct "pseudo_contributeur"
		Et je retire un droit invalide du contributeur "droit_contributeur"
	Alors un message d’erreur est affiché
		Et retour à l’interface de gestion des droits

	Scénario: Un Administrateur modifie un droit de contributeur
	Étant donné que je suis "administrateur"
	Quand je modifie un contributeur "id" 
		Et je renseigne un email contributeur correct "email_contributeur"
		Et je retire un droit invalide du contributeur "droit_contributeur"
	Alors un message d’erreur est affiché
		Et retour à l’interface de gestion des droits


	Scénario: Un Administrateur ajouter un droit de contributeur
	Étant donné que je suis "administrateur"
	Quand je modifie un contributeur "id" 
		Et je renseigne un email contributeur correct "email_contributeur"
		Et j'ajoute un droit valide du contributeur "droit_contributeur"
	Alors l'entrée de la table est actualisée
		Et un message de confirmation est affiché


	Scénario: Un Administrateur ajouter un droit de contributeur
	Étant donné que je suis "administrateur"
	Quand je modifie un contributeur "id" 
		Et je renseigne un pseudo contributeur correct "pseudo_contributeur"
		Et j'ajoute un droit valide du contributeur "droit_contributeur"
	Alors l'entrée de la table est actualisée
		Et un message de confirmation est affiché

	Scénario: Un Administrateur essaye d'ajouter un droit de contributeur
	Étant donné que je suis "administrateur"
	Quand je modifie un contributeur "id" 
		Et je renseigne un pseudo contributeur correct "pseudo_contributeur"
		Et j'ajoute un droit invalide du contributeur "droit_contributeur"
	Alors un message d’erreur est affiché
		Et retour à l’interface de gestion des droits

	Scénario: Un Administrateur essaye d'ajouter un droit de contributeur
	Étant donné que je suis "administrateur"
	Quand je modifie un contributeur "id" 
		Et je renseigne un pseudo contributeur correct "pseudo_contributeur"
		Et j'ajoute un droit incorrect du contributeur "droit_contributeur"
	Alors un message d’erreur est affiché
		Et retour à l’interface de gestion des droits

	Scénario: Un Administrateur essaye d'ajouter un droit de contributeur
	Étant donné que je suis "administrateur"
	Quand je modifie un contributeur "id" 
		Et je renseigne un email contributeur correct "email_contributeur"
		Et j'ajoute un droit invalide du contributeur "droit_contributeur"
	Alors un message d’erreur est affiché
		Et retour à l’interface de gestion des droits

	Scénario: Un Administrateur essaye d'ajouter un droit de contributeur
	Étant donné que je suis "administrateur"
	Quand je modifie un contributeur "id" 
		Et je renseigne un email contributeur correct "email_contributeur"
		Et j'ajoute un droit incorrect du contributeur "droit_contributeur"
	Alors un message d’erreur est affiché
		Et retour à l’interface de gestion des droits

	Scénario: Un Administrateur essaye d'ajouter un droit de contributeur
	Étant donné que je suis "administrateur"
	Quand je modifie un contributeur "id" 
		Et je renseigne un email contributeur incorrect "email_contributeur"
	Alors un message d’erreur est affiché
		Et un nouveau email est demandé
	
	Scénario: Un Administrateur essaye d'ajouter un droit de contributeur
	Étant donné que je suis "administrateur"
	Quand je modifie un contributeur "id" 
		Et je renseigne un pseudo contributeur incorrect "pseudo_contributeur"
	Alors un message d’erreur est affiché
		Et un nouveau pseudo est demandé

