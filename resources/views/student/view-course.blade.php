<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('View Course') }}
        </h2>
    </x-slot>

    <style>
        .custom_color { background: linear-gradient(to right, #a02929, #a02929); }
        .module-tab-btn {
            padding: 10px 20px;
            background: #a02929;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background 0.3s;
        }

        .module-tab-btn:not(:last-child) {
            margin-right: 1rem;
        }

        .module-tab-btn:hover {
            background: #c0392b;
        }

        .module-tab-btn.custom_color {
            background: linear-gradient(to right, #ff5f6d, #ffc371);
        }

        .module-tab-btn.custom_color:hover {
            background: linear-gradient(to right, #ff5f6d, #ffc371);
        }
    </style>

    <body class="bg-gray-100">
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 sm:py-2 space-y-6">
                <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                    <div class="w-full">
                        <section>
                        <header class="mb-4">
                            <h2 class="text-xl font-bold text-gray-900">
                            {{ $course->title }}
                            </h2>
                        </header>
                        <div class="container mx-auto">
                            <div class="flex justify-center space-x-4 mb-4">
                                @foreach($materials as $material)
                                <button id="tab-{{ $loop->iteration }}" class="module-tab-btn custom_color text-white" onclick="showModule('{{ $loop->iteration }}')">Unit {{ $loop->iteration }}</button>
                                @endforeach
                            </div>

                            <div id="module-content" class="module-content">
                                <!-- Material 1.1 -->
                                @foreach($materials as $material)
                                <div id="module-{{ $loop->iteration }}" class="module">
                                @foreach($material->content as $content)
                                <hr class="border-t border-gray-300 my-4">
                                <div id="content-{{ $loop->parent->iteration }}.{ $loop->iteration }}" class="content">
                                    <h2 class="text-lg font-medium mb-4">{{ $loop->iteration }}. {{ $content->title }}</h2>
                                    @if ($content->material_type == 'Lecture' && $content->lecture_link)
                                    
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
                                        <a href="{{ $content->assignment_link }}" id="next-material-button" class="test-button bg-red-500 text-white text-center py-2 rounded block" style="background-color: #a02929">Go To Assignment</a>
                                    </div>
                                    @endif
                                
                                </div>
                                @endforeach
                                <a href="#" id="next-material-button" class="test-button bg-red-500 text-white text-center py-2 rounded block" style="background-color: #a02929" onclick="showNextMaterial('module-{{ $loop->iteration + 1 }}')">Next Material</a>
        
                                </div>
                                @endforeach
                            </div>
                        </div>
                        <script>
    document.addEventListener('DOMContentLoaded', function () {
        showModule(1);

        function showModule(moduleNumber) {
            const tabs = document.querySelectorAll('.module-tab-btn');
            tabs.forEach(tab => tab.classList.remove('custom_color', 'text-white'));

            const selectedTab = document.getElementById(`tab-${moduleNumber}`);
            selectedTab.classList.add('custom_color', 'text-white');

            const modules = document.querySelectorAll('.module');
            modules.forEach(mod => mod.classList.add('hidden'));

            const selectedModule = document.getElementById(`module-${moduleNumber}`);
            selectedModule.classList.remove('hidden');
        }

        // Add event listeners to unit buttons.
        const unitButtons = document.querySelectorAll('.module-tab-btn');
        unitButtons.forEach((button, index) => {
            button.addEventListener('click', function (event) {
                event.preventDefault();
                showModule(index + 1); // Index is zero-based, so add 1 to match unit numbers.
            });
        });
    });
</script>
                    </div>
                </div>
            </div>
        </div>
    </body>
</x-app-layout>
