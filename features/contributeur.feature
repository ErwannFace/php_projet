# language: fr
Fonctionnalité: Opérations d’un Contributeur

Scénario: Un Contributeur se connecte
Etant donné que je suis "Contributeur"
	Et je suis sur la page modal de connection
	Et je saisis un pseudo valide "pseudo"
	Et je saisis un mot de passe valide "mot de passe"
	Et je clique sur se connecter
 Alors ma connection est validée
	Et j’arrive sur la page accueil
	
Scénario: Un Contributeur se connecte
Etant donné que je suis "Contributeur"
	Et je suis sur la page modal de connection
	Et je saisis un email valide "email"
	Et je saisis un mot de passe valide "mot de passe"
	Et je clique sur se connecter
Alors ma connection est validée
	Et j’arrive sur la page accueil

Scénario: Un Contributeur se connecte
Etant donné que je suis "Contributeur"
	Et je suis sur la page modal de connection
	Et je saisis un mot de passe valide "mot de passe"
	Et je saisis un pseudo non valide "pseudo"
Alors un message d’erreur apparaît "message"
	Et je suis renvoyé sur la modal de connection vierge
	
Scénario: Un Contributeur se connecte
Etant donné que je suis "Contributeur"
	Et je suis sur la page modal de connection
	Et je saisis un email valide "email"
	Et je saisis un mot de passe valide "mot de passe"
	Et je clique sur se connecter
Alors ma connection est validée
	Et j’arrive sur la page accueil


Scénario: Un Contributeur se connecte
Etant donné que je suis "Contributeur"
	Et je suis sur la page modal de connection
	Et je saisis un mot de passe valide "mot de passe"
	Et je saisis un email non valide "email"
Alors un message d’erreur apparaît "message"
	Et je suis renvoyé sur la modal de connection vierge
	
Scénario: Un Contributeur se connecte
Etant donné que je suis "Contributeur"
	Et je suis sur la page modal de connection
	Et je saisis un mot de passe  non valide  "mot de passe"
	Et je saisis un pseudo  valide "pseudo"
Alors un message d’errreur apparaît "message"
	Et je suis renvoyé sur la modal de connection vierge

Scénario: Un Contributeur se connecte
Etant donné que je suis "Contributeur"
	Et je suis sur la page modal de connection
	Et je saisis un mot de passe valide  "mot de passe"
	Et je saisis un pseudo non valide "pseudo"
Alors un message d’erreur apparaît "message"
	Et je suis renvoyé sur la modal de connection vierge

Scénario: Un Contributeur se connecte
Etant donné que je suis "Contributeur"
	Et je suis sur la page modal de connection
	Et je saisis un mot de passe  non valide "mot de passe"
	Et je saisis un email  valide "email"
Alors un message d’errreur apparaît "message"
	Et je suis renvoyé sur la modal de connection vierge


Scénario: Un Contributeur se connecte
Etant donné que je suis "Contributeur"
	Et je suis sur le modal de connection
	Et j’ai déjà saisis mes identifiants non valide X fois  "identifiant"
Alors un "message" d’erreur apparaît "message"
	Et mon compte est bloqué pendant X temps

Scénario: Un Contributeur se connecte
Etant donné que je suis "Contributeur"
	Et je suis sur la page modal de connection
	Et j’ai oublié mes identifiants "identifiants"
Et je clique sur « réinitialiser le mot de passe »
Alors apparaît une modal box de réinitialisation


Scénario: Un Contributeur s'est connecté
Etant donné que je suis "Contributeur"
	Et je clique sur « ajouter un Bloc »
Alors une modal s’ouvre


Scénario: Un Contributeur s'est connecté et renseigne un Bloc
Etant donné que je suis "Contributeur"
	Et je suis sur la modal « ajouter un Bloc » "id"
	Et que j’ai rentré un titre "titre"
	Et un format "format"
	Et  un média compatible "media"
Et je confirme l’ajout de Bloc
Alors j’arrive sur la page accueil avec un bloc supplémentaire



Scénario: Un Contributeur s' est connecté et renseigne mal le Bloc
Etant donné que je suis "Contributeur"
	Et je suis sur la modal « ajouter un Bloc » "id"
	Et que j’ai oublie de rentrer de rentré un titre "titre"
	Et j’ai rentré un format "format"
	Et  j’ai rentré un média compatible "media"
