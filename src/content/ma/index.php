<?
    $preprocess = function (TargetPreprocessContext $c) {
        $c->activate_module('role-info');

        $c->run_macro('title', 'set', 'Mathematik');

        $c->add_subpage('apps');
    };
?>