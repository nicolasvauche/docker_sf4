# Docker & Symfony4  
Installation d'un environnement LAMP avec Docker et Symfony4.  

## Installation  

1. Cloner le dépôt Git :  
`$ git clone https://github.com/nicolasvauche/docker_sf4.git`  

2. Dupliquer le fichier `.env-sample` et le renommer en `.env` :  
`$ cd docker_sf4`  
`$ cp .env-sample .env`  

3. Modifier ce fichier en renseignant vos informations (ports et base de données)

4. Dupliquer le fichier `.bashrc-sample` et le renommer en `.bashrc` :  
`$ cp .bashrc-sample .bashrc`  

5. Monter les conteneurs Docker (MySQL, Adminer, MailDev, PHP 7.4-apache) :  
`$ docker compose up`  

6. Ouvrir un autre onglet de votre terminal, et accéder à la console de votre conteneur principal :  
`$ docker exec -it docker_sf4_www bash`  

7. Dupliquer le fichier `app/.env` et le renommer en `.env.local` :  
`$ cd app`  
`$ cp .env .env.local`  

8. Paramétrer l'accès à votre base de données :  
`DATABASE_URL="mysql://[YOUR_DB_USER]:[YOUR_PASSWORD]@docker_sf4_mysql:3306/[YOUR_DATABASE_NAME]?serverVersion=5.7"`  

9. Installer les dépendances de Symfony avec Composer :  
`composer install`  

## Utilisation  
Dans votre navigateur :  
- http://localhost:[HTTP_PORT] => Votre application  
- http://localhost:[ADMINER_PORT] => Adminer  
- http://localhost:[MAILDEV_PORT] => MailDev  