Et le bouton de confirmation d’ajout de Bloc n’est pas cliquable
Alors je rentre mon titre "titre"


Scénario: Un Contributeur s'est connecté et renseigne mal le Bloc
Etant donné que je suis "Contributeur"
	Et je suis sur la modal « ajouter un Bloc » "id"
	Et que j’ai  rentrer de rentrer un titre "titre"
	Et j’ai oublié de rentré un format "format"
	Et  j’ai rentré un média compatible "média"
Quand je clique sur ajouter Bloc
Alors mon format est defini par defaut "format"


Scénario: Un Contributeur s'est connecté et renseigne mal le Bloc
Etant donné que je suis "Contributeur"
	Et je suis sur la modal « ajouter un Bloc »
	Et j’ai rentrer un titre "titre"
	Et j’ai rentré un format "format"
	Et j’ai rentré un média incompatible "média"
Quand un message d’erreur apparait "message"
Alors je dois ajouter un media pour confirmer l’ajout du Bloc


Scénario: Un Contributeur s'est connecté et renseigne mal le Bloc
Etant donné que je suis "Contributeur"
	Et que je veux modifier un Bloc "id"
	Et je suis sur la modal «modifier un Bloc»
	Et que j’ai rentrer un titre "titre"
	Et j’ai rentré un format "format"
	Et j’ai rentré un média incompatible "media"
Quand une message d’erreur apparait "message"
Alors je dois ajouter un media valide pour confirmer l’ajout du Bloc

Scénario: Un Contributeur s'est connecté et renseigne mal le Bloc
Etant donné que je suis "Contributeur"
	Et que je veux modifier un bloc "id"
	Et je suis sur la modal «modifier un Bloc»
	Et  je n’ai pas rentrer un titre "titre"
	Et j’ai rentré un format "format"
	Et  j’ai rentré un média compatible "media"
Quand une message d’erreur apparait "message"
Alors je dois ajouter un media valide pour confirmer l’ajout duBloc

Scénario: Un Contributeur s'est connecté et renseigne mal le Bloc
Etant donné que je suis "Contributeur"
	Et que je veux modifier un artcile "id"
	Et je suis sur la modal «modifier un Bloc»
	Et que j’ai rentrer un titre  "titre"
	Et j’ai rentré un format un format "format"
	Et  j’ai rentré un média compatible "media"
Quand J’ai cliqué sur « valider »
Alors une modal de confirmation apparaît


Scénario: Un Contributeur s'est connecté et renseigne bien le Bloc
Etant donné que je suis "Contributeur"
	Et que je veux modifier un Bloc "id"
	Et  j’ai bien modifier le Bloc
Quand J’ai cliqué sur « valider » dans la modal de confirmation
Alors je suis sur accueil 
	Et mon Bloc est modifie

Scénario: Un Contributeur s'est connecté et renseigne bien le Bloc
Etant donné que je suis "Contributeur"
	Et que je veux modifier un Bloc "id"
	Et j’ai bien modifier le Bloc
Quand cet Bloc a été modifier/supprimer entre-temps
Alors une fenetre de confirmation de creation du Bloc apparaît


Scénario: Un Contributeur s'est connecté et supprime un Bloc
Etant donné que je suis "Contributeur"
    Et que je veux supprimer un Bloc "id"
Quand que j’ai cliquer sur « supprimer le Bloc »
ALORS un message de confirmation apparaît

Scénario: Un Contributeur s'est connecté et supprime bien un Bloc
Etant donné que je suis "Contributeur"
    Et je veux supprimer un Bloc "id"
    Etj’ai cliquer sur « supprimer le Bloc »
    Et un message de confirmation apparaît
Quand je clique sur « confirmer »
ALORS je retourne sur accueil avec un Bloc en moins.

Scénario: Un Contributeur s'est connecté et invalide la suppression de le Bloc.
Etant donné que je suis "Contributeur"
    Et je veux supprimer un Bloc "id"
    Et j’ai cliquer sur « supprimer le Bloc »
    Et un message de confirmation apparaît
Quand je clique sur « annuler»
ALORS je retourne sur accueil .