<x-admin-layout>
    <div id="editProperty" class="min-w-screen h-screen fixed left-0 top-0 flex justify-center items-center inset-0 z-50 outline-none focus:outline-none bg-no-repeat bg-center bg-cover">
        <div class="absolute bg-black opacity-80 inset-0 z-0"></div>
        <div class="w-full max-w-lg p-5 relative mx-auto my-auto rounded-xl shadow-lg overflow-y-scroll h-5/6 bg-white mt-20">
            <x-error-input class="mt-2" :messages="$errors->all()" />
            <form id="edit-form" action="{{ route('properties.update', $property) }}" method="post" enctype="multipart/form-data" data-property-id="{{$property->id}}">
                @csrf
                @method('PUT')
                <div class="flex flex-col gap-5">
                    <div class="relative z-0 mb-6 w-full group">
                        <input type="file" name="image" id="image-edit" class="block py-2.5 px-0 w-full text-md bg-transparent border-0 border-b-2 border-[#0000FF] appearance-none focus:border-blue-300 focus:outline-none focus:ring-0 peer" placeholder=" " />
                        <label for="image" class="absolute text-md text-[#0000FF] duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-300 peer-focus:text-blue-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">
                            Image
                        </label>
                        <p id="image-error-edit" class="hidden text-red-500 text-xs mt-1">Please upload an image</p>
                    </div>
                    <div class="grid xl:grid-cols-2 xl:gap-6">
                        <div class="relative z-0 mb-6 w-full group pt-5">
                            <input value="{{$property->title}}" type="text" name="title" id="title-edit" class="block py-2.5 px-0 w-full text-md bg-transparent border-0 border-b-2 border-[#0000FF] appearance-none focus:border-blue-300 focus:outline-none focus:ring-0 peer" placeholder=" " />
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
                            <input value="{{$property->local}}" type="text" name="local" id="local-edit" class="block py-2.5 px-0 w-full text-md bg-transparent border-0 border-b-2 border-[#0000FF] appearance-none focus:border-blue-300 focus:outline-none focus:ring-0 peer" placeholder=" " />
                            <label for="local" class="absolute text-md text-[#0000FF] duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-300 peer-focus:text-blue-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">
                                Local
                            </label>
                            <p id="local-error-edit" class="hidden text-red-500 text-xs mt-1">Invalid local format</p>
                        </div>
                        <div class="relative z-0 mb-6 w-full group">
                            <input value="{{$property->price}}" type="number" name="price" id="price-edit" class="block py-2.5 px-0 w-full text-md bg-transparent border-0 border-b-2 border-[#0000FF] appearance-none focus:border-blue-300 focus:outline-none focus:ring-0 peer" placeholder=" " />
                            <label for="price" class="absolute text-md text-[#0000FF] duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-300 peer-focus:text-blue-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">
                                Price
                            </label>
                            <p id="price-error-edit" class="hidden text-red-500 text-xs mt-1">Invalid price format</p>
                        </div>
                    </div>

                    <div class="relative z-0 mb-6 w-full group">
                        <input value="{{$property->description}}" type="text" name="description" id="description-edit" class="block py-2.5 px-0 w-full text-md bg-transparent border-0 border-b-2 border-[#0000FF] appearance-none focus:border-blue-300 focus:outline-none focus:ring-0 peer" placeholder=" " />
                        <label for="description" class="absolute text-md text-[#0000FF] duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-300 peer-focus:text-blue-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">
                            Description
                        </label>
                        <p id="description-error-edit" class="hidden text-red-500 text-xs mt-1">Invalid description format</p>
                    </div>
                </div>
                <div class="flex justify-end w-full space-x-10">
                    <a href="/dashboard/properties" class="text-white max-w-lg bg-red-600 hover:bg-white hover:text-red-600 border border-red-600 focus:ring-4 focus:ring-red-600 font-medium rounded-lg text-md w-full sm:w-auto px-5 py-2.5 text-center">
                        Close
                    </a>
                    <button type="submit" class="text-white max-w-lg bg-[#0000FF] hover:bg-white hover:text-[#0000FF] border border-[#0000FF] focus:ring-4 focus:ring-[#0000FF] font-medium rounded-lg text-md w-full sm:w-auto px-5 py-2.5 text-center">
                        Save
                    </button>
                </div>
            </form>
        </div>
    </div>
    <script>
        // edit form 
        var form = document.getElementById('edit-form');
        var imageE = form.querySelector('#image-edit');
        var titleE = form.querySelector('#title-edit');
        var localE = form.querySelector('#local-edit');
        var priceE = form.querySelector('#price-edit');
        var descriptionE = form.querySelector('#description-edit');
        var ownerE = form.querySelector('#owner-edit');

        // Error elements
        var imageErrorE = form.querySelector('#image-error-edit');
        var titleErrorE = form.querySelector('#title-error-edit');
        var localErrorE = form.querySelector('#local-error-edit');
        var priceErrorE = form.querySelector('#price-error-edit');
        var descriptionErrorE = form.querySelector('#description-error-edit');
        var ownerErrorE = form.querySelector('#owner-error-edit');

        // Regex patterns
        const titleRegex = /^[a-zA-Z0-9\s]{3,50}$/; // Example: at least 3 characters, letters, numbers, and spaces allowed
        const localRegex = /^[a-zA-Z0-9\s]{5,100}$/; // Example: at least 5 characters, letters, numbers, and spaces allowed
        const priceRegex = /^[0-9]+(\.[0-9]{1,2})?$/; // Example: numerical values, optionally with up to 2 decimal places
        const descriptionRegex = /^[a-zA-Z0-9\s,.]{10,500}$/; // Example: at least 10 characters, letters, numbers, spaces, and some punctuation

        form.addEventListener('submit', function(event) {
            // Prevent form submission
            event.preventDefault();

            var isValid = true;

            // Validate image
            if (imageE.files.length === 0) {
                imageErrorE.classList.remove('hidden');
                isValid = false;
            } else {
                imageErrorE.classList.add('hidden');
            }

            // Validate title
            if (!titleRegex.test(titleE.value)) {
                titleErrorE.classList.remove('hidden');
                isValid = false;
            } else {
                titleErrorE.classList.add('hidden');
            }

            // Validate local
            if (!localRegex.test(localE.value)) {
                localErrorE.classList.remove('hidden');
                isValid = false;
            } else {
                localErrorE.classList.add('hidden');
            }

            // Validate price
            if (!priceRegex.test(priceE.value)) {
                priceErrorE.classList.remove('hidden');
                isValid = false;
            } else {
                priceErrorE.classList.add('hidden');
            }

            // Validate description
            if (!descriptionRegex.test(descriptionE.value)) {
                descriptionErrorE.classList.remove('hidden');
                isValid = false;
            } else {
                descriptionErrorE.classList.add('hidden');
            }

            // Validate owner
            if (ownerE.value === '') {
                ownerErrorE.classList.remove('hidden');
                isValid = false;
            } else {
                ownerErrorE.classList.add('hidden');
            }

            // If the form is valid, submit it
            if (isValid) {
                form.submit();
            }
        });
        
