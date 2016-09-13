# Description du Projet

Un organisme de l'état vous demande de réaliser un site web dans le cadre d'une campagne pour la mixité. L'idée est de réaliser un site avec une rapide ressemblance à Pinterest. C'est à dire, une application où sont affichées de nombreux médias, facilement affichables et accessibles.

L'objectif de l'application sera d'être modulable et responsive, afin qu'ils puissent l'utiliser sur de nombreuses thématiques. Pas uniquement la mixité. Si votre solution leurs plait, il se pourrait qu'ils utilisent cette application régionalement en "kit à installer" et faciliter le travail de nombreux autres employés.

Cette application de type SPA contiendra un grand dashboard, dans lequel, les utilisateurs connectés pourront rajouter du contenu à leur guise. Les contenus seront représentés sous forme de blocs, et sera facilement reconnaissable grâce à une vignette. Chaque bloc sera modifiable en largeur et longueur afin de pouvoir personnaliser la page du dashboard. 

La pluspart des utilisateurs ne seront pas connectés.

Si un utilisateur connecté ou non connecté clique sur un bloc, celui-ci s'agrandit afin de prendre toute la taille de la page et afficher les médias. 

Attention, si un son ou une vidée est incorporée dans le bloc, le media devra se lancer automatiquement lors de l'ouverture du bloc. Une interface de contrôles du média sera affichée.


Une connection utilisateur sera requise afin q'uniquement les organisateurs des évènements, ou l'équipe mandatée puisse rajouter du contenu.
La partie d'administration doit être très intuitive. Afin d'avoir un meilleur impact sur les jeunes, ils aimeraient que l'application ait un effet "gaming" dans le design.

Ils ne savent pas encore s'ils souhaiteraient que ce site permette la gestion de plusieurs SPA.
Face à cette incertitude, il peut être interessant de prévoir une hiérarchie dans les groupes d'utilisateurs ainsi qu'au compte super user. 

Cette application sera livrée au client avec un compte super utilisateur déjà présent dans la base de données.  Ce dernier sera le seul membre authorisé à créer des utilisateurs. Il sera possible pour chaque utilisateur de leurs assigner des droits.

Un des droits devra également concerner la configuration de la SPA:

 - Au moins 3 thèmes : Fond Noir, Fond Blanc, Fond avec une image de son choix
 - Reglage de l'opacité du fond
 - Format des blocs possibles (en fonction du device)

Au sein d'un bloc, il devra être possible de rajouter :

* Une image (accompagné d'un son - facultatif)
* Une vidéo


Attention, un organisme de l'état ne prend jamais une décision seule et souhaite travailler uniquement avec des professionnels. Il met beaucoup de temps pour valider une documentation. Ainsi soyez force de proposition mais essayez de minimiser le nombre d'échanges avec le client. 

La rigueur sur la documentation sera de mise. 

# Lundi 12 Septembre
## 9h30 : Présentation du projet
Pendant une heure, par groupes de 4 vous devrez travailler que sur le code PHP, la partie back. Vous ne devrez absolument pas vous concentrer sur la partie front:

* comprendre le besoin du client 
* faire un schéma BPML
* modéliser la base de données

## 10h30 : Définition des groupes et début de l'exercice
### Chef de projet : Latyfa

   Ronald
   Floryan
   Solène
   Julien M
   Carole

### Chef de projet : Abdul

   Rebecca
   Valentin
   Jonhattan
   Gael

### Chef de projet : Thomas

   Lise
   Patrice
   Ghaffar
   Stéphane
   Julien V

### Chef de projet : Nabil

   Antoine
   Annie Line
   Juliette
   JP

**Seuls absents normallement**

*  Miguel
*  Aissatou
*  Youness (rejoindra l'équipe d'Abdul)
*  Hassan (rejoindra l'équipe de Nabil)
   
## 11h15 : Modelisation de l'application

## 13h30 :Analyse des résultats
Discussion avec l'ensemble du groupe dans la salle aveugle. 

## 14h00 : Intervention exterieure

## 15h30 : Pause
## 15h45 : Création du BPML
## 16h30 : Mise en commun des scénarios
## 17h : Définition d'un trello "template"
## 17h15 : Repartition des taches par groupes

# Mardi 13 Septembre

**Ordre du jour : Initier le développement de l'application. **

Suite au travail réalisé hier, vous avez presque l'ensemble des scénarios possibles. Voici la prochaine cible : 

* Définition des tests fonctionnels (Given When Then - Creuser du côté du Gerkhin et de Behat ?)
* Finalisation des scénarios
* Définition des classes d'objet

## 9h30 : Répartition des tâches.
Chaque Chef de projet répartit les taches et les rôles pour les membres de son équipe. L'objectif est d'avoir l'ensemble des tests fonctionnels définis d'**ici la fin de la matinée**.

Durant ce laps de temps, le chef de projet aura pour responsabilité de mettre à jour toute la documentation : spécification fonctionnelle de l'application.

Pour ceux ayant un peu de temps de disponible, vous pouvez commencer à visualiser les objets (classes) associé(e)s.

## 11h00 : Pause
## 11h30 : Mise en commun des tests unitaires
## 12h00 : Point dans la salle aveugle 
## 13h30 : Cours pratique sur les classes
## 14h00 : Répartition des taches en mode SCRUM 
Le chef de projet définit les rôles et taches de chaqu'un.  Les taches devront être réalisées en Pomodoro. Il est fortement recommandé de réaliser du Pair Programmming.
Chaque développeur ou paire de développeur doit réaliser des commits propres. Ainsi dès qu'un test ou une nouvelle fonctionnalité est disponible, il se devra de le commit-pusher.

Taches pour le chef de projet : 

* Assigner les taches à chaque développeur
* Réaliser des bilan SCRUM tous les 2 pomodoro
* Réaliser une documentation technique sur l'implémentation réalisée ainsi que sur la logique à implémenter par l'équipe Front End.
* Mettre à jour la documentation fonctionelle pour tout changement 
* Garantir la complétude des tests GWT
* Valider le code livré

Taches pour les développeurs : 

* Faire du code propre, commenté et indenté
* Prévoir les failles et les erreurs 
* Alerter son chef de projet pour tout changement de spécification

##16h45 : Bilan SCRUM
## 17h : Derniers Commits et Bug Fix
## 17h15 : Bilan dans la salle aveugle
Chaque équipe, représenté par son chef de projet, présente le code réalisé. 


