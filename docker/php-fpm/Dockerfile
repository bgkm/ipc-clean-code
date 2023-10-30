FROM php:8.2.11-fpm
WORKDIR "/app"

# Update
RUN apt-get update

# Install ZIP and gpg (for Phive)
RUN apt-get install -y libzip-dev zip gpg

# Install PHP extensions
RUN docker-php-ext-install zip pdo pdo_mysql mysqli

# Install Redis
#RUN pecl install -o -f redis && docker-php-ext-enable redis

# Install Composer
# just copy executable from the official image
COPY --from=composer:2 /usr/bin/composer /usr/local/bin/composer
# Manual method:
#RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Install Phive
# just copy executable from the official image, see https://github.com/phar-io/phive/issues/152
COPY --from=phario/phive:0.15.2 /usr/local/bin/phive /usr/local/bin/phive
# Manual method (needs wget!):
#RUN wget -O phive.phar "https://phar.io/releases/phive.phar" && \
#    wget -O phive.phar.asc "https://phar.io/releases/phive.phar.asc" && \
#    gpg --keyserver hkps://keys.openpgp.org --recv-keys 0x6AF725270AB81E04D79442549D8A98B29B2D5D79 && \
#    gpg --verify phive.phar.asc phive.phar && \
#    rm phive.phar.asc && \
#    chmod +x phive.phar && \
#    mv phive.phar /usr/local/bin/phive && \
#    mkdir "/home/$APPLICATION_USER/.phive" \

# Install xdebug
RUN pecl install xdebug && docker-php-ext-enable xdebug
#RUN pecl install xdebug-3.3.0alpha2 && docker-php-ext-enable xdebug
#RUN apt-get install php8.2-xdebug && docker-php-ext-enable xdebug

# Cleanup
RUN apt-get clean
RUN rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/* /usr/share/doc/*
