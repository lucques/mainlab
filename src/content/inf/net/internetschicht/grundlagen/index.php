<?
    $preprocess = function (TargetPreprocessContext $c) {
        $c->activate_module('role-info');
        
        $c->run_macro('title', 'set', '1. Grundlagen');
    };
?>

<? $process = function(Target $target) { ?>

<?
    // $c->show_parent_title = true;
?>

<p>
    Die <dfn>Internetschicht</dfn> verbindet mehrere Rechner zu einem <dfn>Netz</dfn> und ermöglicht den Rechnern das Versenden von <dfn>Paketen</dfn> untereinander. Die Rechner „unterhalten“ sich unter Einhaltung des sogenannten <dfn>Internet Protocol (IP)</dfn>. Es gibt grob unterteilt zwei verschiedene Rechnertypen (Rechner = Computer).
</p>
<ul>
    <li><dfn>Endgeräte</dfn> (Bsp.: Notebook, Server, Smartphone, ...)</li>
    <li><dfn>Router</dfn> (Zweck: Pakete weiterleiten)</li>
</ul>
<p>
    Man kann sich nun ein Netz ganz intuitiv wie folgt vorstellen.
</p>
<p class="text-center">
    <img src="../../res/img/skizze_internet.png" alt="" width="800">
</p>
<p>
    Die <dfn>Endgeräte</dfn> (A1, A2, A3, B1, B2, B3) sind jeweils gebündelt mit einem Router verbunden.
</p>
<p>
    Die <dfn>Router</dfn> (R1, R2, R3, R4, R5) sind zudem untereinander verbunden.
</p>

<? html_h(2, 'Pakete verschicken', 'pakete-verschicken'); ?>
<p>
    Jedes Gerät (egal ob Endgerät oder Router) erhält nun eine Adresse, die sogenannte <dfn>IP-Adresse</dfn>. Du kannst sie dir wie eine Postadresse vorstellen, mit der man Absender und Empfänger beschreiben kann.
</p>
<ul>
    <li>Ein Gerät kann von seiner IP-Adresse, z.B. $110.0.0.2$...</li>
    <li>... ein Paket an eine andere IP-Adresse schicken, z.B. $220.0.0.4$</li>
</ul>
<p>
    Wie funktioniert dies genau?
</p>
<ol>
    <li>Der Computer mit $110.0.0.2$ hat keine direkte Verbindung zu $220.0.0.4$.</li>
    <li>Aber er ist an einen Router angeschlossen.</li>
    <li>Also schickt er ein Datenpaket mit Empfänger-IP $220.0.0.4$ an diesen Router.</li>
    <li>Der Router schaut auf die Adresse und leitet das Paket weiter an den Router, welcher zwar nicht direkt neben dem Empfänger steht, aber welcher zumindest am nächsten dran ist.</li>
    <li>Dies geht jetzt immer so weiter, bis...</li>
    <li>...irgendwann der Router R5 erreicht wird. Dieser steht ja direkt neben B3 und kann das Paket erfolgreich abliefern.</li>
</ol>
<div class="row">
    <div class="col">
        <p>
            In diesem Fall gibt es sogar zwei sinnvolle Wege:
        </p>
    </div>
    <div class="col">
        <ul>
            <li>A1 → R1 → R2 → R4 → R5 → B3</li>
            <li>A1 → R1 → R2 → R3 → R5 → B3</li>
        </ul>
    </div>
</div>
<p>
    Das IP-Protokoll wird von jedem der teilnehmenden Geräte „gesprochen“. Die erste Paketsendung A1→R1 löst also eine ganze Kettenreaktion an Kommunikation aus, die erst mit R5→B3 endet.
</p>

<? }; ?>