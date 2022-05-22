<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task 2</title>

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>

    <!-- Popper JS -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

</head>

<body>
    <div class="container mt-5">
        <div class="col-md-3" id="numberInput">
            <h5>How Many Fields ? </h5>
            <input type="number" class="form-control" name="fieldNumber" id="fieldNumber">
            <br>
            <button type="button" class="btn btn-info" id="nextButton">
                Next
            </button>
        </div>

        <!-- Summation Field -->
        <div class="col-md-3" id="inputField">
            <h5> Operation : Sum of <span id="totalNumber"></span> Numbers</h5>
            <div id="inputs">

            </div>
            <br>
            <button type="button" class="btn btn-info" id="submitButton">
                Submit
            </button>
        </div>

        <!-- Result -->
        <div class="col-md-6" id="result">
            <h1>Output</h1>
            <h6 id="finalResult"></h6>
        </div>
    </div>

</body>

<script>
    $(document).ready(function () {
        $('#numberInput').show();
        $('#inputField').hide();

        // Next Button JS Code
        $('#nextButton').click(function () {
            var numberOfField = $('#fieldNumber').val();
            $('#numberInput').hide();

            var input = '';
            for (let i = 0; i < parseInt(numberOfField); i++) {
                input += `<input type="number" class="form-control" name=numbers[] class = "numbers"> <br>`
            }
            $('#totalNumber').html(numberOfField);
            $('#inputs').html(input)
            $('#inputField').show();

        });

        // Submit Button Calculation
        $('#submitButton').click(function(e) {
            var numbers = $('input[name^=numbers]').map(function(index, value){
                return $(value).val();
            }).get();

            var totalSum = 0;
            var numberSequence = '';
            var symbol = '';
            var inWord = '';

            for(let i= 0; i<numbers.length; i++) {

                if(i === 0){
                    symbol = ' '
                }
                else if((numbers.length - 1) === i ){
                    symbol = 'and ';
                } else {
                    symbol = ', ';
                }
                totalSum += parseInt(numbers[i]);
                numberSequence += ` ${symbol} ${numbers[i]} `;
            }
            $('#numberInput').hide();
            $('#inputField').hide();
            inWord = `Summation of ${numberSequence} are : ${totalSum}`;
            $('#finalResult').html(inWord); 
        });

        
    });
</script>

</html>