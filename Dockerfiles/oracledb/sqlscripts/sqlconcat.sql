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
-- alter user condr identified by new_password; # change user password
alter user condr default tablespace aplicatie quota 1990M on aplicatie;

grant connect to condr;
grant all privileges to condr;
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
--------------------------------------------------------
--  File created - Wednesday-April-19-2017
--------------------------------------------------------
--------------------------------------------------------
--  DDL for Table PERSOANE
--------------------------------------------------------

CREATE TABLE PERSOANE
(
  "NUME" VARCHAR2(30 BYTE),
  "PRENUME" VARCHAR2(30 BYTE)
);
--------------------------------------------------------
--  DDL for Table PRODUSE
--------------------------------------------------------

/

CREATE TABLE PRODUSE
(
  "ELECTRONICS" VARCHAR2(140 BYTE),
  "CLOTHES" VARCHAR2(140 BYTE),
  "FOOT_WEAR" VARCHAR2(140 BYTE),
  "FOOD" VARCHAR2(140 BYTE),
  "GAMES" VARCHAR2(140 BYTE),
  "BOOKS" VARCHAR2(140 BYTE),
  "COLORS" VARCHAR2(140 BYTE)
);

/
REM INSERTING into persoane
SET DEFINE OFF;
Insert into persoane (NUME,PRENUME) values ('Vladimirescu','Ionel');
Insert into persoane (NUME,PRENUME) values ('Manea','Martin');
Insert into persoane (NUME,PRENUME) values ('Miklos','Serban');
Insert into persoane (NUME,PRENUME) values ('Pavlenco','Horasiu');
Insert into persoane (NUME,PRENUME) values ('Costiniu','Dimitrie');
Insert into persoane (NUME,PRENUME) values ('Pangratiu','Mihai');
Insert into persoane (NUME,PRENUME) values ('Diaconu','Laurentiu');
Insert into persoane (NUME,PRENUME) values ('Negrescu','Abel');
Insert into persoane (NUME,PRENUME) values ('Constantin','Ciprian');
Insert into persoane (NUME,PRENUME) values ('Ceausescu','Marina');
Insert into persoane (NUME,PRENUME) values ('Macedonski','Madalina');
Insert into persoane (NUME,PRENUME) values ('Rudeanu','Dumitru');
Insert into persoane (NUME,PRENUME) values ('Ripnu','Teodorica');
Insert into persoane (NUME,PRENUME) values ('Parvulescu','Virgil');
Insert into persoane (NUME,PRENUME) values ('Hutopila','Marcel');
Insert into persoane (NUME,PRENUME) values ('Presecan','Adrian');
Insert into persoane (NUME,PRENUME) values ('Epureanu','Costin');
Insert into persoane (NUME,PRENUME) values ('Ganea','Sandu');
Insert into persoane (NUME,PRENUME) values ('Raducanu','Velkan');
Insert into persoane (NUME,PRENUME) values ('Ciorica','Marinel');
Insert into persoane (NUME,PRENUME) values ('Iordache','Eveline');
Insert into persoane (NUME,PRENUME) values ('Lazarescu','Liliana');
Insert into persoane (NUME,PRENUME) values ('Florea','Andra');
Insert into persoane (NUME,PRENUME) values ('Georghiou','Eugenia');
Insert into persoane (NUME,PRENUME) values ('Muresanu','Mihaela');
Insert into persoane (NUME,PRENUME) values ('Tanase','Luminita');
Insert into persoane (NUME,PRENUME) values ('Brancoveanu','Flavia');
Insert into persoane (NUME,PRENUME) values ('Catargiu','Costela');
Insert into persoane (NUME,PRENUME) values ('Mina','Daciana');
Insert into persoane (NUME,PRENUME) values ('Morariu','Florenta');
Insert into persoane (NUME,PRENUME) values ('Marinescu','Dimitry');
Insert into persoane (NUME,PRENUME) values ('Cretu','Tiberiu');
Insert into persoane (NUME,PRENUME) values ('Theodorescu','Nicu');
Insert into persoane (NUME,PRENUME) values ('Minea','Vlad');
Insert into persoane (NUME,PRENUME) values ('Draghicescu','Luciana');
Insert into persoane (NUME,PRENUME) values ('Dimir','Razvan');
Insert into persoane (NUME,PRENUME) values ('Artenie','Ionatan');
Insert into persoane (NUME,PRENUME) values ('Amarandei','Irina');
Insert into persoane (NUME,PRENUME) values ('Parel','Costea');
Insert into persoane (NUME,PRENUME) values ('Toma','Traian');
Insert into persoane (NUME,PRENUME) values ('Kreanga','Lenusa');
Insert into persoane (NUME,PRENUME) values ('Arcos','Lina');
Insert into persoane (NUME,PRENUME) values ('Babes','Ruxandra');
Insert into persoane (NUME,PRENUME) values ('Olaru','Stela');
Insert into persoane (NUME,PRENUME) values ('Blerinca','Andreea');
Insert into persoane (NUME,PRENUME) values ('Ciora','Isabela');
Insert into persoane (NUME,PRENUME) values ('Craciun','Brandusa');
Insert into persoane (NUME,PRENUME) values ('Alecsandri','Octavia');
Insert into persoane (NUME,PRENUME) values ('Manescu','Mara');
Insert into persoane (NUME,PRENUME) values ('Gogean','Sonia');
Insert into persoane (NUME,PRENUME) values ('Nechita','Vali');
Insert into persoane (NUME,PRENUME) values ('Petran','Ciodaru');
Insert into persoane (NUME,PRENUME) values ('Kirica','Carol');
Insert into persoane (NUME,PRENUME) values ('Miklos','Calin');
Insert into persoane (NUME,PRENUME) values ('Moscovici','Lucian');
Insert into persoane (NUME,PRENUME) values ('Randa','Ana');
Insert into persoane (NUME,PRENUME) values ('Raceanu','Flavius');
Insert into persoane (NUME,PRENUME) values ('Ardelean','Teodor');
Insert into persoane (NUME,PRENUME) values ('Fieraru','Viorel');
Insert into persoane (NUME,PRENUME) values ('Amanar','Luca');
Insert into persoane (NUME,PRENUME) values ('Ianculescu','Ionut');
Insert into persoane (NUME,PRENUME) values ('Giurescu','Haralamb');
Insert into persoane (NUME,PRENUME) values ('Ilie','Horea');
Insert into persoane (NUME,PRENUME) values ('Puscas','Iosif');
Insert into persoane (NUME,PRENUME) values ('Lazar','Rica');
Insert into persoane (NUME,PRENUME) values ('Jonker','Andrei');
Insert into persoane (NUME,PRENUME) values ('Bogoescu','Ioan');
Insert into persoane (NUME,PRENUME) values ('Zamfir','Petre');
Insert into persoane (NUME,PRENUME) values ('Kiritescu','Felix');
Insert into persoane (NUME,PRENUME) values ('Nicolescu','Valeriu');
Insert into persoane (NUME,PRENUME) values ('Rotaru','Brigite');
Insert into persoane (NUME,PRENUME) values ('Marin','Marioara');
Insert into persoane (NUME,PRENUME) values ('Gusacu','Zina');
Insert into persoane (NUME,PRENUME) values ('Goian','Daria');
Insert into persoane (NUME,PRENUME) values ('Lacusta','Silvia');
Insert into persoane (NUME,PRENUME) values ('Nistorel','Brigita');
Insert into persoane (NUME,PRENUME) values ('Adamache','Teodora');
Insert into persoane (NUME,PRENUME) values ('Parasca','Victoria');
Insert into persoane (NUME,PRENUME) values ('Banica','Carla');
Insert into persoane (NUME,PRENUME) values ('Nastase','Aurika');
Insert into persoane (NUME,PRENUME) values ('Gusa','Daniel');
Insert into persoane (NUME,PRENUME) values ('Stanasila','Cornel');
Insert into persoane (NUME,PRENUME) values ('Barbulescu','Gabriel');
Insert into persoane (NUME,PRENUME) values ('Tugurlan','Anita');
Insert into persoane (NUME,PRENUME) values ('Florescu','Dorota');
Insert into persoane (NUME,PRENUME) values ('Niculescu','Cici');
Insert into persoane (NUME,PRENUME) values ('Cutov','Olga');
Insert into persoane (NUME,PRENUME) values ('Funar','Elisabeta');
Insert into persoane (NUME,PRENUME) values ('Nistor','Beatrix');
Insert into persoane (NUME,PRENUME) values ('Kogalniceaunu','Ingrid');
Insert into persoane (NUME,PRENUME) values ('Neagoe','Alin');
Insert into persoane (NUME,PRENUME) values ('Lascar','Mariutza');
Insert into persoane (NUME,PRENUME) values ('Ungureanu','Mariana');
Insert into persoane (NUME,PRENUME) values ('Balaurulescu','Gabriela');
Insert into persoane (NUME,PRENUME) values ('Tomescu','Delia');
Insert into persoane (NUME,PRENUME) values ('Corbeanu','Daniela');
Insert into persoane (NUME,PRENUME) values ('Balauru','Gabriella');
Insert into persoane (NUME,PRENUME) values ('Pangratiu','Vanda');
Insert into persoane (NUME,PRENUME) values ('Codreanu','Diana');
Insert into persoane (NUME,PRENUME) values ('Plesu','Gabi');

