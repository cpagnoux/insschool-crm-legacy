#!/bin/bash

pkgname="insschool-extranet"
pkgver="0.4.1"
configpath="app/config/app.config.php"

if (( ! "$#" )); then
	echo "$0 [APP_CONFIG]"
	exit
fi

config="$1"

mkdir "$pkgname"
cp -rv app public vendor .htaccess composer.json composer.lock "$pkgname"
cp "$config" "$pkgname/$configpath"
zip -r "$pkgname-$pkgver.zip" "$pkgname"
rm -rf "$pkgname"
