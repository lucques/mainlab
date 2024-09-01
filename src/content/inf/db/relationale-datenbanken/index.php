<?
    $preprocess = function (TargetPreprocessContext $c) {
        $c->activate_module('role-info-db');
        
        $c->run_macro('title', 'set', 'Relationale Datenbanken');

        $c->activate_module('sql-js-inline');
    };
?>

<? $process = function(Target $target) { ?>

<? css_start(); ?>
#content main {
    min-width:1100px;
    max-height: 100%;
}
<? css_end(); ?>

<? $db_id_onlineshop = sql_js_inline_init_db_var(__DIR__ . '/../res/dbs/onlineshop-minimal.sql'); ?>
<? $db_id_fahrschule = sql_js_inline_init_db_var(__DIR__ . '/../res/dbs/fahrschule-minimal.sql'); ?>

<p>
    Als <dfn>Datenbank</dfn> wird ein Informatiksystem bezeichnet, welche große Datenmengen effizient (also schnell) verwalten kann. 
</p>
<p>
    Ein sehr grundlegendes Konzept zur Strukturierung von Daten sind <strong>Tabellen</strong>. Wenn man nun mehrere Tabellen verwendet, deren Daten miteinander verknüpft sein können, stellt sich heraus, dass von der Fahrschule bis hin zum Online-Buchhändler fast alles in „Tabellenform“ gebracht werden kann.
</p>
<p>
    Eine <dfn>Relationale Datenbank</dfn> verwaltet Daten in mehreren Tabellen. Der Begriff „relational“ kommt vom Konzept der <a href="https://de.wikipedia.org/wiki/Relation_(Mathematik)">„Relation“</a>, der Repräsentation einer Tabelle als mathematisches Objekt.
</p>
<p>
    <em>Datenbanken können neben Tabellen auch auf anderen Konzepten beruhen, z.B. auf Graphen, Zeitreihen, Objekten und anderen. Wir beschäftigen uns hier nur mit dem erfolgreichsten Vertreter der Datenbanken, den relationalen Datenbanken.</em>
</p>

<? acc_single_item_start('<strong>Fachbegriffe</strong>', variant: 'definition',  open: false); ?>
<p>
    Es gibt bei relationalen Datenbanken verschiedene Fachbegriffe für dieselben Dinge. Warum?
</p>
<ul>
    <li>Mathematiker/innen sehen Tabellen als mathematische Objekte an, nämlich als Menge von Tupeln ansehen.</li>
    <li>Praktiker/innen sehen Tabellen als... naja, Tabellen an.</li>
</ul>
<p>
    <em>Alle folgenden Begriffe sind übliche Fachbegriffe, und somit ist es egal, ob du die mathematischen oder technischen Begriffe wählst.</em>
</p>
<div class="flex">
    <table class="table">
        <thead>
            <tr>
                <th>Mathematischer Fachbegriff</th>
                <th>Technischer Fachbegriff</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Relation</td>
                <td>Tabelle</td>
            </tr>
            <tr>
                <td>Attribut</td>
                <td>Spalte</td>
            </tr>
            <tr>
                <td>Tupel</td>
                <td>Zeile, Datensatz</td>
            </tr>
        </tbody>
    </table>
    <? ref_img(__DIR__ . '/res/ext/Begriffe_relationaler_Datenbanken.png') ?>
</div>
<? acc_single_item_end(); ?>


<? nav_h(2, 'Schlüssel'); ?>
<p>
    Die Daten der einzelnen Tabellen „leben“ meistens nicht einfach unabhängig nebeneinander, sondern sind <strong>miteinander verknüpft</strong>. Die Idee ist hier, dass man jede einzelne Zeile „durchnummieriert“ und dann in einer anderen Tabelle auf diese Nummer verweist. In der Praxis muss es nicht unbdingt eine Nummer sein: Hauptsache, man verwendet Merkmale, welche eindeutig sind, sogenannte <dfn>Schlüssel</dfn>. Dies könnten z.B. die ISBN für Bücher oder der IServ-Benutzername für Schüler/innen am EBG sein.
</p>
<p>
    Betrachte nun das folgende Beispiel einer Fahrschule.
</p>
<div class="d-flex gap-3" style="font-size: smaller;">
    <? sql_js_inline_exec_and_print($db_id_fahrschule, 'SELECT * FROM fahrlehrer', title: '<strong><em>fahrlehrer</em></strong>'); ?>
    <? sql_js_inline_exec_and_print($db_id_fahrschule, 'SELECT * FROM fahrschueler', title: '<strong><em>fahrschueler</em></strong>'); ?>
