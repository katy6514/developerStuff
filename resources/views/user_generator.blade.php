@extends('_master')

@section('title')
    User Generator
@stop


<!--
This `head` section will be yielded right before the closing </head> tag.
Use it to add specific things that *this* View needs in the head,
such as a page specific styesheets.
-->
<!-- @section('head')
    <link href="/css/books/show.css" type='text/css' rel='stylesheet'>
@stop -->

@section('header')
    <h1>User Generator Header</h1>
@stop

@section('navigation')
  <a href="/">Home</a>
  <a href="/loremIpsum">Text Generator</a>
@stop

@section('content')

<div id="user_input">
			@if(count($errors) > 0)
		    @foreach ($errors->all() as $error)
			    	<div class="alert alert-danger alert-dismissible fade in" role="alert">
  						<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  						{{ $error }}
  					</div>
				@endforeach
			@endif


			<form method="POST" action="users">

		    <input type="hidden" name="_token" value="{{ csrf_token() }}">

		    <label for="num_users">Number of users (max 10)</label>
		    <input type="number" id="num_users" name="num_users" class="form-control" min="1" max="10" value="<?php echo $formdata['num_users']; ?>" required>

				<div class="checkbox">
			    <label>
			      <input type="checkbox" <?php echo $formdata['address_yes']; ?> name="address"> Include a mailing address
			    </label>
			  </div>

		  	<div class="checkbox">
			    <label>
			      <input type="checkbox" <?php echo $formdata['phone_yes']; ?> name="phone"> Include a phone number
			    </label>
		  	</div>

		  	<div class="checkbox">
			    <label>
			      <input type="checkbox" <?php echo $formdata['photo_yes']; ?> name="photo"> Include a profile photo
			    </label>
		  	</div>

				<button type="submit" class="btn btn-default">Show me the users!</button>

			</form>
</div> <!-- close user input -->

<div id="user_output">

			@if(isset($users))
				<div class="users">
				<p>
					<!-- Download results as:
					<a href="downloads/randomusers.json" class="btn btn-default" download>JSON</a>
					<a href="downloads/randomusers.csv" class="btn btn-default" download>CSV</a> -->
				</p>
		        	@foreach($users as $user)
		        		<div class="user">
	        				@if(isset($user['photo']))
		        				<div class="profilepic">
									<img class="profilepic" src="{{ $user['photo']}}" alt="profile pic">
								</div>
								<div class="userinfo-pic">
							@else
								<div class="userinfo-nopic">
	        				@endif

					        		<p class="username">{{ $user['name'] }} <small>({{ $user['username'] }})</small></p>
					        		@if(isset($user['profile']))
					        			<p class="profile">{{ $user['profile']}}</p>
					        		@endif
					        		<p>{{ $user['email'] }}</p>
					        		@if(isset($user['birthday']))
					        			<p>{{ $user['birthday'] }}</p>
					        		@endif
					        		@if(isset($user['streetaddress']))
					        			<p>{{ $user['streetaddress'] }}<br>
					        			   {{ $user['city'] }}, {{$user['state'] }} {{ $user['postcode'] }}</p>
					        		@endif
					        		@if(isset($user['phone']))
					        			<p>{{ $user['phone']}}</p>
					        		@endif
					        	</div>
		        		</div>
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


<!--
This `body` section will be yielded right before the closing </body> tag.
Use it to add specific things that *this* View needs at the end of the body,
such as a page specific JavaScript files.
-->
@section('body')
    <script src="/js/books/show.js"></script>
@stop


@section('footer')
    <h5>Footer!</h5>
@stop
