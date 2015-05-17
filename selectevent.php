<!doctype html>
<html lang="en">
<head>
    <title>Select Event // MyCodeDay</title>
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1, maximum-scale=1">
    <link rel="stylesheet" href="http://s5.studentrnd.org/assets/css/style.css" />
</head>
<body
            class="                    login
                "
    >
<script type="text/javascript" data-cfasync="false" src="http://s5.studentrnd.org//use.typekit.net/mvs6fyv.js"></script>
<script type="text/javascript" data-cfasync="false">try{Typekit.load();}catch(e){}</script>
<script type="text/javascript" src="http://s5.studentrnd.org/assets/js/rainbow-background.js" data-cfasync="false"></script>


<section class="content">
      <!-- http://codepen.io/Lewitje/pen/BNNJjo -->
  <div class="wrapper">
  	<div class="container">
  		<div class="welcome">
        <h1 class="welcome-message">Welcome to MyCodeDay</h1>
        <div class="user-info"></div>
      </div>

  		<form action="index.php" method="get">
  			<input type="text" placeholder="Type your event ID here..." id="selectedEvent" name="selectedEvent">
  			<button type="submit" id="login">Enter</button><br><br>

<!--
        <small>
          <a href="/invite/cq5l2rEydV3p5g0rGjvitNXT2rzq87Xa">Need an account?</a>
          <a href="http://goo.gl/forms/G9VqkwgNcP">Having problems?</a>
        </small>
-->
  		</form>

      <form class="login" id="second-factor" style="display: none">
        <div style="text-align: center">Enter the code from Google Authenticator or your YubiKey.</div><br>
        <input type="text" placeholder="Second-Factor Code" id="code">
        <input type="hidden" name="_token" value="CPM2d2EK3k5um76mFLxhRxldEnyxCi7eG16YdN3j" />
        <button type="submit" id="login-second-factor">Login</button>
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

</section>

<script type="text/javascript" src="/assets/js/jquery.js"></script>
<script type="text/javascript" src="/assets/js/util.js"></script>
  <script type="text/javascript" src="/assets/js/login.js?_new"></script>

</body>
</html>
