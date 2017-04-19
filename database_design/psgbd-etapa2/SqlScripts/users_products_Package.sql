CREATE OR REPLACE PACKAGE user_manager IS
     PROCEDURE add_user (p_username users.username%type,p_password users.password%type, p_email users.email%type);
     PROCEDURE delete_user (p_username users.username%type);
     PROCEDURE update_user (p_username users.username%type,p_password users.password%type, p_email users.email%type);
     
     FUNCTION login(p_username users.username%type,p_password users.password%type) RETURN NUMBER;
     FUNCTION register(p_username users.username%type,p_password users.password%type, p_email users.email%type) RETURN NUMBER;
END user_manager;

/

CREATE OR REPLACE PACKAGE BODY user_manager IS

    PROCEDURE add_user (p_username users.username%type,p_password users.password%type, p_email users.email%type) IS
      v_id users.user_id%type;
    BEGIN
       SELECT MAX(USER_ID)INTO v_id FROM USERS;
       INSERT INTO USERS VALUES (v_id+1,p_username,p_password,p_email);
    END add_user;

    PROCEDURE delete_user (p_username users.username%type) IS
    BEGIN
       DELETE FROM USERS WHERE username=p_username;
    END delete_user;


    PROCEDURE update_user (p_username users.username%type,p_password users.password%type, p_email users.email%type) IS
    BEGIN
       UPDATE USERS SET username = p_username, password = p_password, email = p_email WHERE username = p_username; 
    END update_user;

        
    FUNCTION login(p_username users.username%type,p_password users.password%type) RETURN NUMBER AS
      CURSOR users_list IS select username,password from users;
      v_username USERS.USERNAME%TYPE;
      v_password USERS.PASSWORD%TYPE;
      v_found NUMBER:=0;
    BEGIN
      OPEN users_list;
      LOOP
          FETCH users_list INTO v_username,v_password;
          EXIT WHEN users_list%NOTFOUND;
          IF(v_username like 'p_username%' and v_password like 'p_password%')
          THEN
            v_found := 1;
          END IF;
      END LOOP;
      CLOSE users_list;
      RETURN v_found;
    END login;
    
    FUNCTION register(p_username users.username%type,p_password users.password%type, p_email users.email%type) RETURN NUMBER AS
    CURSOR users_list IS select username,password,email from users;
      v_username USERS.USERNAME%TYPE;
      v_password USERS.PASSWORD%TYPE;
      v_email USERS.EMAIL%TYPE;
      v_registered NUMBER:=1;
    BEGIN
      OPEN users_list;
      LOOP
          FETCH users_list INTO v_username,v_password,v_email;
          EXIT WHEN users_list%NOTFOUND;
          IF(v_username like 'p_username%' or v_email like 'p_email%')
          THEN
            v_registered := 0;
            EXIT;
          END IF;
      END LOOP;
      IF(v_registered = 0)
      THEN 
         DBMS_OUTPUT.PUT_LINE('Username or email already exists!');
      ELSE
        add_user(p_username,p_password,p_email);
      END IF;
      CLOSE users_list;
      RETURN v_registered;
    END;
    
END user_manager; 
/

CREATE OR REPLACE PACKAGE products_manager
AS
  TYPE products_array IS TABLE OF products%rowtype INDEX BY PLS_INTEGER;
  FUNCTION getProductsPage(p_page_number IN INTEGER,p_results_per_page IN INTEGER)
  RETURN products_manager.products_array;
  FUNCTION getNumberOfCaracProd(p_name_product PRODUCTS.NAME%TYPE) RETURN NUMBER;
  
  PROCEDURE add_product (p_category_id products.category_id%type, p_company_id products.company_id%type,p_name products.name%type);
  PROCEDURE delete_product (p_product_id products.product_id%type,p_product_name products.name%type);
  PROCEDURE update_product (p_product_id products.product_id%type,p_category_id products.category_id%type, p_company_id products.company_id%type,p_name products.name%type);
END products_manager;

/

CREATE OR REPLACE PACKAGE BODY products_manager
AS
  FUNCTION getProductsPage(p_page_number IN INTEGER,p_results_per_page IN INTEGER)
  RETURN products_manager.products_array IS
    v_productsList products_manager.products_array;
  BEGIN
    SELECT * BULK COLLECT INTO v_productsList FROM products 
      WHERE product_id between (p_page_number-1)*p_results_per_page+1 AND  p_page_number*p_results_per_page;                                                  
    RETURN v_productsList;
  END getProductsPage;
  
  FUNCTION getNumberOfCaracProd(p_name_product PRODUCTS.NAME%TYPE) RETURN NUMBER AS
    v_total_number_caracteristic INTEGER:=0;
    v_product_id PRODUCTS.PRODUCT_ID%TYPE;
    v_nume_caracteristic CARACTERISTICS.NAME%TYPE;
    v_value_caracteristic CARACTERISTICS.VALUE%TYPE;
  BEGIN
      FOR i IN (SELECT PC.caracteristic_id FROM PRODUCT_CARACTERISTICS PC JOIN PRODUCTS PP ON PP.product_id=PC.product_id WHERE PP.name like p_name_product)
      LOOP
          SELECT NAME,VALUE INTO v_nume_caracteristic,v_value_caracteristic FROM CARACTERISTICS WHERE CARACTERISTIC_ID = i.caracteristic_id;
          DBMS_OUTPUT.PUT_LINE('Produsul '||p_name_product||' are caracteristica '|| v_nume_caracteristic || ' ' || v_value_caracteristic);
      END LOOP; 
      
      SELECT count(PC.product_id) INTO v_total_number_caracteristic FROM PRODUCT_CARACTERISTICS PC JOIN PRODUCTS PP ON PP.product_id=PC.product_id WHERE PP.name like p_name_product;
      return v_total_number_caracteristic;
  END getNumberOfCaracProd;
  
  
  PROCEDURE add_product (p_category_id products.category_id%type, p_company_id products.company_id%type,p_name products.name%type) IS
    v_id products.product_id%type;
  BEGIN
       SELECT MAX(PRODUCT_ID)INTO v_id FROM PRODUCTS;
       INSERT INTO PRODUCTS VALUES (v_id+1,p_category_id,p_company_id,p_name);
  END add_product;
  
  
  PROCEDURE delete_product (p_product_id products.product_id%type,p_product_name products.name%type) IS
  BEGIN
    DELETE FROM PRODUCTS WHERE product_id = p_product_id;
  END delete_product;
  
  PROCEDURE update_product (p_product_id products.product_id%type,p_category_id products.category_id%type, p_company_id products.company_id%type,p_name products.name%type) IS
  BEGIN
     UPDATE PRODUCTS SET category_id = p_category_id, company_id = p_company_id, name = p_name WHERE product_id = p_product_id; 
  END update_product;
    
END products_manager;



