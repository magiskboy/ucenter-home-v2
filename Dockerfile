FROM nguyenkhacthanh/apache-php56:latest
LABEL maintainer="Nguyen Khac Thanh <ask@nkthanh.dev>"

COPY conf/000-default.conf /etc/apache2/sites-available/

RUN a2enmod rewrite
COPY www /var/www
COPY VERSION /var/www

RUN chmod -R 777 \
  /var/www/install/ \
  /var/www/home/config.php \
  /var/www/ucenter/data/ \
  /var/www/home/attachment/ \
  /var/www/home/data/ \
  /var/www/home/uc_client/data/ \
  /var/www/bbs/attachments \
  /var/www/bbs/templates/ \
  /var/www/bbs/forumdata/ \
  /var/www/bbs/uc_client/data/ \
  /var/www/bbs/config.inc.php

CMD ["apachectl", "-D", "FOREGROUND"]

EXPOSE 80/tcp

VOLUME [\
  "/var/www/admin/UploadFiles/" \
  ]
