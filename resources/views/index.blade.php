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


  <!-- Font Awesome -->
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">
  <!-- Bootstrap -->
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet">
  <!-- Bootstrap Theme -->
  <link href="https://maxcdn.bootstrapcdn.com/bootswatch/3.3.5/lumen/bootstrap.min.css" rel="stylesheet">

</head>
<body>

    <div id="index_page">

        <div class='index_box' id='user_box'>
            <a class="tile" href='users'>
                <i class="fa fa-users fa-5x" aria-hidden="true"></i>
                <h2>User Generator</h2>
            </a>
        </div>

        <div class='index_box' id='text_box'>
            <a class="tile" href='loremIpsum'>
                <i class="fa fa-align-left fa-5x" aria-hidden="true"></i>
                <h2>Text Generator</h2>
            </a>
        </div>

        <div class='index_box' id='password_box'>
            <a class="tile" href='password'>
                <i class="fa fa-key fa-5x" aria-hidden="true"></i>
                <h2>Password Generator</h2>
            </a>
        </div>

        <div class='index_box' id='htaccess_box'>
            <a class="tile" href='htpassword'>
                <i class="fa fa-lock fa-5x" aria-hidden="true"></i>
                <h2>HTaccess Generator</h2>
            </a>
        </div>

    </div>
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

</body>
</html>
