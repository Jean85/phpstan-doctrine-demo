#!/bin/sh

for COUNTER in `seq 1 35`
do
    nc -z mysql 3306;
    if [ $? = 0 ]; then
        exit 0;
    else
        echo "Waiting for MySQL..."
        sleep 1;
    fi
done

echo "MySQL IS NOT UP!"
exit 1;
