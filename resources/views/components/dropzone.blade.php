@props([
    'name' => 'file',
    'label' => 'Fichier',
    'required' => false,
])

<div x-data="dropzoneComponent('{{ $name }}')" class="space-y-2">
    <x-input-label :for="$name" :value="$label" />

    <div class="relative flex flex-col items-center justify-center border-2 border-dashed border-gray-300 dark:border-gray-600 rounded-xl p-6 cursor-pointer transition hover:bg-gray-50 dark:hover:bg-gray-700 text-center"
        @click="$refs.input.click()" @dragover.prevent="isOver = true" @dragleave="isOver = false" @drop.prevent="handleDrop($event)"
        :class="{ 'bg-gray-100': isOver }">
        <x-lucide-upload class="text-gray-500 w-10 h-10" />
        <p class="text-sm text-gray-600 dark:text-gray-400 mt-2">
            Glissez & déposez vos fichiers ou <span class="text-indigo-600 dark:text-indigo-400 font-semibold">parcourez</span>
        </p>

        <input type="file" x-ref="input" name="{{ $name }}" class="hidden" @change="handleFiles($event.target.files)"
            {{ $required ? 'required' : '' }} />

        <ul class="mt-4 text-sm text-gray-700 dark:text-gray-300 space-y-1 w-full">
            <template x-for="(file, index) in files" :key="index">
                <li class="flex justify-between items-center bg-gray-800 hover:scale-105 p-2 rounded-lg w-full">
                    <div class="flex items-center">
                        <x-lucide-file-text class="w-5 h-5 text-gray-400 mr-2" />
                        <span class="text-gray-300 text-sm" x-text="file.name"></span>
                    </div>
                    <button type="button" @click="removeFile(index)" class="text-red-500 hover:text-red-700 text-xs ml-2">
                        <x-lucide-trash class="w-4 h-4 text-red-500" />
                    </button>
                </li>
            </template>
        </ul>
    </div>

    <x-input-error :messages="$errors->get($name)" class="mt-2" />
</div>

@once
    @push('scripts')
        <script>
            function dropzoneComponent(name) {
                return {
                    files: [],
                    isOver: false,
                    handleDrop(event) {
                        this.addFiles([...event.dataTransfer.files]);
                        this.isOver = false;
                    },
                    handleFiles(selectedFiles) {
                        this.addFiles([...selectedFiles]);
                    },
                    addFiles(newFiles) {
                        this.files.push(...newFiles);
                        this.updateInput();
                    },
                    removeFile(index) {
                        this.files.splice(index, 1);
                        this.updateInput();
                    },
                    updateInput() {
                        const dt = new DataTransfer();
                        this.files.forEach(file => dt.items.add(file));
                        const input = this.$refs.input;
                        input.files = dt.files;
                    }
                };
            }
        </script>
    @endpush
@endonce
