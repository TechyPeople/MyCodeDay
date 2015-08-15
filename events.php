<?php
    include('regscraper.php');
    $userEvent = json_decode(file_get_contents('https://clear.codeday.org/api/region/' . $myEvent), true);
?>
