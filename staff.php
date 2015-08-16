<?php
    $userID = $_REQUEST["id"];
    
    include('simple_html_dom.php');
    include('events.php');
    
    if($userEvent['current_event']['overflow_event'] != null && $userEvent['current_event']['webname'] != $myEvent) {
        $selectedEvent = $userEvent['current_event']['overflow_event'];
    } else {
        $selectedEvent = $userEvent;
    }

//    $eventID = $selectedEvent['current_event']['id'];

    include('eventscraper.php');
    
    if(!isset($userID)) {
        header('Location: staff.php?selectedEvent=' . $myEvent . "&userID=none");
    } elseif($userID == "none") {
        $emailIsPresent = false;
    } else {
        $emailIsPresent = true;
    }
    
    if(!isset($selectedEvent)) {
        header('Location: selectevent.php');
    }
    
    if(!isset($userEvent)) {
        header('Location: selectevent.php');
    }
?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <title>MyCodeDay
            <?php echo($regionName) ?>
        </title>
        <link rel="stylesheet" href="assets/css/style.css" />
        <link rel="stylesheet" href="assets/css/sweet-alert.css" />
        <link id="favicon" rel="icon" type="image/png" href="assets/img/favicon.png" />
        <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCVggXa9btjGmzqgUim-1HjmnMtbF3UNms&sensor=false&libraries=visualization,places"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    </head>

    <body class="event">
        <header>
            <h1>
            <span class="event">CodeDay</span>
            <span class="tool">Close</span>
        </h1>
            <!--
        <nav>
            <ul>
                <li class="active"><a href="">Overview</a>
                </li>
                <li><a href="">Event Managers</a>
                </li>
                <li><a href="">Venue Info</a>
                </li>
            </ul>
        </nav>
-->
            <section class="user">
                <ul>
                    <?php if($emailIsPresent) {    
                    echo("<li class=\"username\">" . $userName . "</li>");
                } ?>
                        <li class="batch"><a href=<?php echo( "http://codeday.org/" . $myEvent) ?>>CodeDay <?php echo($regionName) ?></a>
                        </li>
                        <li class="logout"><a href="/selectevent.php">Logout</a>
                        </li>
                </ul>
            </section>
        </header>

        <div class="wrap">
            <section class="subnav">
                <h2>MyCodeDay<br/><ultralight><?php echo($regionName) ?></ultralight></h2>

                <section class="general">
                    <ul>
                        <li><a href=<?php echo( "index.php?userID=" . $userID) ?>>Overview</a>
                        </li>
                        <li><a href=<?php echo( "reg.php?userID=" . $userID) ?>>My Registration</a>
                        </li>
                    </ul>
                </section>

                <section class="info">
                    <h3>Event Information</h3>
                    <ul>
                        <li><a href="#">Staff</a>
                        </li>
                        <li><a href=<?php echo( "sponsors.php?userID=" . $userID) ?>>Sponsors</a>
                        </li>
                        <li><a href=<?php echo( "https://codeday.org/" . $myEvent . "#schedule") ?>>Schedule</a>
                        </li>
                    </ul>
                </section>
                <!--

                <section class="website">
                    <h3>Social</h3>
                    <ul>
                        <li><a href="/event/Z3ftTdfVLFzi/promotions">Friends Attending</a>
                        </li>
                        <li><a href="/event/Z3ftTdfVLFzi/venue">Chat</a>
                        </li>
                    </ul>
                </section>

                <section class="settings">
                    <h3>CodeDay Tools</h3>
                    <ul>
                        <li><a href="http://teams.codeday.org/">Teams</a>
                        </li>
                        <li><a href="/event/Z3ftTdfVLFzi/shipping">CTF</a>
                        </li>
                    </ul>
                </section>
-->

            </section>
            <section class="content with-subnav">
                <section class="status">
                    <section class="hud">
                        <ul>
                            <li>
                                <span class="label">Event Manager</span>
                                <span class="value"><?php echo($manager); if($manager == ""){echo("There isn't a manager for this event yet!");}?></span>
                            </li>
                            <li>
                                <span class="label"><?php if($manager != "") { echo($managerFirstName . "'s Phone"); } else { echo("Phone Number"); } ?></span>
                                <span class="value"><?php echo($managerPhone) ?></span>
                            </li>
                            <li>
                                <span class="label">Email Address</span>
                                <span class="value"><a href=<?php echo("\"mailto:" . $managerEmail . "\"") ?>><?php echo($managerEmail) ?></a></span>
                            </li>
                            <li>
                                <span class="label">CodeDay Helpline</span>
                                <span class="value">+1 (888) CODE-230</span>
                            </li>
                        </ul>
                    </section>
                    <!--
                <section class="toggles">
                    <form method="post" action="/event/Z3ftTdfVLFzi/update-registration-status">
                        <div class="switch enableddisabled">
                            <input type="checkbox" name="allow_registrations" id="allow_registrations" value="1" checked />
                            <label for="allow_registrations">
                                <span class="inner"></span>
                                <span class="switch">&#10005;</span>
                            </label>
                            <span class="label
                        on                        ">Event</span>
                        </div>
                        <input type="hidden" name="_token" value="SdLjU3O2vyQqQob8WBaO9ZaZwPUOHbcIyT7Mphak" />
                    </form>

                    <form method="post" action="/event/Z3ftTdfVLFzi/update-waitlist-status">
                        <div class="switch openclosed">
                            <input type="checkbox" name="allow_waitlist_signups" id="allow_waitlist_signups" value="1" />
                            <label for="allow_waitlist_signups">
                                <span class="inner"></span>
                                <span class="switch">&#10005;</span>
                            </label>
                            <span class="label
                        ">Waitlist</span>
                        </div>
                        <input type="hidden" name="_token" value="SdLjU3O2vyQqQob8WBaO9ZaZwPUOHbcIyT7Mphak" />
                    </form>
                </section>
-->
                </section>
            </section>
        </div>

        <footer>
            Copyright &copy; 2015 Sanil Chawla.
        </footer>
        <script type="text/javascript" src="assets/js/sweet-alert.min.js"></script>
        <script type="text/javascript" src="assets/js/app.js"></script>
        <script type="text/javascript">
            $('#allow_registrations, #allow_waitlist_signups').on('change', function() {
                $(this).parents('form').submit();
            });

        </script>
        <style type="text/css">
            #registrations-over-time .axis path,
            #registrations-over-time .axis line {
                fill: none;
                stroke: #000;
                shape-rendering: crispEdges;
            }
            
            #registrations-over-time .line {
                fill: none;
                stroke: #000;
                stroke-width: 2px;
            }
            
            #registrations-over-time rect {
                fill: #ccc;
            }

        </style>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/d3/3.4.11/d3.min.js"></script>
        <link rel="stylesheet" href="assets/css/shepherd-theme-arrows.css" />
        <script src="assets/js/shepherd.min.js"></script>
        <script src="assets/js/tour.js"></script>
    </body>

    </html>
