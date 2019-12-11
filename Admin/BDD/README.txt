Installation du service reverse proxy ainsi que le mail: 

ATTENTION! LE SERVICE DOCKER EST REQUISE POUR L'INSTALLATION CORRECTE DU SERVICE WEB
Le fichier de managis.sql contient les tables à créer ainsi que les procèdures

1. Transférer tous les fichiers de BDD sur le serveur
2. Aller dans le dossier où se trouve le dockerfile de la BDD
3. Taper la commande suivante: "sudo docker build -t "nom de l'image" .
4. Après ceci, on tape la commande suivante: "sudo docker run --name="nom du conteneur qu'on souhaite" -d -p 3306:3306 "nom de l'image"

Lien d'installation: https://github.com/fshatskiy/ProjetAdminSys-R-seaux/wiki/3.1-Installation
Lien de la config: https://github.com/fshatskiy/ProjetAdminSys-R-seaux/tree/master/SQL