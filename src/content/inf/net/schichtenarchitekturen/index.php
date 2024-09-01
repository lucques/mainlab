<?
    $preprocess = function (TargetPreprocessContext $c) {
        $c->activate_module('role-info');
    
        $c->run_macro('title', 'set', 'Schichtenarchitekturen');
    };
?>

<? $process = function(Target $target) { ?>

<? css_start(); ?>
    #content main {
        min-width:1200px;
    }

    .layer {
        height:130px;
    }

    .paragraph-1 {
        height:50px;
    }

    .paragraph-2 {
        height:150px;
    }

    .paragraph-3 {
        height:120px;
    }
<? css_end(); ?>

<p>
    Netze existieren meistens über verschiedene <dfn>Schichten</dfn> hinweg. Die Idee: Eine höhere Schicht verlässt sich darauf, dass die unteren Schichten ihren Dienst erfüllen; mit anderen Worten:
</p>
<p>
    <strong>Eine höhe Schicht baut auf den unteren Schichten auf</strong>. 
</p>
<p>
    Im Folgenden findest du zwei konkrete Beispiele.
</p>


<div class="row">
    <div class="col">
        <? acc_single_item_start('<strong>Beispiel: Organe im menschlichen Körper</strong>', variant: 'light', open: true); ?>
        <p>
            <a href="res/organe.png"><img src="res/organe.png" alt="" style="max-width: 100%;"></a>
        </p>
        <ul class="list-group list-group-flush p">
            <li class="list-group-item list-group-item-layer_1 layer">
                <p><strong>Makrobiologische Schicht</strong></p>
                <ul>
                    <li>Organe...</li>
                    <li>...kommunizieren Hormone und Neurotransmitter...</li>
                    <li>...über die...</li>
                </ul>
            </li>
            <li class="list-group-item layer"></li>
            <li class="list-group-item list-group-item-layer_3 layer">
                <p><strong>Mikrobiologische / Biochemische Schicht</strong></p>
                <ul>
                    <li>Zellen (Blutbahn und Nervensystem)...</li>
                    <li>...kommunizieren chem. Reakt. und elektr. Impulse...</li>
                    <li>...über die...</li>
                </ul>
            </li>
            <li class="list-group-item list-group-item-layer_4 layer">
                <p><strong>Physikalische Schicht</strong></p>
                <ul>
                    <li>Atome...</li>
                    <li>...kommunizieren mechanische Impulse und Elektronen</li>
                </ul>
            </li>
            <li class="list-group-item layer"></li>
        </ul>
        <p class="paragraph-1">
            Das Herz will BNP-Hormone an das Gehirn und die Niere schicken.
        </p>
        <p class="paragraph-2">
            Die in blau gemalte Hormon-Kommunikation (höchste Schicht) kann nur etabliert werden, weil es sich auf die in grün gemalten Verbindungen zwischen Zellen (mittlere Schicht) verlassen kann. Diese wiederum verlassen sich darauf, dass die ganz konkreten chemischen Reaktionen funktionieren (niedrigste Schicht).
        </p>
        <p class="paragraph-3">
            Klar: Letztlich müssen die Moleküle Strecken überwinden und chemisch reagieren. Das ist aber nicht von Relevanz für das Herz-Organ – für dieses ist nur relevant, <strong>dass</strong> es untere Schichten gibt, die sich um den tatsächlichen Transport der Hormone kümmern.
        </p>
        <? acc_single_item_end(); ?>
    </div>
    <div class="col">
        <? acc_single_item_start('<strong>Beispiel: World Wide Web (WWW)</strong>', variant: 'light', open: true); ?>
        <p>
            <a href="res/web.png"><img src="res/web.png" alt="" style="max-width: 100%;"></a>
        </p>
        <ul class="list-group list-group-flush p">
            <li class="list-group-item list-group-item-layer_1 layer">
                <p><strong>Anwendungsschicht</strong></p>
                <ul>
                    <li>Apps (Web-Browser und Web-Server)...</li>
                    <li>...kommunizieren Web-Anfragen und Web-Antworten...</li>
                    <li>...über die...</li>
                </ul>
            </li>
            <li class="list-group-item list-group-item-layer_2 layer d-flex align-items-center justify-content-center">
                <em>(hier fehlt noch eine Schicht − später!)</em>
            </li>
            <li class="list-group-item list-group-item-layer_3 layer">
                <p><strong>Internetschicht</strong></p>
                <ul>
                    <li>Rechner...</li>
                    <li>...kommunizieren IP-Pakete...</li>
                    <li>...über die...</li>
                </ul>
            </li>
            <li class="list-group-item list-group-item-layer_4 layer">
                <p><strong>Verbindungsschicht</strong></p>
                <ul>
                    <li>Netzanschlüsse (Netzstecker/WLAN-Module)...</li>
                    <li>...kommunizieren Stromimpulse / EM-Wellen</li>
                </ul>
            </li>
            <li class="list-group-item list-group-item-layer_5 layer d-flex align-items-center justify-content-center">
                <em>(hier fehlt noch eine Schicht − später!)</em>
            </li>
        </ul>
        <p class="paragraph-1">
            Du willst von deinem Rechner in Schönberg aus die Website der University of Sydney abrufen.
        </p>
        <p class="paragraph-2">
            Die in blau gemalte Verbindung zwischen Web-Browser und Web-Server (Anwendungsschicht) kann nur etabliert werden, weil es sich auf die in grün gemalten Verbindungen zwischen Rechnern (Internetschicht) verlassen kann. Diese wiederum verlassen sich darauf, dass die ganz konkreten Kabelverbindungen funktionieren (Verbindungsschicht).
        </p>
        <p class="paragraph-3">
            Klar: Letztlich müssen die Daten durch die Kabel. Das ist aber nicht von Relevanz für Web-Browser und Web-Server – diese beiden Apps müssen nur wissen, <strong>dass</strong> es untere Schichten gibt, die sich um den tatsächlichen Transport der Web-Anfrage / Web-Antwort kümmern.
        </p>
        <? acc_single_item_end(); ?>
    </div>
