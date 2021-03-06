<!doctype html>
<!--[if IE 7 ]>    <html lang="en-gb" class="isie ie7 oldie no-js"> <![endif]-->
<!--[if IE 8 ]>    <html lang="en-gb" class="isie ie8 oldie no-js"> <![endif]-->
<!--[if IE 9 ]>    <html lang="en-gb" class="isie ie9 no-js"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--> <html lang="en-gb" class="no-js"> <!--<![endif]-->

<head>
	<title>Coming Soon | Wall Of Frame</title>
	
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="keywords" content="" />
	<meta name="description" content="" />
    <link rel="shortcut icon" type="image/png" href="images/favicon.png"/>
    
    <!-- Favicon --> 
	<link rel="shortcut icon" href="images/favicon.ico">
    
    <!-- this styles only adds some repairs on idevices  -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- Google fonts - witch you want to use - (rest you can just remove) -->
   	<link href='http://fonts.googleapis.com/css?family=Open+Sans:300,300italic,400,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
    
    <!--[if lt IE 9]>
		<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
    
    <!-- ######### CSS STYLES ######### -->
	
    <link rel="stylesheet" href="503/css/reset.css" type="text/css" />
	<link rel="stylesheet" href="503/css/style.css" type="text/css" />
    
    <link rel="stylesheet" href="503/css/font-awesome/503/css/font-awesome.min.css">
    
    <!-- animations -->
    <link href="503/js/animations/503/css/animations.min.css" rel="stylesheet" type="text/css" media="all" />
    
    <!-- responsive devices styles -->
	<link rel="stylesheet" media="screen" href="503/css/responsive-leyouts.css" type="text/css" />
    
    <!-- shortcodes -->
    <link rel="stylesheet" media="screen" href="503/css/shortcodes.css" type="text/css" /> 
    
    <link rel="stylesheet" media="screen" href="503/js/comingsoon/csoon.css" type="text/css" /> 
	
    <script src="http://code.jquery.com/jquery-1.9.0.min.js"></script>
	<script type="text/javascript" src="503/js/comingsoon/jquery.bcat.bgswitcher.js"></script>
    
    
    <script>
    $(document).ready(function() {
      //Callback works only with direction = "down"
      $('.flipTimer').flipTimer({ direction: 'down', date: 'May 26, 2015 00:00:00', callback: function() { alert('times up!'); } });
    });
  </script>
</head>
<body>

<div id="bg-body">
</div><!--end -->

<script type="text/javascript">
var srcBgArray = ["./503/js/comingsoon/img-slider-1.jpg","./503/js/comingsoon/img-slider-2.jpg","./503/js/comingsoon/img-slider-3.jpg"];

$(document).ready(function() {
  $('#bg-body').bcatBGSwitcher({
    urls: srcBgArray,
    alt: 'Full screen background image',
    links: true,
    prevnext: true
  });
});
</script><!--end of bg-body script-->

<script>
function validateForm() {
    var x = document.forms["myForm"]["email"].value;
    var atpos = x.indexOf("@");
    var dotpos = x.lastIndexOf(".");
    if (atpos<1 || dotpos<atpos+2 || dotpos+2>=x.length) {
        alert("Not a valid e-mail address");
        return false;
    }
}
</script>


<div class="site_wrapper">

<div class="comingsoon_page">
<div class="container">
	
    <div class="topcontsoon">
    
    	<img src="img/logo-white.png" alt="" />
        
        <div class="clearfix"></div>
        
        <h5>We're Launching Soon</h5>
        
    </div><!-- end section -->
        
    <div class="countdown_dashboard">
      
        <div class="flipTimer">
        
            <div class="days"></div>
            
            <div class="hours"></div>
            
            <div class="minutes"></div>
            
            <div class="seconds"></div>
            
            <div class="clearfix"></div>
            
            <div class="fttext">DAYS</div>
            <div class="fttext">HRS</div>
            <div class="fttext">MIN</div>
            <div class="fttext">SEC</div>
            
        </div>
        
		
    </div><!-- end section -->
    
    
    <div class="clearfix"></div>
    
    <div class="socialiconssoon">
    	
        <p>Our website is under construction. We'll be here soon with our new awesome site. Get best experience with this one.</p>
        
        <div class="clearfix margin_top3"></div>

        <div class="clearfix"></div>
        <div class="margin_top3"></div>

        <a href="https://www.facebook.com/profile.php?id=152956851568721&fref=ts"><i class="fa fa-facebook"></i></a>
        <a href="http://www.twitter.com/echobeatsAE"><i class="fa fa-twitter"></i></a>
        
	
    </div><!-- end section -->

</div>
</div>

</div>

    
<!-- ######### JS FILES ######### -->
<script type="text/javascript" src="503/js/comingsoon/jquery.flipTimer.js"></script>

<!-- animations -->
<script src="503/js/animations/503/js/animations.min.js" type="text/javascript"></script>


</body>
</html>
