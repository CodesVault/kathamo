composer-dep:
	composer install

node-dep:
	npm install

npm-build:
	npm run diploy-build

wpcs:
	vendor/bin/phpcs --config-set installed_paths vendor/wp-coding-standards/wpcs

phpcs-rules:
	vendor/bin/phpcs -i

setup:
	node-dep composer-dep npm-build wpcs phpcs-rules
