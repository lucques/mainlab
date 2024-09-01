<?
    $preprocess = function (TargetPreprocessContext $c) {
        $c->activate_module('role-info');

        $c->run_macro('title', 'set', plain: '8. Beliebige Netze verbinden', plain_short: '8. Belieb. Netze verbinden');
    }
?>

<? $process = function(Target $target) { ?>

<? css_start(); ?>
    #content main {
        min-width:1200px;
    }
<? css_end(); ?>

<div class="clearfix">
    <p>
        Auf dieser Seite schauen wir uns an, wie <strong>LANs über andere LANs hinweg</strong> verbunden werden können. Damit werden wir dann bereits das Internet in seiner Essenz verstanden haben.
    </p>
</div>

<? /*
<? acc_single_item_start('Beispiel 1: Drei LANs', 'example'); ?>
<div class="text-center">
    <img src="../../res/filius/img/drei-netze-192-168-0-0-24-und-20-0-0-0-12-und-5-5-0-0-16-ohne-rechner-netz.png" alt="" style="max-width: 100%;">
</div>
<? acc_single_item_end(); ?>
*/ ?>

<? acc_single_item_start('<strong>Beispiel</strong>', 'example', open: true); ?>
<p class="text-center">
    <img src="../../res/filius/img/sechs-netze-vier-router.png" alt="" style="max-width: 100%;">
</p>
<? acc_single_item_end(); ?>



<? acc_start(); ?>
<? acc_item_start('<dfn>Routing-Tabelle</dfn> (Definition)', variant: 'definition', open: true); ?>
<p>
    Jeder Router besitzt eine <dfn>Routing-Tabelle</dfn>, auch <dfn>Weiterleitungstabelle</dfn> genannt. In dieser werden fremde Netze vermerkt, sowie zu jedem dieser Netze auch der nächste Hop, der dem Netz näher kommt.
</p>
<p>
    Jeder Eintrag einer Routing-Tabelle besteht aus drei Teilen:
</p>
<ul>
    <li><dfn>Zielnetz</dfn>, z.B. <code>200.168.0.0 / 24</code></li>
    <li><dfn>IP-Adresse des nächsten Gateway</dfn>, z.B. <code>20.0.0.2</code></li>
    <li><dfn>Zum Gateway führender LAN-Anschluss</dfn>.<br>IP-Adresse des LAN-Anschlusses, von welchem aus das nächste Gateway erreicht werden kann, z.B. <code>20.0.0.1</code></li>
</ul>
<? acc_item_end(); ?>
<? acc_item_start('Analogie: Wegweiser', variant: 'info', open: true); ?>
<p>
    Denke dir eine Routing-Tabelle wie einen Wegweiser, der den Weg zu weit entfernten Zielen anzeigt. Jeder Pfeil, der am Wegweiser angebracht ist, entspricht einem Eintrag in der Routing-Tabelle.
</p>
<table class="table">
    <colgroup>
        <col style="width:30%">
        <col style="width:30%">
        <col style="width:40%">
    </colgroup> 
    <thead>
        <tr>
            <th>Städte-Wegweiser</th>
            <th>Netz-Wegweiser</th>
            <th>Routing-Tabelle</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td><img src="res/wegweiser-1.png" alt="" style="max-width: 100%;"></td>
            <td><img src="res/wegweiser-2.png" alt="" style="max-width: 100%;"></td>
            <td>
                <p><img src="../../res/filius/img/sechs-netze-vier-router-r1-routing-tabelle.png" alt="" style="width: 100%;"></p>
                <p>
                    <em>Bitte „Alle Einträge anzeigen“ deaktivieren!</em>
                </p>
            </td>
        </tr>
        <tr>
            <td>
                <p>
                    Um nach <strong>München</strong> zu gelangen,<br>
                    gehe zunächst nach <strong>Schwerin</strong>,<br>
                    über die <strong>rechte Abbiegung</strong>.
                </p>
            </td>
            <td>
                <p>
                    Um zum <strong>4.0.0.x</strong>-Netz zu gelangen,<br>
                    gehe zunächst zu <strong>Router R2</strong>,<br>
                    über den <strong>rechten LAN-Anschluss</strong>.
                </p>
            </td>
            <td>
                <ul>
                    <li>
                        <strong>Ziel:</strong><br>
                        <em>Netzpräfix ohne Präfixlänge = „4.0.0.0“</em>
                    </li>
                    <li>
                        <strong>Netzmaske:</strong><br>
                        <em>„255.255.255.0“</em>
                    </li>
                    <li>
                        <strong>Nächstes Gateway:</strong><br>
                        <em>„Router R2“ = „2.0.0.2“</em>
                    </li>
                    <li>
                        <strong>Über Schnittstelle:</strong><br>
                        <em>„rechter LAN-Anschluss“ = „2.0.0.1“</em>
                    </li>
                </ul>
            </td>
        </tr>
    </tbody>
</table>
<? acc_item_end(); ?>
<? acc_end(); ?>


<? nav_h(2, 'Aufgaben'); ?>
<? ex_start('Routing-Tabellen konfigurieren'); ?>
<p>
    Das Ziel dieser Aufgabe ist es, die folgenden sechs Netze über die vier Router zu verbinden.
</p>
<p class="text-center">
    <img src="../../res/filius/img/sechs-netze-vier-router.png" alt="" style="max-width: 100%;">
</p>
<p>
    Um dir Arbeit zu ersparen, wurden die folgenden Konfigurationen bereits getätigt:
</p>
<ul>
    <li>IP-Adressen der Endgeräte und Router</li>
    <li>Gateways der Endgeräte</li>
</ul>
<p>
    <strong>Lade</strong> die Filius-Vorlage <a href="../../res/filius/fls/sechs-netze-vier-router-unkonfiguriert.fls">hier</a> <strong>herunter</strong> und <strong>öffne</strong> sie in Filius. <strong>Konfiguriere</strong> die Routing-Tabellen der Router. <strong>Prüfe</strong> die Verbindungen, indem du von den Endgeräten aus...
</p>
<ul>
    <li>die anderen Endgeräte anpingst.</li>
    <li>die vier Router anpingst.</li>
</ul>

<? ex_sol(); ?>
<a href="../../res/filius/fls/sechs-netze-vier-router.fls">Download <code>sechs-netze-vier-router.fls</code></a>
<? ex_end(); ?>

<? }; ?>