
<html>
  <head>
  </head>
  <body>
    <?php define("DEBUGGING", false); ?>
    <?php echo "<h2>Current Month</h2>"; ?>
    <br />
    <?php
        $days = array("Sun", "Mon", "Tue", "Wed", "Thur", "Fri", "Sat");
        $month_start = strtotime("first day of this month", time());
        $month_end = strtotime("last day of this month", time());
	$start_week_day = date("D", $month_start);
	$end_month_day_number = (int)date("d", $month_end);
        if (DEBUGGING) {
	    echo "First day of month: ";
            echo date("Y-m-1");
            echo("<br />");
	    echo "First day of month: ";
            echo strtotime(date("Y-m-1"));
	    echo "First day of this month: ";
            echo strtotime("first day of this month", time());
            echo "DEBUGGING: " . DEBUGGING;
            echo "First day of this month, formatted: ";
            echo date("D, M jS Y", $month_start); 
	    echo "<br />End month day number:" . $end_month_day_number . "<br />";
	}

        $counter_start = 0;
	if ($start_week_day == "Sun") {
            $counter_start = 1;
	} elseif ($start_week_day == "Mon") {
            $counter_start = 2;
	} elseif ($start_week_day == "Tue") {
            $counter_start = 3;
	} elseif ($start_week_day == "Wed") {
            $counter_start = 4;
	} elseif ($start_week_day == "Thu") {
            $counter_start = 5;
	} elseif ($start_week_day == "Fri") {
            $counter_start = 6;
	} elseif ($start_week_day == "Sat") {
            $counter_start = 7;
	}

        if (DEBUGGING) {
            echo "<br />Counter Start: " . $counter_start . "<br />";
	}
    ?>
    <br />

    <table>
      <?php
        echo "<tr>";  
	foreach($days as $day) {
	    echo "<th style='width: 100px;'>" . $day . "</th>";
	}
	echo "</tr>";

	echo "<tr>";  
	$day_counter = 1;
	for($j = 1; $j <= 7; $j++) {
	    if ($j >= $counter_start) {
                echo "<td style='text-align: center;'>" . $day_counter . "</td>";
                $day_counter++;
	    } else {
                echo "<td>&nbsp;</td>";
            }
	}
	echo "</tr>";

	for($i = 0; $i < 5; $i++) {
	    echo "<tr>";
	    for($j = 0; $j < 7; $j++) {
                if ($day_counter <= $end_month_day_number) {
			echo "<td style='text-align: center;'>" . $day_counter . "</td>";
			$day_counter++;
	        }
	    }
	    echo "</tr>";
        }
    ?>
    </table>
  </body>
</html>


