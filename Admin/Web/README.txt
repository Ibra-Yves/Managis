Installation du service web ainsi que le mail: 

ATTENTION! LE SERVICE DOCKER EST REQUISE POUR L'INSTALLATION CORRECTE DU SERVICE WEB

1. Transférer tous les fichiers WEB sur le serveur
2. Aller dans le dossier où se trouve le dockerfile du web
3. Taper la commande suivante: "sudo docker build -t "nom de l'image" .
4. Après ceci, on tape la commande suivante: "sudo docker run --name="nom du conteneur qu'on souhaite" -d -v /home/"nom utilisateur sur le serveur"/"dossier où se trouve le site web":/usr/share/nginx/html:rw "nom de l'image qu'on a spécifié au dessus"
5. On execute le conteneur: sudo docker exec -ti "nom du conteneur spécifié si dessus" 
6. Dans le conteneur, on installe le service sendmail: apt-get install sendmail
7. On installe le service msmtp, lien d'installation: https://doc.ubuntu-fr.org/msmtp
8. Aller dans php.ini qui se trouve dans /etc/php/7.2/fpm et on modifie la ligne "sendmail_path=" en mettant "sendmail_path=/usr/sbin/sendmail -t -i"

Lien vers l'installation: https://github.com/fshatskiy/ProjetAdminSys-R-seaux/wiki/2.1-Installation
Lien vers la configuration: https://github.com/fshatskiy/ProjetAdminSys-R-seaux/tree/master/confNGINX