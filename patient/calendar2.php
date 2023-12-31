<?php
function build_calendar($month, $year){
    $daysOfWeek = array('Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday');

    $firstDayOfMonth = mktime(0, 0, 0, $month, 1, $year);

    $numberDays = date('t', $firstDayOfMonth);

    $dateComponents = getdate($firstDayOfMonth);

    $monthName = $dateComponents['month'];

    $dayOfWeek = $dateComponents['wday'];

    $dateToday = date('Y-m-d');

    $calendar = "<table class='table table-bordered'>";
    $calendar .= "<center><h2>$monthName $year</h2></center>";

    $calendar .= "<tr>";

    foreach($daysOfWeek as $day){
        $calendar .= "<th class='header'>$day</th>";
    }
    $calendar .= "</tr><tr>";

    if($dayOfWeek > 0){
        for($k = 0; $k < $dayOfWeek; $k++) {
            $calendar .= "<td></td>";
        }
    }

    $currentDay = 1;
    $month = str_pad($month, 2, "0", STR_PAD_LEFT);

    while($currentDay <= $numberDays){
        if($dayOfWeek == 7){
            $dayOfWeek = 0;
            $calendar .= "</tr><tr>";
        }
        $currentDayRel = str_pad($currentDay, 2, "0", STR_PAD_LEFT);
        $date = "$year-$month-$currentDayRel";

        if($dateToday == $date){
            $calendar .= "<td class='today'><h4>$currentDay</h4>";
        } else {
            $calendar .= "<td><h4>$currentDay</h4>";
        }

        $calendar .= "</td>";

        $currentDay++;
        $dayOfWeek++;
    }

    if($dayOfWeek != 7){
        $remainingDays = 7 - $dayOfWeek;
        for($i = 0; $i < $remainingDays; $i++) {
            $calendar .= "<td></td>";
        }
    }
    $calendar .= "</tr>";
    $calendar .= "</table>";

    return $calendar;
}
?>

<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <style>
        table {
            table-layout: fixed;
        }
        td {
            width: 33%;
        }
        .today {
            background: yellow;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <?php
                $dateComponents = getDate();
                $month = $dateComponents['mon'];
                $year = $dateComponents['year'];
                echo build_calendar($month, $year);
                ?>
            </div>
        </div>
    </div>
</body>
</html>
