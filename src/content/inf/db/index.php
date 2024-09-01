<?
    $preprocess = function (TargetPreprocessContext $c) {
        $c->activate_module('role-info-db');

        $c->run_macro('title', 'set', 'Datenbanken');

        $c->update_module_config('source', ['language' => 'sql']);

        $c->add_subpage('einstieg');
        $c->add_subpage('relationale-datenbanken');
        $c->add_subpage('mengenlehre');
        $c->add_subpage('abfragen-grundlagen');
        $c->add_subpage('abfragen-kartesisches-produkt');
        $c->add_subpage('abfragen-joins');
        $c->add_subpage('abfragen-aggregation');
        $c->add_subpage('rezept');
        $c->add_subpage('er-modell');
        $c->add_subpage('ressourcen');
    };

    $t_ids = path_to_target_ids(__DIR__);

    $teaser_card = function() use ($t_ids)
    {
?>
        <div class="card">
            <? html_img(to_url(__DIR__ . '/res/teaser/teaser.png'), class: 'card-img-top', style: 'max-width:100%;'); ?>
            <div class="card-body d-flex flex-column justify-content-between">
                <div class="stack">
                    <h2 class="card-title boxed-h1"><a href="<?= url_collect($t_ids) ?>">Datenbanken</a></h2>
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
        Sobald der Datenbestand etwas komplexer wird, stößt eine Tabellenkalkulation wie Excel an ihre Grenzen. In diesem Kurs geht es um elegante Datenbank-Techniken, mit denen diese Grenzen gesprengt werden.
    </p>
    <ul>
        <li>
            <p>
                Wie können Daten mit Hilfe von verknüpften Tabellen strukturiert werden?
            </p>
        </li>
        <li>
            <p>
                Wie können mit der Sprache SQL komplexe Fragestellungen formuliert werden, um der Datenbank die gesuchten Informationen zu entlocken?
            </p>
        </li>
        <li>
            <p>
                Wie kann man mit Hilfe von ER-Modellen eine Datenverwaltung planen?
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