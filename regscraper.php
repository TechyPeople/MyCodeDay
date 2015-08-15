<?php

    $userDetails = json_decode(file_get_contents("http://clear.codeday.org/api/registration/" . $userID . "?token=Iw7viYlxCYdRH1Zs6ZXxxKsfWcjv00wH&secret=9h4NdZBPC6B2hx7kNEHJcIEEwCiyWxvS"), true);
    
    $userName = $userDetails['name'];
    $userFirst = $userDetails['first_name'];
    $userLast = $userDetails['last_name'];

    $userParentName = $userDetails['parent_name'];
    $userParentPhone = $userDetails['parent_phone'];
    $userParentSecondaryPhone = $userDetails['parent_secondary_phone'];
    
    $userEmail = $userDetails['email'];
    
    $amountPaid = $userDetails['amount_paid'];
    
    if ($userDetails['checked_in_at']['date'] != null) {
        $checkedIn = true;
        $checkInTime = $userDetails['checked_in_at']['date'];
    } else {
        $checkedIn = false;
    }

    $myEvent = $userDetails['event']['webname'];
    $eventID = $userDetails['event']['id'];
?>
