# Bienvenue sur mon Projet Shoes ISLAND


C'est un site e-commerce de vente de Sneakers/Running que j'ai développé via le framework symfony qui se base sur un MVC (modèle/vue/ controller).

## Vue de l'acceuil: 

![Markdown Logo](https://www.zupimages.net/up/23/08/768z.png)





# Dictionnaire de données - Projet Fil Rouge : Shoes Island

> **PK= Primary KEY (clé primaire)**

> **FK = Foreign KEY (clé étrangère)**


![Markdown Logo](https://i.ibb.co/k5jWVcB/Screnn-Shot-Looping-MCD.png)



 ## Table user

| Code        | Libelle         | Type           | Contraint|
| -           | -               | -              | -        |
| id          | id              | INT            |          |
| nom         | Nom             | Varchar(255)   |          |
| prenom      | Prenom          | Varchar(255)   |          |
| email       | email           | Varchar(180)   | unique   |
| roles       | roles           | Varchar(255)   |          |
| password    | password        | Varchar(50)    |          |
| isverified | isVerified       | Booleen        |          |



 ## Table Categorie 

| Code            | Libelle           | Type           | Contraint|
| -----------   | ---------------     | -------------- | -------- |
| Id            | Nom                 |INT             |          |
| CategorieNom  | Categorie Nom       |Varchar(50)     |          |
| CategorieType | Type de Categorie   |Varchar(50)     |          |
| Imagesrc      | Image source        |Varchar(255)    |          |




 ## Table SousCategorie

| Code            | Libelle           | Type           | Contraint|
| -----------   | ---------------     | -------------- | -------- |
| Id            | Nom                 |INT             |          |
| CategorieNom  | Categorie Nom       |Varchar(50)     |          |
| CategorieType | Type de Categorie   |Varchar(50)     |          |
| Imagesrc      | Image source        |Varchar(255)    |          |


 ## Table produit

| Code          | Libelle         | Type           | Contraint|
| -             | -               | -              | -        |
| id            | id              | INT |          |
| nom           | Nom             | Varchar(50)    |          |
| StockPhysique | Stock Physique  | INT            |          |
| Description   | Description     | Varchar(255)   |          |
| Imgsrc        | Imgsrc          | Varchar(255)   |          |
| Actif         | Actif           | Booleen        |          |
| Prix          | Prix            | FLOAT          |          |

 ## Table Commande

| Code           | Libelle          | Type           | Contraint|
| -              | -                | -              | -        |
| id             | id               | INT            |          |
| dateCommande   | Date de commande | Date           |          |
| MoyenReglement | MoyenReglement   | Varchar(255)   |          |
| Paye           | Paye             | Booleen        |          |
| StatutCommande | StatutCommande   | Varchar(255)   |          |


## Table Detail Commande

| Code           | Libelle          | Type           | Contraint|
| -              | -                | -              | -        |
| id             | id               | INT            |          |
| dateCommande   | Date de commande | Date           |          |
| MoyenReglement | MoyenReglement   | Varchar(255)   |          |
| Paye           | Paye             | Booleen        |          |
| StatutCommande | StatutCommande   | Varchar(255)   |          |

## Table Adresse

| Code           | Libelle          | Type           | Contraint|
| -              | -                | -              | -        |
| adresse1       | adresse1         | Varchar(255)   |          |
| adresse2       | adresse2         | Varchar(255)   |          |
| adresse3       | adresse3         | Varchar(255)   |          |
| CodePostal     | CodePostal       | Varchar(255)   |          |
| Ville          | Ville            | Varchar(255)   |          |
| Pays           | Pays             | Varchar(255)   |          |


