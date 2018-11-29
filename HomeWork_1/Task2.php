<!doctype html>
<html lang="en">

<head>
    <?php
include "getTableFromMonthNumber.php";?>
    <title>Задание 2</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <style>
    table td.current  {
    font-weight: bold;
    opacity: 1;
    }
    table td.today  {
    background-color: #FBF8EE;
    border: 1px solid #FCD3A1;
    color: #444444;
    font-weight: bold;
    opacity: 1;
    }
    </style>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO"
        crossorigin="anonymous">
</head>

<body>
    <nav class="navbar navbar-expand-md navbar-dark bg-dark">
        <a class="navbar-brand" href="#">Navbar</a>
        <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#collapsibleNavId"
            aria-controls="collapsibleNavId" aria-expanded="false" aria-label="Toggle navigation"></button>
        <div class="collapse navbar-collapse" id="collapsibleNavId">
            <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                <li class="nav-item">
                    <a class="nav-link" href="/HomeWork_1/Test.php">Задание 1 <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="/HomeWork_1/Task2.php">Задание 2</a>
                </li>
            </ul>
        </div>
    </nav>
    <div class="container-fluid">
        <div class="container">
            <form>
                <div class="form-group row">
                    <label for="monthNumber" class="col-sm-8 col-form-label">Введите номер месяца</label>
                    <div class="col-sm-6">
                        <input type="number" class="form-control" min="1" max="12" name="monthNumber" id="monthNumber" placeholder="Месяц">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-10">
                        <button type="submit" class="btn btn-primary" id="getMonthTableButton"  >Получить календарь</button>
                    </div>
                </div>
            </form>
            <div class="alert alert-warning alert-dismissible fade show" id="errorBlockAlert" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
          <span class="sr-only">Close</span>
        </button>
        <strong>Внимание</strong>
        <p id="MonthErrors">Введите значение месяца от 1 - 12<p>
      </div>
            <table class="table table-hover table-inverse table-bordered">
                <thead class="thead-inverse">
                    <tr>
                        <th>Понедельник</th>
                        <th>Вторник</th>
                        <th>Среда</th>
                        <th>Четверг</th>
                        <th>Пятница</th>
                        <th>Суббота</th>
                        <th>Воскресенье</th>
                    </tr>
                </thead>
                <tbody>
                    <?=$sCalTblRows;?>
                </tbody>
            </table>
        </div>
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->


    <script src="js/jquery-3.3.1.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"
        crossorigin="anonymous"></script>
    <script>
        $(document).ready(function () {
            $('#monthNumber').keyup(function (e) {
                let monthVal=$('#monthNumber').val();
                if(monthVal<1 || monthVal>12){
                    $('#getMonthTableButton').hide('fast');
                    $('#Errors').text('Вы ввели некорректное значение месяца введите от 1 - 12');
                    $('#errorBlockAlert').show('fast');
                }else{
                    $('#getMonthTableButton').show('fast');
                    $('#Errors').text('');
                    $('#errorBlockAlert').hide('fast');
                }
            });
        });
    </script>

</body>

</html>