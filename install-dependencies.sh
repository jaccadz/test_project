# We support all major PHP versions. Please see our documentation for a full list.
# https://documentation.codeship.com/basic/languages-frameworks/php/
#
# By default we use the latest PHP version from the 5.5 release branch, but Laravel
# requires at least version 5.6.4
# phpenv local 7.2
php -v
# Install extensions via PECL
#pecl install -f memcache
# Prepare cache directory and install dependencies
mkdir -p ./bootstrap/cache
composer install --prefer-dist --no-scripts
cp .env.codeship .env
php artisan key:generate
php artisan optimize
mysql -uroot -e 'DROP DATABASE IF EXISTS urls;'
mysql -uroot -e 'CREATE DATABASE IF NOT EXISTS urls;'
mysql -uroot urls < urls.sql
mongorestore --db=talentpool_test --drop --dir=./data/test-data/dump/talentpool
# nvm install 8.11
node -v
npm install
npm run dev
# nohup bash -c "./vendor/laravel/dusk/bin/chromedriver-linux 2>&1 &"
./vendor/laravel/dusk/bin/chromedriver-linux &
# chromedriver --version
# chromedriver &
# Prepare the test database
php artisan migrate
# nohup bash -c "php artisan serve 2>&1 &"
php artisan serve > /dev/null 2>&1 &
sleep 5