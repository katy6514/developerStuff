@extends('_master')

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

    <h1> User Generator </h1>
    <div id="users_color_bar"></div>

    <form method="POST" action="users">

        <input name="_token" type="hidden" value="{!! csrf_token() !!}" />

        <h3> Extra Features </h3>
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

        <h3> How many users? </h3>
        <button type="submit" class="btn btn-default number_choice" value="1" name="num_users">1</button>
        <button type="submit" class="btn btn-default number_choice" value="2" name="num_users">2</button>
        <button type="submit" class="btn btn-default number_choice" value="3" name="num_users">3</button>
        <button type="submit" class="btn btn-default number_choice" value="4" name="num_users">4</button>
        <button type="submit" class="btn btn-default number_choice" value="5" name="num_users">5</button>
        <button type="submit" class="btn btn-default number_choice" value="6" name="num_users">6</button>
        <button type="submit" class="btn btn-default number_choice" value="7" name="num_users">7</button>
        <button type="submit" class="btn btn-default number_choice" value="8" name="num_users">8</button>
        <button type="submit" class="btn btn-default number_choice" value="9" name="num_users">9</button>
        <button type="submit" class="btn btn-default number_choice" value="10" name="num_users">10</button>

    </form>
</div> <!-- close user input -->

<div id="user_output">

	@if(isset($users))
		<div class="users">

        	@foreach($users as $user)
        		<div class="user">
    				@if(isset($user['photo']))
						<div class="userinfo-pic">
            				<div class="userpic">
    							<img class="userpic" src="{{ $user['photo']}}" alt="profile pic">
    						</div>
					@else
						<div class="userinfo-nopic">
    				@endif
			        		<p class="name">{{ $user['name'] }}</p>
                            <p class="username">{{ $user['username'] }}</p>
			        		<p class="email">{{ $user['email'] }}</p>

			        		@if(isset($user['streetaddress']))
			        			<p class="address">{{ $user['streetaddress'] }}<br>
			        			   {{ $user['city'] }}, {{$user['state'] }} {{ $user['postcode'] }}</p>
			        		@endif

			        		@if(isset($user['phone']))
			        			<p class="phone">{{ $user['phone']}}</p>
			        		@endif
			        	</div>
        		</div>
    		@endforeach
    	</div>
        <div id="get_results_buttons">
        	<p>Download results as:<br>
        		<a href="downloads/randomusers.json" class="btn btn-default" download>JSON</a>
        		<a href="downloads/randomusers.csv" class="btn btn-default" download>CSV</a>
        	</p>
        </div>
    @endif

</div> <!-- close user output -->
@stop
