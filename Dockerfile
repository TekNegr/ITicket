# Utiliser une image de base officielle PHP avec FPM
FROM php:8.2-fpm

# Installer les extensions PHP nécessaires
RUN apt-get update && apt-get install -y \
    libzip-dev unzip libicu-dev libpq-dev && \
    docker-php-ext-configure intl && \
    docker-php-ext-install pdo pdo_pgsql pdo_mysql zip intl

# Installer Node.js (version 18 LTS) et npm
RUN apt-get install -y curl && \
    curl -fsSL https://deb.nodesource.com/setup_18.x | bash - && \
    apt-get install -y nodejs

# Copier les fichiers de l'application
WORKDIR /var/www/html
COPY . .

# Installer Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer
RUN composer install --no-dev --optimize-autoloader

# Installer les dépendances npm pour Vite
RUN if [ -f package.json ]; then npm install; fi

# Compiler les assets avec Vite
RUN if [ -f package.json ]; then npm run build; fi

# Configurer les permissions nécessaires
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache && \
    chmod -R 775 /var/www/html/storage /var/www/html/bootstrap/cache

# Exposer le port utilisé par PHP-FPM
EXPOSE 9000

# Commande pour démarrer PHP-FPM
CMD ["php-fpm"]


# ah ah ah , le S