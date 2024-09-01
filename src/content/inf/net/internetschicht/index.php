<?
    $preprocess = function (TargetPreprocessContext $c) {
        $c->activate_module('role-info');
 
        $c->run_macro('title', 'set', 'Internetschicht');
        
        $c->add_subpage('grundlagen');
        $c->add_subpage('erstes-netz');
        $c->add_subpage('binaersystem');
        $c->add_subpage('binaersystem-aufgaben');
        $c->add_subpage('netzpraefix-adressraum-lan');
        $c->add_subpage('netzmaske');
        $c->add_subpage('zwei-lans-verbinden');
        $c->add_subpage('beliebige-netze-verbinden');
    };
?>

<? $process = function(Target $target) { ?>

<? }; ?>