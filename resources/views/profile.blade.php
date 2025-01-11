<x-layout.app>

    <x-container>
        <x-card title="Profile :: id {{ $user->id }}">
            @if ($message = session()->get('message'))
                <div>{{ $message }}</div>
            @endif
            <x-form :route="route('profile')" put id="form" enctype="multipart/form-data">
                <div class="flex items-center gap-2">
                    <x-img src="storage/{{ $user->photo }}" alt="Profile Picture" />
                    <x-file-input name="photo"></x-file-input>
                </div>
                <x-input name="name" placeholder="Name" value="{{ old('name', $user->name) }}"/>
                <x-textarea name="description" value="{{ old('description', $user->description) }}"/>
                <x-input name="handler" prefix="biolinks.com.br/" placeholder="handler" value="{{ old('handler', $user->handler) }}"/>
            </x-form>

            <x-slot:actions>
                <x-a :href="route('dashboard')">Cancel</x-a>
                <x-button type="submit" form="form">Save</x-button>
            </x-slot:actions>

        </x-card>
    </x-container>

</x-layout.app>
