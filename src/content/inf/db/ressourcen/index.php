<?
    $preprocess = function (TargetPreprocessContext $c) {
        $c->activate_module('role-info-db');
        
        $c->run_macro('title', 'set', 'Ressourcen');
    };
?>

<? $process = function(Target $target) { ?>

<table class="table">
    <thead>
        <tr>
            <th></th>
            <th>Ressource</th>
            <th>Beschreibung</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>1.</td>
            <td><a href="https://sql-island.informatik.uni-kl.de/">SQL Island</a></td>
            <td>Klasse Spiel zum Lernen von SQL</td>
        </tr>
        <tr>
            <td>2.</td>
            <td><a href="https://sqlzoo.net/wiki/SELECT_from_Nobel_Tutorial">SQLZoo: Nobelpreise</a></td>
            <td>Aufgaben für SELECT-Abfragen</td>
        </tr>
        <tr>
            <td>3.</td>
            <td><a href="https://sqlzoo.net/wiki/The_JOIN_operation">SQLZoo: Join-Abfragen</a></td>
            <td>Aufgaben für SELECT-Abfragen mit Joins</td>
        </tr>
        <tr>
            <td>4.</td>
            <td>
                <a href="https://sql.hauptquartier.eu/">Kommissar Smiths Abenteuer</a>
            </td>
            <td>Ein weiteres Textadventure</td>
        </tr>
        <tr>
            <td>5.</td>
            <td>
                <a href="https://luo-darmstadt.de/wiki2/doku.php?id=start">Mini-Welten zur ER-Modellierung</a>
            </td>
            <td></td>
        </tr>
        <tr>
            <td>5.</td>
            <td>
                <a href="https://tinohempel.de/info/info/datenbank/">Webseiten von Tino Hempel</a>
            </td>
            <td>Sehr umfangreiche Erklärungen zum gesamten Thema</td>
        </tr>
        <tr>
            <td>6.</td>
            <td>
                <a href="https://eskuel.de/">Eskuel Suite</a>
            </td>
            <td>Lern-Apps</td>
        </tr>
    </tbody>
</table>

<? }; ?>