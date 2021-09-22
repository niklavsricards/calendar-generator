<?php

require_once 'vendor/autoload.php';

use Spatie\CalendarLinks\Link;

if (isset($_POST['submit'])) {

    $link = Link::create(
        $_POST['eventName'],
        DateTime::createFromFormat('Y-m-d\TH:i', $_POST['dateFrom']),
        DateTime::createFromFormat('Y-m-d\TH:i', $_POST['dateTo'])
    )->description($_POST['description'])->google();

    echo "<a target='_blank' href=" . $link . " >" . "Click here for your event" . "</a>";
}
?>

<form action="/" method="post">
    <label>Event name: </label><br>
    <input type="text" name="eventName" placeholder="Name the event"><br>

    <label>Date from:</label><br>
    <input type="datetime-local" name="dateFrom" placeholder="Y-m-d H:m"><br>

    <label>Date to:</label><br>
    <input type="datetime-local" name="dateTo" placeholder="Y-m-d H:m"><br>

    <label>Description: </label><br>
    <input type="text" name="description" placeholder="description"><br><br>

    <input type="submit" value="Generate" name="submit">
</form>