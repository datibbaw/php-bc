#!/usr/bin/env sh

set -e

mkdir -p $HOME/php
git clone --depth 1 -b kill-ereg https://github.com/datibbaw/php-src $HOME/php/src

cd $HOME/php/src
./buildconf --force
./configure --prefix=$HOME --disable-all --enable-maintainer-zts
make -j2 --quiet install

