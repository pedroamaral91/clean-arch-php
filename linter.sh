#!/bin/sh

STAGED_FILES_CMD=`git diff --cached --name-only --diff-filter=ACMR HEAD | grep \\\\.php`

# Determine if a file list is passed
if [ "$#" -eq 1 ]
then
	oIFS=$IFS
	IFS='
	'
	SFILES="$1"
	IFS=$oIFS
fi
SFILES=${SFILES:-$STAGED_FILES_CMD}

echo "Checking PHP Lint..."
for FILE in $SFILES
do
	docker run -i --rm -v $(pwd):/project -v $(pwd)/tmp-phpqa:/tmp -w /project jakzal/phpqa:alpine php -l -d display_errors=0 ./$FILE
	if [ $? != 0 ]
	then
		echo "Fix the error before commit."
		exit 1
	fi
	FILES="$FILES ./$FILE"
done

if [ "$FILES" != "" ]
then
	echo "Running Code Sniffer..."
	docker run -i --rm -v $(pwd):/project -v $(pwd)/tmp-phpqa:/tmp -w /project jakzal/phpqa:alpine phpcs --standard=PSR12 --encoding=utf-8 -n -p $FILES
	if [ $? != 0 ]
	then
		echo "Coding standards errors have been detected. Running phpcbf..."
        	docker run -i --rm -v $(pwd):/project -v $(pwd)/tmp-phpqa:/tmp -w /project jakzal/phpqa:alpine phpcbf --standard=PSR12 --encoding=utf-8 -n -p $FILES
		git add $FILES
		echo "Running Code Sniffer again..."
		docker run -i --rm -v $(pwd):/project -v $(pwd)/tmp-phpqa:/tmp -w /project jakzal/phpqa:alpine phpcs --standard=PSR12 --encoding=utf-8 -n -p $FILES
		if [ $? != 0 ]
		then
			echo "Errors found not fixable automatically"
			exit 1
		fi
	fi
fi

exit $?
