<?
    $preprocess = function (TargetPreprocessContext $c) {
        $c->activate_module('role-info');

        $c->run_macro('title', 'set', '4. Binärsystem: Aufgaben');
    };
?>

<? $process = function(Target $target) { ?>

<? ex_start('Basiswechsel durchführen'); ?>
<p><strong>Rechne</strong> um.</p>
<div class="grid" style="grid-template-columns:min-content min-content; column-gap:200px;">
    <div class="stack">
        <ol style="list-style-type: lower-alpha;">
            <li><p class="text-end">     $111_2 = ?_{10}$</p></li>
            <li><p class="text-end">   $10101_2 = ?_{10}$</p></li>
            <li><p class="text-end">  $101100_2 = ?_{10}$</p></li>
            <li><p class="text-end">$11111111_2 = ?_{10}$</p></li>
        </ol>
    </div>
    <div class="stack">
        <ol style="list-style-type: lower-alpha;" start="5">
            <li><p class="text-end">$5_{10} = ?_{2}$</p></li>
            <li><p class="text-end">$10_{10} = ?_{2}$</p></li>
            <li><p class="text-end">$31_{10} = ?_{2}$</p></li>
            <li><p class="text-end">$32_{10} = ?_{2}$</p></li>
        </ol>
    </div>
</div>
<p>
    <strong>Bonus</strong>
</p>
<p>
    Löse auch Aufgaben 2, 3 und 6 auf <a href="https://de.serlo.org/informatik/184941/aufgaben-zu-zahlensystemen">dieser Seite</a>. Informiere dich zunächst über das Oktal- und das Hexadezimalsystem.
</p>
<? ex_sol(); ?>
<? source_start(line_numbers: false); ?>
a.      111₂  =      7₁₀
b.    10101₂  =     21₁₀
c.   101100₂  =     44₁₀
d. 11111111₂  =    255₁₀
e.        5₁₀ =    101₂
f.       10₁₀ =   1010₂
g.       31₁₀ =  11111₂
h.       32₁₀ = 100000₂
<? source_end(); ?>
<? ex_end(); ?>



<? ex_start('Rechnen mit Binärzahlen'); ?>
<strong>Berechne.</strong>
<p>
    <img src="res/aufgaben-rechnen-1.png" alt="" style="max-width: 100%;">
</p>
<p>
    Das Rechnen mit Binärzahlen funktioniert <strong>exakt</strong> wie mit Dezimalzahlen. Probiere das <a href="https://de.serlo.org/informatik/184941/aufgaben-zu-zahlensystemen">hier</a> bei Aufgabe 5 mit der schriftlichen Addition und Subtraktion.
</p>
<? ex_sol(); ?>
<p>
    <img src="res/aufgaben-rechnen-2.png" alt="" style="max-width: 100%;">
</p>
<? ex_end(); ?>



<? ex_start('IP-Adressen hin- und herrechnen'); ?>
<ol>
    <li>
        <p>
            Eine IP-Adresse besteht aus vier Zahlen $A$, $B$, $C$, $D$, die jeweils zwischen 0 und 255 liegen. <strong>Beantworte</strong> folgende Fragen.
        </p>
        <ol>
            <li><p>Wie viele Bits werden pro Zahl (z.B. $A$) benötigt?</p></li>
            <li><p>Wie viele Bits werden für eine gesamte IP-Adresse $A{.}B{.}C{.}D$ benötigt?</p></li>
            <li><p>Wie viele verschiedene IP-Adressen können durch das Schema $A{.}B{.}C{.}D$ dargestellt werden?</p></li>
        </ol>
    </li>
    <li>
        <p>
            Berechne die Binärdarstellung (wichtig hier: bei jeder Einzelzahl immer die 0en links auffüllen, sodass du jeweils 8 Stellen hast, also 8 Nullen oder Einsen) folgender IP-Adressen.
        </p>
        <ol>
            <li>$10.8.15.2$</li>
            <li>$20.1.128.3$</li>
            <li>$64.63.62.1$</li>
            <li>$255.13.0.2$</li>
        </ol>
    </li>
    <li>
        <p>Berechne die Dezimaldarstellung (also die A.B.C.D-Schreibweise mit Dezimalzahlen A, B, C, D) folgender IP-Adressen:</p>
        <ol>
            <li>$10000000.00110000.00001111.00000011$</li>
            <li>$00001001.00001101.11111111.00000101$</li>
            <li>$00000000.10000001.00000111.00001001$</li>
            <li>$00000001.00000101.00100000.00000111$</li>
        </ol>
    </li>
</ol>
<? ex_sol(); ?>
<? source_start(line_numbers: false); ?>
1.  a. 8
    b. 32
    c. 2^32 = 4294967296
2.  a. 00001010.00001000.00001111.00000010
    b. 00010100.00000001.10000000.00000011
    c. 01000000.00111111.00111110.00000001
    d. 11111111.00001101.00000000.00000010
3.  a. 128.48.15.3
    b. 9.13.255.5
    c. 0.129.7.9
    d. 1.5.32.7
<? source_end(); ?>
<? ex_end(); ?>

<? }; ?>