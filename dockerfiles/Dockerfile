FROM drupal:8.6-apache
COPY etc/apache-virtualhost.conf /etc/apache2/sites-available/000-default.conf
COPY dockerapp/sites/ /var/www/html/sites/
COPY dockerapp/modules/ /var/www/html/modules/
COPY dockerapp/themes/ /var/www/html/themes/
COPY bin/composer /usr/local/bin/
COPY bin/drupal /usr/local/bin/
COPY bin/drush /usr/local/bin/
# Install Apache and other necessary software
RUN apt-get update && apt-get install -y \
    apache2 \
	mysql-server \
	mysql-client \
	git \
	curl \
	
# Install php7 packages
RUN apt-get update && apt-get install -y \
    php7.0-fpm \
    php7.0-cli \
    php7.0-common \
    php7.0-curl \
    php7.0-json \
    php7.0-gd \
    php7.0-mcrypt \
    php7.0-mbstring \
    php7.0-odbc \
    php7.0-pgsql \
    php7.0-mysql \
    php7.0-sqlite3 \
    php7.0-xmlrpc \
    php7.0-opcache \
    php7.0-intl \
    php7.0-xml \
    php7.0-zip \
    php7.0-bz2

# Install composer
RUN curl -sS https://getcomposer.org/installer | php && \
    mv composer.phar /usr/local/bin/composer

# Install drush
RUN composer global require drush/drush && \
    ln -s /root/.composer/vendor/bin/drush /usr/bin/drush

RUN usermod -u 1000 www-data
RUN usermod -a -G users www-data

RUN mkdir -p /var/www/html
RUN chown -R www-data:www-data /var/www

WORKDIR /var/www/html

# Expose Ports
EXPOSE 80
EXPOSE 3306
