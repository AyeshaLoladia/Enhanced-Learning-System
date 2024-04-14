<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('My Courses') }}
        </h2>
    </x-slot>

    <style>
        .truncate-overflow1 {
            display: -webkit-box;
            -webkit-line-clamp: 1;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        .truncate-overflow2 {
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        .video-container {
            position: relative;
            width: 100%;
            height: 0;
            padding-top: 56.25%;
        }

        .video-iframe {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
        }
    </style>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 sm:py-2 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg flex items-center justify-between">
                <div class="max-w-xl">
                    <section>
                        <header>
                            <h2 class="text-lg font-medium text-gray-900">
                                {{ __('My Courses') }}
                            </h2>

                            <p class="mt-1 text-sm text-gray-600">
                                {{ __("See all the courses that you have been assigned") }}
                            </p>
                        </header>
                    </section>
                </div>
            </div>
        </div>
    </div>

    <div class="py-0">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex flex-wrap -mx-4">
                @foreach ($courses as $course)
                    <?php
                    $flag = 1;
                    $parsedUrl = parse_url($course->intro_video_link);

                    if (isset($parsedUrl['host']) && $parsedUrl['host'] === 'youtu.be') {
                        $videoId = strtok(substr($parsedUrl['path'], 1), '?');
                    } else if (isset($parsedUrl['host']) && $parsedUrl['host'] === 'www.youtube.com' && isset($parsedUrl['query']) && strpos($parsedUrl['query'], 'v=') !== false) {
                        parse_str($parsedUrl['query'], $query);
                        $videoId = $query['v'];
                    } else if (isset($parsedUrl['host']) && $parsedUrl['host'] === 'www.youtube.com' && isset($parsedUrl['path']) && strpos($parsedUrl['path'], 'embed/') !== false) {
                        $pathComponents = explode('/', trim($parsedUrl['path'], '/'));
                        $videoId = end($pathComponents);
                    } else {
                        $videoId = null;
                    }
                    ?>
                    <div class="w-full sm:w-1/2 md:w-1/3 lg:w-1/3 px-4 mb-8">
                        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                            <div class="video-container">
                                @if (!is_null($videoId))
                                    <iframe class="video-iframe"
                                            src="https://www.youtube.com/embed/{{ $videoId }}"
                                            title="YouTube video player" frameborder="0"
                                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"></iframe>
                                @else
                                <div class="bg-gray-300 video-iframe" style="display: flex; justify-content: center; align-items: center; background-color: #dfe0e0; background-image: linear-gradient(#dfe0e0, white);">
                                        Video Unavailable
                                    </div>
                                @endif
                            </div>
                            <div class="p-6 text-gray-900 text-left">
                                <h2 class="text-lg font-semibold mb-2 truncate-overflow1">{{ $course->title }}</h2>
                                <p class="text-gray-700 mb-4 truncate-overflow2 text-sm">
                                    {{ $course->description }}
                                </p>
                                <a href="{{ route('course-details', ['courseId' => $course->id]) }}"
                                   class="bg-red-500 text-white px-4 py-2 rounded-full text-md"
                                   style="background-color: #a02929">View and Edit</a>
                                <a href="{{ route('courses.edit', ['courseId' => $course->id]) }}"
                                   class="bg-red-500 text-white px-4 py-2 rounded-full text-md"
                                   style="background-color: #a02929">Add Material</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</x-app-layout>
