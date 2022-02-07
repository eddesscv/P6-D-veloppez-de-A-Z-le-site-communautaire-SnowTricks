# P6-OC-SnowTricks-Symfony

[![SymfonyInsight](https://insight.symfony.com/projects/479002c1-63aa-4221-a31f-28e30e012056/big.svg)](https://insight.symfony.com/projects/479002c1-63aa-4221-a31f-28e30e012056/analyses/20)

Développez de A à Z le site communautaire SnowTricks

Création d'un site communautaire de partage de figures de snowboard via le framework Symfony.

## Environnement de développement
- Symfony 5.2.2
- Composer 2.2.5
- Bootstrap 5.0.2
- jQuery 3.3.1
- PHPUnit 9.5
- WampServer 3.1.6
    - Apache 2.4.51
    - PHP 7.4.26
    - MySQL 8.0.27


## Installation
Clonez ou téléchargez le repository GitHub dans le dossier voulu :

    https://github.com/eddesscv/P6-OC-SnowTricks-Symfony.git
Configurez vos variables d'environnement tel que la connexion à la base de données ou votre serveur SMTP ou adresse mail dans le fichier .env.local qui devra être crée à la racine du projet en réalisant une copie du fichier .env.

Téléchargez et installez les dépendances back-end du projet avec Composer :

    composer install
Téléchargez et installez les dépendances front-end du projet avec Npm :

    npm install
Créer un build d'assets (grâce à Webpack Encore) avec Npm :

    npm run build
Créer la base de données si elle n'existe pas déjà, taper la commande ci-dessous en vous plaçant dans le répertoire du projet :

    php bin/console doctrine:database:create
Créer une migration SQL à partir des entités présentes :

    php bin/console make:migration
Lancer les scripts de migrations afin de mettre à jour la base :

    php bin/console doctrine:migrations:migrate
Si erreur, lancer la commande :

    php bin/console doctrine:schema:update --force

Félications le projet est installé correctement, vous pouvez désormais commencer à l'utiliser à votre guise !
