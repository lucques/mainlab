<?
    $preprocess = function (TargetPreprocessContext $c) {
        $c->activate_module('role-info');

        $c->run_macro('title', 'set', 'Informatik');

        $c->add_subpage('net');
        $c->add_subpage('db');
    };

    $process = function(Target $t)
    {
?>

<section>
    <div style="grid-template-columns: 1fr 1fr;" class="grid">
<?
    load_def_from_script_and_call(__DIR__ . '/db/index.php', 'teaser_card');
    load_def_from_script_and_call(__DIR__ . '/net/index.php', 'teaser_card');
?>
    </div>
</section>

<?
    };
?>