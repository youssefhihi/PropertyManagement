<x-admin-layout>
    
<x-error-input class="mt-2" :messages="$errors->all()" />

            <div class="flex justify-between p-2 items-center flex-row w-full bg-[#0000FF] rounded-md">
                <div>
                <input type="search" name="search" id="search" placeholder="Search" class="placeholder:text-[#0000FF] bg-white text-[#0000FF] px-3 py-1 w-56 rounded focus:outline-none focus:ring-0">
                </div>                    
                <div class="ml-3 cursor-pointer text-white pr-8" onclick="Createtenant()">
                        <x-icon name="add"/>
                </div>
            </div> 
                    <table class="min-w-full overflow-x-scroll divide-y divide-blue-200 mt-6 ">
                        <thead class="bg-blue-300 ">
                            <tr>
                                <x-table.th name="ID"/> 
                                <x-table.th name="Name"/> 
                                <x-table.th name="Property"/> 
                                <x-table.th name="Phone"/> 
                                <x-table.th name="CIN"/>                
                                <x-table.th name="Operarion"/>                
                            </tr>
                        </thead>
                        <tbody id="tbody" class=" hidden bg-white divide-y divide-blue-200">

                        </tbody>
                        <tbody id="oldTbody" class="bg-white divide-y divide-blue-200">   
                        @foreach ($tenants as $tenant)
                            <x-table.tr>
                                <x-table.td>
                                    <div class="text-sm text-gray-900">#{{$loop->index}}</div>
                                </x-table.td>
                                <x-table.td>
                                    <div class="text-sm font-medium text-gray-900">{{$tenant->name}}</div>
                                </x-table.td>
                                <x-table.td>
                                    <div class="text-sm font-medium text-gray-900">{{$tenant->property->title}}</div>
                                </x-table.td>
                                <x-table.td>
                                    <div class="text-sm font-medium text-gray-900">{{$tenant->phone}}</div>
                                </x-table.td>
                                <x-table.td>
                                    <div class="text-sm font-medium text-gray-900">{{$tenant->CIN}}</div>
                                </x-table.td>
                                <x-table.td>
                                    <div class="flex justify-center space-x-3">
                                    <form id="deletetenantForm{{$tenant->id}}" action="{{ route('tenants.destroy', $tenant) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button type="button" class="deletetenantButton" data-index="{{$tenant->id}}"><x-icon name="delete" class="w-8 h-8"/></button>
                                    </form>                 
                                    <button onclick="edittenant(`{{$tenant->id}}`)"><x-icon name="update"/></button>
                                    </div>
                                </x-table.td>
                            </x-table.tr>     
                           


