<?
    $preprocess = function (TargetPreprocessContext $c) {
        $c->activate_module('role-info');
        
        $c->run_macro('title', 'set', '6. Netzmaske und LAN-Anschluss');
    };
?>

<? $process = function(Target $target) { ?>

<p>
    Es folgt zunächst noch ein technisches Detail. Historisch hat es sich so entwickelt, dass man statt der Länge des Netzpräfix eine sogenannte <dfn>Netzmaske</dfn> angibt. Anschließend konfigurieren wir unser LAN mit Filius.
</p>


<? nav_h(2, '6.1 Netzmaske'); ?>
<p>
    Es gilt folgende einfache 1-zu-1-Beziehung <span class="text-nowrap"><dfn>Präfixlänge</dfn> $\leftrightarrow$ <dfn>Netzmaske</dfn></span>.
</p>


<? acc_start(); ?>
<? acc_item_start('<dfn>Netzmaske</dfn> (Definition)', variant: 'definition', open: true); ?>
<p>
    Eine <dfn>Netzmaske</dfn> besteht aus einer Folge von 32 Bits; der vordere Teil besteht nur aus $1$en, der hintere Teil nur aus $0$en. Die Anzahl der $1$en im vorderen Teil steht genau für die Länge eines Netzpräfixes. Bsp.:
</p>
<p class="text-center"><img src="../../res/img/netz-13.png" alt="" style="max-width: 100%;"></p>
<? acc_item_end(); ?>
<? acc_end(); ?>


<p>
    Was hat es mit der Netzmaske auf sich? Mit anderen Worten, weshalb notieren wir nicht einfach die Präfixlänge <code>/ 24</code> statt die Netzmaske <code>11111111 11111111 11111111 00000000</code> bzw. <code>255.255.255.0</code> anzugeben?
</p>
<p>
    Der Begriff „Maske“ kommt daher, dass man sie auf eine IP-Adresse „auflegen“ kann und so entweder den Netz-Teil oder den Host-Teil der IP-Adresse „abdecken“ bzw. „aufdecken“ kann. Die bitweise Konjunktion („Ver-und-ung“) erledigt das „Auflegen“ der Maske. Der folgende Abschnitt erklärt den technischen Hintergrund.
</p>



<? acc_start(); ?>
<? acc_item_start('<dfn>Netzmaske</dfn> auf <dfn>IP-Adresse</dfn> „auflegen“', variant: 'info', open: false); ?>
<p>
    Ein „Auflegen“ der Netzmaske auf eine IP-Adresse mittels bitweiser Konjunktion (<code>&</code>) zerlegt die IP-Adresse in <strong>Netz-Teil</strong> und <strong>Geräte-Teil</strong>.
</p>
<p class="text-center"><img src="../../res/img/netzmaske.png" alt="" style="max-width: 100%;"></p>
<? acc_item_end(); ?>
<? acc_end(); ?>



<? nav_h(2, '6.2. Rechner ans LAN anschließen'); ?>
<p>
    Nachdem ein Rechner per Kabel an ein LAN angeschlossen wurde (<em>Hardware</em>), muss er noch konfiguriert werden (<em>Software</em>).
</p>


<? acc_start(); ?>
<? acc_item_start('<dfn>Konfiguration eines LAN-Anschlusses</dfn> (Definition)', variant: 'definition', open: true); ?>
<div class="grid" style="grid-template-columns: auto min-content;">
    <div>
        <p class="first-child">
            Ein <dfn>LAN-Anschluss</dfn> verbindet einen Rechner über ein Kabel mit einem LAN. Die kabellose Variante über ein Funkmodul wird als <dfn>WLAN-Anschluss</dfn> bezeichnet. Siehe auch die Bilder rechts.
        </p>
        <p>
            Die <dfn>Konfiguration eines LAN-Anschlusses</dfn> besteht aus
        </p>
        <ol>
            <li><strong>IP-Adresse</strong>, z.B. $192.168.0.12$</li>
            <li><strong>LAN-Präfix</strong>, z.B. $192.168.0.0~/~24$</li>
        </ol>
        <p class="last-child">
            Da der LAN-Präfix ja bereits in der IP-Adresse enthalten ist, genügt es, die Präfixlänge anzugeben. Man schreibt die Präfixlänge einfach hinter die IP-Adresse, also in unserem Beispiel: $192.168.0.12~/~24$
        </p>
    </div>
    <div>
        <nav>
            <div class="nav nav-tabs">
                <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#image-anschluss-lan" type="button" role="tab">LAN</button>
                <button class="nav-link" data-bs-toggle="tab" data-bs-target="#image-anschluss-wlan" type="button" role="tab">WLAN</button>
            </div>
        </nav>
        <div class="tab-content">
            <div class="tab-pane fade show active" id="image-anschluss-lan" style="height: 200px;">
                <? ref_img(__DIR__ . '/../../res/img/netzwerkkarte.jpg', style: 'width: 200px;'); ?>
            </div>
            <div class="tab-pane fade" id="image-anschluss-wlan" style="height: 200px;">
                <? ref_img(__DIR__ .  '/../../res/img/wlan-adapter.jpg', style: 'width: 200px;'); ?>
            </div>
        </div>
    </div>
</div>
<? acc_item_end(); ?>
<? acc_end(); ?>



<? acc_start(); ?>
<? acc_item_start('<strong>Eingabe bei Filius</strong>', variant: 'info', open: false); ?>
<p>
    Bei Filius wird statt...
</p>
<ul>
    <li><strong>IP-Adresse</strong> und <strong>LAN-Präfixlänge</strong>, z.B. $192.168.0.12~/~24$...</li>
    <li><strong>IP-Adresse</strong> und <strong>LAN-Netzmaske</strong> eingestellt, hier also $192.168.0.12$ und $255.255.255.0$.</li>
</ul>
<div class="text-center">
    <img src="../../res/filius/img/192-168-0-0-24-netz-konfiguration-ip-netzmaske.png" alt="" style="width:700px;">
</div>
<? acc_item_end(); ?>
<? acc_item_start('Kommentar', variant: 'remark'); ?>
<p>
    Netzmasken sind keine besonders elegante Lösung, um die Präfixlänge zu notieren. Statt z.B. <code>255.240.0.0</code> kann man viel besser <code>/ 12</code> schreiben. Leider hat es sich aber historisch so entwickelt, dass statt der LAN-Präfixlänge die LAN-Netzmaske angegeben wird. Letztendlich jedoch handelt sich nur um ein kleines technisches Detail; beide Darstellungen <strong>Präfixlänge</strong> und <strong>Netzmaske</strong> sind gleichwertig und austauschbar.
</p>
<? acc_item_end(); ?>
<? acc_end(); ?>



<? acc_single_item_start('Beispiel', 'example', open: false); ?>
<p>
    Das untenstehende LAN mit dem Präfix $20.0.0.0~/~12$ soll in Filius konfiguriert und simuliert werden.
</p>
<p class="text-center">
    <img src="../../res/filius/img/20-0-0-0-12-netz.png" alt="" style="width:600px;">
</p>
<p>
    Die zu „$/~12$“ gehörige Netzmaske lautet $11111111~11110000~00000000~00000000 = 255.240.0.0$
</p>
<p>
    Es genügt nicht, die IP-Adressen einzustellen, da bei den Rechnern die Standardeinstellung der Netzmaske $255.255.255.0$ lautet. Somit befinden sich die IP-Adressen zunächst nicht im selben LAN. Probiere aus, was passiert, wenn du die IP-Adressen einstellst, aber die Netzmaske bei $255.255.255.0$ belässt.
</p>
<p>
    Für die Rechner muss also nun die Netzmaske eingestellt werden.
</p>
<div class="row">
    <div class="col">
        <img src="../../res/filius/img/20-0-0-0-12-netzmaske-1.png" alt="" style="max-width: 100%;">
    </div>
    <div class="col">
        <img src="../../res/filius/img/20-0-0-0-12-netzmaske-2.png" alt="" style="max-width: 100%;">
    </div>
    <div class="col">
        <img src="../../res/filius/img/20-0-0-0-12-netzmaske-3.png" alt="" style="max-width: 100%;">
    </div>
</div>
<p>
    Anschließend funktioniert die Verbindung zwischen den Rechnern.
</p>
<p>
    <strong>Aufgabe:</strong> <strong>Prüfe</strong>, dass die Rechner per <code>ping</code>-Befehl miteinander kommunizieren können.
</p>
<p class="text-center">
    <img src="../../res/filius/img/20-0-0-0-12-ping.png" alt="" style="width: 500px;">
</p>
<? acc_single_item_end(); ?>




<? nav_h(2, 'Aufgaben'); ?>




<? ex_start(open: false); ?>
<ol style="list-style-type: lower-alpha;">
    <li><p>Gegeben ist das Netz <code>40.0.0.0 / 17</code>. <strong>Bestimme</strong> die zugehörige Netzmaske in Binär- und Dezimalschreibweise.</p></li>
    <li><p><strong>Wähle</strong> drei IP-Adressen, die sich in dem Netz befinden.</p></li>
    <li><p>Gegeben ist die Netzmaske <code>255.254.0.0</code>. <strong>Bestimme</strong> die zugehörige Präfixlänge. <strong>Denke</strong> dir einen dazugehörigen Präfix <strong>aus</strong> und notiere ihn in Binär- und Dezimalschreibweise.</p></li>
</ol>
<? ex_sol(open: false); ?>
<? source_start(line_numbers: false); ?>
a)  Präfixlänge:    17
    Netzmaske:      11111111 11111111 10000000 00000000         =   255.255.128.0

