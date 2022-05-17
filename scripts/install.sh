#!/bin/sh
# chmod u+x YourScript.sh

PATH_BASE="$(dirname "$0")/.."

echo "\nSetting up project ... \n"

echo "\nClearing Cache ... \n"
php artisan clear
php artisan config:clear
php artisan cache:clear
php artisan view:clear
php artisan route:clear

echo "Installing dependencies ..."
composer install --no-interaction
# Uncomment "npm install" if u want
# npm install

# create .env if not exists
if [ -f "$PATH_BASE/.env" ]
then
    echo ".env file already exists"
else
    echo "Creating .env file."
    cp .env.example .env
fi

echo "Done :)"