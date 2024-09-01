<?
    $preprocess = function (TargetPreprocessContext $c) {
        $c->activate_module('role-info-db');
        
        $c->run_macro('title', 'set', 'Rezept für Abfragen');

    };
?>

<? $process = function(Target $target) { ?>

<p>
    Beim Formulieren einer SQL-<code>SELECT</code>-Abfrage kann man sich an folgendem Flussdiagramm orientieren. Durchlaufe es entlang der Pfeile und du erhälst am Ende die fertige SQL-Abfrage.
</p>
<p>
    Der „Satzbau“ innerhalt einer <code>SELECT</code>-Abfrage nimmt einen anderen Weg, was aber einfach an der Beschaffenheit der englischen Sprache liegt! Diese wurde ursprünglich nicht für Datenbankanfragen „entwickelt“... 
</p>

<p>
    <img src="res/rezept.png" alt="" style="max-width:100%;">  
</p>


<ul>
    <li>
        <strong>Ergebnistabelle 1. Ordnung</strong>
        <ul>
            <li>Was sind die zugrunde liegenden Daten? (<code>FROM</code>)</li>
            <li>Wie filtere ich die relevanten  heraus? (<code>WHERE</code>)</li>
        </ul>
    </li>
    <li>
        <strong>Ergebnistablle 2. Ordnung (Aggregation)</strong> oder nicht?<br>
        <ul>
            <li>
                <strong>Aggregation</strong><br>
                <ul>
                    <li>
                        Gruppieren?
                        <ul>
                            <li>Soll die gesamte Tabelle zu einer einzigen Zeile zusammengefaltet werden? (kein <code>GROUP BY</code>)</li>
                            <li>Soll die gesamte Tabelle erst in Teiltabellen gruppiert werden, und jede Teiltabelle zu einer Zeile zusammengefaltet werden? (<code>GROUP BY</code>)</li>
                            <li>In der <code>SELECT</code>-Klausel dürfen nur auf Spalten angewandte Aggregatsfunktionen und durch <code>GROUP BY</code> gruppierende Spalten genannt werden</li>
                        </ul>
                    </li>
                    <li>
                        Sollen die Zeilen, die sich aus dem „Zusammenfalten“ ergeben haben, nochmals gefiltert werden? (<code>HAVING</code>)
                    </li>
                </ul>
            </li>
            <li>
                <strong>keine Aggregation</strong><br>
                <ul>
                    <li>In der <code>SELECT</code>-Klausel dürfen nur Spaltennamen vorkommen</li>
                </ul>
            </li>
        </ul>
    </li>
    <li>
        <strong>Nachbereitung</strong>
        <ul>
            <li>Soll sortiert werden? (<code>ORDER BY</code>)</li>
            <li>Multimenge (<code>SELECT</code>) oder Menge (<code>SELECT DISTINCT</code>) ?</li>
            <li>Zeilen begrenzen? (<code>LIMIT</code>)</li>
        </ul>
    </li>
</ul>

<? }; ?>