# language: fr
Fonctionnalité: Opérations d’un Contributeur

Scénario: Un visiteur se connecte avec son pseudo
Etant donné que je suis "visiteur"
Quand je suis sur la page modal de connection
		Et je saisis un pseudo valide "pseudo"
		Et je saisis un mot de passe valide "mot de passe"
		Et je clique sur se connecter
 Alors ma connection est validée
		Et j’arrive sur la page accueil

	
Scénario: Un visiteur se connecte avec son email
Etant donné que je suis "visiteur"
Quand je suis sur la page modal de connection
	Et je saisis un email valide "email"
	Et je saisis un mot de passe valide "mot de passe"
	Et je clique sur se connecter
Alors ma connection est validée
	Et j’arrive sur la page accueil

Scénario: Un visiteur essaye de se connecter avec son pseudo
Etant donné que je suis "visiteur"
Quand je suis sur la page modal de connection
	Et je saisis un mot de passe valide "mot de passe"
	Et je saisis un pseudo non valide "pseudo"
Alors un message d’erreur apparaît "message"
	Et je suis renvoyé sur la modal de connection vierge
	
Scénario: Un visiteur essaye de se connecter avec son email 
Etant donné que je suis "visiteur"
Quand je suis sur la page modal de connection
	Et je saisis un mot de passe valide "mot de passe"
	Et je saisis un email non valide "email"
Alors un message d’erreur apparaît "message"
	Et je suis renvoyé sur la modal de connection vierge
	
Scénario: Un visiteur essaye de se connecter avec mot de passe et pseudo
Etant donné que je suis "visiteur"
Quand je suis sur la page modal de connection
	Et je saisis un mot de passe  non valide  "mot de passe"
	Et je saisis un pseudo  valide "pseudo"
Alors un message d’errreur apparaît "message"
	Et je suis renvoyé sur la modal de connection vierge


Scénario: Un visiteur essaye de se connecter avec mot de passe et email
Etant donné que je suis "visiteur"
Quand je suis sur la page modal de connection
	Et je saisis un mot de passe  non valide "mot de passe"
	Et je saisis un email  valide "email"
Alors un message d’errreur apparaît "message"
	Et je suis renvoyé sur la modal de connection vierge


Scénario: Un visiteur essaye de se connecter 3 fois
Etant donné que je suis "visiteur"
Quand je suis sur le modal de connection
	Et j’ai déjà saisis mes identifiants non valide 3 fois  "identifiant"
Alors un "message" d’erreur apparaît "message"
	Et mon compte est bloqué pendant X temps


Scénario: Un Contributeur s'est connecté et renseigne un Bloc
Etant donné que je suis "Contributeur"
Quand je suis sur la modal « ajouter un Bloc » "id"
	Et que j’ai rentré un titre "titre"
	Et un format "format"
	Et  un média compatible "media"
Et je confirme l’ajout de Bloc
Alors j’arrive sur la page accueil avec un bloc supplémentaire



Scénario: Un Contributeur essaye d'ajouter un bloc mal renseigné sans titre
Etant donné que je suis "Contributeur"
Quand je suis sur la modal « ajouter un Bloc » "id"
	Et que j’ai oublié de rentrer un titre "titre"
	Et j’ai rentré un format "format"
	Et  j’ai rentré un média compatible "media"
Et le bouton de confirmation d’ajout de Bloc n’est pas cliquable
Alors je rentre mon titre "titre"


Scénario: Un Contributeur essaye d'ajouter un bloc mal renseigné sans format
Etant donné que je suis "Contributeur"
Quand je suis sur la modal « ajouter un Bloc » "id"
	Et que j’ai rentré un titre "titre"
	Et j’ai oublié de rentré un format "format"
	Et  j’ai rentré un média compatible "média"
Quand je clique sur ajouter Bloc
Et le bouton de confirmation d’ajout de Bloc n’est pas cliquable
Alors je rentre mon format "format"


Scénario: Un Contributeur essaye d'ajouter un bloc mal renseigné sans media
Etant donné que je suis "Contributeur"
Quand je suis sur la modal « ajouter un Bloc »
	Et j’ai rentrer un titre "titre"
	Et j’ai rentré un format "format"
	Et j’ai oublié de rentré un média "média"
Quand un message d’erreur apparait "message"
Alors je dois ajouter un media pour confirmer l’ajout du Bloc

Scénario: Un Contributeur essaye d'ajouter un bloc mal renseigné media
Etant donné que je suis "Contributeur"
Quand je suis sur la modal « ajouter un Bloc »
	Et j’ai rentrer un titre "titre"
	Et j’ai rentré un format "format"
	Et j’ai rentré un média incompatible "média"
