<html>

<head>
    <link href="calendar.css" type="text/css" rel="stylesheet" />
</head>

<body>
    <?php
    include 'cal.php';
    include 'bookcalendar.php';
    include 'BookableCell.php';


    $bookcalendar = new bookcalendar(
        'tutorial',
        'localhost',
        'root',
        ''
    );

    $bookableCell = new BookableCell($bookcalendar);

    $cal = new cal();

    $cal->attachObserver('showCell', $bookableCell);

    $bookableCell->routeActions();

    echo $cal->show();
    ?>
</body>

</html>