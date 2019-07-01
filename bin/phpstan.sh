#!/usr/bin/env bash

set -e

docker-compose up -d --no-deps php
docker-compose exec php composer install
docker-compose exec php vendor/bin/phpstan analyze
