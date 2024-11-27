@extends('layout.navbar')
@section('content')
    <div class="container p-5 bg-white m-5 mx-auto rounded">
        <form action="">
            <p class="h4">Kuesioner</p>
            <div class="form-check m-3">
                <input name="default-radio-1" class="form-check-input" type="radio" value="" id="defaultRadio1" checked="">
                <label class="form-check-label" for="defaultRadio1">Sangat Suka</label>
            </div>
            <div class="form-check m-3">
                <input name="default-radio-2" class="form-check-input" type="radio" value="" id="defaultRadio2">
                <label class="form-check-label" for="defaultRadio2">Suka</label>
            </div>
            <div class="form-check m-3">
                <input name="default-radio-3" class="form-check-input" type="radio" value="" id="defaultRadio3">
                <label class="form-check-label" for="defaultRadio3">Netral</label>
            </div>
            <div class="form-check m-3">
                <input name="default-radio-4" class="form-check-input" type="radio" value="" id="defaultRadio4">
                <label class="form-check-label" for="defaultRadio4">Tidak Suka</label>
            </div>
            <div class="form-check m-3">
                <input name="default-radio-5" class="form-check-input" type="radio" value="" id="defaultRadio5">
                <label class="form-check-label" for="defaultRadio5">Sangat Tidak Suka</label>
            </div>
            <button type="submit" class="btn btn-success">Simpan Jawaban</button>
        </form>
    </div>
@endsection