#!/bin/sh

if [ $(git remote -v | grep phpfog | grep push | wc -l) -eq 0 ]; then
	echo '"phpfog" remote repository is not cofigured:'
	echo 'git remote add -f phpfog git@git01.phpfog.com:simple-education-system.phpfogapp.com'
	exit 1
fi

if [ $(git branch -l | grep deploy  | wc -l) -eq 0 ]; then
	echo 'make sure you got a "deploy" branch in git that includes configuration for phpfog live environment'
	echo 'git branch deploy'
	echo 'git checkout deploy'
	echo 'git pull phpfog master'
	exit 1
fi

echo '$> git checkout deploy && git pull origin master && git push phpfog deploy:master'
git checkout deploy && git pull origin master && git push phpfog deploy:master

echo '$> git checkout master'
git checkout master
