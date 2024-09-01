<?
    $preprocess = function (TargetPreprocessContext $c) {
        $c->activate_module('role-info-db');
        
        $c->run_macro('title', 'set', 'Mengenlehre');

        // $c->activate_module('print-mode', config: [
        //     'enabled' => true,
        //     'is_portrait' => true
        // ]);

        // TODO reactivate!
        // $c->add_subpage('aufgaben');
    };
?>

<? $process = function(Target $target) { ?>

Bei relationalen Datenbanken dreht sich alles um Tabellen. Mit Tabellen kann man rechnen: Sie können verbunden werden, vereinigt, geschnitten, und vieles mehr. Das Fundament dafür bildet die Mengenlehre.

<? acc_start(); ?>
<? acc_item_start('<dfn>Menge</dfn>', variant: 'definition', open: true); ?>
<p>
    Eine <dfn>Menge</dfn> ist eine Zusammenfassung von unterscheidbaren Objekten, z.B. die Menge $F$ der Farben im Kartenspiel, die Menge $\mathbb{N}$ der natürlichen Zahlen, die Menge $M$ der Musikinstrumente. Man schreibt Mengen häufig in der sogenannten <dfn>aufzählenden Darstellung</dfn>, in der diese Objekte einfach aufgezählt werden.
</p>
$$
F = \{\unicode{x2660}, \unicode{x2665}, \unicode{x2666}, \unicode{x2663}\} \qquad \text{und} \qquad \mathbb{N} = \{0, 1, 2, 3, ...\} \qquad M = \{\unicode{x1F3BB}, \unicode{x1F3B7}, \unicode{x1F3B8}, ...\}
$$
<p>
    Die Objekte, welcher in einer Menge enthalten sind, werden <dfn>Elemente der Menge</dfn> genannt. Ein Objekt ist entweder <dfn>Element</dfn> ($\in$) oder <dfn>kein Element</dfn> ($\notin$) der Menge.
</p>
$$
\unicode{x2665} \in F \qquad \text{und} \qquad 2 \in \mathbb{N} \qquad \text{und} \qquad \unicode{x2665} \not\in \mathbb{N}
$$
<p>
    Die Elemente sind nicht geordnet, und ebenso kommen Elemente nicht mehrfach vor. Deshalb bezeichnen die folgenden Schreibweisen <em>dieselbe</em> Menge. 
</p>
$$
\{1, 2\} = \{1, 1, 2\} = \{2, 2, 2, 1\}
$$

<p>
    Wie man bei $\mathbb{N}$ sieht, kann eine Menge auch <dfn>unendlich viele</dfn> Elemente enthalten. Eine spezielle Menge ist die <dfn>leere Menge</dfn>, welche keine Elemente enthält. Man schreibt sie auch als 
</p>
$$
\{~\} = \emptyset
$$
<p>
    Eine Menge $A$ ist <dfn>Teilmenge</dfn> einer anderen Menge $B$, geschrieben $A \subseteq B$, wenn jedes Element von $A$ auch in $B$ enthalten ist. Z.B. gilt
</p>
$$
\{3, 4, 5\} \subseteq \mathbb{N} \qquad \text{und} \qquad \{3, 4\} \subseteq \{3, 4, 5\}  \qquad \text{und} \qquad \{2, 3\} \not\subseteq \{3, 4, 5\} \qquad \text{und} \qquad \mathbb{N} \subseteq \mathbb{Z} \subseteq \mathbb{Q}
$$
<? acc_item_end(); ?>

<? acc_item_start('<strong>Beschreibende</strong> Darstellung', variant: 'definition', open: true); ?>
<p>
    Eine Eigenschaft wie „ist ein Musikinstrument“ oder „ist eine natürliche Zahl zwischen 1 und 99“ beschreibt gleichzeitig jeweils auch eine Menge, nämlich jene, die alle Musikinstrumente bzw. alle Zahlen zwischen 1 und 99 enthält. Man kann diese Menge dann mit Hilfe dieser Eigenschaft in der folgenden <dfn>beschreibenden Darstellung</dfn> angeben.
</p>
\begin{tightarray}{rll}
M &= \{x ~|~ x~ \text{ist ein Musikinstrument}\}\qquad &\text{„Menge der Musikinstrumente“}\\
  &= \{\unicode{x1F3BB}, \unicode{x1F3B7}, \unicode{x1F3B8}, ...\}\\[0.5cm]
C &= \{x \in \mathbb{N} ~|~ 1 \le x \le 99\} &\text{„Menge der natürlichen Zahlen zwischen 1 und 99“}\\
  &= \{1, 2, 3, ..., 99\}
\end{tightarray}
<p>
    Sprich diese zunächst etwas seltsam anmutende Schreibweise so aus:
</p>
<p class="text-center">
    <img src="res/musikinstrumente.png" alt="" style="width: 600px;">
</p>
<p>
    Oder auch: „$M$ ist die Menge aller $x$, für die gilt: $x$ ist ein Musikinstrument“. Also ist M einfach die Menge aller Musikinstrumente.
</p>
<? acc_item_end(); ?>
<? acc_end(); ?>

<? //page_break(); ?>

<? acc_single_item_start('<dfn>Venn-Diagramm</dfn>', variant: 'definition', open: true); ?>
<div class="clearfix">
    <? ref_img(__DIR__ . '/res/ext/venn.png', height: 200, class: 'float-end'); ?>
    <p class="first-child">
        Ein <dfn>Venn-Diagramm</dfn> ist eine graphische Darstellung von Mengen. Eine Menge wird als Kreis dargestellt. Die Elemente einer Menge werden dann als Punkte innerhalb des Kreises dargestellt. Die Elemente, die in mehreren Mengen enthalten sind, werden in den Schnittbereichen der Kreise dargestellt.
    </p>
</div>
<? acc_single_item_end(); ?>


<? acc_start(); ?>
<? acc_item_start('<strong>Mengenoperationen</strong>', variant: 'definition', open: true); ?>
<div class="clearfix">
    <p>
        Mit Mengen kann gerechnet werden. Die wichtigsten Operationen sind <strong>Vereinigung</strong>, <strong>Schnitt</strong> und <strong>Differenz</strong>.
    </p>
</div>
<? acc_item_end(); ?>
<? acc_end(); ?>

<div class="row"> 
<div class="col">
    <? acc_start(); ?>
    <? acc_item_start('<dfn>Vereinigung</dfn>', variant: 'definition', open: true) ?>
    <p data-sync-height-id="mengenop-1">
        Die <dfn>Vereinigung</dfn> zweier Mengen $A$ und $B$ ist die Menge aller Elemente, die in $A$ <strong>oder</strong> in $B$ enthalten sind (oder in beiden). Man schreibt auch $A \cup B$. Bsp.:
    </p>
    <div data-sync-height-id="mengenop-2">
        \begin{tightarray}{cll}
        A        ~&= \{1, 2, 3\}\\
        B        ~&= \{3, 4, 5\}\\
        A \cup B ~&= \{1, 2, 3, 4, 5\}
        \end{tightarray}
    </div>
    <p><? ref_img(__DIR__ . '/res/ext/venn-vereinigung.png', style: 'max-width:100%;'); ?></p>
    <? acc_item_end(); ?>
    <? acc_end(); ?>
</div>

<div class="col">
    <? acc_start(); ?>
    <? acc_item_start('<dfn>Schnitt</dfn>', variant: 'definition', open: true) ?>
    <p data-sync-height-id="mengenop-1">
        Der <dfn>Schnitt</dfn> zweier Mengen $A$ und $B$ ist die Menge aller Elemente, die in $A$ <strong>und</strong> in $B$ enthalten sind. Man schreibt auch $A \cap B$. Bsp.:
    </p>
    <div data-sync-height-id="mengenop-2">
        \begin{tightarray}{cll}
        A        ~&= \{1, 2, 3\}\\
        B        ~&= \{3, 4, 5\}\\
        A \cap B ~&= \{3\}
        \end{tightarray}
    </div>
    <p><? ref_img(__DIR__ . '/res/ext/venn-schnitt.png', style: 'max-width:100%;'); ?></p>
    <? acc_item_end(); ?>
    <? acc_end(); ?>
</div>

<div class="col">
    <? acc_start(); ?>
    <? acc_item_start('<dfn>Differenz</dfn>', variant: 'definition', open: true) ?>
    <p data-sync-height-id="mengenop-1">
        Die <dfn>Differenz</dfn> einer Menge $B$ von einer Menge $A$ ist die Menge aller Elemente, die in $A$, <strong>aber nicht</strong> in $B$ enthalten sind. Man schreibt auch $A \setminus B$. Bsp.:
    </p>
    <div data-sync-height-id="mengenop-2">
        \begin{tightarray}{cll}
        A        ~&= \{1, 2, 3\}\\
        B        ~&= \{3, 4, 5\}\\
        A \setminus B ~&= \{1, 2\}
        \end{tightarray}
    </div>
    <p><? ref_img(__DIR__ . '/res/ext/venn-differenz.png', style: 'max-width:100%;'); ?></p>
    <? acc_item_end(); ?>
    <? acc_end(); ?>
</div>
</div>


<? //page_break(); ?>

<? acc_start(); ?>
<? acc_item_start('<dfn>Rechengesetze</dfn>', variant: 'definition', open: false); ?>
<p>
    Im Folgenden bezeichnet die Grundmenge $G$ die Menge alle Objekte, die überhaupt betrachtet werden können. Manchmal wird $G$ deshalb auch „Universum“ genannt. Das Komplement $\overline{M}$ einer Menge $M$ beschreibt alle Elemente des Universums (=der Grundmenge), die <strong>nicht</strong> in $M$ enthalten sind. 
</p>
<p>
    <p><? ref_img(__DIR__ . '/res/ext/rechengesetze.png', style: 'max-width:100%;'); ?></p>
</p>
<? acc_item_end(); ?>
<? acc_end(); ?>

<? }; ?>