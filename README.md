# sellmeout

## Introduction
La société __SellMeOut__, leader du destockage de matériel informatique dans plus de 120 magasins en
France souhaite lancer un nouveau canal de vente afin de conquérir un nouveau marché.

## Besoin
Celle-ci a décider de s’orienter sur un market place, qui permettra à la fois pour l’entreprise de
vendre ses propres produits mis en avant, mais aussi à d’autres entreprise de proposer leur propres
produits à la vente via une commission reversée à SellMeOut.
Dans ce but la plateforme doit être fonctionnelle dans sa version minimum dans un court délai afin
de lancer le marketing sur le produit à la rentrée prochaine.

## Mission
Vous avez obtenu le marché suite à la réponse à l’appel d’offre et devez maintenant proposer une
solution MVP dans les plus brefs délais.
Cette solution devra permettre à minima de :
Utilisateur standard :
- S’inscrire/Se connecter
- Voir les produits en vente et rechercher des produits par leur nom
- Voir le détail d’un produit (nom, description, prix, vendeur, note moyenne du produit, note
moyenne du vendeur)
- Ajouter un ou plusieurs produits au panier
- Valider une commande (sans module de paiement pour le moment)
- Voir le récapitulatif des commandes
- Ajouter une note à un produit commandé (entre 1 et 5 étoiles)
Vendeur :
- S’inscrire/se connecter
- Gérer ses propres produits (ajouter, supprimer => attention un produit supprimé ne doit plus
être en vente, mais doit être conservé pour l’historique des commandes et notes d’un
vendeur)
- Accéder aux commandes qui lui sont passés

## Réutilisation du projet
Le code est librement __modifiable__ sans restriction ni contrainte technique particulière.

## Installation & Lancement
Pour permettre de démarrer le projet en local, vous devez tout d'abord : 
- Installer MAMP [https://www.mamp.info/en/mac/] sur MAC
- Installer WAMP [https://www.wampserver.com/en/] sur Windows

Après l'installation, il vous suffit de lancer MAMP ou WAMP et de taper dans un navigateur __https://localhost:8888/__ (il faut savoir que le port peut changer __sur certaines machines__, veuillez vérifier vos paramètres).

## Configuration de la BDD
Concernant la base de donnée, il faudra bien sur utilisé la base de donnée initialiser pendant le développement de l'application.

Une base de données MySQL avec PHPMYADMIN est nécessaire pour pouvoir utiliser cette application.

Il va falloir aller à l'adresse suivante : __http://localhost:8888/phpMyAdmin5/__.
Après cela, vous devrez vous authentifier (les comptes utilisateurs vous seront communiqués au moment venu).

Pour intégrer la base de données, vous devez initialiser une nouvelle base de données en utilisant l'encodage __utf8_general_ci__. Ensuite, allez dans l'onglet __"Importer"__ et sélectionnez __le fichier SQL__ associé.

Il faut maintenant configurer un fichier config.json à la racine du projet avec les champs suivants :

- __"database"__: le nom de la base de données (nom donné sur phpMyAdmin)
- __"host"__: le nom de l'hôte (souvent __"localhost"__)
- __"user"__: l'utilisateur de la base de données
- __"password"__: le mot de passe de l'utilisateur de la base de données

Une fois cela fait, vous pouvez maintenant utiliser le projet avec tous les prérequis nécessaires pour le faire fonctionner en local.