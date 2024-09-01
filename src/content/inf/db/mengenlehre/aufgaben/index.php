<?
    $preprocess = function (TargetPreprocessContext $c) {
        $c->activate_module('role-info-db');
        
        $c->run_macro('title', 'set', plain: 'Aufgaben', number_of_dependent_parent_titles: 1);
    };
?>

<? $process = function(Target $target) { ?>


<? ex_start(); ?>
<img src="res/aufg_teilmenge_2.png" alt="" style="max-width:100%;">
<? ex_sol(); ?>
<a href="res/aufg_teilmenge_2_loesung.png">Link</a>
<? ex_end(); ?>

<? ex_start(); ?>
<img src="res/aufg_teilmenge.png" alt="" style="max-width:100%;">
<? ex_sol(); ?>
<a href="res/aufg_teilmenge_loesung.png">Link</a>
<? ex_end(); ?>

<? ex_start(); ?>
<img src="res/aufg_venn.png" alt="" style="max-width:100%;">
<? ex_end(); ?>

<? ex_start(); ?>
<p>
    Gib die folgenden Mengen in aufzählender Mengendarstellung an.
</p>
<img src="res/aufg1.png" alt="">
<? ex_sol(); ?>
<a href="res/aufg1_loesung.png">Link</a>
<? ex_end(); ?>

<? ex_start(); ?>
<p>
    Gib die folgenden Mengen in beschreibender Mengendarstellung an.
</p>
<img src="res/aufg2.png" alt="">
<? ex_sol(); ?>
<a href="res/aufg2_loesung.png">Link</a>
<? ex_end(); ?>


<? ex_start(); ?>
<p>
    Es sind die Mengen $A = \{2, 4, 6, 8\}$, $B = \{1, 2, 3, 5, 8\}$ und $C = \{2, 3, 5, 7\}$ gegeben.
</p>
<ol>
    <li><strong>Berechne</strong> die folgenden Terme, indem du die Mengen einsetzt und den Term vereinfachst. <strong>Gib</strong> den Term anschließend in aufzählender Darstellung <strong>an</strong>.</li>
    <li>
        <strong>Zeichne</strong> eine Venn-Diagramm für die Mengen $A$, $B$, $C$. <strong>Färbe</strong> den Bereich ein, der zu dem Term gehört.
    </li>
</ol>
<img src="res/aufg_venn_skizzieren.png" alt="" style="max-width:100%;">
<? ex_sol(); ?>
<a href="res/aufg_venn_skizzieren_loesung.png">Link</a>
<? ex_end(); ?>

<? ex_start(); ?>
<img src="res/aufg_menge_nach_venn.png" alt="" style="max-width:100%;">
<div class="clearfix">
    <p>
        Gib jeweils einen Term an, welcher der grauen Fläche im Mengendiagramm entspricht. Bps. für das erste Venn-Diagramm: $(X \cup Y) \setminus Z$.
    </p>
</div>
<? ex_sol(); ?>
<a href="res/aufg_menge_nach_venn_loesung.png">Link</a>
<? ex_end(); ?>


<? ex_start(); ?>
<p>
    Gehe die Rechengesetze durch. Überzeuge dich davon, dass sie stimmen.
</p>
<? ex_sol(); ?>
<a href="res/aufg_menge_nach_venn_loesung.png">Link</a>
<? ex_end(); ?>

<? }; ?>