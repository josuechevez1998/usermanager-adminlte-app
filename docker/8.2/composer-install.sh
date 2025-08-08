#!/usr/bin/env bash

# Script para ejecutar 'composer install' usando un contenedor de Laravel Sail (sin Composer local)

PHP_VERSION="php82" # Puedes cambiar esto por php81, php83, etc. si usas otra versión

sudo docker run --rm \
    -u "$(id -u):$(id -g)" \
    -v "$(pwd)":/var/www/html \
    -w /var/www/html \
    laravelsail/${PHP_VERSION}-composer:latest \
    composer install