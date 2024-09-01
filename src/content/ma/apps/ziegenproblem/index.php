<?
    $preprocess = function (TargetPreprocessContext $c) {
        $c->activate_module('role-app');
        
        $c->run_macro('title', 'set', 'Das Ziegenproblem');

        $c->activate_module('js-standard-lib');
    };

    $process = function(Target $t)
    {
?>

<? css_start(); ?>
body {
    font-family: sans-serif;
}

header, main {
    min-width: 300px;
    max-width: 800px;
    margin: auto;
    padding-left:20px;
    padding-right:20px;
}

header {
    padding-top:20px;
}

main {
    padding-bottom:20px;
}

h1 {
    font-size: 1.8em;
}

#evaluator-output {
    margin-top:5px;
    margin-left:20px;
}

#evaluator-output > * {
    margin-top:5px;
    margin-bottom:5px;
}

<? css_end(); ?>

        <header>
            <h1><?= array_slice(get_html_titles(), -1)[0] ?></h1>
        </header>

        <main>
            <div class="d-flex mt-4" style="flex-direction: column; gap: 20px;">
                <div class="d-flex" style="gap: 20px; align-items: baseline;">
                    <label for="restart-door-count-input">Anzahl Türen:</label>
                    <input type="number" id="restart-door-count-input" value="3" class="form-control" style="width:100px;">
                    <button class="btn btn-primary" onclick="restart();">
                        Neustart
                    </button>
                </div>
                <div id="phase-choose">
                    <div style="width:150px;">
                        1. Wähle!
                    </div>
                    <div class="doors">

                    </div>
                </div>
                <div id="phase-rechoose">
                    <div style="width:150px;">
                        2. Beibehalten oder wechseln?
                    </div>
                    <div class="doors">

                    </div>
                </div>
                <div id="phase-result">
                    <div class="label" style="width:150px;">
                        3. Wähle!
                    </div>
                    <div id="doors">

                    </div>
                </div>
            </div>
        </main>

<script>
    function restart() {
        let numberOfDoorsInput = parseInt(document.getElementById('restart-door-count-input').value);
        const numberOfDoors = numberOfDoorsInput === NaN || numberOfDoorsInput < 3 ? 3 : numberOfDoorsInput;

        // Remove all doors in all phases; hide rechoose and result phases

        // Choose a random door for the car
        const carDoor = Math.floor(Math.random() * numberOfDoors);
    }    
</script>

<?
    };
?>