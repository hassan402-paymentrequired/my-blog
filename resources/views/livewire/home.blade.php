<div class="">
    <div class="md:flex md:flex-col-reverse">
        <div class="flex items-center justify-center w-full p-2 mx-auto space-x-3 grow ">
            <livewire:filter-button title="Programming" :active="strtolower($activefilter) == 'programming'" />
            <livewire:filter-button title="general" :active="strtolower($activefilter) == 'general'" />
            <livewire:filter-button title="my career" :active="strtolower($activefilter) == 'my career'" />
        </div>

        <div class="p-5 mt-5 grow">
        <h1 class="text-2xl font-bold md:text-7xl sm:text-3xl ">Hassan's Thoughts {{ session('tag') ? 'On ' . session('tag') : '' }} </h1>
        </div>

        @if (session()->has('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

    </div>
    <div class="flex flex-col mt-6">
        <ul class="grid items-start grid-cols-1 p-8 gap-y-10 2xl:mx-auto 2xl:w-full 2xl:max-w-6 xl">
            @foreach ($blogposts as $post)
                <li class="relative flex flex-col items-start sm:flex-row xl:flex-row">
                    <div class="order-1 sm:ml-6 ">
                        <h3 class="mb-1 font-semibold text-slate-900">
                            <span
                                class="block mb-1 text-sm leading-6 text-green-500">{{ $post->tag ?? 'programming' }}</span>
                            <p>
                                {{ $post->title }}</p>
                        </h3>

                        <a class="inline-flex items-center px-3 mt-6 text-sm font-semibold rounded-full group h-9 whitespace-nowrap focus:outline-none focus:ring-2 bg-slate-100 text-slate-700 hover:bg-slate-200 hover:text-slate-900 focus:ring-slate-500"
                            href="/blog-post/{{ $post->slug }}-{{ $post->post_id }}">Read

                            more<span class="sr-only">, Completely unstyled, fully accessible UI
                                components</span>
                            <svg class="ml-3 overflow-visible text-slate-300 group-hover:text-slate-400" width="3"
                                height="6" viewBox="0 0 3 6" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round">
                                <path d="M0 0L3 3L0 6"></path>
                            </svg></a>
                    </div>
                    <img src="https://tailwindcss.com/_next/static/media/headlessui@75.c1d50bc1.jpg" alt=""
                        class="mb-6 shadow-md rounded-lg bg-slate-50 w-full sm:w-[17rem] sm:mb-0 xl:mb-6" width="1216"
                        height="640">
                </li>
            @endforeach
        </ul>
    </div>
</div>
