<?
    $preprocess = function (TargetPreprocessContext $c) {
        $c->activate_module('role-app');
        
        $c->run_macro('title', 'set', 'Gleichungs-Auswerter');

        $c->activate_module('js-standard-lib');
        $c->activate_module('nerdamer');
        $c->activate_module('mathjs');
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
            <div class="d-flex mt-4" style="align-items: flex-start;">
                <div class="d-grid" style="gap:10px; grid-template-columns: min-content min-content; align-items: center;">
                    <div>
                        <label for="evaluator-input-equation"><span class="text-nowrap">Werte die Gleichung</span></label>
                    </div>
                    <div>
                        <input type="text" id="evaluator-input-equation" value="x+18=4*x" class="form-control" style="width:200px;">
                    </div>
                    <div class="text-end">
                        <label for="evaluator-input-x">...aus für $x=$</label>
                    </div>
                    <div class="d-flex" style="gap:10px; justify-content:space-between;">
                        <input type="number" id="oracle-input-x" value="12" class="form-control" style="width:100px;">
                        <button id="evaluator-query-button" onclick="queryEvaluator();" class="btn btn-primary">Do it!</button>
                    </div>
                    <div style="grid-column-start: 2;">
                        <span id="evaluator-status"></span>
                    </div>
                </div>
                <div class="d-flex" style="justify-content:center; align-items: center; min-width: 200px;">
                    <span id="evaluator-output"></span>
                </div>
            </div>
            <div class="mt-4">
                <p>
                    <em>Hinweis: Beträge wie |x| können leider noch nicht eingegeben werden (work in progress)</em>
                </p>
            </div>
        </main>

<script>
    function queryEvaluator() {
        const equation = document.getElementById('evaluator-input-equation').value.toLowerCase().replace(/,/g, '.');
        const x = document.getElementById('oracle-input-x').value.trim().replace(/,/g, '.');

        let status = '';
        let output = '';

        // Validate equal sign
        if (!equation.includes('=') || equation.split('=').length !== 2) {
            output = 'Ungültig: Es muss genau ein $=$ geben.';
        }
        // Validate no other variables than x were used
        else if (equation.match(/[a-wyz]/i)) {
            output = 'Ungültig: Es dürfen nur die Unbekannte $x$ und Zahlen verwendet werden.';
        }
        // Validate x is a number
        else if (isNaN(x) || x == '') {
            output = 'Ungültig: $x$ muss eine Zahl sein.';
        }
        else {
            const [lhs, rhs] = equation.split('=');

            const sol = nerdamer('(' + lhs + ') - (' + rhs + ')').evaluate({x: x});
            
            const lhsRawTex = math.parse(lhs).toTex();
            const rhsRawTex = math.parse(rhs).toTex();

            const lhsSubstTeX = lhsRawTex.replace(/x/g, x);
            const rhsSubstTeX = rhsRawTex.replace(/x/g, x);

            const lhsEvalTeX = nerdamer(lhs).evaluate({x: x}).toTeX();
            const rhsEvalTeX = nerdamer(rhs).evaluate({x: x}).toTeX();
            
            // Prettify equation for output
            output = '\\begin{align*}' + lhsRawTex + ' &= ' + rhsRawTex + '\\\\[0.2cm]';

            if (sol.eq('0')) {
                status = '$\\color{green}\\text{Lösung!}$'; 

                output += '\\color{green}' + lhsSubstTeX + ' &= \\color{green}' + rhsSubstTeX + '\\\\';
                output += '\\color{green}' + lhsEvalTeX +  ' &= \\color{green}' + rhsEvalTeX;
            }
            else {
                status = '$\\color{red}\\text{Keine Lösung!}$'; 

                output += '\\color{red}' + lhsSubstTeX + ' &\\neq \\color{red}' + rhsSubstTeX + '\\\\';
                output += '\\color{red}' + lhsEvalTeX +  ' &\\neq \\color{red}' + rhsEvalTeX;
            }
            output += '\\end{align*}';
        }

        document.getElementById('evaluator-output').innerHTML = output;
        document.getElementById('evaluator-status').innerHTML = status;

        MathJax.typeset();
    }

    // When changing the input field, trigger evaluation
    document.getElementById('oracle-input-x').addEventListener('input', function() {
        queryEvaluator();
    });

    // When unfocusing the input field, trigger evaluation
    document.getElementById('evaluator-input-equation').addEventListener('blur', function() {
        queryEvaluator();
    });


    //////////
    // Init //
    //////////

    // on load
    // document.addEventListener('DOMContentLoaded', queryEvaluator);

    
</script>

<?
    };
?>