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

<? $db_id_online_shop = sql_js_inline_init_db_var(__DIR__ . '/../../res/dbs/onlineshop.sql'); ?>
<? $db_id_fahrschule = sql_js_inline_init_db_var(__DIR__ . '/../../res/dbs/fahrschule.sql'); ?>

<p>
    Alle Aufgaben beziehen sich auf die Datenbanken <em>fahrschule</em> und <em>onlineshop</em> und können mit dem <a href="https://eskuel.de/browser/">SQL-Browser</a> gelöst werden.
</p>


<? ex_start(open: false); ?>
Verwende die Datenbank <em>fahrschule</em>.
<p class="lead">
    „Die Anzahl aller Schüler/innen“
</p>
<? ex_hint(); ?>
<p>
    Verwende <code>COUNT</code>.
</p>
<p>
    Erwartetes Ergebnis:
</p>
<? ob_start(); ?>
SELECT COUNT(*) AS anzahl
FROM   fahrschueler
<? $sql = ob_get_clean(); ?>
<? sql_js_inline_exec_and_print($db_id_fahrschule, $sql); ?>
<? ex_sol(); ?>
<? source_start(); echo $sql; source_end(); ?>
<? ex_end(); ?>



<? ex_start(open: false); ?>
Verwende die Datenbank <em>fahrschule</em>.
<p class="lead">
    „Die mittlere Anzahl der Fahrstunden (arithmetisches Mittel), welche die Schüler/innen absolviert haben“
</p>
<? ex_hint(); ?>
<p>
    Verwende <code>AVG</code>.
</p>
<p>
    Erwartetes Ergebnis:
</p>
<? ob_start(); ?>
SELECT AVG(anz_fahrstunden) AS mittlere_anzahl
FROM   fahrschueler
<? $sql = ob_get_clean(); ?>
<? sql_js_inline_exec_and_print($db_id_fahrschule, $sql); ?>
<? ex_sol(); ?>
<? source_start(); echo $sql; source_end(); ?>
<? ex_end(); ?>


<? ex_start(open: false); ?>
Verwende die Datenbank <em>fahrschule</em>.
<p class="lead">
    „Häufigkeitsverteilung der Anzahl der Fahrstunden, die ein Schüler absolviert hat, sortiert nach der Anzahl der Fahrstunden“
</p>
<p>
    Z.B.: 16 Schüler haben 20 Fahrstunden absolviert, 12 Schüler haben 21 Fahrstunden absolviert, usw.
</p>
<? ex_hint(); ?>
<p>
    <em>Tipp: Verwende <code>GROUP BY</code>, um die Schüler nach Fahrstundenanzahlen zu gruppieren. Verwende dann <code>COUNT(*)</code>, um innerhalb jeder Gruppe zu zählen.</em>
</p>
<p>
    Erwartetes Ergebnis:
</p>
<? ob_start(); ?>
SELECT anz_fahrstunden, COUNT(*) AS haeufigkeit
FROM   fahrschueler
GROUP BY anz_fahrstunden
ORDER BY anz_fahrstunden
<? $sql = ob_get_clean(); ?>
<? sql_js_inline_exec_and_print($db_id_fahrschule, $sql); ?>
<? ex_sol(); ?>
<? source_start(); echo $sql; source_end(); ?>
<? ex_end(); ?>


<? ex_start(title: 'Schwierig!', open: false); ?>
Verwende die Datenbank <em>fahrschule</em>.
<p class="lead">
    „Vornamen und Nachnamen der Fahrlehrer, sowie die Anzahl der Schüler, die jede/r Fahrlehrer/in unterrichtet hat, sortiert nach der Schülerzahl“
</p>
<? ex_hint(); ?>
<p>
    Gehe in drei Schritten vor.
</p>
<ol>
    <li>Verwende einen Join, um alle Fahrschüler mit ihren zugehörigen Fahrlehrern zu verbinden.</li>
    <li>Verwende <code>GROUP BY</code>, um nach Fahrlehrern zu gruppieren.</li>
    <li>Zähle innerhalb jeder Gruppe (also pro Fahrlehrer) die Schüler mit <code>COUNT</code></li>
</ol>
<p>
    Sortiere abschließend nach der Schülerzahl.
</p>
<p>
    Erwartetes Ergebnis:
</p>
<? ob_start(); ?>
SELECT   fl.vorname, fl.nachname, COUNT(*) AS anzahl_schueler
FROM     fahrschueler AS fs,
         fahrlehrer   AS fl
WHERE    fs.fl_kuerzel = fl.kuerzel     -- JOIN-Bedingung
GROUP BY fl.vorname, fl.nachname
ORDER BY anzahl_schueler
<? $sql = ob_get_clean(); ?>
<? sql_js_inline_exec_and_print($db_id_fahrschule, $sql); ?>
<? ex_sol(); ?>
<? source_start(); echo $sql; source_end(); ?>
<? ex_end(); ?>




<? ex_start(title: 'Schwierig!', open: false); ?>
Verwende die Datenbank <em>fahrschule</em>.
<p class="lead">
    „Vornamen und Nachnamen der Fahrlehrer, sowie die Fahrstunden, die jede/r Fahrlehrer/in gegeben hat, absteigend sortiert nach der Stundenzahl“
</p>
<? ex_hint(); ?>
<p>
    Gehe in drei Schritten vor.
