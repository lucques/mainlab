<?
    $preprocess = function (TargetPreprocessContext $c) {
        $c->activate_module('role-info');
        
        $c->run_macro('title', 'set', 'Hintergrundwissen');
    };
?>

<? $process = function(Target $target) { ?>

<ul>
    <li>
        Zwiebelfisch: „Netz“ vs. „Netzwerk“
        (<a href="https://www.spiegel.de/kultur/zwiebelfisch/zwiebelfisch-abc-netz-netzwerk-a-315833.html">SpOn</a>)
    </li>
</ul>

<? }; ?>