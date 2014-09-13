#!/bin/sh

set -e

PHP=$HOME/bin/php
RUN_TESTS=$HOME/php/src/run-tests.php

cd $TRAVIS_BUILD_DIR

TEST_PHP_EXECUTABLE=$PHP \
TEST_PHP_ARGS="-d auto_prepend_file=ereg/ereg.php -q --show-diff  ereg/tests" \
php $RUN_TESTS

