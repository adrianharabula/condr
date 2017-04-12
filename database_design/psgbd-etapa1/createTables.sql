set serveroutput on;

DROP TABLE USERS CASCADE CONSTRAINTS;
DROP TABLE GROUPS CASCADE CONSTRAINTS;
DROP TABLE USER_GROUPS CASCADE CONSTRAINTS;
DROP TABLE PRODUCTS CASCADE CONSTRAINTS;
DROP TABLE CATEGORY CASCADE CONSTRAINTS;
DROP TABLE CARACTERISTICS CASCADE CONSTRAINTS;
DROP TABLE PRODUCT_CARACTERISTICS CASCADE CONSTRAINTS;
DROP TABLE USER_CARACTERISTICS CASCADE CONSTRAINTS;
DROP TABLE COMPANY CASCADE CONSTRAINTS;

/

CREATE TABLE USERS
(
  USER_ID NUMBER(10) PRIMARY KEY,
  USERNAME VARCHAR(30) NOT NULL,
  PASSWORD VARCHAR(40) NOT NULL,
  EMAIL VARCHAR(40) NOT NULL
);

/

CREATE TABLE GROUPS 
(
  GROUP_ID NUMBER(10) PRIMARY KEY,
  NAME VARCHAR(50) NOT NULL UNIQUE,
  DESCRIPTION VARCHAR2(200)
);

/

CREATE TABLE USER_GROUPS
(
  RECORD_ID NUMBER(10) PRIMARY KEY,
  USER_ID NUMBER(10) NOT NULL,
  GROUP_ID NUMBER(10) NOT NULL
);

/

CREATE TABLE CATEGORY
(
  CATEGORY_ID NUMBER(10) PRIMARY KEY,
  NAME VARCHAR(30) UNIQUE NOT NULL,
  DESCRIPTION VARCHAR(300)
);

/

CREATE TABLE PRODUCTS
(
  PRODUCT_ID NUMBER(10) PRIMARY KEY,
  CATEGORY_ID NUMBER(10) NOT NULL,
  COMPANY_ID NUMBER(10),
  NAME VARCHAR(30) NOT NULL,
  DESCRIPTION VARCHAR(100)
);

/

CREATE TABLE CARACTERISTICS
(
  CARACTERISTIC_ID NUMBER(10) PRIMARY KEY,
  NAME VARCHAR(30) NOT NULL,
  VALUE VARCHAR(30) NOT NULL
);

/

CREATE TABLE PRODUCT_CARACTERISTICS
(
  RECORD_ID NUMBER(10) PRIMARY KEY,
  PRODUCT_ID NUMBER(10) NOT NULL,
  CARACTERISTIC_ID NUMBER(10) NOT NULL
);

/

CREATE TABLE USER_CARACTERISTICS
(
  RECORD_ID NUMBER(10) PRIMARY KEY,
  USER_ID NUMBER(10) NOT NULL,
  CARACTERISTIC_ID NUMBER(10) NOT NULL
);

/

CREATE TABLE COMPANY
(
  RECORD_ID NUMBER(10) PRIMARY KEY,
  NAME VARCHAR(30) NOT NULL UNIQUE,
  DESCRIPTION VARCHAR2(100) 
);

COMMIT;

ALTER TABLE USER_GROUPS ADD CONSTRAINT user_fk FOREIGN KEY(USER_ID) REFERENCES USERS(USER_ID) ON DELETE CASCADE;
ALTER TABLE USER_GROUPS ADD CONSTRAINT group_fk FOREIGN KEY(GROUP_ID) REFERENCES GROUPS(GROUP_ID) ON DELETE CASCADE;
ALTER TABLE PRODUCTS ADD CONSTRAINT category_fk FOREIGN KEY(CATEGORY_ID) REFERENCES CATEGORY(CATEGORY_ID) ON DELETE CASCADE;
ALTER TABLE PRODUCT_CARACTERISTICS ADD CONSTRAINT product_fk FOREIGN KEY(PRODUCT_ID) REFERENCES PRODUCTS(PRODUCT_ID) ON DELETE CASCADE;
ALTER TABLE PRODUCT_CARACTERISTICS ADD CONSTRAINT caracteristic_fk FOREIGN KEY(CARACTERISTIC_ID) REFERENCES CARACTERISTICS(CARACTERISTIC_ID) ON DELETE CASCADE;
ALTER TABLE USER_CARACTERISTICS ADD CONSTRAINT user_caracteristics_fk FOREIGN KEY(USER_ID) REFERENCES USERS(USER_ID) ON DELETE CASCADE;
ALTER TABLE USER_CARACTERISTICS ADD CONSTRAINT caracteristics_fk FOREIGN KEY(CARACTERISTIC_ID) REFERENCES CARACTERISTICS(CARACTERISTIC_ID) ON DELETE CASCADE;
ALTER TABLE PRODUCTS ADD CONSTRAINT company_fk FOREIGN KEY(COMPANY_ID) REFERENCES COMPANY(RECORD_ID) ON DELETE CASCADE;

