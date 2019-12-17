server{
    listen 4433 ssl http2; # managed by Certbot
    server_name  managis.be www.managis.be;
    #ssl_certificate /etc/letsencrypt/live/managis.be/fullchain.pem;                                                                                      
    #ssl_certificate_key /etc/letsencrypt/live/managis.be/privkey.pem;                                                                                         


        root /usr/share/nginx/html/;
        index index.php index.php index.htm;

        location / {
                try_files $uri $uri/ =404;
        }
        location ~ \.php$ {
                include fastcgi_params;
                fastcgi_param SCRIPT_FILENAME $document_root/$fastcgi_script_name;
                fastcgi_pass unix:/run/php/php7.2-fpm.sock;
        }

}
