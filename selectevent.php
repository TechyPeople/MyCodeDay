<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Select an Event // MyCodeDay</title>
    <meta name="description" content="" />
    <meta name="author" content="Sanil Chawla" />
    <link rel="shortcut icon" href="assets/img/favicon.png">
    <link rel="stylesheet" type="text/css" href="selectevent.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
</head>

<body>
    <div class="wrapper">
        <div class="container">
            <h1>Welcome to MyCodeDay</h1>
            <form class="form" action="index.php" method="get">
                <input type="text" placeholder="Type your event ID..." name="myEvent">
                <input type="text" placeholder="Type your registration ID..." name="userID">
                <button type="submit" id="login-button">Enter</button>
                <p><br/>You can find your registration ID at the bottom of the confirmation email we sent you when you registered.</p>
            </form>
        </div>
        <script type="text/javascript">
            $("#login-button").click(function (event) {
//                event.preventDefault();

                $('form').fadeOut(500);
                $('.wrapper').addClass('form-success');
            });
        </script>
        <ul class="bg-bubbles">
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
        </ul>
    </div>
</body>

</html>