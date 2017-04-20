# ConDr (Consumer Decision Maker) [![StackShare](https://img.shields.io/badge/tech-stack-0690fa.svg?style=flat)](https://stackshare.io/adrianharabula/condr)

## Enunţ

 > E necesar un instrument Web pentru a oferi asistenta consumatorilor privind deciziile de achitie a unor bunuri/servicii intr-un mod etic. Sistemul va putea stoca si folosi reguli simple de forma "daca are loc <conditie> atunci <actiune>" -- in cazul nostru, de pilda "nu voi cumpara/folosi produsul P deoarece include/utilizeaza substanta S" ori "voi alege produsul P in loc de Q pe baza motivului M (e.g., mobilitate scazuta ori pret nejustificat de ridicat)" -- in vederea oferirii de sugestii referitoare la resurse de interes personal sau la nivel de grup. Aplicatia va oferi, de asemenea, statistici privind cele mai (in)dezirabile resurse, utilizatorii cu cele mai multe/putine restrictii, persoanele avand preferinte similare etc. Ca inspiratie, a se studia Buycott. Bonus: recurgerea la microservicii Web.

## Cuprins
 * documentaţia disponibilă [aici](https://docs.condr.me/)
 * interfaţa HTML, accesibilă [aici](https://docs.condr.me/frontend/)
 * tema PSGBD, etapa I, documentaţie, structură şi script creeare bază date, cod sursă [aici](https://github.com/adrianharabula/condr/tree/master/database_design/psgbd-etapa1)
 * tema PSGBD, etapa II, conectare la baza de date cu PHP şi oci8, queriuri pe baza de date, cod sursă [aici](https://github.com/adrianharabula/condr/tree/master/database_design/psgbd-etapa2)
 
## Instrucțiuni instalare
Imediat după ce se face clone la repo:
 - adăugați cheia privată pentru deploy în _webhook/.ssh/id_rsa_
 - marcați script pull ca executabil `chmod +x webhook/scripts/pull.sh`
 - marcați script inițializare bd ca executabil `chmod +x database_design/psgbd-etapa2/SqlScripts/startup.sh`
 
Pentru pornire server:
 - `docker-compose up -d psgbd_etapa2`
 - Prima pornire populează baza de date cu scripturile din [SqlScripts](https://github.com/adrianharabula/condr/tree/master/database_design/psgbd-etapa2/SqlScripts)
 - Pentru reinițializare baza de date rulați `docker-compose stop && docker-compose rm -v && docker-compose build && docker-compose up -d psgbd_etapa2`

Pentru pornire webhook:
 - `docker-compose up -d psgbd_etapa2`, a se seta [IP:9000/hooks/pull](http://localhost:9000/hooks/pull) ca webhook din github/bitbucket/gitlab

### Resurse
 * https://www.programmableweb.com/category/ecommerce/api
 * https://en.wikipedia.org/wiki/Buycott.com
 * http://microservices.io/

## Echipa
Grupa B2, an univ. 2016-2017:
 * Bulbuc-Aioanei Elisa
 * Anghelina Elena
 * Buza Mădălina-Gabriela B2
 * Harabulă Adrian B2
 
