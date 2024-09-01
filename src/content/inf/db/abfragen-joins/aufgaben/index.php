<?
    $preprocess = function (TargetPreprocessContext $c) {
        $c->activate_module('role-info-db');
        
        $c->run_macro('title', 'set', plain: 'Aufgaben', number_of_dependent_parent_titles: 1);

        $c->activate_module('sql-js-inline');

        $c->update_module_config('source', [
            'language' => 'sql',
            'line_numbers' => false,
        ]);
    };
?>

<? $process = function(Target $target) { ?>

<? css_start(); ?>
    #content main {
        min-width:1200px;
        max-height: 100%;
    }
<? css_end(); ?>

<? $db_id_online_shop = sql_js_inline_init_db_var(__DIR__ . '/../../res/dbs/onlineshop.sql'); ?>
<? $db_id_fahrschule = sql_js_inline_init_db_var(__DIR__ . '/../../res/dbs/fahrschule.sql'); ?>

<p>
    Alle Aufgaben beziehen sich auf die Datenbanken <em>fahrschule</em> und <em>onlineshop</em> und können mit dem <a href="https://eskuel.de/browser/">SQL-Browser</a> gelöst werden.
</p>

<? ex_start(open: false); ?>
Verwende die Datenbank <em>fahrschule</em>.
<p class="lead">
    „Alle Informationen zu den Schüler/innen, inkl. allen Informationen ihres jeweils zugeordneten Fahrlehrers“
</p>
<? ex_hint(); ?>
<p>
    Erwartetes Ergebnis:
</p>
<? ob_start(); ?>
SELECT *
FROM   fahrschueler AS fs,
       fahrlehrer   AS fl
WHERE  fs.fl_kuerzel = fl.kuerzel     -- JOIN-Bedingung
<? $sql = ob_get_clean(); ?>
<? sql_js_inline_exec_and_print($db_id_fahrschule, $sql); ?>
<? ex_sol(); ?>
<? source_start(); echo $sql; source_end(); ?>
<? ex_end(); ?>



<? ex_start(open: false); ?>
Verwende die Datenbank <em>fahrschule</em>.
<p class="lead">
    „Die Namen aller Schüler/innen, inkl. Vor- und Nachname ihres zugeordneten Fahrlehrers“
</p>
<? ex_hint(); ?>
<p>
    Erwartetes Ergebnis:
</p>
<? ob_start(); ?>
SELECT fs.vorname  AS schueler_vorname,
       fs.nachname AS schueler_nachname,
       fl.vorname  AS fahrlehrer_vorname,
       fl.nachname AS fahrlehrer_nachname
FROM   fahrschueler AS fs,
       fahrlehrer   AS fl
WHERE  fs.fl_kuerzel = fl.kuerzel     -- JOIN-Bedingung
<? $sql = ob_get_clean(); ?>
<? sql_js_inline_exec_and_print($db_id_fahrschule, $sql); ?>
<? ex_sol(); ?>
<? source_start(); echo $sql; source_end(); ?>
<? ex_end(); ?>



<? ex_start(open: false); ?>
Verwende die Datenbank <em>onlineshop</em>.
<p class="lead">
    „Die Vor- und Nachnamen der Kund/innen, die das Buch mit der ISBN 978-3-596-52008-3 im Warenkorb haben“
</p>
<? ex_hint(); ?>
<p>
    Erwartetes Ergebnis:
</p>
<? ob_start(); ?>
SELECT vorname, nachname
FROM   kunde, warenkorb
WHERE  kunde.kundennr = warenkorb.kundennr     -- JOIN-Bedingung
AND    warenkorb.isbn = '978-3-596-52008-3'
<? $sql = ob_get_clean(); ?>
<? sql_js_inline_exec_and_print($db_id_online_shop, $sql); ?>
<? ex_sol(); ?>
<? source_start(); echo $sql; source_end(); ?>
<? ex_end(); ?>


<? ex_start(open: false); ?>
Verwende die Datenbank <em>onlineshop</em>.
<p class="lead">
    „Buchtitel und Autornamen jener Bücher, die im Warenkorb von Kunde mit Kundennr. 2 liegen“
</p>
<? ex_hint(); ?>
<p>
    Erwartetes Ergebnis:
</p>
<? ob_start(); ?>
SELECT titel, autor
FROM   warenkorb, buch
WHERE  warenkorb.isbn = buch.isbn     -- JOIN-Bedingung
AND    warenkorb.kundennr = 2
<? $sql = ob_get_clean(); ?>
<? sql_js_inline_exec_and_print($db_id_online_shop, $sql); ?>
<? ex_sol(); ?>
<? source_start(); echo $sql; source_end(); ?>
<? ex_end(); ?>


<? ex_start(title: 'Schwierig!', open: false); ?>
Verwende die Datenbank <em>onlineshop</em>.
<p class="lead">
    „Vornamen und Nachnamen der Kunden, sowie Buchtitel und Autornamen aller im Warenkorb enthaltenen Bücher inkl. bestellter Anzahl, sortiert nach dem Nachnamen der Kund/innen“
</p>
<? ex_hint(); ?>
<p>
    Verwende zwei Joins:
</p>
<ul>
    <li><code>kunde</code> mit <code>warenkorb</code> joinen</li>
    <li><code>warenkorb</code> mit <code>buch</code> joinen</li>
</ul>
<p>
    Erwartetes Ergebnis:
</p>
<? ob_start(); ?>
SELECT k.vorname, k.nachname, b.titel, b.autor, wk.anzahl
FROM   kunde     AS k,
       warenkorb AS wk,
       buch      AS b
WHERE  k.kundennr = wk.kundennr     -- 1. JOIN-Bedingung
AND    wk.isbn = b.isbn             -- 2. JOIN-Bedingung
ORDER  BY k.nachname
<? $sql = ob_get_clean(); ?>
<? sql_js_inline_exec_and_print($db_id_online_shop, $sql); ?>
<? ex_sol(); ?>
<? source_start(); echo $sql; source_end(); ?>
<? ex_end(); ?>


<? html_h(2, 'Weitere Aufgaben'); ?>
<ul>
    <li><a href="https://www.inf-schule.de/datenbanksysteme/gbuch/datenverknuepfen/uebungen">https://www.inf-schule.de/datenbanksysteme/gbuch/datenverknuepfen/uebungen</a></li>
    <li><a href="https://sqlzoo.net/wiki/The_JOIN_operation">https://sqlzoo.net/wiki/The_JOIN_operation</a> (Besonderheit: Hier wird das Schlüsselwort <code>JOIN</code> verwendet − wir haben das kartes. Prod. + Join-Bedingung in der <code>WHERE</code>-Klausel verwendet. Es handelt sich aber nur um eine andere Schreibweise)</li>
</ul>



<? }; ?>