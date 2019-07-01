#!/usr/bin/env bash

set -e

docker-compose up -d
docker-compose exec php composer install
docker-compose exec php bin/wait_for_mysql.sh
docker-compose exec php bin/console doctrine:database:create --no-interaction --if-not-exists
docker-compose exec php bin/console doctrine:schema:drop --no-interaction --force
docker-compose exec php bin/console doctrine:schema:create  --no-interaction
docker-compose exec php bin/console server:run
