.PHONY: install run migrate rollback fresh test

install:
	@echo "Installing dependencies..."
	composer install
	npm install
	php artisan key:generate

run:
	@echo "Running migrations..."
	@echo "Starting the server on port 8000..."
	php artisan serve

migrate:
	@echo "Running migrations..."
	php artisan migrate

rollback:
	@echo "Rolling back last migrations..."
	php artisan migrate:rollback

fresh:
	@echo "Dropping all tables and running migrations..."
	php artisan migrate:fresh
	@echo "Seeding the database..."
	php artisan db:seed --class=AdminSeeder



test:
	@echo "Running tests..."
	php artisan test
