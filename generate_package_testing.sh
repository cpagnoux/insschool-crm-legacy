#!/bin/bash
cp -r public public_html
zip -r insschool-webapp.zip config src vendor views public_html
rm -r public_html
