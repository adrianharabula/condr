-- =============================================
-- Authors: Anghelina Elena, Buza Mădălina-Gabriela
-- Create date: Week 10-16 April 2017
-- Context: Working with plsql functions from PHP
-- =============================================

CONN condr/condr;

CREATE OR REPLACE FUNCTION users_groups(v_user_name USERS.USERNAME%TYPE)
RETURN INTEGER AS

v_nr_groups INTEGER;
v_id USERS.USER_ID%TYPE;
v_group_name GROUPS.NAME%TYPE;
v_groups VARCHAR2(100) := '';

BEGIN
   SELECT USER_ID INTO v_id FROM USERS WHERE USERNAME = trim(v_user_name);

   FOR i IN (SELECT G.NAME,COUNT(U.USER_ID) INTO v_group_name,v_nr_groups FROM GROUPS G JOIN USER_GROUPS U ON G.GROUP_ID = U.GROUP_ID WHERE U.USER_ID = v_id GROUP BY G.NAME,G.GROUP_ID)
   LOOP
        v_groups := v_groups || i.NAME || ', ';
   END LOOP;

    DBMS_OUTPUT.PUT_LINE('Userul ' || v_user_name || ' face parte din grupurile : ' || v_groups);
    SELECT COUNT(USER_ID) INTO v_nr_groups FROM USER_GROUPS  WHERE USER_ID = v_id ;
    RETURN v_nr_groups;
END;


/
CREATE OR REPLACE FUNCTION getProductsByCategory(p_category_name CATEGORY.NAME%TYPE, p_company_name COMPANY.NAME%TYPE)
RETURN INTEGER AS

v_id_category CATEGORY.CATEGORY_ID%TYPE;
v_id_company COMPANY.RECORD_ID%TYPE;
v_nr_produse INTEGER;

BEGIN

    SELECT CATEGORY_ID INTO v_id_category FROM CATEGORY WHERE NAME LIKE p_category_name;
    SELECT RECORD_ID INTO v_id_company FROM COMPANY WHERE NAME like p_company_name;
    select COUNT(PRODUCT_ID) INTO v_nr_produse FROM PRODUCTS P JOIN COMPANY C ON P.COMPANY_ID = C.RECORD_ID
    WHERE P.CATEGORY_ID = v_id_category AND C.RECORD_ID = v_id_company;

    RETURN v_nr_produse;
END;
/
create or replace FUNCTION get_number_of_caracteristic(p_id_caracteristics NUMBER) RETURN INTEGER AS
v_id_user NUMBER;
v_number_of_caracteristics NUMBER:=0;
v_id_caracteristica NUMBER;
v_max_caracteristica INTEGER:=0;
cursor lista_caracteristici IS
  SELECT USERS.user_id, count(USER_CARACTERISTICS.user_id),USER_CARACTERISTICS.caracteristic_id FROM USER_CARACTERISTICS
  JOIN USERS ON USERS.user_id=USER_CARACTERISTICS.user_id
  WHERE USER_CARACTERISTICS.caracteristic_id = p_id_caracteristics
  group by USERS.user_id,USER_CARACTERISTICS.caracteristic_id;
BEGIN
  OPEN lista_caracteristici;
    LOOP
        FETCH lista_caracteristici INTO v_id_user,v_number_of_caracteristics,v_id_caracteristica ;
        EXIT WHEN lista_caracteristici%NOTFOUND;
        DBMS_OUTPUT.PUT_LINE('User-ul '||v_id_user||' a preferat caracteristica cu id-ul '|| v_id_caracteristica ||' de '||v_number_of_caracteristics||' ori.');
        v_max_caracteristica := v_max_caracteristica + v_number_of_caracteristics;
    END LOOP;
    CLOSE lista_caracteristici;
  return v_max_caracteristica;
END ;
/
create or replace FUNCTION getNumberOfCaracProd(p_name_product PRODUCTS.NAME%TYPE) RETURN NUMBER AS

v_total_number_caracteristic INTEGER:=0;
v_product_id PRODUCTS.PRODUCT_ID%TYPE;
v_nume_caracteristic CARACTERISTICS.NAME%TYPE;
v_value_caracteristic CARACTERISTICS.VALUE%TYPE;


BEGIN
    FOR i IN (SELECT PC.caracteristic_id FROM PRODUCT_CARACTERISTICS PC
        JOIN PRODUCTS PP ON PP.product_id=PC.product_id
        WHERE PP.name like p_name_product)
    LOOP
        SELECT NAME,VALUE INTO v_nume_caracteristic,v_value_caracteristic FROM CARACTERISTICS WHERE CARACTERISTIC_ID = i.caracteristic_id;
        DBMS_OUTPUT.PUT_LINE('Produsul '||p_name_product||' are caracteristica '|| v_nume_caracteristic || ' ' || v_value_caracteristic);

    END LOOP;


  SELECT count(PC.product_id) INTO v_total_number_caracteristic FROM PRODUCT_CARACTERISTICS PC
  JOIN PRODUCTS PP ON PP.product_id=PC.product_id
  WHERE PP.name like p_name_product;

  return v_total_number_caracteristic;
END ;


/
SET SERVEROUTPUT ON;

DECLARE

v_company COMPANY.NAME%TYPE := 'Zara';

v_name_company COMPANY.NAME%TYPE := 'La Palia';
v_count integer;
v_name_category CATEGORY.NAME%TYPE := 'Food';
v_id_caracteristica NUMBER := 14;
v_username USERS.USERNAME%TYPE := 'abel.vladimirescu';
v_name_product PRODUCTS.NAME%TYPE := 'Iphone 6';

BEGIN
    v_count := users_groups(v_username);
    DBMS_OUTPUT.PUT_LINE('Numarul de grupuri din care face parte user-ul '||v_username|| ' este :' || v_count);
    DBMS_OUTPUT.PUT_LINE(' ');
    v_count := getProductsByCategory(v_name_category,v_name_company);
    DBMS_OUTPUT.PUT_LINE('Numarul de produse din categoria '||v_name_category|| ' de la firma ' || v_name_company || ' este :' || v_count);
    DBMS_OUTPUT.PUT_LINE(' ');
    v_count := get_number_of_caracteristic(v_id_caracteristica);
    dbms_output.put_line('Caracteristica cu id-ul '||v_id_caracteristica||' a fost preferata de  '||v_count||' ori.');
    DBMS_OUTPUT.PUT_LINE(' ');
    v_count := getNumberOfCaracProd(v_name_product);
    DBMS_OUTPUT.PUT_LINE('Numarul total de caracteristici ale produsului ' || v_name_product || ' este ' || v_count);
END;
