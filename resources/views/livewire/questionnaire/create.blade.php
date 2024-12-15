<div class="container">
    <a
        class="btn btn-secondary"
        href="{{ route('questionnaire.index') }}"
    >
        <i class="bx bx-arrow-back me-3"></i>
        Kembali
    </a>

    <x-alert />

    <form
        class="card mt-5"
        wire:submit.prevent="save"
    >
        <div class="card-body">
            <div class="mb-5">
                <label
                    class="form-label"
                    for="namaUmkm"
                >UMKM</label>
                <input
                    class="form-control @error('namaUmkm') is-invalid @enderror"
                    id="namaUmkm"
                    name="namaUmkm"
                    type="text"
                    placeholder="masukkan nama UMKM..."
                    autofocus
                    wire:model="namaUmkm"
                />
                @error('namaUmkm')
                    <div class="invalid-feedback"> {{ $message }} </div>
                @enderror
            </div>

            <div class="mb-5">
                <label
                    class="form-label"
                    for="judul"
                >Judul</label>
                <input
                    class="form-control @error('judul') is-invalid @enderror"
                    id="judul"
                    name="judul"
                    type="text"
                    placeholder="masukkan judul..."
                    wire:model="judul"
                />
                @error('judul')
                    <div class="invalid-feedback"> {{ $message }} </div>
                @enderror
            </div>

            <div class="mb-5">
                <label
                    class="form-label"
                    for="deskripsi"
                >Deskripsi</label>
                <textarea
                    class="form-control @error('deskripsi') is-invalid @enderror"
                    id="deskripsi"
                    name="deskripsi"
                    placeholder="masukkan deskripsi..."
                    wire:model="deskripsi"
                ></textarea>
                @error('deskripsi')
                    <div class="invalid-feedback"> {{ $message }} </div>
                @enderror
            </div>

            <div class="mb-5">
                <label
                    class="form-label"
                    for="alamat"
                >Alamat</label>
                <input
                    class="form-control @error('alamat') is-invalid @enderror"
                    id="alamat"
                    name="alamat"
                    type="text"
                    placeholder="masukkan alamat..."
                    wire:model="alamat"
                />
                @error('alamat')
                    <div class="invalid-feedback"> {{ $message }} </div>
                @enderror
            </div>

            <div class="mb-5">
                <label
                    class="form-label"
                    for="gambar"
                >Gambar</label>
                <input
                    class="form-control @error('gambar') is-invalid @enderror"
                    id="gambar"
                    name="gambar"
                    type="file"
                    wire:model="gambar"
                />
                @error('gambar')
                    <div class="invalid-feedback"> {{ $message }} </div>
                @enderror
            </div>
        </div>

        <div class="card-body">
            <button
                class="btn btn-sm btn-success"
                type="button"
                wire:click="addQuestion"
            >Tambah Pertanyaan</button>

            <div class="card bg-lighter my-3 shadow-none">
                @foreach ($pertanyaan as $key => $item)
                    <div class="card-body {{ !$loop->last ? 'pb-0' : '' }}">
                        <div class="card card-body bg-white shadow-none">
                            <div class="row">
                                <div class="col-1">
                                    <input
                                        class="form-control"
                                        id="pertanyaan.{{ $key }}.urutan"
                                        name="pertanyaan.{{ $key }}.urutan"
                                        type="number"
                                        wire:model="pertanyaan.{{ $key }}.urutan"
                                    />
                                </div>

                                <div class="col">
                                    <div class="mb-3">
                                        <textarea
                                            class="form-control @error('pertanyaan.{{ $key }}.pertanyaan') is-invalid @enderror"
                                            id="pertanyaan.{{ $key }}.pertanyaan"
                                            name="pertanyaan.{{ $key }}.pertanyaan"
                                            type="text"
                                            wire:model="pertanyaan.{{ $key }}.pertanyaan"
                                            placeholder="masukkan pertanyaan..."
                                            rows="3"
                                        ></textarea>

                                        @error('pertanyaan.{{ $key }}.pertanyaan')
                                            <div class="invalid-feedback"> {{ $message }} </div>
                                        @enderror
                                    </div>

                                    <div x-data="{ denganGambar: false }">
                                        <div class="mb-3">
                                            <input
                                                class="form-check-input"
                                                id="pertanyaan.{{ $key }}.denganGambar"
                                                type="checkbox"
                                                x-model="denganGambar"
                                            />

                                            <label
                                                class="form-check-label"
                                                for="pertanyaan.{{ $key }}.denganGambar"
                                            >Tambahkan Gambar?</label>
                                        </div>

                                        <template x-if="denganGambar">
                                            <input
                                                class="form-control @error('pertanyaan.{{ $key }}.gambar') is-invalid @enderror w-50"
                                                id="pertanyaan.{{ $key }}.gambar"
                                                name="pertanyaan.{{ $key }}.gambar"
                                                type="file"
                                                wire:model="pertanyaan.{{ $key }}.gambar"
                                            />
                                        </template>
                                    </div>
                                </div>

                                <div class="col-1">
                                    <button
                                        class="btn btn-sm btn-danger"
                                        type="button"
                                        wire:click="removeQuestion({{ $key }})"
                                    >
                                        <i class="bx bx-trash"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        <div class="card-footer">
            <button
                class="btn btn-primary"
                type="submit"
            >Simpan</button>
        </div>
    </form>
</div>
