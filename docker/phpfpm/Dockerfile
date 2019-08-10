FROM php:7.2-fpm-alpine

ENV PHPIZE_DEPS \
        autoconf \
        dpkg-dev dpkg \
        file \
        g++ \
        gcc \
        libc-dev \
        make \
        pkgconf \
        re2c

RUN set -xe \
    && apk add --no-cache --virtual .build-deps \
        $PHPIZE_DEPS \
        coreutils \
        zlib-dev \
    && version=$(php -r "echo PHP_MAJOR_VERSION.PHP_MINOR_VERSION;")

RUN apk add --no-cache libsodium

RUN apk del .build-deps \
    && rm -rf /tmp/pear ~/.pearrc*

RUN rm -rf /var/www/html \
    && chmod 0777 /tmp/

RUN EXPECTED_SIGNATURE="$(wget -q -O - https://composer.github.io/installer.sig)" \
    && php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');" \
    && ACTUAL_SIGNATURE="$(php -r "echo hash_file('SHA384', 'composer-setup.php');")" \
    && if [ "$EXPECTED_SIGNATURE" != "$ACTUAL_SIGNATURE" ]; then >&2 echo 'ERROR: Invalid installer signature'; rm composer-setup.php; exit 1; fi \
    && php composer-setup.php --install-dir=/bin --filename=composer --quiet \
    && RESULT=$? \
    && rm composer-setup.php