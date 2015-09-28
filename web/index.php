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
    echo utf8_decode('SUMMARY: ' . @$event['SUMMARY'] . "<br />\n");
    echo utf8_decode('DTSTART: ' . $event['DTSTART'] . ' - UNIX-Time: ' . $ical->iCalDateToUnixTimestamp($event['DTSTART']) . "<br />\n");
    echo utf8_decode('DTEND: ' . $event['DTEND'] . "<br />\n");
    echo utf8_decode('DTSTAMP: ' . $event['DTSTAMP'] . "<br />\n");
    echo utf8_decode('UID: ' . @$event['UID'] . "<br />\n");
    echo utf8_decode('CREATED: ' . @$event['CREATED'] . "<br />\n");
    echo utf8_decode('LAST-MODIFIED: ' . @$event['LAST-MODIFIED'] . "<br />\n");
    echo utf8_decode('DESCRIPTION: ' . @$event['DESCRIPTION'] . "<br />\n");
    $img = @$event['DESCRIPTION'];
    if (filter_var($img, FILTER_VALIDATE_URL)){
        echo "<img src=", $img, " /><br />\n";
    }

    echo utf8_decode('LOCATION: ' . @$event['LOCATION'] . "<br />\n");
    echo utf8_decode('SEQUENCE: ' . @$event['SEQUENCE'] . "<br />\n");
    echo utf8_decode('STATUS: ' . @$event['STATUS'] . "<br />\n");
    echo utf8_decode('TRANSP: ' . @$event['TRANSP'] . "<br />\n");
    echo utf8_decode('ORGANIZER: ' . @$event['ORGANIZER'] . "<br />\n");
    echo utf8_decode('ATTENDEE(S): ' . @$event['ATTENDEE'] . "<br />\n");
    echo utf8_decode('<hr/>');
}
?>
