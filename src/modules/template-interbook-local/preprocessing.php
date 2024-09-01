<?
    $init_preprocessing = function(Module $m, PreprocessContext $c) {
        $c->activate_module('template-interbook', [
            'use_img_as_logo'                 => true,
            'nav_show_top_level'              => false,
        ]);
        $c->activate_module('favicons');
    };
?>