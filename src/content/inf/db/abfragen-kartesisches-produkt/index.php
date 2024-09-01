<?
    $preprocess = function (TargetPreprocessContext $c) {
        $c->activate_module('role-info-db');
      
        $c->run_macro('title', 'set', plain: 'Abfragen: Kartesisches Produkt', plain_short: 'Abfragen: Kartes. Produkt');

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
        min-width:1000px;
        max-height: 100%;
    }
<? css_end(); ?>

<? $db_id_eisdiele = sql_js_inline_init_db_var(__DIR__ . '/../res/dbs/eisdiele.sql'); ?>

<p>
    Betrachte die folgende Eisdielen-Datenbank, welche eine Tabelle mit Eisbehältern und eine Tabelle mit Eissorten enthält.
</p>
<div class="d-flex gap-3">
    <? sql_js_inline_exec_and_print($db_id_eisdiele, 'SELECT * FROM behaelter', title: '<strong><em>behaelter</em></strong>'); ?>
    <? sql_js_inline_exec_and_print($db_id_eisdiele, 'SELECT * FROM sorte', title: '<strong><em>sorte</em></strong>'); ?>
</div>

<p>
    Indem mehrere Tabellen in der <code>FROM</code>-Klausel notiert werden, werden diese zeilenweise kombiniert: Es wird das sogenannte <dfn>kartesische Produkt</dfn> gebildet.
</p>

<?
    $sql = 'SELECT * FROM behaelter, sorte';
?>
<div class="clearfix">
    <div class="float-end">
        <? sql_js_inline_exec_and_print($db_id_eisdiele, $sql); ?>
    </div>
    <? source_start(); echo $sql; source_end(); ?>
</div>


<? acc_single_item_start('Spalten disambiguieren'); ?>
<p>
    Manchmal erhalten durch Bildungs des kartesischen Produkts zwei Spalten denselben Namen. Wir können sie unterscheiden (Fachbegriff: „disambiguieren“), indem wir mit <code>ursprungstabelle.spalte</code> angeben, aus welcher Tabelle die Spalte stammt. Die folgende Abfrage liefert bspw. alle Kombinationen aus Behältern und Sorten, die in einer Waffel serviert werden.
</p>
<? ob_start(); ?>
SELECT behaelter.name,
       sorte.name
FROM   behaelter, sorte
WHERE  behaelter.name LIKE '%waffel'
<? $sql = ob_get_clean(); ?>
<div class="clearfix">
    <div class="float-end">
        <? sql_js_inline_exec_and_print($db_id_eisdiele, $sql); ?>
    </div>
    <? source_start(); echo $sql; source_end(); ?>
</div>
<p>
    Beachte, dass wir dann auch die Spalten noch umbennen können. Die gleiche Anfrage, aber mit umbenannten Spalten, lautet wie folgt.
</p>
<? ob_start(); ?>
SELECT behaelter.name AS verpackung,
       sorte.name     AS kugel
FROM   behaelter, sorte
WHERE  verpackung LIKE '%waffel'
<? $sql = ob_get_clean(); ?>
<div class="clearfix">
    <div class="float-end">
        <? sql_js_inline_exec_and_print($db_id_eisdiele, $sql); ?>
    </div>
    <? source_start(); echo $sql; source_end(); ?>
</div>
<? acc_single_item_end(); ?>


<? acc_single_item_start('Tabellen mehrfach multiplizieren', open: false); ?>
<p>
    Es können auch Relationen mit sich selbst „multipliziert“ werden. Z.B. liefert die folgende Abfrage alle Eisbestellungen mit drei Kugeln. Beachte, dass hierfür auch die Tabellen umbenannt werden − schließlich müssen die drei Eiskugeln voneinander unterscheidbar sein. Jeder „Faktor“ erhält einen eigenen Namen und diese Umbenennung erfolgt ebenfalls mittels <code>AS</code>.
</p>
<? ob_start(); ?>
SELECT behaelter.name AS verpackung,
       sorte_1.name   AS kugel_1,
       sorte_2.name   AS kugel_2,
       sorte_3.name   AS kugel_3
FROM   behaelter,
       sorte AS sorte_1,
       sorte AS sorte_2,
       sorte AS sorte_3
<? $sql = ob_get_clean(); ?>
<div class="clearfix">
    <div class="float-end">
        <? sql_js_inline_exec_and_print($db_id_eisdiele, $sql); ?>
    </div>
    <? source_start(); echo $sql; source_end(); ?>
</div>
<? acc_single_item_end(); ?>


<? acc_single_item_start('Beispiel: Selektion und kartesisches Produkt', variant: 'example', open: false); ?>
<p>
    Nun könnte man diese Abfrage verfeinern, indem man z.B. alle Bestellungen selektiert, die mindestens eine Kugel „Vanille“ enthalten und in einer Waffel serviert werden:
</p>
<? ob_start(); ?>
SELECT behaelter.name AS verpackung,
       sorte_1.name   AS kugel_1,
       sorte_2.name   AS kugel_2,
       sorte_3.name   AS kugel_3
FROM   behaelter,
       sorte AS sorte_1,
       sorte AS sorte_2,
       sorte AS sorte_3
WHERE  (kugel_1 = 'Vanille'
        OR  kugel_2 = 'Vanille'
        OR  kugel_3 = 'Vanille')
       AND verpackung LIKE '%waffel'
<? $sql = ob_get_clean(); ?>
<div class="clearfix">
    <div class="float-end">
        <? sql_js_inline_exec_and_print($db_id_eisdiele, $sql); ?>
    </div>
    <? source_start(); echo $sql; source_end(); ?>
</div>
<? acc_single_item_end(); ?>



<? acc_single_item_start('Neue Spalten berechnen', open: false); ?>
<p>
    Es können sogar neue Spalten angelegt werden, deren Inhalt aus den Tabellendaten <strong>zeilenweise</strong> berechnet wird. Z.B. berechnet die folgende Anfrage noch den Preis für die gesamte Eisbestellung.
</p>
<? ob_start(); ?>
SELECT behaelter.name AS behaelter,
       sorte_1.name   AS kugel_1,
       sorte_2.name   AS kugel_2,
       behaelter.preis + sorte_1.preis + sorte_2.preis
         AS gesamtpreis
FROM   behaelter,
       sorte AS sorte_1,
       sorte AS sorte_2
ORDER BY gesamtpreis
<? $sql = ob_get_clean(); ?>
<div class="clearfix">
    <div class="float-end">
        <? sql_js_inline_exec_and_print($db_id_eisdiele, $sql); ?>
    </div>
    <? source_start(); echo $sql; source_end(); ?>
</div>
<? acc_single_item_end(); ?>


<? }; ?>