# SYMFONY

## NOUVEAU PROJET

- ouvrir un nouveau terminal
- se rendre dans le dossier où l'in veut créer le projet (ex.: MAMP) :
```
cd chemin_vers_le_dossier_MAMP
```
- créer le projet avec composer (pas besoin de créer le dossier du projet) :
```
composer create-project symfony/website-skeleton nom_du_projet ^5.4 (ou ^5.4.* sur Windows)
```

## GIT

- créer un dépôt Git sur GitHub
- avec un terminal, se rendre dans le dossier du projet (cd ... ou VSC)
- initialiser un dépôt local :
```
git init
```
- lier le dépôt distant au dépôt local :
```
git remote add origin lien_du_dépôt_GitHub
```
- ajouter tous les fichiers :
```
git add *
```
- donner un nom au commit :
```
git commit -m "message_du_commit"
```
- récupérer les dernières modifications :
```
git pull origin main
```
- envoyer les modifications :
```
git push origin main
```
- voir la liste des commit (flèches haut et bas pour navoguer dans la liste, q pour quitter) :
```
git log
```

## RÉCUPÉRER UN PROJET

- télécharger le zip ou faire un pull
- recréer le fichier .env à la racine du projet (avec ses propres informations)
- les infos importantes sont APP_ENV et DATABASE_URL (éventuellement MAILER_URL)
- mettre à jour le projet (l'installer) :
```
composer install (ou composer update)
```
- créer la base de données (si pas déjà fait) :
```
php bin/console doctrine:database:create
```
- créer les tables :
```
php bin/console doctrine:migrations:migrate
```

## APACHE-PACK

- package pour le support d'Apache
- barre de débug / routing / .htaccess
- dans le terminal :
```
composer require symfony/apache-pack
```

## CONTROLLER

```
php bin/console make:controller nom_du_controller
```

## BASE DE DONNÉES

- .env :
```
DATABASE_URL="mysql://db_user:db_password@127.0.0.1:3306/db_name?serverVersion=5.7"
```
- créer la base de données :
```
php bin/console doctrine:database:create
```
- créer (ou modifier) une entité (table) :
```
php bin/console make:entity nom_de_l_entité
```
- migration :
```
php bin/console make:migration
```
```
php bin/console doctrine:migrations:migrate
```
## COMMANDES IMPORTANTS

- vider le cache :
```
php bin/console cache:clear
```

-afficher sa version de Symfony :

php bin/console --version



#   s y m f o n y  
 