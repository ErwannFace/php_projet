# language: fr
Fonctionnalité: Opérations d’un Administrateur

	Scénario: Un Administrateur ajoute un utilisateur
	Étant donné que je suis "Administrateur"
	Quand j’ajoute un utilisateur
		Et je renseigne un pseudo valide "pseudo"
		Et je renseigne un e-mail valide "e-mail"
	Alors un mot de passe est généré automatiquement
		Et une entrée est créée dans la table utilisateurs "pseudo" "e-mail" "mot_de_passe"
		Et un e-mail est envoyé au nouveau contributeur "e-mail" "pseudo" "mot_de_passe"

	Scénario: Un Administrateur essaye d’ajouter un utilisateur avec un pseudo invalide
	Étant donné que je suis "Administrateur"
	Quand j’ajoute un utilisateur
		Et je renseigne un pseudo invalide "pseudo"
	Alors un message d’erreur est affiché "message"
		Et un nouveau pseudo est demandé

	Scénario: Un Administrateur essaye d’ajouter un utilisateur avec un e-mail invalide
	Étant donné que je suis "Administrateur"
	Quand j’ajoute un utilisateur
		Et je renseigne un e-mail invalide "e-mail"
	Alors un message d’erreur est affiché "message"
		Et un nouvel e-mail est demandé