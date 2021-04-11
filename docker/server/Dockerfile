FROM php:7.3.14-apache
RUN apt-get update && apt-get install -y \
  vim \
  less
RUN ln -sf /usr/share/zoneinfo/Asia/Tokyo /etc/localtime
RUN mkdir -p /root/.vim/colors
RUN docker-php-ext-install mysqli pdo pdo_mysql
COPY ./docker/server/php.ini /usr/local/etc/php/
COPY ./docker/server/dotfiles/vimrc /root/.vimrc
COPY ./docker/server/dotfiles/jellybeans.vim /root/.vim/colors
COPY ./docker/server/dotfiles/bashrc /root/.bashrc
