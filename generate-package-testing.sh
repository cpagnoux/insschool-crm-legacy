#!/bin/bash
cp -r public public_html
tar zcvf insschool-webapp.tar.gz config src vendor views public_html
rm -r public_html
