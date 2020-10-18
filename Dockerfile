FROM composer:2.0 AS composer
ENV SSP_DIR=/var/simplesamlphp \
    SSP_HASH=363e32b431c62d174e3c3478b294e9aac96257092de726cbae520a4feee201f1 \
    SSP_VERSION=1.18.8
RUN mkdir -p $SSP_DIR && curl -s -L -o /tmp/ssp.tar.gz https://github.com/simplesamlphp/simplesamlphp/releases/download/v$SSP_VERSION/simplesamlphp-$SSP_VERSION.tar.gz \
  &&  echo "$SSP_HASH  /tmp/ssp.tar.gz" | sha256sum -c - && tar xfz /tmp/ssp.tar.gz --strip-components 1 -C $SSP_DIR

# modules
WORKDIR /var/simplesamlphp
RUN composer require --ignore-platform-reqs --no-scripts niif/simplesamlphp-module-aa \
 && composer require --ignore-platform-reqs --no-scripts safire-ac-za/simplesamlphp-module-sqlattribs

FROM php:7.4-apache
COPY --from=composer --chown=www-data:www-data /var/simplesamlphp /var/simplesamlphp

# Add default index page 
ADD index.html /var/www/html/index.html
# config and start
ADD docker-config/confd-0.16.0-linux-amd64 /usr/local/bin/confd
ADD docker-config/confd /etc/confd
ADD docker-config/docker-php-entrypoint /usr/local/bin/docker-php-entrypoint

RUN chmod +x /usr/local/bin/docker-php-entrypoint \
 && chmod +x /usr/local/bin/confd \
 && a2enmod ssl

HEALTHCHECK CMD curl -k -s https://localhost/simplesaml/module.php/aa/metadata.php
