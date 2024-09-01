<?
    $preprocess = function (TargetPreprocessContext $c) {
        $c->activate_module('role-info');

        $c->run_macro('title', 'set', 'Rechnernetze');

        $c->add_subpage('netze-protokolle');
        $c->add_subpage('schichtenarchitekturen');
        $c->add_subpage('internetschicht');
        $c->add_subpage('transportschicht');
        $c->add_subpage('anwendungsschicht');
        $c->add_subpage('verbindungsschicht');
        $c->add_subpage('hintergrundwissen');
    };

    $t_ids = path_to_target_ids(__DIR__);

    $teaser_card = function() use ($t_ids)
    {
?>
        <div class="card" style="height:100%;">
            <? html_img(to_url(__DIR__ . '/res/teaser/25c7c4e8-9d1c-40b6-9088-bddfd1619d3a_small.png'), class: 'card-img-top', style: 'max-width:100%;'); ?>
            <? //ref_img(__DIR__ . '/res/teaser/earth-3537401.png', class: 'card-img-top', style: 'max-width:100%;'); ?>
            <div class="card-body d-flex flex-column justify-content-between">
                <div class="stack">
                <h2 class="card-title boxed-h1"><a href="<?= url_collect($t_ids) ?>">Rechnernetze</a></h2>
<?
        load_defs_from_script(__FILE__)['teaser']();
?>
                </div>
                <div class="stack">
                    <div class="alert alert-warning" role="alert">
                        Dieser Kurs befindet sich noch im Aufbau.
                    </div>
                </div>
            </div>
        </div>
<?
    };

    $teaser = function()
    {
?>
    <p>
        Das Internet hat ein neues Zeitalter der Kommunikation eingeläutet. In diesem Kurs geht es um die Fundamente des Internets. Zudem wird gezeigt, wie eigene Komponenten für das Internet entwickelt werden können.
    </p>
    <ul>
        <li>
            <p>
                Wie sorgt ein Netz von Routern dafür, dass ein Video-Chat zwischen Deutschland und Australien fast ohne Verzögerung möglich ist?
            </p>
        </li>
        <li>
            <p>
                Wie wird sichergestellt, dass alle E-Mails ohne Datenverlust an ihr Ziel gelangen?
            </p>
        </li>
        <li>
            <p>
                Wie genau funktioniert das Zusammenspiel von Web-Browser und Web-Server?
            </p>
        </li>
    </ul>
<?
    };

    $process = function(Target $target)
    {
?>
    <div class="alert alert-warning" role="alert">
        Dieser Kurs befindet sich noch im Aufbau.
    </div>
    <p>
        Navigiere durch die Menüpunkte auf der linken Seite.
    </p>
<?
    };
?>