@extends('layout.navbar')
@section('content')
    <div class="container p-5">
        <div class="h2 text-center pb-3">Pilih UMKM Untuk Menjawab Kuesioner</div>
        <div class="row mb-5">
            <div class="col-md-6 col-lg-4 mb-3">
              <div class="card h-100">
                <img class="card-img-top" src="../assets/img/elements/2.jpg" alt="Card image cap">
                <div class="card-body">
                  <h5 class="card-title">UMKM 1</h5>
                  <p class="card-text">
                    Some quick example text to build on the card title and make up the bulk of the card's content.
                  </p>
                  <a href="{{route('kuesioner.create')}}" class="btn btn-outline-primary">Jawab Kuesioner</a>
                </div>
              </div>
            </div>
            <div class="col-md-6 col-lg-4 mb-3">
                <div class="card h-100">
                    <img class="card-img-top" src="../assets/img/elements/2.jpg" alt="Card image cap">
                    <div class="card-body">
                      <h5 class="card-title">UMKM 2</h5>
                      <p class="card-text">
                        Some quick example text to build on the card title and make up the bulk of the card's content.
                      </p>
                      <a href="{{route('kuesioner.create')}}" class="btn btn-outline-primary">Jawab Kuesioner</a>
                    </div>
                  </div>
            </div>
            <div class="col-md-6 col-lg-4 mb-3">
                <div class="card h-100">
                    <img class="card-img-top" src="../assets/img/elements/2.jpg" alt="Card image cap">
                    <div class="card-body">
                      <h5 class="card-title">UMKM 3</h5>
                      <p class="card-text">
                        Some quick example text to build on the card title and make up the bulk of the card's content.
                      </p>
                      <a href="{{route('kuesioner.create')}}" class="btn btn-outline-primary">Jawab Kuesioner</a>
                    </div>
                  </div>
            </div>
          </div>
    </div>    
@endsection