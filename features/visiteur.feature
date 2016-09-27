# language: fr
Fonctionnalité: Opérations d’un visiteur

	Contexte:
		Étant donné que un bloc existe avec la date "1 janvier 1970" et le titre "Réunion publique" et le type de média "img+snd"


	Scénario: Un Visiteur cherche des blocs publiés à une date donnée, et au moins un bloc remplit ce critère
	Étant donné que je suis visiteur
	Quand je filtre les bloc par "date" avec la valeur "1 janvier 1970"
		Et un bloc existe
	Alors un sous-ensemble des blocs est retourné

	Scénario: Un Visiteur cherche des blocs avec un titre donné, et au moins un bloc remplit ce critère
	Étant donné que je suis visiteur
	Quand je filtre les bloc par "titre" avec la valeur "Réunion publique"
		Et un bloc existe
	Alors un sous-ensemble des blocs est retourné

	Scénario: Un Visiteur cherche des blocs contenant un type de média donné, et aucun bloc ne remplit ce critère
	Étant donné que je suis visiteur
	Quand je filtre les bloc par "type de media" avec la valeur "vid"
		Et aucun bloc existe
	Alors un message d’erreur est affiché "texte du message"

	Scénario: Un Visiteur cherche des blocs contenant un type de média donné, et au moins un bloc remplit ce critère
	Étant donné que je suis visiteur
	Quand je filtre les bloc par "type de media" avec la valeur "img+snd"
		Et un bloc existe
	Alors un sous-ensemble des blocs est retourné

	Scénario: Un Visiteur demande à se connecter avec des identifiants valides
	Étant donné que je suis visiteur
	Quand je me connecte avec comme pseudo "pseudo" et comme mot de passe "pwd"
		Et mon couple pseudo/mot de passe est valide
	Alors je suis connecté en tant que "id"

	Scénario: Un Visiteur demande à se connecter avec des identifiants invalides, et a fait moins de x essais "x"
	Étant donné que je suis visiteur
	Quand je me connecte avec comme pseudo "pseudo" et comme mot de passe "pwd"
		Et mon couple pseudo/mot de passe est invalide
		Et j’ai fait moins de x essais "x"
	Alors un message d’erreur est affiché "texte du message"
		Et mon nombre d’essais est augmenté de un
		Et un nouveau couple d’identifiants est demandé

	Scénario: Un Visiteur demande à se connecter avec des identifiants invalides, et a déjà fait x essais "x"
	Étant donné que je suis visiteur
	Quand je me connecte avec comme pseudo "pseudo" et comme mot de passe "pwd"
		Et mon couple pseudo/mot de passe est invalide
		Et j’ai fait au moins x essais "x"
	Alors un message d’erreur est affiché "texte du message"
		Et le compte associé au pseudo est bloqué "id"

	Scénario: Un Visiteur demande à se connecter avec des identifiants valides
	Étant donné que je suis visiteur
	Quand je me connecte avec comme e-mail "e-mail" et comme mot de passe "pwd"
		Et mon couple e-mail/mot de passe est valide
	Alors je suis connecté en tant que "id"

	Scénario: Un Visiteur demande à se connecter avec des identifiants invalides, et a fait moins de x essais "x"
	Étant donné que je suis visiteur
	Quand je me connecte avec comme e-mail "e-mail" et comme mot de passe "pwd"
		Et mon couple e-mail/mot de passe est invalide
		Et j’ai fait moins de x essais "x"
	Alors un message d’erreur est affiché "texte du message"
		Et mon nombre d’essais est augmenté de un
		Et un nouveau couple d’identifiants est demandé

	Scénario: Un Visiteur demande à se connecter avec des identifiants invalides, et a déjà fait 3 essais
	Étant donné que je suis visiteur
	Quand je me connecte avec comme e-mail "e-mail" et comme mot de passe "pwd"
		Et mon couple e-mail/mot de passe est invalide
		Et j’ai fait au moins 3 essais
	Alors un message d’erreur est affiché "texte du message"
		Et le compte associé au e-mail est bloqué "id"

	Scénario: Un Visiteur demande la génération d’un nouveau mot de passe, et fournit un pseudo valide
	Étant donné que je suis visiteur
	Quand je demande la génération d’un nouveau mot de passe pour l’utilisateur avec le pseudo "pseudo"
		Et mon pseudo est correct
	Alors un e-mail est envoyé à "e-mail"

	Scénario: Un Visiteur demande la génération d’un nouveau mot de passe, et fournit un pseudo valide
	Étant donné que je suis visiteur
	Quand je demande la génération d’un nouveau mot de passe pour l’utilisateur avec le pseudo "pseudo"
		Et mon pseudo est incorrect
	Alors un message d’erreur est affiché "texte du message"
		Et un nouveau pseudo est demandé

	Scénario: Un Visiteur demande la génération d’un nouveau mot de passe, et fournit un e-mail valide
	Étant donné que je suis visiteur
	Quand je demande la génération d’un nouveau mot de passe pour l’utilisateur avec l’e-mail "e-mail"
		Et mon e-mail est correct
	Alors un e-mail est envoyé à "e-mail"

	Scénario: Un Visiteur demande la génération d’un nouveau mot de passe, et fournit un e-mail valide
	Étant donné que je suis visiteur
	Quand je demande la génération d’un nouveau mot de passe pour l’utilisateur avec l’e-mail "e-mail"
		Et mon e-mail est incorrect
	Alors un message d’erreur est affiché "texte du message"
		Et un nouvel e-mail est demandé
