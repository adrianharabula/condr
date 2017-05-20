# ConDr (Consumer Decision Maker) [![StackShare](https://img.shields.io/badge/tech-stack-0690fa.svg?style=flat)](https://stackshare.io/adrianharabula/condr)

## Enunţ

 > E necesar un instrument Web pentru a oferi asistenta consumatorilor privind deciziile de achitie a unor bunuri/servicii intr-un mod etic. Sistemul va putea stoca si folosi reguli simple de forma "daca are loc <conditie> atunci <actiune>" -- in cazul nostru, de pilda "nu voi cumpara/folosi produsul P deoarece include/utilizeaza substanta S" ori "voi alege produsul P in loc de Q pe baza motivului M (e.g., mobilitate scazuta ori pret nejustificat de ridicat)" -- in vederea oferirii de sugestii referitoare la resurse de interes personal sau la nivel de grup. Aplicatia va oferi, de asemenea, statistici privind cele mai (in)dezirabile resurse, utilizatorii cu cele mai multe/putine restrictii, persoanele avand preferinte similare etc. Ca inspiratie, a se studia Buycott. Bonus: recurgerea la microservicii Web.

## Cuprins
 * documentaţia bazei de date disponibilă [aici](https://docs.condr.me/dbschema/)
 * tema PSGBD, etapa II, conectare la baza de date cu PHP şi oci8, queriuri pe baza de date, cod sursă [aici](https://github.com/adrianharabula/condr/tree/master/psgbd/etapa2)
 
## Instrucțiuni instalare
Aplicaţia nu are nevoie decât de php (am folosit versiunile 7.0, 7.1, 7.1.5) şi librăria oci instalată pentru a funcţiona. Un mediu deja configurat pentru toată aplicaţia, care include şi o bază de date oracle gata configurată este aici [docker.compose.yml](https://github.com/adrianharabula/condr/blob/master/docker-compose.yml). Instrucţiunile detaliate pentru instalare sunt [aici](https://github.com/adrianharabula/condr/wiki/Install-instructions).

## Etapa 2
Codul vechi de la etapa 2, deşi nu îl mai folosim pentru că am trecut pe MVC/Laravel se poate găsi [aici](https://github.com/adrianharabula/condr/tree/ffc29cd1f516ae4ef7075bd65262f22bfde8f2ee/psgbd/etapa2).

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
 
