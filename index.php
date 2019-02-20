<?php

/** Require once the Composer Autoload */
if (file_exists('vendor/autoload.php')) {
    require_once 'vendor/autoload.php';
}

// Initial Screen Display
$total = '0';

// Soap Calculation
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Form Data
    $formInput = $_POST['calculatorInput'];

    // IntA & IntB
    $inputInt = preg_split('(\+|\-|\*|\/)', $formInput);

    // Operator Method
    $inputOperator = '';

    $operators     = ['+', '-', '*', '/'];
    $operatorIndex = 0;
    foreach ($operators as $operator) {
        if (strpos($formInput, $operator) > 0) {
            $inputOperator = $operators[$operatorIndex];
        }
        ++$operatorIndex;
    }

    $soapClient = new \Cowglow\SoapCalculator\Ports\Client('http://www.dneonline.com/calculator.asmx?wsdl');
    $total      = $soapClient->Calculate($inputInt, $inputOperator);
}

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=0">
        <title>My Calculator</title>
        <link rel="stylesheet" href="assets/styles.css">
        <script type="text/javascript" src="assets/main.js"></script>
    </head>

    <body>

        <div class="calculator">

            <form action="" method="POST">
                <input type="text" name="calculatorInput" class="calculator-screen" value="<?= $total; ?>" readonly/>

                <div class="calculator-keys">

                    <button type="button" value="7">7</button>
                    <button type="button" value="8">8</button>
                    <button type="button" value="9">9</button>
                    <button type="button" class="operator" value="+">+</button>


                    <button type="button" value="4">4</button>
                    <button type="button" value="5">5</button>
                    <button type="button" value="6">6</button>
                    <button type="button" class="operator" value="-">-</button>


                    <button type="button" value="1">1</button>
                    <button type="button" value="2">2</button>
                    <button type="button" value="3">3</button>
                    <button type="button" class="operator" value="*">&times;</button>

                    <button type="button" class="all-clear" value="all-clear">AC</button>
                    <button type="button" value="0">0</button>
                    <button type="submit" class="equal-sign" value="=">=</button>
                    <button type="button" class="operator" value="/">&divide;</button>

                </div>
            </form>
        </div><!-- / calculator -->

    </body><!-- / body -->

</html>
