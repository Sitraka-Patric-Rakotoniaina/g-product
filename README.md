## installation
Après avoir mis en place le projet dans la machine de test, veuillez executer successivement les insctructions suivantes:
- mettre en place la cofiguration de la base de donée dans le .env ou .env.local
- composer install
- lancer la commande ***symfony console d:d:c*** pour créer la base de donnée
- lancer la commande ***symfony console d:s:u -f*** pour mettre à jour les schémas de la base de donnée
- lancer la commande ***symfony console d:f:l*** pour créer les données de test

## utilisation (test)
pour lancer l'application:
- ***symfony serve***  
L'application sera disponible sur l'addresse ***http://127.0.0.1:8000/***, le port peut être différent selon la disponibilité des ports
L'api graphql sera disponible sur l'addresse ***http://127.0.0.1:8000/graphql***

## accès
les utilisateurs suivants sont disponibles par défaut dans l'applications:
- <u>utilisateur simple:</u> username: ***user***, password: ***test***
- <u>utilisateur administrateur:</u> username: ***admin***, password: ***test***