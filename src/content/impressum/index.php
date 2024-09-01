<?
    $preprocess = function (TargetPreprocessContext $c) {
        $c->activate_module('role-info');
        
        $c->run_macro('title', 'set', 'Impressum und Datenschutzerklärung');
    };
?>

<? $process = function(Target $target) { ?>

<p>
    Verantwortlich für den Inhalt dieser Seite ist:
    <address>
    Lukas Convent<br />
    Kronsforder Allee 93<br />
    23560 Lübeck<br />
    lukas@convNet.de<br />
    <a href="https://lukas.convnet.de">https://lukas.convnet.de</a>
    </address>
</p>

<? html_h(2, 'Datenschutzerklärung'); ?>
<p>
    Es werden von mir keine Nutzerdaten erhoben. Dennoch kann es sein, dass technische Daten wie IP-Adressen automatisch von meinem Hostingprovider abgespeichert werden. Diese Daten werden ohne Zustimmung nicht weitergegeben. Inhalte, die aus externen Quellen eingebunden werden, sind als solche gekennzeichnet und unterliegen nicht dieser Datenschutzerklärung.
</p>
<p>
    Cookies werden einzig zu dem Zweck verwendet, Login-Sitzungen zu ermöglichen. Sie werden zu keinem Zeitpunkt zur Datenerhebung, Nachverfolgung oder anderen Zwecken verwendet.
</p>


<? }; ?>