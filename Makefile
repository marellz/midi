up: 
	docker-compose up

build:
	docker-compose up --build

# api
api-install:
	cp $(CURDIR)/api/.env.example $(CURDIR)/api/.env
	cp .env.example .env

api-config:
	docker exec -ti midi_api_1 php artisan migrate

migrate: api-config
	docker exec -ti midi_api_1 php artisan migrate

api-key-generate:
	docker exec -ti midi_api_1 php api/artisan key:generate

api-setup: api-install api-key-generate api-config migrate

	
# front
front-install: 
	yarn --cwd $(CURDIR)/front install

setup: api-setup front-install

# other
db-refresh:
	docker exec -ti midi_api_1 php api/artisan migrate:fresh && php api/artisan db:seed

# test: 
# 	 @echo "test"