</div>


<? acc_start(); ?>
<? acc_item_start('<dfn>Primärschlüssel</dfn> (Definition)', open: false); ?>
<p>
    Ein <dfn>Primärschlüssel</dfn> ist eine Menge von Spalten, deren Werte <strong>a) eindeutig</strong> einzelne Zeilen identifizieren und die <strong>b) minimal</strong> ist. Es gibt manchmal mehrere Kandidaten für den Primärschlüssel einer Tabelle, von denen dann einer gewählt werden muss.
</p>
<p>
    Die Bedeutung der beiden Eigenschaften <strong>a) eindeutig</strong> und <strong>b) minimal</strong> wird in den folgenden Beispielen und Gegenbeispielen erläutert.
</p>
<? acc_item_end(); ?>
<? acc_item_start('Beispiele', variant: 'example'); ?>
<p>
    Die folgenden Schlüssel sind z.B. Kandidaten für den Primärschlüssel der Tabelle <code>fahrschueler</code>.
</p>
<table class="table">
    <thead>
        <tr>
            <th style="width:20%;">Schlüssel</th>
            <td><strong>ist</strong> ein Kandidat für den Primärschlüssel, weil...</td>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>$\{$ <code>nr</code> $\}$</td>
            <td>
                ...seine Werte, z.B. „<code>2</code>“, <strong>eindeutig</strong> eine Zeile identifizieren. Es kann zudem keine Spalte herausgenommen werden, weshalb er <strong>minimal</strong> ist.
            </td>
        </tr>
        <tr>
            <td>$\{$ <code>vorname</code>, <code>nachname</code>, <code>gebdatum</code> $\}$</td>
            <td>
                ...seine Werte, z.B. „<code>Finn Koch</code>, geb. am <code>'2006-04-04'</code>“ <strong>eindeutig</strong> eine Zeile identifizieren. Es kann zudem keine Spalte herausgenommen werden, weshalb er <strong>minimal</strong> ist.
            </td>
        </tr>
    </tbody>
</table>
<? acc_item_end(); ?>
<? acc_item_start('Gegenbeispiele', variant: 'example'); ?>
<p>
    Die folgenden Schlüssel sind z.B. <strong>keine</strong> Kandidaten für den Primärschlüssel der Tabelle <code>fahrschueler</code>.
</p>
<table class="table">
    <thead>
        <tr>
            <th style="width:20%;">Schlüssel</th>
            <td><strong>ist <em>kein</em></strong> Kandidat für den Primärschlüssel, weil...</td>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>$\{$<code>vorname</code>, <code>nachname</code>$\}$</td>
            <td>
                ...seine Werte, z.B. „<code>Finn</code> <code>Koch</code>“ zu mehreren Zeilen passen und somit <strong><em>nicht</em> eindeutig</strong> sind (es gibt mehere Fahrschüler mit dem gleichen Namen, die jedoch einen unterschiedlichen Geburtstag haben).
            </td>
        </tr>
        <tr>
            <td>$\{$ <code>nr</code>, <code>nachname</code> $\}$</td>
            <td>
                ...er nicht <strong><em>nicht</em> minimal</strong> ist. Es kann die Spalte <code>nachname</code> herausgenommen werden, und der sich ergebende Schlüssel $\{$<code>nr</code>$\}$ kann als Primärschlüssel gewählt werden.</td>
        </tr>
    </tbody>
</table>
<? acc_item_end(); ?>
<? acc_end(); ?>


<? acc_single_item_start('<dfn>Fremdschlüssel</dfn> (Definition)', open: false); ?>
<p>
    Ein <dfn>Fremdschlüssel</dfn> ist eine Menge von Spalten, die dem Primärschlüssel einer anderen Tabelle entsprechen. Die Fremdschlüssel-Werte müssen dabei auch als Primärschlüssel-Werte in der Tabelle existieren.
</p>
<p>
    Ein Fremdschlüssel hat also den Zweck, die Zeilen einer Tabelle mit Zeilen einer anderen Tabelle zu verknüpfen. Z.B. verweist der Fremdschlüssel $\{$ <code>fl_kuerzel</code> $\}$ der Tabelle <code>fahrschueler</code> auf den Primärschlüssel $\{$ <code>kuerzel</code> $\}$ der Tabelle <code>fahrlehrer</code>.
</p>
<? acc_single_item_end(); ?>

