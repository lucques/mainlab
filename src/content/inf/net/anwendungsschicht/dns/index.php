<?
    $preprocess = function (TargetPreprocessContext $c) {
        $c->activate_module('role-info');

        $c->run_macro('title', 'set', 'DNS: Telefonbuch fürs Internet');
    };
?>

<? $process = function(Target $target) { ?>

<p class="text-center">
    <img src="res/dns.svg" alt="">
</p>

<? ex_start('DNS-Server installieren und konfigurieren', open: true); ?>
<p>
    Erstelle ein Netzwerk mit drei Rechnern:
</p>
<ol>
    <li>Client-Rechner (mit Webbrowser) </li>
    <li>Server-Rechner (mit Webserver)</li>
    <li>Server-Rechner (mit DNS-Server)</li>
</ol>
<strong>Konfiguriere</strong> den Client-Rechner so, dass er den DNS-Server als Nachschlagewerk verwendet. <strong>Bilde</strong> das obige Beispiel nach.
<? ex_end(); ?>

<? }; ?>