/

INSERT INTO USERS VALUES (1,'ElisaAioanei','mypassword123','elisa.aioanei@yahoo.com');
INSERT INTO USERS VALUES (2,'ElenaAnghelina','thisismypassword456','anghelina.elena@yahoo.com');
INSERT INTO USERS VALUES (3,'MadalinaBuza','password890','madalina.buza@yahoo.com');
INSERT INTO USERS VALUES (4,'AdrianHarabula','pass637485','adrian.harabula@yahoo.com');
INSERT INTO USERS VALUES (5,'AndreasDragoman','idontneedapass','andreas.dragoman@info.uaic.ro');
INSERT INTO USERS VALUES (6,'PopescuDumitru47','llallaaa12345','popescu.dumitru@info.uaic.ro');

INSERT INTO GROUPS VALUES (1,'FII@Iasi','This is where your sleepless nights begin!');
INSERT INTO GROUPS VALUES (2,'Food Lovers','Life has never tasted so good! Join us for the best recipes!');
INSERT INTO GROUPS VALUES (3,'PSGBD','Never ask a DBA to move furniture, they are known for dropping tables. :)');
INSERT INTO GROUPS VALUES (4,'Web Technologies','I know I am going to heaven, cause I am already in hell! *web dev life*');
INSERT INTO GROUPS VALUES (5,'Software Engeneering','We will teach you how to work in a company!');
INSERT INTO GROUPS VALUES (6,'Cat Lovers','Meow');
INSERT INTO GROUPS VALUES (7,'Science','"Come on, it is not like it is rocket science, they tell me.."');
INSERT INTO GROUPS VALUES (8,'Education','Your future starts today!');
INSERT INTO GROUPS VALUES (9,'Highschool','Well, we still got time to do stupid thing...');
INSERT INTO GROUPS VALUES (10,'Clothes Lovers','');
INSERT INTO GROUPS VALUES (11,'Fashion','');
INSERT INTO GROUPS VALUES (12,'Daily Entertainment','');
INSERT INTO GROUPS VALUES (13,'Story of my life','*Dont even need a description*');
INSERT INTO GROUPS VALUES (14,'IFL Science','');
INSERT INTO GROUPS VALUES (15,'Football Lovers','');
INSERT INTO GROUPS VALUES (16,'PC Garage','');

INSERT INTO USER_GROUPS VALUES (1,1,4);
INSERT INTO USER_GROUPS VALUES (2,2,2);
INSERT INTO USER_GROUPS VALUES (3,3,7);
INSERT INTO USER_GROUPS VALUES (4,4,4);

INSERT INTO CARACTERISTICS VALUES (1,'Allergy','gluten');
INSERT INTO CARACTERISTICS VALUES (2,'Allergy','lactose');
INSERT INTO CARACTERISTICS VALUES (3,'Color','blue');
INSERT INTO CARACTERISTICS VALUES (4,'Color','white');
INSERT INTO CARACTERISTICS VALUES (5,'Diagonal','15"');
INSERT INTO CARACTERISTICS  VALUES (6,'Dimension','large');
INSERT INTO CARACTERISTICS VALUES (7,'Size','small');
INSERT INTO CARACTERISTICS VALUES (8,'Taste','sour');
INSERT INTO CARACTERISTICS VALUES (9,'Taste','sweet');
INSERT INTO CARACTERISTICS VALUES (10,'Taste','chilli');
INSERT INTO CARACTERISTICS VALUES (11,'Battery','good');
INSERT INTO CARACTERISTICS VALUES (12,'Processor','2.7Ghz');
INSERT INTO CARACTERISTICS VALUES (13,'Heels','high');
INSERT INTO CARACTERISTICS VALUES (14,'Heels','small');

INSERT INTO COMPANY VALUES (1,'Apple','Think different!');
INSERT INTO COMPANY VALUES (2,'Microsoft','We control everything.');
INSERT INTO COMPANY VALUES (3,'IBM','Think.');
INSERT INTO COMPANY VALUES (4,'Toshiba','Leading innovation.');
INSERT INTO COMPANY VALUES (5,'Samsung','Imagine the possbilities!');
INSERT INTO COMPANY VALUES (6,'Acer','Explore beyond limits');
INSERT INTO COMPANY VALUES (7,'Asus','In search of incredible');
INSERT INTO COMPANY VALUES (8,'ASOS','Awesome clothes never come in single pieces!');
INSERT INTO COMPANY VALUES (9,'Amazon','and you are done!');
INSERT INTO COMPANY VALUES (10,'NewYorker','Make it worth it!');
INSERT INTO COMPANY VALUES (11,'Centric','Get involved, bond and succeed!');
INSERT INTO COMPANY VALUES (12,'Romsoft','Your recipe for success!');

