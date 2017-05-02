# Original requirement
__Etapa II__ (max 30 puncte, prezentabila doar in saptamana a 8a (cea de evaluare) [10-14 aprilie] - in cazul in care laboratorul vostru se suprapune cu un test din saptamana a 8a, scrieti-mi un email pentru a vedea cum reprogramam [alegeti-va un reprezentant al grupei, nu imi trimiteti fiecare dintre voi email]).
__Atentie__: pentru partea a doua, este obligatoriu ca datele sa aiba logica (datele generate random sa nu fie doar siruri random ci chiar prenume de persoane, nume de persoane sau sa contina adrese de email valide sau numere de telefon reale). In caz contrar, riscati ca profesorul de laborator sa va noteze cu 0 puncte pentru partea a doua.
 * Realizarea conexiunii dintr-o aplicatie stand-alone (Java/PHP etc).
 * Realizarea macar a unei functii/membru_proiect care sa faca calcule pe partea de server SGBD si sa demonstreze functionarea ei din UI (si aici nu ma refer la functii triviale care cauta ceva in baza de date: sa se vada necesitatea ei pe partea de server SGBD si ca nu ar merge la fel de bine daca ar fi implementata direct in aplicatie).
 * Propagarea erorilor din SGBD si afisarea lor intr-un mod corespunzator in aplicatie (vom testa si cu valori aiuristice).
 * Afisarea (in aplicatie) paginata a unuia dintre tabelele cu foarte multe date cu posibilitatea de filtrare a datelor.
 * Implementarea operatiilor Create/Read/Update/Delete (CRUD) din interfata aplicatiei pe macar una din tabele.
 * Demonstrarea unui caz in care se poate utiliza SQL injection si al unuia in care nu se poate face acest lucru (in cadrul aplicatiei).
 * Realizarea de pachete specifice pentru lucru cu anumite entitati (de exemplu puteti sa aveti un pachet user care sa permita inregistrarea / autentificarea / oferirea datelor sau editarea lor pentru un user - am vazut ca multi aveti useri ce se autentifica in sistem si mai puteti avea un pachet care sa interactioneze cu produsele pe care le vindeti sau cu alte concepte din aplicatie).

# Run Instructions

1. Set up [psgbd-etapa2](https://github.com/adrianharabula/condr/tree/master/database_design/psgbd-etapa2) folder as root www folder
2. Copy [__Config.php.example__](https://github.com/adrianharabula/condr/blob/master/database_design/psgbd-etapa2/Config/Config.php.example) to __Config.php__ and complete with correct credentials:

```
class Config {
    static $DB_HOST = 'localhost';
    static $DB_PORT = '1521';
    static $DB_USER = 'system';
    static $DB_PASS = 'oracle';
    static $DB_SID  = 'xe';
}
```

## Working code available online

A on-line version is available at [ii.condr.me](http://ii.condr.me).
For login use

```
user: elisa
pass: elis47
```

More code, scripts and samples [here](http://ii.condr.me/App).  

SQL code used is located in [SqlScripts](http://ii.condr.me/SqlScripts) folder.  
