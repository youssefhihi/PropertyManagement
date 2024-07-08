<x-admin-Layout>
<div class="min-w-screen h-screen animated fadeIn faster fixed left-0 top-0 flex justify-center items-center inset-0 z-50 outline-none focus:outline-none bg-no-repeat bg-center bg-cover">
    <div class="absolute bg-black opacity-80 inset-0 z-0"></div>
    <div class="w-full max-w-lg p-5 relative mx-auto my-auto rounded-xl shadow-lg bg-white mt-20 overflow-y-scroll h-5/6">
        <x-error-input class="mt-2" :messages="$errors->all()" />
        <form id="edittenantForm" action="{{ route('tenants.update', $tenant) }}" method="post" data-tenant-id="{{$tenant->id}}">
            @csrf
            @method('PUT')
            <div class="flex flex-col gap-5">

                <div class="relative z-0 mb-6 w-full group">
                    <input value="{{$tenant->name}}" type="text" name="name" id="name-tenant-edit" class="block py-2.5 px-0 w-full text-md bg-transparent border-0 border-b-2 border-[#0000FF] appearance-none focus:border-blue-300 focus:outline-none focus:ring-0 peer" placeholder=" " />
                    <label for="name" class="absolute text-md text-[#0000FF] duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-300 peer-focus:text-blue-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">
                        Name
                    </label>
                    <p id="name-error-tenant" class="hidden text-red-500 text-xs mt-1">Invalid name format</p>
                </div>
                
                <div class="relative z-0 mb-6 w-full group">
                    <label for="property" class="text-[#0000FF]">Property</label>
                    <select name="property_id" id="property-tenant-edit" class="block py-2.5 px-3 w-full text-md bg-transparent border-0 border-b-2 border-[#0000FF] appearance-none focus:border-blue-600 focus:outline-none focus:ring-0">
                        @foreach ($properties as $property)
                            <option value="{{ $property->id }}" {{ $property->id == $tenant->property_id ? 'selected' : '' }}>{{ $property->title }}</option>
                        @endforeach                         
                    </select> 
                    <p id="property-error-tenant" class="hidden text-red-500 text-xs mt-1">Please choose which property</p>
                </div>

                <div class="relative z-0 mb-6 w-full group">
                    <input value="{{$tenant->CIN}}" type="text" name="CIN" id="CIN-tenant-edit" class="block py-2.5 px-0 w-full text-md bg-transparent border-0 border-b-2 border-[#0000FF] appearance-none focus:border-blue-300 focus:outline-none focus:ring-0 peer" placeholder=" " />
                    <label for="CIN" class="absolute text-md text-[#0000FF] duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-300 peer-focus:text-blue-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">
                        CIN
                    </label>
                    <p id="CIN-error-tenant" class="hidden text-red-500 text-xs mt-1">Invalid CIN format, example: HH000000</p>
                </div>
                
                <div class="relative z-0 mb-6 w-full group">
                    <input value="{{$tenant->phone}}" type="text" name="phone" id="phone-tenant-edit" class="block py-2.5 px-0 w-full text-md bg-transparent border-0 border-b-2 border-[#0000FF] appearance-none focus:border-blue-300 focus:outline-none focus:ring-0 peer" placeholder=" " />
                    <label for="phone" class="absolute text-md text-[#0000FF] duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-300 peer-focus:text-blue-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">
                        Phone number
                    </label>
                    <p id="phone-error-tenant" class="hidden text-red-500 text-xs mt-1">Invalid phone number format</p>
                </div>

            </div>
            <div class="flex justify-end w-full space-x-10"> 
                <a href="/dashboard/tenants" class="text-white max-w-lg bg-red-600 hover:bg-white hover:text-red-600 border border-red-600 focus:ring-4 focus:ring-red-600 font-medium rounded-lg text-md w-full sm:w-auto px-5 py-2.5 text-center">Close</a>
                <button type="submit" class="text-white max-w-lg bg-[#0000FF] hover:bg-white hover:text-[#0000FF] border border-[#0000FF] focus:ring-4 focus:ring-[#0000FF] font-medium rounded-lg text-md w-full sm:w-auto px-5 py-2.5 text-center">Save</button>
            </div> 
        </form>
    </div>
