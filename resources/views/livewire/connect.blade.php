<div >
<div class="flex flex-col items-center justify-center h-screen overflow-hidden overflow-y-auto sm:flex-row">
    <div class="flex ">
        <img src="/storage/images/d.gif" alt="" width="400" />
    </div>
    <form class='p-5' wire:submit='send'>
        <div class="flex flex-col space-y-2">
            <h2 class='text-3xl'>Looks like you need some help</h2>
            <h1 class='text-5xl font-bold '>Reach Out!</h1>
            <p class='w-full max-w-xl my-2 text-sm font-funny'>
                I usually reply within an hour—unless, of course, I'm indulging in a rare developer nap (you know, those
                legendary 2-3 hour snoozes). If it takes a bit longer, blame the code dreams! Can't wait to hear from
                you. 🚀✨</p>
        </div>

        <div class="flex flex-col space-y-3">
            <x-text-input placeholder='John doe' required wire:model.blur='name' />
            @error('name') <span class="error">{{ $message }}</span> @enderror
            <x-text-input type='email' placeholder='example@gmail.com' required wire:model='email' />

            <textarea name="" placeholder="What's the issue" wire:model='content' class=' w-full rounded-md border-0 py-1.5 pl-3 pr-20 text-gray-900 ring-1 ring-inset ring-gray-300  outline-none resize-none' rows={4} value={data.reason}></textarea>
        </div>

        <button class='mt-5'>Connnect
            <span wire:loading>...</span>
        </button>
    </form>
</div>
</div>
