<div x-data="articleForm()">
    <h1 class="my-5 text-4xl font-medium text-center">Create Article</h1>

    <form wire:submit='store' class="w-full h-full max-w-3xl p-5 m-auto space-y-3">
        <input wire:model.blur='title' type="text" class="w-full p-2 text-sm border rounded" placeholder="title" />
        @error('title')
            <small class="text-xs italic text-red-500">{{ $message }}</small>
        @enderror
        <select class="w-full p-2 border border-gray-300 rounded" wire:model.change='tag'>
            <option value="--" selected>tag</option>
            <option value="General">General</option>
            <option value="Programming">Programming</option>
            <option value="my career">my career</option>
        </select>
        @error('tag')
            <small class="text-xs italic text-red-500">{{ $message }}</small>
        @enderror

        <label for="uploadFile1"
            class="flex flex-col items-center justify-center object-contain w-full mx-auto overflow-hidden text-base font-semibold text-gray-500 bg-white border-2 border-gray-300 border-dashed rounded cursor-pointer h-52">
            <template @click="$refs.img.click()" x-if="!obj">
                <div>
                    <svg xmlns="http://www.w3.org/2000/svg" class="mb-2 w-11 fill-gray-500" viewBox="0 0 32 32">
                        <path
                            d="M23.75 11.044a7.99 7.99 0 0 0-15.5-.009A8 8 0 0 0 9 27h3a1 1 0 0 0 0-2H9a6 6 0 0 1-.035-12 1.038 1.038 0 0 0 1.1-.854 5.991 5.991 0 0 1 11.862 0A1.08 1.08 0 0 0 23 13a6 6 0 0 1 0 12h-3a1 1 0 0 0 0 2h3a8 8 0 0 0 .75-15.956z" />
                        <path
                            d="M20.293 19.707a1 1 0 0 0 1.414-1.414l-5-5a1 1 0 0 0-1.414 0l-5 5a1 1 0 0 0 1.414 1.414L15 16.414V29a1 1 0 0 0 2 0V16.414z" />
                    </svg>
                    Upload file
                    <input type="file" id="uploadFile1" class="hidden" x-ref="img" wire:model='image' />
                    <p class="mt-2 text-xs font-medium text-gray-400">
                        PNG, JPG, SVG, WEBP, and GIF are Allowed.
                    </p>
                </div>
            </template>


            @if ($image)
                <img src="{{ $image->temporaryUrl() }}">
            @endif
        </label>

        <main>
            <div class="more-stuff-inbetween"></div>
            <input id="x" type="hidden" name="content" value="{{ $body }}">
            <trix-editor input="x"></trix-editor>
        </main>
        @error('body')
            <small class="text-xs italic text-red-500">{{ $message }}</small>
        @enderror
        <x-aui::button>Create</x-aui::button>
    </form>
    </>


    <script>
        const Editor = document.getElementById('x')

        addEventListener("trix-blur", e => {
            @this.set('body', Editor.getAttribute('value'))
        })

        function articleForm() {
            return {
                obj: null,
                handleImageUpload(event) {
                    const file = event.target.files[0];
                    if (file) {
                        const url = URL.createObjectURL(file);
                        {{--  document.getElementById('image').src = url;  --}}

                    }
                },
            };
        }
    </script>
