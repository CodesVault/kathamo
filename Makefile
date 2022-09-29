composer-dep:
	composer install

node-dep:
	npm install

npm-build:
	npm run diploy-build

phpcs-rules:
	vendor/bin/phpcs -i

setup:
	node-dep composer-dep npm-build
