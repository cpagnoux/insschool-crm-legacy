#!/bin/bash
cp -r public gestion
cp .htaccess gestion
zip -r insschool-webapp.zip config src vendor views gestion
rm -r gestion
