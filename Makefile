test :
	./vendor/squizlabs/php_codesniffer/bin/phpcs --standard=PSR2 app

init :
	cp .env.example .env
	composer install
	php artisan key:generate
	make initdb

serve :
	php artisan serve --port=8080

include .env

initdb :
	# php artisan migrate:refresh --seed
ifeq ($(DB_PASSWORD),)
	echo 'CREATE DATABASE IF NOT EXISTS `${DB_DATABASE}`' | mysql -u${DB_USERNAME} -h${DB_HOST}
else
	echo 'CREATE DATABASE IF NOT EXISTS `${DB_DATABASE}`' | mysql -u${DB_USERNAME} -p'${DB_PASSWORD}' -h${DB_HOST}
endif
	php artisan migrate:reset
	php artisan migrate
	php artisan db:seed
