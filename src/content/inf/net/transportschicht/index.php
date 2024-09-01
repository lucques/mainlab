<?
    $preprocess = function (TargetPreprocessContext $c) {
        $c->activate_module('role-info');
        
        $c->run_macro('title', 'set', 'Transportschicht');
        
        $c->add_subpage('tcp-services');
        $c->add_subpage('tcp-funktionsweise');
    };
?>

<? $process = function(Target $target) { ?>


<p>
    Wir haben uns bisher mit der sogenannten Interschicht befasst, genauer: Mit dem Versenden, Weiterleiten und Empfangen von <strong>IP-Paketen</strong>, also solchen, die über das <strong>Internet Protocol</strong> weitergereicht werden. Ein IP-Paket sah wie folgt aus. 
</p>
<p class="text-center"><img src="res/ip-paket.png" alt=""></p>
<p>
    Damit haben wir den Kern des Internets erfasst, denn über die Router konnten IP-Pakete beliebig lange Strecken zurücklegen (z.B. Schönberg ↔ Sydney). 
</p>
<p>
    Reicht es aus, dass sich die <strong>Anwendungsschicht</strong> (Webbrowser und Webserver) nun auf diese <strong>Internetschicht</strong> verlassen? Nein; es gibt folgende Probleme.
</p>

<? acc_start('warning'); ?>
<? acc_item_start('A) Zuordnung'); ?>
<p>
    Auf jedem Rechner laufen viele Apps (E-Mail-Programm, Webbrowser, ...) gleichzeitig. Woher weiß der Rechner, für welche Anwendung das Paket bestimmt ist (ist es Teil einer E-Mail, oder eine Chat-Nachricht etc.)
</p>
<? acc_item_end(); ?>
<? acc_item_start('B) Beschränkte Paketgröße'); ?>
<p>
    Wenn man z.B. per Whatsapp ein Video verschickt, dann sind dies zu viele Daten für ein einzelnes IP-Paket. Es müssen also mehrere Pakete losgeschickt werden, und das zerstückelte Video muss beim Empfänger wieder (in der richtigen Reihenfolge!) zusammengesetzt werden. Bei einem Live-Stream muss sowieso zerstückelt und direkt versandt werden, schließlich soll Bild und Ton „so live“ wie möglich ankommen!
</p>
<? acc_item_end(); ?>
<? acc_item_start('C) Paketverlust'); ?>
<p>
    Manchmal geht ein Paket verloren. Dies könnte bedeuten, dass nur die halbe E-Mail ankommt, was fatal wäre! 
</p>
<? acc_item_end(); ?>
<? acc_end(); ?>

<p>
    Wie bekommen wir diese Unzulänglichkeiten in den Griff? Das <dfn>TCP-Protokoll (transmission control protocol)</dfn> löst die Probleme. Zwischen Anwendungsschicht und Internetschicht gibt es die sogenannte <dfn>Transportschicht</dfn>, auf welcher unter anderem TCP zum Einsatz kommt.
</p>

<p>
    Wie bei jeder Schicht lohnt es sich, den Bezug zu höheren Schichten und zu niedrigeren Schichten zu betrachten.
</p>
<ul>
    <li><p><a href="./tcp-services/">Welche Services bietet TCP <strong>höheren Schichten</strong> an?</a></p></li>
    <li><p><a href="./tcp-funktionsweise/">Wie werden diese Services implementiert, unter Verwendung <strong>niedrigerer Schichten</strong>?</a></p></li>
</ul>

<? }; ?>