# Symfony

## NOUVEAU PROJET

- ouvrir un nouveau terminal
- se rendre dans le dossier ou on veux crrer le projet (ex : MAMP)
`
cd chemin_vers_le_dossier_MAMP
`
- creer le projet avec composer (pas besoin de creer le dossier du projet):
`
composer projet create-project symfony/wesbite-skeleton nom_du_projet ^5.4.* ( sur windows)
`

## GIT

- creer un depot GIT sur GITHUB
-avec un terminal, se rendre dans le dossier du projet ( cd... VSC)
-initialiser  un depot local :
`
git init
`
-lier le depot distant au depot local
`
git remote add origin lien_du_depot_GitHub
`
-ajouter tous les fichier :
`
git add *
`
- donner un nom au commit :
`
git commit -m "message_du_commit"
`
- recuperer les dernieres modifications:
`
git pull origin main
`
- envoyer les modifications:
`
git push origin main //(git config --global init.defaultBranch main)

`
- voir la liste de commit (fleches hauts et bas pour naviguer dans la liste , q pour quitter ):
```
git log
```
## reccuperer un projet
-télcharger le zip ou faire un pull
-recrerer le fichier.env a la racine du project avec ses propres informarions
-les infos importantes sont AP_ENV et DATABASE_URL
-Mettre a jour le project

## APACHE-PACK
-package pour le support d'apache
-barre de debug / rooting/ .htaccess
-dans le terminal:
```
composer require symfony/apache-pack
```

## CONTROLLER
```
php bin/console make:controller nom_du_controllerex(Home)
```