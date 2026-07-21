# Usamos la imagen oficial de PHP con el servidor web Apache preinstalado
FROM php:8.2-apache

# Copiamos todos tus archivos al directorio público de Apache
COPY . /var/www/html/

# Exponemos el puerto 80 (el puerto por defecto para servidores web)
EXPOSE 80
