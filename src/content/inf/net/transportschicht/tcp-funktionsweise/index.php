<?
    $preprocess = function (TargetPreprocessContext $c) {
        $c->activate_module('role-info');
        
        $c->run_macro('title', 'set', 'TCP: Wie funktioniert es?');
    };
?>

<? $process = function(Target $target) { ?>

<p>
    Wir erinnern uns an die Schichtenarchitektur des Internets.
</p>
<p class="text-center">
    <img src="../../res/img/schichtenarchitektur-internet-transportschicht.png" alt="" style="width: 70%;">
</p>
<p>
    Wenn nun eine Schicht die darunter liegende Schicht verwendet, dann bettet sie Nachrichten des höheren Protokolls in Nachrichten des niedrigeren Protokolls ein. Bsp.:
</p>
<p class="text-center">
    <img src="res/frame-packet-segment.png" alt="" style="width: 90%;">
</p>
<p>
    Es haben sich zur Unterscheidung die folgenden Begriffe etabliert: <dfn>Frame</dfn> (für die Verbindungsschicht), <dfn>Packet</dfn> (für die Internetschicht), <dfn>Segment</dfn> (Transportschicht).
</p>
<p>
    Die Idee ist also folgende: In die Hardware-Frames werden IP-Pakete platziert, in diese werden TCP-Segmente platziert, in diese werden Anwendungs-Daten platziert (manchmal geht es sogar noch so weiter). Diese ineinander verpackten Pakete kann man sich auch bei Filius anzeigen lassen („Datenaustausch anzeigen“). Die Inhalte werden untereinander geschrieben und haben ihre 1-zu-1-Entsprechungen wie folgt:
</p>
<p class="text-center">
    <img src="res/frame.png" alt="" style="width:90%;">
</p>


<? ex_start('Wie werden Daten über eine TCP-Verbindung verschickt?', open: true); ?>
<p>
    <strong>Lies</strong> die folgende Beschreibung: <a href="https://www.inf-schule.de/rechnernetze/transport/konzept_transportkontrolle">Link</a>
</p>
<p>
    Überlege: Was genau hat es mit den SEQ- und den ACK-Nummern auf sich? Gleiche hierfür die Nummern mit dem „Datenaustausch“-Fenster ab.
</p>
<? ex_end(); ?>



<? ex_start('Verbindungsaufbau', open: true); ?>
<p>
    <strong>Löse</strong> die folgenden Aufgaben: <a href="https://www.inf-schule.de/rechnernetze/transport/verbindungsaufbau">Link</a>. <strong>Lies</strong> anschließend, wie der 3-Way-Handshake funktioniert und <strong>identifiziere</strong> ihn in deinem „Datenaustausch“-Protokoll.
</p>
<? ex_end(); ?>




<p>
    Eine TCP-Verbindung durchläuft in ihrem Leben drei Phasen: 
</p>

<p class="text-center">
    <img src="res/tcp_phasen.svg" alt="" style="width:90%;">
</p>



<? ex_start('Übersicht', open: true); ?>
<p>
    <strong>Lies</strong> diese Seite durch: <a href="https://www.inf-schule.de/rechnernetze/transport/konzept_prozessadressierung">Link</a>
</p>
<? ex_end(); ?>

<? }; ?>