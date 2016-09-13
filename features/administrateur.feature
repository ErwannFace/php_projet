# language: fr
Fonctionnalité: Opérations d’un Administrateur

	Scénario: Un Administrateur ajoute un utilisateur
	Étant donné que je suis Administrateur
	Quand j’ajoute un utilisateur
		Et je renseigne un pseudo valide
		Et je renseigne un e-mail valide
	Alors un mot de passe est généré automatiquement (chiffrement, etc.)
		Et une entrée est créée dans la table "utilisateurs" de la base de données
		Et un e-mail est envoyé au nouveau contributeur pour lui donner son mot de passe

	Scénario: Un Administrateur essaye d’ajouter un utilisateur avec un pseudo invalide
	Étant donné que je suis Administrateur
	Quand j’ajoute un utilisateur
		Et je renseigne un pseudo invalide (caractères interdits, nombre de caractères hors-limite, etc.)
	Alors un message d’erreur est affiché
		Et un nouveau pseudo est demandé

	Scénario: Un Administrateur essaye d’ajouter un utilisateur avec un e-mail invalide
	Étant donné que je suis Administrateur
	Quand j’ajoute un utilisateur
		Et je renseigne un e-mail invalide (caractères interdits, "@" manquante, etc.)
	Alors un message d’erreur est affiché
		Et un nouvel e-mail est demandé