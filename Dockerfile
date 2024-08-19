# Usar la imagen oficial de PHP
FROM php:7.4-apache

# Instalar extensiones necesarias de PHP
RUN docker-php-ext-install mysqli pdo pdo_mysql

# Copiar el código de la aplicación al contenedor
COPY . /var/www/html/

# Exponer el puerto 80
EXPOSE 9001