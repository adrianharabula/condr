#!/bin/bash

echo "exit" | /u01/app/oracle/product/11.2.0/xe/bin/sqlplus "SYS/oracle" as SYSDBA @/assets/00-init.sql;

for f in /assets/?[^0]*.sql; do
  echo "$0: running $f"; echo "exit" | /u01/app/oracle/product/11.2.0/xe/bin/sqlplus "condr/condr" @"$f"; echo
done
