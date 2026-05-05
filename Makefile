setup:
	@make copy-env
	@make build
	@make run
	@make composer-setup
	@make database-migrate
	@echo Setup successful, website running on localhost:8080
build:
	docker-compose build --no-cache --force-rm
stop:
	docker-compose stop
run:
	docker-compose up -d
copy-env:
	cp .env.example .env
composer-setup:
	docker exec ci-hospital-app-1 bash -c "composer install"
database-setup:
	docker exec -i ci-hospital-database-1 mysql -u root -e "CREATE DATABASE hospital;"
	docker exec -i ci-hospital-database-1 mysql -u root -e "USE hospital;"
	echo Database hospital created;
database-migrate:
	echo Starting database migration
	docker exec ci-hospital-app-1 bash -c "yes | php spark migrate:refresh"
	echo Finished database migration
	echo Starting database seeding
	docker exec ci-hospital-app-1 bash -c "php spark db:seed DataSeeder"
	echo Finished database seeding