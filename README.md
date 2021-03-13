# CakePHP Application Skeleton

[![Build Status](https://img.shields.io/github/workflow/status/cakephp/app/CakePHP%20App%20CI/master?style=flat-square)](https://github.com/cakephp/app/actions)
[![Total Downloads](https://img.shields.io/packagist/dt/cakephp/app.svg?style=flat-square)](https://packagist.org/packages/cakephp/app)
[![PHPStan](https://img.shields.io/badge/PHPStan-level%207-brightgreen.svg?style=flat-square)](https://github.com/phpstan/phpstan)

Sistema de inventarios realizado con [cakephp/cakephp](https://github.com/cakephp/cakephp).

## Installacion

1. Importar el script SQL llamado `sdi.sql `.

2. Clonar el repositorio.

3. Instalar utilidades con Composer.

```bash
composer install
```
4.  Modificar archivo `config/app_local,php` con la información de conexión con la base de datos.

```bash
...
    'username' => 'root',
    'password' => 'root',

    'database' => 'sdi'
```

## Contacto

musitogarcia@gmail.com