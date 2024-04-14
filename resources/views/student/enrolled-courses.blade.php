<!-- enrolled-courses.blade.php -->

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Enrolled Courses') }}
        </h2>
    </x-slot>

    <style>

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
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex flex-wrap -mx-4">
                @foreach ($enrolledCourses as $course)
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
                        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
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
                            <div class="p-6 text-gray-900 dark:text-gray-100 text-left">
                                <h2 class="text-xl font-semibold mb-2 truncate-overflow1">{{ $course->title }}</h2>
                                <p class="text-gray-700 mb-4 truncate-overflow2">{{ $course->module_overview }}</p>
                                <a href="{{ route('view-course', ['courseId' => $course->id]) }}" class="bg-red-500 text-white px-4 py-2 rounded-full" style="background-color: #a02929">Start Learning</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</x-app-layout>
