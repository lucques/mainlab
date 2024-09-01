<?
    $preprocess = function (TargetPreprocessContext $c) {
        $c->activate_module('role-info-db');
        
        $c->run_macro('title', 'set', 'ER-Modell');

        $c->add_subpage('modellierung');
        $c->add_subpage('ueberfuehrung');
    };
?>

<? $process = function(Target $target) { ?>

<p>
    Bisher haben wir uns für Anwendungsfälle direkt überlegt, welche Tabellen geeignet sind, um die auftretenden Daten zu erfassen. Dabei haben wir direkt über „Details“ wie passende Schlüssel, Verknüpfungstabellen etc. nachgedacht.
</p>

<p>
    Das ER-Modell wurde als Abstrakation entwickelt, um etwas Abstand von den Implementierungsdetails zu gewinnen und stattdessen den Sachverhalt mittels eines einfachen Diagramms zu erfassen. Das Vorgehen beim Design einer Datenbank geht vom <strong>Abstrakten</strong> (ER-Modell) ins <strong>Konkrete</strong> (Relationales Modell).
</p>

<p>
    <img src="res/ueberfuehrung.png" alt="" style="max-width:100%;">
</p>

<p>
    Diese Überführung kann systematisch erfolgen (später!). Zunächst schauen wir uns nun die Beschaffenheit von ER-Diagrammen an.  
</p>


<? }; ?>