b)  Präfix:         00101000 00000000 00000000 00000000 / 17    =   40.0.0.0 / 17
    IP-Adressen:
    Bsp. 1:         00101000 00000000 00000000 00000001         =   40.0.0.1
    Bsp. 2:         00101000 00000000 01111110 00000001         =   40.0.126.1
    Bsp. 3:         00101000 00000000 01111111 00000001         =   40.0.127.1
    Gegenbsp.:      00101000 00000000 10000000 00000001         =   40.0.128.1
                    ^^^^^^^^ ^^^^^^^^ ^ 
                                      * (NICHT im Netz)

c)  255.254.0.0 =   11111111 11111110 00000000 00000000

    Präfixlänge:    15

    Präfix: Z.B.:   10011010 01101100 00000000 00000000 / 15    =   154.108.0.0 / 15
                    ^^^^^^^^ ^^^^^^^  

<? source_end(); ?>
<? ex_end(); ?>




<? ex_start('Filius', open: false); ?>
<p>
    Betrachte folgendes LAN. Die LAN-Netzmaske lautet <code>255.240.0.0</code>.
</p>
<p class="text-center">
    <img src="../../res/filius/img/20-0-0-0-12-klein-netz-mit-netzmaske.png" alt="" style="width:400px;">
</p>
<ol style="list-style-type: lower-alpha;">
    <li>
        <p><strong>Bestimme</strong> die Präfixlänge des LANs.</p>
    </li>
    <li>
        <p><strong>Prüfe</strong>, dass sich die drei IP-Adressen <code>20.0.0.1</code>, <code>20.1.4.2</code> und <code>20.14.0.3</code> im obigen LAN befinden. <strong>Begründe</strong>.</p>
    </li>
    <li>
        <p><strong>Bestimme</strong> den LAN-Präfix in Binär- und Dezimalschreibweise.</p>
    </li>
    <li>
        <p><strong>Konstruiere</strong> und <strong>konfiguriere</strong> das LAN in Filius.</p>
    </li>
    <li>
        <p>
            <strong>Installiere</strong> auf dem Rechner <code>20.0.0.1</code> einen Webserver und auf den anderen beiden Rechnern zwei Webbrowser. <strong>Starte</strong> den Webserver. <strong>Rufe</strong> die Webseite <code>http://20.0.0.1</code> von beiden Webbrowsern aus auf.
        </p>
    </li>
