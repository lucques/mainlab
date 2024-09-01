<?
    $init_preprocessing = function(Module $m, PreprocessContext $c) {
        $c->activate_template('template-generic');

        $c->activate_module('title');
        $c->activate_module('bootstrap', ['import_standalone_css' => true]);
        $c->activate_module('mathjax-extensions');
    };

    $init_preprocessing_target = function(Module $m, TargetPreprocessContext $c) {
        $c->activate_module('nav-build');
    };
?>