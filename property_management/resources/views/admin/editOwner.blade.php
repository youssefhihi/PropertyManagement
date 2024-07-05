<x-admin-layout> 
    <div id="editOwner" class=" min-w-screen h-screen animated fadeIn faster  fixed  left-0 top-0 flex justify-center items-center inset-0 z-50 outline-none focus:outline-none bg-no-repeat bg-center bg-cover">
        <div class="absolute bg-black opacity-80 inset-0 z-0"></div>
        <div class="w-full  max-w-lg p-5 relative mx-auto my-auto rounded-xl shadow-lg  bg-white mt-20 ">
            <x-error-input class="mt-2" :messages="$errors->all()" />    
            <form id="editOwnerForm" action="{{ route('owners.update', $owner) }}" method="post" >
                @csrf
                @method('PUT')
                <div class=" flex flex-col gap-5">
                    <div class="relative z-0 mb-6 w-full group">
                        <input value="{{$owner->name}}" type="text" name="name" id="name-owner-edit" class="block py-2.5 px-0 w-full text-md  bg-transparent border-0 border-b-2 border-[#0000FF] appearance-none  border-[#0000FF] focus:border-blue-300 focus:outline-none focus:ring-0  peer" placeholder=" "  />
                        <label for="name-owner-edit" class="absolute text-md  text-[#0000FF] duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-300 peer-focus:text-blue-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">
                            Name
                        </label>
                        <p id="name-error-owner" class="hidden text-red-500 text-xs mt-1">Invalid name format</p>
                    </div>

                    <div class="relative z-0 mb-6 w-full group">
                        <input value="{{$owner->CIN}}" type="text" name="CIN" id="CIN-owner-edit" class="block py-2.5 px-0 w-full text-md  bg-transparent border-0 border-b-2 border-[#0000FF] appearance-none  border-[#0000FF] focus:border-blue-300 focus:outline-none focus:ring-0  peer" placeholder=" "  />
                        <label for="CIN-owner-edit" class="absolute text-md  text-[#0000FF] duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-300 peer-focus:text-blue-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">
                            CIN
                        </label>
                        <p id="CIN-error-owner" class="hidden text-red-500 text-xs mt-1">Invalid CIN format (example: HH000000)</p>
                    </div>

                    <div class="relative z-0 mb-6 w-full group">
                        <input value="{{$owner->phone}}" type="text" name="phone" id="phone-owner-edit" class="block py-2.5 px-0 w-full text-md  bg-transparent border-0 border-b-2 border-[#0000FF] appearance-none  border-[#0000FF] focus:border-blue-300 focus:outline-none focus:ring-0  peer" placeholder=" "  />
                        <label for="phone-owner-edit" class="absolute text-md  text-[#0000FF] duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-300 peer-focus:text-blue-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">
                            Phone number
                        </label>
                        <p id="phone-error-owner" class="hidden text-red-500 text-xs mt-1">Invalid phone number format</p>
                    </div>
                </div>
                <div class="flex justify-end w-full space-x-10">
                    <a href="/dashboard/owners" class="text-white max-w-lg bg-red-600 hover:bg-white hover:text-red-600 border border-red-600 focus:ring-4 focus:ring-red-600 font-medium rounded-lg text-md w-full sm:w-auto px-5 py-2.5 text-center">Close</a>
                    <button type="submit" class="text-white max-w-lg bg-[#0000FF] hover:bg-white hover:text-[#0000FF] border border-[#0000FF] focus:ring-4 focus:ring-[#0000FF] font-medium rounded-lg text-md w-full sm:w-auto px-5 py-2.5 text-center">Save</button>
                </div>
            </form>
        </div>
    </div>
    <script>
        // Get form and input elements
        var editOwnerForm = document.getElementById('editOwnerForm');
        var nameOwnerE = editOwnerForm.querySelector('#name-owner-edit');
        var CINE = editOwnerForm.querySelector('#CIN-owner-edit');
        var phoneE = editOwnerForm.querySelector('#phone-owner-edit');

        // Error messages
        var nameErrorE = editOwnerForm.querySelector('#name-error-owner');
        var CINErrorE = editOwnerForm.querySelector('#CIN-error-owner');
        var phoneErrorE = editOwnerForm.querySelector('#phone-error-owner');

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
        editOwnerForm.addEventListener('submit', function(e) {
            e.preventDefault();
            var isValid = true;

            // Validate name
            if (!nameRegex.test(nameOwnerE.value)) {
                nameErrorE.style.display = 'block';
                nameOwnerE.classList.add('border-red-600', 'focus:border-red-500');
                nameOwnerE.classList.remove('border-[#0000FF]', 'focus:border-blue-300');
                isValid = false;
            } else {
                nameErrorE.style.display = 'none';
                nameOwnerE.classList.add('border-[#0000FF]', 'focus:border-blue-300');
                nameOwnerE.classList.remove('border-red-600', 'focus:border-red-500');
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
                editOwnerForm.submit();
            }
        });

        // Input event listeners
        nameOwnerE.addEventListener('input', function() {
            validateInput(nameOwnerE, nameRegex, nameErrorE);
        });

        CINE.addEventListener('input', function() {
            validateInput(CINE, CINRegex, CINErrorE);
        });

        phoneE.addEventListener('input', function() {
            validateInput(phoneE, phoneRegex, phoneErrorE);
        });
    </script>
</x-admin-layout>
