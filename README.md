# CodeIgniter 4 Marvel Comics App

Esta es una aplicación usando patrón de Arquitectura Modelo-Vista-Controlador, los archivos se encuentran ubicados de la siguiente forma;
## Modelo
* models/HeroeModel.php
## Vistas
* views/plantilla.php
* views/heroe/*.php
## Controlador
*  controllers/HeroesController.php
## Rutas 
* Config/Routes.php
## _Configuración del projecto (archivo .env)._

* public string $baseURL = 'http://localhost/marvel_comics_app/public/';
* CI_ENVIRONMENT = development

## Configuración de la base de datos 
* database.default.hostname = localhost
* database.default.database = heroes_marvel
* database.default.username = root
* database.default.password = 
* database.default.DBDriver = MySQLi
* database.default.port = 3306

