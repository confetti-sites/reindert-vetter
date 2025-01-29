@php($section = newRoot(new \model\homepage\social_proof)->label('Hero'))
<!-- From https://flowbite.com/blocks/marketing/social-proof/ -->
<section class="bg-white dark:bg-gray-900">
    <div class="max-w-screen-xl px-4 py-8 mx-auto text-center lg:py-16 lg:px-6">
        <dl class="grid max-w-screen-md gap-8 mx-auto text-gray-900 sm:grid-cols-3 dark:text-white">
            @foreach($section->list('social_proof')->min(3)->max(3)->get() as $item)
                <div class="flex flex-col items-center justify-center">
                    <dt class="mb-2 text-3xl md:text-4xl font-extrabold">{{ $item->text('number')->max(5) }}</dt>
                    <dd class="font-light text-gray-500 dark:text-gray-400">{{ $item->text('description')->max(20) }}</dd>
                </div>
            @endforeach
        </dl>
    </div>
</section>
