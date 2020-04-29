<!doctype html>
<html lang="en">
  <head>
  	
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>The Afterlife</title>
	
	
<!-- added meta stuff look up each one of these things-->	
	<link rel="shortcut icon" href="//jovijuan.com/favicon.ico"/>
  <link rel="apple-touch-icon" href="//jovijuan.com/apple-touch-icon.png"/>
  
  <meta name="apple-mobile-web-app-capable" content="yes"/>
  <meta name="format-detection" content="telephone=no">
  
  <!-- Meta: URL -->
  <link rel="canonical" href="https://www.jovijuan.com/"/>
  <meta property="og:url" content="https://www.jovijuan.com/"/>
  
  <!-- Meta: Images -->
  <link rel="image_src" href="https://www.jovijuan.com/images/jovijuan-social_image.png"/>
  <meta property="og:image" content="https://www.jovijuan.com/images/jovijuan-social_image.png"/>
  <meta name="twitter:image:src" content="https://www.jovijuan.com/images/jovijuan-social_image.png">
  
  
  <!-- Meta: Title -->
  <meta name="title" content="Jovi Juan // Visual Journalist // Designer // Developer"/>
  <meta property="og:title" content="Jovi Juan // Visual Journalist // Designer // Developer"/>
  <meta name="twitter:title" content="Jovi Juan // Visual Journalist // Designer // Developer">
  
  <!-- Meta: Description -->
  <meta name="description" content="Interactive graphics, data visualisations, experiments with narrative experiences."/>
  <meta property="og:description" content="Interactive graphics, data visualisations, experiments with narrative experiences." />
  <meta name="twitter:description" content="Interactive graphics, data visualisations, experiments with narrative experiences.">
  
  <!-- Meta: Keywords -->
  <meta name="keywords" content="Jovi Juan, Interactive Graphics, News Graphics, Infographics, Design, development, visual journalism"/>
  <meta name="news_keywords" content="Jovi Juan, Interactive Graphics, News Graphics, Infographics, Design, development, visual journalism, data visualizaion, dataviz, narrative experiences">
  
  <meta name="author" content="Jovi Juan"/>
  <meta name="twitter:domain" content="jovijuan.com">
  <meta name="twitter:card" content="summary_large_image">
  <meta name="twitter:site" content="@daoofj">
  <meta name="twitter:image:alt" content="Various images of projects I worked on">
  
  	<meta property="og:title" content="Jovi Juan // Visual Journalist">
	<meta property="og:url" content="https://www.jovijuan.com/">
	<meta property="og:site_name" content="Jovi Juan // Visual Journalist">
	
<!-- end added meta stuff-->	
	
    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">
    <link rel="stylesheet" href="css/styles.css">
    <link href="https://fonts.googleapis.com/css?family=Arapey|Roboto&display=swap" rel="stylesheet">
    
    <!--font-awesome-->
    <script src="https://kit.fontawesome.com/562c6e550b.js" crossorigin="anonymous"></script>
    <!--
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	-->
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <script src="https://cdn.jsdelivr.net/npm/handlebars@latest/dist/handlebars.js"></script>
    <!--<script src="https://cdn.jwplayer.com/players/UVQWMA4o-kGWxh33Q.js"></script>-->
  </head>
  <body>
  	<!--
	<script>
	  // compile the template
	  var template = Handlebars.compile("Handlebars <b>{{doesWhat}}</b>");
	  // execute the compiled template and print the output to the console
	  console.log(template({ doesWhat: "rocks!" }));
	</script>
	-->
	<!-- handlebars templates-->
  	<script id="items-template" type="text/x-handlebars-template">
		{{#each videos}}
		<div class="narrative-item {{loc}}">
			<p class="body_text">
				{{#each text}}
				<span class="tchunk">{{this}}</span>
				{{/each}}
			</p>
		</div>
		{{/each}}
		
	</script>
				
	<script id="image-template" type="text/x-handlebars-template">
		<div class="rightcol rc2">
			
					<img class="img1 chartimage" src="images/{{videos.[0].video}}">
			
		</div><!-- / rightcol -->
		
		<div class="rightcol rc1">
			
					<img class="img1 chartimage" src="images/spacer.gif">
			
		</div><!-- / rightcol2 -->
		
	</script>			
	<!-- /handlebars templates-->
		
    <div class="container-fluid col-sm-16 spacer">&nbsp;</div>
	
		<div class="parent">
			<div class="narrative">
				
			</div><!--/ narrative-->
			
		</div><!--/parent-->
		
			
    <!-- jQuery (necessary for  Bootstrap's JavaScript plugins) -->
    
    <script src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha384-nvAa0+6Qg9clwYCGGPpDQLVpLNn0fRaROjHqs13t4Ggj3Ez50XnGQqc/r8MhnRDZ" crossorigin="anonymous"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js" integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd" crossorigin="anonymous"></script>
	
		<!--	
         <script src="https://cdnjs.cloudflare.com/ajax/libs/waypoints/4.0.1/noframework.waypoints.min.js"></script>-->
         
         <script src="js/libs/jquery.waypoints.min.js" type="text/javascript" />
        <script>
      	console.log('hello');
      </script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/fixto/0.5.0/fixto.min.js" type="text/javascript"></script>
     <!--
     <script src="js/libs/fixto.min.js" type="text/javascript" />
     <script src="js/libs/jquery.waypoints.min.js" type="text/javascript" />
     
      <script>
      	console.log('hello');
      </script>
     
     <script src="https://www.jovijuan.com/js/libs/two-step.js" type="text/javascript"></script>
     
     <script src="//cdnjs.cloudflare.com/ajax/libs/waypoints/4.0.1/noframework.waypoints.min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/fixto/0.5.0/fixto.min.js"></script>
        -->
     <script src="js/scripts.js" type="text/javascript"></script>
     
  </body>
</html>