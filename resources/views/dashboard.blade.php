@extends('layout.navbar')
@section('content')
    <div class="container p-5">
        <div class="row">
            <!-- Vertical Scrollbar -->
            <div class="col-md-6 col-sm-12">
                <div class="card mb-3">
                    <div class="card-body">
                      <h5 class="card-title">Jumlah Akun</h5>
                      <p class="card-text">Total Data Akun Pengguna Yang Sudah Ada Sebanyak :</p>
                      <a href="#" class="btn btn-success">100</a>
                    </div>
                </div>
            </div>

            <!-- Horizontal Scrollbar -->
            <div class="col-md-6 col-sm-12">
                <div class="card mb-3">
                    <div class="card-body">
                      <h5 class="card-title">Kuesioner</h5>
                      <p class="card-text">Kuesioner Yang Telah Terjawab Sebanyak :</p>
                      <a href="#" class="btn btn-primary">86</a>
                    </div>
                </div>
            </div>
            <!--/ Horizontal Scrollbar -->

            <!-- Vertical & Horizontal Scrollbars -->
            <div class="col-6">
              @include('grafik')
            </div>
            
            <div class="col-6">
              @include('grafik')
            </div>
            <!--/ Vertical & Horizontal Scrollbars -->
          </div>
    </div>
@endsection