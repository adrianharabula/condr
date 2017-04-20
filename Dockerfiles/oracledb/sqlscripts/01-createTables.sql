-- =============================================
-- Authors: Bulbuc-Aioanei Elisa
-- Create date: Week 13-19 March 2017
-- Context: Creating tables
-- =============================================

-- set serveroutput on;

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
  NAME VARCHAR(100) NOT NULL,
  DESCRIPTION VARCHAR(300)
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

ALTER TABLE USER_GROUPS ADD CONSTRAINT user_fk FOREIGN KEY(USER_ID) REFERENCES USERS(USER_ID) ON DELETE CASCADE;
ALTER TABLE USER_GROUPS ADD CONSTRAINT group_fk FOREIGN KEY(GROUP_ID) REFERENCES GROUPS(GROUP_ID) ON DELETE CASCADE;
ALTER TABLE PRODUCTS ADD CONSTRAINT category_fk FOREIGN KEY(CATEGORY_ID) REFERENCES CATEGORY(CATEGORY_ID) ON DELETE CASCADE;
ALTER TABLE PRODUCT_CARACTERISTICS ADD CONSTRAINT product_fk FOREIGN KEY(PRODUCT_ID) REFERENCES PRODUCTS(PRODUCT_ID) ON DELETE CASCADE;
ALTER TABLE PRODUCT_CARACTERISTICS ADD CONSTRAINT caracteristic_fk FOREIGN KEY(CARACTERISTIC_ID) REFERENCES CARACTERISTICS(CARACTERISTIC_ID) ON DELETE CASCADE;
ALTER TABLE USER_CARACTERISTICS ADD CONSTRAINT user_caracteristics_fk FOREIGN KEY(USER_ID) REFERENCES USERS(USER_ID) ON DELETE CASCADE;
ALTER TABLE USER_CARACTERISTICS ADD CONSTRAINT caracteristics_fk FOREIGN KEY(CARACTERISTIC_ID) REFERENCES CARACTERISTICS(CARACTERISTIC_ID) ON DELETE CASCADE;
ALTER TABLE PRODUCTS ADD CONSTRAINT company_fk FOREIGN KEY(COMPANY_ID) REFERENCES COMPANY(RECORD_ID) ON DELETE CASCADE;

/

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

INSERT INTO CARACTERISTICS VALUES (1,'Allergy','gluten');
INSERT INTO CARACTERISTICS VALUES (2,'Allergy','lactose');
INSERT INTO CARACTERISTICS VALUES (3,'Color','blue');
INSERT INTO CARACTERISTICS VALUES (4,'Color','white');
INSERT INTO CARACTERISTICS VALUES (5,'Diagonal','15"');
INSERT INTO CARACTERISTICS VALUES (6,'Dimension','large');
INSERT INTO CARACTERISTICS VALUES (7,'Size','small');
INSERT INTO CARACTERISTICS VALUES (8,'Taste','sour');
INSERT INTO CARACTERISTICS VALUES (9,'Taste','sweet');
INSERT INTO CARACTERISTICS VALUES (10,'Taste','chilli');
INSERT INTO CARACTERISTICS VALUES (11,'Battery','good');
INSERT INTO CARACTERISTICS VALUES (12,'Processor','2.7Ghz');
INSERT INTO CARACTERISTICS VALUES (13,'Size','high');
INSERT INTO CARACTERISTICS VALUES (14,'Texture','soft');