</ol>
<? ex_sol(open: false); ?>
<? source_start(line_numbers: false); ?>
a)  255.240.0.0 =   11111111 11110000 00000000 00000000

    Präfixlänge:    12

                    vvvvvvvv vvvv
b)  20.0.0.1    =   00010100 00000000 00000000 00000001
    20.1.4.2    =   00010100 00000001 00000100 00000010
    20.14.0.3   =   00010100 00001110 00000000 00000011

    Die ersten 12 Ziffern sind gleich. Also befinden sich die IP-Adressen im selben LAN.
    Der Präfix des LANs sind diese 12 Ziffern.
    
c)  LAN-Präfix:     00010100 00000000 00000000 00000000 / 12 =   20.0.0.0 / 12
<? source_end(); ?>
<? ex_end(); ?>




<? ex_start('Netzmasken-Rechner'); ?>
<p>
    Auf <a href="https://www.inf-schule.de/rechnernetze/filius/vernetzungrechnernetze/netzmaske_rechner">dieser Webseite</a> gibt es einen Netzmasken-Rechner. Hiermit kannst du prüfen, ob zwei IP-Adressen im selben Netz liegen.
</p>
<p>Gegeben ist ein Rechner, dessen LAN-Anschluss wie folgt konfiguriert ist:</p>
<ul>
    <li>
        IP-Adresse: <code>20.14.0.3</code>
    </li>
    <li>
        Netzmaske: <code>255.240.0.0</code>
    </li>
