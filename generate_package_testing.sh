#!/bin/bash
cp -r public public_html
zip -r insschool-extranet.zip app vendor public_html
rm -r public_html
