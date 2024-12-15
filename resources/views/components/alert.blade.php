@if (session()->has('message'))
    <div
        class="alert alert-dismissible border-{{ session('message')['color'] }} my-5 border bg-white"
        role="alert"
    >
        <div class="d-flex">
            <div>
                <h6 class="text-{{ session('message')['color'] }} mb-0">{{ session('message')['title'] }}</h6>
                <p class="mb-0">{{ session('message')['sub-title'] }}</p>
            </div>
        </div>

        <a
            class="btn-close"
            data-bs-dismiss="alert"
            type="button"
            aria-label="close"
        ></a>
    </div>
@endif
