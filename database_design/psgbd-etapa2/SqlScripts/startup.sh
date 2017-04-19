#!/bin/bash

echo "exit" | /u01/app/oracle/product/11.2.0/xe/bin/sqlplus SYS/oracle AS SYSDBA @/assets/00-init.sql
echo "exit" | /u01/app/oracle/product/11.2.0/xe/bin/sqlplus condr/condr@xe @/assets/01-createTables.sql;
echo "exit" | /u01/app/oracle/product/11.2.0/xe/bin/sqlplus condr/condr@xe @/assets/02-helperTables.sql;
echo "exit" | /u01/app/oracle/product/11.2.0/xe/bin/sqlplus condr/condr@xe @/assets/03-generateRandomUsers.sql;
echo "exit" | /u01/app/oracle/product/11.2.0/xe/bin/sqlplus condr/condr@xe @/assets/03b-generateRandomProducts.sql;
echo "exit" | /u01/app/oracle/product/11.2.0/xe/bin/sqlplus condr/condr@xe @/assets/04-plsqlFunctiiProceduri.sql;
echo "exit" | /u01/app/oracle/product/11.2.0/xe/bin/sqlplus condr/condr@xe @/assets/05-userManagerPackage.sql;
echo "exit" | /u01/app/oracle/product/11.2.0/xe/bin/sqlplus condr/condr@xe @/assets/06-clean.sql;
