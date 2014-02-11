#!/bin/bash

git add -A
git commit -a -m $0
git pull
git push

ssh pi@rpi
cd /var/www/XCH2014/
git pull
logout

echo "done"
