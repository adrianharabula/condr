-- =============================================
-- Authors: Bulbuc-Aioanei Elisa, Buza Mădălina-Gabriela
-- Create date: Week 13-19 March 2017
-- Context: Creating tables
-- =============================================

CONN condr/condr;

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
INSERT INTO CARACTERISTICS VALUES (13,'Heels','high');
INSERT INTO CARACTERISTICS VALUES (14,'Heels','small');

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
INSERT INTO COMPANY VALUES (11,'HANDM','Be beautiful!');
INSERT INTO COMPANY VALUES (12,'Bershka','A classic never goes out of style.');
INSERT INTO COMPANY VALUES (13,'PullANDBear','A diamond is forever.');
INSERT INTO COMPANY VALUES (14,'Gucci','A style for every story.');
INSERT INTO COMPANY VALUES (15,'DolceANDGabanna','Fashion is nothing without people.');
INSERT INTO COMPANY VALUES (16,'Oysho','HIS Denim. Made for pleasure.');
INSERT INTO COMPANY VALUES (17,'Zara','Quality never goes out of style.');
INSERT INTO COMPANY VALUES (18,'Prada','Shoes designed to move you.');
INSERT INTO COMPANY VALUES (19,'Stradivarius','Smart clothing. Everyday living.');
INSERT INTO COMPANY VALUES (20,'Guess','True style never dies.');
---------Foot wear-----------
INSERT INTO COMPANY VALUES (21,'Puma','Falke. Soul texture.');
INSERT INTO COMPANY VALUES (22,'Adidas','Form follows you.');
INSERT INTO COMPANY VALUES (23,'Nike','Keep it simple.');
--------Food-------------
INSERT INTO COMPANY VALUES (24,'Panoramic','Always on time!');
INSERT INTO COMPANY VALUES (25,'Alilla','Faster is better!');
INSERT INTO COMPANY VALUES (26,'Mamma Mia','So fast so hot!');
INSERT INTO COMPANY VALUES (27,'La Palia','Already ready!');
INSERT INTO COMPANY VALUES (28,'Little Texas','Stop, eat and go!');
INSERT INTO COMPANY VALUES (29,'Cavalerul Medieval','Eat and dream!');
---------Games--------------
INSERT INTO COMPANY VALUES (30,'UbiSoft','Adrenaline inside!');
INSERT INTO COMPANY VALUES (31,'EASport','Feel everything!');
---------Services--------------
INSERT INTO COMPANY VALUES (32,'Centric','Feel the succes!');
INSERT INTO COMPANY VALUES (33,'Romsoft','Improve yourself!');
-----------Education------
INSERT INTO COMPANY VALUES (34,'Editura Cartex','Don�t forget to read more!');
INSERT INTO COMPANY VALUES (35,'Editura Librex','Reading shapes you!');
INSERT INTO COMPANY VALUES (36,'Editura Artemis','Escape into a book!');
INSERT INTO COMPANY VALUES (37,'Editura Astra','Burn after reading!');
INSERT INTO COMPANY VALUES (38,'Editura Paralela48','The right book will always keep you company!');

INSERT INTO CATEGORY VALUES (1,'Electronics','Electronics can cover a large area of products that work based on electric devices, cables, circuits or others. Usually describes the house keeping or personal use devices that an user may need.');
INSERT INTO CATEGORY VALUES (2,'Clothes','Clothes describe a category that includes jackets, sweaters, t-shirts, pants, skirts, hats, accesories and other clothing items.');
INSERT INTO CATEGORY VALUES (3,'Foot wear','Foot wear category includes all items that someone may walk into, like heeled shoes, platforms, casual shoes, sport shoes and others.');
INSERT INTO CATEGORY VALUES (4,'Food','Food describes a very large area consisting of fruits, vegetables, meat, lactates, specific recipes and others. Here you may find the best recipes for your regarding your allergies and tastes.');
INSERT INTO CATEGORY VALUES (5,'Games','Games category includes games, recreational activities and relaxation technique in order to help you release the stress and gain a new fresh attitude');
INSERT INTO CATEGORY VALUES (6,'Services','Services describe a large area of interests that a person may need or want, like internet, TV cable, mobile services, electricity, water and others.');
INSERT INTO CATEGORY VALUES (7,'Education','Education category consists of products that a person may need for educational purposes,like books, records, maps etc, but also includes services that an university can provide, like scholarships, training programs and other.');


COMMIT;

-- =============================================
-- Authors: Buza Mădălina-Gabriela
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
