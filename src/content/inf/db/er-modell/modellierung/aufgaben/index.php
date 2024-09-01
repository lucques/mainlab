<?
    $preprocess = function (TargetPreprocessContext $c) {
        $c->activate_module('role-info-db');
                
        $c->run_macro('title', 'set', plain: 'Aufgaben', number_of_dependent_parent_titles: 2);
    };
?>

<? $process = function(Target $target) { ?>

<? ex_start(title: 'Schule', open: false); ?>
<p>
    <strong>Entwirf</strong> ein ER-Diagramm für die Verwaltung einer Schule. Folgende Aspekte (und auch nur diese) sollen berücksichtigt werden:
</p>
<ul>
    <li>Es gibt Schüler, Lehrer, Klassen, Kurse</li>
    <li>
        Diese stehen alle in den offensichtlichen Beziehungen zueinander. Folgende zusätzliche Rollen sollen aber auch modelliert werden:
        <ul>
            <li>Ein Schüler/in kann Klassensprecher/in einer Klasse sein.</li>
            <li>Ein Lehrer/in kann Klassenleiter/in einer Klasse sein.</li>
        </ul>
    </li>
</ul>
<? ex_sol(); ?>
<p>
    <img src="../../res/er-modell-3.png" alt="" style="max-width: 100%;">
</p>
<? ex_end(); ?>



<? ex_start(title: 'Schule: Kardinalitäten interpretieren', open: false); ?>
<p>
    Gegeben ist das folgende ER-Diagramm einer Schulverwaltung.
</p>
<p>
    <img src="../../res/er-modell-3.png" alt="" style="max-width: 100%;">
</p>
<ol>
    <li>
        <p><strong>Interpretiere</strong> die Kardinalitäten jeder Beziehung mit zwei Sätzen (je Kardinalität die Bedeutung notieren).</p>
    </li>
    <li>
        <p>
            Nach dem vorliegenden ER-Modell ist es erlaubt, dass eine Klasse zwei stellvertretende Klassensprecher/innen hat. <strong>Finde</strong> eine Möglichkeit, sicherzustellen, dass jede Klasse einen Haupt-Klassensprecher und einen Stellvertreter hat.
        </p>
    </li>
</ol>
<? ex_sol(); ?>
<ol>
    <li>
        <ul>
            <li>
                <p><strong>Lehrer unterrichtet Kurs</strong></p>
                <p>Ein Lehrer unterrichtet <strong>n</strong> (beliebig viele) Kurse.</p>
                <p>Ein Kurs witd unterrichtet von <strong>1</strong> Lehrer.</p>
            </li>
            <li>
                <p><strong>Lehrer unterrichtet Klasse</strong></p>
                <p>Ein Lehrer unterrichtet <strong>m</strong> (beliebig viele) Klassen.</p>
                <p>Eine Klasse wird unterrichtet von <strong></strong> (beliebig vielen) Lehrern.</p>
            </li>
            <li>
                <p><strong>Lehrer leitet Klasse</strong></p>
                <p>Ein Lehrer leitet <strong>0</strong> bis <strong>1</strong> Klassen.</p>
                <p>Eine Klasse wird geleitet von <strong>1</strong> Lehrer.</p>
            </li>
            <li>
                <p><strong>Schüler ist Teil von Klasse</strong></p>
                <p>Ein Schüler ist Teil von <strong>1</strong> Klasse.</p>
                <p>Eine Klasse enthält <strong>1</strong> bis <strong>32</strong> Schüler.</p>
            </li>
            <li>
                <p><strong>Schüler ist Klassensprecher von Klasse</strong></p>
                <p>Ein Schüler ist Klassensprecher von <strong>0</strong> bis <strong>1</strong> Klassen.</p>
                <p>Eine Klasse hat als Klassensprecher <strong>2</strong> Schüler.</p>
            </li>
            <li>
                <p><strong>Schüler belegt Kurs</strong></p>
                <p>Ein Schüler belegt <strong>13</strong> Kurse.</p>
                <p>Eine Kurs wird belegt von <strong>6</strong> bis <strong>30</strong> Schülern.</p>
            </li>

        </ul>
    </li>
    <li>
        <p>Füge eine neue Beziehung „ist stellv. Klassensprecher von“ hinzu. Das Attribut „stellvertretend?“ erübrigt sich. Über die Kardinalitäten kann sichergestellt werden, dass jede Klasse genau einen Klassensprecher/in und einen stellv. Klassensprecher/in hat.</p>
        <p>
            <em>Nicht gefordert wird jedoch, dass Klassensprecher/in und stellv. Klassensprecher/in nicht dieselbe Person sein dürfen. Das ER-Modell ist nicht ausdrucksstark genug, um diese Einschränkung zu formulieren.</em>
        </p>
    </li>
</ol>
<? ex_end(); ?>


<? ex_start(title: 'Schule: Ternäre Beziehungen', open: false); ?>
<p>
    Gegeben ist das folgende ER-Diagramm einer Schulverwaltung.
</p>
<p>
    <img src="../../res/er-modell-3.png" alt="" style="max-width: 100%;">
</p>
<ol>
    <li>
        <p>
            Alle bisherigen Beziehungstypen waren <dfn>binär</dfn>, d.h. zwischen zwei Entitäten.
        </p>
        <p>
            Wie wird in obigem Beispiel festgehalten, <em>welches Fach</em> ein Lehrer in einer Klasse unterrichtet? Als Attribut!
        </p>
        <p>
            Diese Lösung ist diskutabel. Ein Fach kann man als einen eigenen Entitätstypen betrachten, mit seinen ganz eigenen Attributen und Beziehungen. Z.B. könnte man in einem weiteren Schritt modellieren, dass einem Fach ein Fachschaftsleiter (als Lehrer) zugeordnet wird. 
        </p>
        <p>
            <strong>Informiere</strong> dich über ternäre Beziehungstypen, welche zwischen drei Entitäten bestehen, z.B. <a href="https://luo-darmstadt.de/wiki2/doku.php?id=db:ternaere_beziehungen">hier</a>. <strong>Füge</strong> im ER-Diagramm einen neuen Entitätstypen „Fach“ hinzu. <strong>Füge</strong> einen ternären Beziehungstyp „Lehrer unterrichtet Fach in Klasse“ hinzu. <strong>Notiere</strong> die korrekten Kardinalitäten. <strong>Interpretiere</strong> die Kardinalitäten jeweils in einem Satz.
        </p>
    </li>
</ol>
<? ex_sol(); ?>
<p>
    <img src="../../res/er-modell-4.png" alt="" style="max-width: 100%;">
</p>
<ol>
    <li>
        Formal: „<em>Einem Lehrer</em> und <em>einem Fach</em> werden <em>beliebig viele (n) Klassen</em> zugeordnet.“ <br>
        Verständlicher: „<em>Ein Lehrer</em> unterrichtet <em>ein Fach</em> in <em>beliebig vielen Klassen</em>.“
    </li>
    <li>
        Formal: „<em>Einem Lehrer</em> und <em>einer Klasse</em> werden <em>beliebig viele (n) Fächer</em> zugeordnet.“<br>
        Verständlicher: „<em>Ein Lehrer</em> unterrichtet in <em>einer Klasse</em> <em>beliebig viele Fächer</em>.“
    </li>
    <li>
        Formal: „<em>Einem Fach</em> und <em>einer Klasse</em> werden <em>genau ein Lehrer</em> zugeordnet.“<br>
        Verständlicher: „<em>Ein Fach</em> wird in <em>einer Klasse</em> von <em>genau einem Lehrer</em> unterrichtet.“
    </li>
</ol>
<? ex_end(); ?>

<? }; ?>