</p>
<ol>
    <li>Verwende einen Join, um alle Fahrschüler mit ihren zugehörigen Fahrlehrern zu verbinden.</li>
    <li>Verwende <code>GROUP BY</code>, um nach Fahrlehrern zu gruppieren.</li>
    <li>Summiere innerhalb jeder Gruppe (also pro Fahrlehrer) die Fahrstunden der Schüler mit <code>SUM</code></li>
</ol>
<p>
    Sortiere abschließend nach der Stundenzahl.
</p>
<p>
    Erwartetes Ergebnis:
</p>
<? ob_start(); ?>
SELECT   fl.vorname, fl.nachname, SUM(anz_fahrstunden) AS erteilte_fahrstunden
FROM     fahrschueler AS fs,
         fahrlehrer AS fl
WHERE    fs.fl_kuerzel = fl.kuerzel     -- JOIN-Bedingung
GROUP BY fl.vorname, fl.nachname
ORDER BY erteilte_fahrstunden DESC
<? $sql = ob_get_clean(); ?>
<? sql_js_inline_exec_and_print($db_id_fahrschule, $sql); ?>
<? ex_sol(); ?>
<? source_start(); echo $sql; source_end(); ?>
<? ex_end(); ?>



<? ex_start(title: 'Schwierig!', open: false); ?>
Verwende die Datenbank <em>onlineshop</em>.
<p class="lead">
    „Kundenummern, Vornamen und Nachnamen der Kunden, sowie die Anzahl der <em>verschiedenen</em> Bücher, die im jeweiligen Warenkorb liegt, aufsteigend sortiert nach der Bücherzahl“
</p>
<? ex_hint(); ?>
<p>
    Gehe in drei Schritten vor.
</p>
<ol>
    <li>Verwende einen Join, um alle Kunden mit ihren Warenkorb-Bestellungen zu verbinden.</li>
    <li>Verwende <code>GROUP BY</code>, um nach Kundennr, Kunden-Vorname und Kunden-Nachname zu gruppieren.</li>
    <li>Zähle innerhalb jeder Gruppe (also pro Kunde) die Anzahl der Bestellungen via <code>COUNT</code></li>
</ol>
<p>
    Sortiere abschließend nach der Stundenzahl.
</p>
<p>
    Erwartetes Ergebnis:
</p>
<? ob_start(); ?>
SELECT k.kundennr, k.vorname, k.nachname,
       COUNT(*) AS anzahl_verschiedene_buecher
FROM   kunde AS k, warenkorb AS wk
WHERE  k.kundennr = wk.kundennr
GROUP BY k.kundennr, k.vorname, k.nachname
ORDER BY anzahl_buecher
<? $sql = ob_get_clean(); ?>
<? sql_js_inline_exec_and_print($db_id_online_shop, $sql); ?>
<? ex_sol(); ?>
<? source_start(); echo $sql; source_end(); ?>
<? ex_end(); ?>



<? ex_start(title: 'Schwierig!', open: false); ?>
Verwende die Datenbank <em>onlineshop</em>.
<p class="lead">
    „Kundenummern, Vornamen und Nachnamen der Kunden, sowie die Anzahl aller bestellten Bücher, die im jeweiligen Warenkorb liegt, mit dazugehörigem Gesamtpreis, aufsteigend sortiert nach der Kundennr.“
</p>
<? ex_hint(); ?>
<p>
    Gehe in vier Schritten vor.
</p>
<ol>
    <li>Verwende zwei Joins, um alle Kunden mit ihren Warenkorb-Bestellungen und Büchern zu verbinden.</li>
    <li>Verwende <code>GROUP BY</code>, um nach Kundennr, Kunden-Vorname und Kunden-Nachname zu gruppieren.</li>
    <li>Summiere innerhalb jeder Gruppe (also pro Kunde) die Anzahl der Bücher via <code>SUM</code></li>
    <li>Summiere innerhalb jeder Gruppe (also pro Kunde) die Preise der Bücher via <code>SUM</code>. Berechne dazu für jede Bestellung zunächst die neue Spalte „Anzahl * Preis“, und summiere über diese neu berechnete Spalte.</li>
</ol>
<p>
    Sortiere abschließend nach der Stundenzahl.
</p>
<p>
    Erwartetes Ergebnis:
</p>
<? ob_start(); ?>
SELECT k.kundennr, k.vorname, k.nachname,
       SUM(wk.anzahl)           AS anzahl_buecher, -- Hier werden alle Anzahlen der einzelnen Bestellungen summiert
       SUM(wk.anzahl * b.preis) AS gesamtpreis     -- Hier wird summiert ueber eine dynamisch berechnete Spalte
FROM   kunde AS k,
       warenkorb AS wk,
       buch AS b
WHERE  k.kundennr = wk.kundennr                    -- Join-Bedingung 1
  AND  wk.isbn = b.isbn                            -- Join-Bedingung 2
GROUP BY k.kundennr, k.vorname, k.nachname
ORDER BY k.kundennr
<? $sql = ob_get_clean(); ?>
<? sql_js_inline_exec_and_print($db_id_online_shop, $sql); ?>
<? //ex_sol(); ?>
<? //source_start(); echo $sql; source_end(); ?>
<? //ex_sol_end(); ?>
<? ex_end(); ?>




<? html_h(2, 'Weitere Aufgaben'); ?>
<ul>
    <li><a href="https://www.inf-schule.de/datenbanksysteme/gbuch/aggregation/uebungen">https://www.inf-schule.de/datenbanksysteme/gbuch/aggregation/uebungen</a></li>
    <li><a href="https://sqlzoo.net/wiki/SUM_and_COUNT">https://sqlzoo.net/wiki/SUM_and_COUNT</a></li>
</ul>


<? }; ?>