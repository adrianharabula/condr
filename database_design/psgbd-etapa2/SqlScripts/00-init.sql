-- =============================================
-- Authors: Adrian Harabula
-- Create date: Week 10-16 April 2017
-- Context: Preparing database before creating tables
-- =============================================

DROP TABLESPACE aplicatie INCLUDING CONTENTS CASCADE CONSTRAINTS;

CREATE TABLESPACE aplicatie
  DATAFILE 'tbs_perm_0001.dat'
    SIZE 500M
    REUSE
    AUTOEXTEND ON NEXT 50M MAXSIZE 2000M
/

CREATE TEMPORARY TABLESPACE aplicatie
  TEMPFILE 'tbs_temp_0001.dbf'
    SIZE 5M
    AUTOEXTEND ON
/

CREATE UNDO TABLESPACE aplicatie
  DATAFILE 'tbs_undo_0001.dbf'
    SIZE 5M
    AUTOEXTEND ON
  RETENTION GUARANTEE
/


drop user condr cascade;
create user condr identified by condr;
# alter user condr identified by new_password; # change user password
alter user condr default tablespace aplicatie quota 1990M on aplicatie;

grant connect to condr;
grant all privileges to condr;
