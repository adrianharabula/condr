-- =============================================
-- Authors: Buza Mădălina-Gabriela, Anghelina Elena
-- Updated on Week 10-16 April 2017
-- Context: Populating database with random relevant entries
-- =============================================

DECLARE
v_user_id  NUMBER(10) := 1 ;
v_username_user VARCHAR(30) ;
v_password_user VARCHAR(30) ;
v_email VARCHAR(40);

CURSOR cursor_nume IS SELECT nume FROM persoane;
   TYPE nume_user IS TABLE OF cursor_nume%ROWTYPE;
   lista_nume nume_user;
CURSOR cursor_prenume IS SELECT prenume FROM persoane;
   TYPE prenume_user IS TABLE OF cursor_prenume%ROWTYPE;
   lista_prenume prenume_user;
BEGIN
   open cursor_nume;
   SELECT nume BULK COLLECT INTO lista_nume FROM persoane;
   close cursor_nume;
   open cursor_prenume;
   SELECT prenume BULK COLLECT INTO lista_prenume FROM persoane;
   close cursor_prenume;

    for i in lista_nume.first..lista_nume.last loop
        if lista_nume.exists(i) then
          for j in lista_prenume.first..lista_prenume.last loop
              if lista_prenume.exists(j) then
               INSERT INTO USERS VALUES (v_user_id,concat(concat(lower(trim(lista_prenume(j).prenume)),'.'),lower(trim(lista_nume(i).nume))),concat(concat(concat(lower(trim(lista_prenume(j).prenume)),'.'),lower(trim(lista_nume(i).nume))),v_user_id),concat(concat(concat(lower(trim(lista_prenume(j).prenume)),'-'),lower(trim(lista_nume(i).nume))),'@yahoo.com'));
               v_user_id := v_user_id + 1;
               end if;
           end loop;
        end if;
    end loop;
END;

/

INSERT INTO USER_GROUPS VALUES (1,1,1);
INSERT INTO USER_GROUPS VALUES (2,4,1);
INSERT INTO USER_GROUPS VALUES (3,5,2);
INSERT INTO USER_GROUPS VALUES (4,6,2);
INSERT INTO USER_GROUPS VALUES (5,7,1);
INSERT INTO USER_GROUPS VALUES (6,9,1);
INSERT INTO USER_GROUPS VALUES (7,11,1);
INSERT INTO USER_GROUPS VALUES (8,13,1);
INSERT INTO USER_GROUPS VALUES (9,14,1);
INSERT INTO USER_GROUPS VALUES (10,9,2);
