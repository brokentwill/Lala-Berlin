#!/bin/sh

PHP_BIN=`which php`
WORKING_DIR=`echo $0 | sed 's/import\.sh//g'`

$PHP_BIN $WORKING_DIR/shell/lala.php import
$PHP_BIN $WORKING_DIR/magmi/cli/magmi.cli.php -profile=default -mode=xcreate -CSV:filename="/var/www/www.lalaberlin.com/var/import/import.csv"