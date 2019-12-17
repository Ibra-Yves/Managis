FROM ubuntu

# Installer tous les paquets nécessaires :

RUN apt-get update \
    && apt-get install -y apt-utils \
    && apt-get install -y nginx \
    && apt-get install -y php-fpm php-mysql \
    && apt-get install -y nano \
	&& apt-get install -y sendmail \
	&& apt-get install -y msmtp msmtp-mta
    
# Placer les configurations des sites
COPY managis.be /etc/nginx/sites-available/

COPY msmtprc /etc/

RUN chmod 600 /etc/msmtprc
# Copier les configurations dans sites-enabled
RUN rm /etc/nginx/sites-enabled/default
RUN ln -s /etc/nginx/sites-available/managis.be /etc/nginx/sites-enabled/

# Modifier la configuration par défaut de PHP7.0 en passant le paramètres cgi.fix_pathinfo  et spécifier l'envoi du mail par le php
RUN sed -i -e 's/;cgi.fix_pathinfo=1/cgi.fix_pathinfo=0/g' /etc/php/7.2/fpm/php.ini
RUN sed -i -e 's/sendmail_path=/sendmail_path= /usr/sbin/sendmail -t -i/g'


#On cree le repertoire pour les certificats HTTPS
RUN mkdir -p /etc/nginx/letsencrypt/

#On copie les certificats HTTPS dans le dossier
#COPY letsencrypt/ /etc/nginx/letsencrypt/

RUN nginx -t

# Exposer les ports
EXPOSE 4433

# Lancer PHP et nginx en mode démon
CMD service php7.2-fpm start && nginx -g "daemon off;"


