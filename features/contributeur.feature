# language: fr
Fonctionnalité: Opérations d’un Contributeur

Scénario: Un visiteur se connecte avec son pseudo
Etant donné que je suis "visiteur"
Quand je suis sur la page modal de connection
		Et je saisis un pseudo valide "pseudo"
		Et je saisis un mot de passe valide "mot de passe"
 Alors ma connection est validée

	
Scénario: Un visiteur se connecte avec son email
Etant donné que je suis "visiteur"
Quand je me connecte
	Et je saisis un email valide "email"
	Et je saisis un mot de passe valide "mot de passe"
Alors ma connection est validée

Scénario: Un visiteur essaye de se connecter avec son pseudo
Etant donné que je suis "visiteur"
Quand je me connecte
	Et je saisis un mot de passe valide "mot de passe"
	Et je saisis un pseudo non valide "pseudo"
Alors ma connection n'est pas validée
	
Scénario: Un visiteur essaye de se connecter avec son email 
Etant donné que je suis "visiteur"
Quand je me connecte
	Et je saisis un mot de passe valide "mot de passe"
	Et je saisis un email non valide "email"
Alors ma connection n'est pas validé
	
Scénario: Un visiteur essaye de se connecter avec mot de passe et pseudo
Etant donné que je suis "visiteur"
Quand je me connecte
	Et je saisis un mot de passe  non valide  "mot de passe"
	Et je saisis un pseudo  valide "pseudo"
Alors Alors ma connection n'est pas validé


Scénario: Un visiteur essaye de se connecter avec mot de passe et email
Etant donné que je suis "visiteur"
Quand je me connecte
	Et je saisis un mot de passe  non valide "mot de passe"
	Et je saisis un email  valide "email"
Alors Alors ma connection n'est pas validé


Scénario: Un visiteur essaye de se connecter 3 fois
Etant donné que je suis "visiteur"
Quand je me connecte
	Et j’ai déjà saisis mes identifiants non valide 3 fois  "identifiant"
Alors un "message" d’erreur apparaît "message"
	Et mon compte est bloqué pendant X temps


Scénario: Un Contributeur s'est connecté et renseigne un Bloc
Etant donné que je suis "Contributeur"
Quand j'ajoute un bloc
	Et que j’ai rentré un titre "titre"
	Et un format "format"
	Et  un média compatible "media"
Et je confirme l’ajout de Bloc
Alors le bloc est ajouté



Scénario: Un Contributeur essaye d'ajouter un bloc mal renseigné sans titre
Etant donné que je suis "Contributeur"
Quand j'ajoute un bloc
	Et que j’ai oublié de rentrer un titre "titre"
	Et j’ai rentré un format "format"
	Et  j’ai rentré un média compatible "media"
Alors je rentre mon titre "titre"


Scénario: Un Contributeur essaye d'ajouter un bloc mal renseigné sans format
Etant donné que je suis "Contributeur"
Quand j'ajoute un bloc
	Et que j’ai rentré un titre "titre"
	Et j’ai oublié de rentré un format "format"
	Et  j’ai rentré un média compatible "média"
Alors je rentre mon format "format"


Scénario: Un Contributeur essaye d'ajouter un bloc mal renseigné sans media
Etant donné que je suis "Contributeur"
Quand j'ajoute un bloc
	Et j’ai rentrer un titre "titre"
	Et j’ai rentré un format "format"
	Et j’ai oublié de rentré un média "média"
Alors j'ajoute un media pour confirmer l’ajout du Bloc

Scénario: Un Contributeur essaye d'ajouter un bloc mal renseigné media
Etant donné que je suis "Contributeur"
Quand j'ajoute un bloc
	Et j’ai rentrer un titre "titre"
	Et j’ai rentré un format "format"
	Et j’ai rentré un média incompatible "média"
Alors je dois ajouter un media compatible pour confirmer l’ajout du Bloc


Scénario: Un Contributeur essaye de modifier un bloc mal renseigné media
Etant donné que je suis "Contributeur"
Quand que je  modifie un Bloc "id"
	Et que j’ai rentré un titre "titre"
	Et j’ai rentré un format "format"
	Et j’ai rentré un média incompatible "media"
Alors je dois ajouter un media valide

Scénario: Un Contributeur essaye de modifier un bloc mal renseigné sans media
Etant donné que je suis "Contributeur"
Quand que je  modifie un Bloc "id"
	Et que j’ai rentré un titre "titre"
	Et j’ai rentré un format "format"
	Et je n’ai pas rentré un média "media"
Alors je dois ajouter un media valide 

