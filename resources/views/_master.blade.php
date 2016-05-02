<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <!-- Yield the title if it exists, otherwise default to 'Developers Toolbox' -->
	<title>@yield('title','Developers Toolbox')</title>

  <!-- Maybe meta tags and css links belong in @head to be yielded? -->
  <meta http-equiv="content-language" content="en-US"/>
  <meta name="keywords" content="" />
  <meta name="creator" content=""/>
  <meta name="description" content=""/>
  <meta name="subject" content=""/>

  <link rel='stylesheet' href='/css/normalize.css' type='text/css'>
	<link rel='stylesheet' href='/css/main.css' type='text/css'>
  <link rel='stylesheet' href='/css/responsive.css' type='text/css'>
  <!-- Yield any page specific CSS files or anything else you might want in the <head> -->
	<!-- @yield('head') -->

  <!-- Font Awesome -->
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">
  <!-- Bootstrap -->
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet">
  <!-- Bootstrap Theme -->
  <link href="https://maxcdn.bootstrapcdn.com/bootswatch/3.3.5/lumen/bootstrap.min.css" rel="stylesheet">

</head>
<body>

	@if(Session::get('flash_message'))
		<div class='flash-message'>{{ Session::get('flash_message') }}</div>
	@endif

<!-- Toolbox logo? -->

    <header>
        <a href="/"id="site_logo" >Developer's Toolbox</a>
    </header>

    <nav>
        <div class="sidebar-links">
            <a class="link-users" href="/users">Users</a>
            <a class="link-text" href="/loremIpsum">Text</a>
            <a class="link-password" href="/password">Passwords</a>
            <a class="link-htaccess" href="#">htaccess</a>
        </div>
            &copy; {{ date('Y') }}
    </nav>


  <main>

    <section>
        <!-- Main page content will be yielded here -->
        @yield('content')
    </section>

  </main>

  <!-- Yield any page specific JS files or anything else you might want at the end of the body -->
  @yield('body')


  <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
  <script src="js/plugins.js"></script>
  <script src="js/main.js"></script>

</body>
</html>
