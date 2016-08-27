#! /bin/sh

USER=` grep nginx /etc/passwd |wc -l`
GROUP=` grep nginx /etc/group |wc -l`

if [ $GROUP -ne 0 ] 
then
	echo "group exsits"
else
	groupadd nginx
fi

if [ $USER -ne 0 ] 
then
	echo "user exsits"
else
	useradd nginx -M -g nginx
fi
##################################################################

/server/nginx-1.2.8/configure --prefix=/server/nginx \
--group=nginx \
--user=nginx \
--with-ipv6 \
--with-http_ssl_module \
--with-http_ssl_module \
--with-http_sub_module \
--with-http_stub_status_module \
--with-http_gzip_static_module \
2>/dev/null

##################################################################

make && make install

##################################################################

ln -s /server/nginx/sbin/nginx  /usr/bin/nginx 

# 为了使用https 加入pem和key文件
if [ -f /server/cert.pem ]
then
	cp /server/cert.pem /server/nginx/conf/
fi

if [ -f /server/cert.key ]
then
	cp /server/cert.key /server/nginx/conf/
fi

#################################################################

