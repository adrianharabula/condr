INSERT INTO PRODUCTS VALUES (1,'049000042351, 0 49000 04235 1','Cola-Cola','A carbonated soft drink produced by The Coca-Cola Company. Originally intended as a patent medicine.','https://upload.wikimedia.org/wikipedia/commons/thumb/2/2c/Flasche_Coca-Cola_0%2C2_Liter.jpg/220px-Flasche_Coca-Cola_0%2C2_Liter.jpg',50,4,1,SYSTIMESTAMP,SYSTIMESTAMP,SYSTIMESTAMP);
INSERT INTO PRODUCTS VALUES (2,'015400014229, 0 15400 01422 9','Jeans','Jeans are pants, a type of garment, typically made from denim or dungaree cloth. Often the term "jeans" refers to a particular style of pants, called "blue jeans," ','http://www.forever21.com/images/5_detail_330/00251077-02.jpg',50,2,2,SYSTIMESTAMP,SYSTIMESTAMP,SYSTIMESTAMP);
INSERT INTO PRODUCTS VALUES (3,'803211926547, 8 03211 92654 7','The iPhone 6 and iPhone 6 Plus are smartphones designed and marketed by Apple Inc.','https://9to5mac.files.wordpress.com/2014/09/iphone6-select-2014.png?w=782',50,1,3,SYSTIMESTAMP,SYSTIMESTAMP,SYSTIMESTAMP);

INSERT INTO COMPANIE VALUES (1,'Coca-Cola Company','The Coca-Cola Company is the worlds leading owner and marketer of nonalcoholic beverage brands and the worlds largest manufacturer, distributor and marketer of concentrates and syrups used to produce nonalcoholic beverages.',85,SYSTIMESTAMP,SYSTIMESTAMP);
INSERT INTO COMPANIE VALUES (2,'Levis','Anyone can make a pair of blue jeans, but Levi Strauss & Co. made the first blue jean –– in 1873. And we draw upon our heritage to continually reinvent the blue jean for generation after generation. ',90,SYSTIMESTAMP,SYSTIMESTAMP);
INSERT INTO COMPANIE VALUES (3,'Apple','Apple Store employees are unique individuals whose varied talents and experiences bring value to the way they connect people with Apple. So whether you’re analytical or creative, tech savvy or a people person, the Apple Store provides an ideal opportunity to challenge yourself.',120,SYSTIMESTAMP,SYSTIMESTAMP);

--food
INSERT INTO CHARACTERISTICS VALUES (1,'taste',4,SYSTIMESTAMP,SYSTIMESTAMP);
INSERT INTO CHARACTERISTICS VALUES (2,'consistency',4,SYSTIMESTAMP,SYSTIMESTAMP);
INSERT INTO CHARACTERISTICS VALUES (3,'smell',4,SYSTIMESTAMP,SYSTIMESTAMP);

--clothes
INSERT INTO CHARACTERISTICS VALUES (4,'color',2,SYSTIMESTAMP,SYSTIMESTAMP);
INSERT INTO CHARACTERISTICS VALUES (5,'material',2,SYSTIMESTAMP,SYSTIMESTAMP);
INSERT INTO CHARACTERISTICS VALUES (6,'size',2,SYSTIMESTAMP,SYSTIMESTAMP);

--electronics
INSERT INTO CHARACTERISTICS VALUES (7,'dimension',1,SYSTIMESTAMP,SYSTIMESTAMP);
INSERT INTO CHARACTERISTICS VALUES (8,'quality',1,SYSTIMESTAMP,SYSTIMESTAMP);
INSERT INTO CHARACTERISTICS VALUES (9,'color',1,SYSTIMESTAMP,SYSTIMESTAMP);

--food
INSERT INTO CHARACTERIZABLES VALUES(1,1,'App\Product','odorless','3',SYSTIMESTAMP,SYSTIMESTAMP);
INSERT INTO CHARACTERIZABLES VALUES(2,2,'App\Product','liquidate','5',SYSTIMESTAMP,SYSTIMESTAMP);
INSERT INTO CHARACTERIZABLES VALUES(3,3,'App\Product','good','8',SYSTIMESTAMP,SYSTIMESTAMP);

--clothes
INSERT INTO CHARACTERIZABLES VALUES(4,4,'App\Product','blue','7',SYSTIMESTAMP,SYSTIMESTAMP);
INSERT INTO CHARACTERIZABLES VALUES(5,5,'App\Product','textile','10',SYSTIMESTAMP,SYSTIMESTAMP);
INSERT INTO CHARACTERIZABLES VALUES(6,6,'App\Product','38','12',SYSTIMESTAMP,SYSTIMESTAMP);

--electronics
INSERT INTO CHARACTERIZABLES VALUES(7,7,'App\Product','large','25',SYSTIMESTAMP,SYSTIMESTAMP);
INSERT INTO CHARACTERIZABLES VALUES(8,8,'App\Product','high','22',SYSTIMESTAMP,SYSTIMESTAMP);
INSERT INTO CHARACTERIZABLES VALUES(9,9,'App\Product','white','13',SYSTIMESTAMP,SYSTIMESTAMP);

--food
INSERT INTO CARACTERIZABIL VALUES('Coca-Cola','taste','odorless');
INSERT INTO CARACTERIZABIL VALUES('Coca-Cola','consistency','liquidate');
INSERT INTO CARACTERIZABIL VALUES('Coca-Cola','smell','good');

--clothes
INSERT INTO CARACTERIZABIL VALUES('Jeans','color','blue');
INSERT INTO CARACTERIZABIL VALUES('Jeans','material','textile');
INSERT INTO CARACTERIZABIL VALUES('Jeans','size','38');

--electronics
INSERT INTO CARACTERIZABIL VALUES('Iphone 6','dimension','large');
INSERT INTO CARACTERIZABIL VALUES('Iphone 6','quality','high');
INSERT INTO CARACTERIZABIL VALUES('Iphone 6','color','white');