Scénario: Un Contributeur essaye de modifier un bloc mal renseigné sans titre
Etant donné que je suis "Contributeur"
Quand je modifie un bloc "id"
	Et  je n’ai pas rentré un titre "titre"
	Et j’ai rentré un format "format"
	Et  j’ai rentré un média compatible "media"
Alors je dois ajouter un media valide

Scénario: Un Contributeur essaye de modifier un bloc mal renseigné sans format
Etant donné que je suis "Contributeur"
Quand je modifie un bloc "id"
	Et je n’ai rentré un titre "titre"
	Et je n’ai pas rentré un format "format"
	Et  j’ai rentré un média compatible "media"
Alors je dois ajouter un media valide


Scénario: Un Contributeur arrive à modifier un bloc
Etant donné que je suis "Contributeur"
Quand je modifie un artcile "id"
	Et que j’ai rentrer un titre  "titre"
	Et j’ai rentré un format un format "format"
	Et  j’ai rentré un média compatible "media"
Alors le bloc est modifié

Scénario: Un Contributeur confirme la modification du bloc
Etant donné que je suis "Contributeur"
Quand je veux modifier un Bloc "id"
	Et  j’ai bien modifié le Bloc
Alors mon Bloc est modifié


Scénario: Un Contributeur essaye de modifier un bloc pendant qu'un autre utilisateur le supprime
Etant donné que je suis "Contributeur"
Quand je veux modifier un Bloc "id"
	Et j’ai bien modifié le Bloc
	Et ce Bloc a été supprimé entre-temps
Alors je cree le bloc

Scénario: Un Contributeur essaye de modifier un bloc pendant qu'un autre utilisateur le supprime
Etant donné que je suis "Contributeur"
Quand je veux modifier un Bloc "id"
	Et j’ai bien modifié le Bloc
	Et ce Bloc a été supprimé entre-temps
Alors je ne  cree pas le bloc 

Scénario: Un Contributeur essaye de modifier un bloc pendant qu'un autre utilisateur le modifie
Etant donné que je suis "Contributeur"
Quand je veux modifier un Bloc "id"
	Et j’ai bien modifier le Bloc
	Et ce Bloc a été modifié entre-temps
Alors je modifie le bloc

Scénario: Un Contributeur essaye de modifier un bloc pendant qu'un autre utilisateur le modifie
Etant donné que je suis "Contributeur"
Quand je veux modifier un Bloc "id"
	Et j’ai bien modifier le Bloc
	Et ce Bloc a été modifié entre-temps
Alors je modifie pas le bloc

Scénario: Un Contributeur supprime un Bloc
Etant donné que je suis "Contributeur"
Quand je supprime un Bloc "id"
Alors le bloc est supprimé



Scénario: Un visiteur se connecte avec son pseudo
Etant donné que je suis "visiteur"
Quand je me connecte
		Et je saisis un pseudo valide "pseudo"
		Et je saisis un mot de passe valide "mot de passe"
 Alors ma connection est validée

	
Scénario: Un visiteur se connecte avec son email
Etant donné que je suis "visiteur"
Quand je suis sur la page modal de connection
	Et je saisis un email valide "email"
	Et je saisis un mot de passe valide "mot de passe"
Alors ma connection est validée


Scénario: Un visiteur essaye de se connecter avec son pseudo
Etant donné que je suis "visiteur"
Quand je me connecte
	Et je saisis un mot de passe valide "mot de passe"
	Et je saisis un pseudo non valide "pseudo"
Alors je ne suis pas connecté
	
Scénario: Un visiteur essaye de se connecter avec son email 
Etant donné que je suis "visiteur"
Quand je me connecte
	Et je saisis un mot de passe valide "mot de passe"
	Et je saisis un email non valide "email"
Alors je ne suis pas connecté
	
Scénario: Un visiteur essaye de se connecter avec mot de passe et pseudo
Etant donné que je suis "visiteur"
Quand je me connecte
	Et je saisis un mot de passe  non valide  "mot de passe"
	Et je saisis un pseudo  valide "pseudo"
Alors je ne suis pas connecté


Scénario: Un visiteur essaye de se connecter avec mot de passe et email
Etant donné que je suis "visiteur"
Quand je me connecte
	Et je saisis un mot de passe  non valide "mot de passe"
	Et je saisis un email  valide "email"
Alors je ne suis pas connecte


Scénario: Un visiteur essaye de se connecter 3 fois
Etant donné que je suis "visiteur"
Quand je me connecte
	Et j’ai déjà saisis mes identifiants non valide 3 fois  "identifiant"
Alors mon compte est bloqué pendant X temps


Scénario: Un Contributeur s'est connecté et renseigne un Bloc
Etant donné que je suis "Contributeur"
Quand j'ajoute un bloc "bloc"
	Et que j’ai rentré un titre "titre"
	Et un format "format"
	Et  un média compatible "media"
