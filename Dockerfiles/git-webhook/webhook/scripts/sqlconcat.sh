#!/bin/bash
cd Dockerfiles/oracledb/sqlscripts
echo -e "-- This big file contains the following sqlscripts:\r"
echo -n "-- "
ls [0-9][0-9]*.sql | tr '\n' ' '
echo -e '\r\n';

for f in [0-9][0-9]*.sql; do
  echo "-- File: $f"; cat $f; echo
done