REM INSERTING into produse
SET DEFINE OFF;
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values ('TV','T-Shirt','Sandals','wild rice','Heavy Rain','The Alchemist by Paulo Coelho','Blue');
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values ('Iphone 4S','Sweatshirt','Slippers','herring','Brothers in Arms: Hell''s Highway','Harry Potter series by J.K. Rowling','Red');
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values ('Iphone 4','Knickers','Heels','Parmesan cheese','Batman: Arkham Asylum','The Lord of the Rings by J.R.R. Tolkien','Green');
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values ('Iphone 5','Waistcoat','Flats','ginger ale','Diablo II','The Count of Monte Cristo by Alexandre Dumas','Purple');
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values ('Iphone 6S','Shirt','Platforms','ginger','Dead Rising','A Song of Ice and Fire series (Game of Thrones) by George R.R. Martin','Black');
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values ('Iphone 7','Dress','Heeled Sandals','buttermilk','Saints Row 2','To Kill a Mockingbird by Harper Lee','White');
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values ('Iphone 5S','Overalls','Flat Sandals','wine vinegar','BioShock 2','The Little Prince by Antoine de Saint-Exupery','Yellow');
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values ('Iphone 6','Thong','Boots','navy beans','Castlevania: Lords of Shadow','Siddhartha by Herman Hesse','Pink');
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values ('Blender','Tights','Sneakers','brown sugar','Tom Clancy''s Splinter Cell: Conviction','Candide by Voltaire','Orange');
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values ('Air conditioning','Skirt',null,'raw sugar','Final Fantasy X','The Girl with the Dragon Tattoo by Stieg Larsson','Gold');
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values ('Air ioniser','Fleece',null,'angelica','Dark Sector','Callendar Square','Silver');
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values ('Appliance plug','Cummerbund',null,'cream','Street Fighter IV','Resurrection Row','Lime');
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values ('Aroma lamp','Hollister Dress',null,'duck','Super Mario Galaxy','Rutland Place','Brown');
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values ('Attic fan','Short Dress',null,'aquavit','Demon''s Souls','Bluegate Fields','Gray');
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values ('Bachelor griller','Camisole',null,'sesame seeds','Quantum of Solace','Death In The Devil''s Acre','Turquoise');
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values ('Back boiler','Belt',null,'red snapper','Call of Duty: Black Ops','Cardington Crescent','Beige');
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values ('Beverage opener','Tie',null,'graham crackers','Kane & Lynch 2: Dog Days','Silence In Hanover Close',null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values ('Box mangle','Lingerie',null,'poppy seeds','Gears of War','Bethlehem Road',null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values ('Can opener','Polo Shirt',null,'rose water','Plants vs. Zombies','Highgate Rise',null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values ('Ceiling fan','Underwear',null,'veal','Guitar Hero III: Legends of Rock','Belgrave Square',null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values ('Central vacuum cleaner','Coat',null,'kiwi','Far Cry 2','Farrier''s Lane',null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values ('Clothes dryer','Sarong',null,'croutons','Singularity','The Hyde Park Headsman',null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values ('Combo washer dryer','Dinner Jacket',null,'hot sauce','Assassin''s Creed: Brotherhood','Traitor''s Gate',null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values ('Dish draining closet','Tankini',null,'melons','50 Cent: Blood on the Sand','Pentecost Alley',null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values ('Dishwasher','Pajamas',null,'bok choy','Ninja Gaiden II','Ashworth Hall',null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values ('Domestic robot','Blazer',null,'sauerkraut','Journey','Brunswick Gardens',null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values ('Comparison of domestic robots','Hoody',null,'wine','Mass Effect 2','Bedford Square',null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values ('Drawer dishwasher','Robe',null,'peanuts','Dead Space 2','Half Moon Street',null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values ('EcoCute','Poncho',null,'beets','Metal Gear Solid','The Whitechapel Consipracy',null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values ('Electric water boiler','Boots',null,'asparagus','Too Human','Southampton Row',null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values ('Fan heater','Stockings',null,'butter','Team Fortress 2','Seven Dials',null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values ('Flame supervision device','Shorts',null,'water','Devil May Cry 4','Long Spoon Lane',null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values ('Forced-air','Briefs',null,'breadfruit','inFamous','Buckingham Palace Gardens',null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values ('Futon dryer','Jacket',null,'squid','Halo: Combat Evolved','Lisson Grove',null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values ('Garbage disposal unit','Jeans',null,'pepper','L.A. Noire','Dorchester Terrace',null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values ('Gas appliance','Long scarf',null,'coconut milk','Portal 2','Midnight at Marble Arch',null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values ('Go-to-bed matchbox','Swimwear',null,'rabbits','The Elder Scrolls IV: Oblivion','Death on Blackheath (formerly Shooters Hill).',null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values ('Hair dryer','Bikini',null,'cooking wine','Red Dead Redemption','The Face of a Stranger',null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values ('Hair iron','Suit',null,'raspberries','Halo 2','A Dangerous Mourning',null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values ('Hob (hearth)','Kilt',null,'remoulade','Spore','Defend and Betray',null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values ('Humidifier','Top',null,'ricotta cheese','Max Payne 3','A Sudden and Fearful Death',null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values ('HVAC','Cravat',null,'kidney beans','Castle Crashers','Sins of the Wolf',null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values ('Icebox','Socks',null,'alfredo sauce','Dead Island','Cain His Brother',null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values ('Internet refrigerator','Scarf',null,'Canadian bacon','Limbo','Weighed In The Balance',null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values ('Cold Pressed Juicer','Jogging Suit',null,'brown rice','Call of Duty: World at War','The Silen Cry',null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values ('Clothes iron','Nightgown',null,'paprika','Battlefield 3','Whited Sepulchers (A Breach of Promise (US))',null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values ('Kimatsu','Shawl',null,'cod','The Witcher 2: Assassins of Kings','The Twisted Root',null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values ('Kimchi refrigerator','Gown',null,'squash','The World Ends With You','Slaves and Obsession (Slaves Of Obsession(US))',null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values ('Mangle (machine)','Gloves',null,'plums','F.E.A.R. 3','A Funeral In Blue',null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values ('Manual vacuum cleaner','Cargos',null,'garlic powder','The Beatles: Rock Band','Death Of A Stranger',null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values ('Micathermic heater','Blouse',null,'pecans','Dead Rising 2','The Shifting Tide',null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values ('Microwave oven','Bow Tie',null,'carrots','Dead Rising 2: Case Zero','Dark Assassin',null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values ('Mousetrap','Sunglasses',null,'lentils','Dragon Age: Origins','Execution Dock',null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values ('Oil heater','Boxers',null,'eel','Halo 4','Acceptable Loss',null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values ('Oven','Tracksuit',null,'bagels','Vanquish','A Sunless Sea',null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values ('Patio heater','Hat',null,'milk','Prototype','Blind Justice',null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values ('Radiator (heating)','Cufflinks',null,'prosciutto','Gears of War 3','Blood On The Water',null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values ('Refrigerator','Cardigan',null,'ham','Mirror''s Edge','A Christmas Journey (featuring Aunt Vespasia from the "Pitt" series)',null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values ('Home server','Bra',null,'dates','Lost Odyssey','A Christmas Visitor (featuring Henry Rathbone from the "Monk" series)',null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values ('Sewing machine','Swimming Shorts',null,'snapper','The Orange Fox','A Christmas Guest (featuring Grandmama Ellison form the "Pitt" series)',null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values ('Stove',null,null,'chili sauce','Red Faction: Guerrilla','A Christmas Secret (2006)',null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values ('Sump pump',null,null,'barley sugar','Costume Quest','A Christmas Beginning (2007)',null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values ('Thermal mass refrigerator',null,null,'chicken liver','Rock Band 2','A Christmas Grace (2008)',null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values ('Tie press',null,null,'mustard seeds','Grand Theft Auto: Chinatown Wars','A Christmas Promise (2009)',null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values ('Toaster�and toaster ovens',null,null,'vermouth','Prince of Persia','A Christmas Odyssey (2010)',null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values ('Trouser press',null,null,'yogurt','Mafia II','A Christmas Homecoming (2011)',null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values ('Vacuum cleaner',null,null,'cashew nut','Wii Sports','A Christmas Garland (2012)',null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values ('Robotic vacuum cleaner',null,null,'cantaloupes','DeathSpank','A Christmas Hope (2013)',null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values ('Washing machine',null,null,'bean threads','Shadow Complex','No Graves as Yet (2003)',null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values ('Thor washing machine',null,null,'molasses','The Legend of Zelda: Phantom Hourglass','Shoulder The Sky (2004)',null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values ('Water cooker',null,null,'sour cream','Assassin''s Creed II','Angles In The Gloom (2005)',null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values ('Water Purifier',null,null,'shallots','Halo 3: ODST','At Some Disputed Barricade (2006)',null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values ('Water heating',null,null,'apples','Super Smash Bros. Brawl','We Shall Not Sleep (2007)',null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values ('Window fan',null,null,'salsa','The Darkness','The Gremlins(1943)',null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values ('Television',null,null,'lemon grass','Mario Kart Wii','Over To You(1946)',null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values ('Disposal Garbage',null,null,'plum tomatoes','Battlefield 1943','Some Time Never(1948)',null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values ('Samsung 3S',null,null,'rice','Shadows of the Damned','Someone Like You(1953)',null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values ('Samsung 4S',null,null,'salt','Indigo Prophecy','Kiss Kiss(1960)',null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values ('Samsung J5',null,null,'figs','F.E.A.R. 2: Project Origin','James and the Giant Peach(1961)',null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values ('Smart-TV',null,null,'cherries','X-Men Origins: Wolverine','Charlie and the Chocolate Factory(1964)',null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,'prunes','LEGO Indiana Jones: The Original Adventures','The Magic Finger(1966)',null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,'turnips','Army of Two','Fantastic Mr Fox(1968)',null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,'green beans','Assassin''s Creed','Charlie and the Great Glass Elevator(1972)',null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,'shrimp','Killzone 3','Switch Bitch(1974)',null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,'walnuts','Saints Row: The Third','Danny, the Champion of the World(1975)',null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,'fish sauce','Professor Layton and the Curious Village','The Wonderful Story of Henry Sugar and Six More(1977)',null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,'almonds','Fable III','The Enormous Crocodile(1978)',null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,'apricots','Alpha Protocol','My Uncle Oswald(1979)',null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,'french fries','Dante''s Inferno','The Twits(1980)',null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,'half-and-half','Resistance: Fall of Man','George''s Marvellous Medicine(1981)',null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,'pork','Batman: Arkham City','Revolting Rhymes(1982)',null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,'heavy cream','Medal of Honor','The BFG(1982)',null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,'strawberries','Borderlands','Dirty Beasts(1983)',null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,'broccoli raab','Just Cause 2','The Witches(1983)',null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,'gorgonzola','Half-Life 2','Roald Dahls Book of Ghost Stories(1983)',null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,'soy sauce','God of War: Chains of Olympus','Boy: Tales of Childhood(1984)',null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,'blackberries','The Legend of Zelda: Ocarina of Time','The Giraffe and the Pelly and Me(1985)',null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,'feta cheese','Aces of the Galaxy','Two Fables(1985)',null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,'honey','Aces of the Luftwaffe','Going Solo(1986)',null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,'mackerel','Aces Over Europe','Matilda(1988)',null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,'trout','Aces Speed','Rhyme Stew(1989)',null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,'gelatin','Achtung Panzer: Kharkov 1943','Ah, Sweet Mystery of Life(1989)',null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,'tomato juice','ACR Drift','Esio Trot(1990)',null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,'custard','Acrobots','The Vicar of Nibbleswicke(1991)',null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,'tuna','Across Age','The Minpins(1991)',null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,'orange peels','Across Age 2','Roald Dahl''s Guide to Railway Safety(1991)',null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,'habanero chilies','Across the Dnepr: Second Edition','My Year(1991)',null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,'coffee','Across the Table - Hockey','The Honeys(stage play, 1955)',null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,'vanilla bean','ACT IT OUT! A Game of Charades','You Only Live Twice(1967)',null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,'green onions','Act of Aggression','Chitty Chitty Bang Bang(1968)',null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,'haddock','Act of Fury: Kraine''s Revenge','The Night Digger(1971)',null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,'tonic water','Act of War: Direct Action','Willy Wonka and the Chocolate Factory�1971)',null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,'Goji berry','Act of War: High Treason','The Roald Dahl Cookbook�(1991)',null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,'almond butter','Action Block Buster','Revolting Recipes(1994)',null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,'bruschetta','Action Bowling 2','The Roald Dahl Treasury(1997)',null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,'colby cheese','Action Bowling HD','Even More Revolting Recipes(2001)',null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,'Mandarin oranges','Action Buggy','Songs and Verse(2005)',null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,'sushi','Action Driver','More About Boy(2008)',null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,'cider vinegar','Action Henk','Completely Revolting Recipes(2009)',null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,'liver','Action KidMaze','About Life',null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,'tarragon','Action Man',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,'cream cheese','Action Puzzle',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,'truffles','Action Puzzle Town',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,'sausages','Active Lancer',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,'sweet peppers','Active Life Exploring',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,'onion powder','Active Life: Extreme Challenge',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,'chicory','Active Life: Outdoor Challenge',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,'beer','Active Soccer',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,'coriander','Activision Anthology',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,'corned beef','Activision Hits Remixed',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,'coconuts','Actua Soccer',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,'pancetta','Actua Soccer 2',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,'mesclun greens','Actua Soccer 3',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,'almond extract','Adam Wolfe',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,'applesauce','Adam�s Venture 3: Revelations',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,'buckwheat','Adam''s Venture 2: Solomon''s Secret',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,'cottage cheese','Adam''s Venture Chronicles',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,'maraschino cherries','Adam''s Venture: Origins',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,'limes','Adam''s Venture: The Search for the Lost Garden',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,'celery','The Addams Family',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,'chambord','ADDICT',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,'avocados','Addiction Pinball',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,'barley','Addicus',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,'panko bread crumbs','Adidas Power Soccer',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,'mussels','Adidas Power Soccer ''98',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,'zinfandel wine','Admiral Nemo',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,'monkfish','Adopted',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,'bass','Adorables',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,'bacon','ADR1FT',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,'turkeys','Adrenalin Misfits',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,'English muffins','Adrenaline Rush Miami Drive',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,'pesto','ADUnblock',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,'pinto beans','Advan Racing',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,'oatmeal','Advance GTA',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,'chives','Advance Guardian Heroes',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,'papayas','Advance Wars',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,'lettuce','Advance Wars 2',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,'romaine lettuce','Advance Wars Under Fire',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,'artificial sweetener','Advance Wars: Days of Ruin',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,'pears','Advance Wars: Dual Strike',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,'apple pie spice','Advanced Tactical Fighters',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,'red chile powder','AdvenChewers',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,'cornmeal','Advent Rising',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,'lemon juice','Advent Shadow',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,'basil','Adventure Beaks',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,'mayonnaise','AdVenture Capitalist!',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,'chickpeas','Adventure Christmas',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,'Cappuccino Latte','Adventure Craft',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,'rice vinegar','Adventure Era',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,'peaches','Adventure in the Tower of Flight',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,'bean sprouts','Adventure Inlay',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,'spaghetti squash','Adventure Inlay Safari',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,'Tabasco sauce','Adventure Island',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,'succotash','Adventure Island: The Beginning',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,'cider','ADventure Lib',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,'curry powder','Adventure Park',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,'almond paste','Adventure Pinball: Forgotten Island',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,'cremini mushrooms','Adventure Time Game Wizard - Draw Your Own Adventure Time Games',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,'baking soda','Adventure Time Puzzle Quest',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,'dill','Adventure Time: Explore the Dungeon Because I DON''T KNOW!',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,'cactus','Adventure Time: Finn and Jake Investigations',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,'bay leaves','Adventure Time: Hey Ice King! Why''d You Steal Our Carbage?!',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,'swordfish','Adventure Time: The Secret of the Nameless Kingdom',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,'dried leeks','Adventure Town',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,'allspice','Adventure: Collector''s Edition (Volume 1)',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,'soybeans','The Adventures of Cookie & Cream',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,'tortillas','Adventures of Cookies & Cream',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,'cocoa powder','The Adventures of Lomax',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,'passion fruit','Adventures of Mana',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,'rice paper','Adventures of Marshal Marshmallow',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,'sweet chili sauce','Adventures Of Pip',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,'chicken','Adventures of Poco Eco - Lost Sounds',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,'bananas','Adventures of Robinson Crusoe',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,'catfish','Adventures To Go',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,'blue cheese','Adventurezator: When Pigs Fly',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,'kumquats','Aedis Eclipse',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,'steak','Aegis of Earth: Protonovus Assault',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,'poultry seasoning','Aeon Avenger',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,'couscous','Aeon Flux',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,'cilantro','AER',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,'corn syrup','AereA',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,'Kahlua','Aerial Strike: Low Altitude - High Stakes',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,'white chocolate','Aero Dancing: Featuring Blue Impulse',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,'potato chips','Aero Elite: Combat Academy',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,'asiago cheese','Aero Fighters Assault',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,'prawns','Aero Gauge',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,'won ton skins','Aero the Acro-Bat',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,'guavas','Aero Vacation',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,'radishes','Aero''s Quest',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,'pheasants','Aero-Cross',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,'fennel seeds','Aeronauts',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,'pico de gallo','AeroTaxi',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,'octopus','Aerowings',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,'pomegranates','Aerowings 2: Airstike',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,'gouda','Aerox',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,'lobsters','AeternoBlade',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,'tofu','Aethereus',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,'eggs','Affliction',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,'anchovy paste','Affordable Space Adventures',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,'ancho chile peppers','African Safari Trophy Hunter',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,'plantains','Afrika',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,'sunflower seeds','Afro Samurai',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,'flax seed','Afro Samurai 2',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,'rhubarb','After Burner Climax',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,'clams','After Reset RPG',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,'salmon','After the End: Forsaken Destiny',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,'jack cheese','Afterburner',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,'anchovies','Afterfall Dirty Arena',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,'five-spice powder','Afterfall: Insanity',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,'condensed milk','Afterfall: Reconquest',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,'sardines','Afterlife',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,'lamb','Afterpulse',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,'vinegar','AfterZoom',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,'water chestnuts','AG Drive',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,'spinach','Again: Eye of Providence',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,'black beans','Against All Odds',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,'andouille sausage','Agarest: Generations of War 2',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,'canola oil','Agarest: Generations of War Zero',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,'raisins','Agatha Christie: And Then There Were None',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,'chard','Agatha Christie: Dead Man''s Folly',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,'tartar sauce','Agatha Christie: Evil Under the Sun',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,'hamburger','Agatha Christie: Murder on the Orient Express',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,'potatoes','Agatha Christie: The A.B.C. Murders',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,'honeydew melons','Age of Blood',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,'pistachios','Age of Booty',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,'leeks','Age of Booty: Tactics',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,'blueberries','Age of Conan: Hyborian Adventures',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,'curry leaves','Age of Conan: Rise of the Godslayer',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,'baguette','Age of Conquest IV',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,'sage','Age of Empires',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,'spearmint','Age of Empires 2: Age of Kings',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,'cinnamon','Age of Empires 2: The Age of Kings',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,'chestnuts','Age of Empires 2: The Conquerors',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,'berries','Age of Empires II Gold',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,'rosemary','Age of Empires II: Age of Kings',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,'bourbon','Age of Empires II: The Conquerors',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,'cabbage','Age of Empires III',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,'pickles','Age of Empires III: Complete Collection',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,'balsamic vinegar','Age of Empires III: The Asian Dynasties',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,'grouper','Age of Empires III: The WarChiefs',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,'pineapples','Age of Empires: Castle Siege',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,'snap peas','Age of Empires: Mythologies',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,'Irish cream liqueur','Age of Empires: Rise of Rome',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,'cannellini beans','Age of Enigma',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,'flounder','Age of Enigma: The Secret of the Sixth Ghost',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,'peanut butter','Age of Explorers - A Planet H game from HISTORY',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,'pine nuts','Age of Fear: The Undead King',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,'venison','Age Of Fury 3D',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,'amaretto','Age of Heroes: Conquest',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,'tomato paste','Age of Immortals',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,'bacon grease','Age of Monsters - Rock Paper Scissors',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,'grapes','Age of Mythology',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,'cauliflower','Age of Mythology: The Titans',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,'quail','Age of Oblivion',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,'cloves','Age of Pirates 2: City of Abandoned Ships',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,'hazelnuts','Age of Pirates: Captain Blood',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,'horseradish','Age of Pirates: Caribbean Tales',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,'thyme','Age of Rifles',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,'pasta','Age of Sail',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,'brazil nuts','Age of Sail II: Privateer''s Bounty',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,'cheddar cheese','Age of Tesla',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,'margarine','Age of Titans',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,'grits','Age of Warriors: The Frozen Elantra',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,'Romano cheese','Age of Wind 3',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,'red beans','Age of Wonders',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,'parsley','Age of Wonders 2',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,'olive oil','Age of Wonders 3',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,'apple butter','Age of Wonders II',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,'beef','Age of Wonders: Shadow Magic',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,'okra','Age of Wulin - Legend of the Nine Scrolls',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,'marshmallows','Age of Wushu',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,'acorn squash','Age of Wushu Dynasty',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,'bean sauce','Age of Zombies',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,'bard','Age of Zombies (Vita)',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,'mustard','Age of Zombies: Brothers in Arms',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,'split peas','Agent',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,'peas','Agent A: A puzzle in disguise',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,'curry paste','Agent Alice',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,'date sugar','Agent Aliens',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,'corn flour','Agent Armstrong',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,'mascarpone','Agent Awesome',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,'crayfish','Agent Dash',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,'celery seeds','Agent, Run!',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,'pumpkin seeds','Agents of Mayhem',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,'sherry','Agents of Storm',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,'tomato puree','Aggression - Reign over Europe',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,'chutney','Aggressive Inline',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,'adobo','Aggressor',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,'hash browns','Agile Warrior',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,'brussels sprouts','Agilewarrior',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,'beans','AGON - The Lost Sword of Toledo',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,'geese','Agony',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,'corn','AGRAV: Inertial Orbit',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,'creme fraiche','Agricola',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,'mozzarella','Agricola All Creatures Big and Small',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,'lemons','Agricultural Simulator - Historical Farming',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,'tea','AI War: Fleet Command',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,'Worcestershire sauce','Aida Arenas',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,'shitakes','AIKA Online',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,'aioli','Aiko Island',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,'halibut','Aimeroids',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,'portabella mushrooms','Aion: Assault on Balaurea',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,'borscht','Aion: Tower of Eternity',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,'wasabi','AIPD',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,'rum','Air Boarder 64',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,'oranges','Air Brawl',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,'tomatoes','Air Chix',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,'hoisin sauce','Air Combat',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,'chaurice sausage','Air Commander: World War II',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,'swiss cheese','Air Conflicts: Aces of World War II',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,'mushrooms','Air Conflicts: Pacific Carriers',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,'tomato sauce','Air Conflicts: Secret Wars',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,'onions','Air Conflicts: Secret Wars Ultimate Edition',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,'baking powder','Air Conflicts: Vietnam',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,'sazon','Air Conflicts: Vietnam Ultimate Edition',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,'jelly beans','Air Control',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,'chile peppers','Air Dash Online',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,'ketchup','Air Force Delta',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,'chocolate','Air Force Delta Strike',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,'eggplants','Air Guitar Warrior',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,'moo shu wrappers','Air Hockey Arcade XL',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,'cranberries','Air Hockey Touch',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,'provolone','Air Jump',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,'huckleberries','Air Lane',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,'oregano','Air Mail',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,'zest','Air Missions: Hind',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,'unsweetened chocolate','Air Patriots',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,'mint','Air Penguin',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,'brunoise','Air Strike 2',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,'ice cream','Air Supremacy',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,'arugula','Air Time',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,'breadcrumbs','Air Traffic Chaos',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,'scallops','Air Viking',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,'turtle','Air Warrior II',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,'pea beans','AiRace Speed',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,'red pepper flakes','AiRace: Tunnel',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,'macaroni','AirAttack 2',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,'dumpling','AirAttack HD',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,'chai','Airblade',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,'olives','AirBoy',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,'cookies','AirBuccaneers HD',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,'summer squash','Airburst Extreme',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,'brandy','Aircraft Carrier Simulator',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,'garlic','Airfight_Heroes',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,'cornstarch','Airfix Dogfighter',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,'focaccia','Airforce Delta Storm',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,'coconut oil','AirH0ckey',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,'vanilla','Airheads Jump',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,'Marsala','Airline Conqueror USA',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,'pumpkins','Airline Tycoon',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,'flour','Airline Tycoon II',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,'nectarines','Airline Tycoon: Free Flight',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,'vegemite','Airline World',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,'pink beans','AirMech',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,'watermelons','AirMech Arena',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,'sugar','Airplane Quiz',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,'marmalade','Airplane!',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,'kale','Airport City',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,'capers','Airport Firefighter Simulator',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,'sea cucumbers','Airport Mania 2',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,'grapefruits','Airport Mania: First Flight',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,'alligator','Airport Scanner',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,'crabs','Airport Terminal',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,'chili powder','Airport Tycoon 2',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,'rice wine','Airport Tycoon 3',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,'artichokes','Airscape: The Fall of Gravity',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,'sweet potatoes','Airship Bakery',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,'cucumbers','Airship Dragoon',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,'chipotle peppers','Airship Q',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,'maple syrup','Airships: Conquer the Skies',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,'cumin','Airspin',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,'snow peas','AirStrike 2',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,'cream of tartar','AirStrike 3D',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,'Havarti cheese','AirTycoon',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,'cayenne pepper','Akai Katana',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,'bouillon','Akai Kitana Shin',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,'fennel','Akane the Kunoichi',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,'ale','Akaneiro: Demon Hunters',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,'caviar','Akardo',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,'parsnips','Akiba''s Trip: Undead and Undressed',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,'pig''s feet','Akimi Village',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,'lima beans','Akuji the Heartless',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,'granola','Al''s Weather Rokies',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,'white beans','Aladdin',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,'barbecue sauce','Aladdin Magic Racer',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,'jicama','Aladin and the Enchanted Lamp',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,'broth','Alan Wake',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,'broccoli','Alan Wake: American Nightmare',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,'black-eyed peas','Alan Wake: The Signal',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,'red cabbage','Alan Wake: The Writer',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,'black olives','Alana Banana',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,'soymilk','Alaska',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,'powdered sugar','Albatross18: Realms of Pangya',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,null,'Albedo: Eyes from Outer Space',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,null,'Albert',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,null,'Albert & Otto',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,null,'Albino Lullaby',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,null,'Albion Online',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,null,'Alchemic Jousts',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,null,'Alchemist Wizard',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,null,'Alchemy',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,null,'Alcohol Frenzy',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,null,'Aldorlea Tales: 3 Stars of Destiny',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,null,'Alea Jacta Est',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,null,'Alekhine''s Gun',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,null,'Alex Kidd: The Lost Stars',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,null,'Alex Rider: Stormbreaker',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,null,'Alexander',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,null,'Alexander - The Heroes Hour',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,null,'Alexander the Great',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,null,'Alexandria Bloodshow',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,null,'Alexi Lalas International Soccer',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,null,'ALFA-ARKIV',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,null,'Alganon',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,null,'Alice',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,null,'Alice Adventure in Wonderland',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,null,'Alice in Bomberland',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,null,'Alice in Wonderland',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,null,'Alice in Wonderland: Puzzle Golf Adventures',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,null,'Alice Transforms',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,null,'Alice: Behind the Mirror',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,null,'Alice: Madness Returns',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,null,'Alien Breed',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,null,'Alien Breed 2: Assault',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,null,'Alien Breed 3: Descent',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,null,'Alien Breed Evolution',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,null,'Alien Breed iOS',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,null,'Alien Chaos 3D',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,null,'Alien Creeps TD',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,null,'Alien Crush Returns',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,null,'Alien Encounters: Attack on Xa-Tam',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,null,'Alien Family',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,null,'Alien Farm',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,null,'Alien Fear',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,null,'Alien Front Online',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,null,'Alien Hive',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,null,'Alien Hominid',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,null,'Alien Jihad',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,null,'Alien Logic',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,null,'Alien Monster Bowling League',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,null,'Alien Nations',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,null,'Alien Odyssey',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,null,'Alien Outcasts',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,null,'Alien Outpost',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,null,'Alien Path',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,null,'Alien Pinball with Ads',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,null,'Alien Rage',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,null,'Alien Rampage',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,null,'Alien Resurrection',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,null,'Alien Robot Monsters',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,null,'Alien Shooter TD',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,null,'Alien Sky',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,null,'Alien Snake from Outer Space',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,null,'Alien SpaceCraft',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,null,'Alien Spidy',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,null,'Alien Syndrome',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,null,'Alien Tribe 2',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,null,'Alien Trilogy',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,null,'Alien vs. Predator Pinball',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,null,'Alien vs. Predator: Evolution',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,null,'Alien Zombie Death',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,null,'Alien Zombie Megadeath',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,null,'Alien: Isolation',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,null,'Alienation',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,null,'Alienators: Evolution Continues',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,null,'AlienCab',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,null,'ALIENGINE',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,null,'AlienPanic',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,null,'Aliens Abducted',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,null,'Aliens Drive Me Crazy',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,null,'Aliens in the Attic',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,null,'Aliens Invade',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,null,'Aliens need Brains',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,null,'Aliens vs. Pinball',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,null,'Aliens Vs. Predator',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,null,'Aliens vs. Predator (2010)',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,null,'Aliens Vs. Predator 2',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,null,'Aliens vs. Predator Gold',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,null,'Aliens Vs. Predator: Extinction',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,null,'Aliens Vs. Predator: Extinction',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,null,'Aliens vs. Predator: Requiem',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,null,'Aliens: Colonial Marines',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,null,'Aliens: Infestation',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,null,'Alive 4-ever',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,null,'Alive 4-ever RETURNS',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,null,'All Aspect Warfare',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,null,'All Guns Blazing',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,null,'All Guns On Deck',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,null,'All My Gods',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,null,'All Points Bulletin',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,null,'All Star 5-A-Side Football',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,null,'All Star Baseball 2001',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,null,'All Star Cheer Squad',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,null,'All Star Cheer Squad 2',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,null,'All Star Cheerleader 2',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,null,'All Star Darts',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,null,'All Star Karate',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,null,'All Star Quarterback',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,null,'All Talk',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,null,'All Your Creeps',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,null,'All Zombies Must Die!',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,null,'All Zombies Must Die! Scorepocalypse',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,null,'All-in-One Kids Computer',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,null,'All-Pro Football 2K8',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,null,'All-Star Baseball ''99',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,null,'All-Star Baseball 2000',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,null,'All-Star Baseball 2002',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,null,'All-Star Baseball 2003',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,null,'All-Star Baseball 2004',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,null,'All-Star Basketball',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,null,'All-Star Tennis ''99',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,null,'AllAround',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,null,'Allegiance',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,null,'Alliance of Valiant Arms',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,null,'Allied General',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,null,'Allies in War',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,null,'Allods Online',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,null,'Allstar Heroes',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,null,'Almightree: The Last Dreamer',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,null,'Almighty: Fantasy Clicker Game!',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,null,'Almost a Hero',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,null,'Aloha Solitaire',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,null,'Alone',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,null,'Alone in the Dark',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,null,'Alone in the Dark (1992)',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,null,'Alone in the Dark 2',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,null,'Alone in the Dark 3',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,null,'Alone in the Dark: Illumination',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,null,'Alone in the Dark: Inferno',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,null,'Alone In The Dark: The New Nightmare',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,null,'Along the Edge',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,null,'ALPHA 9',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,null,'Alpha and Omega',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,null,'Alpha Black Zero',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,null,'Alpha Centauri',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,null,'Alpha Centauri: Alien Crossfire',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,null,'Alpha Kimori 1',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,null,'Alpha Polaris',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,null,'Alpha Prime',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,null,'Alpha Protocol',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,null,'Alpha Star',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,null,'Alpha Zero',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,null,'Alpha64',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,null,'Alphabear: Word Puzzle Game',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,null,'Alphabet Robots Mahjong',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,null,'Alphabet Robots Mahjong 2',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,null,'AlphaBounce',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,null,'Alphadia Genesis',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,null,'Alphadia Genesis 2',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,null,'Alphaman',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,null,'Altar of Gems',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,null,'Altec Lansing Speakers',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,null,'Alter Echo',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,null,'Alter Ego',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,null,'Alter World',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,null,'Altered Beast',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,null,'Alternate Routes',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,null,'AlternativA',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,null,'Alternative Press Expo',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,null,'Altis Gates',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,null,'Altitude0',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,null,'Alundra',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,null,'Alundra 2',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,null,'Alvin and the Chipmunks: Chipwrecked',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,null,'Alvin and the Chipmunks: The Squeakquel',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,null,'Alwa''s Awakening',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,null,'Always Sometimes Monsters',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,null,'Amateur Surgeon',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,null,'Amateur Surgeon 2',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,null,'Amateur Surgeon 3',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,null,'Amateur Surgeon 4',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,null,'Amazing Adventures The Forgotten Ruins',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,null,'Amazing Alex',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,null,'Amazing Ants',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,null,'Amazing Breaker',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,null,'Amazing Brick',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,null,'Amazing Car Wash',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,null,'Amazing Discoveries In Outer Space',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,null,'Amazing Frog?',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,null,'Amazing Island',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,null,'Amazing Loot Grind',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,null,'Amazing Ninja',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,null,'Amazing Princess Sarah',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,null,'Amazing Runner',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,null,'amazing snail racer',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,null,'Ambush - Tower Offense',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,null,'America',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,null,'America''s Army',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,null,'America''s Army 3',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,null,'America''s Army v2.6: Link-Up',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,null,'America''s Army: Proving Grounds',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,null,'America''s Army: Rise of a Soldier',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,null,'America''s Army: Special Forces (Firefight)',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,null,'America''s Army: Special Forces Overmatch',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,null,'America''s Army: True Soldiers',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,null,'America''s Next Top Model',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,null,'America''s Test Kitchen: Let''s Get Cooking',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,null,'American Civil War: 1863',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,null,'American Civil War: Gettysburg',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,null,'American Conquest: Divided Nation',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,null,'American Girl Kit',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,null,'American History Lux',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,null,'American Idol',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,null,'American McGee Presents Bad Day LA',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,null,'American McGee''s Alice',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,null,'American McGee''s Alice',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,null,'American McGee''s Grimm',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,null,'American Truck Simulator',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,null,'Amerzone',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,null,'Amerzone',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,null,'AMF Bowling Pinbusters!',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,null,'AMF Bowling World Lanes',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,null,'Amigo Pancho',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,null,'Amnesia Collection',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,null,'Amnesia: A Machine for Pigs',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,null,'Amnesia: The Dark Descent',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,null,'Amoebattle',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,null,'Among the Sleep',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,null,'Amped',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,null,'Amped 2',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,null,'Amped 3',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,null,'Amplitude',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,null,'Amplitude (2015)',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,null,'AMY',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,null,'An Alien with a Magnet',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,null,'Anachronox',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,null,'Anamorphine',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,null,'Anarchy Online',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,null,'Anarchy Reigns',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,null,'Anarchy Rulz',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,null,'Anarcute',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,null,'Ancestory',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,null,'Anchors in the Drift',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,null,'Ancient Battle: Alexander',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,null,'Ancient Battle: Hannibal',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,null,'Ancient Battle: Rome',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,null,'Ancient Legion',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,null,'Ancient Maze',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,null,'Ancient Puzzle',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,null,'Ancient Space',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,null,'Ancient Summoner',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,null,'Ancient Treasure',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,null,'Ancient War',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,null,'Ancient Wars: Sparta',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,null,'Ancients of Ooga',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,null,'And So It Was',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,null,'And Then There Were None',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,null,'And Yet It Moves',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,null,'And1 Streetball',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,null,'Andretti Racing',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,null,'Androkids',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,null,'Andromeda 9',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,null,'Andromium',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,null,'Andy Adventure',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,null,'Andy VS Tricky Crows',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,null,'Anew: The Distant Light',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,null,'Angel Adventures',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,null,'Angel Blade: Neo Tokyo Guardians',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,null,'Angel Devoid',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,null,'Angel Egg',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,null,'Angel Eyes',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,null,'Angel Poring',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,null,'Angel Stone',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,null,'Angelica Weaver: Catch Me When You Can',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,null,'Angels Online',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,null,'Angels with Scaly Wings',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,null,'AngerOfStick2',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,null,'AngerOfStick3: Invasion',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,null,'Angle of Attack',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,null,'Angler''s Club: Ultimate Bass Fishing 3D',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,null,'Angry Armies',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,null,'Angry Birds',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,null,'Angry Birds 2',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,null,'Angry Birds Blast',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,null,'Angry Birds Epic',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,null,'Angry Birds Go!',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,null,'Angry Birds Halloween',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,null,'Angry Birds POP! Bubble Shooter',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,null,'Angry Birds Rio',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,null,'Angry Birds Space',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,null,'Angry Birds Star Wars',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,null,'Angry Birds Star Wars II',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,null,'Angry Birds Stella',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,null,'Angry Birds Stella POP',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,null,'Angry Birds Transformers',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,null,'Angry Birds Trilogy',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,null,'Angry Birds: Seasons',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,null,'Angry Boars',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,null,'Angry Bombs!',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,null,'Angry Bulls',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,null,'Angry Bunnies',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,null,'Angry Fish: Deep Sea',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,null,'Angry Fly',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,null,'Angry Fly Adventure HD',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,null,'Angry Gran Run',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,null,'Angry King Kong',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,null,'Angry Monsters - Battle For Crystals',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,null,'Angry Ninjas',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,null,'Angry Pigs',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,null,'Angry Robot: Wall Street Titan',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,null,'Angry Turtle hero',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,null,'Angry Video Game Nerd Adventures',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,null,'Angry Zombie Launch',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,null,'Angry Zombies',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,null,'Anibus',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,null,'Anima: Gate of Memories',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,null,'Animal Boxing',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,null,'Animal Collections',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,null,'Animal Crossing',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,null,'Animal Crossing Calculator',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,null,'Animal Crossing Clock',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,null,'Animal Crossing: amiibo Festival',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,null,'Animal Crossing: City Folk',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,null,'Animal Crossing: Happy Home Designer',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,null,'Animal Crossing: New Leaf',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,null,'Animal Crossing: Wild World',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,null,'Animal Drivers',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,null,'Animal Gods',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,null,'Animal Kindom: Wildlife Expedition',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,null,'Animal Legends',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,null,'Animal Paradise',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,null,'Animal Planet: Emergency Vets',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,null,'Animal Planet: Vet Life',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,null,'Animal Pop',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,null,'Animals VS Monsters',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,null,'Animals vs. Mutants',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,null,'Animaniacs',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,null,'Animas Online',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,null,'Animation Throwdown: The Quest for Cards',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,null,'Anime Arena',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,null,'Anki DRIVE',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,null,'Anna',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,null,'Anna Kournikova Smash Court Tennis',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,null,'Anna''s Quest',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,null,'Annihilator 2 Ultra',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,null,'Anno 1602',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,null,'Anno 2070',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,null,'Anno 2205',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,null,'Anno 2205: Asteroid Miner',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,null,'Anno Online',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,null,'Anno: Build an Empire',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,null,'Annoying Orange: Kitchen Carnage Lite',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,null,'Anode',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,null,'Anodia 2',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,null,'Anomaly 2',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,null,'Anomaly Defenders',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,null,'Anomaly Korea',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,null,'Anomaly Warzone Earth HD',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,null,'Anomaly: Warzone Earth',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,null,'Anooki Jump',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,null,'Another Case Solved',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,null,'Another Code R: A Journey into Lost Memories',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,null,'Another Puzzle',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,null,'Another World - 20th Anniversary',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,null,'The Ant Bully',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,null,'Ant Nation',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,null,'Ant Raid',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,null,'Anthill',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,null,'Antigrav Racing Championship',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,null,'Antioch: Scarlet Bay',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,null,'Antipole',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,null,'AntiSquad',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,null,'Antistar 3D: Rising',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,null,'Antrim Escape 3',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,null,'Antyz',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,null,'Antz',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,null,'Antz Extreme Racing',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,null,'Any Landing',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,null,'Apache AH-64 Air Assault',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,null,'Apache Havoc',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,null,'Apache Longbow',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,null,'Apache: Air Assault',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,null,'APB Vendetta',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,null,'APB: Reloaded',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,null,'Ape Escape',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,null,'Ape Escape 2',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,null,'Ape Escape 3',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,null,'Ape Escape Academy',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,null,'Ape Escape: On The Loose',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,null,'Ape Escape: Pumped & Primed',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,null,'Apeiron',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,null,'ApeShot!',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,null,'Apex',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,null,'Apoc Wars',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,null,'Apocalypse',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,null,'Apocalypse Max: Better Dead Than Undead',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,null,'Apocalyptica',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,null,'Apollo 72',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,null,'Apollo Justice: Ace Attorney',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,null,'Apollo Null',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,null,'Aporkalypse: Chapter Two',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,null,'Apotheon',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,null,'APOX: Legend',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,null,'Apparatus',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,null,'Apple Craze',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,null,'Apple Dash',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,null,'Apple Shooting',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,null,'Apples to Apples',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,null,'AQUA - Naval Warfare',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,null,'Aqua Aqua',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,null,'Aqua Globs HD',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,null,'Aqua Kitty - Milk Mine Defender',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,null,'Aqua Mania',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,null,'Aqua Moto Racing Utopia',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,null,'Aqua Teen Hunger Force Zombie Ninja Pro-Am',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,null,'aquadot!red',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,null,'AquaDude',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,null,'Aquanox',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,null,'Aquanox 2: Revelation',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,null,'AquaPazza',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,null,'Aquaria',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,null,'Aquaria',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,null,'Aquatic Adventure',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,null,'Aquatic Tales',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,null,'AR Defender 2',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,null,'Ar Nosurge: Ode to an Unborn Star',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,null,'AR Suite',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,null,'Ar tonelico 2: Melody of Metafalica',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,null,'Ar Tonelico II',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,null,'Ar Tonelico Qoga: Knell of Ar Ciel',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,null,'Ar Tonelico: Melody of Elemia',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,null,'AR-K',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,null,'Arachnophilia HD',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,null,'Aragami',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,null,'Aralon: Forge and Flame',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,null,'Aralon: Sword and Shadow HD',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,null,'ARC Continuum',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,null,'Arc Rise Fantasia',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,null,'ARC Squadron',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,null,'Arc the Lad',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,null,'Arc The Lad Collection',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,null,'Arc the Lad: End of Darkness',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,null,'Arc The Lad: Twilight of the Spirits',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,null,'Arc War',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,null,'Arcade Addict',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,null,'Arcade Hits: Outlaws of the Lost Dynasty',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,null,'Arcade Mah Jongg',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,null,'Arcade Shooter: Illvelo',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,null,'Arcade Shooting Gallery',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,null,'Arcade Zone',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,null,'Arcana Heart',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,null,'Arcana Heart 3',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,null,'Arcana Heart 3: LOVE MAX!!!!!',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,null,'Arcana Kira',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,null,'Arcane Chronicles',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,null,'Arcane Empires',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,null,'Arcane Hearts',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,null,'Arcane Knight',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,null,'Arcane Legends',null,null);
Insert into produse (ELECTRONICS,CLOTHES,FOOT_WEAR,FOOD,GAMES,BOOKS,COLORS) values (null,null,null,null,'Arcane Saga',null,null);
/
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
-- =============================================
-- Authors: Buza Mădălina-Gabriela, Anghelina Elena
-- Updated on Week 10-16 April 2017
-- Context: Populating database with random relevant entries
-- =============================================

DECLARE
v_product_id  INTEGER := 1;
v_name VARCHAR2(100);
BEGIN
        ---------INSERT ELECTRONICS--------------

        for i in 1..9
        loop
                FOR j IN (SELECT ELECTRONICS FROM PRODUSE)
                LOOP
                      IF(j.ELECTRONICS IS NOT NULL)
                      THEN
                            INSERT INTO PRODUCTS(PRODUCT_ID,CATEGORY_ID,NAME,COMPANY_ID) VALUES (v_product_id,1,j.ELECTRONICS,i);
                            v_product_id := v_product_id + 1;
                      END IF;
                END LOOP;

        end loop;

        ----------INSERT CLOTHES------------
        v_product_id := v_product_id + 1;

        FOR i IN 10..13
        LOOP

                FOR j IN (SELECT CLOTHES FROM PRODUSE)
                LOOP

                  FOR k IN (SELECT COLORS FROM PRODUSE)
                  LOOP

                      v_name := '';
                      IF(j.CLOTHES IS NOT NULL AND k.COLORS IS NOT NULL)
                      THEN
                             v_name := v_name || k.COLORS || ' ' || j.CLOTHES;
                             INSERT INTO PRODUCTS(PRODUCT_ID,CATEGORY_ID,NAME,COMPANY_ID) VALUES (v_product_id,2,v_name,i);
                             v_product_id := v_product_id + 1;
                      END IF;

                  END LOOP;
                END LOOP;
         END LOOP;

        --------INSERT FOOT WEAR---------
         v_product_id := v_product_id + 1;

        FOR i IN 14..16
        LOOP

                FOR j IN (SELECT FOOT_WEAR FROM PRODUSE)
                LOOP

                  FOR k IN (SELECT COLORS FROM PRODUSE)
                  LOOP

                      v_name := '';
                      IF(j.FOOT_WEAR IS NOT NULL AND k.COLORS IS NOT NULL)
                      THEN
                             v_name := v_name || k.COLORS || ' ' || j.FOOT_WEAR;
                             INSERT INTO PRODUCTS(PRODUCT_ID,CATEGORY_ID,NAME,COMPANY_ID) VALUES (v_product_id,3,v_name,i);
                             v_product_id := v_product_id + 1;
                      END IF;

                    END LOOP;
                END LOOP;
         END LOOP;

        ------------INSERT FOOD--------------
        v_product_id := v_product_id + 1;

        FOR i IN 17..22
        LOOP
                FOR j IN (SELECT FOOD FROM PRODUSE)
                LOOP
                      IF(j.FOOD IS NOT NULL)
                      THEN
                             INSERT INTO PRODUCTS(PRODUCT_ID,CATEGORY_ID,NAME,COMPANY_ID) VALUES (v_product_id,4,j.FOOD,i);
                             v_product_id := v_product_id + 1;
                      END IF;
                END LOOP;
         END LOOP;

        ----------INSERT GAMES-------
        v_product_id := v_product_id + 1;

        FOR i IN 23..26
        LOOP
                FOR j IN (SELECT GAMES FROM PRODUSE)
                LOOP
                      IF(j.GAMES IS NOT NULL)
                      THEN
                             INSERT INTO PRODUCTS(PRODUCT_ID,CATEGORY_ID,NAME,COMPANY_ID) VALUES (v_product_id,5,j.GAMES,i);
                             v_product_id := v_product_id + 1;
                      END IF;
                END LOOP;
         END LOOP;


        --------INSERT IN EDUCATION---------
         v_product_id := v_product_id + 1;

        FOR i IN 29..33
        LOOP
                FOR j IN (SELECT BOOKS FROM PRODUSE)
                LOOP
                      IF(j.BOOKS IS NOT NULL)
                      THEN
                             INSERT INTO PRODUCTS(PRODUCT_ID,CATEGORY_ID,NAME,COMPANY_ID) VALUES (v_product_id,3,j.BOOKS,i);
                             v_product_id := v_product_id + 1;
                      END IF;
                END LOOP;
         END LOOP;
END;
/
-- =============================================
-- Authors: Anghelina Elena, Buza Mădălina-Gabriela
-- Create date: Week 10-16 April 2017
-- Context: Working with plsql functions from PHP
-- =============================================

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
-- =============================================
-- Author: Bulbuc-Aioanei Elisa
-- Create date: Week 10-16 April 2017
-- Context: Working with plsql packages from PHP
-- =============================================

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
/
-- =============================================
-- Authors: Harabula Adrian
-- Create date: Week 17-23 April 2017, vacanta Pasti
-- Context: Cleans helper tables persoane and produse
-- =============================================

DROP TABLE PERSOANE CASCADE CONSTRAINTS;
DROP TABLE PRODUSE CASCADE CONSTRAINTS;

-- INSERT INTO USERS VALUES (6,'adrian','adrian','adrian.harabula@gmail.com');
-- INSERT INTO USERS VALUES (7,'elisa','elis47','elisa.aioanei@yahoo.com ');
-- INSERT INTO USERS VALUES (8,'elena','elena','anghelinaelena96@gmail.com ');
