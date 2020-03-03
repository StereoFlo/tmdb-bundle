#!/usr/bin/env bash

php_tag='7.3.13-cli-buster'

sudo docker run --rm -it \
    --user $(id -u):$(id -g) \
    --volume $PWD:/app \
    -w "/app" \
    php:${php_tag} vendor/bin/robo $@
