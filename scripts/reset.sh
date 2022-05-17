#!/bin/sh
# chmod u+x YourScript.sh

echo "Setting up project ..."

echo "Clearing Cache ..."
php artisan clear
php artisan config:clear
php artisan cache:clear
php artisan view:clear
php artisan route:clear

echo "Dropping/recreating database"
php artisan migrate:fresh

echo "Done :)"