Quand un message d’erreur apparait "message"
Alors je dois ajouter un media compatible pour confirmer l’ajout du Bloc


Scénario: Un Contributeur essaye de modifier un bloc mal renseigné media
Etant donné que je suis "Contributeur"
Quand que je veux modifier un Bloc "id"
	Et je suis sur la modal «modifier un Bloc»
	Et que j’ai rentré un titre "titre"
	Et j’ai rentré un format "format"
	Et j’ai rentré un média incompatible "media"
Quand un message d’erreur apparait "message"
Alors je dois ajouter un media valide pour confirmer l’ajout du Bloc

Scénario: Un Contributeur essaye de modifier un bloc mal renseigné sans media
Etant donné que je suis "Contributeur"
Quand que je veux modifier un Bloc "id"
	Et je suis sur la modal «modifier un Bloc»
	Et que j’ai rentré un titre "titre"
	Et j’ai rentré un format "format"
	Et je n’ai pas rentré un média "media"
Quand un message d’erreur apparait "message"
Alors je dois ajouter un media valide pour confirmer l’ajout du Bloc

Scénario: Un Contributeur essaye de modifier un bloc mal renseigné sans titre
Etant donné que je suis "Contributeur"
Quand je veux modifier un bloc "id"
	Et je suis sur la modal «modifier un Bloc»
	Et  je n’ai pas rentré un titre "titre"
	Et j’ai rentré un format "format"
	Et  j’ai rentré un média compatible "media"
Quand une message d’erreur apparait "message"
Alors je dois ajouter un media valide pour confirmer l’ajout duBloc

Scénario: Un Contributeur essaye de modifier un bloc mal renseigné sans format
Etant donné que je suis "Contributeur"
Quand je veux modifier un bloc "id"
	Et je suis sur la modal «modifier un Bloc»
	Et je n’ai rentré un titre "titre"
	Et je n’ai pas rentré un format "format"
	Et  j’ai rentré un média compatible "media"
Quand une message d’erreur apparait "message"
Alors je dois ajouter un media valide pour confirmer l’ajout duBloc


Scénario: Un Contributeur arrive à modifier un bloc
Etant donné que je suis "Contributeur"
Quand je veux modifier un artcile "id"
	Et je suis sur la modal «modifier un Bloc»
	Et que j’ai rentrer un titre  "titre"
	Et j’ai rentré un format un format "format"
	Et  j’ai rentré un média compatible "media"
Quand J’ai cliqué sur « valider »
Alors une modal de confirmation apparaît

Scénario: Un Contributeur confirme la modification du bloc
Etant donné que je suis "Contributeur"
Quand je veux modifier un Bloc "id"
	Et  j’ai bien modifié le Bloc
Quand J’ai cliqué sur « valider » dans la modal de confirmation
Alors je suis sur accueil 
	Et mon Bloc est modifié


Scénario: Un Contributeur essaye de modifier un bloc pendant qu'un autre utilisateur le supprime
Etant donné que je suis "Contributeur"
Quand je veux modifier un Bloc "id"
	Et j’ai bien modifié le Bloc
	Et ce Bloc a été supprimé entre-temps
	Et je valide la modification
Alors une fenetre de confirmation de création ou d'abandon du Bloc apparaît

Scénario: Un Contributeur essaye de modifier un bloc pendant qu'un autre utilisateur le modifie
Etant donné que je suis "Contributeur"
Quand je veux modifier un Bloc "id"
	Et j’ai bien modifier le Bloc
	Et ce Bloc a été modifié entre-temps
	Et je valide la modification
Alors une fenetre de confirmation de modification ou d'abandon du Bloc apparaît


Scénario: Un Contributeur supprime un Bloc
Etant donné que je suis "Contributeur"
Quand je veux supprimer un Bloc "id"
	  Et je clique sur « supprimer le Bloc »
Alors un message de confirmation apparaît

Scénario: Un Contributeur confirme la suppression du Bloc
Etant donné que je suis "Contributeur"
Quand je veux supprimer un Bloc "id"
    	Et j’ai cliqué sur « supprimer le Bloc »
    	Et un message de confirmation apparaît
    	Et je clique sur « confirmer »
Alors je retourne sur accueil avec un Bloc en moins.

Scénario: Un Contributeur invalide la suppression du Bloc.
Etant donné que je suis "Contributeur"
Quand je veux supprimer un Bloc "id"
     Et j’ai cliquer sur « supprimer le Bloc »
     Et un message de confirmation apparaît
     Et je clique sur « annuler»
