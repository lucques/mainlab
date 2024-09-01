<?
    $init_preprocessing = function(Module $m, PreprocessContext $c) {
        $c->activate_template('template-interbook-local');

        $c->activate_module('source');
        $c->activate_module('exercise');
        $c->activate_module('references');
        $c->activate_module('title');
        $c->activate_module('mathjax-extensions');
    };

    $init_preprocessing_target = function(Module $m, TargetPreprocessContext $c) {
        $c->activate_module('nav-build');
    };
?>