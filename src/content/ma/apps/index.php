<?
    $preprocess = function (TargetPreprocessContext $c) {
        $c->activate_module('role-info');
        
        $c->run_macro('title', 'set', 'Apps');
        
        $c->add_subpage('gleichungs-auswerter');
        $c->add_subpage('gleichungs-orakel');
        // $c->add_subpage('ziegenproblem');
    };
?>