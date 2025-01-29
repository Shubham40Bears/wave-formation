<x-nonauth-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />
<!-- new ui -->
<section id="" class="py-5 my-5">
    <div class="container">
        <div class="row">
            <div class="col-12 header-sec">
                <p class="heading m-0">Welcome back</p>
                <p class="subheading">Enter your email and password to sign in</p>
            </div>
            <div class="col-lg-12">
              <form role="form" method="POST" action="{{ route('login') }}">
                @csrf
                <div class=" myt-5 form-group">
                    <input type="email" class="form-control" id="email" name="email" placeholder=" " value="" required>
                    <label for="firstName">Email</label>
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>
                <div class=" myt-5 form-group">
                    <input type="password" class="form-control" id="password" name="password" placeholder=" " value="" required>
                    <label for="firstName">Password</label>
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>
                <div class="form-check form-switch">
                  <input class="form-check-input" type="checkbox" id="rememberMe" checked="" name="remember" required>
                  <label class="form-check-label" for="rememberMe">Remember me</label>
                </div>
                <div class="text-center">
                  <button type="submit" class="btn bg-gradient-info w-100 mt-4 mb-0 btn-tcw-move">Sign in</button>
                </div>
              </form>
              @if (Route::has('password.request'))
                  <p class="text-sm mt-2 text-center mb-0"><a href="{{ route('password.request') }}" class="text-dark font-weight-bolder"> Forgot Password? </a>We got you covered</p>
              @endif
              <div class="text-center pt-0 px-lg-2 px-1 mt-2">
                <p class="mb-4 text-sm mx-auto">
                  Don't have an account?
                  <a href="{{ route('register') }}" class="text-dark font-weight-bolder">Sign up</a>
                </p>
              </div>
            </div>
        </div>
    </div>
</section>
<!-- new ui end -->
</x-nonauth-layout>

