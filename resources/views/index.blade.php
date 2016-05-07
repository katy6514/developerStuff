@extends('_master')



@section('content')


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


@stop
