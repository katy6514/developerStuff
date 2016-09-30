@extends('_master')

@section('content')


<div id="ht_input">
    @if(count($errors) > 0)
        @foreach ($errors->all() as $error)
            <div class="alert alert-danger alert-dismissible fade in" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            {{ $error }}
            </div>
        @endforeach
    @endif

    <h1> .htpasswd Generator </h1>
    <div id="htpassword_color_bar"></div>

    <form method="POST" action="htpassword">

        <input name="_token" type="hidden" value="{!! csrf_token() !!}" />

        <h3> Enter your desired credentials: </h3>

        <table>
            <tr>
                <td><label for="username">Username:</label></td>
                <td><input type="text" id="username" name="username" class="form-control" required></td>
            </tr>
            <tr>
                <td><label for="htpassword">Password:</label></td>
                <td><input type="password" id="htpassword" name="htpassword" class="form-control" required></td>
            </tr>
        </table>

        <button type="submit" class="btn btn-default  memorable_choice">Generate</button>


    </form>
</div> <!-- close ht_input -->



<div id="ht_output">

    	@if(isset($ht_pair))
            <div id="ht_result" class="section group">
                <div class="col span_2_of_2">
                    <p>{{$ht_pair}}</p>
                </div>
            </div>

            <div class="section group">
                <div class='col span_2_of_2'>
                    <h3>Drop these two files into the directory you wish to password-protect:</h3>

                    <h4>.htaccess</h4>
                    <div class="ht_files">
                        AuthType Basic<br>
                        AuthName "restricted area"<br>
                        AuthUserFile /path/to/the/directory/you/are/protecting/.htpasswd<br>
                        require valid-user<br>
                    </div>

                    <h4>.htpasswd</h4>
                    <div class="ht_files">
                        <p>{{$ht_pair}}</p>
                    </div>
                    <p class="right_align">Add additional authorized username/password combos as new lines to this file</p>
                    <p>Password generated with <code><a href="http://php.net/manual/en/function.crypt.php" target="_blank">bcrypt</a></code>. <a href="https://codahale.com/how-to-safely-store-a-password/" target="_blank">How To Safely Store A Password</a>.</p>
                </div>
            </div>



        @endif

    </div>



</div> <!-- close htaccess_output -->





@stop
