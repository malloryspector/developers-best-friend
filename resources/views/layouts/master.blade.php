<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>
      {{-- Yield the title if it exists, otherwise default to 'Developer's Best Friend' --}}
      @yield('title')
    </title>

    <!-- Bootstrap -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- Additional Styling -->
    <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet' type='text/css'>
    <link href="/css/style.css" rel="stylesheet">

    {{-- page specific styling --}}
    @yield('styling')
  </head>

  <body>
  	<!-- Navigation -->
    <nav>
    	<div class="container">
    		<a href="/" class="navbar-brand">Developer's Best Friend</a>
    		<ul class="nav navbar-nav pull-right">
    			<li><a href="/lorem-ipsum">Lorem Ipsum</a></li>
    			<li><a href="/random-user-generator">Random User</a></li>
          <li><a href="/xkcd-password-generator">xkcd Password</a></li>
    		</ul>
    	</div>
    </nav>

  	<!-- Jumbotron -->
    <section>
    	<div class="jumbotron">
    		<div class="container">
    			<div class="col-md-12">
            {{-- Content for the jumbotron section --}}
            @yield('jumbotron')
    			</div>
    		</div>
    	</div>
    </section>

  	<!-- Tools Section -->
    <section>
    	<div class="container">
    		<div class="flex-row">
          {{-- Content for the tools section --}}
          @yield('tools')
    		</div>
    	</div>
    </section>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <script src="https://use.fontawesome.com/e4a5d17ac0.js"></script>
  </body>
</html>
