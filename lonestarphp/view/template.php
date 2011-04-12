<!doctype html>  

<!-- paulirish.com/2008/conditional-stylesheets-vs-css-hacks-answer-neither/ --> 
<!--[if lt IE 7 ]> <html lang="en" class="no-js ie6"> <![endif]-->
<!--[if IE 7 ]>    <html lang="en" class="no-js ie7"> <![endif]-->
<!--[if IE 8 ]>    <html lang="en" class="no-js ie8"> <![endif]-->
<!--[if IE 9 ]>    <html lang="en" class="no-js ie9"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--> <html lang="en" class="no-js"> <!--<![endif]-->
<head>
  <meta charset="utf-8">

  <!-- Always force latest IE rendering engine (even in intranet) & Chrome Frame 
       Remove this if you use the .htaccess -->
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

  <title>Lone Star PHP Conference - June 11th, Dallas, Tx</title>
  <meta name="description" content="">
  <meta name="author" content="">

  <!--  Mobile viewport optimized: j.mp/bplateviewport -->
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- Place favicon.ico & apple-touch-icon.png in the root of your domain and delete these references -->
  <link rel="shortcut icon" href="/favicon.ico">
  <link rel="apple-touch-icon" href="/apple-touch-icon.png">


  <!-- CSS : implied media="all" -->
  <link rel="stylesheet" href="/assets/css/lonestarphp.css?v=2">

  <!-- Uncomment if you are specifically targeting less enabled mobile browsers
  <link rel="stylesheet" media="handheld" href="css/handheld.css?v=2">  -->
 
  <!-- All JavaScript at the bottom, except for Modernizr which enables HTML5 elements & feature detects -->
  <script src="/assets/ajs/libs/modernizr-1.6.min.js"></script>

</head>

<body style="border-top:5px solid #222;">

<div id="container">
    <header class="container_24 clearfix">
		<!--nav>
			<ul>
				<li class="active"><a href="#">Speakers</a></li>
				<li><a href="#">Schedule</a></li>
				<li><a href="#">About</a></li>
				<li><a href="#">Location</a></li>
				<li><a href="#">Blog</a></li>
			</ul>
		</nav-->
		<div class="grid_8">
			<img src="/assets/img/lonestarphp/logo.png" style="width:310px;" id="logo" />
			<iframe src="http://www.facebook.com/plugins/like.php?href=http%3A%2F%2Fwww.facebook.com%2Fpages%2FLone-Star-PHP%2F135732006497004&amp;layout=button_count&amp;show_faces=false&amp;width=200&amp;action=like&amp;font&amp;colorscheme=light&amp;height=21" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:100px;  height:21px; position:fixed; top:16px; right:0;" allowTransparency="true"></iframe>
			
			<br><br>
			
			<a href="#schedule" style="color:#BF3324;font-weight:bold">schedule</a> |
			<a href="#speakers" style="color:#BF3324;font-weight:bold">speakers</a> |
			<a href="#sponsers" style="color:#BF3324;font-weight:bold">sponsers</a> |
			<a href="#about" style="color:#BF3324;font-weight:bold">about</a>
		</div>
		
		<div id="info" class="grid_15 prefix_1	">
			<h1>Introducing the first annual<br />PHP Conference in North Texas</h1>
			<h2>Join us for this day-long event and hear the best local speakers from the Lone Star State.</h2>

			<hr class="star" />

			<div class="grid_5 alpha">
				<h3>Where</h3>
				<p><i>Crowne Plaza</i><br />
				7800 Alpha Rd, Dallas, TX  &nbsp;&nbsp;
				<a href="http://maps.google.com/maps?f=q&source=embed&hl=en&geocode=&q=Crowne+Plaza+Suites+Dallas+Park+Central,+Alpha+Road,+Dallas,+TX&aq=0&sll=37.0625,-95.677068&sspn=49.444078,95.273438&ie=UTF8&hq=Crowne+Plaza+Suites+Dallas+Park+Central&hnear=Crowne+Plaza+Suites+Dallas+Park+Central,+7800+Alpha+Rd,+Dallas,+Texas+75240&ll=32.927866,-96.77173&spn=0.022477,0.038418&t=h" target="_blank">Map it →</a></p>
			</div>
			
			<div class="grid_5">
				<h3>When</h3>
				<p><i>June 11, 2011</i><br />
				Saturday, 8:00am - 5:30pm</p>
			</div>
		
			<div class="grid_5 omega">
				<h3>How</h3>
				<p><i>Full Day - $60</i><br />
				Register Online Today</p>
			</div>

			<hr class="clear" />
			
			<a href="http://lonestarphp.eventbrite.com" class="button">Register Now!</a>
			
			<p class="note" id="eventBright_note">Registration Powered by <i style="display:none;">EventBright</i></p>
		</div>
    </header>
    
    <div id="main" class="">
		<section id="speakers">
			<div class="container_24 clearfix">
				<h2><i>The</i> Speakers</h2>

				<?php echo $speaker_block; ?>
			</div>
		</section>

		<section id="schedule">
			<div class="container_24 clearfix">
				<h2><i>The</i> Session Schedule</h2>

				<?php echo $schedule_block; ?>
		</section>
		
	<section id="sponsers">
		<div class="container_24 clearfix">
			<h2><i>The</i> Sponsers</h2>

			<a href="http://www.softlayer.com/" id="softlayer" class="sponser" target="_blank">SOFTLAYER</a>
		


			<!--h3 style="text-align:center; color:#aaa; font-size:1.3em;">We'd like to extend our deepest thanks to these organizations that has made this event possible</h3-->			
		</div>
	</section>
		
		<section id="misc">
			<div class="container_24 clearfix">
				<div class="grid_11" id="about">
					<h2>About <i>the</i> Conference</h2>
					<p>The Lone Star PHP Conference brings together some of the best local speakers from around Texas. They bring their experience and knowledge to this day-long event, the first annual PHP conference in North Texas.</p>

					<p>The event will be on <b>June 11th</b> and will last from <b>8am through 5:30pm</b> with a break for lunch. The price of the ticket includes beverages all day (water, coffee, sodas) and a boxed lunch for all attendees.</p>

					<p>We hope you'll join us for our event!</p>

					<p>Brought to you by <a href="http://phpdallas.org">DallasPHP</a></p>
					
					<p><b>Follow Us:</b><br />
					<a href="http://twitter.com/lonestarphp">@lonestarphp</a><br />
					<a href="http://facebook.com/lonestarconference">facebook.com/lonestarconference</a><br />
					#dallasphp @ irc.<a href="http://freenode.net">freenode.net</a><br />
					<br />
					<a href="http://joind.in/event/lonestarphp">Lone Star PHP on Joind.in</a><br />
					</p>
				</div>

				<div class="grid_12 prefix_1" id="location">
					<h2><i>the</i> Location</h2>
