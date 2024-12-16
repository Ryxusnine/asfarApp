<div>
    <div class="container p-5">
        <div class="card mb-5">
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

        @if (auth()->user()->role == 'admin')
            <livewire:dashboard.admin lazy />
        @endif
    </div>

    @push('scripts.page')
        <script src="{{ asset('templates/sneat/vendor/libs/apex-charts/apexcharts.js') }}"></script>

        <script defer>
            document.addEventListener('DOMContentLoaded', function() {
                document.addEventListener('livewire:init', () => {
                    Livewire.on('load-charts', (data) => {
                        let reports = data[0]

                        for (let i in reports) {
                            let report = reports[i];

                            let options = {
                                series: [{
                                    name: 'Jawaban',
                                    data: report.series
                                }],
                                chart: {
                                    type: 'bar',
                                    height: 350
                                },
                                plotOptions: {
                                    bar: {
                                        horizontal: true,
                                        columnWidth: '20%',
                                        endingShape: 'rounded'
                                    },
                                },
                                dataLabels: {
                                    enabled: false
                                },
                                stroke: {
                                    show: true,
                                    width: 2,
                                    colors: ['transparent']
                                },
                                xaxis: {
                                    categories: report.categories,
                                    labels: {
                                        rotate: -90,
                                    }
                                },
                                yaxis: {
                                    title: {
                                        text: 'Jumlah'
                                    }
                                },
                                fill: {
                                    opacity: 1
                                },
                                tooltip: {
                                    y: {
                                        formatter: function(val) {
                                            return val + " jawaban"
                                        }
                                    }
                                }
                            };

                            setTimeout(() => {
                                let id = `#chart-${report.data.id}`;
                                let element = document.querySelector(id);
                                let chart = new ApexCharts(element, options);
                                chart.render();
                            }, 5000);
                        }
                    });
                });
            });
        </script>
    @endpush
</div>
