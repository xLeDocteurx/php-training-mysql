> Ce repo doit être directement cloné dans votre répertoire apache (/var/www/html ou htdocs ou etc. )
# PHP & MySQL

PHP c'est bien mais avec une base de données c'est mieux. Nous allons voir mettre en situation
une utilisation de PHP et MYSQL.

# Objectif

Nous allons faire une web app qui va lister les randonnées à l'île de la Réunion.

# Création de la base de données
Je vous ai créé la base de données. vous pouvez la récupérer *database/reunion_island.sql* pour l'importer. Comme vous l'avez déjà vu, c'est plus facile de le faire avec Phpmyadmmin.

Cette base de données contient, pour l'instant, que la table *hiking* (randonnée)

# Remplir la base de données

Pour commencer à travailler, c'est plus simple d'avoir déjà des données.

C'est pourquoi vous allez remplir la table *hiking* à partir des données que
vous allez récupérer sur le site internet [randopitons.re](https://www.randopitons.re)

Il faut insérer 5 randonnées. Chaque randonnée devra renseigner les champs :
* name
* difficulty (très facile, facile, etc.)
* distance
* duration
* height_difference (dénivelé)

# Afficher la liste des randonnées

Dans le fichier read.php, récupérez les randonnées directement de la base données et affichez-les dans un tableau.

Vous devez utiliser PHP bien sûr et PDO.

> Rappel : un fichier PHP ne s'ouvre dans le navigateur en faisant un glisser déposer ! Ça ne va pas fonctionner !
Vous devez absolument passer par votre serveur apache local : http://localhost/ ou http://localhost:8000/

TIPS : l'utilisation de la méthode ```query()``` de PDO est un bon début

# Ajouter une randonnée

Vous devez maintenant ajouter une randonnée, mais pas par phpmyadmin, plutôt directement par une page prévu à cet effet.

Ça tombe bien il y a la page *create.php*. Il y'a déjà le formulaire. Vous devez récupérer les informations soumises par ce formulaire et l'enregistrer
dans la base de données.

TIPS : Vous pouvez jetter un oeil aux méthodes ```query``` ou ```prepare()``` et ```execute``` de PDO.

## Améliorations

Quand vous avez réussi à ajouter une randonnée, c'est bien de le notifier par message.

Si vous ne l'avez pas déjà fait, faites apparaître le message "La randonnée a été ajouté avec succès." quand la randonnée a été ajouté avec succès :)

Je vous laisse libre sur la manière à afficher le message.

# Modifier une randonnée

Imaginons qu'on s'est trompé en rentrant les informations de la randonée, il faudrait pouvoir la modifier après.

Le fichier *update.php* est là pour ça.

Dans le tableau des randonnées, ajoutez un lien sur le nom de chaque randonnée. Ce lien renverra vers la page *update.php*.

Sur cette page on va pouvoir faire les modifications pour la randonnée choisie. Les champs présents sur cette page doivent être pré-remplis à partir
des informations de la randonnée choisie !

TIPS : Afin de différencier les randonnées il faudra se baser sur l'id et (re)voir comment faire passer des variables entre des pages.

# Supprimer une randonnée

Nous allons maintenant voir la dernière action, la suppression.

Ajoutez un bouton *supprimer* dans le tableau sur chaque ligne de randonnées. En cliquant sur le bouton cela enverra le l'id de la randonnée à la page *delete.php*.

Lorsque vous aurez supprimer il faudra réafficher de façon automatique la page *read.php*.

TIPS : Pour la redirection vers la page *read.php* vous devrirez probablement jetez un coup d'oeil à la fonction [header()](http://php.net/manual/fr/function.header.php)

# ALLER PLUS LOIN
Par cet exercice nous avons fait du CRUD (Create Read Update Delete). Ce sont les actions qu'on peut effectuer sur une base de données.

## Ajouter un nouveau champ

Les sentiers sont parfois impraticables pour différentes raisons (pluies, éboulement,etc.). Ajoutez le champ *available* à la table *hiking*.

Puis qu'on a nouveau champ il faut l'ajouter à nos différentes pages :
* dans le tableau de *read.php*
* dans les formulaires de *create.php* et *update.php*

## Contrôler les données du formulaires

Il y'a des petits malins qui n'hésiteront à essayer de pirater votre application notamment en passant par le formulaire.

Protéger vos arrières en vérifiant que chaque informations envoyés par le formulaire soient valides avant de la rentrée dans la base de données.

Vérifiez que les champs *distance*, *height_difference* et *duration* soient des chiffres uniquement.

Si vous avez utiliser la méthode ```query()``` de PDO pour récupérer les informations dans la page *update.php* il faudra la remplacer par ```prepare()``` et ```execute()```. Ces méthodes sont plus sécurisés quand il s'agit de travailler avec des variables envoyées par l'internaute.

## Refactoriser le code

Si vous avez mis, dans chaque fichier, la connexion à la base de données sachez qu'il y'a un moyen de factoriser tout ça en utilisant ```include()```. Maintenant que vous le savez, il vous reste plus qu'à le mettre en place :)
