#!/bin/bash

git add -A
git commit -a -m $1
git pull
git push

echo "done"
