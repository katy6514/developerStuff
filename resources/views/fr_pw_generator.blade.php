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

    <!-- <div id="side_menu">

        <header>
            <a href="/"id="site_logo" >Developer's Toolbox</a>
        </header>

        <nav id="side_nav">
            <div class="nav-links">
                <a class="link-users" href="/users">Users</a>
                <a class="link-text" href="/loremIpsum">Text</a>
                <a class="link-password" href="/password">Passwords</a>
                <a class="link-htaccess" href="/htpassword">htaccess</a>
            </div>
                &copy; {{ date('Y') }}
        </nav>

        <nav id="top_nav">
            <div class="nav-links">
                <a class="link-users" href="/users">Users</a>
                <a class="link-text" href="/loremIpsum">Text</a>
                <a class="link-password" href="/password">Passwords</a>
                <a class="link-htaccess" href="/htpassword">htaccess</a>
            </div>
        </nav>
    </div> -->

    <main id="furiosa">

            {!! HTML::image('img/micaelas_furiosa.jpg') !!}
            {!! HTML::link('http://xkcd.com/936/') !!}


<div id="password_input">
    @if(count($errors) > 0)
        @foreach ($errors->all() as $error)
            <div class="alert alert-danger alert-dismissible fade in" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            {{ $error }}
            </div>
        @endforeach
    @endif

    <h1> Fury Road-style Password Generator </h1>
    <div id="password_color_bar"></div>

    <form method="POST" action="password">

        <input name="_token" type="hidden" value="{!! csrf_token() !!}" />

        <h3> How many words? </h3>
        <button type="submit" class="btn btn-default number_choice" value="2" name="num_words">2</button>
        <button type="submit" class="btn btn-default number_choice" value="3" name="num_words">3</button>
        <button type="submit" class="btn btn-default number_choice" value="4" name="num_words">4</button>
        <button type="submit" class="btn btn-default number_choice" value="5" name="num_words">5</button>
        <button type="submit" class="btn btn-default memorable_choice" value="movie_line" name="num_words">Gimme a line</button>
        <a href="/furiosaPassword" class="btn btn-default memorable_choice">go home</a>



    </form>
</div> <!-- close password input -->



<div id="password_output">
    <div id="password">

    	@if(isset($password))
            <p>{{$password}}</p>
        @endif

    </div>



</div> <!-- close password output -->



</main>



<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>


</body>
</html>
