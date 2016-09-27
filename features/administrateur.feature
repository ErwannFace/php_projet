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

	Scénario: Un Administrateur essaye de modifier un contributeur avec un pseudo incorrect
	Étant donné que je suis "administrateur"
	Quand je modifie un utilisateur avec un pseudo incorrect "titi"
	Alors l’entrée de la table utilisateurs n’est pas modifiée

	Scénario: Un Administrateur essaye de modifier un contributeur avec un e-mail incorrect
	Étant donné que je suis "administrateur"
	Quand je modifie un utilisateur avec un email incorrect "titi@facesimplon.com"
	Alors l’entrée de la table utilisateurs n’est pas modifiée

	Scénario: Un Administrateur modifie le pseudo d’un contributeur, et entre un nouveau pseudo valide
	Étant donné que je suis "administrateur"
	Quand je modifie un utilisateur avec un pseudo correct "toto"
		Et je renseigne un pseudo valide "tutu"
	Alors l’entrée de la table utilisateurs est modifiée

	Scénario: Un Administrateur modifie le pseudo d’un contributeur, et entre un nouveau pseudo invalide
	Étant donné que je suis "administrateur"
	Quand je modifie un utilisateur avec un pseudo correct "tutu"
		Et je renseigne un pseudo invalide "t@t@"
	Alors l’entrée de la table utilisateurs n’est pas modifiée

	Scénario: Un Administrateur modifie l’e-mail d’un contributeur, et entre un nouvel e-mail valide
	Étant donné que je suis "administrateur"
	Quand je modifie un utilisateur avec un email correct "toto@facesimplon.com"
		Et je renseigne un e-mail valide "tutu@facesimplon.com"
	Alors l’entrée de la table utilisateurs est modifiée

	Scénario: Un Administrateur modifie l’e-mail d’un contributeur, et entre un nouvel e-mail invalide
	Étant donné que je suis "administrateur"
	Quand je modifie un utilisateur avec un email correct "tutu@facesimplon.com"
		Et je renseigne un e-mail invalide "tutu-AT-facesimplon-DOT-com"
	Alors l’entrée de la table utilisateurs n’est pas modifiée

	Scénario: Un Administrateur retire un droit valide à un contributeur identifié par un pseudo correct
	Étant donné que je suis "administrateur"
	Quand je modifie un utilisateur avec un pseudo correct "tutu"
		Et je retire un droit valide au contributeur "READ"
	Alors l’entrée de la table utilisateurs est modifiée
	
	Scénario: Un Administrateur retire un droit valide à un contributeur identifié par un e-mail correct
	Étant donné que je suis "administrateur"
	Quand je modifie un utilisateur avec un email correct "tutu@facesimplon.com"
		Et je retire un droit valide au contributeur "WRITE"
	Alors l’entrée de la table utilisateurs est modifiée
	
	Scénario: Un Administrateur ajoute un droit valide à un contributeur identifié par un pseudo correct
	Étant donné que je suis "administrateur"
	Quand je modifie un utilisateur avec un pseudo correct "tutu"
		Et j’ajoute un droit valide au contributeur "READ"
	Alors l’entrée de la table utilisateurs est modifiée
	
	Scénario: Un Administrateur ajoute un droit valide à un contributeur identifié par un e-mail correct
	Étant donné que je suis "administrateur"
	Quand je modifie un utilisateur avec un email correct "tutu@facesimplon.com"
		Et j’ajoute un droit valide au contributeur "WRITE"
	Alors l’entrée de la table utilisateurs est modifiée
	
	Scénario: Un Administrateur retire un droit invalide à un contributeur
	Étant donné que je suis "administrateur"
	Quand je modifie un utilisateur avec un pseudo correct "tutu"
		Et je retire un droit invalide au contributeur "SING"
	Alors l’entrée de la table utilisateurs n’est pas modifiée
	
	Scénario: Un Administrateur ajoute un droit invalide à un contributeur
	Étant donné que je suis "administrateur"
	Quand je modifie un utilisateur avec un pseudo correct "tutu"
		Et j’ajoute un droit invalide au contributeur "SING"
	Alors l’entrée de la table utilisateurs n’est pas modifiée
	
	Scénario: Un Administrateur supprime un contributeur avec un pseudo correct
	Étant donné que je suis "administrateur"
	Quand je supprime un utilisateur avec un pseudo correct "tutu"
	Alors l’entrée de la table utilisateurs est supprimée

	Scénario: Un Administrateur essaye de supprimer un contributeur avec un pseudo incorrect
	Étant donné que je suis "administrateur"
	Quand je supprime un utilisateur avec un pseudo incorrect "tutu"
	Alors l’entrée de la table utilisateurs n’est pas supprimée

	Scénario: Un Administrateur supprime un contributeur avec un e-mail correct
	Étant donné que je suis "administrateur"
	Et que un utilisateur existe avec le pseudo "titi" et l’e-mail "titi@facesimplon.com"
	Quand je supprime un utilisateur avec un email correct "titi@facesimplon.com"
	Alors l’entrée de la table utilisateurs est supprimée

	Scénario: Un Administrateur essaye de supprimer un contributeur avec un e-mail incorrect
	Étant donné que je suis "administrateur"
	Quand je supprime un utilisateur avec un email incorrect "titi@facesimplon.com"
	Alors l’entrée de la table utilisateurs n’est pas supprimée