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

        <h3>Preferred Encryption Type:</h3>
        <div class="encryption_choices">
            <input type="radio" name="encryption" value='pw_hash' checked> The system's password_hash() routine<br>
            <input type="radio" name="encryption" value='pw_bcrypt'> bcrypt<br>
            <input type="radio" name="encryption" value='pw_md5'> MD5<br>
            <input type="radio" name="encryption" value='pw_sha256'> SHA-256<br>
        </div>

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
                </div>
            </div>

            <div class="section group">
                <div class='col span_1_of_2'>
                    <h4>.htaccess</h4>
                    <div class="ht_files">
                        AuthType Basic<br>
                        AuthName "restricted area"<br>
                        AuthUserFile /path/to/the/directory/you/are/protecting/.htpasswd<br>
                        require valid-user<br>
                    </div>
                </div>

                <div class='col span_1_of_2'>
                    <h4>.htpasswd</h4>
                    <div class="ht_files">
                        <p>{{$ht_pair}}</p>
                    </div>
                    <p class="right_align">Add additional authorized username/password combos as new lines to this file</p>
                </div>
            </div>



        @endif

    </div>



</div> <!-- close htaccess_output -->





@stop
