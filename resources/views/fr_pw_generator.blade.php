<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <!-- Yield the title if it exists, otherwise default to 'Developers Toolbox' -->
    <title>@yield('title','Furiosa\'s Toolbox')</title>

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
<body id="furiosa">

	@if(Session::get('flash_message'))
		<div class='flash-message'>{{ Session::get('flash_message') }}</div>
	@endif

    <main>
        <div class="section group">
            <div class="col span_3_of_8" style="margin-top:0;">
                <img id="micaelas_furiosa" src="img/micaelas_furiosa.jpg" alt="illo of imperator furiosa by Micaela Dawn" />
            </div>
            <div class="col span_5_of_8">

                <div id="fr_password_input">
                    <!-- @if(count($errors) > 0)
                        @foreach ($errors->all() as $error)
                            <div class="alert alert-danger alert-dismissible fade in" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            {{ $error }}
                            </div>
                        @endforeach
                    @endif -->

                    <img id="mm_pic" src="img/madMax.png" />
                    <img id="fr_pic" src="img/furyRoad.png" />

                    <h1>PASSWORD GENERATOR</h1>

                    <div id="password_color_bar"></div>

                    <form method="POST" action="furiosaPassword">

                        <input name="_token" type="hidden" value="{!! csrf_token() !!}" />

                        <h3>OPTIONS</h3>
                        <div class="radiobutton">
                            <h4> Choose a separator</h4>
                            <div class="radio_grp">
                                <input type="radio" name="separator" value="space" <?php echo $formdata['separator_space']; ?>> Space<br>
                                <input type="radio" name="separator" value="none" <?php echo $formdata['separator_none']; ?>> None<br>
                            </div>
                            <div class="radio_grp">
                                <input type="radio" name="separator" value="-" <?php echo $formdata['separator_dash']; ?>> Dash<br>
                                <input type="radio" name="separator" value="." <?php echo $formdata['separator_dot']; ?>> Dot<br>
                            </div>
                        </div>
                        <div class="checkbox">
                            <h4>Rev it up?</h4>
                            <label>
                                <input type="checkbox" name="rev_it_up" <?php echo $formdata['rev_yes']; ?>>By my deeds I honor him<br>
                            </label>
                        </div>

                        <h3 style="clear:both; padding-top:20px;"> HOW MANY WORDS? </h3>
                        <button type="submit" class="fr_btn number_choice" value="2" name="num_words">2</button>
                        <button type="submit" class="fr_btn number_choice" value="3" name="num_words">3</button>
                        <button type="submit" class="fr_btn number_choice" value="4" name="num_words">4</button>
                        <button type="submit" class="fr_btn number_choice" value="5" name="num_words">5</button>
                        <button type="submit" class="fr_btn memorable_choice" value="movie_line" name="num_words">THUNDER UP</button>

                    </form>
                </div> <!-- close password input -->



                <div id="fr_password_output">
                    <div id="password">

                    	@if(isset($password))
                            <p>{{$password}}</p>
                        @endif
                    </div>

                </div> <!-- close password output -->
            </div> <!-- Close col -->
        </div> <!-- Close section group -->
        <div class="section group">
            <div class="col span_1_of_2">
                <div id="art_credit">
                    Artwork by the fantastic <a href="http://www.micaeladawn.com/">Micaela Dawn</a>. Buy the Furiosa print <a href="https://www.inprnt.com/gallery/micaela_dawn/imperator-furiosa/">here!</a>
                </div>
            </div>
            <div class="col span_1_of_2">
                <a id="back_link" href="/password">Back to the green place</a>
            </div>
        </div>
    </main>



    <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>


</body>
</html>