<div id="edittenant{{$tenant->id}}" class="hidden min-w-screen h-screen animated fadeIn faster  fixed  left-0 top-0 flex justify-center items-center inset-0 z-50 outline-none focus:outline-none bg-no-repeat bg-center bg-cover">
    <div class="absolute bg-black opacity-80 inset-0 z-0"></div>
    <div class="w-full  max-w-lg p-5 relative mx-auto my-auto rounded-xl shadow-lg  bg-white mt-20 ">
    <form class="editTenant" action="{{ route('tenants.update', $tenant) }}" method="post" data-tenant-id="{{$tenant->id}}">
    @csrf
    @method('PUT')
        <div class=" flex flex-col gap-5">

                    <div class="relative z-0 mb-6 w-full group">
                        <input value="{{$tenant->name}}" type="text" name="name" id="name-edit" class="block py-2.5 px-0 w-full text-md  bg-transparent border-0 border-b-2 border-[#0000FF] appearance-none  border-[#0000FF] focus:border-blue-300 focus:outline-none focus:ring-0  peer" placeholder=" "  />
                        <label for="name" class="absolute text-md  text-[#0000FF] duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-300 peer-focus:text-blue-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">
                            Name
                        </label>
                    </div>
                    <p id="name-error-edit" class="hidden text-red-500 text-xs mt-1">invalid name format</p>
                    
                    <div class="relative z-0 mb-6 w-full group">
                        <label for="property" class="text-[#0000FF]">property</label>
                        <select name="property_id" id="property-edit" class="block py-2.5 px-3 w-full text-md bg-transparent border-0 border-b-2 border-[#0000FF] appearance-none focus:border-blue-600 focus:outline-none focus:ring-0">
                            @foreach ($properties as $property)
                                <option value="{{ $property->id }}" {{ $property->id == $property->property_id ? 'selected' : '' }}>{{ $property->title }}</option>
                            @endforeach                         
                        </select> 
                        <p id="property-error-edit" class="hidden text-red-500 text-xs mt-1">Please choose which property</p>
                    </div>

                    <div class="relative z-0 mb-6 w-full group">
                        <input value="{{$tenant->CIN}}" type="text" name="CIN" id="CIN-edit" class="block py-2.5 px-0 w-full text-md  bg-transparent border-0 border-b-2 border-[#0000FF] appearance-none  border-[#0000FF] focus:border-blue-300 focus:outline-none focus:ring-0  peer" placeholder=" "  />
                        <label for="CIN" class="absolute text-md  text-[#0000FF] duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-300 peer-focus:text-blue-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">
                            CIN
                        </label>
                        <p id="CIN-error-edit" class="hidden text-red-500 text-xs mt-1">invalid CIN format, example: HH000000</p></p>
                        
                    </div>
                    <div class="relative z-0 mb-6 w-full group">
                        <input value="{{$tenant->phone}}" type="text" name="phone" id="phone-edit" class="block py-2.5 px-0 w-full text-md  bg-transparent border-0 border-b-2 border-[#0000FF] appearance-none  border-[#0000FF] focus:border-blue-300 focus:outline-none focus:ring-0  peer" placeholder=" "  />
                        <label for="phone" class="absolute text-md  text-[#0000FF] duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-300 peer-focus:text-blue-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">
                            phone number
                        </label>
                        <p id="phone-error-edit" class="hidden text-red-500 text-xs mt-1">invalid phone number format</p>
            </div>	
            </div>
            <div class="flex justify-end w-full space-x-10">	
            <button onclick="edittenant()" class="text-white max-w-lg bg-red-600 hover:bg-white hover:text-red-600 border border-red-600 focus:ring-4 focus:ring-red-600 font-medium rounded-lg text-md w-full sm:w-auto px-5 py-2.5 text-center ">Close</button>
		<button type="submit" class="text-white max-w-lg bg-[#0000FF] hover:bg-white hover:text-[#0000FF] border border-[#0000FF] focus:ring-4 focus:ring-[#0000FF] font-medium rounded-lg text-md w-full sm:w-auto px-5 py-2.5 text-center ">Save</button>
        </div>	
    </form>
    </div>
</div>
             
                        @endforeach
                        </tbody>

                    </table>









