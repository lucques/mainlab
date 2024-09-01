<?
    $init_preprocessing = function(Module $m, PreprocessContext $c) {
        $c->activate_template('template-plain');
        // $c->activate_module('picocss');
        
        $c->activate_module('nav-build');
    };
?>