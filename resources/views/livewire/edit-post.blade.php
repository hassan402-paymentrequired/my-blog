<div>
    <h1 class="my-5 text-4xl font-medium text-center">Edit Article</h1>

    <form method="POST" wire:submit.prevent='updateBlog' class="w-full h-full max-w-3xl p-5 m-auto space-y-3">
        <input wire:model.defer='title' type="text" class="w-full p-2 text-sm border rounded" placeholder="Title" />
        @error('title')
            <small class="text-xs italic text-red-500">{{ $message }}</small>
        @enderror

        <select class="w-full p-2 border border-gray-300 rounded" wire:model.defer='tag'>
            <option value="">Select Tag</option>
            <option value="General">General</option>
            <option value="Programming">Programming</option>
            <option value="My Career">My Career</option>
        </select>
        @error('tag')
            <small class="text-xs italic text-red-500">{{ $message }}</small>
        @enderror

        <label for="uploadFile1"
            class="flex flex-col items-center justify-center w-full h-52 border-2 border-gray-300 border-dashed rounded cursor-pointer">
            <div>
                @if ($newImage)
                    <img src="{{ $newImage->temporaryUrl() }}" alt="New Image" class="w-full h-32 object-cover" />
                @elseif ($image)
                    <img src="{{ asset('storage/' . $image) }}" alt="Current Image" class="w-full h-32 object-cover" />
                @endif
                <input type="file" id="uploadFile1" class="hidden" wire:model='newImage' />
                <p class="mt-2 text-xs font-medium text-gray-400">PNG, JPG, SVG, WEBP, and GIF are allowed.</p>
            </div>
        </label>
        @error('newImage')
            <small class="text-xs italic text-red-500">{{ $message }}</small>
        @enderror

        <main>
            <input id="x" type="hidden" wire:model="content" name="content" value="{{ $content }}">
            <trix-editor input="x" class="w-full h-auto border border-gray-300 rounded"></trix-editor>
        </main>
        @error('content')
            <small class="text-xs italic text-red-500">{{ $message }}</small>
        @enderror

        <button type="submit" class="px-4 py-2 text-white bg-blue-500 rounded hover:bg-blue-700">Update Blog</button>
    </form>
</div>
