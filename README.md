# P6-OC-SnowTricks-Symfony
Développez de A à Z le site communautaire SnowTricks



Création d'un site communautaire de partage de figures de snowboard via le framework Symfony.


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
Créez la base de données si elle n'existe pas déjà, taper la commande ci-dessous en vous plaçant dans le répertoire du projet :

    php bin/console doctrine:database:create
Créez les différentes tables de la base de données en appliquant les migrations :

    php bin/console doctrine:migrations:migrate
(Optionnel) Installer les fixtures pour avoir une démo de données fictives :

    php bin/console doctrine:fixtures:load
Félications le projet est installé correctement, vous pouvez désormais commencer à l'utiliser à votre guise !
