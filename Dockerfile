FROM php:8.2-apache

# 1. Установка ServerName глобально (устраняет AH00558)
RUN echo "ServerName localhost" >> /etc/apache2/apache2.conf

# 2. Установка зависимостей с очисткой кеша
RUN apt-get update && \
    apt-get install -y \
        libicu-dev \
        libzip-dev \
        libonig-dev \
        zip \
        unzip && \
    docker-php-ext-install intl mysqli pdo_mysql zip && \
    a2enmod rewrite && \
    apt-get clean && \
    rm -rf /var/lib/apt/lists/*

# 3. Создание структуры директорий
RUN mkdir -p /var/www/html/public

# 4. Копирование конфигурации Apache с ServerName
COPY docker/apache/healingbowl.conf /etc/apache2/sites-available/healingbowl.conf

# 5. Настройка DocumentRoot
ENV APACHE_DOCUMENT_ROOT=/var/www/html/public
RUN sed -ri -e 's!/var/www/html(/public)?!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/*.conf && \
    sed -ri -e 's!/var/www(/html)?/?!/var/www/html/public!g' /etc/apache2/apache2.conf /etc/apache2/conf-available/*.conf

# 6. Копирование файлов приложения
COPY ./app /var/www/html/

# 7. Настройка прав (оптимизированная версия)
RUN chown -R www-data:www-data /var/www/html && \
    find /var/www/html -type d -exec chmod 755 {} \; && \
    find /var/www/html -type f -exec chmod 644 {} \;

# 8. Дополнительная настройка для production
RUN a2ensite healingbowl.conf && \
    a2dissite healingbowl.conf && \
    a2ensite healingbowl.conf

WORKDIR /var/www/html
EXPOSE 80