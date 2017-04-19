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
                            COMMIT;
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
                             COMMIT;
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
                             COMMIT;
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
                             COMMIT;
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
                             COMMIT;
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
                             COMMIT;
                             v_product_id := v_product_id + 1;
                      END IF;
                END LOOP;
         END LOOP;
END;
