<?
    $preprocess = function (TargetPreprocessContext $c) {
        $c->activate_module('role-info-db');
        
        $c->run_macro('title', 'set', 'Abfragen: Verbünde („Joins“)');

        $c->add_subpage('aufgaben');

        $c->update_module_config('source', [
            'language' => 'sql',
            'line_numbers' => false,
        ]);
    };
?>

<? $process = function(Target $target) { ?>

<p>
    Bei einer <dfn>Join-Abfrage</dfn> werden zwei Tabellen miteinander verbunden (englisch: „join“). Bei einer Join-Abfrage müssen zwei Informationen gegeben werden: 
</p>
<ol>
    <li>
        <strong>Welche beiden Tabellen</strong> sollen verbunden werden?
    </li>
    <li>
        <strong>Welche Fremdschlüssel↔Primärschlüssel</strong> verbinden diese beiden Tabellen? („<dfn>Join-Bedingung</dfn>“)

    </li>
</ol>

<p>
    Sehr gute Erklärungen findest du auf <a href="https://www.inf-schule.de/datenbanksysteme/gbuch/datenverknuepfen/konzept_sql_join">inf-schule.de</a> oder auf <a href="https://www.tinohempel.de/info/info/datenbank/operation.htm">Tino Hempels Internetseiten</a>.
</p>

<? html_h(2, 'Verschiedene Schreibweisen'); ?>
<p>
    Bitte lass dich nicht davon verwirren, dass SQL bietet an dieser Stelle verschiedene Schreibweisen anbieten. Die folgenden Schreibweisen sind alle gleichwertig (= liefern also exakt dieselbe Tabelle).
</p>

<? acc_start(); ?>
<? acc_item_start('Schreibweise 1: <strong>Kartesisches Produkt</strong> und <strong>WHERE-Klausel</strong>'); ?>
<? ob_start(); ?>
SELECT *
FROM   fahrschueler,
       fahrlehrer
WHERE  fahrschueler.fl_kuerzel = fahrlehrer.kuerzel     -- JOIN-Bedingung
<? $sql = ob_get_clean(); ?>
<? source_start(); echo $sql; source_end(); ?>
<? acc_item_end(); ?>
<? acc_item_start('Schreibweise 2: <strong>JOIN-Schlüsselwort</strong>'); ?>
<? ob_start(); ?>
SELECT *
FROM   fahrschueler JOIN fahrlehrer 
       ON fahrschueler.fl_kuerzel = fahrlehrer.kuerzel  -- JOIN-Bedingung
<? $sql = ob_get_clean(); ?>
<? source_start(); echo $sql; source_end(); ?>
<? acc_item_end(); ?>
<? acc_end(); ?>

<? }; ?>