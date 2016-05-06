@extends('_master')

@section('content')


<div id="password_input">
    @if(count($errors) > 0)
        @foreach ($errors->all() as $error)
            <div class="alert alert-danger alert-dismissible fade in" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            {{ $error }}
            </div>
        @endforeach
    @endif

    <h1> XKCD Password Generator </h1>
    <div id="password_color_bar"></div>

    <form method="POST" action="password">

        <input name="_token" type="hidden" value="{!! csrf_token() !!}" />

        <h3> Extra Features </h3>
        <div class="checkbox">
            <label>
                <input type="checkbox" <?php echo $formdata['number_yes']; ?> name="number"> Include a number
            </label>
        </div>

        <div class="checkbox">
            <label>
                <input type="checkbox" <?php echo $formdata['symbol_yes']; ?> name="symbol"> Include a symbol
            </label>
        </div>

        <h3> How many words? </h3>
        <button type="submit" class="btn btn-default number_choice" value="1" name="num_words">1</button>
        <button type="submit" class="btn btn-default number_choice" value="2" name="num_words">2</button>
        <button type="submit" class="btn btn-default number_choice" value="3" name="num_words">3</button>
        <button type="submit" class="btn btn-default number_choice" value="4" name="num_words">4</button>
        <button type="submit" class="btn btn-default memorable_choice" value="memorable" name="num_words">Grammatically correct 4</button>



    </form>
</div> <!-- close password input -->



<div id="password_output">
    <div id="password">

    	@if(isset($password))
            <p>{{$password}}</p>
        @endif

    </div>

    {!! HTML::image('img/password_strength.png') !!}

</div> <!-- close password output -->





@stop
