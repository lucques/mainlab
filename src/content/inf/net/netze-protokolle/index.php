<?
    $preprocess = function (TargetPreprocessContext $c) {
        $c->activate_module('role-info');
        
        $c->run_macro('title', 'set', 'Netze und Protokolle');
    };
?>

<? $process = function(Target $target) { ?>

<p>
    Ein <dfn>Netz</dfn> verstehen wir zunächst als ein sehr allgemeines Konzept.
</p>

<? acc_single_block_start('<strong>Definition: Netz und Protokoll</strong>', variant: 'definition'); ?>
<p>
    Ein <dfn>Netz</dfn>...
</p>
<ul>
    <li>verbindet mindestens zwei <strong>Parteien</strong> und ermöglicht...</li>
    <li>die <strong>Kommunikation</strong> zwischen ihnen.</li>
    <li>Die Kommunikation erfolgt <strong>geordnet</strong>, gemäß eines sogenannten <dfn>Protokolls</dfn>.</li>
</ul>
<p>
    Das für ein Netz vereinbarte <dfn>Protokoll</dfn> sind die Regeln, nach denen wer was wann wie sagen darf.
</p>
<? acc_single_block_end(); ?>

<? acc_single_item_start('<strong>Beispiel: Unterrichtsgespräch</strong>', variant: 'example'); ?>
<p>
    Bei einem Unterrichtsgespräch werden in einem <strong>Klassenraum</strong> akustische Signale ausgetauscht, nämlich <strong>Redebeiträge</strong>. Aber nicht alle sprechen wild durcheinander. Um die Kommunikation überhaupt erst zu ermöglichen, wird ein (ungeschriebenes) Protokoll eingehalten:
</p>
<ul>
    <li>Bei der ersten Begegnung wird signalisiert, dass man sich gegenseitig wahrgenommen hat (Begrüßung).</li>
    <li>Moderation typischerweise durch Lehrer/in</li>
    <li>Wer längere Zeit aufzeigt, kommt irgendwann garantiert zum Zug.</li>
    <li>Wer spricht, dem wird nicht ins Wort gefallen.</li>
    <li>Wer spricht, sollte irgendwann auch zum Ende kommen.</li>
    <li>...</li>
    <li>Bevor der Unterricht endet, wird signalisiert, dass die Kommunikation beendet ist (Verabschiedung).</li>
</ul>
<? acc_single_item_end(); ?>

<p>
    Streng genommen gibt es im Klassenraum neben dem <dfn>Hauptkanal</dfn> noch weitere <dfn>Seitenkanäle</dfn>, die z.B. für die Kommunikation zwischen Tischnachbarn genutzt werden. Da die Kanäle parallel laufen und sich nicht stören (im idealen Fall...), stellt jeder Kanal ein eigenes Netz dar. Ein Kommunkationsteilnehmer kann also <strong>gleichzeitig</strong> an mehreren Netzen teilnehmen. 
</p>

<p>
    Die <dfn>Topologie</dfn> (altgriech. τόπος, „Ort“) eines Netzes beschreibt die <strong>Verbindungen</strong> zwischen den Parteien.
</p>

<div class="row">
    <div class="col">
        <? acc_single_item_start('<strong>Beispiel: Unterrichtsgespräch</strong>', variant: 'example', open: true); ?>
        <p><img src="res/unterrichtsgespraech.png" alt="" style="max-width: 100%;"></p>
        <ul>
            <li>Hier gibt es <strong>drei Netze</strong>.</li>
            <li>Alle Schüler/innen $S_1, ..., S_n$ und Lehrer/in $L$ sind verbunden im schwarzen „Unterrichtsgespräch“-Netz.</li>
            <li>Die Schüler $S_4, S_5, S_6$ sind verbunden im blauen „Tischnachbarn“-Netz.</li>
            <li>Die Schüler $S_2, S_3$ sind verbunden im roten „Tischnachbarn“-Netz.</li>
            <li>Alle Verbindungen sind <dfn>bidirektional</dfn>, d.h. es kann gesendet und empfangen werden.</li>
        </ul>
        <? acc_single_item_end(); ?>
    </div>
    <div class="col">
        <? acc_single_item_start('<strong>Beispiel: „Stille Post“</strong>', variant: 'example', open: true); ?>
        <p><img src="res/stille_post.png" alt="" style="max-width: 100%;"></p>
        <ul>
            <li>Hier gibt es <strong>ein Netz</strong>.</li>
            <li>Jedes Kind $K_i$ ist mit Vorgänger $K_{i-1}$ und Nachfolger $K_{i+1}$ verbunden im schwarzen „Stille Post“-Netz.</li>
            <li>Alle Verbindungen sind <dfn>unidirektional</dfn>, d.h. es wird nur in eine Richtung kommuniziert. Die Richtungen werden durch die Pfeilspitzen angezeigt.</li>
        </ul>
        <? acc_single_item_end(); ?>
    </div>
</div>

<? ex_start('Netze und Protokolle analysieren', open: false); ?>
<p>
    <strong>Wähle</strong> zwei Netze aus der folgenden Liste. <strong>Beschreibe</strong> die beiden Netze sowie das ihnen zugrunde liegende Protokoll hinsichtlich der untenstehenden Aspekte.  
</p>

<ul class="list-group">
    <li class="list-group-item"><em>Plenarsaal des Deutschen Bundestags</em></li>
    <li class="list-group-item"><em>„Stille Post“</em></li>
    <li class="list-group-item"><em>Fernschach</em></li>
    <li class="list-group-item"><em>Zeitungsverleger und Zeitungsleserschaft</em></li>
    <li class="list-group-item"><em>Organe im menschlichen Körper</em></li>
    <li class="list-group-item"><em>Whatsapp-Gruppe</em></li>
    <li class="list-group-item"><em>Getränkeausschank an der Theke in einem britischen Pub</em></li>
</ul>
<? acc_heading(2, 'Aspekte des Netzes'); ?>
<ol>
    <li>
        Welche <strong>Parteien</strong> kommunizieren?
    </li>
    <li>
        Was ist das <strong>Medium</strong>, also über welchen Träger bestehen die <strong>Verbindungen</strong>? (Ton, Licht, Post, ...)
    </li>
    <li>
        Was ist eine <strong>Nachricht</strong>? (Lichtsignal, Redebeitrag, ...)
    </li>
    <li>
        Sind alle Parteien <strong>direkt</strong> miteinander verbunden oder sind manche Parteien nur <strong>indirekt</strong> miteinander verbunden (also über mehrere „Ecken“)?
    </li>
    <li>
        Ist jede Partei sowohl <strong>Sender</strong> als auch <strong>Empfänger</strong>, oder gibt es Parteien, die nur Nachrichten empfangen oder nur Nachrichten senden können?
    </li>
    <li>
        Ist die Parteienzusammensetzung <strong>statisch</strong> (festbleibend) oder <strong>dynamisch</strong> (sich verändernd)?
    </li>
    <li>
        Zeichne eine typische <strong>Topologie</strong>.
    </li>
</ol>

<? acc_heading(2, 'Aspekte des Protokolls'); ?>
<ol start="8">
    <li>
        Haben alle Parteien <strong>dieselbe Funktion</strong> oder gibt es <strong>verschiedene Funktionen</strong>?
    </li>
    <li>
        Gibt es Nachrichten, welche die Kommunikation <strong>einläuten</strong> und <strong>ausläuten</strong>?
    </li>
    <li>
        Was passiert, wenn sich eine Partei <strong>nicht an das Protokoll hält</strong>? Bricht die Kommunikation zusammen oder kann sie „gerettet“ werden? Falls ja, wie? Fals nein, warum nicht?
    </li>
    <li>
        Beschreibe, in welche <strong>Typen</strong> sich die Nachrichten untergliedern lassen.
    </li>
    <li>
        Beschreibe ein Beispiel einer <strong>typischen Sequenz</strong> von Nachrichten, die dem Protokoll entspricht.
    </li>
    <li>
        Beschreibe ein Beispiel einer <strong>untypischen Sequenz</strong> von Nachrichten, in der eine Partei das Protokoll verletzt, und beschreibe, wie die anderen Parteien reagieren.
    </li>
</ol>
<? ex_end(); ?>

<? }; ?>