# language: fr
Fonctionnalité: Opérations d’un Administrateur

	Scénario: Un Administrateur ajoute un contributeur
	Étant donné que je suis "Administrateur"
	Quand j’ajoute un "contributeur"
		Et je renseigne un pseudo valide "pseudo"
		Et je renseigne un e-mail valide "e-mail"
	Alors un mot de passe est généré automatiquement
		Et une entrée est créée dans la table contributeurs "pseudo" "e-mail" 
		Et un e-mail est envoyé au nouveau contributeur "e-mail" "pseudo" "mot_de_passe"

	Scénario: Un Administrateur essaye d’ajouter un contributeur avec un pseudo invalide
	Étant donné que je suis "Administrateur"
	Quand j’ajoute un "contributeur"
		Et je renseigne un pseudo invalide "pseudo"
	Alors un message d’erreur est affiché "message"
		Et un nouveau pseudo est demandé

	Scénario: Un Administrateur essaye d’ajouter un contributeur avec un e-mail invalide
	Étant donné que je suis "Administrateur"
	Quand j’ajoute un "contributeur"
		Et je renseigne un e-mail invalide "e-mail"
	Alors un message d’erreur est affiché "message"
		Et un nouvel e-mail est demandé

	Scénario: Un Administrateur supprime un contributeur
	Etant donné que je suis "Administrateur"
	Quand je supprime un contributeur
		Et je renseigne un pseudo correct "pseudo"
	Alors l'entrée de la table est supprimée
		Et un message de confirmation est affiché

	Scénario: Un Administrateur essaye de supprimer un contributeur
	Etant donné que je suis "Administrateur"
	Quand je supprime un contributeur
		Et je renseigne un pseudo incorrect "pseudo"
	Alors un message d'erreur est affiché
		Et un nouveau pseudo est demandé

	Scénario: Un Administrateur supprime un contributeur
	Etant donné que je suis "Administrateur"
	Quand je supprime un utlisateur
		Et je renseigne un email correct "email"
	Alors l'entrée de la table est supprimée
		Et un message de confirmation est affiché

	Scénario: Un Administrateur essaye de supprimer un contributeur
	Etant donné que je suis "Administrateur"
	Quand je supprime un contributeur
		Et je renseigne un email incorrect "email"
	Alors un message d'erreur est affiché
		Et un nouveau email est demandé

	Scénario: Un Administrateur modifie un contributeur
	Etant donné que je suis "Administrateur"
	Quand je modifie un "pseudo_contributeur" 
		Et je renseigne un pseudo contributeur correct "pseudo_contributeur"
		Et je renseigne un nouveau pseudo contributeur valide "pseudo_contributeur"
	Alors l'entrée de la table est actualisée
		Et un message de confirmation est affiché


	Scénario: Un Administrateur modifie un contributeur
	Etant donné que je suis "Administrateur"
	Quand je modifie un "pseudo_contributeur" 
		Et je renseigne un pseudo contributeur correct "pseudo_contributeur"
		Et je renseigne un nouveau pseudo contributeur invalide "pseudo_contributeur"
	Alors un message d'erreur est affiché
		Et un nouveau pseudo_contributeur est demandé


	Scénario: Un Administrateur modifie un contributeur
	Etant donné que je suis "Administrateur"
	Quand je modifie un "email_contributeur" 
		Et je renseigne un email contributeur correct "email_contributeur"
		Et je renseigne un nouveau email contributeur valide "email_contributeur"
	Alors l'entrée de la table est actualisée
		Et un message de confirmation est affiché


	Scénario: Un Administrateur modifie un contributeur
	Etant donné que je suis "Administrateur"
	Quand je modifie un "email_contributeur" 
		Et je renseigne un email contributeur correct "email_contributeur"
		Et je renseigne un nouveau email contributeur invalide "email_contributeur"
	Alors un message d'erreur est affiché
		Et un nouveau email_contributeur est demandé


	Scénario: Un Administrateur modifie un droit de contributeur
	Etant donné que je suis "Administrateur"
	Quand je modifie un contributeur "id"
		Et je renseigne un email contributeur correct "email_contributeur"
		Et je retire un droit valide du contributeur "droit_contributeur"
	Alors l'entrée de la table est actualisée
		Et un message de confirmation est affiché


	Scénario: Un Administrateur modifie un droit de contributeur
	Etant donné que je suis "Administrateur"
	Quand je modifie un contributeur "id"
		Et je renseigne un pseudo contributeur correct "pseudo_contributeur"
		Et je retire un droit valide du contributeur "droit_contributeur"
	Alors l'entrée de la table est actualisée
		Et un message de confirmation est affiché

	Scénario: Un Administrateur modifie un droit de contributeur
	Etant donné que je suis "Administrateur"
	Quand je modifie un contributeur "id" 
		Et je renseigne un pseudo contributeur correct "pseudo_contributeur"
		Et je retire un droit invalide du contributeur "droit_contributeur"
	Alors un message d’erreur est affiché
		Et retour à l’interface de gestion des droits

	Scénario: Un Administrateur modifie un droit de contributeur
	Etant donné que je suis "Administrateur"
	Quand je modifie un contributeur "id" 
		Et je renseigne un email contributeur correct "email_contributeur"
		Et je retire un droit invalide du contributeur "droit_contributeur"
	Alors un message d’erreur est affiché
		Et retour à l’interface de gestion des droits


	Scénario: Un Administrateur ajouter un droit de contributeur
	Etant donné que je suis "Administrateur"
	Quand je modifie un contributeur "id" 
		Et je renseigne un email contributeur correct "email_contributeur"
		Et j'ajoute un droit valide du contributeur "droit_contributeur"
	Alors l'entrée de la table est actualisée
		Et un message de confirmation est affiché


	Scénario: Un Administrateur ajouter un droit de contributeur
	Etant donné que je suis "Administrateur"
	Quand je modifie un contributeur "id" 
		Et je renseigne un pseudo contributeur correct "pseudo_contributeur"
		Et j'ajoute un droit valide du contributeur "droit_contributeur"
	Alors l'entrée de la table est actualisée
		Et un message de confirmation est affiché

	Scénario: Un Administrateur essaye d'ajouter un droit de contributeur
	Etant donné que je suis "Administrateur"
	Quand je modifie un contributeur "id" 
		Et je renseigne un pseudo contributeur correct "pseudo_contributeur"
		Et j'ajoute un droit invalide du contributeur "droit_contributeur"
	Alors un message d’erreur est affiché
		Et retour à l’interface de gestion des droits

	Scénario: Un Administrateur essaye d'ajouter un droit de contributeur
	Etant donné que je suis "Administrateur"
	Quand je modifie un contributeur "id" 
		Et je renseigne un pseudo contributeur correct "pseudo_contributeur"
		Et j'ajoute un droit incorrect du contributeur "droit_contributeur"
	Alors un message d’erreur est affiché
		Et retour à l’interface de gestion des droits

	Scénario: Un Administrateur essaye d'ajouter un droit de contributeur
	Etant donné que je suis "Administrateur"
	Quand je modifie un contributeur "id" 
		Et je renseigne un email contributeur correct "email_contributeur"
		Et j'ajoute un droit invalide du contributeur "droit_contributeur"
	Alors un message d’erreur est affiché
		Et retour à l’interface de gestion des droits

	Scénario: Un Administrateur essaye d'ajouter un droit de contributeur
	Etant donné que je suis "Administrateur"
	Quand je modifie un contributeur "id" 
		Et je renseigne un email contributeur correct "email_contributeur"
		Et j'ajoute un droit incorrect du contributeur "droit_contributeur"
	Alors un message d’erreur est affiché
		Et retour à l’interface de gestion des droits

	Scénario: Un Administrateur essaye d'ajouter un droit de contributeur
	Etant donné que je suis "Administrateur"
	Quand je modifie un contributeur "id" 
		Et je renseigne un email contributeur incorrect "email_contributeur"
	Alors un message d’erreur est affiché
		Et un nouveau email est demandé
	
	Scénario: Un Administrateur essaye d'ajouter un droit de contributeur
	Etant donné que je suis "Administrateur"
	Quand je modifie un contributeur "id" 
		Et je renseigne un pseudo contributeur incorrect "pseudo_contributeur"
	Alors un message d’erreur est affiché
		Et un nouveau pseudo est demandé

