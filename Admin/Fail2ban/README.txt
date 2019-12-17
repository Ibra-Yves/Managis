INSTALLATION FAIL2BAN 

1. sudo apt-get install fail2ban
2. éditer le fichier etc/fail2ban/jail.conf 
 - chercher la ligne « bantime ». C’est elle qui définit la durée du bannissement. 
Si un utilisateur essaie de se connecter en SSH et qu’il échoue un trop grand nombre de fois, il sera « emprisonné » pendant 10 minutes.
-  findtime » et « « maxretry ». Findtime, c’est le laps de temps au cours duquel on a le droit de se tromper à plusieurs reprises, et « Maxretry », 
c’est le nombre d’essais autorisés au cours de ce laps de temps.
3. Redémarrer fail2ban ( avec la commande service fail2ban restart ) 
