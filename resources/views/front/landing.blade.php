@extends('layouts.front')

@section('content')
    <section id="about" class="about section mt-5 mt-5" style="margin-top: 150px;">


        <div class="logo-slider" data-v-4ef8651c="">

            <div class="logos-slide" data-v-4ef8651c="">

                <img src="https://picsum.photos/200/300" alt="logo" data-v-4ef8651c="">

                <img src="https://picsum.photos/200/300" alt="logo" data-v-4ef8651c="">

                <img src="https://picsum.photos/200/300" alt="logo" data-v-4ef8651c="">

                <img src="https://picsum.photos/200/300" alt="logo" data-v-4ef8651c="">

                <img src="https://picsum.photos/200/300" alt="logo" data-v-4ef8651c="">

                <img src="https://picsum.photos/200/300" alt="logo" data-v-4ef8651c="">

                <img src="https://picsum.photos/200/300" alt="logo" data-v-4ef8651c="">

                <img src="https://picsum.photos/200/300" alt="logo" data-v-4ef8651c="">

                <img src="https://picsum.photos/200/300" alt="logo" data-v-4ef8651c="">

                <img src="https://picsum.photos/200/300" alt="logo" data-v-4ef8651c="">

                <img src="https://picsum.photos/200/300" alt="logo" data-v-4ef8651c="">

                <img src="https://picsum.photos/200/300" alt="logo" data-v-4ef8651c="">

                <img src="https://picsum.photos/200/300" alt="logo" data-v-4ef8651c="">

                <img src="https://picsum.photos/200/300" alt="logo" data-v-4ef8651c="">

                <img src="https://picsum.photos/200/300" alt="logo" data-v-4ef8651c="">

            </div>
        </div>
    </section>

    <!-- Values Section -->
    <section id="values" class="values section">


        <div class="container">

            <div class="row gy-4 justify-content-center">

                <div class="col-lg-6" data-aos="fade-up" data-aos-delay="100">
                    <div class="card">
                        <img src="{{ asset('front-assets/img/values-1.png') }}" class="img-fluid" alt="">
                        <h3>Ad cupiditate sed est odio</h3>
                        <p>Eum ad dolor et. Autem aut fugiat debitis voluptatem consequuntur sit. Et veritatis id.</p>
                    </div>
                </div><!-- End Card Item -->


            </div>

        </div>

    </section><!-- /Values Section -->


@endsection

@push('scripts')

<script>
    var copy = document.querySelector(".logos-slide").cloneNode(true);
    document.querySelector(".logo-slider").appendChild(copy);
</script>
@endpush
