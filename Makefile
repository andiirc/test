.PHONY: up down ps logs chmod composer artisan npm yarn phpunit dusk-make dusk pg pg-up pg-down composer-ignore composer-update

MAKEPATH := $(abspath $(lastword $(MAKEFILE_LIST)))
PWD := $(dir $(MAKEPATH))

up:
		docker-compose up -d

down:
		docker-compose down

ps:
		docker-compose ps

ARG=""
logs:
		docker-compose logs $(ARG)

chmod:
		docker run --rm -it \
		-w /usr/share/nginx/html \
		nginx:latest \
		/bin/sh -c "chmod -R 777 *"

ARG=""
composer:
		docker run --rm -it \
		-v $(PWD):/usr/share/nginx/html \
		-w /usr/share/nginx/html \
		composer:latest \
		composer $(ARG)

ARG=""
composer-ignore:
		docker run --rm -it \
		-v $(PWD):/usr/share/nginx/html \
		-w /usr/share/nginx/html \
		composer:latest \
		composer --ignore-platform-reqs --no-scripts $(ARG)

ARG=""
composer-update:
		docker run --rm -it \
		-v $(PWD):/usr/share/nginx/html \
		-w /usr/share/nginx/html \
		composer:latest \
		composer --ignore-platform-reqs --no-scripts update

ARG=""
artisan:
		docker run --rm -it \
		-v $(PWD):/usr/share/nginx/html \
		-w /usr/share/nginx/html \
		jav13r/php:7.0.30-fpm \
		php artisan $(ARG)


ARG=""
yarn:
		docker run --rm -it \
		-v $(PWD):/usr/share/nginx/html \
		-w /usr/share/nginx/html \
		jav13r/nodejs:8.11.1 \
		yarn $(ARG)
