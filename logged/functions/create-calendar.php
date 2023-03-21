<?php
session_start();
$month = date('m');
$year = date('Y');
$daysOfMonth = cal_days_in_month(CAL_GREGORIAN, $month, $year);
$firstDayOfMonth = date('N', strtotime("{$year}-{$month}-01"));
$weeksInMonth = ceil(($daysOfMonth + $firstDayOfMonth) / 7);
$months = array('Styczeń', 'Luty', 'Marzec', 'Kwiecień', 'Maj', 'Czerwiec', 'Lipiec', 'Sierpień', 'Wrzesień', 'Październik', 'Listopad', 'Grudzień');

$calendarBody = '<table id="calendar-table">';
$calendarBody .= '<caption>' . $months[intval($month) - 1] . '</caption>';
$calendarBody .= '<tr><th>Nd</th><th>Pn</th><th>Wt</th><th>Śr</th><th>Cz</th><th>Pt</th><th>So</th></tr>';

$id = $_SESSION['id'];

$servername = 'localhost';
$user = 'root';
$password = '';
$dbname = 'planer';

$conn = mysqli_connect($servername, $user, $password, $dbname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}


$sql = "SELECT * FROM tasks WHERE id_user = $id";
$result = mysqli_query($conn, $sql);

$dates = array();

while ($row = mysqli_fetch_assoc($result)) {
    $dates[] = $row['date'];
}


$dayOfMonth = 1;
for ($i = 0; $i < $weeksInMonth; $i++) {
    $calendarBody .= '<tr>';
    for ($j = 0; $j < 7; $j++) {
        if ($i === 0 && $j < $firstDayOfMonth - 1) {
            $calendarBody .= '<td></td>';
        } else if ($dayOfMonth > $daysOfMonth) {
            $calendarBody .= '<td></td>';
        } else {
            $currentDate = date('Y-m-d', strtotime($year . '-' . $month . '-' . $dayOfMonth));
            if (in_array($currentDate, $dates)) {
                $sqlDate = true;
            } else {
                $sqlDate = false;
            }
            if ($sqlDate) {
                $calendarBody .= '<td id="' . $dayOfMonth . '"><a class="day">' . $dayOfMonth . '</a><a class="event" style="background-color: blue;"></a></td>';
            } else if ($dayOfMonth == date('j') && $year == date('Y') && $month == date('m')) {
                $calendarBody .= '<td class="current-day" id="' . $dayOfMonth . '"><a class="day">' . $dayOfMonth . '</a><a class="event"></a></td>';
            } else {
                $calendarBody .= '<td id="' . $dayOfMonth . '"><a class="day">' . $dayOfMonth . '</a><a class="event"></a></td>';
            }
            $dayOfMonth++;
        }
    }
    $calendarBody .= '</tr>';
}
$calendarBody .= '</table>';

echo $calendarBody;

