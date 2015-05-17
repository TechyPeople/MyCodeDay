<?php include( '../simple_html_dom.php'); $html=file_get_html( 'http://www.codeday.org/'); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Select an Event // MyCodeDay</title>
    <meta name="description" content="" />
    <meta name="author" content="Sanil Chawla" />
    <link rel="shortcut icon" href="../assets/img/favicon.png">
    <link rel="stylesheet" type="text/css" href="style.css" />
    <script type="text/javascript">
        $("#login-button").click(function (event) {
            event.preventDefault();

            $('form').fadeOut(500);
            $('.wrapper').addClass('form-success');
        });
    </script>
</head>

<body>
    <div class="wrapper">
        <div class="container">
            <h1>Welcome to MyCodeDay</h1>

            <form class="form" action="../index.php" method="get">
                <input type="text" placeholder="Type your event ID...">
                <button type="submit" id="login-button">Enter</button>
            </form>
        </div>

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