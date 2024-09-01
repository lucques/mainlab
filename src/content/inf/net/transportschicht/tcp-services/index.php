<?
    $preprocess = function (TargetPreprocessContext $c) {
        $c->activate_module('role-info');
        
        $c->run_macro('title', 'set', 'TCP: Was bietet es?');
    };
?>

<? $process = function(Target $target) { ?>

<p>
    TCP bietet an, <dfn>Datenströme</dfn> (beliebig große Mengen und kontinuierlich) <dfn>verlässlich</dfn> zwischen <dfn>zwei Apps</dfn> zu übertragen.
</p>
<p>
    Dazu kann eine <dfn>TCP-Verbindung</dfn> zwischen zwei sogenannten <dfn>Sockets</dfn> etabliert werden. Eine Verbindung wird genau durch solch ein Socketpaar beschrieben, welches ein Paar von IP-Adressen um ein Paar von sogenannten <dfn>Portnummern</dfn> erweitert:
</p>
<p>
    Eine Portnr. ist eine Zahl zwischen 0 und 65535 (16 Bit).
</p>
<p class="text-center">
    <img src="res/tcp_services.png" alt="" style="width: 100%;">
</p>
<p>
    Nun bietet TCP an, nach Herstellung einer solchen Verbindung einen Datenstrom von A nach B und einen Datenstrom von B nach A verlässlich (fehlerfrei, vollständig & die Reihenfolge der Daten respektierend) zu übermitteln.
</p>
<p class="text-center">
    <img src="res/echo_server_client.png" alt="" style="width: 100%;">
</p>


<? ex_start('Port-Nummern', open: false); ?>
<p>
    Eine Portnummer ist eine Zahl zwischen 0 und 65535, was einer Datenmenge von 16 Bit entspricht. <strong>Prüfe</strong> dies.
</p>
<? ex_end(); ?>



<? ex_start('Echo-Server und einfacher Client', open: false); ?>
<img src="../../res/filius/img/ein-netz-client-server.png" alt="" style="width: 300px;" class="float-end">
<p class="first-child">
    <strong>Erstelle</strong> ein einfaches Netz mit drei Rechnern wie rechts abgebildet.
</p>
<p><strong>Installiere</strong> auf $192.168.0.12$ einen <em>Echo-Server</em>. <strong>Installiere</strong> auf $192.168.0.10$ und $192.168.0.11$ einen <em>„einfachen Client“</em>.</p>
<p><strong>Starte</strong> den Server auf Port $4444$.</p>
<p><strong>Starte</strong> die folgenden Verbindungen:</p>
<ul>
    <li>Von $192.168.0.10$ zu $192.168.0.12$</li>
    <li>Von $192.168.0.11$ zu $192.168.0.12$</li>
</ul>
<p>
    <strong>Sende</strong> Nachrichten von den Clients an den Server. Wie antwortet der Server? Wird dies seinem Namen „Echo-Server“ gerecht? 
</p>
<p>
    <strong>Betrachte</strong> den Datenaustausch unter „Datenaustausch anzeigen“:
</p>
<p>
    <img src="res/einfache_tcp_verbindung.png" alt="" style="width: 100%;">
</p>
<p>
    Die meisten angezeigten Informationen sind zunächst irrelevant. <strong>Betrachte</strong> nur die Quelle- und Ziel-Spalten. Welche Port-Nummern sind beteiligt, an welchen Rechnern?
</p>
<p>
    <strong>Zeichne</strong> eine Skizze, in der alle Rechner eingezeichnet sind und ebenso die etablierten Verbindungen. Verwende dieselbe Notation wie in der Skizze ganz oben.
</p>
<? ex_end(); ?>


<? ex_start('Web-Server und Web-Browser', open: false); ?>
<p>
    <strong>Installiere</strong> auf zwei verschiedenen Rechnern einen Webbrowser und einen Webserver. Starte eine Abfrage im Webbrowser, indem du im Adressfeld <code>http://192.168.0.10</code> eingibst. <strong>Prüfe</strong>, dass die aufgebaute TCP-Verbindung auf der Serverseite an Port 80 besteht. Dieser Port ist auf den meisten Rechnern reserviert für Web-Server. 
</p>
<p class="text-center">
    <img src="res/web_browser.png" alt="">
</p>
<? ex_end(); ?>

<? }; ?>