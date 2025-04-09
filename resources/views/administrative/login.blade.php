@extends('administrative.layouts.auth-master')
@section('page-css')
<style>
    .s-one {
        display: none !important;
    }

    @media (min-width: 768px) {
        .s-one {
            display: block !important;
        }
    }


    .password-form {
        position: relative;
    }

    .eye-btn {
        position: absolute;
        top: 37px;
        right: 10px;
        cursor: pointer;
    }
    .auth-page .auth-left-wrapper img {
        height: 100px;
        width: 300px;
    }
</style>

@endsection
@section('content')
<div class="row" style="height: 100vh;">
    <div class="col-md-4 col-12 d-flex justify-content-center align-items-center s-one">
        <div class="auth-left-wrapper d-flex justify-content-center align-items-center">
            <img src="{{ asset('frontend/img/icons/icon-1.png') }}">
        </div>
    </div>

    <div class="col-md-8 col-12 d-flex justify-content-center align-items-center" style="background: #2a3a4199;">
        <div class="auth-form-wrapper px-4 py-5 ">
            <a href="#" class="noble-ui-logo d-block mb-2 text-white">PIPRA <span> </span></a>
            <h5 class=" font-weight-normal mb-4 text-white">Welcome back! Log in to your account.</h5>
            <form class="forms-sample" method="post" action="{{route('login.post')}}">
                @csrf
                @if($errors->any())
                <p style="color: #e60980; font-weight: bold; text-align: center;"> {{$errors->first()}} </p>
                @endif
                <div class="form-group">
                    <label for="exampleInputEmail1" class="text-white">Email Address</label>
                    <input type="employee_id" class="form-control rounded-lg" id="email" name="email" placeholder="Email Address">
                </div>
                <div class="form-group password-form">
                    <label for="exampleInputPassword1" class="text-white">Password</label>
                    <input type="password" class="form-control rounded-lg" id="password" name="password" autocomplete="current-password" placeholder="Password">
                    <svg id="show-password" data-id="0" class="eye-btn" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" fill="#000000" version="1.1" id="Capa_1" width="20px" height="20px" viewBox="0 0 442.04 442.04" xml:space="preserve">
                        <g>
                            <g>
                                <path d="M221.02,341.304c-49.708,0-103.206-19.44-154.71-56.22C27.808,257.59,4.044,230.351,3.051,229.203    c-4.068-4.697-4.068-11.669,0-16.367c0.993-1.146,24.756-28.387,63.259-55.881c51.505-36.777,105.003-56.219,154.71-56.219    c49.708,0,103.207,19.441,154.71,56.219c38.502,27.494,62.266,54.734,63.259,55.881c4.068,4.697,4.068,11.669,0,16.367    c-0.993,1.146-24.756,28.387-63.259,55.881C324.227,321.863,270.729,341.304,221.02,341.304z M29.638,221.021    c9.61,9.799,27.747,27.03,51.694,44.071c32.83,23.361,83.714,51.212,139.688,51.212s106.859-27.851,139.688-51.212    c23.944-17.038,42.082-34.271,51.694-44.071c-9.609-9.799-27.747-27.03-51.694-44.071    c-32.829-23.362-83.714-51.212-139.688-51.212s-106.858,27.85-139.688,51.212C57.388,193.988,39.25,211.219,29.638,221.021z" />
                            </g>
                            <g>
                                <path d="M221.02,298.521c-42.734,0-77.5-34.767-77.5-77.5c0-42.733,34.766-77.5,77.5-77.5c18.794,0,36.924,6.814,51.048,19.188    c5.193,4.549,5.715,12.446,1.166,17.639c-4.549,5.193-12.447,5.714-17.639,1.166c-9.564-8.379-21.844-12.993-34.576-12.993    c-28.949,0-52.5,23.552-52.5,52.5s23.551,52.5,52.5,52.5c28.95,0,52.5-23.552,52.5-52.5c0-6.903,5.597-12.5,12.5-12.5    s12.5,5.597,12.5,12.5C298.521,263.754,263.754,298.521,221.02,298.521z" />
                            </g>
                            <g>
                                <path d="M221.02,246.021c-13.785,0-25-11.215-25-25s11.215-25,25-25c13.786,0,25,11.215,25,25S234.806,246.021,221.02,246.021z" />
                            </g>
                        </g>
                    </svg>
                </div>
                <div class="form-check form-check-flat form-check-primary">
                    <!--<label class="form-check-label text-white">-->
                    <!--    <input type="checkbox" class="form-check-input">-->
                    <!--    Remember me-->
                    <!--</label>-->
                </div>
                <div class="mt-3">
                    <button type="submit" class="btn btn-danger btn-icon-text mb-md-0 px-4 py-2">
                        Login
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
@section('page-js')
<script>
    $("#show-password").click(function() {
        var status = $(this).attr('data-id');
        if (status == 0) {
            $('#password').attr('type', 'text');
            var status = $(this).attr('data-id', 1);
        }
        if (status == 1) {
            $('#password').attr('type', 'password');
            var status = $(this).attr('data-id', 0);
        }
    });
</script>
@endsection