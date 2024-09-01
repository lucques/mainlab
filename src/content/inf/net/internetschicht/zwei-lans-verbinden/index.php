<?
    $preprocess = function (TargetPreprocessContext $c) {
        $c->activate_module('role-info');
        
        $c->run_macro('title', 'set', '7. Zwei LANs verbinden');
    };
?>

<? $process = function(Target $target) { ?>

<? css_start(); ?>
    #content main {
        min-width:1200px;
    }
<? css_end(); ?>

<div class="alert alert-warning stack" role="warning">
  <p>
    Mehr Infos zu dem Thema auch <a href="https://www.inf-schule.de/rechnernetze/filius/vernetzungrechnernetze/erkundung_zweinetze">hier</a> und <a href="../../res/erklaerung_zwei_netze_verbinden_alt.svg">hier</a>.
  </p>
</div>

<p>
    Wir haben nun verstanden, wie die Rechner innerhalb eines LANs miteinander kommunizieren können. Das Internet besteht letztlich aus vielen <strong>lokalen Netzen</strong> (= LANs), die sich zu einem <strong>globalen Netz</strong> (= Internet) zusammenschließen.
</p>
<div class="clearfix">

    <img src="../../res/filius/img/zwei-netze-192-168-0-0-24-und-20-0-0-0-12-netz.png" alt="" class="float-end" style="width:500px;">
    <p>
        Auf dieser Seite schauen wir uns zunächst an, wie <strong>zwei nebeneinander liegende LANs</strong> verbunden werden können. Mit „nebeneinanderliegend“ ist hierbei gemeint, dass zwei LANs durch einen Router miteinander verbunden sind. Dieser Router befindet sich in beiden LANs gleichzeitig und kann zwischen diesen vermitteln.
    </p>
</div>



<? acc_start(); ?>
<? acc_item_start('<dfn>Router</dfn> (Definition)', variant: 'definition', open: true); ?>
<img src="../../res/filius/img/router.png" alt="" class="float-end">
<p class="first-child">
    Ein <dfn>Router</dfn> (<em>deutsch: „Vermittlungsrechner“</em>) ist ein Rechner, der mehrere LAN-Anschlüsse besitzt und somit Teil mehrerer LANs ist. Seine Aufgabe ist es, Pakete zwischen diesen LANs zu vermitteln.
</p>
<p>
    Ein <em>Endgerät</em> besitzt im Gegensatz dazu nur einen einzigen LAN-Anschluss und ist somit nur Teil eines einzigen LANs.
</p>
<p>
    Auf einem Router ist kein klassisches Betriebssystem (wie Windows oder macOS oder Linux) vorhanden, denn alles ist darauf ausgelegt, möglichst schnell Pakete an das richtige LAN weiterzuleiten.
    Ein Endgerät hingegen erfüllt verschiedenste Funktionen, weshalb man auf seinem Betriebssystem z.B. Web-Browser <img src="../../res/filius/img/webbrowser.png" alt="" style="height: 1rem;">, Web-Server <img src="../../res/filius/img/webserver.png" alt="" style="height: 1rem;">, Computerspiele etc. installieren kann.
</p>
<p>
    <strong>Jeder LAN-Anschluss</strong> erhält eine <strong>separate Konfiguration</strong>, jeweils wie gehabt bestehend aus IP-Adresse und LAN-Präfix.
</p>
<? acc_item_end(); ?>
<? acc_end(); ?>



<? acc_start(); ?>
<? acc_item_start('<strong>Konfiguration der LAN-Anschlüsse bei Filius</strong>', variant: 'info', open: false); ?>
<p>
    Die die Konfiguration der LAN-Anschlüsse eines Routers geschieht genau wie bei einem Endgerät. Per Tab kann der jeweilige LAN-Anschluss ausgewählt werden.
