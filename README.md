# Linkr
Uczestnicy projektu:  
Dominik Dzięgielewski  
Michał Wrzesień  
Jakub Idziński  
Jakub Bednarz   
Michał Redkwa 

# Zależności
- Composer 2 lub nowszy
- MySQL 8 lub nowszy
- Symfony CLI

## Działanie
Pamietaj aby w '.env' zmienić użytkownika oraz hasło.  
Użyj komend:  
```
# composer install
# php bin/console doctrine:database:create
# php bin/console make:migration
# php bin/console doctrine:migrations:migrate
# symfony server:start
```
