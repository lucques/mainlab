<?
    $preprocess = function (TargetPreprocessContext $c) {
        $c->activate_module('role-info');
        
        $c->run_macro('title', 'set', 'Webseiten abrufen');
    };
?>

<? $process = function(Target $target) { ?>

<p>
    Ein typisches Beispiel für die Anwendungsschicht ist die Abfrage einer Webseite. Diese Abfrage wird über das sogenannte HTTP-Protokoll abgewickelt. Zunächst benötigt man einen Client (Webbrowser) und einen Server (Webserver). Anschließend sendet der Browser eine HTTP-Anfrage, auf welche der Webserver mit einer HTTP-Antwort reagiert. 
</p>
<p class="text-center">
    <img src="res/http.svg" alt="">
</p>

<? ex_start('HTTP-Anfrage analysieren', open: true); ?>
<p>
    Die HTTP-Anfrage und -Antwort geschieht über eine TCP-Verbindung. <strong>Bestimme</strong>, unter welcher Portnr. der Webserver erreichbar ist. <strong>Identifiziere</strong> die HTTP-Anfrage und -Antwort gemäß oben beschriebenem Schema. 
</p>
<? ex_end(); ?>

<? }; ?>