</ul>
<ol style="list-style-type: lower-alpha;">
    <li>
        <p>
            <strong>Übersetze</strong> die IP-Adresse und die Netzmaske in Binärdarstellung. <strong>Bestimme</strong> die Länge des LAN-Präfix.
        </p>
    </li>
    <li>
        <p>
            <strong>Zerlege</strong> die IP-Adresse gemäß bitweiser Konjunktion mit der Netzmaske in Netz- und Host-Teil.
        </p>
    </li>
    <li>
        <p>
            <strong>Erläutere</strong>, ob sich die IP-Adresse <code>20.16.0.1</code> im selben LAN befindet.
        </p>
    </li>
    <li>
        <p>
            <strong>Erläutere</strong>, ob sich die IP-Adresse <code>20.12.0.1</code> im selben LAN befindet.
        </p>
    </li>
    <li>
        <p>
            <strong>Gib</strong> die Broadcast-Adresse des LANs <strong>an</strong>.
        </p>
    </li>
</ol>
<? ex_sol(open: false); ?>
<? source_start(line_numbers: false); ?>
a)
    Netzmaske
    255.240.0.0 =   11111111 11110000 00000000 00000000

    invertierte
    Netzmaske   =   00000000 00001111 11111111 11111111

    Präfixlänge ist 12.

    20.14.0.3   =   00010100 00001110 00000000 00000011
                    ^^^^^^^^ ^^^^

b)
    Netz-Teil:      00010100 00001110 00000000 00000011
                  & 11111111 11110000 00000000 00000000  (Netzmaske)
                    -----------------------------------
                    00010100 00000000 00000000 00000000     
                    ^^^^^^^^ ^^^^  
    
    Host-Teil:      00010100 00001110 00000000 00000011
                  & 00000000 00001111 11111111 11111111  (invertierte Netzmaske)
                    -----------------------------------
                    00000000 00001110 00000000 00000011
                                 ^^^^ ^^^^^^^^ ^^^^^^^^

c)  Nein, sie befindet sich nicht im selben LAN.
    20.16.0.1   =   00010100 00010000 00000000 00000001
                    ^^^^^^^^ ^^^*

d)  Ja, sie befindet sich im selben LAN.
    20.12.0.1   =   00010100 00001100 00000000 00000001
                    ^^^^^^^^ ^^^^                    
    
e)  20.15.255.255:  00010100 00001111 11111111 11111111
<? source_end(); ?>
<? ex_end(); ?>

<section><em>Quellen:</em><? ref_print_list(); ?> </section>

<? }; ?>