@props(['link', 'name'])

<div class="lg:w-1/3 px-3 pb-6 ">
    <div class="bg-white p-3 rounded-lg card-shadow">
        <h3 class="font-normal text-xl py-4 -ml-3 mb-3 border-l-4 border-green-300 pl-4"><a href="{{ $link }}">{{ $name }}</a></h3>
        <div class="text-gray-500 pl-2">{{ $slot }}</div>
    </div>
</div>