</p>
<div class="grid" style="grid-template-columns: 1fr 1fr;">
    <div class="text-center">
        <img src="../../res/filius/img/zwei-netze-192-168-0-0-24-und-20-0-0-0-12-konfiguration-router-192-kabel.png" alt="">
    </div>
    <div class="text-center">
        <img src="../../res/filius/img/zwei-netze-192-168-0-0-24-und-20-0-0-0-12-konfiguration-router-20-kabel.png" alt="">
    </div>
    <div>
        <img src="../../res/filius/img/zwei-netze-192-168-0-0-24-und-20-0-0-0-12-konfiguration-router-192.png" alt="">
    </div>
    <div>
        <img src="../../res/filius/img/zwei-netze-192-168-0-0-24-und-20-0-0-0-12-konfiguration-router-20.png" alt="">
    </div>
</div>
<? acc_item_end(); ?>
<? acc_end(); ?>




<? acc_start(); ?>
<? acc_item_start('<dfn>IP-Paket</dfn> (Definition)', variant: 'definition', open: true); ?>
<img src="../../res/img/ip-packet.png" alt="" class="float-end">
<p class="first-child">
    Ein <dfn>IP-Paket</dfn> dient dem Transport von Daten zwischen zwei Rechnern. Es besteht aus zwei Teilen.
</p>
<ol>
    <li>
        <dfn>Kopfdaten</dfn> (<em>header</em>), bestehend aus
        <ul>
            <li>IP-Adresse des Absenders</li>
            <li>IP-Adresse des Empfängers</li>
        </ul>
    </li>
    <li>
        <dfn>Nutzdaten</dfn> (<em>payload</em>), bestehend aus<br>
        ...beliebigen Daten, z.B. E-Mails, Webseiten, Bilder, Video...
    </li>
</ol>
<? acc_item_end(); ?>
<? acc_end(); ?>



<? acc_start(); ?>
<? acc_item_start('<dfn>Versand eines IP-Pakets</dfn> (Definition)', variant: 'definition', open: true); ?>
<p>
    Der <dfn>Versand eines IP-Pakets</dfn> erfolgt entlang einer <dfn>Route</dfn>, welche eine <dfn>Folge von Rechnern</dfn> ist. Switches spielen dabei keine Rolle. Die Rechner in dieser Folge leiten das IP-Paket an den jeweils nächsten <dfn>Hop</dfn> (deutsch: „Hüpfer“) weiter, bis der Empfänger erreicht ist. Bsp.:
