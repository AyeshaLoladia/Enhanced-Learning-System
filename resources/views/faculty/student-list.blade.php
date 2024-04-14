<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Course Details') }}
        </h2>
    </x-slot>

    <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 sm:py-2 space-y-6">
        <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg flex items-center justify-between">
            <div class="max-w-xl">
                <section>
                    <header>
                        <h2 class="text-lg font-medium text-gray-900">
                            {{ __('Student List for ') }} <span class=font-semibold>{{ $course->title }}</span>
                        </h2>

                        <p class="mt-1 text-sm text-gray-600">
                            {{ __("Take a look at all the students that are a part of ") }} <span class=font-semibold>{{ $course->title }}</span>
                        </p>
                    </header>
                </section>
            </div>
        </div>
    </div>
</div>
    <div class="space-y-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow sm:rounded-lg">
                <div class="container mx-auto p-8">


                    <div class="mb-4">
                    <input type="radio" id="my-student-tab" name="tab" class="hidden">
                        <label id="accept_label" for="accepted-tab"
                            class="cursor-pointer px-4 py-4 border-b-2 border-transparent"
                            onclick="showTab('my student')">My Students</label>
                        <input type="radio" id="pending-tab" name="tab" class="hidden" checked>
                        <label id="pending_label" for="pending-tab"
                            class="cursor-pointer px-4 py-4 border-b-2 border-blue-500"
                            onclick="showTab('pending')">Pending Requests</label>

                        <div class="tab-content mt-4">
                            <!-- Pending Tab Content -->
                            <div class="tab-pane" id="pending">
                                <table class="min-w-full divide-y divide-gray-200">
                                    <table class="min-w-full divide-y divide-gray-200">
                                        <thead class="bg-gray-50">
                                            <tr>
                                                <th scope="col"
                                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                    Student Name
                                                </th>
                                                <th scope="col"
                                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                    Roll Number
                                                </th>
                                                <th scope="col"
                                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                    Actions
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody class="bg-white divide-y divide-gray-200">
                                            @foreach ($pending_students as $student)
                                            <tr>
                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    {{ $student->name }}
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    {{ $student->rollno }}
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    <a class="bg-red-500 text-white px-4 py-2 rounded-full"
                                                        style="background-color: #a02929;" href="{{ route('student-accept', ['courseId' => $course->id, 'studentId' => $student->id]) }}">Accept Student</a>
                                                    <a class="bg-red-500 text-white px-4 py-2 rounded-full"
                                                        style="background-color: #a02929;" href="{{ route('student-reject', ['courseId' => $course->id, 'studentId' => $student->id]) }}">Reject Student</a>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                            </div>
                            </table>
                        </div>

                        <!-- My student Tab Content -->
                        <div class="tab-pane" id="my student">
                            <table class="min-w-full divide-y divide-gray-200">
                                <div class="container mx-auto">

                                    <table class="min-w-full divide-y divide-gray-200">
                                        <thead class="bg-gray-50">
                                            <tr>
                                                <th scope="col"
                                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                    Student Name
                                                </th>
                                                <th scope="col"
                                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                    Roll Number
                                                </th>
                                                <th scope="col"
                                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                    Actions
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody class="bg-white divide-y divide-gray-200">
                                            @foreach ($students as $student)
                                            <tr>
                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    {{ $student->name }}
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    {{ $student->rollno }}
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap">
                                                <a class="bg-red-500 text-white px-4 py-2 rounded-full"
                                                        style="background-color: #a02929;" href="{{ route('student-accept', ['courseId' => $course->id, 'studentId' => $student->id]) }}">Edit Student</a>
                                                    <a class="bg-red-500 text-white px-4 py-2 rounded-full"
                                                        style="background-color: #a02929;" href="{{ route('student-reject', ['courseId' => $course->id, 'studentId' => $student->id]) }}">Remove Student</a>
                                                </td>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </table>
                        </div>
                    </div>
                </div>
            </div>





            <script>
                // Initialize the page with the 'Pending' tab
                document.addEventListener('DOMContentLoaded', function () {
                    showTab('pending');
                });

                function showTab(tabId) {
                    // Hide all tabs
                    var tabs = document.querySelectorAll('.tab-pane');
                    tabs.forEach(tab => {
                        tab.style.display = 'none';
                    });

                    // Show the selected tab
                    var selectedTab = document.getElementById(tabId);
                    selectedTab.style.display = 'block';

                    // Move the tab indicator
                    if (tabId == 'pending') {
                        document.getElementById('accept_label').style.borderBottom = '2px solid transparent';
                        document.getElementById('pending_label').style.borderBottom = '2px solid #2563EB';
                    } else if (tabId == 'my student') {
                        document.getElementById('pending_label').style.borderBottom = '2px solid transparent';
                        document.getElementById('accept_label').style.borderBottom = '2px solid #2563EB';
                    }
                }
            </script>

</x-app-layout>