#! /bin/sh

USER=` grep www /etc/passwd |wc -l`
GROUP=` grep www /etc/group |wc -l`

if [ $GROUP -ne 0 ] 
then
	echo "group exsits"
else
	groupadd www 
fi

if [ $USER -ne 0 ] 
then
	echo "user exsits"
else
	useradd www -M -g www 
fi
##################################################################
#yum -y install \
#libxml2-dev \
#libcurl4-gnutls-dev \
#libjpeg-dev \
#libpng12-dev \
#libfreetype6-dev \
#libmcrypt-dev \
#bpcre3-dev libssl-dev libmhash-dev libmhash2 libpq-dev libpq5 libsyck0-dev \
#libtidy-dev curl libcurl4-openssl-dev libcurl3 \
#libcurl3-gnutls zlib1g zlib1g-dev libxslt1-dev libzip-dev libzip1 \
#libxml2 libsnmp-base libsnmp15 libsnmp-dev libxml2-dev libjpeg62 \
#libjpeg62-dev libpng12-0 libpng12-dev zlib1g zlib1g-dev libfreetype6 \
#libfreetype6-dev libbz2-dev libxpm-dev libmcrypt-dev libmcrypt4 \
#sqlite3 bzip2 build-essential libreadline5-dev libedit-dev autoconf 
###################################################################

/server/php-5.3.23/configure --prefix=/server/php5 --with-config-file-path=/server/php5/etc --with-curl --with-pear --with-gd --with-jpeg-dir --with-png-dir --with-zlib --with-xpm-dir --with-freetype-dir --with-t1lib --with-mcrypt --with-mhash --with-mysql --with-mysqli --enable-pdo --with-pdo-mysql --with-openssl --with-xmlrpc --with-xsl --with-gettext --with-fpm-user=www --with-fpm-group=www --enable-fpm --enable-exif --enable-wddx --enable-zip --enable-bcmath -with-bz2 --enable-calendar --enable-ftp --enable-mbstring --enable-soap --enable-sockets --enable-shmop --enable-dba --enable-sysvmsg --enable-sysvsem --enable-sysvshm --enable-debug --enable-maintainer-zts --enable-embed 

##################################################################

make
make install

##################################################################

ln -s /server/php5/bin/pear /usr/bin/pear
ln -s /server/php5/bin/peardev /usr/bin/peardev
ln -s /server/php5/bin/pecl /usr/bin/pecl
ln -s /server/php5/bin/phar.phar /usr/bin/phar
ln -s /server/php5/bin/php /usr/bin/php
ln -s /server/php5/bin/phpize /usr/bin/phpize

ln -s /server/php5/sbin/php-fpm /usr/sbin/php-fpm
cp /server/php-5.3.23/php.ini-production /server/php5/etc/php.ini
