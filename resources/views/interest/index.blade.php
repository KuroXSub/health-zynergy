<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Daftar Interest') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form action="{{ route('interests.personalize') }}" method="POST">
                        @csrf
                        @foreach($interests as $interest)
                            <div>
                                <input type="checkbox" name="interests[]" value="{{ $interest->id }}" id="interest{{ $interest->id }}">
                                <label for="interest{{ $interest->id }}">{{ $interest->interest }}</label>
                            </div>
                        @endforeach
                        <button type="submit">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
