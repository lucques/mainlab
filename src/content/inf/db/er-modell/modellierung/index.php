<?
    $preprocess = function (TargetPreprocessContext $c) {
        $c->activate_module('role-info-db');
        
        $c->run_macro('title', 'set', plain: 'Modellierung', number_of_dependent_parent_titles: 1);
    
        $c->add_subpage('aufgaben');
    };
?>

<? $process = function(Target $target) { ?>

<p>
    Das Entity-Relationship-Modell (ER) bietet die Möglichkeit, <dfn>Beziehungstypen</dfn> (<em>relationships</em>) zwischen <dfn>Entitätstypen</dfn> (<em>entities</em>) zu visualisieren. Sowohl Entitätstypen als auch Beziehungstypen können <dfn>Attribute</dfn> enthalten. Jeder Entitätstyp sollte eine Menge von Attributen besitzen, die als Primärschlüssel gekennzeichnet sind (durch Unterstreichen).
</p>

<p>
    <dfn>Kardinalitäten</dfn> beschreiben die Anzahl der Beziehungen, die zwischen zwei Entitäten bestehen können. Mehr dazu bei den Beispielen.
</p>

<? acc_start(); ?>
<? acc_item_start('Beispiel: <strong>Fahrschule</strong>', variant: 'example'); ?>
<p>
    <img src="../res/er-modell-1.png" alt="" style="max-width:100%;">
</p>
<div class="clearfix">
    <div class="d-inline-flex float-end first-child">
        <table class="table first-child">
            <thead>
                <tr>
                    <th>Entitätstyp</th>
                    <th>Entität (konkretes Beispiel)</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Fahrlehrer</td>
                    <td>„Max Mustermann“</td>
                </tr>
                <tr>
                    <td>Fahrschüler</td>
                    <td>„Hans Schmidt“</td>
                </tr>
            </tbody>
            <thead>
                <tr>
                    <th>Beziehungstyp</th>
                    <th>Beziehung (konkretes Beispiel)</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>unterrichtet</td>
                    <td>„Max Mustermann unterrichtet Hans Schmidt“</td>
                </tr>
            </tbody>
        </table>
    </div>
    
    <p>
        Es gibt zwei Entitätstypen und einen Beziehungstyp.
    </p>
</div>
<p>
    Die beiden Kardinalitäten der Beziehung „unterrichtet“ lassen sich jeweils als ein Satz formulieren. 
</p>
<ul>
    <li><em>„Ein Fahrlehrer unterrichtet <strong>n</strong> (= beliebig viele) Fahrschüler.“</em></li>
    <li><em>„Ein Fahrschüler wird unterrichtet von <strong>1</strong> Fahrlehrer.“</em></li>
</ul>
<? acc_item_end(); ?>


<? acc_item_start('Beispiel: <strong>Online-Buchhändler</strong>', variant: 'example'); ?>
<p>
    <img src="../res/er-modell-2.png" alt="" style="max-width:100%;">
</p>
<div>
    <p>
        Es gibt zwei Entitätstypen und einen Beziehungstyp.
    </p>
    <div class="d-inline-flex">
        <table class="table">
            <thead>
                <tr>
                    <th>Entitätstyp</th>
                    <th>Entität (konkretes Beispiel)</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Kunde</td>
                    <td>„Max Mustermann“</td>
                </tr>
                <tr>
                    <td>Buch</td>
                    <td>„Der Alchimist von Paulo Coelho“</td>
                </tr>
            </tbody>
            <thead>
                <tr>
                    <th>Beziehungstyp</th>
                    <th>Beziehung (konkretes Beispiel)</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>legt in Warenkorb</td>
                    <td>„Max Mustermann legt in den Warenkorb 2 Exemplare von 'Der Alchimist' von Paulo Coelho“</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
<p>
    Die beiden Kardinalitäten der Beziehung „legt in Warenkorb“ lassen sich jeweils als ein Satz formulieren. 
</p>
<ul>
    <li><em>„Ein Kunde legt in den Warenkorb <strong>m</strong> (= beliebig viele) Bücher.“</em></li>
    <li><em>„Ein Buch wird in den Warenkorb gelegt von <strong>n</strong> (= beliebig viele) Kunden.“</em></li>
</ul>
<? acc_item_end(); ?>



<? acc_item_start('Beispiel: <strong>Soziales Netzwerk</strong> (Ausschnitt)', variant: 'example'); ?>
<p>
    <img src="../res/soziales_netzwerk_ausschnitt.svg" alt="" style="max-width:100%;">
</p>
<? acc_item_end(); ?>



<? acc_item_start('Beispiel: <strong>Bibliothek</strong> (Ausschnitt)', variant: 'example'); ?>
<p>
    <img src="../res/bibliothek.svg" alt="" style="max-width:100%;">
</p>
<? acc_item_end(); ?>
<? acc_end(); ?>

<? html_h(2, 'Weiteres Material') ?>
<ul>
    <li><a href="https://luo-darmstadt.de/wiki2/doku.php?id=start">Mini-Welten</a>, die modelliert werden können</li>
</ul>

<? }; ?>