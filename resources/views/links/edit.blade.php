<x-layout.app>

    <x-container>
        <x-card title="Editing Link :: id {{ $link->id }}">
            @if ($message = session()->get('message'))
                <div>{{ $message }}</div>
            @endif
            <x-form :route="route('links.edit', $link)" put id="form">
                <x-input name="name" placeholder="Name" value="{{ old('name', $link->name) }}"/>
                <x-input name="link" placeholder="link" value="{{ old('link', $link->link) }}"/>
            </x-form>

            <x-slot:actions>
                <x-a :href="route('dashboard')">Cancel</x-a>
                <x-button type="submit" form="form">Save</x-button>
            </x-slot:actions>

        </x-card>
    </x-container>

</x-layout.app>
