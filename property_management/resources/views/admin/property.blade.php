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
                  class="w-full h-56 object-cover object-center"
                  /> 
               <div class="flex justify-end items-end p-4">   
                  <button onclick="editModelProperty(`{{$property->id}}`)">
                      <x-icon name="update" class="pb-7"/>
                  </button>
                  <form action="{{route('properties.destroy', $property)}}" method="POST" id="deletePropertyForm{{$property->id}}">
                      @csrf
                      @method('DELETE')
                      <button type="submit" class="deletePropertyButton" data-index="{{$property->id}}">
                          <x-icon name="delete" />
                      </button>
                  </form>
               </div>
               <div class="pb-8  px-8 sm:px-9 sm:pb-9 md:px-7 md:pb-7 xl:pb-9 xl:px-9 text-center">
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
                  {{substr($property->description, 0, 20)}} 
                  @if (strlen($property->description) > 30)
                      <button onclick="readMore(`{{$property->id}}`)" class="text-[#0000FF] font-normal text-sm italic">Read more...</button> 
                  @endif
                  </p>
                  <div class="flex flex-col justify-between space-x-4">
                     <p class="capitalize font-normal text-md">
                       location : <span class="text-[#0000FF] font-semibold text-md">{{$property->local}}</span>
                     </p>
                     <p class="capitalize font-normal text-md ">
                       price : <span class="text-[#0000FF] font-semibold text-md ">{{$property->price}} DH</span> 
                     </p>
                    
                  </div>
                      <p class="capitalize text-center py-1 px-2 text-white mt-4 rounded text-center border-2 {{ $property->tenant ? 'border-red-600  bg-red-600' : 'border-[#0000FF]  bg-[#0000FF]'}} ">
                        {{ $property->tenant ? 'Rented' : 'Available'}}
                    </p>
               </div>
            </div>
         </div>
         <div id="readMore{{$property->id}}" class="hidden min-w-screen h-screen animated fadeIn faster  fixed  left-0 top-0 flex justify-center items-center inset-0 z-50 outline-none focus:outline-none bg-no-repeat bg-center bg-cover">
            <div class="absolute bg-black opacity-80 inset-0 z-0"></div>
            <div class="w-full  max-w-lg p-10 relative mx-auto my-auto rounded-xl shadow-lg  bg-white mt-20 ">
                <button onclick="readMore(`{{$property->id}}`)" class="w-full flex justify-end">
                    <x-icon name="close" class="float-right"  />
                </button>
            <div class="flex flex-col gap-5 text-center">
                <p class="text-3xl font-semibold italic text-[#0000FF] ">
                    {{$property->title}}
                </p>
                <p class="text-lg font-Normal  ">
                    {{$property->description}}
                </p>
            </div>
            </div>
            </div>
            <div id="editProperty{{$property->id}}" class="hidden min-w-screen h-screen fixed left-0 top-0 flex justify-center items-center inset-0 z-50 outline-none focus:outline-none bg-no-repeat bg-center bg-cover">
            <div class="absolute bg-black opacity-80 inset-0 z-0"></div>
                    <div class="w-full max-w-lg p-5 relative mx-auto my-auto rounded-xl shadow-lg overflow-y-scroll h-5/6 bg-white mt-20">
                    <form class="edit-form" action="{{ route('properties.update', $property) }}" method="post" enctype="multipart/form-data" data-property-id="{{$property->id}}">
                    @csrf
                    @method('PUT')
                    <div class="flex flex-col gap-5">
                        <div class="relative z-0 mb-6 w-full group">
                            <input value="{{$property->image}}" type="file" name="image" id="image-edit" class="block py-2.5 px-0 w-full text-md bg-transparent border-0 border-b-2 border-[#0000FF] appearance-none border-[#0000FF] focus:border-blue-300 focus:outline-none focus:ring-0 peer" placeholder=" " />
                            <label for="image" class="absolute text-md text-[#0000FF] duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-300 peer-focus:text-blue-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">
                                Image
                            </label>
                            <p id="image-error-edit" class="hidden text-red-500 text-xs mt-1">Please upload an image</p>
                        </div>
                        <div class="grid xl:grid-cols-2 xl:gap-6">
                            <div class="relative z-0 mb-6 w-full group pt-5">
                                <input value="{{$property->title}}" type="text" name="title" id="title-edit" class="block py-2.5 px-0 w-full text-md bg-transparent border-0 border-b-2 border-[#0000FF] appearance-none border-[#0000FF] focus:border-blue-300 focus:outline-none focus:ring-0 peer" placeholder=" " />
                                <label for="title" class="absolute text-md text-[#0000FF] duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-300 peer-focus:text-blue-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">
                                    Title
                                </label>
                                <p id="title-error-edit" class="hidden text-red-500 text-xs mt-1">Invalid title format</p>
                            </div>
                            <div class="relative z-0 mb-6 w-full group">
                                <label for="owner" class="text-[#0000FF]">Owner</label>
                                <select name="owner_id" id="owner-edit" class="block py-2.5 px-3 w-full text-md bg-transparent border-0 border-b-2 border-[#0000FF] appearance-none focus:border-blue-600 focus:outline-none focus:ring-0">
                                    @foreach ($owners as $owner)
                                    <option value="{{ $owner->id }}" {{ $owner->id == $property->owner_id ? 'selected' : '' }}>{{ $owner->name }}</option>
                                    @endforeach
                                </select>
                                <p id="owner-error-edit" class="hidden text-red-500 text-xs mt-1">Please select an owner</p>
                            </div>
                        </div>

                        <div class="grid xl:grid-cols-2 xl:gap-6">
                            <div class="relative z-0 mb-6 w-full group">
                                <input value="{{$property->local}}" type="text" name="local" id="local-edit" class="block py-2.5 px-0 w-full text-md bg-transparent border-0 border-b-2 border-[#0000FF] appearance-none border-[#0000FF] focus:border-blue-300 focus:outline-none focus:ring-0 peer" placeholder=" " />
                                <label for="local" class="absolute text-md text-[#0000FF] duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-300 peer-focus:text-blue-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">
                                    Local
                                </label>
                                <p id="local-error-edit" class="hidden text-red-500 text-xs mt-1">Invalid local format</p>
                            </div>
                            <div class="relative z-0 mb-6 w-full group">
                                <input value="{{$property->price}}" type="number" name="price" id="price-edit" class="block py-2.5 px-0 w-full text-md bg-transparent border-0 border-b-2 border-[#0000FF] appearance-none border-[#0000FF] focus:border-blue-300 focus:outline-none focus:ring-0 peer" placeholder=" " />
                                <label for="price" class="absolute text-md text-[#0000FF] duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-300 peer-focus:text-blue-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">
                                    Price
                                </label>
                                <p id="price-error-edit" class="hidden text-red-500 text-xs mt-1">Invalid price format</p>
                            </div>
                        </div>

                        <div class="relative z-0 mb-6 w-full group">
                            <input value="{{$property->description}}" type="text" name="description" id="description-edit" class="block py-2.5 px-0 w-full text-md bg-transparent border-0 border-b-2 border-[#0000FF] appearance-none border-[#0000FF] focus:border-blue-300 focus:outline-none focus:ring-0 peer" placeholder=" " />
                            <label for="description" class="absolute text-md text-[#0000FF] duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-300 peer-focus:text-blue-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">
                                Description
                            </label>
                            <p id="description-error-edit" class="hidden text-red-500 text-xs mt-1">Invalid description format</p>
                        </div>
                    </div>
                    <div class="flex justify-end w-full space-x-10">
                        <button type="button" onclick="editModel('{{$property->id}}')" class="text-white max-w-lg bg-red-600 hover:bg-white hover:text-red-600 border border-red-600 focus:ring-4 focus:ring-red-600 font-medium rounded-lg text-md w-full sm:w-auto px-5 py-2.5 text-center">
                            Close
                        </button>
                        <button type="submit" class="text-white max-w-lg bg-[#0000FF] hover:bg-white hover:text-[#0000FF] border border-[#0000FF] focus:ring-4 focus:ring-[#0000FF] font-medium rounded-lg text-md w-full sm:w-auto px-5 py-2.5 text-center">
                            Save
                        </button>
                    </div>
                </form>
            </div>
