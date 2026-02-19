FROM nguyenkhacthanh/apache-php56:latest
LABEL maintainer="Nguyen Khac Thanh <ask@nkthanh.dev>"

COPY conf/000-default.conf /etc/apache2/sites-available/

RUN a2enmod rewrite
COPY www /var/www
COPY VERSION /var/www

CMD ["apachectl", "-D", "FOREGROUND"]

EXPOSE 80/tcp

VOLUME [\
  "/var/www/admin/UploadFiles/" \
]
