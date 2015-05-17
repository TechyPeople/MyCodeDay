<?php
    $rawPage = file_get_html('http://codeday.org/' . $myEvent);
    $eventVenue = $rawPage->find('div', 5)->find('a', 0);
?>