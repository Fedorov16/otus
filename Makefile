up: _up
build: _build
down: _down
in: _in
yarn: _yarn
watch: _watch
prod: _prod
open: _open

_build:
	docker-compose build && docker-compose up -d

_up:
	docker-compose up -d

_down:
	docker-compose down

_in:
	docker exec -it otus_php bash

_yarn:
	cd symfony && yarn install && cd ..

_watch:
	cd symfony && yarn encore dev --watch

_prod:
	cd symfony && yarn encore production

_open:
	open http://127.0.0.1:91/main/all