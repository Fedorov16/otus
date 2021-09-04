up: _up
build: _build
down: _down
in: _in
watch: _watch
fixtures: _fixtures
router: _router

_build:
	docker-compose build && docker-compose up -d && docker exec -it php composer install && yarn install

_fixtures:
	docker exec -it php  php bin/console d:m:m --no-interaction && docker exec -it php php bin/console doctrine:fixtures:load --no-interaction

_up:
	docker-compose up -d

_down:
	docker-compose down

_in:
	docker exec -it php bash

_watch:
	docker exec -it php yarn encore dev --watch

_router:
	docker exec -it php php bin/console debug:router