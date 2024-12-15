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
        <div class="card-header">
            <h5><b>{{ $current->title }}</b></h5>

            <p>{{ $current->description }}</p>

            <div class="text-muted mb-3">
                <div>
                    <i class="bx bx-store me-2"></i>

                    {{ $current->shop_name }}
                </div>

                <div>
                    <i class="bx bx-clipboard me-2"></i>

                    {{ $current->questions->count() }} pertanyaan
                </div>
            </div>
        </div>

        <div class="card-body">
            <div class="card bg-lighter my-3 shadow-none">
                @foreach (collect($current->questions)->sortBy('order')->all() as $key => $question)
                    <div
                        class="card-body {{ !$loop->last ? 'pb-0' : '' }}"
                        wire:key="question-{{ $key }}"
                    >
                        <div class="card card-body bg-white shadow-none">
                            <div class="d-flex align-items-start gap-5">
                                <div>
                                    <span class="badge bg-success">{{ $loop->iteration }}</span>
                                </div>

                                <div>
                                    <h6>{{ $question->question }}</h6>

                                    @if ($question->image)
                                        <img
                                            class="img-thumbnail w-50 my-5 rounded"
                                            src="{{ asset('storage/' . $question->image) }}"
                                            alt="{{ $question->question }}"
                                        >
                                    @endif

                                    @foreach (collect($question->options)->sortKeysDesc()->all() as $optionKey => $optionName)
                                        <div class="form-check">
                                            <input
                                                class="form-check-input"
                                                id="option-{{ $question->id }}-{{ $optionKey }}"
                                                name="question[{{ $question->id }}]"
                                                type="radio"
                                                value="{{ $optionKey }}"
                                                wire:model="answers.{{ $question->id }}"
                                            >

                                            <label
                                                class="form-check-label"
                                                for="option-{{ $question->id }}-{{ $optionKey }}"
                                            >
                                                {{ $optionName }}
                                            </label>
                                        </div>
                                    @endforeach
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
            >Simpan Jawaban</button>
        </div>
    </form>
</div>
