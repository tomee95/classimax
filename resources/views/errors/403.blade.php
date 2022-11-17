<x-layout>
    <section class="section bg-gray">
        <div class="container">
            <div class="row">
                <div class="col-md-6 text-center mx-auto">
                    <div class="404-img">
                        <h1 class="font-weight-bold font-150">403</h1>
                    </div>
                    <div class="404-content">
                        <h1 class="display-1 pt-1 pb-2">Oops</h1>
                        <p class="px-3 pb-2 text-dark">This seems an unauthorized action. Please return to the homepage.
                        <a href="{{ url('/') }}" class="btn btn-info">GO HOME</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-layout>