--------Electronics----
INSERT INTO COMPANY VALUES (1,'Elefant','Think different!');
INSERT INTO COMPANY VALUES (2,'Emag','We control everything.');
INSERT INTO COMPANY VALUES (3,'Carreffour','Think.');
INSERT INTO COMPANY VALUES (4,'Praktiker','Leading innovation.');
INSERT INTO COMPANY VALUES (5,'Dedeman','Imagine the possbilities!');
INSERT INTO COMPANY VALUES (6,'Leroy Merilyn','Explore beyond limits');
INSERT INTO COMPANY VALUES (7,'Kaufland','In search of incredible');
INSERT INTO COMPANY VALUES (8,'ASOS','Awesome clothes never come in single pieces!');
INSERT INTO COMPANY VALUES (9,'Amazon','Be practic!');
----------Clothes--------
INSERT INTO COMPANY VALUES (10,'NewYorker','Be fashion!');
INSERT INTO COMPANY VALUES (11,'Bershka','A classic never goes out of style.');
INSERT INTO COMPANY VALUES (12,'Zara','Quality never goes out of style.');
INSERT INTO COMPANY VALUES (13,'Stradivarius','Smart clothing. Everyday living.');
---------Foot wear-----------
INSERT INTO COMPANY VALUES (14,'Puma','Falke. Soul texture.');
INSERT INTO COMPANY VALUES (15,'Adidas','Form follows you.');
INSERT INTO COMPANY VALUES (16,'Nike','Keep it simple.');
--------Food-------------
INSERT INTO COMPANY VALUES (17,'Panoramic','Always on time!');
INSERT INTO COMPANY VALUES (18,'Alilla','Faster is better!');
INSERT INTO COMPANY VALUES (19,'Mamma Mia','So fast so hot!');
INSERT INTO COMPANY VALUES (20,'La Palia','Already ready!');
INSERT INTO COMPANY VALUES (21,'Little Texas','Stop, eat and go!');
INSERT INTO COMPANY VALUES (22,'Cavalerul Medieval','Eat and dream!');
---------Games--------------
INSERT INTO COMPANY VALUES (23,'UbiSoft','Adrenaline inside!');
INSERT INTO COMPANY VALUES (24,'EASport','Feel everything!');
INSERT INTO COMPANY VALUES (25,'Blizzard Entertainment','Let the game begin!');
INSERT INTO COMPANY VALUES (26,'Blue Tongue Entertainment','enjoy the game!');
---------Services--------------
INSERT INTO COMPANY VALUES (27,'Centric','Feel the succes!');
INSERT INTO COMPANY VALUES (28,'Romsoft','Improve yourself!');
-----------Education------
INSERT INTO COMPANY VALUES (29,'Editura Cartex','Don’t forget to read more!');
INSERT INTO COMPANY VALUES (30,'Editura Librex','Reading shapes you!');
INSERT INTO COMPANY VALUES (31,'Editura Artemis','Escape into a book!');
INSERT INTO COMPANY VALUES (32,'Editura Astra','Burn after reading!');
INSERT INTO COMPANY VALUES (33,'Editura Paralela48','The right book will always keep you company!');

INSERT INTO CATEGORY VALUES (1,'Electronics','Electronics can cover a large area of products that work based on electric devices, cables, circuits or others. Usually describes the house keeping or personal use devices that an user may need.');
INSERT INTO CATEGORY VALUES (2,'Clothes','Clothes describe a category that includes jackets, sweaters, t-shirts, pants, skirts, hats, accesories and other clothing items.');
INSERT INTO CATEGORY VALUES (3,'Foot wear','Foot wear category includes all items that someone may walk into, like heeled shoes, platforms, casual shoes, sport shoes and others.');
INSERT INTO CATEGORY VALUES (4,'Food','Food describes a very large area consisting of fruits, vegetables, meat, lactates, specific recipes and others. Here you may find the best recipes for your regarding your allergies and tastes.');
INSERT INTO CATEGORY VALUES (5,'Games','Games category includes games, recreational activities and relaxation technique in order to help you release the stress and gain a new fresh attitude');
INSERT INTO CATEGORY VALUES (6,'Services','Services describe a large area of interests that a person may need or want, like internet, TV cable, mobile services, electricity, water and others.');
INSERT INTO CATEGORY VALUES (7,'Education','Education category consists of products that a person may need for educational purposes,like books, records, maps etc, but also includes services that an university can provide, like scholarships, training programs and other.');

/

-- DECLARE
-- v_caracteristic_id  NUMBER(10) := 1 ;
-- v_name VARCHAR(30) ;
-- v_value VARCHAR(40);
--
-- BEGIN
--     WHILE(v_caracteristic_id < 10001)
--     LOOP
--         v_name := 'caracteristic' || v_caracteristic_id;
--         v_value := 'value' || v_caracteristic_id;
--
--         INSERT INTO CARACTERISTICS(CARACTERISTIC_ID,NAME,VALUE) VALUES (v_caracteristic_id,v_name,v_value);
--         COMMIT;
--         v_caracteristic_id := v_caracteristic_id + 1;
--     END LOOP;
-- END;

-- DECLARE
-- v_product_id  NUMBER(10) := 1 ;
-- v_category_id NUMBER(10) ;
-- v_name VARCHAR(30);
-- v_description VARCHAR(100);
-- v_company_id NUMBER(10);
-- BEGIN
--     WHILE(v_product_id < 10001)
--     LOOP
--         v_name := 'name' || v_product_id;
--         v_description := 'description' || v_product_id;
--         SELECT dbms_random.value(1,6) num into v_category_id FROM dual;
--         SELECT dbms_random.value(1,3) num into v_company_id FROM dual;
--         INSERT INTO PRODUCTS(PRODUCT_ID,CATEGORY_ID,NAME,DESCRIPTION,COMPANY_ID) VALUES (v_product_id,v_category_id,v_name,v_description,v_company_id);
--         COMMIT;
--         v_product_id := v_product_id + 1;
--     END LOOP;
-- END;