<iframe width="250" height="200" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" style="float:left; margin-right:10px;" src="http://maps.google.com/maps?f=q&amp;source=s_q&amp;hl=en&amp;geocode=&amp;q=Crowne+Plaza+Suites+Dallas+Park+Central,+Alpha+Road,+Dallas,+TX&amp;aq=0&amp;sll=37.0625,-95.677068&amp;sspn=49.444078,95.273438&amp;ie=UTF8&amp;hq=Crowne+Plaza+Suites+Dallas+Park+Central&amp;hnear=Crowne+Plaza+Suites+Dallas+Park+Central,+7800+Alpha+Rd,+Dallas,+Texas+75240&amp;ll=32.928301,-96.771698&amp;spn=0.028817,0.042744&amp;z=13&amp;output=embed"></iframe><small><a href="http://maps.google.com/maps?f=q&amp;source=embed&amp;hl=en&amp;geocode=&amp;q=Crowne+Plaza+Suites+Dallas+Park+Central,+Alpha+Road,+Dallas,+TX&amp;aq=0&amp;sll=37.0625,-95.677068&amp;sspn=49.444078,95.273438&amp;ie=UTF8&amp;hq=Crowne+Plaza+Suites+Dallas+Park+Central&amp;hnear=Crowne+Plaza+Suites+Dallas+Park+Central,+7800+Alpha+Rd,+Dallas,+Texas+75240&amp;ll=32.928301,-96.771698&amp;spn=0.028817,0.042744&amp;z=13" style="float:left;clear:left;">View Larger Map</a></small>

					<p>This year's event will be happening at the <b>Crowne Plaza</b> in Dallas, just off of 635 and Alpha</p> 
					<p>Discounted room rates are <b>$89</b> for Friday & Saturday nights and <b>$119</b> folloing that.</p>
					<p><b>Address:</b><br/>
					7800 Alpha Road<br />
					Dallas, TX 75240</p>
					<p>
					<b>Phone:</b> (972) 233-7600
					</p>
				</div>
			</div>
		</section>

	</div>
    
	<footer>
		<h3>For more information about the event, contact <a href="mailto:info@phpdallas.org">info@phpdallas.org</a>.</h3>
		<hr class="star" />
		<br />
		<a href="http://www.w3.org/html/logo/">
			<img src="http://www.w3.org/html/logo/badge/html5-badge-h-css3-semantics.png" width="165" height="64" alt="HTML5 Powered with CSS3 / Styling, and Semantics" title="HTML5 Powered with CSS3 / Styling, and Semantics" style="margin-left:30px;">
		</a>
		<br /><br />
		<a href="http://www.erichyland.com" target="_blank" id="design-sig">Website Design by Eric Hyland</a>
    </footer>
</div> <!--! end of #container -->


  <!-- Javascript at the bottom for fast page loading -->

  <!-- Grab Google CDN's jQuery. fall back to local if necessary -->
  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.5.1/jquery.js"></script>
  <script>!window.jQuery && document.write(unescape('%3Cscript src="js/libs/jquery-1.5.1.js"%3E%3C/script%3E'))</script>
  
  
  <!-- scripts concatenated and minified via ant build script-->
  <script src="/assets/js/plugins.js"></script>
  <script src="/assets/js/script.js"></script>
  <!-- end concatenated and minified scripts-->
  
  
  <!--[if lt IE 7 ]>
    <script src="js/libs/dd_belatedpng.js"></script>
    <script> DD_belatedPNG.fix('img, .png_bg'); //fix any <img> or .png_bg background-images </script>
  <![endif]-->

  <!-- yui profiler and profileviewer - remove for production -->
  <script src="/assets/js/profiling/yahoo-profiling.min.js"></script>
  <script src="/assets/js/profiling/config.js"></script>
  <!-- end profiling code -->


  <!-- asynchronous google analytics: mathiasbynens.be/notes/async-analytics-snippet 
       change the UA-XXXXX-X to be your site's ID -->
  <script>
   var _gaq = [['_setAccount', 'UA-246789-4'], ['_trackPageview']];
   (function(d, t) {
    var g = d.createElement(t),
        s = d.getElementsByTagName(t)[0];
    g.async = true;
    g.src = ('https:' == location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    s.parentNode.insertBefore(g, s);
   })(document, 'script');
  </script>
  
</body>
</html>
