#!/bin/sh

if [ $(git remote -v | grep phpfog | grep push | wc -l) -eq 0 ]; then
	echo '"phpfog" remote repository is not cofigured:'
	echo 'git remote add -f phpfog git@git01.phpfog.com:simple-education-system.phpfogapp.com'
fi

if [ $(git branch -l | grep deploy  | wc -l) -eq 0 ]; then
	echo 'make sure you got a "deploy" branch in git that includes configuration for phpfog live environment'
	exit 1
fi

git checkout deploy
git pull origin master
git push phpfog deploy:master


