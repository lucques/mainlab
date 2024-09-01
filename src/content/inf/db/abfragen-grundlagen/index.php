<?
    $preprocess = function (TargetPreprocessContext $c) {
        $c->activate_module('role-info-db');

        $c->run_macro('title', 'set', 'Abfragen: Grundlagen');

        $c->add_subpage('aufgaben');

        $c->activate_module('sql-js-inline');
        $c->activate_module('footnotes');

        $c->update_module_config('source', [
            'language' => 'sql',
            'line_numbers' => false,
        ]);
    };
?>

<? $process = function(Target $target) { ?>

<? css_start(); ?>
    #content main {
        min-width:1200px;
        max-height: 100%;
    }
<? css_end(); ?>

<? $db_id_fahrschule = sql_js_inline_init_db_var(__DIR__ . '/../res/dbs/fahrschule-minimal.sql'); ?>

<p>
    Über Datenbankabfragen können wir uns Tabellen anzeigen lassen. Dazu hat sich eine Sprache durchgesetzt, deren Befehle wie englische Sätze klingen: <dfn>SQL</dfn>, die <dfn>Structured Query Language</dfn>. Die folgende Fahrschuldatenbank soll als Beispiel dienen.
</p>

<div class="d-flex gap-3" style="font-size: smaller;">
    <? sql_js_inline_exec_and_print($db_id_fahrschule, 'SELECT * FROM fahrlehrer', title: '<strong><em>fahrlehrer</em></strong>'); ?>
    <? sql_js_inline_exec_and_print($db_id_fahrschule, 'SELECT * FROM fahrschueler', title: '<strong><em>fahrschueler</em></strong>'); ?>
</div>


<? acc_single_item_start('<strong>A. Vollständige Tabelle</strong>'); ?>
<?
    $sql = 'SELECT * FROM fahrlehrer';
?>
<div class="clearfix">
    <div class="float-end">
        <? sql_js_inline_exec_and_print($db_id_fahrschule, $sql); ?>
    </div>
    <p class="first-child">
        Die folgende Abfrage zeigt die <strong>vollständige</strong> Tabelle <em>fahrlehrer</em> an.
    </p>
<?
    source_start(); echo $sql; source_end();
?>
</div>
<? acc_single_item_end(); ?>


<? acc_single_item_start('<strong>B. Projektion</strong>'); ?>
<?
    $sql = 'SELECT vorname, nachname FROM fahrlehrer';
?>
<div class="clearfix">
    <div class="float-end">
        <? sql_js_inline_exec_and_print($db_id_fahrschule,  $sql); ?>
    </div>
    <p class="first-child">
        Manchmal interessiert man sich nur für bestimmte Spalten. Man sagt auch, dass man diese Spalten aus der ursprünglichen Tabelle „herausprojiziert“ und spricht folglich von einer <dfn>Projektion</dfn>. Bsp.:
    </p>
    <p class="lead">
        „Die Vornamen und Nachnamen aller Fahrlehrer“
    </p>
    <p>
        würde der folgenden Abfrage entsprechen.
    </p>
<?
    source_start(); echo $sql; source_end();
?>
</div>
<? acc_single_item_end(); ?>


<? acc_start(); ?>
<? acc_item_start('<strong>C. Selektion</strong>'); ?>
<? ob_start(); ?>
SELECT vorname, nachname, anz_fahrstunden
FROM   fahrschueler
WHERE  anz_fahrstunden > 15
<? $sql = ob_get_clean(); ?>
<div class="clearfix">
    <div class="float-end">
        <? sql_js_inline_exec_and_print($db_id_fahrschule, $sql); ?>
    </div>
    <p class="first-child">
        Manchmal interessiert man sich nur für bestimmte Zeilen. Man sagt auch, dass man aus der ursprünglichen Tabelle „selektiert“ und spricht folglich von einer <dfn>Selektion</dfn>. Die Selektion erfolgt nach einer Bedingung, die man sehr flexibel wählen kann. Bsp.:
    </p>
    <p class="lead">„Vornamen, Nachnamen und Fahrstunden aller Fahrschüler, die mehr als 15 Fahrstunden absolviert haben“</p>
    <p>
        ...würde der folgenden Abfrage entsprechen.
    </p>
