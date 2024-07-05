<x-user-layout>
    <section class="h-screen bg-gray-50 flex items-center">
        <div class="w-full bg-cover bg-center py-32" style="background-image: url('{{asset('imgs/hero.jpg')}}');">
            <div class="container mx-auto text-center text-white">
                <h1 class="text-5xl font-medium text-black mb-6">Welcome to <span class="font-bold text-[#0000FF]">{{config('app.name')}}</span></h1>
                <p class="text-xl mb-12">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam viverra euismod odio, gravida pellentesque urna varius vitae.</p>
                <a href="#" class="bg-[#0000FF] text-white py-4 px-12 rounded-full hover:bg-blue-800">Demo</a>
            </div>
        </div>
    </section>
    <section class="bg-white">
        <div class="container mx-auto px-4 py-10 mb-16 relative">
            <div class="text-center">
                <h1 class="text-3xl font-bold mb-6">Discover the Available Properties for You</h1>
            </div>
            <div onclick="filterByLocals()" class="cursor-pointer block lg:hidden text-center active:ring-4 active:ring-[#0000FF] my-10 border-2 border-[#0000FF] p-4 rounded-2xl max-w-52">
                <button class="text-2xl font-normal text-[#0000FF]">Filter By Locals</button>
            </div>
            <div class="flex space-x-2">
                <div id="filterSide" class="hidden lg:block transition transform -translate-x-80 lg:translate-x-0 ease-in-out duration-300  w-1/3 lg:w-1/4 flex flex-col items-center space-y-4 h-screen overflow-y-scroll p-4 bg-white fixed lg:relative z-40">
                    <button class="bg-[#0000FF] text-white py-3 h-14 w-48 px-5 rounded-xl">
                           <a href="/home">All</a>
                    </button>   
                    @foreach ($locals as $local)
                    <form action="{{route('filter')}}" method="get">
                        <input type="hidden" name="local" value="{{$local}}">
                        <button type="submit" class="bg-[#0000FF] text-white py-3 h-14 w-48 px-5 rounded-xl">
                            {{$local}}
                        </button>
                    </form>
                    @endforeach
                </div>
                <div class="flex flex-wrap w-full justify-evenly gap-1">
                    @foreach ($properties as $property)
                    <div class="w-full md:w-1/2 xl:w-1/3 px-4">
                        <div class="bg-white rounded-lg overflow-hidden mb-10 shadow hover:shadow-2xl shadow-[#0000FF] hover:shadow-[#0000FF] hover:shadow">
                            <img src="{{asset('storage/'.$property->image)}}" alt="image" class="w-full h-56 object-cover object-center" /> 
                            <div class="pb-8 px-8 sm:px-9 sm:pb-9 md:px-7 md:pb-7 xl:pb-9 xl:px-9 text-center">
                                <h3>
                                    <a href="javascript:void(0)" class="font-semibold text-dark text-xl sm:text-[22px] md:text-xl lg:text-[22px] xl:text-xl 2xl:text-[22px] mb-4 block hover:text-primary">
                                        {{$property->title}}
                                    </a>
                                </h3>
                                <p class="text-base text-body-color leading-relaxed mb-7">
                                    {{substr($property->description, 0, 20)}} 
                                    @if (strlen($property->description) > 30)
                                        <button onclick="readMore(`{{$property->id}}`)" class="text-[#0000FF] font-normal text-sm italic">Read more...</button> 
                                    @endif
                                </p>
                                <div class="flex flex-col justify-between space-x-4">
                                    <p class="capitalize font-normal text-md">
                                        Location: <span class="text-[#0000FF] font-semibold text-md">{{$property->local}}</span>
                                    </p>
                                    <p class="capitalize font-normal text-md">
                                        Price: <span class="text-[#0000FF] font-semibold text-md">{{$property->price}} DH</span>
                                    </p>
                                </div>
                                <p class="capitalize text-center py-1 px-2 text-white mt-4 rounded text-center border-2 {{ $property->tenant ? 'border-red-600 bg-red-600' : 'border-[#0000FF] bg-[#0000FF]'}}">
                                    {{ $property->tenant ? 'Rented' : 'Available'}}
                                </p>
                            </div>
                        </div>
                    </div>
                    <div id="readMore{{$property->id}}" class="hidden min-w-screen h-screen animated fadeIn faster fixed left-0 top-0 flex justify-center items-center inset-0 z-50 outline-none focus:outline-none bg-no-repeat bg-center bg-cover">
                        <div class="absolute bg-black opacity-80 inset-0 z-0"></div>
                        <div class="w-full max-w-lg p-10 mx-auto my-auto rounded-xl shadow-lg bg-white mt-20">
                            <button onclick="readMore(`{{$property->id}}`)" class="w-full flex justify-end">
                                <x-icon name="close" class="float-right" />
                            </button>
                            <div class="flex flex-col gap-5 text-center">
                                <p class="text-3xl font-semibold italic text-[#0000FF]">
                                    {{$property->title}}
                                </p>
                                <p class="text-lg font-Normal">
                                    {{$property->description}}
                                </p>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    <script>
        function filterByLocals() {
            var filterSide = document.getElementById('filterSide');
            if (filterSide.classList.contains('hidden')) {
                filterSide.classList.remove('hidden', '-translate-x-full');
                filterSide.classList.add('translate-x-0', 'fixed', 'top-0', 'left-0');
            } else {
                filterSide.classList.add('hidden', '-translate-x-full');
                filterSide.classList.remove('translate-x-0', 'fixed', 'top-0', 'left-0');
            }
        }

        
    </script>
</x-user-layout>
