#!/bin/sh

PHP_BIN=`which php`
WORKING_DIR=`echo $0 | sed 's/import_stock\.sh//g'`

$PHP_BIN $WORKING_DIR/shell/lala.php stock