<?
    source_start(); echo $sql; source_end();
?>
</div>
<? acc_item_end(); ?>
<? acc_item_start('Bedingungen'); ?>
<p>
    Statt der Bedingung <code>anz_fahrstunden > 15</code> sind viele weitere möglich; hier eine Auflistung einiger am häufigsten verwendeter.
</p>
<table class="table">
    <thead>
        <tr>
            <th style="min-width:300px;">Bedingung</th>
            <th>Bedeutung</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td><code>vorname = "Manfred"</code></td>
            <td>Gleichheit für Zeichenketten</td>
        </tr>
        <tr>
            <td><code>vorname <> "Manfred"</code></td>
            <td>Ungleichheit für Zeichenketten</td>
        </tr>
        <tr>
            <td><code>anzahl_fahrstunden = 10</code></td>
            <td>Gleichheit für Zahlen</td>
        </tr>
        <tr>
            <td><code>anzahl_fahrstunden >= 10</code></td>
            <td>Zahlenvergleich</td>
        </tr>
        <tr>
            <td><code>theorie_bestanden = 1</code></td>
            <td>Prüfung für Wahrheitswerte: <code>1</code> entspricht „wahr“, <code>0</code> entspricht „falsch”</td>
        </tr>
        <tr>
            <td><code>gebdatum < '2000-04-01'</code></td>
            <td>Datumsvergleich</td>
        </tr>
        <tr>
            <td><code>vorname LIKE 'A%'</code></td>
            <td>Musterabgleich für Zeichenketten: Nur Vornamen, die mit <code>A</code> beginnen. Das <code>%</code> dient als Platzhalter für eine beliebige Zeichenkette, auch <em>wildcard</em> genannt.</td>
        </tr>
        <tr>
            <td><code>gebdatum IS NULL</code></td>
            <td>Der Wert in Spalte <code>gebdatum</code> ist leer gelassen worden</td>
        </tr>
        <tr>
            <td><code>gebdatum IS NOT NULL</code></td>
            <td>Der Wert in Spalte <code>gebdatum</code> ist nicht leer gelassen worden</td>
        </tr>
    </tbody>
</table>
<? acc_item_end(); ?>
<? acc_item_start('Logische Operatoren'); ?>
<p>
    Bedingungen lassen sich zu neuen Bedingungen kombinieren.
</p>
<table class="table">
    <tr>
        <td>
            <em>&lt;bedingung1&gt;</em> <code>AND</code> <em>&lt;bedingung2&gt;</em>
        </td>
        <td>
            Beide Bedingungen müssen erfüllt sein.
        </td>
    </tr>
    <tr>
        <td>
            <em>&lt;bedingung1&gt;</em> <code>OR</code> <em>&lt;bedingung2&gt;</em>
        </td>
        <td>
            Mindestens eine der Bedingungen muss erfüllt sein.
        </td>
    </tr>
    <tr>
        <td>
            <code>NOT</code> <em>&lt;bedingung&gt;</em>
        </td>
        <td>
            Die Bedingung darf nicht erfüllt sein.
        </td>
    </tr>
</table>
<p>
    Manchmal ist nicht klar, in welcher Reihenfolge die <code>AND</code>-, <code>OR</code>- und <code>NOT</code>-Operatoren gelesen werden sollen. In diesem Fall klammert man entsprechend, ganz analog zur Klammerung bei Zahlentermen. Siehe dazu auch das folgende Beispiel:
</p>
<p>
    <em>Bsp.: „Alle Fahrschüler, die 2001 geboren wurden, oder aber die Theorieprüfung bestanden haben.“</em>
</p>
<? source_start(); ?>
SELECT *
FROM   fahrschueler
WHERE  (geburtsdatum >= '2001-01-01' AND geburtsdatum <  '2002-01-01') OR
       theorie_bestanden = 1
<? source_end(); ?>
<? acc_item_end(); ?>
<? acc_end(); ?>


