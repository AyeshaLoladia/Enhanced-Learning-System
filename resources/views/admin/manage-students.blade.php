<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Manage Students') }}
        </h2>
    </x-slot>

    <h1 class="text-3xl font-bold text-center mb-8 pt-6 text-white">Manage Students</h1>

    <div class="mt-6 space-y-6">
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
                                    Student Name
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Email
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    User Type
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Actions
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach ($students as $student)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    {{ $student->rollno }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    {{ $student->name }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    {{ $student->email }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    {{ $student->user_type }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                <form action="{{ route('student.destroy', ['studentId' => $student->id]) }}"
                                            method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded-full"
                                                style="background-color: #a02929;">Delete</button>
                                        </form>
                                    </td>
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