</p>
<ul>
    <li>
        Versand eines Pakets <img src="../../res/img/ip-pakete-1.png" alt="" style="height:40px;">: Die Route lautet ${\color{blue}A1} \rightarrow {\color{blue}A2}$. Es gibt einen Hop, nämlich ${\color{blue}A2}$.
    </li>
    <li>
        Versand eines Pakets <img src="../../res/img/ip-pakete-2.png" alt="" style="height: 40px;">: Die Route lautet ${\color{blue}A1} \rightarrow {\color{green}R1} \rightarrow {\color{#FF7800}B3}$. Es gibt zwei Hops; erst ${\color{green}R1}$, dann ${\color{#FF7800}B3}$.
    </li>
</ul>
<p class="text-center">
    <img src="../../res/filius/img/zwei-netze-192-168-0-0-24-und-20-0-0-0-12-zustellung-uebersicht.png" alt="" style="max-width: 80%;">
</p>
<? acc_heading(2, 'Bestimmung des nächsten Hop'); ?>
<p>
    Für eine unvollständige Route $... \rightarrow R \rightarrow ~?$ soll von Rechner „$R$“ aus der nächste Hop bestimmt werden. Es wird zwischen <strong>zwei Fällen</strong> unterschieden.
</p>
<div class="row">
    <div class="col">
        <div class="card border-dark">
            <div class="card-header stack">
                <p><strong><em>(A)</em></strong> Rechner $R$ und Empfänger <strong>im selben</strong> LAN</p>
            </div>
            <div class="card-body stack">
                <p>
                    Bsp.: Rechner ${\color{blue}A1}$ soll <img src="../../res/img/ip-pakete-1.png" alt="" style="height:40px;"> zustellen.
                </p>
                <p>
                    Der zustellende Rechner ${\color{blue}A1}$ und der Empfänger ${\color{blue}A2}$ befinden sich im selben LAN.
                </p> 
                <p>
                    Der gemeinsame LAN-Präfix lautet nämlich <code>192.168.0.0 / 24</code>.
                </p>
                <p>
                    Das Paket wird <strong>lokal zugestellt</strong>, d.h. der nächste und letzte Hop lautet ${\color{blue}A2}$ und die Route wird mit ${\color{blue}A1} \rightarrow {\color{blue}A2}$ abgeschlossen.
                </p>
                <p class="text-center">
                    <a href="../../res/filius/img/zwei-netze-192-168-0-0-24-und-20-0-0-0-12-zustellung-lokal.png"><img src="../../res/filius/img/zwei-netze-192-168-0-0-24-und-20-0-0-0-12-zustellung-lokal.png" alt="" style="max-width: 100%;"></a>
                </p>
            </div>
        </div>
    </div>
    <div class="col">
        <div class="card border-dark">
            <div class="card-header stack">
                <p><strong><em>(B)</em></strong> Rechner $R$ und Empfänger <strong>in verschiedenen</strong> LANs</p>
            </div>
            <div class="card-body stack">
                <p>
                    Bsp.: Rechner ${\color{blue}A1}$ soll <img src="../../res/img/ip-pakete-2.png" alt="" style="height:40px;"> zustellen.
                </p>
                <p>
                    Der zustellende Rechner ${\color{blue}A1}$ und der Empfänger ${\color{#FF7800}B3}$ befinden sich <strong>nicht</strong> im selben LAN.
                </p>
                <p>
                    Die LAN-Präfixe lauten nämlich <code>192.168.0.0 / 24</code> und <code>20.0.0.0 / 12</code>.
                </p>
                <p>
                    Das Paket kann <strong>nicht lokal zugestellt</strong> werden. Es gibt nun zwei Fälle.
                </p>
                <div class="row">
                    <div class="col">
                        <div class="card border-dark">
                            <div class="card-header stack">
                                <p><strong><em>(1)</em></strong> Gateway</p>
                            </div>
                            <div class="card-body stack">
                                <p>
                                    Beim zustellenden Rechner, im Bsp. ${\color{blue}A1}$, wurde ein <dfn>Gateway</dfn> konfiguriert, z.B. ${\color{green}R1}$ (<code>192.168.0.1</code>).
                                </p>
                                <p>
                                    <img src="../../res/filius/img/zwei-netze-192-168-0-0-24-und-20-0-0-0-12-konfiguration-gateway.png" alt="" style="max-width: 100%;">
                                </p>
                                <p>
                                    Der nächste Hop lautet dann ${\color{green}R1}$. In unserem Beispiel wird die Route also mit ${\color{blue}A1} \rightarrow {\color{green}R1} \rightarrow ~?$ fortgeführt und die Bestimmung des nächsten Hop beginnt erneut. 
                                </p>
                                <p class="text-center">
                                    <a href="../../res/filius/img/zwei-netze-192-168-0-0-24-und-20-0-0-0-12-zustellung-gateway.png"><img src="../../res/filius/img/zwei-netze-192-168-0-0-24-und-20-0-0-0-12-zustellung-gateway.png" alt="" style="max-width: 100%;"></a>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card border-dark">
                            <div class="card-header stack">
                                <p><strong><em>(2)</em></strong> <strong>Kein</strong> Gateway</p>
                            </div>
                            <div class="card-body stack">
                                <p>
                                    Beim zustellenden Rechner, im Bsp. ${\color{blue}A1}$, wurde <strong>kein</strong> <dfn>Gateway</dfn> konfiguriert.<br><br>
                                </p>
                                <p>
                                    <img src="../../res/filius/img/zwei-netze-192-168-0-0-24-und-20-0-0-0-12-konfiguration-kein-gateway.png" alt="" style="max-width: 100%;">
                                </p>
                                <p>
                                    Es gibt keinen nächsten Hop. In unserem Beispiel kann die Route also nicht abgeschlossen werden: ${\color{blue}A1} \rightarrow \times$ Es wird die Fehlermeldung „Zieladresse nicht erreichbar“ angezeigt.
                                </p>
                                <p class="text-center">
                                    <a href="../../res/filius/img/zwei-netze-192-168-0-0-24-und-20-0-0-0-12-zustellung-fail.png"><img src="../../res/filius/img/zwei-netze-192-168-0-0-24-und-20-0-0-0-12-zustellung-fail.png" alt="" style="max-width: 100%;"></a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<? acc_item_end(); ?>
<? acc_end(); ?>




<? nav_h(2, 'Aufgaben'); ?>

<? ex_start('Filius'); ?>
<ol>
    <li>
        <p><strong>Konstruiere</strong> das folgende Netz in Filius.</p>
    </li>
    <li>
        <p><strong>Konfiguriere</strong> die Gateways auf den Rechnern, so dass die Verbindung zwischen den Rechnern <strong>erfolgreich</strong> ist.</p>
    </li>
    <li>
        <p><strong>Prüfe</strong> die Verbindung, indem du einen Webserver auf dem Rechner mit der IP-Adresse <code>20.0.0.5</code> installierst, sowie einen Webbrowser auf dem Rechner mit der IP-Adresse <code>192.168.0.10</code>, und du eine Webseitenabfrage startest.</p>
    </li>
    <li>
        <p>
            <strong>Installiere</strong> eine Befehlszeile auf dem Rechner mit der IP-Adresse <code>192.168.0.10</code>.
        </p>
    </li>
    <li>
        <p>
            <strong>Führe</strong> auf der Befehlszeile den Befehl <code>ping 20.0.0.5</code> aus. <strong>Ändere</strong> die Geschwindigkeit <img src="../../res/filius/img/geschwindigkeit.png" alt="" style="height: 30px;">. <strong>Beschreibe</strong>, welche Auswirkung dies auf den <code>ping</code>-Befehl hat.
        </p>
    </li>
    <li>
        <p>
            <strong>Führe</strong> auf der Befehlszeile den Befehl <code>traceroute 20.0.0.5</code> aus. <strong>Prüfe</strong>, dass alle Hops korrekt erfasst werden.
        </p>
    </li>
</ol>
<p class="text-center">
    <img src="../../res/filius/img/zwei-netze-192-168-0-0-24-und-20-0-0-0-12-netz.png" alt="">
</p>
<? ex_sol(); ?>
<a href="../../res/filius/fls/zwei-netze-192-168-0-0-24-und-20-0-0-0-12.fls">Download <code>zwei-netze-192-168-0-0-24-und-20-0-0-0-12.fls</code></a>
<? ex_end(); ?>



<? ex_start('Lasten-Verteilung'); ?>
<p>
    Damit nicht ein Router die gesamte Arbeit hat, soll ein zweiter Router zwischen zwei LANs wie folgt vermitteln:
</p>
<ul>
    <li>Alle Pakete von links nach rechts sollen über den oberen Router laufen.</li>
    <li>Alle Pakete von rechts nach links sollen über den unteren Router laufen.</li>
</ul>
<p class="text-center">
    <img src="../../res/filius/img/zwei-netze-192-168-0-0-24-und-20-0-0-0-12-zwei-router-netz.png" alt="">
</p>
<p>
    Dies hat zur Folge, dass die Kommunikation „im Kreis“ abläuft.
</p>
<p>
    <strong>Bilde</strong> das abgebildete Netz in Filius nach. <strong>Konfiguriere</strong> die Gateways auf allen Rechnern gemäß der oben beschriebenen Spezifikation (s.a. Pfeile). <strong>Prüfe</strong> die Verbindung, indem du einen Webserver auf dem Rechner mit der IP-Adresse <code>20.0.0.5</code> installierst, sowie einen Webbrowser auf dem Rechner mit der IP-Adresse <code>192.168.0.10</code>, und du eine Webseitenabfrage startest.
</p>
<? ex_sol(); ?>
<a href="../../res/filius/fls/zwei-netze-192-168-0-0-24-und-20-0-0-0-12-zwei-router.fls">Download <code>zwei-netze-192-168-0-0-24-und-20-0-0-0-12-zwei-router.fls</code></a>
<? ex_end(); ?>

<? }; ?>