// Input event listeners
titleE.addEventListener('input', function() {
    validateInput(titleE, titleRegex, titleErrorE);
});

localE.addEventListener('input', function() {
    validateInput(localE, localRegex, localErrorE);
});

priceE.addEventListener('input', function() {
    validateInput(priceE, priceRegex, priceErrorE);
});

descriptionE.addEventListener('input', function() {
    validateInput(descriptionE, descriptionRegex, descriptionErrorE);
});

imageE.addEventListener('change', function() {
    if (imageE.files.length === 0) {
        imageErrorE.style.display = 'block';
        imageE.classList.add('border-red-600', 'focus:border-red-500');
        imageE.classList.remove('border-[#0000FF]', 'focus:border-blue-300');
    } else {
        imageErrorE.style.display = 'none';
        imageE.classList.add('border-[#0000FF]', 'focus:border-blue-300');
        imageE.classList.remove('border-red-600', 'focus:border-red-500');
    }
});

ownerE.addEventListener('change', function() {
    if (ownerE.value === "") {
        ownerErrorE.style.display = 'block';
        ownerE.classList.add('border-red-600', 'focus:border-red-500');
        ownerE.classList.remove('border-[#0000FF]', 'focus:border-blue-300');
    } else {
        ownerErrorE.style.display = 'none';
        ownerE.classList.add('border-[#0000FF]', 'focus:border-blue-300');
        ownerE.classList.remove('border-red-600', 'focus:border-red-500');
    }
});
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
    </script>
</x-admin-layout>
