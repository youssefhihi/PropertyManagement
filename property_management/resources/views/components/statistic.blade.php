@props(['name','count','icon'])
<div class = "w-full lg:w-1/3 p-2">
<div class = "flex items-center flex-row w-full bg-gradient-to-r from-[#0000FF] via-blue-500 to-blue-200 rounded-md p-3">


                    <div class = "flex text-[#0000FF]  items-center bg-blue-100 p-2 rounded-md flex-none  md:w-12 md:h-12 ">
                       <x-icon name="{{$icon}}"/>
                    </div>
                    <div class = "flex flex-col justify-around flex-grow ml-5  text-white">
                        <div class = "text-xs whitespace-nowrap">
                            {{$name}}
                        </div>
                        <div class = "">
                            {{$count}}
                        </div>
                    </div>
                    <div class = " flex items-center flex-none text-white">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" strokeWidth={1.5} stroke="currentColor" class = "w-6 h-6">
                            <path strokeLinecap="round" strokeLinejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" />
                        </svg>

                    </div>
                </div>
</div>