</div>
 @endforeach
         
            
      </div>
   </div>
</section>
<!-- ====== Cards Section End -->




<div id="addProperty" class="hidden min-w-screen h-screen animated fadeIn faster  fixed  left-0 top-0 flex justify-center items-center inset-0 z-50 outline-none focus:outline-none bg-no-repeat bg-center bg-cover">
            <div class="absolute bg-black opacity-80 inset-0 z-0"></div>
            <div class="w-full  max-w-lg p-5 relative mx-auto my-auto rounded-xl shadow-lg  bg-white mt-20 overflow-y-scroll h-5/6 ">
            <form id="propertyCreateForm" action="{{route('properties.store')}}" method="post" enctype="multipart/form-data">
        @csrf
        @method('POST')
        <div class="flex flex-col gap-5">
            <div class="relative z-0 mb-6 w-full group">
                <input type="file" name="image" id="image-add" class="block py-2.5 px-0 w-full text-md bg-transparent border-0 border-b-2 border-[#0000FF] appearance-none focus:border-blue-300 focus:outline-none focus:ring-0 peer" placeholder=" " />
                <label for="image" class="absolute text-md text-[#0000FF] duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-300 peer-focus:text-blue-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Image</label>
                <p id="image-error" class="hidden text-red-500 text-xs mt-1">Please upload an image</p>
            </div>
            <div class="grid xl:grid-cols-2 xl:gap-6">
                <div class="relative z-0 mb-6 w-full group pt-5">
                    <input type="text" name="title" id="title-add" class="block py-2.5 px-0 w-full text-md bg-transparent border-0 border-b-2 border-[#0000FF] appearance-none focus:border-blue-300 focus:outline-none focus:ring-0 peer" placeholder=" " />
                    <label for="title" class="absolute text-md text-[#0000FF] duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-300 peer-focus:text-blue-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Title</label>
                    <p id="title-error" class="hidden text-red-500 text-xs mt-1">Invalid title format</p>
                </div>
                <div class="relative z-0 mb-6 w-full group pt-5">
                    <select name="owner_id" id="owner-add" class="block py-2.5 px-0 w-full text-md bg-transparent border-0 border-b-2 border-[#0000FF] appearance-none focus:border-blue-300 focus:outline-none focus:ring-0 peer" placeholder=" ">
                        <option value="" disabled selected>Select Owner</option>
                        @foreach ($owners as $owner)
                            <option value="{{ $owner->id }}">{{ $owner->name }}</option>
                        @endforeach
                    </select>
                    <label for="owner" class="absolute text-md text-[#0000FF] duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-300 peer-focus:text-blue-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Owner</label>
                    <p id="owner-error" class="hidden text-red-500 text-xs mt-1">Please select an owner</p>
                </div>
            </div>
            <div class="relative z-0 mb-6 w-full group">
                <input type="text" name="local" id="local-add" class="block py-2.5 px-0 w-full text-md bg-transparent border-0 border-b-2 border-[#0000FF] appearance-none focus:border-blue-300 focus:outline-none focus:ring-0 peer" placeholder=" " />
                <label for="local" class="absolute text-md text-[#0000FF] duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-300 peer-focus:text-blue-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Local</label>
                <p id="local-error" class="hidden text-red-500 text-xs mt-1">Invalid local format</p>
            </div>
            <div class="grid xl:grid-cols-2 xl:gap-6">
                <div class="relative z-0 mb-6 w-full group">
                    <input type="text" name="price" id="price-add" class="block py-2.5 px-0 w-full text-md bg-transparent border-0 border-b-2 border-[#0000FF] appearance-none focus:border-blue-300 focus:outline-none focus:ring-0 peer" placeholder=" " />
                    <label for="price" class="absolute text-md text-[#0000FF] duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-300 peer-focus:text-blue-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Price</label>
                    <p id="price-error" class="hidden text-red-500 text-xs mt-1">Invalid price, it should be a number</p>
                </div>
                <div class="relative z-0 mb-6 w-full group">
                    <input type="text" name="description" id="description-add" class="block py-2.5 px-0 w-full text-md bg-transparent border-0 border-b-2 border-[#0000FF] appearance-none focus:border-blue-300 focus:outline-none focus:ring-0 peer" placeholder=" " />
                    <label for="description" class="absolute text-md text-[#0000FF] duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-300 peer-focus:text-blue-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Description</label>
                    <p id="description-error" class="hidden text-red-500 text-xs mt-1">Invalid description format</p>
                </div>
            </div>
            <div class="flex justify-end w-full space-x-10">
                <button type="button" onclick="CreateModel()" class="text-white max-w-lg bg-red-600 hover:bg-white hover:text-red-600 border border-red-600 focus:ring-4 focus:ring-red-600 font-medium rounded-lg text-md w-full sm:w-auto px-5 py-2.5 text-center">Close</button>
                <button type="submit" class="text-white max-w-lg bg-[#0000FF] hover:bg-white hover:text-[#0000FF] border border-[#0000FF] focus:ring-4 focus:ring-[#0000FF] font-medium rounded-lg text-md w-full sm:w-auto px-5 py-2.5 text-center">Save</button>
            </div>
        </div>
    </form>


    </div>
</div>

                <script>    
                    document.querySelectorAll('.deletePropertyButton').forEach(button => {
                      button.addEventListener('click', function() {
                          console.log("Delete button clicked!");
                          const propertyID = this.getAttribute('data-index');
                          if (confirm("Are you sure you want to delete this Property? ")) {
                              document.getElementById('deletePropertyForm' + propertyID).submit();
                          }
                      });
                    });
                </script>

</x-admin-layout>