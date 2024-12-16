<div>
    <div class="row mb-5">
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex align-items-center mb-2">
                        <div class="avatar me-4">
                            <span class="avatar-initial bg-label-primary rounded"><i class="bx bx-user bx-lg"></i></span>
                        </div>
                        <h4 class="mb-0">{{ $count['users'] }}</h4>
                    </div>
                    <p class="mb-0">Pengguna</p>
                    <p class="mb-0">
                        <small class="text-muted">Jumlah keseluruhan pengguna aplikasi</small>
                    </p>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex align-items-center mb-2">
                        <div class="avatar me-4">
                            <span class="avatar-initial bg-label-primary rounded"><i
                                    class="bx bx-clipboard bx-lg"></i></span>
                        </div>
                        <h4 class="mb-0">{{ $count['questionnaires'] }}</h4>
                    </div>
                    <p class="mb-0">Kuesioner</p>
                    <p class="mb-0">
                        <small class="text-muted">Jumlah kuesioner yang telah dibuat</small>
                    </p>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex align-items-center mb-2">
                        <div class="avatar me-4">
                            <span class="avatar-initial bg-label-success rounded"><i
                                    class="bx bx-list-check bx-lg"></i></span>
                        </div>
                        <h4 class="mb-0">{{ $count['answers'] }}</h4>
                    </div>
                    <p class="mb-0">Jawaban</p>
                    <p class="mb-0">
                        <small class="text-muted">Jumlah kuesioner yang telah terjawab</small>
                    </p>
                </div>
            </div>
        </div>
    </div>

    <h5 class="ms-3"><strong>Laporan Kuesioner</strong></h5>

    <div class="row">
        @foreach ($reports as $report)
            <div class="col-md-12">
                <div class="card mb-5">
                    <div class="card-header">
                        <p class="card-title">{{ $report['data']->title }}</p>

                        <small class="text-muted mb-3">
                            <div>
                                <i class="bx bx-store me-2"></i>

                                {{ $report['data']->shop_name }}
                            </div>
                        </small>
                    </div>

                    <div class="card-body">
                        <div id="chart-{{ $report['data']->id }}"></div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
