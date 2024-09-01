<?
    $preprocess = function (TargetPreprocessContext $c) {
        $c->activate_module('role-info');
        
        $c->run_macro('title', 'set', 'Anwendungsschicht');
        
        $c->add_subpage('http');
        $c->add_subpage('dns');        
    };
?>

<? $process = function(Target $target) { ?>

<p>
    Auf der Anwendungsschicht läuft die Kommunikation zwischen Client und Server ab. Wir können hier gar nicht viel Allgemeines zu sagen, da jede App schließlich andere Daten austauscht! Beispiele für Apps, jeweils Client und Server:
</p>
<ul>
    <li>
        <strong>Webbrowser</strong> und <strong>Webserver</strong> (HTTP-Protokoll)
    </li>
    <li>
        <strong>Einfacher Client</strong> und <strong>Echo-Server</strong> (zu simpel, um hier von einem Protokoll zu sprechen)
    </li>
    <li>
        <strong>E-Mail-Programm</strong> und <strong>Mailserver</strong> (SMTP-, IMAP-Protokoll)
    </li>
    <li>
        <strong>Instagram-App</strong> und <strong>Instagram-Server</strong> (internes Protokoll von Instagram)
    </li>
</ul>

<p>
    Es ist wichtig zu verstehen, dass die Anwendungsschicht auf der Transportschicht aufbaut, also z.B. auf dem TCP-Protokoll. Die Anwendung kann also die technischen Details (3-Way-Handshake, Empfangsbestätigungen, Wiederverschickung bei Paketverlust etc.) ignorieren und sich <strong>auf das Wesentliche (= die Anwendungsdaten) konzentrieren</strong>. 
</p>
<p>
    Die folgenden beiden Sequenzdiagramme beschreiben also dieselbe Kommunikation, jedoch aus Sicht von zwei verschiedenen Schichten. Im rechten Sequenzdiagramm fehlt noch ein Teil der Kommunikation (siehe nachfolgende Aufgabe).
</p>

<p class="text-center">
    <img src="res/sequenzdiagramm-2.png" alt="" style="width: 100%;">
</p>

<? ex_start('Sequenzdiagramm vervollständigen', open: false); ?>
<p>
    <strong>Konstruiere</strong> in Filius ein einfaches LAN mit zwei Rechnern. Auf einem der Rechner soll ein <em>einfacher Client</em> installiert werden. Auf dem anderen Rechner soll ein <em>Echo-Server</em> installiert werden.
</p>
<p>
    <strong>Starte</strong> den Server auf Port <code>555</code>. <strong>Verbinde</strong> den Client mit dem Server.
</p>
<p>
    <em>Die Portnr. auf der Seite des Clients mag bei dir anders sein, ebenfalls die <code>SEQ</code>- und <code>ACK</code>-Felder. Das ist kein Problem. <code>SEQ</code> steht für „Sequenznummer“ und <code>ACK</code> steht für „Acknowledgement“ = „Bestätigung einer Sequenznr.“</em>
</p>
<p>
    <strong>Verschicke</strong> eine <code>HALLO</code>-Nachricht. <strong>Beende</strong> anschließend die Verbindung client-seitig. <strong>Lasse</strong> dir nun den Datenaustausch <strong>anzeigen</strong>.
</p>
<p>
    <strong>Identifiziere</strong> zunächst den 3-Way-Handshake („Begrüßung“). Es handelt sich um drei Pakete. <strong>Prüfe</strong>, dass jeweils <code>SEQ</code>-Nr. $X$ mit der <code>ACK</code>-Nr. $X+1$ beantwortet wird.
</p>
<p>
    <strong>Identifiziere</strong> nun den Versand von <code>HALLO</code>, die Bestätigung, den Versand des <code>HALLO</code>-Echos, und auch die dazugehörige Bestätigung. <strong>Zeichne</strong> das rechtsstehende Sequenzdiagramm <strong>ab</strong> und <strong>vervollständige</strong> es. <strong>Prüfe</strong>, dass nach Versand der 5 Zeichen <code>HALLO</code> mit <code>SEQ</code>-Nr. $X$ die <code>ACK</code>-Nummer $X+5$ lautet. 
</p>
<p>
    <strong>Identifiziere</strong> abschließend das „Goodbye“. Welche Nachrichten werden verschickt? <strong>Zeichne</strong> in das Sequenzdiagramm ein. 
</p>
<? ex_sol(); ?>
<p class="text-center">
    <img src="res/sequenzdiagramm-1.png" alt="" style="width: 100%;">
</p>
<? ex_end(); ?>

<? }; ?>