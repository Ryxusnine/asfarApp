<x-app-layout>
    <x-slot name="title">Beranda</x-slot>

    <div class="container p-5">
        <div class="card">
            <div class="d-flex align-items-start row">
                <div class="col-sm-7">
                    <div class="card-body">
                        <h5 class="card-title text-primary mb-3"><b>Halo, {{ auth()->user()->name }}</b></h5>

                        @if (auth()->user()->role == 'admin')
                            <p class="text-success">Anda login sebagai <b>Administrator</b></p>

                            <p class="mb-6">
                                Selamat datang di aplikasi <b>Survey Kepuasan Pelanggan</b>. <br>

                                Anda dapat mengelola data kuisioner, membuat kuisioner, dan melihat laporan.
                            </p>
                        @else
                            <p class="mb-6">
                                Selamat datang di aplikasi <b>Survey Kepuasan Pelanggan</b>. <br>
                                Silakan jawab kuisioner untuk memberikan penilaian terhadap layanan kami.
                            </p>

                            <a
                                class="btn btn-primary"
                                href="{{ route('questionnaire.index') }}"
                            >
                                <i class="bx bx-book me-3"></i>
                                Jawab Kuisioner
                            </a>
                        @endif
                    </div>
                </div>
                <div class="col-sm-5 text-sm-left text-center">
                    <div class="card-body px-md-6 px-0 pb-0">
                        <img
                            class="scaleX-n1-rtl"
                            src="{{ asset('templates/sneat/img/man-with-laptop.png') }}"
                            alt="View Badge User"
                            height="175"
                        >
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
