<div class="container">
    @if (auth()->user()->role == 'admin')
        <a
            class="btn btn-primary"
            href="{{ route('questionnaire.create') }}"
        >
            <i class="bx bx-plus me-3"></i>
            Tambah
        </a>
    @endif

    <x-alert />

    @if (auth()->user()->role == 'admin')
        <livewire:questionnaire.index.admin />
    @else
        <livewire:questionnaire.index.user />
    @endif
</div>
