<div>
    <div class="relative p-4">
        <div class="max-w-3xl mx-auto">
            <div
                class="flex flex-col justify-between mt-3 leading-normal bg-white rounded-b lg:rounded-b-none lg:rounded-r">
                <div class="">

                    <a href="#"
                        class="text-sm text-indigo-600 transition duration-500 ease-in-out hover:text-gray-700">
                        {{$blogpost->tag}}
                    </a>
                    <h1 href="#" class="text-4xl font-bold text-gray-900">{{ $blogpost->title }}</h1>
                    <div class="flex w-full  py-5 text-sm text-gray-900 font-regular">
                        <span class="flex flex-row items-center mr-3">
                            <svg class="text-indigo-600" fill="currentColor" height="13px" width="13px"
                                version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg"
                                xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 512 512"
                                style="enable-background:new 0 0 512 512;" xml:space="preserve">
                                <g>
                                    <g>
                                        <path d="M256,0C114.837,0,0,114.837,0,256s114.837,256,256,256s256-114.837,256-256S397.163,0,256,0z M277.333,256
                                              c0,11.797-9.536,21.333-21.333,21.333h-85.333c-11.797,0-21.333-9.536-21.333-21.333s9.536-21.333,21.333-21.333h64v-128
                                   c0-11.797,9.536-21.333,21.333-21.333s21.333,9.536,21.333,21.333V256z"></path>
                                    </g>
                                </g>
                            </svg>
                            <span class="ml-1">{{ date('d M Y', strtotime($blogpost->created_at)) }}</span>
                        </span>

                        <a href="#" class="flex flex-row items-center mr-3 hover:text-indigo-600">
                            <svg class="text-indigo-600" fill="currentColor" height="16px" aria-hidden="true"
                                role="img" focusable="false" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path fill="currentColor"
                                    d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z">
                                </path>
                                <path d="M0 0h24v24H0z" fill="none"></path>
                            </svg>
                            <span class="ml-1">Hassan - Laramic</span>
                        </a>
                        @auth

                            <div class="flex justify-center space-x-3 font-funny ml-24 items-end">
                                <a href="/blog-post/{{ $blogpost->id }}/edit"
                                    href="/blog-post/{{ $post->slug }}-{{ $post->post_id }}/edit"
                                    class="text-sm hover:underline">Edit</a>
                                <button>Delete</button>
                            </div>
                        @endauth
                    </div>

                    <hr>

                    <div class="w-full">
                        <img src="{{ asset('/storage/' . $blogpost->image) }}" alt="">
                    </div>

                    <div class="content-container">
                        <p class="my-5 text-base leading-8">
                            {!! $blogpost->content !!}
                        </p>
                    </div>

                    <div class="flex flex-col items-center justify-center w-full m-auto">
                        <img src="{{ asset('/images/the-end.png') }}" alt="" width="100" />
                        <small class="mb-10 text-xl md:text-3xl font-funny">
                            You got to the bottom <span class="animate-pulse">🤪</span>
                        </small>
                    </div>






                </div>

            </div>
        </div>
    </div>

</div>
