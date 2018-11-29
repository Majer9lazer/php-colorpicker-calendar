<!doctype html>
<html lang="en">
<?php
                   $day=intval(htmlspecialchars($_GET['monthNumber']));
                   $daysInMonth=cal_days_in_month(CAL_GREGORIAN,$day,date('Y'));
                   list($iNowYear, $iNowMonth, $iNowDay) = explode('-', date('Y-m-d'));

                   list($iMonth, $iYear) = explode('-', $_GET['monthNumber']);
                   $iMonth = (int)$iMonth;
                   $iYear = (int)$iYear;
                   
                   echo 'Month = '.$iMonth.' Year = '.$iYear.' now day = '.$iNowDay.'<br/>';

                   $iTimestamp = mktime(0, 0, 0, $iMonth, $iNowDay, $iYear);
                   list($sMonthName, $iDaysInMonth) = explode('-', date('F-t', $iTimestamp));
                   echo 'sMonthName = '.$sMonthName.' iDaysInMonth = '.$iDaysInMonth.'<br/>';

                   // Получаем количество дней в предыдущем месяце
$iPrevDaysInMonth = (int)date('t', mktime(0, 0, 0, $iPrevMonth, $iNowDay, $iPrevYear));
 
// Получаем числовое представление дней недели от первого дня конкретного (текущего) месяца.
$iFirstDayDow = (int)date('w', mktime(0, 0, 0, $iMonth, 1, $iYear));
 
// С этого дня начинается предыдущий месяц 
$iPrevShowFrom = $iPrevDaysInMonth - $iFirstDayDow + 1;
 
// Если предыдущий месяц
$bPreviousMonth = ($iFirstDayDow > 0);
 
// Тогда первый день
$iCurrentDay = ($bPreviousMonth) ? $iPrevShowFrom : 1;
 
$bNextMonth = false;
$sCalTblRows = '';
// Генерируем строки календаря
for ($i = 0; $i < 4; $i++) { // 6-weeks range
    $sCalTblRows .= '<tr>';
    for ($j = 0; $j < 7; $j++) { // 7 days a week
 
        $sClass = '';
        if ($iNowYear == $iYear && $iNowMonth == $iMonth && $iNowDay == $iCurrentDay && !$bPreviousMonth && !$bNextMonth) {
            $sClass = 'today';
        } elseif (!$bPreviousMonth && !$bNextMonth) {
            $sClass = 'current';
        }
        $sCalTblRows .= '<td class="'.$sClass.'"><a href="javascript: void(0)">'.$iCurrentDay.'</a></td>';
 
        // Следующий день
        $iCurrentDay++;
        if ($bPreviousMonth && $iCurrentDay > $iPrevDaysInMonth) {
            $bPreviousMonth = false;
            $iCurrentDay = 1;
        }
        if (!$bPreviousMonth && !$bNextMonth && $iCurrentDay > $iDaysInMonth) {
            $bNextMonth = true;
            $iCurrentDay = 1;
        }
    }
    $sCalTblRows .= '</tr>';
}

                   ?>
  <head>
    <title>Задание 2</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
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
                     <input type="number" class="form-control" name="monthNumber" id="monthNumber" placeholder="Месяц">
                 </div>
             </div>
             <div class="form-group row">
                 <div class="col-sm-10">
                     <button type="submit" class="btn btn-primary">Action</button>
                 </div>
             </div>
         </form>
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

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function () {
            //console.log('hello');
        });
    
    </script>
  
</body>
</html>