<? acc_single_item_start('<strong>D. Schnitt, Vereinigung und Differenz</strong>'); ?>
<? ob_start(); ?>
SELECT vorname FROM fahrlehrer
UNION
SELECT vorname FROM fahrschueler
<? $sql = ob_get_clean(); ?>
<div class="clearfix">
    <div class="float-end">
        <? sql_js_inline_exec_and_print($db_id_fahrschule, $sql); ?>
    </div>
    <p class="first-child">
        Manchmal möchte man die Zeilen mehrerer Tabellen kombinieren. Die Idee ist, dass man eine Tabelle als eine Menge von Elementen auffasst und die Mengenoperationen <dfn>Vereinigung</dfn>, <dfn>Schnitt</dfn>, <dfn>Mengendifferenz</dfn> anwendet. Wichtig ist hierbei, dass das Schema der beteiligten Tabellen (also die Spaltennamen inkl. Datentypen) übereinstimmt. Bsp.:
    </p>
    <p class="lead">
        „Alle Vornamen von Fahrlehrern und Fahrschülern“
    </p>
    <p>
        ...würde der folgenden Abfrage entsprechen.
    </p>
<?
    source_start(); echo $sql; source_end();
?>
    <p>
        Die hierzu passende SQL-Abfrage liest sich wieder wie ein englischer Satz; genauer werden zwei Sätze mittels der Konjunktion <code>UNION</code> verbunden. Folgende weitere SQL-Operatoren gibt es:
    </p>
    <div class="d-inline-flex">
        <table class="table">
            <thead>
                <tr>
                    <th>SQL-Operator</th>
                    <th>Mengenoperator</th>
                    <th>Math. Symbol</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><code>UNION</code></td>
                    <td>Vereinigung</td>
                    <td>$\bigcup$</td>
                </tr>
                <tr>
                    <td><code>INTERSECT</code></td>
                    <td>Schnitt</td>
                    <td>$\bigcap$</td>
                </tr>
                <tr>
                    <td><code>EXCEPT</code></td>
                    <td>Differenz</td>
                    <td>$\setminus$</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
<? acc_single_item_end(); ?>


<? acc_single_item_start('<strong>E. Spalten-Umbenennung</strong>', open: false); ?>
<? ob_start(); ?>
SELECT vorname AS name
FROM   fahrlehrer
<? $sql = ob_get_clean(); ?>
<div class="clearfix">
    <div class="float-end">
        <? sql_js_inline_exec_and_print($db_id_fahrschule, $sql); ?>
    </div>
    <p class="first-child">
        Jede Spalte ist mit einem Spaltenkopf ausgestattet, dem sogenannten Attribut. Der Spaltenkopf kann <dfn>umbenannt</dfn> werden. Die Umbenennung ist vor allem später wichtig, wenn es passieren kann, dass beim Verschmelzen zweier Tabellen mehrere Spaltenköpfe denselben Namen tragen. In folgendem Beispiel wird der Spaltenkopf „vorname“ in „name“ umbenannt.
    </p>
<?
    source_start(); echo $sql; source_end();
?>
</div>
<? acc_single_item_end(); ?>


<? acc_single_item_start('<strong>F. Sortieren</strong>', open: false); ?>
<? ob_start(); ?>
SELECT   vorname, nachname, anz_fahrstunden
FROM     fahrschueler
ORDER BY anz_fahrstunden
<? $sql = ob_get_clean(); ?>
<div class="clearfix">
    <div class="float-end">
        <? sql_js_inline_exec_and_print($db_id_fahrschule, $sql); ?>
    </div>
    <p class="first-child">
        Die Zeilen einer Tabelle können <dfn>sortiert</dfn> werden mittels <code>ORDER BY</code>. Es können mehrere Spaltennamen angegeben werden, per Komma getrennt. Um eine absteigende Sortierung zu erzielen, muss das Schlüsselwort <code>DESC</code> (englisch <em>descending</em>) angefügt werden, z.B. <code>ORDER BY anz_fahrstunden DESC</code>.
    </p>
