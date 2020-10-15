#!/bin/bash

# cd the app's root directory
DIR="$( cd "$( dirname "${BASH_SOURCE[0]}" )" >/dev/null 2>&1 && pwd )"
APP_PATH="$(dirname $(dirname $DIR))"
cd $APP_PATH

# generate a development SSL certificate
cd docker/nginx/ssl
openssl genrsa -des3 -passout pass:foobar -out try2imagine.com.pem 2048
openssl req -passin pass:foobar -new -sha256 -key try2imagine.com.pem -subj "/C=US/ST=CA/O=Warthog, Inc./CN=try2imagine.com" -reqexts SAN -config <(cat /etc/ssl/openssl.cnf <(printf "[SAN]\nsubjectAltName=DNS:try2imagine.com,DNS:www.try2imagine.com")) -out try2imagine.com.csr
openssl x509 -passin pass:foobar -req -days 365 -in try2imagine.com.csr -signkey try2imagine.com.pem -out try2imagine.com.crt
openssl rsa -passin pass:foobar -in try2imagine.com.pem -out try2imagine.com.key
