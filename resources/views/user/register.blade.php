<x-layout>
    <section class="login py-5 border-top-1">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-5 col-md-8 align-item-center">
                    <div class="border border">
                        <h3 class="bg-gray p-4">Register Now</h3>
                        <form action="{{ url('/users/register') }}" method="POST">
                            @csrf
                            <fieldset class="p-4">
                                <input name="email" class="form-control mb-3" type="email" placeholder="Email*" required value="{{ old('email') }}">
                                @error('email')
                                    <p class="p-1 bg-danger text-white">{{ $message }}</p>
                                @enderror
                                <input name="password" class="form-control mb-3" type="password" placeholder="Password*" required>
                                @error('password')
                                    <p class="p-1 bg-danger text-white">{{ $message }}</p>
                                @enderror
                                <input name="password_confirmation" class="form-control mb-3" type="password" placeholder="Confirm Password*" required>
                                @error('password_confirmation')
                                <p class="p-1 bg-danger text-white">{{ $message }}</p>
                                @enderror
                                <div class="loggedin-forgot d-inline-flex my-3">
                                    <input name="terms_and_conditions" type="checkbox" id="registering" class="mt-1">
                                    <label for="registering" class="px-2">By registering, you accept our <a class="text-primary font-weight-bold" href="../terms-condition.html">Terms & Conditions</a></label>
                                </div>
                                @error('terms_and_conditions')
                                <p class="p-1 bg-danger text-white">{{ $message }}</p>
                                @enderror
                                <button type="submit" class="btn btn-primary font-weight-bold mt-3">Register Now</button>
                                <a class="mt-3 d-inline-block text-primary" href="{{ url('/login') }}">Already have an account? Log In!</a>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-layout>