<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Projets') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <header class="mb-6">
                    <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                        {{ __('Modifier le projet') }}
                    </h2>

                    <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                        {{ __('Modifiez les informations de votre projet.') }}
                    </p>
                </header>

                <form action="{{ route('dashboard.projects.update', $project->id) }}" method="POST" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf

                    <div>
                        <x-input-label for="name" :value="__('Nom du projet')" />
                        <x-text-input id="name" class="w-full" type="text" name="name" value="{{ old('name', $project->title) }}" required
                            autofocus />
                    </div>

                    <div class="mt-4">
                        <x-input-label for="description" :value="__('Description')" />
                        <x-textarea id="description" class="w-full" name="description"
                            placeholder="Votre description...">{{ old('description', $project->description) }}</x-textarea>
                    </div>

                    <div class="mt-4">
                        <div class="flex items-center justify-between">
                            <x-input-label for="tags" :value="__('Tags')" />
                            <a href="{{ route('dashboard.tags.create') }}" class="btn btn-ghost btn-sm">
                                <x-lucide-circle-plus class="w-4 h-4 mr-2" />
                                {{ __('Créer un nouveau tag') }}
                            </a>
                        </div>

                        <select class="select w-full" name="tags" id="tags">
                            <option value=""></option>
                            @foreach ($tags as $tag)
                                <option value="{{ $tag->id }}"
                                    {{ in_array($tag->id, $project->tags->pluck('id')->toArray()) ? 'selected' : '' }}>
                                    {{ $tag->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mt-4">
                        <x-input-label for="project_images" :value="__('Images du projet')" />
                        <img src="{{ asset($project->image) }}" alt="" class="w-42 h-42 object-cover mb-4">

                        <div id="dropzone"
                            class="relative flex flex-col items-center justify-center border-2 border-dashed border-gray-300 dark:border-gray-600 rounded-xl p-6 cursor-pointer transition hover:bg-gray-50 dark:hover:bg-gray-700 text-center"
                            onclick="document.getElementById('fileInput').click();"
                            ondragover="event.preventDefault(); this.classList.add('bg-gray-100')" ondragleave="this.classList.remove('bg-gray-100')"
                            ondrop="handleDrop(event)">
                            <x-lucide-upload class="text-gray-500 w-10 h-10" />
                            <p class="text-sm text-gray-600 dark:text-gray-400 mt-2">
                                Glissez & déposez vos images ou <span class="text-indigo-600 dark:text-indigo-400 font-semibold">parcourez</span>
                            </p>

                            <input type="file" id="fileInput" name="project_images" class="hidden" onchange="addFiles(this.files)">
                            <ul id="fileList" class="mt-4 text-sm text-gray-700 dark:text-gray-300 space-y-1 w-full"></ul>
                        </div>
                    </div>

                    <div class="flex items justify-end gap-2 mt-4">
                        <x-primary-button class="ml-4">
                            {{ __('Mettre à jour') }}
                        </x-primary-button>
                    </div>
                </form>
            </div>
        </div>

        @section('scripts')
            <script>
                let storedFiles = [];

                function handleDrop(event) {
                    event.preventDefault();
                    const droppedFiles = Array.from(event.dataTransfer.files);
                    storedFiles = [...storedFiles, ...droppedFiles];
                    updateInput();
                    renderFileList();
                    document.getElementById('dropzone').classList.remove('bg-gray-100');
                }

                function addFiles(files) {
                    storedFiles = [...storedFiles, ...Array.from(files)];
                    updateInput();
                    renderFileList();
                }

                function removeFile(index) {
                    storedFiles.splice(index, 1);
                    updateInput();
                    renderFileList();
                }

                function updateInput() {
                    const dataTransfer = new DataTransfer();
                    storedFiles.forEach(file => dataTransfer.items.add(file));
                    document.getElementById('fileInput').files = dataTransfer.files;
                }

                function renderFileList() {
                    const list = document.getElementById('fileList');
                    list.innerHTML = '';
                    storedFiles.forEach((file, index) => {
                        const li = document.createElement('li');
                        li.className =
                            'flex justify-between items-center bg-gray-800 hover:scale-105 p-2 rounded-lg w-full transition duration-200 ease-in-out';
                        li.innerHTML = `
            <div class="flex items-center">
                <x-lucide-file-text class="w-5 h-5 text-gray-400 mr-2" />
                <span class="text-gray-300 text-sm">${file.name}</span>
            </div>>
            <button type="button" onclick="removeFile(${index})" class="text-red-500 hover:text-red-700 text-xs ml-2">
                <x-lucide-trash class="w-4 h-4 text-red-500" />
            </button
        `;
                        list.appendChild(li);
                    });
                }
            </script>
        @endsection
    </div>
</x-app-layout>
