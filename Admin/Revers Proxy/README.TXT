Installation du service reverse proxy ainsi que le mail: 

ATTENTION! LE SERVICE DOCKER EST REQUISE POUR L'INSTALLATION CORRECTE DU SERVICE WEB

1. Transférer tous les fichiers reverse proxy sur le serveur
2. Aller dans le dossier où se trouve le dockerfile du reverse proxy
3. Taper la commande suivante: "sudo docker build -t "nom de l'image" .
4. Après ceci, on tape la commande suivante: "sudo docker run --name="nom du conteneur qu'on souhaite" -d -v /home/"nom utilisateur sur le serveur"/"dossier où se trouve le site web":/usr/share/nginx/html:rw "nom de l'image qu'on a spécifié au dessus"
5. On execute le conteneur: sudo docker exec -ti "nom du conteneur spécifié si dessus" 

Lien vers l'installation: https://github.com/fshatskiy/ProjetAdminSys-R-seaux/wiki/2.1-Installation
Lien vers les fichiers de configuration: https://github.com/fshatskiy/ProjetAdminSys-R-seaux/tree/master/reverse_proxy
