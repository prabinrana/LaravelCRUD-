@extends('app')

@section('content')
    <main class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-4">

                <div class="card">
                    <h1 class=""card-header text-center>Signup</h1>
                    <div class="card-body">
                        <form method="post"  action="{{route('user.registration')}}">
                            @csrf
                            <div class="form-group mb-3">
                                <input type="text " name="name" placeholder="Name" id="name" class="form-control">
                                @if ($errors->has('name'))
                                    <span class="text-danger">{{$errors->first('name')}}</span>
                                    @endif
                            </div>
                            <div class="form-group mb-3">
                                <input type="text" name="email" placeholder="Email" id="email-address" class="form-control">
                                    @if($errors->has('email'))
                                        <span class="text-danger">{{$errors->first('email')}}</span>
                                        @endif
                            </div>
                            <div class="form-group mb-3">
                                <input type="password" name="password" placeholder="Password" class="form-control">
                                @if($errors->has('password'))
                                    <span class="text-danger">{{$errors->first('password')}}</span>
                                    @endif
                            </div>

                            <div class="d-grid mx-auto">
                                <button type="submit" class="btn btn-primary btn-block">Register</button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>


    <main class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-md-3">
                <a>Already have an account?</a>
    <button id="myButton" class="float-left submit-button" >Login</button>
    <script type="text/javascript">
        document.getElementById("myButton").onclick = function () {
            location.href = "login";
        };
    </script>
            </div>
        </div>
    </main>
@endsection