INSERT INTO CATEGORY VALUES (1,'Electronics','Electronics can cover a large area of products that work based on electric devices, cables, circuits or others. Usually describes the house keeping or personal use devices that an user may need.');
INSERT INTO CATEGORY VALUES (2,'Clothes','Clothes describe a category that includes jackets, sweaters, t-shirts, pants, skirts, hats, accesories and other clothing items.');
INSERT INTO CATEGORY VALUES (3,'Foot wear','Foot wear category includes all items that someone may walk into, like heeled shoes, platforms, casual shoes, sport shoes and others.');
INSERT INTO CATEGORY VALUES (4,'Food','Food describes a very large area consisting of fruits, vegetables, meat, lactates, specific recipes and others. Here you may find the best recipes for your regarding your allergies and tastes.');
INSERT INTO CATEGORY VALUES (5,'Entertainment','Entertainment category includes games, recreational activities and relaxation technique in order to help you release the stress and gain a new fresh attitude');
INSERT INTO CATEGORY VALUES (6,'Services','Services describe a large area of interests that a person may need or want, like internet, TV cable, mobile services, electricity, water and others.');
INSERT INTO CATEGORY VALUES (7,'Education','Education category consists of products that a person may need for educational purposes,like books, records, maps etc, but also includes services that an university can provide, like scholarships, training programs and other.');

INSERT INTO PRODUCTS VALUES (1,4,9,'Apple','Imported from Thailand,the best quality!');
INSERT INTO PRODUCTS VALUES (2,1,7,'Zenbook','The best laptop made by now!');
INSERT INTO PRODUCTS VALUES (3,5,5,'Tablet','The best tablet available is stores!');
INSERT INTO PRODUCTS VALUES (4,3,8,'Heeled shoes','');
INSERT INTO PRODUCTS VALUES (5,4,9,'Pumpkin pie','The smell of childhood');

INSERT INTO USER_CARACTERISTICS VALUES (1,1,13);
INSERT INTO USER_CARACTERISTICS VALUES (2,3,12);
INSERT INTO USER_CARACTERISTICS VALUES (3,2,9);
INSERT INTO USER_CARACTERISTICS VALUES (4,4,4);

INSERT INTO PRODUCT_CARACTERISTICS VALUES (1,1,9);
INSERT INTO PRODUCT_CARACTERISTICS VALUES (2,4,13);
INSERT INTO PRODUCT_CARACTERISTICS VALUES (3,3,5);
INSERT INTO PRODUCT_CARACTERISTICS VALUES (4,4,12);

COMMIT;

--SELECT * FROM CATEGORY;

--SELECT * FROM USERS;

--SELECT * FROM COMPANY;

/*
DECLARE
v_caracteristic_id  NUMBER(10) := 1 ;
v_name VARCHAR(30) ;
v_value VARCHAR(40);

BEGIN
    WHILE(v_caracteristic_id < 10001)
    LOOP
        v_name := 'caracteristic' || v_caracteristic_id;
        v_value := 'value' || v_caracteristic_id;
        
        INSERT INTO CARACTERISTICS(CARACTERISTIC_ID,NAME,VALUE) VALUES (v_caracteristic_id,v_name,v_value);
        COMMIT;
        v_caracteristic_id := v_caracteristic_id + 1;
    END LOOP;
END;


SELECT * FROM CARACTERISTICS;


set serveroutput on;
DECLARE
v_product_id  NUMBER(10) := 1 ;
v_category_id NUMBER(10) ;
v_name VARCHAR(30);
v_description VARCHAR(100);
v_company_id NUMBER(10);
BEGIN
    WHILE(v_product_id < 10001)
    LOOP
        v_name := 'name' || v_product_id;
        v_description := 'description' || v_product_id;
        SELECT dbms_random.value(1,6) num into v_category_id FROM dual;
        SELECT dbms_random.value(1,3) num into v_company_id FROM dual;
        INSERT INTO PRODUCTS(PRODUCT_ID,CATEGORY_ID,NAME,DESCRIPTION,COMPANY_ID) VALUES (v_product_id,v_category_id,v_name,v_description,v_company_id);
        COMMIT;
        v_product_id := v_product_id + 1;
    END LOOP;
END;

SELECT * FROM PRODUCTS;

SELECT * FROM USER_CARACTERISTICS;

SELECT * FROM PRODUCT_CARACTERISTICS;
*/
