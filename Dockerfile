FROM php:8.3-cli
RUN docker-php-ext-install pdo pdo_mysql
WORKDIR /var/www/html
CMD ["php", "-S", "0.0.0.0:80"]
