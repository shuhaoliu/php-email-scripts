FROM php:5.6-apache

LABEL maintainer="Shuhao Liu <shuhao@ece.toronto.edu>" \
      version="1.0"

# Install extensions
## Core Extensions
RUN apt-get update && apt-get install -y \
        sendmail \
    && rm -rf /var/lib/apt/lists/*

COPY php.ini /usr/local/etc/php/
COPY . /email

WORKDIR /email
CMD ["/email/runWithMail.sh"]