Alors le bloc est ajouté



Scénario: Un Contributeur essaye d'ajouter un bloc mal renseigné sans titre
Etant donné que je suis "Contributeur"
Quand j'ajoute un bloc "bloc"
	Et que j’ai oublié de rentrer un titre "titre"
	Et j’ai rentré un format "format"
	Et  j’ai rentré un média compatible "media"
Alors je rentre mon titre "titre"


Scénario: Un Contributeur essaye d'ajouter un bloc mal renseigné sans format
Etant donné que je suis "Contributeur"
Quand j'ajoute un bloc "bloc"
	Et que j’ai rentré un titre "titre"
	Et j’ai oublié de rentré un format "format"
	Et  j’ai rentré un média compatible "média"
Alors je rentre mon format "format"


Scénario: Un Contributeur essaye d'ajouter un bloc mal renseigné sans media
Etant donné que je suis "Contributeur"
Quand j'ajoute un bloc "bloc"
	Et j’ai rentrer un titre "titre"
	Et j’ai rentré un format "format"
	Et j’ai oublié de rentré un média "média"
Alors je dois ajouter un media pour confirmer l’ajout du Bloc

Scénario: Un Contributeur essaye d'ajouter un bloc mal renseigné media
Etant donné que je suis "Contributeur"
Quand j'ajoute un bloc "bloc"
	Et j’ai rentrer un titre "titre"
	Et j’ai rentré un format "format"
	Et j’ai rentré un média incompatible "média"
Alors je dois ajouter un media compatible pour confirmer l’ajout du Bloc


Scénario: Un Contributeur essaye de modifier un bloc mal renseigné media
Etant donné que je suis "Contributeur"
Quand que je  modifie un Bloc "id"
	Et que j’ai rentré un titre "titre"
	Et j’ai rentré un format "format"
	Et j’ai rentré un média incompatible "media""
Alors je dois ajouter un media valide pour confirmer l’ajout du Bloc

Scénario: Un Contributeur essaye de modifier un bloc mal renseigné sans media
Etant donné que je suis "Contributeur"
Quand que je modifie un Bloc "id"
	Et je suis sur la modal «modifier un Bloc»
	Et que j’ai rentré un titre "titre"
	Et j’ai rentré un format "format"
	Et je n’ai pas rentré un média "media"
Alors je dois ajouter un media valide pour confirmer l’ajout du Bloc

Scénario: Un Contributeur essaye de modifier un bloc mal renseigné sans titre
Etant donné que je suis "Contributeur"
Quand je modifie un bloc "id"
	Et je suis sur la modal «modifier un Bloc»
	Et  je n’ai pas rentré un titre "titre"
	Et j’ai rentré un format "format"
	Et  j’ai rentré un média compatible "media"
Alors je dois ajouter un media valide pour confirmer l’ajout du Bloc

Scénario: Un Contributeur essaye de modifier un bloc mal renseigné sans format
Etant donné que je suis "Contributeur"
Quand je modifie un bloc "id"
	Et je suis sur la modal «modifier un Bloc»
	Et je n’ai rentré un titre "titre"
	Et je n’ai pas rentré un format "format"
	Et  j’ai rentré un média compatible "media"
Alors je dois ajouter un media valide pour confirmer l’ajout du Bloc


Scénario: Un Contributeur arrive à modifier un bloc
Etant donné que je suis "Contributeur"
Quand je modifie un artcile "id"
	Et je suis sur la modal «modifier un Bloc»
	Et que j’ai rentrer un titre  "titre"
	Et j’ai rentré un format un format "format"
	Et  j’ai rentré un média compatible "media"
Alors le media est modifié

Scénario: Un Contributeur confirme la modification du bloc
Etant donné que je suis "Contributeur"
Quand je modifie un Bloc "id"
	Et  j’ai bien modifié le Bloc
Alors le Bloc est modifié


Scénario: Un Contributeur essaye de modifier un bloc pendant qu'un autre utilisateur le supprime
Etant donné que je suis "Contributeur"
Quand je modifie un Bloc "id"
	Et j’ai bien modifié le Bloc
	Et ce Bloc a été supprimé entre-temps
Alors le bloc est modifié

Scénario: Un Contributeur essaye de modifier un bloc pendant qu'un autre utilisateur le modifie
Etant donné que je suis "Contributeur"
Quand je modifie un Bloc "id"
	Et j’ai bien modifier le Bloc
	Et ce Bloc a été modifié entre-temps
	Et ce Bloc a été supprimé entre-temps
Alors le bloc est modifié


Scénario: Un Contributeur supprime un Bloc
Etant donné que je suis "Contributeur"
Quand je supprime un Bloc "id"
Alors le bloc est supprimé


