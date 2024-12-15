<div>
    <div class="row">
        @forelse ($questionnaires as $questionnaire)
            <div class="col-lg-4 d-flex align-items-stretch mb-3">
                <div class="card w-100">
                    @if ($questionnaire->image)
                        <img
                            class="card-img-top"
                            src="{{ asset('storage/' . $questionnaire->image) }}"
                            alt="{{ $questionnaire->title }}"
                        >
                    @endif

                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title">{{ $questionnaire->title }}</h5>
                        <p class="card-text">
                            {{ $questionnaire->description }}
                        </p>

                        <div class="align-self-start mt-auto">
                            <div class="text-muted mb-3">
                                <div>
                                    <i class="bx bx-store me-2"></i>

                                    {{ $questionnaire->shop_name }}
                                </div>

                                <div>
                                    <i class="bx bx-clipboard me-2"></i>

                                    {{ $questionnaire->questions->count() }} pertanyaan
                                </div>
                            </div>

                            <div>
                                <a
                                    class="btn btn-primary"
                                    href="{{ route('questionnaire.answer.show', $questionnaire->id) }}"
                                >
                                    Jawab Kuesioner
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-md-12">
                <div class="alert alert-warning">
                    Belum ada kuesioner yang tersedia.
                </div>
            </div>
        @endforelse
    </div>
</div>
