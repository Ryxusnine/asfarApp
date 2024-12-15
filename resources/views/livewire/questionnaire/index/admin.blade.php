<div>
    <div class="card mt-5">
        <h6 class="card-header">Daftar kuisioner</h6>

        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>UMKM</th>
                        <th>Judul</th>
                        <th>Aksi</th>
                    </tr>
                </thead>

                <tbody class="table-border-bottom-0">
                    @forelse ($questionnaires as $questionnaire)
                        <tr>
                            <td class="align-top">{{ $loop->iteration }}</td>
                            <td class="align-top">
                                <b>{{ $questionnaire->shop_name }}</b>
                                <br>
                                <small class="text-muted">{{ $questionnaire->address }}</small>
                            </td>
                            <td class="align-top">
                                <b>{{ $questionnaire->title }}</b>
                                <br>
                                <small class="text-muted">{{ $questionnaire->description }}</small>
                            </td>
                            <td class="align-top">
                                <div class="dropdown">
                                    <button
                                        class="btn dropdown-toggle hide-arrow p-0"
                                        data-bs-toggle="dropdown"
                                        type="button"
                                        aria-expanded="false"
                                    >
                                        <i class="bx bx-dots-vertical-rounded"></i>
                                    </button>

                                    <div
                                        class="dropdown-menu"
                                        style=""
                                    >
                                        <a
                                            class="dropdown-item"
                                            href="{{ route('questionnaire.edit', $questionnaire->id) }}"
                                        ><i class="bx bx-edit-alt me-2"></i> Sunting</a>
                                        <button
                                            class="dropdown-item text-danger"
                                            type="button"
                                            wire:click="delete({{ $questionnaire->id }})"
                                        ><i class="bx bx-trash me-2"></i> Hapus</button>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td
                                class="text-center"
                                colspan="4"
                            >Data tidak ditemukan</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
