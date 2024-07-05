// Get form and input elements
var propertyCreateForm = document.getElementById('propertyCreateForm');
var title = propertyCreateForm.querySelector('#title-add');
var local = propertyCreateForm.querySelector('#local-add');
var price = propertyCreateForm.querySelector('#price-add');
var description = propertyCreateForm.querySelector('#description-add');
var image = propertyCreateForm.querySelector('#image-add');
var owner = propertyCreateForm.querySelector('#owner-add');

// Error messages
var titleError = propertyCreateForm.querySelector('#title-error');
var localError = propertyCreateForm.querySelector('#local-error');
var priceError = propertyCreateForm.querySelector('#price-error');
var descriptionError = propertyCreateForm.querySelector('#description-error');
var imageError = propertyCreateForm.querySelector('#image-error');
var ownerError = propertyCreateForm.querySelector('#owner-error');

// Regex patterns
const titleRegex = /^[a-zA-Z0-9\s]{3,50}$/; // Example: at least 3 characters, letters, numbers, and spaces allowed
const localRegex = /^[a-zA-Z0-9\s]{5,100}$/; // Example: at least 5 characters, letters, numbers, and spaces allowed
const priceRegex = /^[0-9]+(\.[0-9]{1,2})?$/; // Example: positive numbers with optional decimal
const descriptionRegex = /^[a-zA-Z0-9\s\.,!?]{10,}$/; // Example: at least 10 characters, letters, numbers, spaces, and basic punctuation

// Form submit event
propertyCreateForm.addEventListener('submit', function(e) {
    e.preventDefault();
    var isValid = true;

    // Validate title
    if (!titleRegex.test(title.value)) {
        titleError.style.display = 'block';
        title.classList.add('border-red-600', 'focus:border-red-500');
        title.classList.remove('border-[#0000FF]', 'focus:border-blue-300');
        isValid = false;
    } else {
        titleError.style.display = 'none';
        title.classList.add('border-[#0000FF]', 'focus:border-blue-300');
        title.classList.remove('border-red-600', 'focus:border-red-500');
    }

    // Validate local
    if (!localRegex.test(local.value)) {
        localError.style.display = 'block';
        local.classList.add('border-red-600', 'focus:border-red-500');
        local.classList.remove('border-[#0000FF]', 'focus:border-blue-300');
        isValid = false;
    } else {
        localError.style.display = 'none';
        local.classList.add('border-[#0000FF]', 'focus:border-blue-300');
        local.classList.remove('border-red-600', 'focus:border-red-500');
    }

    // Validate price
    if (!priceRegex.test(price.value)) {
        priceError.style.display = 'block';
        price.classList.add('border-red-600', 'focus:border-red-500');
        price.classList.remove('border-[#0000FF]', 'focus:border-blue-300');
        isValid = false;
    } else {
        priceError.style.display = 'none';
        price.classList.add('border-[#0000FF]', 'focus:border-blue-300');
        price.classList.remove('border-red-600', 'focus:border-red-500');
    }

    // Validate description
    if (!descriptionRegex.test(description.value)) {
        descriptionError.style.display = 'block';
        description.classList.add('border-red-600', 'focus:border-red-500');
        description.classList.remove('border-[#0000FF]', 'focus:border-blue-300');
        isValid = false;
    } else {
        descriptionError.style.display = 'none';
        description.classList.add('border-[#0000FF]', 'focus:border-blue-300');
        description.classList.remove('border-red-600', 'focus:border-red-500');
    }

    // Validate image
    if (image.files.length === 0) {
        imageError.style.display = 'block';
        image.classList.add('border-red-600', 'focus:border-red-500');
        image.classList.remove('border-[#0000FF]', 'focus:border-blue-300');
        isValid = false;
    } else {
        imageError.style.display = 'none';
        image.classList.add('border-[#0000FF]', 'focus:border-blue-300');
        image.classList.remove('border-red-600', 'focus:border-red-500');
    }

    // Validate owner
    if (owner.value === "") {
        ownerError.style.display = 'block';
        owner.classList.add('border-red-600', 'focus:border-red-500');
        owner.classList.remove('border-[#0000FF]', 'focus:border-blue-300');
        isValid = false;
    } else {
        ownerError.style.display = 'none';
        owner.classList.add('border-[#0000FF]', 'focus:border-blue-300');
        owner.classList.remove('border-red-600', 'focus:border-red-500');
    }

    // Submit form if valid
    if (isValid) {
        propertyCreateForm.submit();
    }
});

// Input event listeners
title.addEventListener('input', function() {
    validateInput(title, titleRegex, titleError);
});

local.addEventListener('input', function() {
    validateInput(local, localRegex, localError);
});

price.addEventListener('input', function() {
    validateInput(price, priceRegex, priceError);
});

description.addEventListener('input', function() {
    validateInput(description, descriptionRegex, descriptionError);
});

image.addEventListener('change', function() {
    if (image.files.length === 0) {
        imageError.style.display = 'block';
        image.classList.add('border-red-600', 'focus:border-red-500');
        image.classList.remove('border-[#0000FF]', 'focus:border-blue-300');
    } else {
        imageError.style.display = 'none';
        image.classList.add('border-[#0000FF]', 'focus:border-blue-300');
        image.classList.remove('border-red-600', 'focus:border-red-500');
    }
});

owner.addEventListener('change', function() {
    if (owner.value === "") {
        ownerError.style.display = 'block';
        owner.classList.add('border-red-600', 'focus:border-red-500');
        owner.classList.remove('border-[#0000FF]', 'focus:border-blue-300');
    } else {
        ownerError.style.display = 'none';
        owner.classList.add('border-[#0000FF]', 'focus:border-blue-300');
        owner.classList.remove('border-red-600', 'focus:border-red-500');
    }
});

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