<p>
    Die Datenbank sorgt automatisch dafür, dass Fremdschlüssel-Werte immer auch einen korrespondierenden Primärschlüssel-Wert haben. Mit anderen Worten: Jede ISBN, die im Warenkorb liegt, muss auch in der Tabelle <code>buch</code> vorkommen.
</p>



<? acc_start(); ?>
<? acc_item_start('Vollständiges Beispiel', variant: 'example', open: false); ?>
<div>
    <div class="d-flex" style="column-gap: 30px; flex-wrap: wrap; font-size: smaller;">
        <? ob_start(); ?>
            SELECT * from kunde
        <? $sql = ob_get_clean(); ?>
        <? sql_js_inline_exec_and_print($db_id_onlineshop, $sql, title: '<strong><em>kunde</em></strong>'); ?>
        
        <? ob_start(); ?>
            SELECT * from warenkorb
        <? $sql = ob_get_clean(); ?>
        <? sql_js_inline_exec_and_print($db_id_onlineshop, $sql, title: '<strong><em>warenkorb</em></strong>'); ?>
        
        <? ob_start(); ?>
            SELECT * from buch
        <? $sql = ob_get_clean(); ?>
        <? sql_js_inline_exec_and_print($db_id_onlineshop, $sql, title: '<strong><em>buch</em></strong>'); ?>
    </div>
    <div>
        <p>Tabelle <code>kunde</code>:</p>
        <ul>
            <li><strong>Primärschlüssel</strong>: $\{$ <code>kundennr</code> $\}$</li>
        </ul>
        <p>Tabelle <code>buch</code>:</p>
        <ul>
            <li><strong>Primärschlüssel</strong>: $\{$ <code>isbn</code> $\}$</li>
        </ul>
        <p>Tabelle <code>warenkorb</code>:</p>
        <ul>
            <li><strong>Primärschlüssel</strong>: $\{$ <code>kundennr</code>, <code>isbn</code> $\}$</li>
            <li>Fremdschlüssel: $\{$ <code>kundennr</code> $\}$ auf Primärschlüssel $\{$ <code>kundennr</code> $\}$ der Tabelle <code>kunde</code> </li>
            <li>Fremdschlüssel: $\{$ <code>isbn</code> $\}$ auf Primärschlüssel $\{$ <code>isbn</code> $\}$ der Tabelle <code>buch</code> </li>
        </ul>
    </div>
</div>
<? acc_item_end(); ?>
<? acc_end(); ?>



<? nav_h(2, 'Redundanzen, Anomalien, Inkonsistenzen'); ?>
<p>
    Im Folgenden sind noch einmal die beiden Entwürfe für den Online-Buchhändler aufgeführt.
</p>



<? acc_start(variant: 'example'); ?>
<? acc_item_start('Entwurf 1'); ?>
<? ob_start(); ?>
        SELECT kunde.vorname, kunde.nachname, kunde.gebdatum, buch.isbn, buch.titel, buch.autor, buch.preis, buch.genre, warenkorb.anzahl
        FROM kunde, warenkorb, buch
        WHERE kunde.kundennr = warenkorb.kundennr AND
              warenkorb.isbn = buch.isbn
<? $sql = ob_get_clean(); ?>
<div style="font-size: smaller;">
    <? sql_js_inline_exec_and_print($db_id_onlineshop, $sql, title: '<strong><em>warenkorb</em></strong>'); ?>
</div>
<? acc_item_end(); ?>


<? acc_item_start('Entwurf 2'); ?>
<div class="d-flex" style="column-gap: 30px; flex-wrap: wrap; font-size: smaller;">
    <? ob_start(); ?>
        SELECT * from kunde
    <? $sql = ob_get_clean(); ?>
    <? sql_js_inline_exec_and_print($db_id_onlineshop, $sql, title: '<strong><em>kunde</em></strong>'); ?>
    
    <? ob_start(); ?>
        SELECT * from warenkorb
    <? $sql = ob_get_clean(); ?>
    <? sql_js_inline_exec_and_print($db_id_onlineshop, $sql, title: '<strong><em>warenkorb</em></strong>'); ?>
    
    <? ob_start(); ?>
        SELECT * from buch
    <? $sql = ob_get_clean(); ?>
    <? sql_js_inline_exec_and_print($db_id_onlineshop, $sql, title: '<strong><em>buch</em></strong>'); ?>
</div>
<? acc_item_end(); ?>
<? acc_end(); ?>

<p>
    Mache dir zunächst klar, dass beide Entwürfe <strong>exakt dieselben Informationen</strong> erfassen, nicht mehr und nicht weniger. Folgende Unterschiede treten jedoch auf.
