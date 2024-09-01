<?
    $preprocess = function (TargetPreprocessContext $c) {
        $c->activate_module('role-info');

        $c->run_macro('title', 'set', '3. Binärsystem: Erklärung');
    };
?>

<? $process = function(Target $target) { ?>

<p>
    Alle Stellenwertsysteme unterscheiden sich nur darin, <strong>wie viele Ziffern</strong> sie verwenden. Z.B. hat das...
</p>

<div class="row">
    <div class="col">
        <p>
            <strong>10er-System (= Dezimalsystem)</strong> die...
        </p>
        <ul>
            <li><p>$10$ Ziffern $0, 1, ..., 9$, weshalb es auch die...</p></li>
            <li>
                <div>
                    \begin{alignat*}{2}
                    10^0 &=~&     1& \text{er-Stelle}\\
                    10^1 &=~&    10& \text{er-Stelle}\\
                    10^2 &=~&   100& \text{er-Stelle}\\
                    10^3 &=~&  1000& \text{er-Stelle}\\
                    10^4 &=~& 10000& \text{er-Stelle...}
                    \end{alignat*}
                    ...gibt.
                </div>
            </li>
        </ul>
    </div>
    <div class="col">
        <p>
            <strong>2er-System (= Binärsystem/Dualsystem)</strong> die...
        </p>
        <ul>
            <li><p>$2$ Ziffern $0, 1$, weshalb es auch die...</p></li>
            <li>
                \begin{alignat*}{2}
                    2^0 &=~&  1& \text{er-Stelle}\\
                    2^1 &=~&  2& \text{er-Stelle}\\
                    2^2 &=~&  4& \text{er-Stelle}\\
                    2^3 &=~&  8& \text{er-Stelle}\\
                    2^4 &=~& 16& \text{er-Stelle...}\\
                \end{alignat*}
                ...gibt.
            </li>
        </ul>
    </div>
</div>
<p>
    Da die Stellenwerte immer Potenzen von $10$ bzw. $2$ sind, nennt man die Zahl $10$ bzw. $2$ dann auch <dfn>Basis</dfn>.
</p>
<p>
    Die Zahl...
</p>
<ul>
    <li>$119$ in der 10er-Basis wird z.B. als...</li>
    <li>$1110111$ in der 2er-Basis dargestellt.</li>
</ul>
<p>
    Um <a href="./res/different-bases.png">nicht durcheinanderzukommen</a>, notiert man häufig die Basis tiefgestellt neben die Zahl. Es gilt also
</p>

$$
    119_{10} = 1110111_{2}
$$

<p>
    Für die schnelle Umrechnung solltest du folgende 2er-Potenzen auswendig kennen.
</p>

\begin{alignat*}{1}
2^0 =&&~ 1_{10}\\
2^1 =&&~ 2_{10}\\
2^2 =&&~ 4_{10}\\
2^3 =&&~ 8_{10}\\
2^4 =&&~ 16_{10}\\
2^5 =&&~ 32_{10}\\
2^6 =&&~ 64_{10}\\
2^7 =&&~ 128_{10}\\
2^8 =&&~ 256_{10}
\end{alignat*}

<!-- \begin{align*}
        1_2 &= 2^0 =& 1_{10}\\
       10_2 &= 2^1 =& 2_{10}\\
      100_2 &= 2^2 =& 4_{10}\\
     1000_2 &= 2^3 =& 8_{10}\\
    10000_2 &= 2^4 =& 16_{10}\\
   100000_2 &= 2^5 =& 32_{10}\\
  1000000_2 &= 2^6 =& 64_{10}\\
 10000000_2 &= 2^7 =& 128_{10}\\
100000000_2 &= 2^8 =& 256_{10}
\end{align*} -->

<? nav_h(2, 'Basis 2 → Basis 10'); ?>

<? acc_single_item_start('Algorithmus'); ?>
<p>Bsp.: $~~11001_{2} = ?_{10}$</p>

\begin{alignat*}{1}
   & 11001_2\\[0.25cm]
=~ &
    \begin{alignedat}[t]{2}
         ~& 1 ~\cdot~ & 16_{10}\\
        +~& 1 ~\cdot~ &  8_{10}\\
        +~& 0 ~\cdot~ &  4_{10}\\
        +~& 0 ~\cdot~ &  2_{10}\\
        +~& 1 ~\cdot~ &  1_{10}
     \end{alignedat}\\[0.25cm]
=~ & 16_{10} ~+~ 8_{10} ~+~ 1_{10}\\
=~ & 25_{10}
\end{alignat*}

<? acc_single_item_end(); ?>


<? nav_h(2, 'Basis 10 → Basis 2'); ?>

<? acc_single_item_start('Algorithmus 1: Welche Zweierpotenzen passen rein?', open: false); ?>
<p>Bsp.: $~~25_{10} = ?_{2}$</p>
<ul>
    <li>
        Überlege, was die größte 2er-Potenz ist, die in die $25$ reinpasst. Das ist die $16$. Subtrahiere, es bleibt $9$ übrig.
    </li>
    <li>
        Wiederhole so lange, bis du bei $0$ angelangt bist.
    </li>
    <li>
        Notiere anschließend für jede 2er-Potenz, die reingepasst hat, eine $1$, und für jede 2er-Potenz, die nicht reingepasst hat, eine $0$, von links nach rechts.
    </li>
</ul>
\begin{align*}
   & 25_{10}\\[0.25cm]
=~ &\begin{alignedat}[t]{2}
         ~& 1 \cdot ~&   16_{10}\\
        +~& 1 \cdot ~&    8_{10}\\
        +~& 0 \cdot ~&    4_{10}\\
        +~& 0 \cdot ~&    2_{10}\\
        +~& 1 \cdot ~&    1_{10}
    \end{alignedat}\\[0.25cm]
=~ & 11001_2\\[0.25cm]
\end{align*}
<? acc_single_item_end(); ?>

<? acc_single_item_start('Algorithmus 2: Division mit Rest (schnell!)', open: false); ?>
<p>Bsp.: $~~25_{10} = ?_{2}$</p>
<ul>
    <li>
        <p>Dividiere deine Zahl durch $2$ mit Rest, also $25 : 2 = 12$ Rest $1$. Es gibt zwei Möglichkeiten: Der Rest ist 0 oder der Rest ist 1. Notiere den Rest an die niedrigste Stelle der entstehenden Binärdarstellung.</p>
    </li>
    <li>
        <p>
            Fahre weiter fort, also $12 : 2 = 6$ Rest $0$. usw...
        </p>
    </li>
</ul>
<p>
    Im Folgenden schreiben wir die Divisions-Rechnung...
</p>
$$
25 : 2 = 12~~ \text{Rest}~~1
$$
<p>
    ...um als:
</p>
$$
25 = 2 \cdot 12 + 1
$$
<p>
    Mehrfach hintereinander angewandt ergibt dies dann einen sehr verschachtelten Term, bei dem wir dann aber ganz einfach die Stellenwerte im Binärsystem <strong>ablesen</strong> können.
</p>
\begin{align*}
&~~~~~~25_{10}\\[0.25cm]
&\begin{alignedat}[t]{2}
        &=~ 2\cdot  12_{10}                           &    &   &+1\\
        &=~ 2\cdot  (2 \cdot 6_{10}                   &    &+0) &+1\\
        &=~ 2\cdot  (2 \cdot (2 \cdot (3_{10}         &+0) &+0) &+1\\
        &=~ 2\cdot  (2 \cdot (2 \cdot (2 \cdot 1  +1) &+0) &+0) &+1\\[0.25cm]
\end{alignedat}\\[0.25cm]
&=~  2^4\cdot 1 ~~+~~ 2^3 \cdot 1 ~~+~~ 2^2 \cdot 0 ~~+~~ 2^1 \cdot 0 ~~+~~ 2^0 \cdot 1\\
&=~  11001_2
\end{align*}
<? acc_single_item_end(); ?>



<? nav_h(2, 'Rechnen'); ?>

<? acc_single_item_start('Grundrechenarten'); ?>
<p>
    Die vier Grundrechenarten funktionen in jedem Stellenwertsystem gleich.
</p>
<img src="res/grundrechenarten.png" alt="" style="max-width: 100%;">
<? acc_single_item_end(); ?>

<? acc_single_item_start('Bitweises Rechnen'); ?>
<p>
    Die folgenden Rechenoperationen können bitweise auf Binärzahlen angewendet werden. Dabei wird jede Stelle einzeln betrachtet.
</p>
<p><strong>Bitweise Konjunktion („und“)</strong></p>
<p><img src="res/bitweise-1.png" alt="" style="max-width: 100%;"></p>
<p><strong>Bitweise Disjunktion („oder“)</strong></p>
<p><img src="res/bitweise-2.png" alt="" style="max-width: 100%;"></p>
<p><strong>Bitweise Antivalenz („entweder oder“ = „ausschließendes oder“ = „exclusive or“ = „XOR“)</strong></p>
<p><img src="res/bitweise-3.png" alt="" style="max-width: 100%;"></p>
<? acc_single_item_end(); ?>




<? nav_h(2, 'Fortgeschritten: Basiswechsel im Rechner'); ?>

<div class="row">
    <div class="col">
        <? html_h(3, 'Für Menschen'); ?>
    </div>
    <div class="col">
        <? html_h(3, 'Für Rechner'); ?>
    </div>
</div>

<div class="row">
    <div class="col">
        <? acc_single_item_start('2er-Potenzen in der 10er-Basis', open: false); ?>
        <p>
            Die folgenden Potenzen sollte man in der 10er-Basis kennen.
        </p>
\begin{alignat*}{1}
2^0 =&&~ 1_{10}\\
2^1 =&&~ 2_{10}\\
2^2 =&&~ 4_{10}\\
2^3 =&&~ 8_{10}\\
2^4 =&&~ 16_{10}\\
2^5 =&&~ 32_{10}\\
2^6 =&&~ 64_{10}\\
2^7 =&&~ 128_{10}\\
2^8 =&&~ 256_{10}
\end{alignat*}
        <? acc_single_item_end(); ?>
    </div>
    <div class="col">
        <? acc_single_item_start('10er-Potenzen in der 2er-Basis', open: false); ?>
        <p>
            Die folgenden Potenzen sollte sich der Rechner in der 2er-Basis merken.
        </p>
\begin{alignat*}{1}
10^0 =&&~ 1_2\\
10^1 =&&~ 1010_2\\
10^2 =&&~ 1100100_2\\
10^3 =&&~ 1111101000_2\\
10^4 =&&~ 10011100010000_2\\
\end{alignat*}
        <? acc_single_item_end(); ?>
    </div>
</div>

<div class="row">
    <div class="col">
        <? acc_single_item_start('Basiswechsel: 2 → 10', open: false); ?>
        <p>
            Folgende <strong>menschen</strong>freundliche Anforderungen müssen erfüllt werden:
        </p>
        <ul>
            <li>2er-Potenzen in 10er-System kennen <span class="text-nowrap">(Tabelle oben)</span></li>
            <li>Addition im 10er-System</li>
        </ul>
        <p>
            Siehe auch „Basis 2 → 10: Algorithmus“ weiter oben.
        </p>
        <? acc_single_item_end(); ?>
    </div>

    <div class="col">
        <? acc_single_item_start('Basiswechsel: 2 → 10', open: false); ?>
        <p>
            Folgende <strong>maschinen</strong>freundliche Anforderungen müssen erfüllt werden:
        </p>
        <ul>
            <li>10er-Potenzen in 2er-System kennen <span class="text-nowrap">(Tabelle oben)</span></li>
            <li>10er-Ziffern $0$ bis $9$ in 2er-System</li>
            <li>„Division mit Rest“ im 2er-System</li>
        </ul>
        <p>
            In jedem Schritt wird im 2er-System durch die größte 10er-Potenz mit Rest geteilt.
        </p>
\begin{alignat*}{1}
&
    \begin{tightarray}{llc}
         &~ 11101110_2 : & ~100_{10}\\
        =&~ 11101110_2 : & ~1100100_2
    \end{tightarray}\\
&{=}~ 10_2~~\text{Rest}~~100110_2\\
\end{alignat*}
        <p>
            Anders geschrieben:
        </p>
\begin{align*}
 ~11101110_2 =&~ 10_2   \cdot 1100100_2 + 100110_2\\
             =&~ 2_{10} \cdot 100_{10}  + 100110_2\\
\end{align*}
        <p>
            Nun mehrfach hintereinander ausführen, bis alle Stellenwerte im 10er-System durchdividiert wurden. Die Ziffern im 10er-System sind nun ablesbar. 
        </p>

\begin{align*}
   & 11101110_2&&\\
=~ & 10_2    \cdot 1100100_2  &&+ 100110_2&\\
=~ & 2_{10}  \cdot 100_{10}   &&+ 100110_2&\\
=~ & 2_{10}  \cdot 100_{10}   &&+ 11_2   \cdot 1010_2  &&+ 1000_2\\
=~ & 2_{10}  \cdot 100_{10}   &&+ 3_{10} \cdot 10_{10} &&+ 1000_2\\
=~ & 2_{10}  \cdot 100_{10}   &&+ 3_{10} \cdot 10_{10} &&+ 1000_2 \cdot 1_2\\
=~ & 2_{10}  \cdot 100_{10}   &&+ 3_{10} \cdot 10_{10} &&+ 8_{10} \cdot 1_{10}\\
=~ & 238_{10}
\end{align*}
        <? acc_single_item_end(); ?>
    </div>
</div>

<div class="row">
    <div class="col">
        <? acc_single_item_start('Basiswechsel: 10 → 2', open: false); ?>
        <p>
            Folgende <strong>menschen</strong>freundliche Anforderungen müssen erfüllt werden:
        </p>
        <ul>
            <li>2er-Potenzen in 10er-System (Tabelle oben)</li>
            <li>„Division mit Rest“ im 10er-System</li>
        </ul>
        <p>
            Siehe auch „Basis 10 → 2: Algorithmus 2: Division mit Rest (schnell)“ weiter oben.
        </p>
        <? acc_single_item_end(); ?>
    </div>

    <div class="col">
        <? acc_single_item_start('Basiswechsel: 10 → 2', open: false); ?>
        <p>
            Folgende <strong>maschinen</strong>freundliche Anforderungen müssen erfüllt werden:
        </p>
        <ul>
            <li>10er-Potenzen in 2er-System (Tabelle oben)</li>
            <li>Multiplikation u. Addition im 2er-System</li>
        </ul>
\begin{align*}
  & 205_{10}\\[0.25cm]
= & \begin{aligned}[t]  ~& 2_{10}   \cdot & 100_{10}\\
                       +~& 0_{10}   \cdot & 10_{10}\\
                       +~& 5_{10}   \cdot & 1_{10}\end{aligned}\\[0.25cm]
= & \begin{aligned}[t]  ~& 10_{2}  \cdot &   1100100_{2}\\
                       +~& 0_{2} \cdot &    1010_{2}\\
                       +~& 101_{2} \cdot &    1_{2}\end{aligned}\\[0.25cm]
=~ & 11001000_{2}+101_{2}\\
=~ & 11001101_{2}
\end{align*}
        <? acc_single_item_end(); ?>
    </div>
</div>

<div class="row">
    <div class="col">

    </div>
    <div class="col">
        <? ex_start('Im 2er-System rechnen'); ?>
        <p>
            Versetze dich in die Lage des Rechners. Denke dir ein paar Zahlen im Binärsystem und im Dezimalsystem aus. Führe jeweils einen Basiswechsel durch, mit dem Algorithmus des Rechners (siehe die Boxen hierüber).
        </p>
        <? ex_end(); ?>
    </div>
</div>

<? }; ?>