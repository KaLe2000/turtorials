@props(['link', 'name'])

<div class="w-1/3 px-3 pb-6 ">
    <div class="bg-white p-3 rounded shadow">
        <h3 class="font-normal text-xl py-4"><a href="{{ $link }}">{{ $name }}</a></h3>
        <div class="text-gray-500">{{ $slot }}</div>
    </div>
</div>
