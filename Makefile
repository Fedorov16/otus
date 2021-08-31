up: _up
build: _build
down: _down
in: _in
yarn: _yarn
watch: _watch
prod: _prod
open: _open
fixtures: _fixtures
router: _router

_build:
	docker-compose build && docker-compose up -d && docker exec -it otus composer install && yarn install

_fixtures:
	docker exec -it otus  php bin/console d:m:m --no-interaction && docker exec -it otus php bin/console doctrine:fixtures:load --no-interaction

_up:
	docker-compose up -d

_down:
	docker-compose down

_in:
	docker exec -it otus bash

_watch:
	docker exec -it otus yarn encore dev --watch

_router:
	docker exec -it otus php bin/console debug:router --no-