Alors je retourne sur accueil .

Scénario: Un visiteur se connecte avec son pseudo
Etant donné que je suis "visiteur"
Quand je suis sur la page modal de connection
		Et je saisis un pseudo valide "pseudo"
		Et je saisis un mot de passe valide "mot de passe"
		Et je clique sur se connecter
 Alors ma connection est validée
		Et j’arrive sur la page accueil

	
Scénario: Un visiteur se connecte avec son email
Etant donné que je suis "visiteur"
Quand je suis sur la page modal de connection
	Et je saisis un email valide "email"
	Et je saisis un mot de passe valide "mot de passe"
	Et je clique sur se connecter
Alors ma connection est validée
	Et j’arrive sur la page accueil

Scénario: Un visiteur essaye de se connecter avec son pseudo
Etant donné que je suis "visiteur"
Quand je suis sur la page modal de connection
	Et je saisis un mot de passe valide "mot de passe"
	Et je saisis un pseudo non valide "pseudo"
Alors un message d’erreur apparaît "message"
	Et je suis renvoyé sur la modal de connection vierge
	
Scénario: Un visiteur essaye de se connecter avec son email 
Etant donné que je suis "visiteur"
Quand je suis sur la page modal de connection
	Et je saisis un mot de passe valide "mot de passe"
	Et je saisis un email non valide "email"
Alors un message d’erreur apparaît "message"
	Et je suis renvoyé sur la modal de connection vierge
	
Scénario: Un visiteur essaye de se connecter avec mot de passe et pseudo
Etant donné que je suis "visiteur"
Quand je suis sur la page modal de connection
	Et je saisis un mot de passe  non valide  "mot de passe"
	Et je saisis un pseudo  valide "pseudo"
Alors un message d’errreur apparaît "message"
	Et je suis renvoyé sur la modal de connection vierge


Scénario: Un visiteur essaye de se connecter avec mot de passe et email
Etant donné que je suis "visiteur"
Quand je suis sur la page modal de connection
	Et je saisis un mot de passe  non valide "mot de passe"
	Et je saisis un email  valide "email"
Alors un message d’errreur apparaît "message"
	Et je suis renvoyé sur la modal de connection vierge


Scénario: Un visiteur essaye de se connecter 3 fois
Etant donné que je suis "visiteur"
Quand je suis sur le modal de connection
	Et j’ai déjà saisis mes identifiants non valide 3 fois  "identifiant"
Alors un "message" d’erreur apparaît "message"
	Et mon compte est bloqué pendant X temps


Scénario: Un Contributeur s'est connecté et renseigne un Bloc
Etant donné que je suis "Contributeur"
Quand je suis sur la modal « ajouter un Bloc » "id"
	Et que j’ai rentré un titre "titre"
	Et un format "format"
	Et  un média compatible "media"
Et je confirme l’ajout de Bloc
Alors j’arrive sur la page accueil avec un bloc supplémentaire



Scénario: Un Contributeur essaye d'ajouter un bloc mal renseigné sans titre
Etant donné que je suis "Contributeur"
Quand je suis sur la modal « ajouter un Bloc » "id"
	Et que j’ai oublié de rentrer un titre "titre"
	Et j’ai rentré un format "format"
	Et  j’ai rentré un média compatible "media"
Et le bouton de confirmation d’ajout de Bloc n’est pas cliquable
Alors je rentre mon titre "titre"


Scénario: Un Contributeur essaye d'ajouter un bloc mal renseigné sans format
Etant donné que je suis "Contributeur"
Quand je suis sur la modal « ajouter un Bloc » "id"
	Et que j’ai rentré un titre "titre"
	Et j’ai oublié de rentré un format "format"
	Et  j’ai rentré un média compatible "média"
Quand je clique sur ajouter Bloc
Et le bouton de confirmation d’ajout de Bloc n’est pas cliquable
Alors je rentre mon format "format"


Scénario: Un Contributeur essaye d'ajouter un bloc mal renseigné sans media
Etant donné que je suis "Contributeur"
Quand je suis sur la modal « ajouter un Bloc »
	Et j’ai rentrer un titre "titre"
	Et j’ai rentré un format "format"
	Et j’ai oublié de rentré un média "média"
Quand un message d’erreur apparait "message"
Alors je dois ajouter un media pour confirmer l’ajout du Bloc

Scénario: Un Contributeur essaye d'ajouter un bloc mal renseigné media
Etant donné que je suis "Contributeur"
Quand je suis sur la modal « ajouter un Bloc »
	Et j’ai rentrer un titre "titre"
	Et j’ai rentré un format "format"
	Et j’ai rentré un média incompatible "média"
