<x-admin-layout>
<x-error-input class="mt-2" :messages="$errors->all()" />
<x-success-message class="mt-2"/>
            <div class="flex justify-between p-2 items-center flex-row w-full bg-[#0000FF] rounded-md">
                <div></div>                    
                <div class="ml-3 cursor-pointer text-white pr-8" onclick="CreateOwner()">
                        <x-icon name="add"/>
                </div>
            </div> 
                    <table class="min-w-full overflow-x-scroll divide-y divide-blue-200 mt-6 ">
                        <thead class="bg-blue-300 ">
                            <tr>
                                <x-table.th name="ID"/> 
                                <x-table.th name="Name"/> 
                                <x-table.th name="Phone"/> 
                                <x-table.th name="CIN"/>                
                                <x-table.th name="Operarion"/>                
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-blue-200">   
                        @foreach ($owners as $owner)
                            <x-table.tr>
                                <x-table.td>
                                    <div class="text-sm text-gray-900">#{{$loop->index}}</div>
                                </x-table.td>
                                <x-table.td>
                                    <div class="text-sm font-medium text-gray-900">{{$owner->name}}</div>
                                </x-table.td>
                                <x-table.td>
                                    <div class="text-sm font-medium text-gray-900">{{$owner->phone}}</div>
                                </x-table.td>
                                <x-table.td>
                                    <div class="text-sm font-medium text-gray-900">{{$owner->CIN}}</div>
                                </x-table.td>
                                <x-table.td>
                                    <div class="flex justify-center space-x-3">
                                    <form id="deleteOwnerForm{{$owner->id}}" action="{{ route('owners.destroy', $owner) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button type="button" class="deleteOwnerButton" data-index="{{$owner->id}}"><x-icon name="delete" class="w-8 h-8"/></button>
                                    </form>                 
                                    <a href="{{route('owners.edit', $owner)}}"><x-icon name="update"/></a>
                                    </div>
                                </x-table.td>
                            </x-table.tr>     
                            @endforeach
                            </tbody>
                        </table>









<div id="addOwner" class="hidden min-w-screen h-screen animated fadeIn faster  fixed  left-0 top-0 flex justify-center items-center inset-0 z-50 outline-none focus:outline-none bg-no-repeat bg-center bg-cover">
    <div class="absolute bg-black opacity-80 inset-0 z-0"></div>
    <div class="w-full  max-w-lg p-5 relative mx-auto my-auto rounded-xl shadow-lg  bg-white mt-20 ">
	<form id="ownerCreateForm" action="{{route('owners.store')}}" method="post" enctype="multipart/form-data">
        @csrf
        @method('POST')
        <div class=" flex flex-col gap-5">

                    <div class="relative z-0 mb-6 w-full group">
                        <input type="text" name="name" id="name-create" class="block py-2.5 px-0 w-full text-md  bg-transparent border-0 border-b-2 border-[#0000FF] appearance-none  border-[#0000FF] focus:border-blue-300 focus:outline-none focus:ring-0  peer" placeholder=" "  />
                        <label for="name" class="absolute text-md  text-[#0000FF] duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-300 peer-focus:text-blue-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">
                            Name
                        </label>
                        <p id="name-error" class="hidden text-red-500 text-xs mt-1">invalid name format</p>
                    </div>
                    
            
                    <div class="relative z-0 mb-6 w-full group">
                        <input type="text" name="CIN" id="CIN-create" class="block py-2.5 px-0 w-full text-md  bg-transparent border-0 border-b-2 border-[#0000FF] appearance-none  border-[#0000FF] focus:border-blue-300 focus:outline-none focus:ring-0  peer" placeholder=" "  />
                        <label for="CIN" class="absolute text-md  text-[#0000FF] duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-300 peer-focus:text-blue-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">
                            CIN
                        </label>
                        <p id="CIN-error" class="hidden text-red-500 text-xs mt-1">invalid CIN format</p>
                    </div>
                    <div class="relative z-0 mb-6 w-full group">
                        <input type="text" name="phone" id="phone-create" class="block py-2.5 px-0 w-full text-md  bg-transparent border-0 border-b-2 border-[#0000FF] appearance-none  border-[#0000FF] focus:border-blue-300 focus:outline-none focus:ring-0  peer" placeholder=" "  />
                        <label for="phone" class="absolute text-md  text-[#0000FF] duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-300 peer-focus:text-blue-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">
                            phone number
                        </label>
                        <p id="phone-error" class="hidden text-red-500 text-xs mt-1">invalid phone number format</p>
            </div>	
            </div>
            <div class="flex justify-end w-full space-x-10">	
            <button type="button" onclick="CreateOwner()" class="text-white max-w-lg bg-red-600 hover:bg-white hover:text-red-600 border border-red-600 focus:ring-4 focus:ring-red-600 font-medium rounded-lg text-md w-full sm:w-auto px-5 py-2.5 text-center ">Close</button>
		<button type="submit" class="text-white max-w-lg bg-[#0000FF] hover:bg-white hover:text-[#0000FF] border border-[#0000FF] focus:ring-4 focus:ring-[#0000FF] font-medium rounded-lg text-md w-full sm:w-auto px-5 py-2.5 text-center ">Save</button>
        </div>	
    </form>
    </div>
</div>


                    <script>    
                    document.querySelectorAll('.deleteOwnerButton').forEach(button => {
                      button.addEventListener('click', function() {
                          console.log("Delete button clicked!");
                          const OwnerID = this.getAttribute('data-index');
                          if (confirm("Are you sure you want to delete this Owner? ")) {
                              document.getElementById('deleteOwnerForm' + OwnerID).submit();
                          }
                      });
                    });
                </script>



</x-admin-layout>