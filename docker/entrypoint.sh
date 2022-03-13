#!/usr/bin/env sh

php artisan config:cache

supervisord -c /etc/supervisor/supervisord.conf
nginx -g "daemon on;"
php-fpm