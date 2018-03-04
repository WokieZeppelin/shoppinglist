<p align="center"><img src="https://laravel.com/assets/img/components/logo-laravel.svg"></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/d/total.svg" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/v/stable.svg" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/license.svg" alt="License"></a>
</p>

# Wymagania

Do uruchomienia aplikacji są wymagane następujące rzeczy:

- PHP 7.2.2
- Composer 1.6.3
- Serwer MySQL (w celu utworzenia bazy danych)

# Instrukcja dla Windows 10

### 1. Pobierz [najnowszą wersję PHP(non-thread safe version)](http://windows.php.net/).
  - Wypakuj zawartość do katalogu **C:\PHP7**.
  
  - Zmień rozszerzenie php.ini-development na **php.ini** i otwórz w edytorze tekstu.
  
  - Wyszukaj *;extension_dir= "ext"* i usuń znak **";"**, aby odkomentować.
  
  - Wyszukaj *;extension=mbstrin* oraz *;extension=pdo_mysql* i usuń znak **";"**.
  
  - Dodaj ścieżkę C:\PHP7 do zmiennych środowiskowych.
  
  - **_Sprawdź_** w wierszu poleceń, czy polecenie ```php -v``` działa prawidłowo. Taki wynik powinno zwrócić:
  ```
  PHP 7.2.2 (cli) (built: Jan 31 2018 19:31:15) ( NTS MSVC15 (Visual C++ 2017) x64 )
  Copyright (c) 1997-2018 The PHP Group
  Zend Engine v3.2.0, Copyright (c) 1998-2018 Zend Technologies
  ```
  
### 2. Przejdź w wierszu poleceń do katalogu **C:\PHP7** - **_Instalacja Composera_**
  - Wprowadź następujące polecenia
  ```
  php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
  php composer-setup.php
  php -r "unlink('composer-setup.php');"
  ```
  - Używając poniższego polecenia, stwórz nowy plik **composer.bat** obok pliku *composer.phar*, tak aby Windows 10 mógł bez problemu go uruchomić
  ```
  echo @php "%~dp0composer.phar" %*>composer.bat
  ```

  - **_Sprawdź_** w wierszu poleceń, czy polecenie ```composer -V``` działa prawidłowo. Taki wynik powinno zwrócić:
  
  ```
  Composer version 1.6.3 2018-01-31 16:28:17
  ```
### 3. Instalacja oraz konfiguracja bazy danych
  - Pobierz i zainstaluj [najnowszą wersje MySQL Workbench](https://dev.mysql.com/downloads/workbench/)
  - Skonfiguruj połączenie z serwerem MySQL, aby działało na **_localhost_(http://127.0.0.1)** na porcie **_3306_**
  - Stwórz nową bazę danych o nazwie np. **produkty**.
### 4. Pobieranie i konfigurowanie aplikacji
  - W wierszu poleceń wpisz ```git clone https://github.com/WokieZeppelin/shoppinglist.git```
  - Przejdź w wierszu poleceń do katalogu shoppinglist i wpisz ```composer install```
  - Wprowadź polecenia: 
  ```
  copy .env.example .env
  php artisan key:generate
  ```
  - Otwórz plik .env w edytorze tekstu np. **ATOM** lub **Sublime Text 3**, uzupełnij następujące pola i zapisz.
  ```
  DB_DATABASE= nazwa wcześniej utworzonej bazy danych, np. baza.
  DB_USERNAME= nazwa użytkownika, by móc się zalogować do bazy, np. root.
  DB_PASSWORD= hasło użytkownika.
  ```
  - Po skonfigurowaniu pliku .env wpisz w wierszu poleceń ```php artisan migrate``` oraz ```php artisan db:seed```. Pierwsze polecenie utworzy tabelę odpowiedzialna za przechowywanie produktów. Zaś drugie służy do dodania już gotowych produktów, które przygotowałem.
### 5. Uruchomienie aplikacji
  - Aby uruchomić aplikację, wpisz w wierszu poleceń ```php artisan serve```.
  - Skopiuj adres **http://127.0.0.1:8000/** do przeglądarki i otwórz.
  - **GOTOWE :)**