<div id="addtenant" class="hidden min-w-screen h-screen animated fadeIn faster  fixed  left-0 top-0 flex justify-center items-center inset-0 z-50 outline-none focus:outline-none bg-no-repeat bg-center bg-cover">
    <div class="absolute bg-black opacity-80 inset-0 z-0"></div>
    <div class="w-full  max-w-lg p-5 relative mx-auto my-auto rounded-xl shadow-lg  bg-white mt-20 overflow-y-scroll h-5/6 ">
	<form id="tenantCreateForm" action="{{route('tenants.store')}}" method="post" enctype="multipart/form-data">
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
                        <label for="property" class="text-[#0000FF]">property</label>
                        <select name="property_id" id="property-create" class="block py-2.5 px-3 w-full text-md bg-transparent border-0 border-b-2 border-[#0000FF] appearance-none focus:border-blue-600 focus:outline-none focus:ring-0">
                            <option value="" selected disabled> choose which property</option>
                        @foreach ($properties as $property)
                                <option value="{{ $property->id }}" >{{ $property->title }}</option>
                            @endforeach                         
                        </select>  
                        <p id="property-error" class="hidden text-red-500 text-xs mt-1">Please choose which property</p>
                    </div>
                    <div class="relative z-0 mb-6 w-full group">
                        <input type="text" name="CIN" id="CIN-create" class="block py-2.5 px-0 w-full text-md  bg-transparent border-0 border-b-2 border-[#0000FF] appearance-none  border-[#0000FF] focus:border-blue-300 focus:outline-none focus:ring-0  peer" placeholder=" "  />
                        <label for="CIN" class="absolute text-md  text-[#0000FF] duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-300 peer-focus:text-blue-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">
                            CIN
                        </label>
                        <p id="CIN-error" class="hidden text-red-500 text-xs mt-1">invalid CIN format, example: HH000000</p></p>
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
            <button onclick="Createtenant()" class="text-white max-w-lg bg-red-600 hover:bg-white hover:text-red-600 border border-red-600 focus:ring-4 focus:ring-red-600 font-medium rounded-lg text-md w-full sm:w-auto px-5 py-2.5 text-center ">Close</button>
		<button type="submit" class="text-white max-w-lg bg-[#0000FF] hover:bg-white hover:text-[#0000FF] border border-[#0000FF] focus:ring-4 focus:ring-[#0000FF] font-medium rounded-lg text-md w-full sm:w-auto px-5 py-2.5 text-center ">Save</button>
        </div>	
    </form>
    </div>
</div>


                    <script>    
                    document.querySelectorAll('.deletetenantButton').forEach(button => {
                      button.addEventListener('click', function() {
                          console.log("Delete button clicked!");
                          const tenantID = this.getAttribute('data-index');
                          if (confirm("Are you sure you want to delete this tenant? ")) {
                              document.getElementById('deletetenantForm' + tenantID).submit();
                          }
                      });
                    });


                    $(document).ready(function(){
    function fetch_search_data(query) {
        console.log("Query:", query);
        $.ajax({
            url: "{{ route('tenants.search') }}",
            method: 'GET',
            data: { query: query },
            dataType: 'json',
            success: function (data) {
                console.log("Data received:", data);
                $('#tbody').empty();
                $("#tbody").removeClass('hidden');
                $('#oldTbody').addClass('hidden');
                if (data.search_data && data.search_data.length > 0) {
                    data.search_data.forEach(function(tenant, index) {
                        var searchData = `<x-table.tr>
                            <x-table.td>
                                <div class="text-sm text-gray-900">#${index}</div>
                            </x-table.td>
                            <x-table.td>
                                <div class="text-sm font-medium text-gray-900">${tenant.name}</div>
                            </x-table.td>
                            <x-table.td>
                                <div class="text-sm font-medium text-gray-900">${tenant.property_title}</div>
                            </x-table.td>
                            <x-table.td>
                                <div class="text-sm font-medium text-gray-900">${tenant.phone}</div>
                            </x-table.td>
                            <x-table.td>
                                <div class="text-sm font-medium text-gray-900">${tenant.CIN}</div>
                            </x-table.td>
                            <x-table.td>
                                <div class="flex justify-center space-x-3">
                                    <form id="deletetenantForm${tenant.id}" action="/tenants/destroy/${tenant.id}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button type="button" class="deletetenantButton" data-index="${tenant.id}"><x-icon name="delete" class="w-8 h-8"/></button>
                                    </form>
                                    <button onclick="edittenant(${tenant.id})"><x-icon name="update"/></button>
                                </div>
                            </x-table.td>
                        </x-table.tr>`;
                        $('#tbody').append(searchData);});
                } else {
                    $('#tbody').append('<tr><td colspan="6">No results found</td></tr>');
                }
            },
            error: function (xhr, status, error) {
                console.error("Error fetching data:", status, error);
                $('#tbody').empty().append('<tr><td colspan="6">An error occurred while fetching data</td></tr>');
            }
        });
    }

    $('#search').on('input', function() {
        let query = $(this).val();
        fetch_search_data(query);
    });
});
</script>



</x-admin-layout>
