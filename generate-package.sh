#!/bin/bash
cp -r public gestion
cp .htaccess gestion
tar zcvf insschool-webapp.tar.gz config src vendor views gestion
rm -r gestion
