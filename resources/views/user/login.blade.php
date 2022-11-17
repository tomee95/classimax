<x-layout>
    <section class="login py-5 border-top-1">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-5 col-md-8 align-item-center">
                    <div class="border">
                        <h3 class="bg-gray p-4">Login Now</h3>
                        <form action="{{ url('/users/login') }}" method="POST">
                            @csrf
                            <fieldset class="p-4">
                                <input name="email" class="form-control mb-3" type="text" placeholder="Email" required value="{{ old('email') }}">
                                @error('email')
                                <p class="p-1 bg-danger text-white">{{ $message }}</p>
                                @enderror
                                <input name="password" class="form-control mb-3" type="password" placeholder="Password" required>
                                <div class="loggedin-forgot">
                                    <input name="kepp_me_logged_in" type="checkbox" id="keep-me-logged-in">
                                    <label for="keep-me-logged-in" class="pt-3 pb-2">Keep me logged in</label>
                                </div>
                                <button type="submit" class="btn btn-primary font-weight-bold mt-3">Log in</button>
                                <a class="mt-3 d-block text-primary" href="#">Forget Password?</a>
                                <a class="mt-3 d-inline-block text-primary" href="{{ url('/register') }}">Register Now</a>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-layout>