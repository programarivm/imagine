#!/bin/bash

# cd the app's root directory
DIR="$( cd "$( dirname "${BASH_SOURCE[0]}" )" >/dev/null 2>&1 && pwd )"
APP_PATH="$(dirname $(dirname $DIR))"
cd $APP_PATH

# generate a development SSL certificate
cd docker/nginx/ssl
openssl genrsa -des3 -passout pass:foobar -out try2imagine.local.pem 2048
openssl req -passin pass:foobar -new -sha256 -key try2imagine.local.pem -subj "/C=US/ST=CA/O=Warthog, Inc./CN=try2imagine.local" -reqexts SAN -config <(cat /etc/ssl/openssl.cnf <(printf "[SAN]\nsubjectAltName=DNS:try2imagine.local,DNS:www.try2imagine.local")) -out try2imagine.local.csr
openssl x509 -passin pass:foobar -req -days 365 -in try2imagine.local.csr -signkey try2imagine.local.pem -out try2imagine.local.crt
openssl rsa -passin pass:foobar -in try2imagine.local.pem -out try2imagine.local.key
