FROM php:apache

ADD 100-condr.conf /etc/apache2/sites-available/100-condr.conf
RUN a2dissite 000-default.conf && a2enmod proxy proxy_http && a2ensite 100-condr
