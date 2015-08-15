<?php;
function printSubNav() {
    include('eventscraper.php');
        echo("
                <h2>MyCodeDay<br/><ultralight>" . $eventName . "
    </ultralight>
    </h2>

    <section class=\"general\">
        <ul>
            <li><a href=\"index.php\">Overview</a>
            </li>
            <li><a href=\"poverview.php\">Print-Friendly Overview</a>
            </li>
        </ul>
    </section>

    <section class=\"info\">
        <h3>Event Information</h3>
        <ul>
            <li><a href=\"staff.php?myEvent=" . $myEvent . "&userID=" . $userID . ">Staff</a>
            </li>
            <li><a href=\"schedule.php\">Schedule</a>
            </li>
        </ul>
    </section>

    <section class=\"website\">
        <h3>Social</h3>
        <ul>
            <li><a href=\"/event/Z3ftTdfVLFzi/promotions\">Friends Attending</a>
            </li>
            <li><a href=\"/event/Z3ftTdfVLFzi/venue\">Chat</a>
            </li>
        </ul>
    </section>

    <section class=\"settings\">
        <h3>CodeDay Tools</h3>
        <ul>
            <li><a href=\"http://teams.codeday.org/\">Teams</a>
            </li>
            <li><a href=\"/event/Z3ftTdfVLFzi/shipping\">CTF</a>
            </li>
        </ul>
    </section>"); 
        
}
?>
