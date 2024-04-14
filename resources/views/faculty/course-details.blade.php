<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('View Course') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 sm:py-2 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg flex justify-between">
                <!-- Left side with title and course description -->
                <div class="max-w-xl">
                    <header>
                        <h2 class="text-3xl font-semibold text-gray-900">
                            {{ $course->title }}
                        </h2>

                        <div class="border-t border-gray-300 mt-4 pt-4">
                            <p class="mt-2 text-base text-gray-600">
                                {{ $course->description }}
                            </p>

                            <p class="mt-4 text-sm text-gray-600">
                                <span class="font-bold">{{ __('Start Date: ') }}</span>{{ $course->start_date }}
                            </p>

                            <p class="mt-1 text-sm text-gray-600">
                                <span class="font-bold">{{ __('End Date: ') }}</span>{{ $course->end_date }}
                            </p>

                            <p class="mt-1 text-sm text-gray-600">
                                <span class="font-bold">{{ __('Faculty Assigned: ') }}</span>{{ $course->faculty->name
                                }}
                            </p>
                        </div>
                    </header>
                </div>
                <!-- Right side with the "View Student List" button -->
                <div class="ml-4">
                    <a href="{{ route('student-list', ['courseId' => $course->id]) }}"
                        class="bg-red-500 text-white px-4 py-2 rounded-full" style="background-color: #a02929;">
                        {{ __('View Student List') }}
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="mb-4 space-y-4">
        @if (!is_null($course->material))
        @foreach ($course->material as $material)
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    <section class="mb-4">
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-4 md:max-w-2xl mx-auto w-full p-4">
                            <div class="flex justify-between">
                                <div onclick="toggleModule('module{{ $loop->index + 1 }}')"
                                    class="module relative cursor-pointer bg-gray-300 rounded-md p-4 focus:outline-none focus:ring focus:border-blue-300 transition-all w-full">
                                    Unit {{ $loop->index + 1 }}
                                </div>
                            </div>
                            <div id='module{{ $loop->index + 1 }}'
                                class="module-details hidden mt-4 rounded-md bg-white md:w-full p-4 border border-gray-300 shadow-md"
                                style=" width: 77vw; @media (min-width: 768px) { .md-w-full { width: 100%; }}">
                                @foreach ($material->content as $content)
                                <form action="{{ route('content.update',  ['contentId' => $content->id])}}" method="POST">
                                @csrf
                                <hr class="border-t border-gray-300 my-4">
                                <div class="mb-4">
                                    <label class="block text-sm font-medium text-gray-700">Content Title</label>
                                    <input type="text" id="title" name="title"
                                        class="mt-1 p-2 w-full border border-gray-300 rounded-md"
                                        value="{{ $content->title }}">
                                </div>
                                <div class="mb-4">
                                    <label class="block text-sm font-medium text-gray-700">Material Type</label>
                                    <input type="text" id="material_type" name="material_type"
                                        class="mt-1 p-2 w-full border border-gray-300 rounded-md"
                                        value="{{ $content->material_type }}">
                                </div>

                                @if ($content->material_type == 'Lecture' && $content->lecture_link)
                                <div class="mb-4">
                                    <label class="block text-sm font-medium text-gray-700">Lecture Link</label>
                                    <input type="text" id="lecture_link" name="lecture_link"
                                        class="mt-1 p-2 w-full border border-gray-300 rounded-md"
                                        value="{{ $content->lecture_link }}">
                                </div>
                                
                                <?php
                // Extract video ID from $material->lecture_link
                $parsedUrl = parse_url($content->lecture_link);

                // Check if it's a youtu.be link
                if (isset($parsedUrl['host']) && $parsedUrl['host'] === 'youtu.be') {
                    // Extract characters from the path component until encountering a '?'
                    $videoId = strtok(substr($parsedUrl['path'], 1), '?');
                }
                // Check if it's a youtube.com/watch?v= link
                else if (isset($parsedUrl['host']) && $parsedUrl['host'] === 'www.youtube.com' && isset($parsedUrl['query']) && strpos($parsedUrl['query'], 'v=') !== false) {
                    parse_str($parsedUrl['query'], $query);
                    $videoId = $query['v'];
                }
                // Check if it's a youtube.com/embed/ link
                else if (isset($parsedUrl['host']) && $parsedUrl['host'] === 'www.youtube.com' && isset($parsedUrl['path']) && strpos($parsedUrl['path'], 'embed/') !== false) {
                    $pathComponents = explode('/', trim($parsedUrl['path'], '/'));
                    $videoId = end($pathComponents);
                } else {
                    $videoId = null;
                }
                ?>
                                <div class="mb-4">
                                    <label class="block text-sm font-medium text-gray-700">Video Player</label>
                                    <div class="aspect-w-16 aspect-h-9" style="padding-top: 2vh;">
                                        @if ($videoId)
                                        <iframe style="height:60vh; border-radius: 8px;" id="ytplayer" type="text/html"
                                            width="100%" height="100%"
                                            src="https://www.youtube.com/embed/{{ $videoId }}" frameborder="0"
                                            allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                                            allowfullscreen></iframe>
                                        @else
                                        <p>No valid YouTube video ID found.</p>
                                        @endif
                                    </div>
                                </div>
                                @else
                                <div class="mb-4">
                                    <label class="block text-sm font-medium text-gray-700">Assignment Link</label>
                                    <input type="text" id="assignment_link" name="assignment_link"
                                        class="mt-1 p-2 w-full border border-gray-300 rounded-md"
                                        value="{{ $material->assignment_link ?? 'Your Assignment Link Goes Here' }}">
                                </div>
                                @endif

                                <x-secondary-button class="my-4">
                                    {{ __('Update') }}
                                </x-secondary-button>
                            </form>

                                @endforeach
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
        @endforeach
        @endif

        <script>
            function toggleModule(moduleId) {
                document.querySelectorAll('.module-details').forEach(function (element) {
                    element.classList.add('hidden');
                });
                const selectedModule = document.getElementById(moduleId);
                if (selectedModule) {
                    selectedModule.classList.remove('hidden');
                }
            }
        </script>
    </div>
</x-app-layout>