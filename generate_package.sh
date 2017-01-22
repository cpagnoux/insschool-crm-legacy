#!/bin/bash
cp -r public gestion
cp .htaccess gestion
zip -r insschool-extranet.zip app vendor gestion
rm -r gestion
