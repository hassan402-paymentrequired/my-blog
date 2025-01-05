<div class="h-screen overflow-hidden  p-10 borde[700] font-b font-funny hidden md:flex">
    <div class="flex flex-col items-start w-full h-full ">
        <div class="flex flex-col gap-3">
            <div class="w-16 h-16 rounded-full">
                <img
                    src="{{ asset('images/avatar.jpeg') }}"
                    alt="my image"
                    class="object-cover w-full h-full rounded-full"
                />
            </div>

            <div class="flex flex-col gap-y-3">
                <p class="w-full text-xs max-w-[150px] font-robo tracking-wider">
                    Hey there! I'm Hassan, and this is my blog where i share
                    my thoughts and experiences through writing.
                    <span class="font-bold text-green-600 ">
                        Learn more <a href="#" class="underline">about me here</a>
                    </span>
                </p>

                <div class="flex items-center space-x-2">
                    {{--  <Link href="#">
                        <LinkedinIcon size={15} />
                    </Link>
                    <Link href="#">
                        <Twitter size={15} />
                    </Link>  --}}
                </div>
            </div>
        </div>

        <div class="flex items-end flex-1 w-full h-full ">
            <ul class="flex flex-col space-y-1">
                <li>
                    <x-link :is_active="false" link="/" class="text-base font-semibold ">
                        Article
                    </x-link>
                </li>
                 <li>
                     <x-link :is_active="false" link="/connect" class="text-base font-semibold ">
                        Connect
                     </x-link>
                </li>
                 <li>
                     {{-- <x-link :is_active="false" link="/create-blog-post" class="text-base font-semibold ">
                        create post
                     </x-link> --}}
                </li>
               {{--  <li>
                    <NavLink active={false} href="#" class="text-base font-semibold ">
                        Podcast
                    </NavLink>
                </li>
                <li>
                    <NavLink active={false} href="/create-blog-post" class="text-base font-semibold ">
                        Projects
                    </NavLink>
                </li>  --}}
            </ul>
        </div>


    </div>
</div>


{{-- git add . && git commit -m "updated code" && git push https://github.com/username/repository.git main --}}
