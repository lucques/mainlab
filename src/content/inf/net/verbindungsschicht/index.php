<?
    $preprocess = function (TargetPreprocessContext $c) {
        $c->activate_module('role-info');
        
        $c->run_macro('title', 'set', 'Verbindungsschicht');
    };
?>

<? $process = function(Target $target) { ?>

<img src="../res/img/schichtenarchitektur-internet-verbindungsschicht.png" alt="" class="float-end" style="width:200px;">
<p>
    Die <em>Internetschicht</em> sorgt dafür, dass IP-Pakete gepackt werden und klärt, wie diese weitergeleitet werden.
</p>
<p>
    Was bedeutet es aber <em>genau</em>, ein Paket von Rechner A zu Rechner B über ein Kabel zu verschicken? Die direkte Anschluss-zu-Anschluss-Übertragung wird von der <dfn>Verbindungsschicht</dfn> übernommen.
</p>
<p>
    Jeder Hardware-Anschluss („Verbindungspunkt“) besitzt eine weltweit eindeutige Hardware-Adresse, die sogenannte MAC-Adresse („media access control“).
</p>
<p>
    Benachbarte Geräte, die z.B. mit einem Kabel oder über Funk (WLAN) verbunden sind, haben ein Protokoll, um ihre gegenseitigen MAC-Adressen zu erfragen. Anschließend können sie sich sogenannte Frames zuschicken. Ein Frame ist wieder eine Art Paket (zur Abgrenzung aber eben „Frame“ genannt), in welchem ein IP-Packet enthalten ist. Also:
</p>

<p class="text-center">
    <img src="res/frame-packet-segment.png" alt="" style="width: 100%;">
</p>

<p>
    Man kann jetzt noch sehr ins Detail gehen darüber, wie die WLAN-Frames genau kodiert werden. Wir schauen uns jedoch die einzelnen Hardware-Typen, also WLAN-Frame vs. Ethernet-Frame („LAN-Kabel“) etc., nicht im Detail an.
    <!-- (es gibt hier noch ein paar Features wie z.B. die Verwendung einer Prüfsumme: In der Luft kann mal ein Bit falsch übertragen werden. Die Prüfsumme kann so etwas dann aufdecken, und der Frame kann nochmal angefordert werden). -->
</p>


<? ex_start('MAC-Adressen', open: false); ?>
<p>
    MAC-Adressen sind Ziffernfolgen, die aus 6 Zweierpäckchen bestehen, getrennt durch <code>:</code>, z.B. <code>72:80:3F:23:75:16</code>. Es gibt 16 Ziffern, nämlich <code>0, 1, 2, 3, ..., 9, A, B, C, D, E, F</code>. Jedes Zweierpäckchen, z.B. <code>3F</code>, kann als Zahl in Hexadezimaldarstellung (= 16er-Darstellung) gelesen werden. Das Zweierpäckchen <code>3F</code> entspricht also <code>3⋅16 + 15⋅1 = 63</code> in der Dezimaldarstellung.
</p>
<ol>
    <li>
        <p>
            <strong>Bestimme</strong>, welche kleinste und größte Zahl in einem Zweierpäckchen dargestellt werden kann. Wie vielen verschiedenen Zahlen entspricht dies?
        </p>
    </li>
    <li>
        <p>
            <strong>Bestimme</strong>, wie viele Bits an Speicherplatz pro Zweierpäckchen benötigt werden.
        </p>
    </li>
    <li>
        <p>
            <strong>Bestimme</strong>, wie viele Bits an Speicherplatz für eine gesamte MAC-Adresse benötigt wird.
        </p>
    </li>
    <li>
        <p>
            <strong>Bestimme</strong>, wie viele MAC-Adressen verteilt werden können.
        </p>
    </li>
</ol>
<? ex_end(); ?>


<? acc_single_item_start('Woher kennt der Sender die MAC-Adresse des Empfängers?', variant: 'info', open: true); ?>
<p>
    Wie wir wissen, kennen die Router/Rechner nur ihre gegenseitigen <em>IP-Adressen</em> (diese stehen schließlich in der Weiterleitungstabelle).
</p>
<p>
    Im Beispiel oben: Der Rechner mit der IP-Adresse <code>192.168.0.1</code> (Sender) benötigt die MAC-Adresse des Empfängers mit der IP-Adresse <code>192.168.0.2</code>. Er macht Folgendes:
</p>
<p>
    Nun schickt er einen sogenannten <dfn>Broadcast-Frame</dfn> an alle Rechner, welche diese IP-Adresse haben könnten. Mehrere Rechner erhalten diesen speziellen Broadcast-Frame. Alle ignorieren ihn, bis auf einen: Der Rechner, welcher tatsächlich die IP-Adresse <code>192.168.0.2</code> besitzt. Dieser schickt ein IP-Paket zurück mit der Antwort „Ich bin's, und meine MAC-Adresse ist 23:65:AB:...“.
</p>
<p>
    Das Protokoll trägt den Namen <dfn>Adress Resolution Protocol (ARP)</dfn> genannt, und man sieht die eben beschriebene Kommunikation hier:
</p>
<p class="text-center">
    <img src="res/arp.png" alt="" style="max-width: 100%;">
</p>
<p>
    Hier wird auch klar, wie die Broadcast-Adresse lautet: <code>FF:FF:FF:FF:FF:FF</code>.
</p>
<? acc_single_item_end(); ?>


<? acc_single_item_start('Was macht der Switch, wenn ihn ein Paket erreicht?', variant: 'info', open: true); ?>
<p>
    Wie wir wissen, kennen die Router/Rechner nur ihre gegenseitigen <em>IP-Adressen</em> (diese stehen schließlich in der Weiterleitungstabelle).
</p>
<img src="res/sat.png" alt="" class="float-end" style="max-width:300px;">
<p>
    Wann immer der Switch ein Paket erhält, notiert er die „Absender“-MAC-Adresse in einer Tabelle mit dem zugehörigen Netzanschluss, z.B. <code>1D:F1:...</code> an Port 2 (bitte nicht mit Portnummern aus der Transportschicht verwechseln!). Die Tabelle wird SAT-Tabelle genannt (<em>source address table</em>).
</p>
<ul>
    <li>
        <p>
            Sollte nun ein weiteres Paket an die MAC-Adresse <code>1D:F1:...</code> den Switch erreichen, so sendet er das Paket einfach direkt weiter an den Empfänger in Port 2.
        </p>
    </li>
    <li>
        <p>
            Sollte ein Paket kommen, gerichtet an die MAC-Adresse <code>FF:FF:...</code> (Broadcast-MAC-Adresse), so sondet er das Paket an alle Ports.
        </p>
    </li>
    <li>
        <p>
            Sollte ein Paket kommen gerichtet an eine unbekannte MAC-Adresse, so sendet er das Paket ebenfalls an alle Ports.
        </p>
    </li>
</ul>
<p>
    Mit der Zeit „lernt“ ein Switch also die MAC-Adressen und nach kurzer Zeit werden alle Pakete immer dorthin geschickt, wo sie hinsollen.
</p>
<? acc_single_item_end(); ?>


<? ex_start('Sequenzdiagramme'); ?>
<p>
    <strong>Erstelle</strong> folgendes LAN.
</p>
<p class="text-center">
    <img src="../res/filius/img/192-168-0-0-24-netz.png" alt="" style="width:300px;">
</p>
<ol>
    <li>
        <p>
            <strong>Führe</strong> den Befehl <code>ping 192.168.0.11</code> von Rechner <code>192.168.0.10</code> <strong>aus</strong>.
        </p>
    </li>
    <li>
        <p>
            <strong>Führe</strong> den Befehl <code>ping 192.168.0.10</code> von Rechner <code>192.168.0.11</code> <strong>aus</strong>.
        </p>
    </li>
    <li>
        <p>
            <strong>Führe</strong> den Befehl <code>ping 192.168.0.10</code> von Rechner <code>192.168.0.12</code> <strong>aus</strong>.
        </p>
    </li>
    <li>
        <p>
            <strong>Notiere</strong> die Kommunikation aus zwei Sichten, indem du zwei Sequenzdiagramme nebeneinander zeichnest. <em>Der Anfang ist bereits vorgegeben.</em>
        </p>
    </li>
    <li>
        <p>
            <strong>Begründe</strong>: Wieso wird das ARP-Protokoll nur bei 1. und 3., nicht aber bei 2. benötigt?
        </p>
    </li>
    <li>
        <p>
            <strong>Notiere</strong> den endgültigen Zustand der SAT-Tabelle.
        </p>
    </li>
</ol>
<p class="text-center">
    <a href="res/sequenzdiagramm.png"><img src="res/sequenzdiagramm.png" alt="" style="max-width:100%;"></a>
</p>
<? ex_end(); ?>

<? }; ?>