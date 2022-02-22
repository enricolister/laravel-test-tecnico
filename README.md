## Test Tecnico Laravel

Ho creato questa web app su un'installazione pulita di Laravel 8.
Questa app, dopo il login dell'utente, genera un token che verrà visualizzato e che si può poi utilizzare, tramite apposito pulsante, per interrogare un'API esposta dall'app stessa.
L'API è ovviamente anche interrogabile direttamente tramite Postman.
Il metodo chiamato dall'API chiama a sua volta la Punk API, un servizio esterno che restituisce un elenco di birre con le relative proprietà.
Se la chiamata va a buon fine, viene visualizzata una tabella paginata delle birre, con alcune proprietà salienti.

## Credenziali di login

Nel database sarà salvato un solo utente con username "root" e password "password".

## API

### Url

api/getBeers/{numeroPagina}

### Header

"Authorization": {token}

## Preparazione dell'app

1. Clonare il repository
2. Creare un file .env locale basato su .env.example
3. Creare un database locale per l'applicazione, di default dovrebbe chiamarsi "laravel_test_tecnico" con accesso username "root" e senza password
4. Eseguire "composer install" nella cartella root del progetto
5. Eseguire le migration con "php artisan migrate" nella cartella del progetto.


## Note finali

Grazie per aver visionato la mia web app, spero vi sia piaciuta.
Enrico Lister
