@php($feature = newRoot(new \model\homepage\feature)->label('Feature'))
<!-- From https://flowbite.com/blocks/marketing/feature/ -->
<div class="overflow-hidden bg-white py-24 sm:py-32">
    <div class="mx-auto max-w-7xl px-6 lg:px-8">
        <div class="mx-auto grid max-w-2xl grid-cols-1 gap-x-8 gap-y-16 sm:gap-y-20 lg:mx-0 lg:max-w-none lg:grid-cols-2">
            <div class="lg:pt-4 lg:pr-8">
                <div class="lg:max-w-lg">
                    <h2 class="text-base/7 font-semibold text-indigo-600">Deploy faster</h2>
                    <p class="mt-2 text-4xl font-semibold tracking-tight text-pretty text-gray-900 sm:text-5xl">A better workflow</p>
                    <p class="mt-6 text-lg/8 text-gray-600">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Maiores impedit perferendis suscipit eaque, iste dolor cupiditate blanditiis ratione.</p>
                    <dl class="mt-10 max-w-xl space-y-8 text-base/7 text-gray-600 lg:max-w-none">
                        <div class="relative pl-9">
                            <dt class="inline font-semibold text-gray-900">
                                @php($row = $feature->selectFile('icon')->match(['/website/homepage/icons/*.svg']))
                                @php
                                    echo '<pre>';
                                    var_dump($row);
                                    echo '</pre>';
                                    exit("<br>exit method: " . __METHOD__ . " <br>file: " . __FILE__ . ":" . __LINE__);
                                @endphp
                                @include($row->get())
                                Push to deploy.
                            </dt>
                            <dd class="inline">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Maiores impedit perferendis suscipit eaque, iste dolor cupiditate blanditiis ratione.</dd>
                        </div>
                    </dl>
                </div>
            </div>
            <img src="https://tailwindui.com/plus/img/component-images/dark-project-app-screenshot.png" alt="Product screenshot" class="w-[48rem] max-w-none rounded-xl ring-1 shadow-xl ring-gray-400/10 sm:w-[57rem] md:-ml-4 lg:-ml-0" width="2432" height="1442">
        </div>
    </div>
</div>