</p>

<table class="table">
    <thead>
        <tr>
            <th></th>
            <th style="width: 50%;">Entwurf 1</th>
            <th style="width: 50%;">Entwurf 2</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <th>
                Tabellen
            </th>
            <td>
                <p>
                    Kundendaten, Buchdaten und Warenkorbdaten in <strong>einer Tabelle</strong>.
                </p>
            </td>
            <td>
                <p>
                    Kundendaten, Buchdaten und Warenkorbdaten in <strong>getrennten Tabellen</strong>.
                </p>
            </td>
        </tr>
        <tr>
            <th>
                Verknüpfung von Daten
            </th>
            <td>
                <p>
                    Verknüpfung über <strong>gemeinsame Zeile</strong>. 
                </p>
            </td>
            <td>
                <p>
                    Verknüpfung über <dfn>Primär- und Fremdschlüssel</dfn>: Die Spalten <code>kunde.kundennr</code> und <code>buch.isbn</code> sind jeweils Primärschlüssel, die Spalten <code>warenkorb.kundennr</code> und <code>warenkorb.isbn</code> sind jeweils Fremdschlüssel, welche auf die jeweiligen Primärschlüssel verweisen.
                </p>
            </td>
        </tr>
        <tr>
            <th>
                Redundanzen
            </th>
            <td>
                <p>
                    Sowohl Daten der Kunden als auch der Bücher werden mehrfach gespeichert. Fachbegriff für mehrfach gespeicherte Daten: <dfn>Redundanz</dfn>.
                </p>
            </td>
            <td>
                <p>
                    <strong>Keine Redundanzen</strong>: Daten werden nur einmal gespeichert.
                </p>
            </td>
        </tr>
        <tr>
            <th>
                Anomalien und Inkonsistenzen
            </th>
            <td>
                <p>
                    Bestimmte Operationen haben Auswirkungen auf die Korrektheit und Konsistenz der Daten. Solch eine Operation wird <dfn>Anomalie</dfn> genannt. Mehr dazu weiter unten.
                </p>
            </td>
            <td>
                <p>
                    <strong>Keine Anomalien</strong> möglich (bitte Bsp. prüfen). Da keine Redundanzen vorliegen, sind auch <strong>keine Inkonsistenzen</strong> erwartbar. 
                </p>
            </td>
        </tr>
    </tbody>
</table>

<? acc_single_item_start('Anomalien', variant: 'layer_5'); ?>
<div class="row">
    <div class="col">
        <p>
            <em>Bsp. für <dfn>Lösch-Anomalie</dfn></em>
        </p>
        <p>
            Der Titel „Der Alchimist“ soll nicht mehr gelistet werden. Es werden also alle Zeilen gelöscht, in welchen der Titel „Der Alchimist“ vorkommt. Dabei gehen jedoch auch die Daten der Kunden verloren, welche diesen Titel in ihrem Warenkorb hatten. Der Datenbestand ist nicht mehr korrekt.
        </p>
    </div>
    <div class="col">
        <p>
            <em>Bsp. für <dfn>Änderungs-Anomalie</dfn></em>
        </p>
        <p>
            Die Benutzerin Meike Musterfrau stellt fest, dass ihr Geburtsdatum falsch eingetragen ist. Sie möchte es ändern lassen. Dazu muss jedoch jede Zeile, in welcher Meike Musterfrau vorkommt, geändert werden. Es besteht die Gefahr, eine Zeile zu vergessen. Dies ist eine Änderungs-Anomalie, welche eine <dfn>Inkonsistenz</dfn> im Datenbestand bewirkt.
        </p>
    </div>
    <div class="col">
        <p>
            <em>Bsp. für <dfn>Einfüge-Anomalie</dfn></em>
        </p>
        <p>
            Ein neuer Buchtitel soll gelistet werden. Es soll also eine Zeile eingefügt werden. Für das Einfügen einer Zeile werden aber Kunden benötigt, welche den Buchtitel in ihrem Warenkorb haben.
        </p>
    </div>
</div>
<? acc_single_item_end(); ?>

<? nav_h(2, 'Fazit'); ?>

<p>
    Bei der Priorisierung der verschiedenen Aspekte nehmen <strong>Korrektheit</strong> und <strong>Konsistenz</strong> der Daten in der Regel den vordersten Platz ein. Redundanzen sollte deshalb unbedingt vermieden werden. Aus diesem Grund ziehen wir in der Regel Entwurf 2 dem Entwurf 1 vor.
</p>

<? }; ?>