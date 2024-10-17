build:
	docker-compose down
	docker-compose up -d --build
	make install

install:
	docker-compose exec php-fpm composer update
	docker exec node npm update
	docker-compose exec php-fpm composer require laravel/ui
	docker-compose exec php-fpm php artisan migrate
	docker-compose exec php-fpm php artisan db:seed
	docker exec node npm run build	
	