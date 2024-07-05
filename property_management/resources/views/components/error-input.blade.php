@props(['messages'])

@if ($messages)
<div class="flex flex-col gap-0.5 mb-1">
  @foreach ((array) $messages as $message)
  <div {!! $attributes->merge(['class' => ' bg-red-100 text-red-800  text-center  py-1 rounded relative']) !!} role="alert">
        
        <div class="inline-block max-sm:mb-2">
          <svg xmlns="http://www.w3.org/2000/svg" class="w-5 fill-red-500 inline" viewBox="0 0 32 32">
            <path
              d="M16 1a15 15 0 1 0 15 15A15 15 0 0 0 16 1zm6.36 20L21 22.36l-5-4.95-4.95 4.95L9.64 21l4.95-5-4.95-4.95 1.41-1.41L16 14.59l5-4.95 1.41 1.41-5 4.95z"
              data-original="#ea2d3f" />
          </svg>
          <strong class="font-bold text-base">Error!</strong>
        </div>
        <span class="block sm:inline text-sm mx-1 max-sm:ml-0 max-sm:mt-1 text-red-700">{{ $message }}</span>    
        
      </div>
        @endforeach
  </div>
  
@endif