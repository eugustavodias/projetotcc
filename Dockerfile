FROM php:8.2.9-apache-bullseye

# Atualiza pacotes e instala dependências necessárias
RUN apt-get update && apt-get install -y \
    procps \
    git \
    unzip \
    libicu-dev \
    zlib1g-dev \
    libxml2 \
    libxml2-dev \
    libreadline-dev \
    supervisor \
    cron \
    sudo \
    libzip-dev

# Configuração e instalação das extensões PHP
RUN docker-php-ext-configure pdo_mysql --with-pdo-mysql=mysqlnd \
    && docker-php-ext-configure intl \
    && docker-php-ext-install \ 
        pdo_mysql \
        sockets \
        intl \
        opcache \
        zip

# Instala o Composer de forma segura
RUN curl -sS https://getcomposer.org/installer -o composer-setup.php && \
    php -r "if (hash_file('SHA384', 'composer-setup.php') === 'dac665fdc30fdd8ec78b38b9800061b4150413ff2e3b6f88543c636f7cd84f6db9189d43a81e5503cda447da73c7e5b6') { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;" && \
    php composer-setup.php --install-dir=/usr/local/bin --filename=composer && \
    rm composer-setup.php

# Ajusta o diretório raiz do Apache
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/*.conf && \
    sed -ri -e 's!/var/www/!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/apache2.conf /etc/apache2/conf-available/*.conf

# Habilita módulos úteis do Apache
RUN a2enmod rewrite headers
