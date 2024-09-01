<?
    $preprocess = function (TargetPreprocessContext $c) {
        $c->activate_module('role-app');
        
        $c->run_macro('title', 'set', 'Gleichungs-Orakel');

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

<? css_end(); ?>

        <header>
            <h1><?= array_slice(get_html_titles(), -1)[0] ?></h1>
        </header>

        <main>
            <div class="d-flex mt-4 flex-wrap" style="gap:10px; align-items: baseline;">
                <label for="oracle-input" class="form-label">Gleichung:</label>
                <input type="text" id="oracle-input" value="x+18=4*x" class="form-control" style="width:200px;">
                <button id="oracle-query-button" onclick="queryOracle();" class="btn btn-primary">Orakel, sprich Wahrheit!</button>
            </div>

            <table class="table mt-4">
                <tr>
                    <th>Eingabe</th>
                    <th>Ausgabe</th>
                </tr>
                <tbody id="results">

                </tbody>
            </table>
        </main>

<script>
    function queryOracle() {
        const equation = document.getElementById('oracle-input').value.toLowerCase().replace(/,/g, '.');

        let equationOutput = equation;
        let answerOutput = '';

        // Validate equation
        if (!equation.includes('=') || equation.split('=').length !== 2) {
            answerOutput = 'Ungültig: Es muss genau ein $=$ geben.';
        }
        // Check whether other variables than x were used
        else if (equation.match(/[a-wyz]/i)) {
            answerOutput = 'Ungültig: Es dürfen nur die Unbekannte $x$ und Zahlen verwendet werden.';
        }
        else {
            const [lhs, rhs] = equation.split('=');

            const lhsRawTex = math.parse(lhs).toTex();
            const rhsRawTex = math.parse(rhs).toTex();

            // Prettify equation for output
            equationOutput = '$' + lhsRawTex + ' = ' + rhsRawTex + '$';

            // Check whether equal for *every* x
            const eqCheck = nerdamer(lhs).eq(rhs);

            if (eqCheck === true) {
                answerOutput = 'Lösungsmenge $L = \\mathbb{Q}$';
            }
            else {
                const sols = nerdamer('(' + lhs + ') - (' + rhs + ')').solveFor('x');
    
                if (sols.length === 0) {
                    answerOutput = 'Lösungsmenge $L = \\{\\}$';
                }
                else {
                    answerOutput = 'Lösungsmenge $L = \\{';
                    for (let i = 0; i < sols.length; i++) {
                        // Throw away imaginary numbers
                        if (sols[i].contains('i')) {
                            continue;
                        }

                        answerOutput += sols[i].toTeX();
                        if (i < sols.length - 1) {
                            answerOutput += ', ';
                        }
                    }
                    answerOutput += '\\}$';
                }
            }
        }

        const results = document.getElementById('results');
        const row = document.createElement('tr');
        row.innerHTML = `<td>${equationOutput}</td><td>${answerOutput}</td>`;
        results.insertBefore(row, results.firstChild);

        MathJax.typeset();
    }

    // Register enter key for oracle input
    document.getElementById('oracle-input').addEventListener('keyup', function(event) {
        if (event.key === 'Enter') {
            event.preventDefault();
            queryOracle();
        }
    });    
</script>

<?
    };
?>