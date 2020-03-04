FROM wordpress:5.3-php7.1-apache

## Download plugins from wordpress ##

# COPY ./plugin-urls.txt /usr/src/wordpress
# RUN  apt-get update \
#   && apt-get install -y wget unzip \
#   && rm -rf /var/lib/apt/lists/*
# RUN cd /usr/src/wordpress \
#   && wget -i plugin-slugs.txt -P ./wp-content/plugins \
#   && cd wp-content/plugins \
#   && unzip '*.zip' \
#   && rm *.zip 
    
CMD ["apache2-foreground"]