<x-app-layout>
    <x-slot name="title">Profil</x-slot>

    <div class="container p-5">
        <div class="row">
            <div class="col-md-12">
                <livewire:profile.update-profile-information-form />
            </div>

            <div class="col-md-12">
                <livewire:profile.update-password-form />
            </div>

            <div class="col-md-12">
                <livewire:profile.logout />
            </div>

            <div class="col-md-12">
                <livewire:profile.delete-user-form />
            </div>
        </div>
    </div>
</x-app-layout>
