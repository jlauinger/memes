FROM php:7-apache
MAINTAINER Johannes Lauinger <johannes@lauinger-it.de>

RUN apt-get update && apt-get install -y libmagickwand-dev --no-install-recommends \
  && pecl install imagick \
  && docker-php-ext-enable imagick

RUN apt-get update && apt-get install -y libfreetype6-dev libjpeg62-turbo-dev libpng-dev \
    && docker-php-ext-install -j$(nproc) iconv \
    && docker-php-ext-configure gd --with-freetype-dir=/usr/include/ --with-jpeg-dir=/usr/include/ \
    && docker-php-ext-install -j$(nproc) gd

COPY docker/vhost.conf /etc/apache2/sites-available/000-default.conf

COPY src/ /srv/app
WORKDIR /srv/app

RUN mkdir memes uploads
RUN chmod -R g+w memes uploads
RUN chown -R www-data:www-data .

VOLUME ["/srv/app/memes"]
VOLUME ["/srv/app/uploads"]

ENTRYPOINT chown -R www-data:www-data /srv/app && exec apache2-foreground
