<?php
list($iNowYear, $iNowMonth, $iNowDay) = explode('-', date('Y-m-d'));
list($iMonth, $iYear) = explode('-', $_GET['monthNumber']);
$iMonth = (int) $iMonth;
$iYear = (int) $iYear;
$iTimestamp = mktime(0, 0, 0, $iMonth, $iNowDay, $iYear);
list($sMonthName, $iDaysInMonth) = explode('-', date('F-t', $iTimestamp));

// Получаем количество дней в предыдущем месяце
$iPrevDaysInMonth = (int) date('t', mktime(0, 0, 0, $iPrevMonth, $iNowDay, $iPrevYear));

// Получаем числовое представление дней недели от первого дня конкретного (текущего) месяца.
$iFirstDayDow = (int) date('w', mktime(0, 0, 0, $iMonth, 1, $iYear));

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
    for ($j = 1; $j <= 7; $j++) { // 7 days a week

        $sClass = '';
        if ($iNowYear == $iYear && $iNowMonth == $iMonth && $iNowDay == $iCurrentDay && !$bPreviousMonth && !$bNextMonth) {
            $sClass = 'today';
        } elseif (!$bPreviousMonth && !$bNextMonth) {
            $sClass = 'current';
        }
        if ($j % 6 === 0) {
            $sCalTblRows .= '<td style="background-color:red" class="' . $sClass . '">' . $iCurrentDay . ' </td>';
        } elseif ($j % 7 === 0) {
            $sCalTblRows .= '<td style="background-color:red" class="' . $sClass . '">' . $iCurrentDay . '</td>';
        } else {
            $sCalTblRows .= '<td class="' . $sClass . '">' . $iCurrentDay . '</td>';
        }

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
