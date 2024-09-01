<?
    $preprocess = function (TargetPreprocessContext $c) {
        $c->activate_module('role-info-db');
        
        $c->run_macro('title', 'set', 'Abfragen: Aggregation');

        $c->add_subpage('aufgaben');
    };
?>

<? $process = function(Target $target) { ?>

<p>
    Manchmal möchte man Daten erfassen, die sich aus mehreren Tupel (= Zeilen) zusammensetzen, z.B. den durschnittlichen Preis der Bücher. Man sagt auch, dass mehrere Tupel aggregiert werden.
</p>
<p>
    Eine sehr gute Erklärung findest du auf <a href="https://www.inf-schule.de/datenbanksysteme/gbuch/aggregation/konzept_aggregation">inf-schule.de</a>.
</p>

<? html_h(2, 'Aggregatsfunktionen'); ?>
<table class="table">
    <thead>
        <tr>
            <th>Name</th>
            <th>Beispiel</th>
            <th>Bedeutung</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td><code>MIN</code></td>
            <td><code>MIN(preis)</code></td>
            <td>Nimmt das Minimum aller Werte der Spalte <code>preis</code></td>
        </tr>
        <tr>
            <td><code>MAX</code></td>
            <td><code>MAX(preis)</code></td>
            <td>Nimmt das Maximum aller Werte der Spalte <code>preis</code></td>
        </tr>
        <tr>
            <td><code>AVG</code></td>
            <td><code>AVG(preis)</code></td>
            <td>Nimmt das arithmethische Mittel aller Werte der Spalte <code>preis</code> (en. average: „durchschnittlich“)</td>
        </tr>
        <tr>
            <td><code>SUM</code></td>
            <td><code>SUM(preis)</code></td>
            <td>Nimmt die Summe aller Werte in der Spalte <code>preis</code></td>
        </tr>
        <tr>
            <td><code>COUNT</code></td>
            <td><code>COUNT(*)</code></td>
            <td>Zählt die Anzahl an Zeilen. <em>(für uns: bitte immer auf ganze Zeilen <code>*</code> anwenden)</em></td>
        </tr>

    </tbody>
</table>

<? }; ?>