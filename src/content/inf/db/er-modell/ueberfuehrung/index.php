<?
    $preprocess = function (TargetPreprocessContext $c) {
        $c->activate_module('role-info-db');
        
        $c->run_macro('title', 'set', plain: 'Überführung in das relationale Modell', number_of_dependent_parent_titles: 1);
    };
?>

<? $process = function(Target $target) { ?>

<p>[TODO]</p>
<p>
    Eine gute Erklärung befindet sich auf inf-schule.de: <a href="https://www.inf-schule.de/datenbanksysteme/ermodelle/datenmodell">https://www.inf-schule.de/datenbanksysteme/ermodelle/datenmodell</a>
</p>

<? }; ?>