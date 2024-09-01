<?
    $preprocess = function (TargetPreprocessContext $c) {
        $c->activate_module('role-info');
        
        $c->run_macro('title', 'set', '5. Netzpräfix, Adressraum und LAN');
    };
?>

<? $process = function(Target $target) { ?>

<p>
    Wir haben bereits gesehen, dass Rechner eines Netzes denselben Netzpräfix haben („dieselbe Vorwahl“). Um später die verschiedenen Netze zusammenfügen zu können (größtes Beispiel dafür: das Internet), betrachten wir nun das System der Netzpräfixe etwas genauer.
</p>


<? acc_start(); ?>
<? acc_item_start('<dfn>Netzpräfix</dfn> (Definition)', variant: 'definition', open: true); ?>
<p>
    Ein <dfn>Netzpräfix</dfn> ist eine Folge von <em>bis zu</em> 32 Bits, welche zu einer IP-Adresse ergänzt werden können. Z.B.:
</p>
<p class="text-center"><img src="../../res/img/netz-4.png" alt="" style="max-width: 100%;"></p>
<p>
    Zum Verschriftlichen wird dieser Präfix durch $0$en auf 32 Bits aufgefüllt und wie eine IP-Adresse notiert, mit anschließender Angabe der <dfn>Präfixlänge</dfn>, hier also 24.
</p>
<p class="text-center"><img src="../../res/img/netz-5.png" alt="" style="max-width: 100%;"></p>
<p>
    Ein <dfn>Netzpräfix</dfn> $192.168.2.0~/~24$ wird auch kurz „<dfn>Netz</dfn>“ genannt.
</p>
<? acc_item_end(); ?>
<? acc_end(); ?>



<? acc_start(); ?>
<? acc_item_start('<dfn>Adressraum</dfn> (Definition)', variant: 'definition', open: true); ?>
<p>
    Der <dfn>Adressraum</dfn> eines Netzpräfixes ist die Menge aller IP-Adressen, die sich durch Auffüllen des Netzpräfixes auf 32 Bits ergeben. Z.B. spannt der Netzpräfix...
</p>
<p class="text-center"><img src="../../res/img/netz-8.png" alt="" style="max-width: 100%;"></p>
<p>
    ...den folgenden Adressraum von 256 verschiedenen IP-Adressen auf. Jede IP-Adresse lässt sich in einen <dfn>Netz-Teil</dfn> und einen <dfn>Geräte-Teil</dfn> zerlegen.
</p>
<p class="text-center"><img src="../../res/img/netz-9.png" alt="" style="max-width: 100%;"></p>

<p>
    Zwei Adressen jedes Adressraums sind speziell:
</p>
<ul>
    <li>Die niedrigste Adresse (hier $192.168.0.0$) wird nicht vergeben, da sie für den Netzpräfix steht.</li>
    <li>Die höchste Adresse (hier $192.168.0.255$) ist die sogenannte Broadcast-Adresse, dazu später mehr.</li>
</ul>
<? acc_item_end(); ?>
<? acc_end(); ?>



<? acc_start(); ?>
<? acc_item_start('<dfn>LAN (Local Area Network)</dfn> (Definition)', variant: 'definition', open: true); ?>
<div class="grid" style="grid-template-columns: auto min-content;">
    <div>
        <p class="first-child">
            Ein <dfn>LAN (Local Area Network)</dfn> ist ein Netz von Rechnern, die über Kabel und Switches <em>lokal</em> (z.B. innerhalb eines Raums) miteinander verbunden sind. Die kabellose Variante wird <dfn>WLAN (Wireless LAN)</dfn> genannt.
        </p>
        <p>
            Alle Rechner eines LANs teilen sich einen gemeinsamen Netzpräfix, den sogenannten <dfn>LAN-Präfix</dfn>.
        </p>
        <p>
            Für das rechts abgebildete LAN ist z.B. der gemeinsame LAN-Präfix $192.168.0.0~/~24$ vereinbart. Die drei Rechner sind über die folgenden IP-Adressen an das LAN angeschlossen.
        </p>
        <ul>
            <li>$192.168.0.10$</li>
            <li>$192.168.0.11$</li>
            <li>$192.168.0.12$</li>
        </ul>
        <p class="last-child">
            Beispiele für in diesem LAN <em>un</em>zulässige IP-Adressen sind $192.168.1.10$ und $168.168.0.10$.
        </p>
    </div>
    <div>
        <nav>
            <div class="nav nav-tabs">
                <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#image-lan" type="button" role="tab">LAN</button>
                <button class="nav-link" data-bs-toggle="tab" data-bs-target="#image-wlan" type="button" role="tab">WLAN</button>
            </div>
        </nav>
        <div class="tab-content">
            <div class="tab-pane fade show active" id="image-lan">
                <p class="text-center">
                    <img src="../../res/filius/img/192-168-0-0-24-netz-mit-praefix.png" alt="" style="width: 350px;">
                    <? ref_img(__DIR__ . '/res/lan-kabel.jpg', style: 'width: 250px; margin-top:20px;'); ?>
                </p>
            </div>
            <div class="tab-pane fade" id="image-wlan">
                <p class="text-center">
                    <img src="../../res/filius/img/192-168-0-0-24-netz-mit-praefix-wlan.png" alt="" style="width: 350px;">
                    <? ref_img(__DIR__ . '/res/wlan-access-point.jpg', style: 'width: 250px; margin-top:20px;'); ?>
                </p>
            </div>
        </div>
    </div>
</div>
<? acc_item_end(); ?>
<? acc_end(); ?>



<? acc_single_item_start('<strong>Beispiel</strong>', 'example', open: false); ?>
<div class="clearfix">
    <img src="../../res/filius/img/20-0-0-0-8-netz-mit-praefix.png" alt="" class="float-end" style="width: 500px;">
    <p class="first-child">
        Es soll ein LAN konfiguriert werden, in welchem sich folgende Rechner mit den angegebenen IP-Adressen befinden. Der zu wählende LAN-Präfix muss also alle drei IP-Adressen abdecken.
    </p>
    <p>
        Man könnte nun als Netzwerkadminstrator/in sich z.B. dafür entscheiden, den LAN-Präfix $20.0.0.0~/~8$ zu verwenden.
    </p>
</div>
<p>
    Die ersten $8$ Bits, also $\color{green}000010100$, wären damit der gemeinsame Präfix. Passt das? Ja:
</p>

\begin{alignat*}{2}
{\color{green} 00010100}~{\color{gray}00000000~00000000~00000000} & ~/~8 &&= 20.0.0.0~/~8\\[0.25cm]
{\color{green} 00010100}~00000000~00000000~00000001               &      &&= 20.0.0.1\\
{\color{green} 00010100}~00000001~00000100~00000010               &      &&= 20.1.4.2\\
{\color{green} 00010100}~00001110~00000000~00000011               &      &&= 20.14.0.3
\end{alignat*}
<p>
    Hätte man auch einen anderen gemeinsamen Präfix wählen können? Ja, z.B. den Präfix $20.0.0.0~/~12$, also die 12 Bits ${\color{blue} 00010100~0000}$:
</p>
\begin{alignat*}{2}
{\color{blue} 00010100~0000}{\color{gray}0000~00000000~00000000} & ~/~12 &&= 20.0.0.0~/~12\\[0.25cm]
{\color{blue} 00010100~0000}0000~00000000~00000001                &      &&= 20.0.0.1\\
{\color{blue} 00010100~0000}0001~00000100~00000010                &      &&= 20.1.4.2\\
{\color{blue} 00010100~0000}1110~00000000~00000011                &      &&= 20.14.0.3
\end{alignat*}
<p>
    Ein gemeinsamer Präfix der Länge $13$ wäre hingegen nicht möglich.
</p>
<? acc_single_item_end(); ?>




<? nav_h(2, 'Aufgaben'); ?>


<? ex_start(open: false); ?>
<p>
    Es sei die IP-Adresse <code>30.4.7.2</code> gegeben, sowie die vier Netze<br>
        <code>30.4.7.0 / 24</code> und <code>30.4.6.0 / 23</code> und <code>30.4.4.0 / 23</code> und <code>24.0.0.0 / 5</code>.
</p>
<ol style="list-style-type: lower-roman;">
    <li><p><strong>Bestimme</strong> die Binärdarstellung der IP-Adresse.</p></li>
    <li><p><strong>Bestimme</strong> die Binärdarstellungen der vier Netze (wird hier synonym für Netzpräfixe verwendet).</p></li>
    <li><p><strong>Bestimme</strong>, welchen der vier Netze die IP-Adresse angehört.</p></li>
</ol>
<? ex_sol(open: false); ?>
<? source_start(line_numbers: false); ?>
(i)   IP-Adresse:   30.4.7.2        = 00011110 00000100 00000111 00000010


(ii)  Netzpräfix:   30.4.7.0 / 24   = 00011110 00000100 00000111 00000000 / 24
                                      ^^^^^^^^ ^^^^^^^^ ^^^^^^^^

                    30.4.6.0 / 23   = 00011110 00000100 00000110 00000000 / 23
                                      ^^^^^^^^ ^^^^^^^^ ^^^^^^^

                    30.4.4.0 / 23   = 00011110 00000100 00000100 00000000 / 23
                                      ^^^^^^^^ ^^^^^^^^ ^^^^^^^

                    24.0.0.0 / 5   =  00011000 00000000 00000000 00000000 / 5
                                      ^^^^^                              

(iii) Vergleiche die Binärdarstellung von (i) mit (ii).
        30.4.7.0 / 24:     Ja, gehört zum Netz.
        30.4.6.0 / 23:     Ja, gehört zum Netz.
        30.4.4.0 / 23:     Nein, gehört nicht zum Netz.
        24.0.0.0 / 5:      Ja, gehört zum Netz.
<? source_end(); ?>
<? ex_end(); ?>


<? ex_start(open: false); ?>
<p>
    Gegeben sind die folgenden drei IP-Adressen in Binärdarstellung.
</p>
<ol style="list-style-type: decimal;">
    <li><code>00000111 10000000 00001001 00001111</code></li>
    <li><code>00000111 10000001 00001001 00001110</code></li>
    <li><code>00000110 10000001 00001001 00001111</code></li>
</ol>
<ol style="list-style-type: lower-roman;">
    <li><p><strong>Bestimme</strong> die Dezimaldarstellung der IP-Adressen.</p></li>
    <li><p><strong>Bestimme</strong> den längsten Netzpräfix, den die drei IP-Adressen gemein haben, in Binärdarstellung.</p></li>
    <li><p><strong>Bestimme</strong> den längsten Netzpräfix, den die drei IP-Adressen gemein haben, in Dezimaldarstellung.</p></li>
    <li><p><strong>Bestimme</strong> den kürzesten Netzpräfix, den die drei IP-Adressen gemein haben, in Binärdarstellung. (Fangfrage: Für die Antwort muss nicht gerechnet werden.)</p></li>
    <li><p><strong>Bestimme</strong> den kürzesten Netzpräfix, den die drei IP-Adressen gemein haben, in Dezimaldarstellung. (Fangfrage: Für die Antwort muss nicht gerechnet werden.)</p></li>
</ol>
<? ex_sol(open: false); ?>
<? source_start(line_numbers: false); ?>
(i)     1.  00000111 10000000 00001001 00001111 =   7.128.9.15
        2.  00000111 10000001 00001001 00001110 =   7.129.9.14
        3.  00000110 10000001 00001001 00001111 =   6.129.9.15

(ii)        ^^^^^^^
            00000110 00000000 00000000 00000000 / 7

(iii)       6.0.0.0 / 7

(iv)        00000000 00000000 00000000 00000000 / 0

(v)         0.0.0.0 / 0
<? source_end(); ?>
<? ex_end(); ?>


<? ex_start(open: false); ?>
<p>
    Gegeben ist das Netz <code>10.1.243.64 / 30</code>.
</p>
<ol style="list-style-type: lower-roman;">
    <li><p><strong>Bestimme</strong> alle IP-Adressen des zugehörigen Adressraums.</p></li>
    <li><p>Können alle IP-Adressen an Geräte vergeben werden? <strong>Gib</strong> die beiden „Spezial-Adressen“ <strong>an</strong> und <strong>erläutere</strong>, warum sie speziell sind (Details kommen erst später).</p></li>
</ol>
<? ex_sol(open: false); ?>
<? source_start(line_numbers: false); ?>
10.1.243.64 / 30    =   00001010 00000001 11110011 01000000 / 30
                        ^^^^^^^^ ^^^^^^^^ ^^^^^^^^ ^^^^^^

(i)     10.1.243.64 = 00001010 00000001 11110011 01000000
        10.1.243.65 = 00001010 00000001 11110011 01000001
        10.1.243.66 = 00001010 00000001 11110011 01000010
        10.1.243.67 = 00001010 00000001 11110011 01000011

(ii)    Spezialadresse, da sie dem Netzpräfix entspricht:
        10.1.243.64 = 00001010 00000001 11110011 01000000

        Spezialadresse, da sie die Broadcast-Adresse ist:
        10.1.243.67 = 00001010 00000001 11110011 01000011
<? source_end(); ?>
<? ex_end(); ?>


<? ex_start(open: false); ?>
<p>
    Gegeben ist das Netz <code>10.1.0.0 / 24</code>.
</p>
<ol style="list-style-type: lower-roman;">
    <li><p><strong>Berechne</strong> die Größe des zugehörigen Adressraums. Gib als 2er-Potenz an, und berechne anschließend.</p></li>
    <li><p><strong>Erläutere</strong>, wie sich die Größe des Adressraums ändert, wenn der Netzpräfix auf <code>10.1.0.0 / 23</code> verkürzt wird.</p></li>
    <li><p><strong>Erläutere</strong>, warum sich der Netzpräfix nicht auf <code>10.1.0.0 / 12</code> verkürzen lässt. Warum ist dies kein gültiger Netzpräfix (und somit Unsinn)?</p></li>
    <li><p><strong>Bestimme</strong>, wie viele IP-Adressen es ingesamt gibt.</p></li>
</ol>
<? ex_sol(open: false); ?>
<? source_start(line_numbers: false); ?>
10.1.0.0 / 24   =   00001010 00000001 00000000 00000000 / 24
                    ^^^^^^^^ ^^^^^^^^ ^^^^^^^^

(i)     2^8 = 256

(ii)    Der Adressraum wird verdoppelt.

(iii)   Der Präfix wäre
        00001010 00000001 00000000 00000000 / 12
        ^^^^^^^^ ^^^^   *

        Das Problem ist die Ziffer 1, mit * markiert. Hier dürfen nur 0en stehen.

(iv)    2^32 = 4.294.967.296
<? source_end(); ?>
<? ex_end(); ?>


<? ex_start(open: false); ?>
<p>
    Es soll ein Netzpräfix für folgende IP-Adressen festgelegt werden. 
</p>
<ol>
    <li><p><code>31.2.2.5</p></code></li>
    <li><p><code>30.4.2.5</p></code></li>
    <li><p><code>30.4.4.5</p></code></li>
    <li><p><code>30.4.4.64</p></code></li>
</ol>
<p>
    <strong>Bestimme</strong> den <em>längsten</em> Netzpräfix, der alle obigen IP-Adressen abdeckt, in Binär- und Dezimalschreibweise.
</p>
<? ex_sol(open: false); ?>
<? source_start(line_numbers: false); ?>
31.2.2.5    =   00011111 00000010 00000010 00000101
30.4.2.5    =   00011110 00000100 00000010 00000101
30.4.4.5    =   00011110 00000100 00000100 00000101
30.4.4.64   =   00011110 00000100 00000100 01000000
                ^^^^^^^

Der längste Netzpräfix lautet:

                00011110 00000000 00000000 00000000 / 7 =   30.0.0.0 / 7
<? source_end(); ?>
<? ex_end(); ?>


<section><em>Quellen:</em><? ref_print_list(); ?> </section>

<? }; ?>