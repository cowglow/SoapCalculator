(function (w, d) {
    'use strict';

    w.addEventListener('DOMContentLoaded', function () {

        const calcForm = d.querySelector('form');
        const calcScreen = d.querySelector('.calculator-screen');
        const calcButtons = d.querySelectorAll('button');

        if (calcButtons) {
            calcButtons.forEach(function (button) {

                // Calculator Buttons
                if (button.classList.length === 0) {
                    button.addEventListener('click', function (event) {
                        event.preventDefault();
                        inputNumber(this.value);
                    })
                }

                // Operators
                if (button.classList.contains('operator')) {
                    button.addEventListener('click', function (event) {
                        event.preventDefault();
                        inputOperator(this.value);
                    })
                }

                // All Clear
                if (button.classList.contains('all-clear')) {
                    button.addEventListener('click', function (event) {
                        event.preventDefault();
                        calcScreen.value = '0';
                    })
                }

                // Equal Sign
                if (button.classList.contains('equal-sign')) {
                    button.addEventListener('click', function (event) {
                        event.preventDefault();

                        if (calcScreen.value !== '0') {
                            if (calcScreen.value.match('^[0-9]*(\\+|\\-|\\*|\\/)[0-9]*')) {
                                calcForm.submit();
                            }
                        }

                    });
                }
            })
        }

        function inputNumber(num) {
            if (calcScreen.value === '0') {
                calcScreen.value = '';
            }

            calcScreen.value += num;

        }

        function inputOperator(operator) {
            const operators = ['+', '-', '*', '/'];

            let insertOperator = true;
            operators.forEach(function (operator) {
                if (calcScreen.value.indexOf(operator) > 0) {
                    insertOperator = false;
                }
            });

            if (insertOperator) {
                calcScreen.value += operator;
            }
        }

    });


})(typeof global != 'undefined' ? global : window, document);