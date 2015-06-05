#! /bin/sh 

### BEGIN INIT INFO 
# Provides: Nginx-php-fpm(fastcgi) 
# Required-Start: $php-fpm
# Required-Stop: $php-fpm
# Default-Start: 2 3 4 5 
# Default-Stop: 0 1 6 
# Short-Description: Start and stop nginx-fcgi in external FASTCGI mode 
# Description: Start and stop nginx-fcgi in external FASTCGI mode 
### END INIT INFO 

set -e 

PATH=/usr/local/sbin:/usr/local/bin:/sbin:/bin:/usr/sbin:/usr/bin
DESC="nginx daemon"
NAME=nginx
DAEMON=/server/nginx/sbin/$NAME
CONFIGFILE=/server/nginx/conf/nginx.conf
PIDFILE=/server/nginx/logs/$NAME.pid
SCRIPTNAME=/etc/init.d/$NAME

# Gracefully exit if the package has been removed. 
test -x $DAEMON || exit 0

d_start() {
        #/usr/local/sbin/php-fpm start # > /dev/null 2>&1 
        $DAEMON -c $CONFIGFILE || echo -n " already running" 
}

d_stop() {
        #/usr/local/sbin/php-fpm stop # > /dev/null 2>&1 
        kill -QUIT `cat $PIDFILE` || echo -n " not running" 
}

d_reload() {
        #/usr/local/sbin/php-fpm reload # > /dev/null 2>&1 
        $DAEMON -t && $DAEMON -s reload
        #kill -HUP `cat $PIDFILE` || echo -n " can't reload" 
}

case "$1" in
        start)
            echo -n "Starting $DESC: $NAME" 
            d_start
            echo "." 
        ;;
        stop)
            echo -n "Stopping $DESC: $NAME" 
            d_stop
            echo "." 
        ;;
        reload)
            echo -n "Reloading $DESC configuration ..." 
            d_reload
            echo "reloaded." 
        ;;
        restart)
            echo -n "Restarting $DESC: $NAME" 
            d_stop
            sleep 1
            d_start
            echo "." 
        ;;
        *)
            echo "Usage: $SCRIPTNAME {start|stop|restart|reload}" >&2
            exit 3
        ;;
esac

exit 0