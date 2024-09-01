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

<? $db_id_fahrschule = sql_js_inline_init_db_var(__DIR__ . '/../../res/dbs/fahrschule.sql'); ?>
<? $db_id_online_shop = sql_js_inline_init_db_var(__DIR__ . '/../../res/dbs/onlineshop.sql'); ?>
<? $db_id_obst_gemuese = sql_js_inline_init_db_var(__DIR__ . '/../../res/dbs/obst-gemuese.sql'); ?>

<p>
    Alle Aufgaben beziehen sich auf die Datenbanken <em>fahrschule</em>, <em>onlineshop</em> und <em>obst-gemuese</em> und können mit dem <a href="https://eskuel.de/browser/">SQL-Browser</a> gelöst werden.
</p>


<? ex_start('Warm-up', open: false); ?>
Verwende die Datenbank <em>fahrschule</em>.
<p class="lead">
    „Alle Informationen über alle Lehrer/innen“
</p>
<? ex_hint(); ?>
<p>
    Erwartetes Ergebnis:
</p>
<? ob_start(); ?>
SELECT *
FROM   fahrlehrer
<? $sql = ob_get_clean(); ?>
<? sql_js_inline_exec_and_print($db_id_fahrschule, $sql); ?>
<? ex_sol(); ?>
<? source_start(); echo $sql; source_end(); ?>
<? ex_end(); ?>



<? ex_start('Projektion', open: false); ?>
Verwende die Datenbank <em>fahrschule</em>.
<p class="lead">
    „Alle Kürzel und Nachnamen aller Lehrer/innen“
</p>
<? ex_hint(); ?>
<p>
    Erwartetes Ergebnis:
</p>
<? ob_start(); ?>
SELECT kuerzel, nachname   -- Zwei Spalten projizieren
FROM   fahrlehrer
<? $sql = ob_get_clean(); ?>
<? sql_js_inline_exec_and_print($db_id_fahrschule, $sql); ?>
<? ex_sol(); ?>
<? source_start(); echo $sql; source_end(); ?>
<? ex_end(); ?>


<? ex_start('Selektion: Bedingungen, a)', open: false); ?>
Verwende die Datenbank <em>fahrschule</em>.
<p class="lead">
    „Alle Informationen über alle Lehrer/innen, deren Nachname mit 'Mu' beginnt“
</p>
<? ex_hint(); ?>
<p>
    Erwartetes Ergebnis:
</p>
<? ob_start(); ?>
SELECT *
FROM   fahrlehrer
WHERE  nachname LIKE 'Mu%'
<? $sql = ob_get_clean(); ?>
<? sql_js_inline_exec_and_print($db_id_fahrschule, $sql); ?>
<? ex_sol(); ?>
<? source_start(); echo $sql; source_end(); ?>
<? ex_end(); ?>


<? ex_start('Selektion: Bedingungen, b)', open: false); ?>
Verwende die Datenbank <em>fahrschule</em>.
<p class="lead">
    „Die Vornamen, Nachnamen und Geburtstage jener Schüler/innen, die vor dem 1.1.2000 Geburtstag haben“
</p>
<? ex_hint(); ?>
<p>
    Erwartetes Ergebnis:
</p>
<? ob_start(); ?>
SELECT vorname, nachname, gebdatum
FROM   fahrschueler
WHERE  gebdatum < '2000-01-01'
<? $sql = ob_get_clean(); ?>
<? sql_js_inline_exec_and_print($db_id_fahrschule, $sql); ?>
<? ex_sol(); ?>
<? source_start(); echo $sql; source_end(); ?>
<? ex_end(); ?>


<? ex_start('Selektion: Bedingungen, c)', open: false); ?>
Verwende die Datenbank <em>fahrschule</em>.
<p class="lead">
    „Die Vornamen, Nachnamen und das Fahrlehrerkürzel jener Schüler/innen, die den Fahrlehrer mit Kürzel 'Schm' oder 'Pet' haben“
</p>
<? ex_hint(); ?>
<p>
    Erwartetes Ergebnis:
</p>
<? ob_start(); ?>
SELECT vorname, nachname, fl_kuerzel
FROM   fahrschueler
WHERE  fl_kuerzel = 'Schm' OR
       fl_kuerzel = 'Pet'
<? $sql = ob_get_clean(); ?>
<? sql_js_inline_exec_and_print($db_id_fahrschule, $sql); ?>
<? ex_sol(); ?>
<? source_start(); echo $sql; source_end(); ?>
<? ex_end(); ?>


<? ex_start('Selektion: Bedingungen, d)', open: false); ?>
Verwende die Datenbank <em>onlineshop</em>.
<p class="lead">
    „Die ISBN-Nummern, Titel und Preise jener Bücher, die dem Genre 'Fantasy' zugeordnet werden und weniger als 20€ kosten.“
</p>
<? ex_hint(); ?>
<p>
    Erwartetes Ergebnis:
</p>
<? ob_start(); ?>
SELECT isbn, titel, preis
FROM   buch
WHERE  genre = 'Fantasy' AND
       preis < 20