</div>

<? nav_h(2, 'Schichtenarchitektur des Internet'); ?>
<p>
    Das Internet ist natürlich das Netz, welches wir uns in den nächsten Wochen genauer anschauen werden. Hier noch ein Beispiel für eine Skype-Verbindung zwischen einer Skype-App in Schönberg und einer Skype-App in Sydney. Es wird noch einmal ganz deutlich: Die Verbindung basiert auf unterliegenden Schichten, welche dafür sorgen, dass die Videosequenzen durch Unterseekabel etc. übertragen werden. Die beiden Skype-Apps (<strong>High-Level</strong>) bekommen aber von diesem Unterseekabel (<strong>Low-Level</strong>) nichts mit!
</p>
<p class="text-center">
    <img src="res/skype.png" alt="" style="max-width: 100%;">
</p>
<p>
    Der Erfolg des Internets baut auf einer geschickt konstruierten Schichtenarchitektur auf. Der Erfolg zeigt sich darin, dass dieselben Prinzipien sowohl mit wenigen 100 Rechnern funktionierte (Jahr 1974), als auch heutzutage mit mehr als 8.000.000.000 Rechnern.
</p>
<p class="text-center">
    <img src="../res/img/schichtenarchitektur-internet-internetschicht.png" alt="" style="max-width:800px;">
</p>
<p>
    In dem vorangegangenen Beispiel ist die Skype-Verbindung auf der <dfn>Anwendungsschicht</dfn> angesiedelt, während die Kabelverbindungen auf den untersten drei Schichten angesiedelt sind. Wir beschäftigen uns nun zunächst mit dem Herz des Internets, der <dfn>Internetschicht</dfn> in der Mitte.
</p>


<? ex_start('Schichtenarchitektur analysieren', open: false); ?>
<p>
    Der Online-Handel ist ein Beispiel für eine Schichtenarchitektur von Netzen.
</p>
<p>
    Es gibt zwei Aspekte: a) Die digitale Bestellung und b) die physische Auslieferung. Die Bestellung lassen wir an dieser Stelle außen vor. Stattdessen soll es nur um die <strong>Auslieferung</strong> gehen.
