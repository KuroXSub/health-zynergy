<x-app-layout>
    <div class="p-6 text-gray-900 dark:text-gray-100">
        <table class="table-auto w-full">
            <thead>
                <tr>
                    <th>Interest</th>
                    <th>Note</th>
                    <th>Disease</th>
                    <th>Note</th>
                    <th>Allergy</th>
                    <th>Note</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($personalizations as $personalization)
                    <tr>
                        <td>
                            @foreach ($personalization->interests as $interest)
                                {{ $interest->interest }}<br>
                            @endforeach
                        </td>
                        <td>
                            @foreach ($personalization->interests as $interest)
                                {{ $interest->note }}<br>
                            @endforeach
                        </td>
                        <td>
                            @foreach ($personalization->diseases as $disease)
                                {{ $disease->disease }}<br>
                            @endforeach
                        </td>
                        <td>
                            @foreach ($personalization->diseases as $disease)
                                {{ $disease->note }}<br>
                            @endforeach
                        </td>
                        <td>
                            @foreach ($personalization->allergies as $allergy)
                                {{ $allergy->allergy }}<br>
                            @endforeach
                        </td>
                        <td>
                            @foreach ($personalization->allergies as $allergy)
                                {{ $allergy->note }}<br>
                            @endforeach
                        </td>
                        <td>
                            <a href="{{ route('personalization.edit', $personalization) }}" class="btn btn-primary">Edit</a>
                            <form action="{{ route('personalization.destroy', $personalization) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div> 
</x-app-layout>