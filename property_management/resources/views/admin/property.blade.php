<x-admin-layout>

    
    <!-- ====== Cards Section Start -->
    <section class=" pb-10 lg:pb-20 bg-white">
        <div class="container">
            <x-error-input class="mt-2" :messages="$errors->all()" />
            <div class="flex justify-between  items-center">
            <p class="text-left text-4xl font-Normal italic text-[#0000FF] ">Propeties</p>
            <button onclick="CreateModel()" class="flex duration-300 ease-in-out bg-[#0000FF] hover:bg-white hover:text-[#0000FF] text-white font-semibold border border-[#0000FF] py-1 px-2 rounded">
               <x-icon name="add"/>
               <span class="ml-2">Add Property</span>
            </button>
         </div>
       <div class="w-full border-2 border-[#0000FF] my-3  "></div>
      <div class="flex flex-wrap -mx-4">
         @foreach ($properties as $property )
         <div class="w-full md:w-1/2 xl:w-1/3 px-4">
            <div class="bg-white rounded-lg overflow-hidden mb-10 shadow hover:shadow-2xl shadow-[#0000FF] hover:shadow-[#0000FF] hover:shadow">
               <img
                  src="{{asset('storage/'.$property->image)}}"
                  alt="image"
                  class="w-full"
                  />    
               <div class="p-8 sm:p-9 md:p-7 xl:p-9 text-center">
                  <h3>
                     <a
                        href="javascript:void(0)"
                        class="
                        font-semibold
                        text-dark text-xl
                        sm:text-[22px]
                        md:text-xl
                        lg:text-[22px]
                        xl:text-xl
                        2xl:text-[22px]
                        mb-4
                        block
                        hover:text-primary
                        "
                        >
                     {{$property->title}}
                     </a>
                  </h3>
                  <p class="text-base text-body-color leading-relaxed mb-7">
                     {{$property->description}}
                  </p>
                  <div class="flex flex-col justify-between space-x-4">
                     <p class="capitalize font-normal text-md">
                       location : <span class="text-[#0000FF] font-semibold text-md">{{$property->local}}</span>
                     </p>
                     <p class="capitalize font-normal text-md ">
                       price : <span class="text-[#0000FF] font-semibold text-md ">{{$property->price}} DH</span> 
                     </p>
                    
                  </div>
                      <p class="capitalize text-center py-1 px-2 text-white mt-4 text-center border-2 border-[#0000FF] rounded bg-[#0000FF] ">
                            {{$property->status}}
                        </p>
               </div>
            </div>
         </div>
            
         @endforeach
         
            
      </div>
   </div>
</section>
<!-- ====== Cards Section End -->




<div id="addProperty" class="hidden min-w-screen h-screen animated fadeIn faster  fixed  left-0 top-0 flex justify-center items-center inset-0 z-50 outline-none focus:outline-none bg-no-repeat bg-center bg-cover">
            <div class="absolute bg-black opacity-80 inset-0 z-0"></div>
            <div class="w-full  max-w-lg p-5 relative mx-auto my-auto rounded-xl shadow-lg  bg-white mt-20 ">
	<form action="{{route('properties.store')}}" method="post" enctype="multipart/form-data">
        @csrf
        @method('POST')
        <div class=" flex flex-col gap-5">
                <div class="relative z-0 mb-6 w-full group">
                        <input type="file" name="image" id="image" class="block py-2.5 px-0 w-full text-md  bg-transparent border-0 border-b-2 border-[#0000FF] appearance-none  border-[#0000FF] focus:border-blue-300 focus:outline-none focus:ring-0  peer" placeholder=" "  />
                        <label for="image" class="absolute text-md  text-[#0000FF] duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-300 peer-focus:text-blue-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">
                            Image
                        </label>
                    </div>
                    <div class="grid xl:grid-cols-2 xl:gap-6">

                    <div class="relative z-0 mb-6 w-full group pt-5">
                        <input type="text" name="title" id="title" class="block py-2.5 px-0 w-full text-md  bg-transparent border-0 border-b-2 border-[#0000FF] appearance-none  border-[#0000FF] focus:border-blue-300 focus:outline-none focus:ring-0  peer" placeholder=" "  />
                        <label for="title" class="absolute text-md  text-[#0000FF] duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-300 peer-focus:text-blue-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">
                            Title
                        </label>
                    </div>
                    <div class="relative z-0 mb-6 w-full group">
                        <label for="owner" class="text-[#0000FF]">Owner</label>
                        <select name="owner_id" id="owner" class="block py-2.5 px-3 w-full text-md bg-transparent border-0 border-b-2 border-[#0000FF] appearance-none focus:border-blue-600 focus:outline-none focus:ring-0">
                            <option value="" selected disabled class="text-[#0000FF]">Choose Owner</option>
                            @foreach ($owners as $owner)
                                <option value="{{ $owner->id }}">{{ $owner->name }}</option>
                            @endforeach                         
                        </select>  
                    </div>
                </div>
            
            <div class="grid xl:grid-cols-2 xl:gap-6">
                    <div class="relative z-0 mb-6 w-full group">
                        <input type="text" name="local" id="title" class="block py-2.5 px-0 w-full text-md  bg-transparent border-0 border-b-2 border-[#0000FF] appearance-none  border-[#0000FF] focus:border-blue-300 focus:outline-none focus:ring-0  peer" placeholder=" "  />
                        <label for="local" class="absolute text-md  text-[#0000FF] duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-300 peer-focus:text-blue-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">
                            Local
                        </label>
                    </div>
                    <div class="relative z-0 mb-6 w-full group">
                        <input type="number" name="price" id="price" class="block py-2.5 px-0 w-full text-md  bg-transparent border-0 border-b-2 border-[#0000FF] appearance-none  border-[#0000FF] focus:border-blue-300 focus:outline-none focus:ring-0  peer" placeholder=" "  />
                        <label for="price" class="absolute text-md  text-[#0000FF] duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-300 peer-focus:text-blue-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">
                            Price
                        </label>
                    </div>
            </div>
                   
          
            <div class="relative z-0 mb-6 w-full group">
                <input type="text" name="description" id="description" class="block py-2.5 px-0 w-full text-md  bg-transparent border-0 border-b-2 border-[#0000FF] appearance-none  border-[#0000FF] focus:border-blue-300 focus:outline-none focus:ring-0  peer" placeholder=" "  />
                <label for="description" class="absolute text-md  text-[#0000FF] duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-300 peer-focus:text-blue-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">
                    Description
                </label>
            </div>		
            </div>
            <div class="flex justify-end w-full space-x-10">	
            <button onclick="CreateModel()" class="text-white max-w-lg bg-red-600 hover:bg-white hover:text-red-600 border border-red-600 focus:ring-4 focus:ring-red-600 font-medium rounded-lg text-md w-full sm:w-auto px-5 py-2.5 text-center ">Close</button>
		<button type="submit" class="text-white max-w-lg bg-[#0000FF] hover:bg-white hover:text-[#0000FF] border border-[#0000FF] focus:ring-4 focus:ring-[#0000FF] font-medium rounded-lg text-md w-full sm:w-auto px-5 py-2.5 text-center ">Save</button>
        </div>	
    </form>
    </div>
</div>

</x-admin-layout>