</p>
<div class="row">
    <div class="col">
        <p>
            <strong>Analysiere</strong> die Schichten, welche bei der Auslieferung zum Tragen kommen. Lasse dich von den Begriffen auf der rechten Seite inspirieren.
        </p>
        <ul class="">
            <li>
                <strong>Analysiere</strong>, inwiefern Kommunikation stattfindet. Beginne am besten damit, eine Skizze zu entwerfen, ähnlich wie in den beiden oben dargestellten Beispielen.
            </li>
            <li>
                <strong>Beschreibe</strong> den Weg eines bei Alibaba bestellten Pakets von <em>1 Main St, Shenzhen 518040, China</em> zum <em>Goetheplatz 5, 23923 Schönberg, Deutschland</em>.
            </li>
            <li>
                <strong>Erläutere</strong> jede Schicht: Wer sind die Kommunikationsparteien, wie kommunizieren sie und was sind die Nachrichten? 
            </li>
            <li>
                <strong>Erläutere</strong>, inwiefern die Schichten aufeinander aufbauen.
            </li>
        </ul>
    </div>
    <div class="col">
        <ul class="list-group">
            <li class="list-group-item"><em>Kund/in (z.B. du)</em></li>
            <li class="list-group-item"><em>Versandhändler (z.B. Otto)</em></li>
            <li class="list-group-item"><em>Postamt (z.B. in Schönberg)</em></li>
            <li class="list-group-item"><em>Paketzentrum (z.B. in Schwerin)</em></li>
            <li class="list-group-item"><em>Hub-and-Spoke-Prinzip</em></li>
            <li class="list-group-item"><em>Warenpaket (enthält z.B. Kleidung)</em></li>
            <li class="list-group-item"><em>Großraumbehälter (z.B. Seefracht-Container; enthält Warenpakete)</em></li>
        </ul>
    </div>
</div>
<? ex_end(); ?>


<? ex_start('Wege im Internet nachvollziehen', open: false); ?>
<p>
    Mit dem Werkzeug <code>traceroute</code> können wir den Weg nachvollziehen, den ein Datenpaket von einem Rechner A zu einem Rechner B nimmt.
</p>
<p>
    Dieses Paket wird auf der heute angesprochenen Internetschicht versendet: Euer Rechner (bzw. Smartphone) besitzt eine IP-Adresse und sendet mehrfach ein spezielles Paket an einen Rechner mit einer Ziel-IP-Adresse. Dieses Paket hat eine besondere Information angeheftet: Immer, wenn ein Knotenpunkt (= Router) das Paket liest und entsprechend an den nächsten Knoten weiterschickt, verringert er den sogenannten „time-to-live“-Zähler (TTL) des Pakets um 1. Wenn ein Knoten ein Paket bekommt, bei dem der TTL-Zähler auf „0“ steht, dann sendet dieser Knoten ein neues Paket mit einer Fehlermeldung zurück (quasi eine „Package is dead“-Nachricht).
</p>
<p>
    Euer Rechner, der das Paket ja ursprünglich losgeschickt hat, z.B. mit einer TTL von 7, wartet somit auf die „Package is dead“-Nachricht und kann dann
</p>
<ul>
    <li>die IP-Adresse des Zwischenknotens erfahren und...</li>
    <li>die Zeit messen, die vergangen ist, bis die Fehlernachricht zurückkam.</li>
</ul>

<p>
    Statt der IP-Adresse kann man auch eine Domain eingeben wie z.B. „ebg-schoenberg.com“. Die IP-Adresse des Schulservers wird dann vorab noch nachgeschlagen (wie lautet die IP-Adresse? - dies wird nachfolgend auch immer neben der Domain angezeigt)
</p>

<p>
    Falls ihr unter Windows unterwegs seid, tippt folgendes in die Eingabeaufforderung/Terminal: <code>tracert ebg-schoenberg.com</code>
</p>
<p>
    Falls ihr unter Linux/Max OS unterwegs seid, tippt folgendes in das Terminal: <code>traceroute ebg-schoenberg.com</code>
</p>
<p>
    Ihr könnte die Anfrage aber auch über folgende Webseite machen: <a href="https://geotraceroute.com/?node=0&host=ebg-schoenberg.com">https://geotraceroute.com/?node=0&host=ebg-schoenberg.com</a>. Das Schöne hierbei ist, dass man die IP-Adressen der Zwischenknoten in einer Datenbank nachschlagen kann, und somit den geografischen Standort des Routers ermitteln kann (zumindest ungefähr).
</p>
<p>
    <strong>Probiere</strong> verschiedene Adressen aus, z.B. <code>www.auckland.ac.nz</code> und noch weitere. Zwischen welchen Knotenpunkten muss es sich um Unterseekabel handeln? Wird immer die kürzeste Verbindung (Luftlinie) genommen? Welche Kontinente werden durchkreuzt bei Interkontinentalverbindungen? Im Folgenden seht ihr beispielhaft die Ergebnisse zwei solcher traceroute-Ausführungen:
</p>
<div class="row">
    <div class="col">
        <a href="res/traceroute.png"><img src="res/traceroute.png" alt="" style="max-width: 100%;"></a>
    </div>
    <div class="col">
        <a href="res/traceroute2.png"><img src="res/traceroute2.png" alt="" style="max-width: 100%;"></a>
    </div>
</div>
<? ex_end(); ?>

<? }; ?>