<? $sql = ob_get_clean(); ?>
<? sql_js_inline_exec_and_print($db_id_online_shop, $sql); ?>
<? ex_sol(); ?>
<? source_start(); echo $sql; source_end(); ?>
<? ex_end(); ?>


<? ex_start('Selektion: Bedingungen, e)', open: false); ?>
Verwende die Datenbank <em>onlineshop</em>.
<p class="lead">
    „Die ISBN-Nummern und Titel von Fantasybüchern unter 20€ sowie Thrillerbüchern unter 15€.“
</p>
<? ex_hint(); ?>
<p>
    Erwartetes Ergebnis:
</p>
<? ob_start(); ?>
SELECT isbn, titel, preis
FROM   buch
WHERE  (genre = 'Fantasy'  AND preis < 20) OR
       (genre = 'Thriller' AND preis < 15)
<? $sql = ob_get_clean(); ?>
<? sql_js_inline_exec_and_print($db_id_online_shop, $sql); ?>
<? ex_sol(); ?>
<? source_start(); echo $sql; source_end(); ?>
<? ex_end(); ?>


<? ex_start('Vereinigung', open: false); ?>
Verwende die Datenbank <em>obst-gemuese</em>.
<p class="lead">
    „Name und Herkunft aller Obst- und Gemüsesorten“
</p>
<? ex_hint(); ?>
<p>
    Erwartetes Ergebnis:
</p>
<? ob_start(); ?>
SELECT name, herkunft FROM obst
UNION
SELECT name, herkunft FROM gemuese
<? $sql = ob_get_clean(); ?>
<? sql_js_inline_exec_and_print($db_id_obst_gemuese, $sql); ?>
<? ex_sol(); ?>
<? source_start(); echo $sql; source_end(); ?>
<? ex_end(); ?>


<? ex_start('Spalten-Umbenennung', open: false); ?>
Verwende die Datenbank <em>fahrschule</em>.
<p class="lead">
    „Vornamen, Nachnamen und Geburtsdaten aller Fahrschüler/innen, wobei die Geburtsdaten-Spalte mit 'geburtsdatum' betitelt sein soll“
</p>
<? ex_hint(); ?>
<p>
    Erwartetes Ergebnis:
</p>
<? ob_start(); ?>
SELECT vorname,
       nachname,
       gebdatum AS geburtsdatum
FROM   fahrschueler
<? $sql = ob_get_clean(); ?>
<? sql_js_inline_exec_and_print($db_id_fahrschule, $sql); ?>
<? ex_sol(); ?>
<? source_start(); echo $sql; source_end(); ?>
<? ex_end(); ?>


<? ex_start('Sortieren, a)', open: false); ?>
Verwende die Datenbank <em>onlineshop</em>.
<p class="lead">
    „ISBN, Titel und Preise aller Fantasy-Bücher, aufsteigend sortiert nach Preis“
</p>
<? ex_hint(); ?>
<p>
    Erwartetes Ergebnis:
</p>
<? ob_start(); ?>
SELECT   isbn, titel, preis
FROM     buch
ORDER BY preis
<? $sql = ob_get_clean(); ?>
<? sql_js_inline_exec_and_print($db_id_online_shop, $sql); ?>
<? ex_sol(); ?>
<? source_start(); echo $sql; source_end(); ?>
<? ex_end(); ?>


<? ex_start('Sortieren, b)', open: false); ?>
Verwende die Datenbank <em>fahrschule</em>.
<p class="lead">
    „Nachname, Vorname und die Fahrstundenanzahl aller Fahrschüler; sortiert werden soll absteigend nach der Fahrstundenanzahl sowie bei Gleichheit nach Nachname und Vorname“
</p>
<? ex_hint(); ?>
<p>
    Erwartetes Ergebnis:
</p>
<? ob_start(); ?>
SELECT   nachname, vorname, anz_fahrstunden
FROM     fahrschueler
ORDER BY anz_fahrstunden DESC, nachname, vorname
<? $sql = ob_get_clean(); ?>
<? sql_js_inline_exec_and_print($db_id_fahrschule, $sql); ?>
<? ex_sol(); ?>
<? source_start(); echo $sql; source_end(); ?>
<? ex_end(); ?>



<? ex_start('Multimenge vs. Menge', open: false); ?>
Verwende die Datenbank <em>obst-gemuese</em>.
<p class="lead">
    „Die Herkunftsländer aller Obstsorten“
</p>
<em>Es soll kein Land doppelt genannt werden.</em>
<? ex_hint(); ?>
<p>
    Erwartetes Ergebnis:
</p>
<? ob_start(); ?>
SELECT DISTINCT herkunft
FROM            obst
<? $sql = ob_get_clean(); ?>
<? sql_js_inline_exec_and_print($db_id_obst_gemuese, $sql); ?>
<? ex_sol(); ?>
<? source_start(); echo $sql; source_end(); ?>
<? ex_end(); ?>



<? }; ?>