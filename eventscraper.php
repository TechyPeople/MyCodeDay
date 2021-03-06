<?php
    $rawPage = file_get_html('http://codeday.org/' . $myEvent);
    $eventVenue = $rawPage->find('div', 5)->find('a', 0);

    include('regscraper.php');
    
    $eventDetails = json_decode(file_get_contents("http://clear.codeday.org/api/event/" . $eventID . "?token=Iw7viYlxCYdRH1Zs6ZXxxKsfWcjv00wH&secret=9h4NdZBPC6B2hx7kNEHJcIEEwCiyWxvS"), true);
    
    $eventName = $eventDetails['name'];
    $regionName = $eventDetails['region_name'];
    $venueName = $eventDetails['venue']['name'];
    $venueAddress = $eventDetails['venue']['full_address'];
    $venueAddressReady = urlencode($venueAddress);
    $venueLink = "https://www.google.com/maps/place/" . $venueAddressReady;
    $attendeeCount = $eventDetails['registration_info']['max'] - $eventDetails['registration_info']['remaining'];
    $waiverLink = $eventDetails['waiver'];

    $startDate = $eventDetails['batch']['starts_at'];
    $endDate = $eventDetails['batch']['ends_at'];

    $manager = $eventDetails['manager']['name'];
    $managerFirstName = $eventDetails['manager']['first_name'];
    $managerPhone = $eventDetails['manager']['phone'];
    $managerEmail = $eventDetails['manager']['email'];
    
    if($venueName == "") {
        $venueName = "No venue yet!  Check back soon.";
        $venueAddress = "N/A";
    }
    
    $sponsorList = $eventDetails['sponsors'];
?>
