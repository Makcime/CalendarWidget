<?php
header('Content-type: text/html; charset=UTF-8'); 
?>
<?php
/**
 * This example is based on the Ics-Parser- Example.
 *
 * PHP Version 5
 *
 * @author   Marlier Maxime <marlier.maxime@gmail.com>
 *
 */

require '../vendor/johngrogg/ics-parser/class.iCalReader.php';

// if file containing the url does not exist, use the sample ics file
if (file_exists('cal.url')) {
    $url = file_get_contents('cal.url');
}else{
    $url = 'sample.ics' ;
    echo "<br />\n";
    echo "This is a demo from a sample file, please add a cal.url file with the link to your calendar" ;
    echo "<br />\n";
    echo "<br />\n";
}

$ical   = new ICal($url);

$events = $ical->events();

$date = $events[0]['DTSTART'];
echo 'The ical date: ';
echo $date;
echo "<br />\n";

echo 'The Unix timestamp: ';
echo $ical->iCalDateToUnixTimestamp($date);
echo "<br />\n";

echo 'The number of events: ';
echo $ical->event_count;
echo "<br />\n";

echo 'The number of todos: ';
echo $ical->todo_count;
echo "<br />\n";
echo '<hr/><hr/>';

foreach ($events as $event) {
    $img = @$event['DESCRIPTION'];
    if (filter_var($img, FILTER_VALIDATE_URL)){

        echo ('SUMMARY: ' . @$event['SUMMARY'] . "<br />\n");
        echo ('DTSTART: ' . $event['DTSTART'] . ' - UNIX-Time: ' . $ical->iCalDateToUnixTimestamp($event['DTSTART']) . "<br />\n");
        echo ('DTEND: ' . $event['DTEND'] . "<br />\n");
        echo ('DTSTAMP: ' . $event['DTSTAMP'] . "<br />\n");
        // echo ('UID: ' . @$event['UID'] . "<br />\n");
        // echo ('CREATED: ' . @$event['CREATED'] . "<br />\n");
        // echo ('LAST-MODIFIED: ' . @$event['LAST-MODIFIED'] . "<br />\n");
        echo ('DESCRIPTION: ' . $img . "<br />\n");
        echo "<img src=", $img, " /><br />\n";

        echo ('LOCATION: ' . @$event['LOCATION'] . "<br />\n");
        // echo ('SEQUENCE: ' . @$event['SEQUENCE'] . "<br />\n");
        // echo ('STATUS: ' . @$event['STATUS'] . "<br />\n");
        // echo ('TRANSP: ' . @$event['TRANSP'] . "<br />\n");
        // echo ('ORGANIZER: ' . @$event['ORGANIZER'] . "<br />\n");
        // echo ('ATTENDEE(S): ' . @$event['ATTENDEE'] . "<br />\n");
        echo ('<hr/>');
    }
}
?>
