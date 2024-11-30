<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Edit Personalization') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form action="{{ route('personalization.update', $personalization) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div>
                            <h4>Interests</h4>
                            <div>
                                @foreach ($allInterests as $interest)
                                    <div>
                                        <input type="checkbox" name="interests[]" value="{{ $interest->id }}" id="interest{{ $interest->id }}"
                                               {{ $personalization->interests->contains($interest) ? 'checked' : '' }}>
                                        <label for="interest{{ $interest->id }}">{{ $interest->interest }}</label>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <div>
                            <h4>Disease</h4>
                            <div>
                                @foreach ($allDiseases as $disease)
                                    <div>
                                        <input type="checkbox" name="diseases[]" value="{{ $disease->id }}" id="disease{{ $disease->id }}"
                                               {{ $personalization->diseases->contains($disease) ? 'checked' : '' }}>
                                        <label for="disease{{ $disease->id }}">{{ $disease->disease }}</label>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <div>
                            <h4>Allergy</h4>
                            <div>
                                @foreach ($allAllergies as $allergy)
                                    <div>
                                        <input type="checkbox" name="allergies[]" value="{{ $allergy->id }}" id="allergy{{ $allergy->id }}"
                                               {{ $personalization->allergies->contains($allergy) ? 'checked' : '' }}>
                                        <label for="allergy{{ $allergy->id }}">{{ $allergy->allergy }}</label>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <button type="submit">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>