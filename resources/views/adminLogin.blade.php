@extends('layouts.master')
@section('body')
    login
@endsection

@section('main-content')
 <div class="container sm:px-10">
    <div class="block xl:grid grid-cols-2 gap-4">
        <div class="hidden xl:flex flex-col min-h-screen">
            <a href="" class="-intro-x flex items-center pt-5">
            </a>
            <div class="my-auto">
                <img alt="" class="-intro-x w-1/2 -mt-16" src="{{asset('src/images/logo.png')}}" style="filter: drop-shadow(2px 4px 6px #fff);max-width: 400px;">
                <div class="-intro-x text-white font-medium text-4xl leading-tight mt-10">
                     A few more clicks to
                    <br>
                    sign in to your account.
                </div>
                <div class="-intro-x mt-5 text-lg text-white text-opacity-70 dark:text-gray-500">Manage all your e-commerce accounts in one place</div>
            </div>
        </div>
        <div class="h-screen xl:h-auto flex py-5 xl:py-0 my-10 xl:my-0">
            <form method="POST" action="#">
                  {{ csrf_field() }}
            <div class="my-auto mx-auto xl:ml-20 bg-white dark:bg-dark-1 xl:bg-transparent px-5 sm:px-8 py-8 xl:p-0 rounded-md shadow-md xl:shadow-none w-full sm:w-3/4 lg:w-2/4 xl:w-auto">
                <h2 class="intro-x font-bold text-2xl xl:text-3xl text-center xl:text-left">
                    Sign In
                </h2>
                <div class="intro-x mt-2 text-gray-500 xl:hidden text-center">A few more clicks to sign in to your account. Manage all your e-commerce accounts in one place</div>
                <div class="intro-x mt-8">


                    <input id="email" type="email" class="intro-x login__input form-control py-3 px-4 border-gray-300 block" placeholder="Email" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                     @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror


                    <input type="password" type="password" class="intro-x login__input form-control py-3 px-4 border-gray-300 block mt-4 @error('password') is-invalid @enderror " placeholder="Password" name="password" required autocomplete="current-password">
                     @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                </div>
                <div class="intro-x flex text-gray-700 dark:text-gray-600 text-xs sm:text-sm mt-4">
                    <div class="flex items-center mr-auto">
                        <input id="remember-me" class="form-check-input border mr-2" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="cursor-pointer select-none" for="remember-me">
                                        {{ __('Remember Me') }}
                                    </label>
                    </div>
                    <a href="">Forgot Password?</a>
                </div>

                <div class="intro-x mt-5 xl:mt-8 text-center xl:text-left">
                    <button type="submit" class="btn btn-primary py-3 px-4 w-full xl:w-32 xl:mr-3 align-top">Login</button>
                </div>
                <div class="intro-x mt-10 xl:mt-24 text-gray-700 dark:text-gray-600 text-center xl:text-left">
                    By signin up, you agree to our
                    <br>
                    <a class="text-theme-1 dark:text-theme-10" href="">Terms and Conditions</a> & <a class="text-theme-1 dark:text-theme-10" href="">Privacy Policy</a>
                </div>
            </div>
            </form>
        </div>
        <!-- END: Login Form -->
    </div>
</div>
@endsection

@section('scripts')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
    $(document).ready(function() {
    $('form').on('submit', function(e) {
        e.preventDefault(); // Prevent the form from submitting

        let email = $('input[name="email"]').val();
        let password = $('input[name="password"]').val();

        if (email === '' || password === '') {
            alert('Please fill out all fields.');
            return; // Prevent submission if validation fails
        }

        // Send GET request with query parameters
        let queryString = $.param({ email: email, password: password });

        $.ajax({
            url: '{{ route('login.custom') }}?' + queryString,
            type: 'GET',
            success: function(response) {
                if (response.redirect_url) {
                    window.location.href = response.redirect_url;
                }
                console.log(response);
            },
            error: function(xhr) {
                let errorMessage = xhr.responseJSON && xhr.responseJSON.message ? xhr.responseJSON.message : 'An error occurred.';
                alert('An error occurred: ' + errorMessage);
                console.log(xhr.responseText);
            }
        });
    });
});

</script>

@endsection
