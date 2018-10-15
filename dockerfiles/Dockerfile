FROM drupal:8.6-apache

# Install composer
RUN curl -sS https://getcomposer.org/installer | php && \
    mv composer.phar /usr/local/bin/composer

# Install drush
RUN composer global require drush/drush && \
    ln -s /root/.composer/vendor/bin/drush /usr/bin/drush

COPY docker/sites/ /var/www/html/sites/
COPY docker/modules/ /var/www/html/modules/
COPY docker/themes/ /var/www/html/themes/


RUN usermod -u 1000 www-data
RUN usermod -a -G users www-data

RUN mkdir -p /var/www/html
RUN chown -R www-data:www-data /var/www

WORKDIR /var/www/html

# Expose Ports
EXPOSE 80
EXPOSE 3306
