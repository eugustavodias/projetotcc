FROM php:8.2.9-apache-bullseye

# Instalar dependências necessárias
RUN apt-get update && apt-get install -y \
      git unzip libicu-dev zlib1g-dev libxml2-dev libreadline-dev libzip-dev \
    && docker-php-ext-configure pdo_mysql --with-pdo-mysql=mysqlnd \
    && docker-php-ext-configure intl \
    && docker-php-ext-install pdo_mysql sockets intl opcache zip \
    && a2enmod rewrite headers \
    && rm -rf /var/lib/apt/lists/*

# Instalar Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Ajustar DocumentRoot para Laravel
ENV APACHE_DOCUMENT_ROOT /var/www/html/public
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/*.conf \
    && sed -ri -e 's!/var/www/!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/apache2.conf /etc/apache2/conf-available/*.conf

# Copiar código do Laravel
WORKDIR /var/www/html
COPY . .

# Instalar dependências do Laravel sem dev
RUN composer install --no-dev --optimize-autoloader

# Expor porta padrão Railway
EXPOSE 8080

# Comando padrão
CMD ["apache2-foreground"]
