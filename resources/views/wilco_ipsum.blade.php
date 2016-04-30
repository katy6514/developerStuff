@extends('_master')
<!--
@section('wilco_ipsum') -->

<!-- add in text generator based on wilco songs -->

@section('title')
    Text Generator
@stop

@section('header')
    <h1>Text Generator Header</h1>
@stop

@section('navigation')
    <a href="/">Home</a>
    <a href="/users">User Generator</a>
@stop

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


			<form method="POST" action="wilcoIpsum">
		    <input type="hidden" name="_token" value="{{ csrf_token() }}">

		    <label for="num_paragraphs">Number of paragraphs (max 10)</label>
		    <input type="number" id="num_paragraphs" name="num_paragraphs" class="form-control" min="1" max="10" value="<?php echo $formdata['num_paragraphs']; ?>" required>


				<button type="submit" class="btn btn-default">Show me the text!</button>

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

</div> <!-- close user input -->
    <!-- @if (isset($name))
        <h2>Generated User: </h2>
				<p>Name: {{ $name }}</p>
    @else
        <h2>No book chosen bladdddeeee!</h2>
    @endif -->

@stop
