<x-nonauth-layout>
<section id="checkout" class="py-5 my-5">
    <div class="container">
        <div class="row">
            <div class="col-12 header-sec">
                <p class="heading m-0">Register</p>
            </div>
            <div class="col-lg-12">
                <div class="mb-4 text-sm text-gray-600 dark:text-gray-400">
                    {{ __('Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just emailed to you? If you didn\'t receive the email, we will gladly send you another.') }}
                </div>

                @if (session('status') == 'verification-link-sent')
                    <div class="mb-4 font-medium text-sm text-green-600 dark:text-green-400 text-success">
                        {{ __('A new verification link has been sent to the email address you provided during registration.') }}
                    </div>
                @endif

                <div class="mt-4 flex items-center justify-between">
                    <form method="POST" action="{{ route('verification.send') }}">
                        @csrf

                        <div>
                            <x-primary-button class="ms-4 mb-2 btn-tcw">
                                {{ __('Resend Verification Email') }}
                            </x-primary-button>
                        </div>
                    </form>

                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <x-primary-button class="ms-4 btn-tcw">
                            {{ __('Log Out') }}
                        </x-primary-button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</section>
</x-nonauth-layout>
