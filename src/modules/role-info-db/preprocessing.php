<?
    $init_preprocessing = function(Module $m, PreprocessContext $c) {
        $c->activate_module('role-info');

        $c->update_module_config('source', ['language' => 'sql']);
    };
?>