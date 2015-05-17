<?php
    include('../simple_html_dom.php');
    $html = file_get_html('http://www.codeday.org/');
?>

<!DOCTYPE html>
<html lang="en">
    <head>
		<meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
		<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
        <title>Select an Event // MyCodeDay</title>
        <meta name="description" content="Custom Drop-Down List Styling with CSS3" />
        <meta name="author" content="Codrops" />
        <link rel="shortcut icon" href="../assets/img/favicon.png"> 
        <link rel="stylesheet" type="text/css" href="css/style.css" />
        <link href='http://fonts.googleapis.com/css?family=Roboto:100,300,400,700' rel='stylesheet' type='text/css' />
		<script type="text/javascript" src="js/modernizr.custom.79639.js"></script> 
		<noscript><link rel="stylesheet" type="text/css" href="css/noJS.css" /></noscript>
    </head>
    <body>
        <div class="container">
		
			
			
			<header>
			
				<h1><ultralight>WELCOME TO </ultralight>MYCODEDAY</h1>
				<h2>Pick your event</h2>
                
			</header>
			
			<section class="main">
				<div class="wrapper-demo">
					<div id="dd" class="wrapper-dropdown-5" tabindex="1">John Doe
						<ul class="dropdown">
                            <?php 
                                foreach($html->find('section section ul') as $ul) {
                                    foreach($ul->find('li') as $li) {
                                        echo("<li><a href=\"#\">" . $li . "</a></li>");
                                    }
                                }
                            ?>
							<li><a href="#"><i class="icon-user"></i>Profile</a></li>
							<li><a href="#"><i class="icon-cog"></i>Settings</a></li>
							<li><a href="#"><i class="icon-remove"></i>Log out</a></li>
						</ul>
					</div>
				</div>
			</section>
			
		</div>
		<!-- jQuery if needed -->
		<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
		<script type="text/javascript">

			function DropDown(el) {
				this.dd = el;
				this.initEvents();
			}
			DropDown.prototype = {
				initEvents : function() {
					var obj = this;

					obj.dd.on('click', function(event){
						$(this).toggleClass('active');
						event.stopPropagation();
					});	
				}
			}

			$(function() {

				var dd = new DropDown( $('#dd') );

				$(document).click(function() {
					// all dropdowns
					$('.wrapper-dropdown-5').removeClass('active');
				});

			});

		</script>
	</body>
</html>