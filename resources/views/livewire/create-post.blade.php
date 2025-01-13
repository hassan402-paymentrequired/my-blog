<div x-data="">
    <h1 class="my-5 text-4xl font-medium text-center">Create Article</h1>
    <form wire:submit.prevent='store' class="w-full h-full max-w-3xl p-5 m-auto space-y-3">
        <input wire:model.defer='title' type="text" class="w-full p-2 text-sm border rounded" placeholder="Title" />
        @error('title')
            <small class="text-xs italic text-red-500">{{ $message }}</small>
        @enderror

        <select class="w-full p-2 border border-gray-300 rounded" wire:model.defer='tag'>
            <option value="--" selected>Tag</option>
            <option value="General">General</option>
            <option value="Programming">Programming</option>
            <option value="My Career">My Career</option>
        </select>
        @error('tag')
            <small class="text-xs italic text-red-500">{{ $message }}</small>
        @enderror

        <label for="uploadFile1" class="...">
            <input type="file" id="uploadFile1" class="hidden" x-ref="img" wire:model='image' />
            <p class="mt-2 text-xs font-medium text-gray-400">
                PNG, JPG, SVG, WEBP, and GIF are Allowed.
            </p>
        </label>

        @if ($image)
            <img src="{{ $image->temporaryUrl() }}">
        @endif

        <div id="editorjs"></div>
        <x-aui::button>Create</x-aui::button>
    </form>

    </>


    <script>
        class SimpleImage {
            constructor({
                data
            }) {
                this.data = data || {};
                this.wrapper = undefined;
            }

            static get toolbox() {
                return {
                    title: 'Image',
                    icon: '<svg width="17" height="15" viewBox="0 0 336 276" xmlns="http://www.w3.org/2000/svg"><path d="M291 150V79c0-19-15-34-34-34H79c-19 0-34 15-34 34v42l67-44 81 72 56-29 42 30zm0 52l-43-30-56 30-81-67-66 39v23c0 19 15 34 34 34h178c17 0 31-13 34-29zM79 0h178c44 0 79 35 79 79v118c0 44-35 79-79 79H79c-44 0-79-35-79-79V79C0 35 35 0 79 0z"/></svg>'
                };
            }

            render() {
                this.wrapper = document.createElement('div');
                this.wrapper.classList.add('simple-image');

                if (this.data.url) {
                    this._createImage(this.data.url, this.data.caption);
                } else {
                    const input = document.createElement('input');
                    input.placeholder = 'Paste an image URL...';

                    input.addEventListener('paste', (event) => {
                        const url = event.clipboardData?.getData('text') || '';
                        if (url) {
                            this._createImage(url);
                        }
                    });

                    this.wrapper.appendChild(input);
                }

                return this.wrapper;
            }

            _createImage(url, caption = '') {
                const image = document.createElement('img');
                const captionInput = document.createElement('input');

                image.src = url;
                captionInput.placeholder = 'Caption...';
                captionInput.value = caption;

                this.wrapper.innerHTML = '';
                this.wrapper.appendChild(image);
                this.wrapper.appendChild(captionInput);
            }

            save(blockContent) {
                const title = blockContent.querySelector('.simple-image-title');
                const image = blockContent.querySelector('img');
                const caption = blockContent.querySelector('input');

                return {
                    title: title?.innerText || '',
                    url: image?.src || '',
                    caption: caption?.value || ''
                };
            }

            validate(savedData) {
                return !!savedData.url.trim();
            }
        }

        document.addEventListener('DOMContentLoaded', () => {
            initializeEditor();

            // Re-initialize editor after Livewire updates the DOM
            Livewire.hook('message.processed', (message, component) => {
                if (document.getElementById('editorjs')) {
                    initializeEditor();
                }
            });
        });

        function initializeEditor() {
            if (window.editor) {
                window.editor.destroy();
            }

            window.editor = new EditorJS({
                autofocus: true,
                holder: 'editorjs',
                tools: {
                    image: SimpleImage,
                    code: CodeTool,
                    header: Header,
                    quote: Quote,
                    list: {
                        class: EditorjsList,
                        inlineToolbar: true,
                        config: {
                            defaultStyle: 'unordered',
                        },
                    },
                },
                placeholder: 'Let`s write an awesome story!',
                onChange: async () => {
                    const content = await window.editor.save();
                    Livewire.emit('updateEditorContent', content);
                },
            });
        }
    </script>
