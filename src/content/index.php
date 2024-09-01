<?
    $preprocess = function (TargetPreprocessContext $c) {
        $c->activate_module('role-info');

        $c->run_macro('title', 'set', 'MainLab');   
         
        $c->add_subpage('inf');
        $c->add_subpage('ma');
        $c->add_subpage('impressum');
    };
    
    $process = function(Target $t)
    {
?>

<? css_start(); ?> h1 {display:none;} <? css_end(); ?>

<section class="first-child d-flex" style="gap: 40px;">
    <div>
        <img src="./res/logo-extended.png" alt="" style="max-width:300px;">
    </div>
    <div>
        <p class="first-child">
            Diese Website bietet Materialien an, mit denen du dir Themen der Mathematik und der Informatik erschließen kannst. Alle Kurse sind frei zugänglich. Jeder Kurs enthält (zukünftig) folgende Elemente.
        </p>
        <ul>
            <li><strong>Motivation</strong>: Warum könnte das Thema spannend sein?</li>
            <li><strong>Erklärungen</strong> zu wichtigen Ideen</li>
            <li><strong>Interaktive</strong> Apps zum „Rumspielen“</li>
            <li><strong>Aufgaben</strong> mit Lösungsvorschlägen</li>
            <li><strong>Projekte</strong> und <strong>Tutorials</strong></li>
        </ul>
    </div>
</section>

<section>
    <div style="grid-template-columns: 1fr 1fr;" class="grid">
<?
    load_def_from_script_and_call(__DIR__ . '/inf/db/index.php', 'teaser_card');
    load_def_from_script_and_call(__DIR__ . '/inf/net/index.php', 'teaser_card');
?>
    </div>
    <div style="height:100%;">
        <p class="text-center" style="padding-top:30px; font-size:16pt;"><em>(More in the future - stay tuned!)</em></p>
    </div>
</section>

<?
    };
?>