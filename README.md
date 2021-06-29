Pour installer
- $ composer install
- Créer une BDD 'pictures' pour stocker les données dans MySQL
- Modifier le fichier .env, notamment la partie DATABASE avec les infos de connexion à la DB 'pictures'
- $ php artisan migrate

La commande 'php artisan serve' permet d'afficher l'application en mode développement (sans avoir besoin de configurer Apache).
