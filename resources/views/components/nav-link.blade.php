@props(['active' => false])

<a class="{{ $active ? ' text-[#2E382E] border-b-2 border-[#2E382E] font-bold': 'text-gray-600 hover:text--[#2E382E]'}} pb-2 "
   aria-current="{{ $active ? 'page': 'false' }}"
   {{ $attributes }}
>{{ $slot }}</a>
