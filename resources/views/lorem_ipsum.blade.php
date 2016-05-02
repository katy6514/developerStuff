@extends('_master')

@section('content')

<div id="text_input">
    @if(count($errors) > 0)
        @foreach ($errors->all() as $error)
            <div class="alert alert-danger alert-dismissible fade in" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            {{ $error }}
            </div>
        @endforeach
    @endif

    <h1> Text Generator </h1>
    <div id="text_color_bar"></div>

    <form method="POST" action="loremIpsum">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">

        <h3> How many paragraphs? </h3>
        <button type="submit" class="btn btn-default number_choice" value="1" name="num_paragraphs">1</button>
        <button type="submit" class="btn btn-default number_choice" value="2" name="num_paragraphs">2</button>
        <button type="submit" class="btn btn-default number_choice" value="3" name="num_paragraphs">3</button>
        <button type="submit" class="btn btn-default number_choice" value="4" name="num_paragraphs">4</button>
        <button type="submit" class="btn btn-default number_choice" value="5" name="num_paragraphs">5</button>
        <button type="submit" class="btn btn-default number_choice" value="6" name="num_paragraphs">6</button>
        <button type="submit" class="btn btn-default number_choice" value="7" name="num_paragraphs">7</button>
        <button type="submit" class="btn btn-default number_choice" value="8" name="num_paragraphs">8</button>
        <button type="submit" class="btn btn-default number_choice" value="9" name="num_paragraphs">9</button>
        <button type="submit" class="btn btn-default number_choice" value="10" name="num_paragraphs">10</button>


    </form>
</div> <!-- close user input -->

<div id="text_output">

    @if(isset($paragraphs))
        <div class="paragraphs">
            @foreach($paragraphs as $paragraph)
                <p>{{ $paragraph }}</p>
            @endforeach
        </div>
    @endif

</div>

@stop