Quand un message d’erreur apparait "message"
Alors je dois ajouter un media compatible pour confirmer l’ajout du Bloc


Scénario: Un Contributeur essaye de modifier un bloc mal renseigné media
Etant donné que je suis "Contributeur"
Quand que je veux modifier un Bloc "id"
	Et je suis sur la modal «modifier un Bloc»
	Et que j’ai rentré un titre "titre"
	Et j’ai rentré un format "format"
	Et j’ai rentré un média incompatible "media"
Quand un message d’erreur apparait "message"
Alors je dois ajouter un media valide pour confirmer l’ajout du Bloc

Scénario: Un Contributeur essaye de modifier un bloc mal renseigné sans media
Etant donné que je suis "Contributeur"
Quand que je veux modifier un Bloc "id"
	Et je suis sur la modal «modifier un Bloc»
	Et que j’ai rentré un titre "titre"
	Et j’ai rentré un format "format"
	Et je n’ai pas rentré un média "media"
Quand un message d’erreur apparait "message"
Alors je dois ajouter un media valide pour confirmer l’ajout du Bloc

Scénario: Un Contributeur essaye de modifier un bloc mal renseigné sans titre
Etant donné que je suis "Contributeur"
Quand je veux modifier un bloc "id"
	Et je suis sur la modal «modifier un Bloc»
	Et  je n’ai pas rentré un titre "titre"
	Et j’ai rentré un format "format"
	Et  j’ai rentré un média compatible "media"
Quand une message d’erreur apparait "message"
Alors je dois ajouter un media valide pour confirmer l’ajout duBloc

Scénario: Un Contributeur essaye de modifier un bloc mal renseigné sans format
Etant donné que je suis "Contributeur"
Quand je veux modifier un bloc "id"
	Et je suis sur la modal «modifier un Bloc»
	Et je n’ai rentré un titre "titre"
	Et je n’ai pas rentré un format "format"
	Et  j’ai rentré un média compatible "media"
Quand une message d’erreur apparait "message"
Alors je dois ajouter un media valide pour confirmer l’ajout duBloc


Scénario: Un Contributeur arrive à modifier un bloc
Etant donné que je suis "Contributeur"
Quand je veux modifier un artcile "id"
	Et je suis sur la modal «modifier un Bloc»
	Et que j’ai rentrer un titre  "titre"
	Et j’ai rentré un format un format "format"
	Et  j’ai rentré un média compatible "media"
Quand J’ai cliqué sur « valider »
Alors une modal de confirmation apparaît

Scénario: Un Contributeur confirme la modification du bloc
Etant donné que je suis "Contributeur"
Quand je veux modifier un Bloc "id"
	Et  j’ai bien modifié le Bloc
Quand J’ai cliqué sur « valider » dans la modal de confirmation
Alors je suis sur accueil 
	Et mon Bloc est modifié


Scénario: Un Contributeur essaye de modifier un bloc pendant qu'un autre utilisateur le supprime
Etant donné que je suis "Contributeur"
Quand je veux modifier un Bloc "id"
	Et j’ai bien modifié le Bloc
	Et ce Bloc a été supprimé entre-temps
	Et je valide la modification
Alors une fenetre de confirmation de création ou d'abandon du Bloc apparaît

Scénario: Un Contributeur essaye de modifier un bloc pendant qu'un autre utilisateur le modifie
Etant donné que je suis "Contributeur"
Quand je veux modifier un Bloc "id"
	Et j’ai bien modifier le Bloc
	Et ce Bloc a été modifié entre-temps
	Et je valide la modification
Alors une fenetre de confirmation de modification ou d'abandon du Bloc apparaît


Scénario: Un Contributeur supprime un Bloc
Etant donné que je suis "Contributeur"
Quand je veux supprimer un Bloc "id"
	  Et je clique sur « supprimer le Bloc »
Alors un message de confirmation apparaît

Scénario: Un Contributeur confirme la suppression du Bloc
Etant donné que je suis "Contributeur"
Quand je veux supprimer un Bloc "id"
    	Et j’ai cliqué sur « supprimer le Bloc »
    	Et un message de confirmation apparaît
    	Et je clique sur « confirmer »
Alors je retourne sur accueil avec un Bloc en moins.

Scénario: Un Contributeur invalide la suppression du Bloc.
Etant donné que je suis "Contributeur"
Quand je veux supprimer un Bloc "id"
     Et j’ai cliquer sur « supprimer le Bloc »
     Et un message de confirmation apparaît
     Et je clique sur « annuler»
Alors je retourne sur accueil .