<?
    source_start(); echo $sql; source_end();
?>
</div>
<? acc_single_item_end(); ?>


<? acc_single_item_start('<strong>G. Multimenge vs. Menge</strong>', open: false); ?>
<p>
    Wir waren bisher nicht ganz korrekt: Eine Tabelle ist eigentlich eine <dfn>Multimenge</dfn> von Zeilen, nicht eine <dfn>Menge</dfn>. Der Unterschied ist, dass Elemente in einer Multimenge mehrfach vorkommen dürfen, in einer Menge hingegen nicht.
</p>
<p>
    Tabellen können grundsätzlich Zeilen mehrfach enthalten. Wir können Duplikate entfernen, indem wir in der Anfrage <code>SELECT DISTINCT</code> statt bloß <code>SELECT</code> formulieren. „Distinct“ ist englisch für „unterschieden“<? footnote_start(); ?>Im Deutschen gibt es zudem auch noch das selten verwendete Wort „distinguiert“, das denselben Ursprung hat, aber anders verwendet wird.<? footnote_end(); ?>.
</p>
<div class="row">
    <div class="col">
<? ob_start(); ?>
SELECT   vorname
FROM     fahrschueler
ORDER BY vorname
<? $sql = ob_get_clean(); ?>
        <div class="clearfix">
            <div class="float-end">
                <? sql_js_inline_exec_and_print($db_id_fahrschule, $sql); ?>
            </div>
            <p class="first-child lead" data-sync-height-id="p-1">Tabelle als <dfn>Multimenge</dfn> von Zeilen</p>
            <p data-sync-height-id="p-2">
                „<dfn>Multimenge</dfn>“ bedeutet, dass Elemente mehrfach enthalten sein dürfen.
            </p>
            <p data-sync-height-id="p-3">
                Die folgende Abfrage selektiert also alle Vornamen unter den Fahrschülern.
            </p>
            <? source_start(); echo $sql; source_end(); ?>
        </div>
    </div>
    <div class="col">
<? ob_start(); ?>
SELECT DISTINCT vorname
FROM            fahrschueler
ORDER BY        vorname
<? $sql = ob_get_clean(); ?>
        <div class="clearfix">
            <div class="float-end">
                <? sql_js_inline_exec_and_print($db_id_fahrschule, $sql); ?>
            </div>
            <p class="first-child lead" data-sync-height-id="p-1">Tabelle als <dfn>Menge</dfn> von Zeilen</p>
            <p data-sync-height-id="p-2">
                „<dfn>Menge</dfn>“ bedeutet, dass Elemente einfach enthalten sind (zugehörig vs. nicht zugehörig).
            </p>
            <p data-sync-height-id="p-3">
                Die folgende Abfrage selektiert also alle <strong>verschiedenen</strong> Vornamen unter den Fahrschülern.
            </p>
            <? source_start(); echo $sql; source_end(); ?>
        </div>
    </div>
</div>
<? acc_single_item_end(); ?>


<? acc_single_item_start('<strong>H. Limit</strong>', open: false); ?>
<p>
    Manchmal interessiert man sich nur für eine bestimmte Anzahl an Ergebnissen, z.B. die „Top 3“, und will also die Zeilenanzahl <dfn>limitieren</dfn> (deutsch: begrenzen). In diesem Fall fügt man einer (beliebig komplexen) <code>SELECT</code>-Abfrage noch eine <code>LIMIT</code>-Klausel an. Diese bewirkt, dass abschließend nur die ersten <em>n</em> Zeilen ausgegeben werden. 
</p>
<? ob_start(); ?>
SELECT   vorname, nachname, anz_fahrstunden
FROM     fahrschueler
ORDER BY anz_fahrstunden DESC
LIMIT    3
<? $sql = ob_get_clean(); ?>
<div class="clearfix">
    <div class="float-end">
        <? sql_js_inline_exec_and_print($db_id_fahrschule, $sql); ?>
    </div>
    <? source_start(); echo $sql; source_end(); ?>
</div>
<? acc_single_item_end(); ?>

<? }; ?>