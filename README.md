Pour installer
- $ composer install
- Créer une BDD 'pictures' pour stocker les données dans MySQL
- Modifier le fichier .env, notamment la partie DATABASE avec les infos de connexion à la DB 'pictures'
- $ php artisan migrate

Configurer Apache pour pointer vers le répertoire public avec PHP 8 min.
La commande 'php artisan serve' peut aussi être utilisée pour le mode de développement (sans avoir besoin de configurer Apache).
