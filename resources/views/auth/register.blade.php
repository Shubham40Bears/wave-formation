<x-nonauth-layout>
<section id="checkout" class="py-5 my-5">
    <div class="container">
        <div class="row">
            <div class="col-12 header-sec">
                <p class="heading m-0">Register</p>
            </div>
            <div class="col-lg-12">
                <form method="POST" action="{{ route('register') }}">
                    @csrf
                    <input type="hidden" name="recaptcha_token" id="recaptcha_token">
                    <div class=" myt-5 form-group">
                        <input type="text" class="form-control" id="name" name="name" placeholder=" " value="" required>
                        <label for="firstName">Name</label>
                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                    </div>

                    <!-- Email Address -->
                    <div class=" myt-5 form-group">
                        <input type="text" class="form-control" id="email" name="email" placeholder=" " value="" required>
                        <label for="firstName">Email</label>
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>

                    <!-- Password -->
                    <div class="mt-4">
                        <div class=" myt-5 form-group">
                            <input required autocomplete="new-password" type="text" class="form-control" id="password" name="password" placeholder=" " value="" required>
                            <label for="firstName">Password</label>
                            <x-input-error :messages="$errors->get('password')" class="mt-2" />
                        </div>
                    </div>

                    <!-- Confirm Password -->
                    <div class="mt-4">
                        <div class="mt-4">
                            <div class=" myt-5 form-group">
                                <input required autocomplete="new-password" type="text" class="form-control" id="password_confirmation" name="password_confirmation" placeholder=" " value="" required>
                                <label for="firstName">Confirm Password</label>
                                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                            </div>
                        </div>
                    </div>
                    @if ($errors->has('recaptcha'))
                        <div class="mt-2 text-red-600">
                            {{ $errors->first('recaptcha') }}
                        </div>
                    @endif
                    <div class="flex items-center justify-end mt-4">
                        <x-primary-button class="ms-4 btn-tcw">
                            {{ __('Register') }}
                        </x-primary-button>
                        <a class="underline mt-4" href="{{ route('login') }}">
                            {{ __('Already registered?') }}
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
    @push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function () {
        grecaptcha.ready(function () {
            grecaptcha.execute('{{env("RECAPTCHA_SITE_KEY")}}', { action: 'register' }).then(function (token) {
                document.getElementById('recaptcha_token').value = token;
            });
        });
    });
    </script>
    @endpush
</x-nonauth-layout>