</div>
<script>
        // Get form and input elements
        var edittenantForm = document.getElementById('edittenantForm');
        var nametenantE = edittenantForm.querySelector('#name-tenant-edit');
        var CINE = edittenantForm.querySelector('#CIN-tenant-edit');
        var phoneE = edittenantForm.querySelector('#phone-tenant-edit');

        // Error messages
        var nameErrorE = edittenantForm.querySelector('#name-error-tenant');
        var CINErrorE = edittenantForm.querySelector('#CIN-error-tenant');
        var phoneErrorE = edittenantForm.querySelector('#phone-error-tenant');

        // Regex patterns
        const nameRegex = /^[a-zA-Z\s]{3,50}$/; // Example: at least 3 characters, letters, and spaces allowed
        const CINRegex = /^[A-Z]{2}\d{6}$/; // Example: HH000000
        const phoneRegex = /^\+?\d{10,15}$/; // Example: 10 to 15 digits, optionally starting with +

        // Validate input function
        function validateInput(input, regex, errorElement) {
            if (!regex.test(input.value)) {
                errorElement.style.display = 'block';
                input.classList.add('border-red-600', 'focus:border-red-500');
                input.classList.remove('border-[#0000FF]', 'focus:border-blue-300');
            } else {
                errorElement.style.display = 'none';
                input.classList.add('border-[#0000FF]', 'focus:border-blue-300');
                input.classList.remove('border-red-600', 'focus:border-red-500');
            }
        }

        // Form submit event
        edittenantForm.addEventListener('submit', function(e) {
            e.preventDefault();
            var isValid = true;

            // Validate name
            if (!nameRegex.test(nametenantE.value)) {
                nameErrorE.style.display = 'block';
                nametenantE.classList.add('border-red-600', 'focus:border-red-500');
                nametenantE.classList.remove('border-[#0000FF]', 'focus:border-blue-300');
                isValid = false;
            } else {
                nameErrorE.style.display = 'none';
                nametenantE.classList.add('border-[#0000FF]', 'focus:border-blue-300');
                nametenantE.classList.remove('border-red-600', 'focus:border-red-500');
            }

            // Validate CIN
            if (!CINRegex.test(CINE.value)) {
                CINErrorE.style.display = 'block';
                CINE.classList.add('border-red-600', 'focus:border-red-500');
                CINE.classList.remove('border-[#0000FF]', 'focus:border-blue-300');
                isValid = false;
            } else {
                CINErrorE.style.display = 'none';
                CINE.classList.add('border-[#0000FF]', 'focus:border-blue-300');
                CINE.classList.remove('border-red-600', 'focus:border-red-500');
            }

            // Validate phone
            if (!phoneRegex.test(phoneE.value)) {
                phoneErrorE.style.display = 'block';
                phoneE.classList.add('border-red-600', 'focus:border-red-500');
                phoneE.classList.remove('border-[#0000FF]', 'focus:border-blue-300');
                isValid = false;
            } else {
                phoneErrorE.style.display = 'none';
                phoneE.classList.add('border-[#0000FF]', 'focus:border-blue-300');
                phoneE.classList.remove('border-red-600', 'focus:border-red-500');
            }

            // Submit form if valid
            if (isValid) {
                edittenantForm.submit();
            }
        });

        // Input event listeners
        nametenantE.addEventListener('input', function() {
            validateInput(nametenantE, nameRegex, nameErrorE);
        });

        CINE.addEventListener('input', function() {
            validateInput(CINE, CINRegex, CINErrorE);
        });

        phoneE.addEventListener('input', function() {
            validateInput(phoneE, phoneRegex, phoneErrorE);
        });
    </script>
</x-admin-Layout>