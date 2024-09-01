<?
    $preprocess = function (TargetPreprocessContext $c) {
        $c->activate_module('role-info');

        $c->run_macro('title', 'set', '2. Das erste Netz');
    };
?>

<? $process = function(Target $target) { ?>

<p>
    Wir betrachten nun unser erstes Netz von Rechnern. Jeder Rechner erhält eine <dfn>IP-Adresse</dfn>.
</p>

<? acc_start(); ?>
<? acc_item_start('<dfn>IP-Adresse</dfn> (Definition)', variant: 'definition', open: true); ?>
<p>
    Eine <dfn>IP-Adresse</dfn> ist eine Folge von 32 Bits. Sie wird üblicherweise entweder im Binärsystem dargestellt oder im Dezimalsystem, wobei hier jeweils 8 Bits gruppiert werden. Bsp.:
</p>
<p class="text-center"><img src="../../res/img/netz-1.png" alt="" style="max-width: 100%;"></p>
<? acc_item_end(); ?>


<? acc_item_start('Erklärung', variant: 'info'); ?>
<p>
    Die Binärdarstellung einer IP-Adresse, z.B.
</p>
<p class="text-center"><img src="../../res/img/netz-2.png" alt="" style="max-width: 100%;"></p>

<p>
    ... ist für Menschen etwas unhandlich, deshalb schreiben wir eine IP-Adresse immer als vier Zahlen im Dezimalsystem, abgetrennt mit Punkten im Format $A{.}B{.}C{.}D$, für unser Beispiel also
</p>
<p class="text-center"><img src="../../res/img/netz-3.png" alt="" style="max-width: 100%;"></p>
<p>
    Jede Zahl $A$, $B$, $C$ und $D$ liegt also zwischen
    $00000000_2 = 0$ und
    $11111111_2 = 255$.
</p>
<? acc_item_end(); ?>


<? acc_item_start('Ergänzung: IPv6 (optional)', 'light'); ?>
<p>
    Es gibt mittlerweile <a href="https://de.wikipedia.org/wiki/IPv6">IPv6-Adressen</a> (<em>Version 6</em>, 128 Bit), die anders aussehen als die von uns verwendeten <a href="https://de.wikipedia.org/wiki/IPv4">IPv4-Adressen</a> (<em>Version 4</em>, 32 Bit). Hier ein Beispiel für eine IPv6-Adresse: <code>2001:0db8:85a3:08d3:1319:8a2e:0370:7347</code>. 
</p>
<p>
    Aus konzeptueller Sicht ist das genaue Format aber nicht wichtig; der Einfachheit halber arbeiten wir hier mit IPv4-Adressen.
</p>
<? acc_item_end(); ?>
<? acc_end(); ?>


<p>
    IP-Adressen werden durch <dfn>Präfixe</dfn> geordnet. Mehr dazu auf der <a href="../netzpraefix-adressraum-lan/">nächsten Seite</a>. Grob gesagt, ist „Präfix“ ein anderes Wort für „Vorspann“, „Vorsilbe“ und entspricht der Vorwahl bei einer Telefonnummer. Mehrere Rechner, die einen gemeinsamen Präfix haben und miteinander verbunden sind, gehören zum selben <dfn>Netz</dfn>.
</p>
<table class="table">
    <tbody>
        <tr>
            <th>Telefonnetz</th>
            <td>Das Schönberg-Telefonnetz wird durch den <strong>Präfix</strong> <code>0049 38828</code> beschrieben.</td>
            <td>Das Ernst-Barlach-Gymnasiums hat die <strong>Telefonnummer</strong> <code>0049 38828 24433</code>, welche also diesen Präfix besitzt.</td>
        </tr>
        <tr>
            <th>IP-Netz</th>
            <td>Das Netz im Raum K10 wird durch den <strong>Präfix</strong> <code>10.31.0.X</code> beschrieben.</td>
            <td>Der Lehrer-Rechner hat die <strong>IP-Adresse</strong> <code>10.31.0.41</code>, welche also diesen Präfix besitzt.</td>
        </tr>
    </tbody>
</table>


<? nav_h(2, 'Aufgaben'); ?>


<? ex_start('Netz mit Filius simulieren', open: false); ?>
<ol style="list-style-type: lower-alpha;">
    <li>
        <p><strong>Öffne</strong> Filius.</p>
    </li>
    <li>
        <p>
            <strong>Erstelle</strong> ein Netz aus drei Rechnern, verbunden über Kabel und einen Switch.<br>
            Einen Switch kannst du dir erstmal als eine „Kabelkreuzung“ vorstellen, mehr dazu später.
        </p>
    </li>
    <li>
        <p>
            <strong>Konfiguriere</strong> die Rechner mit IP-Adressen wie folgt. Der gemeinsame Präfix lautet <code>192.168.0.X</code>.
            <strong>Wähle</strong> „IP-Adresse als Name verwenden“ für eine besser Übersicht.
        </p>
        <p class="text-center">
            <img src="../../res/filius/img/192-168-0-0-24-netz.png" alt="">
            <img src="../../res/filius/img/192-168-0-0-24-konfigurieren.png" alt="" style="max-width:100%;">
        </p>
    </li>
    <li>
        <p>
            <strong>Wechsele</strong> in den Aktionsmodus <img src="../../res/filius/img/aktionsmodus.png" alt="" style="height: 30px;"> und <strong>öffne</strong> den Desktop des Rechners mit der IP-Adresse <code>192.168.0.10</code>. <strong>Installiere</strong> und <strong>öffne</strong> die Befehlszeile <img src="../../res/filius/img/befehlszeile.png" alt="" style="height: 30px;">.
        </p>
        <div class="row">
            <div class="col">
                <img src="../../res/filius/img/192-168-0-0-24-desktop-10.png" alt="" style="max-width:100%;">

            </div>
            <div class="col">
                <img src="../../res/filius/img/192-168-0-0-24-desktop-10-ping.png" alt="" style="max-width:100%;">
            </div>
        </div>
        <p class="text-center">
        </p>
    </li>
    <li>
        <p>
            <strong>Führe</strong> den Befehl <code>ping 192.168.0.11</code> aus, um den benachbarten Rechner über das Netz anzupingen.
        </p>
    </li>
    <li>
        <p>
            <strong>Installiere</strong> auf einem Rechner einen Webbrowser.<br>
            <strong>Installiere</strong> auf dem anderen Rechner einen Webserver.<br>
            <strong>Rufe</strong> die Webseite mit dem Browser <strong>auf</strong>, indem du <code>http://192.160.0.11</code> in die Adresszeile eingibst.
        </p>
    </li>
    <li>
        <p>
            <strong>Erläutere</strong>, was passiert.
        </p>
    </li>
</ol>
<? ex_hint(); ?>
<p>
    Auf dem linken Rechner <code>192.168.0.10</code> ist der Webbrowser installiert.<br>
    Auf dem rechten Rechner <code>192.168.0.11</code> ist der Webserver installiert.
</p>
<p>
    Wichtig: Der Webserver ist eine App, die explizit vom Systemadministrator/in gestartet werden muss. Wenn du die Webseite nicht aufrufen kannst, überprüfe also, ob der Webserver läuft.
</p>
<div class="row">
    <div class="col">
        <img src="../../res/filius/img/192-168-0-0-24-desktop-10-webbrowser.png" alt="" style="max-width:100%;">

    </div>
    <div class="col">
        <img src="../../res/filius/img/192-168-0-0-24-desktop-11-webserver.png" alt="" style="max-width:100%;">
    </div>
</div>
<? ex_end(); ?>

<? }; ?>