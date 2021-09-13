@extends('app')

@section('content')
    <main class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-5">
                <div class="card">
                    <h2 class="card-header text-center">Signin</h2>
                    <div class="card-body">
                        <form method="post" action="{{route('signin.custom') }}">
                            @csrf
                            <div class="form-group mb-3">
                                <input type="text" name="email" placeholder="Email" id="email-address" class="form-control">
                                @if($errors->has('email'))
                                    <span class="text-danger">{{$errors->first('email')}}</span>
                                    @endif
                            </div>
                            <div class="form-group mb-3">
                                <input type="password" name="password" placeholder="Password" id="password" class="form-control" required>
                                @if($errors->has('password'))
                                    <span class="text-danger">{{($errors->first('password'))}}</span>
                                @endif
                            </div>
                            <div class="form-group mb-3">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember">Remember Me
                                    </label>
                                </div>
                            </div>
                            <div class="d-grid mx-auto">
                                <button type="submit" class="btn btn-success">Login</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>
