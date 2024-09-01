<?
    $preprocess = function (TargetPreprocessContext $c) {
        $c->activate_module('role-info-db');
        
        $c->run_macro('title', 'set', 'Einstieg');

        $c->activate_module('sql-js-inline');
    };
?>

<? $process = function(Target $target) { ?>

<p>
    Wie können große Datenmengen verwaltet werden, so dass Daten leicht...
</p>
<ul>
    <li><strong>auffindbar</strong> (<code>SELECT</code><em>able</em>),</li>
    <li><strong>hinzufügbar</strong> (<code>INSERT</code><em>able</em>)</li>
    <li><strong>veränderbar</strong> (<code>UPDATE</code><em>able</em>)</li>
    <li><strong>löschbar</strong> (<code>DELETE</code><em>able</em>)</li>    
</ul>
<p>
    ...sind? Im Folgenden soll diese Frage anhand des folgenden Beispiels diskutiert werden:
</p>
<div class="alert alert-info">
    <em>„In einem Online-Buchhändler für Bücher sind Kunden registriert sowie Bücher gelistet. Jeder Kund/in hat einen Warenkorb, in welchen er/sie Bücher legen kann.“</em>
</div>
<p>
    Als eine sehr grundlegende Art der Struktur kommen Tabellen in Frage. Aber auch hier ist nicht klar, wie genau diese Tabellen aufgebaut sein sollen. Verschiedene Entwürfe sind denkbar, und sie haben Auswirkungen auf verschiedene Aspekte:
</p>
<ul>
    <li>Benötigter <strong>Speicherplatz</strong></li>
    <li>Benötigte <strong>Zeit</strong> zum Auffinden, Hinzufügen, Einfügen, Löschen</li>
    <li><strong>Korrektheit</strong> und <strong>Konsistenz</strong> der Daten</li>
</ul>

<? ex_start('Daten organisieren'); ?>
<p>
    Tue dich mit einem Partner/in zusammen. Es gibt zwei Rollen A und B. Bearbeitet zusammen die <a href="./res/partnerarbeit.pdf">drei Aufträge</a>. 
</p>
<? ex_end(); ?>

<p>
    Betrachte nun die folgenden beiden Entwürfe, welche wir anschließend vergleichen und diskutieren. 
</p>

<? $db_id = sql_js_inline_init_db_var(__DIR__ . '/../res/dbs/onlineshop-minimal.sql'); ?>


<? nav_h(2, 'Entwurf 1'); ?>
<? ob_start(); ?>
        SELECT kunde.vorname, kunde.nachname, kunde.gebdatum, buch.isbn, buch.titel, buch.autor, buch.preis, buch.genre, warenkorb.anzahl
        FROM kunde, warenkorb, buch
        WHERE kunde.kundennr = warenkorb.kundennr AND
              warenkorb.isbn = buch.isbn
<? $sql = ob_get_clean(); ?>
<? sql_js_inline_exec_and_print($db_id, $sql, title: '<strong><em>warenkorb</em></strong>'); ?>



<? nav_h(2, 'Entwurf 2'); ?>
<div class="d-flex" style="column-gap: 30px; flex-wrap: wrap;">
    <? ob_start(); ?>
        SELECT * from kunde
    <? $sql = ob_get_clean(); ?>
    <? sql_js_inline_exec_and_print($db_id, $sql, title: '<strong><em>kunde</em></strong>'); ?>
    
    <? ob_start(); ?>
        SELECT * from warenkorb
    <? $sql = ob_get_clean(); ?>
    <? sql_js_inline_exec_and_print($db_id, $sql, title: '<strong><em>warenkorb</em></strong>'); ?>
    
    <? ob_start(); ?>
        SELECT * from buch
    <? $sql = ob_get_clean(); ?>
    <? sql_js_inline_exec_and_print($db_id, $sql, title: '<strong><em>buch</em></strong>'); ?>
</div>



<!-- <div id="vorschlag1" class="d-inline-flex gap-3 flex-wrap justify-content-around"></div>
<ul>
    <li>Vorteil: Enthält alle Daten in einer Tabelle (→ übersichtlich)</li>
    <li>
        Nachteile:
        <ul>
            <li><dfn>Speicherintensiv</dfn>: Daten werden mehrfach gespeichert</li>
            <li><dfn>Inkonsistenzen</dfn> leichter möglich: Es gibt keinen „single source of truth“ (SSOT), da manchmal die gedoppelten Datensätze nicht genau übereinstimmen. Heißt es nun „Herr der Ringe“ oder „Der Herr der Ringe“? → uneindeutig</li>
        </ul>
    </li>
</ul> -->


<!-- <p>
    Drei Tabellen.
</p>
<div id="vorschlag2" class="d-inline-flex gap-3 flex-wrap justify-content-around"></div>
<ul>
    <li>
        Vorteil: <strong>Keine Redudanzen</strong>
    </li>
    <li>
        Nachteile:
        <ul>
            <li>Verknüpfung der Tabellen notwendig: Die Daten aus verschiedenen Tabellen müssen zunächst zusammengeführt werden.</li>
        </ul>
    </li>
</ul> -->



<? }; ?>