<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Manage Faculty') }}
        </h2>
    </x-slot>


    <div class="mt-6 space-y-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 flex justify-between items-center">
            <h1 class="text-3xl font-bold text-center mb-8 pt-6 text-white" style="width: 69vw;">Manage Faculty</h1>
            <button class="bg-red-500 text-white px-4 py-2 rounded-full" style="background-color: #a02929;">
                <a href="{{ route('add-faculty') }}">Add Faculty</a>
            </button>
        </div>

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow sm:rounded-lg">
                <div class="container mx-auto p-8" style="padding-top: 3vh;">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Roll Number
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Faculty Name
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Email
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Actions
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach ($faculties as $faculty)
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $faculty->rollno }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $faculty->name }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $faculty->email }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                    <form action="{{ route('faculty.destroy', ['facultyId' => $faculty->id]) }}"
                                            method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded-full"
                                                style="background-color: #a02929;">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
