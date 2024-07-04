// Get form and input elements
var ownerCreateForm = document.getElementById('ownerCreateForm');
var nameOwner = document.getElementById('name-create');
var CIN = document.getElementById('CIN-create');
var phone = document.getElementById('phone-create');


// Error messages
var nameError = document.getElementById('name-error');
var CINError = document.getElementById('CIN-error');
var phoneError = document.getElementById('phone-error');


// Regex patterns
const nameRegex = /^[a-zA-Z0-9\s]{3,50}$/;
const CINRegex = /^[A-Z]{2}\d{6}$/;
const phoneRegex = /^(06|05|07)\d{8}$/;; 

// Form submit event
ownerCreateForm.addEventListener('submit', function(e) {
    e.preventDefault();
    var isValid = true;

    // Validate name
    if (!nameRegex.test(nameOwner.value)) {
        nameError.style.display = 'block';
        nameOwner.classList.add('border-red-600', 'focus:border-red-500');
        nameOwner.classList.remove('border-[#0000FF]', 'focus:border-blue-300');
        isValid = false;
    } else {
        nameError.style.display = 'none';
        nameOwner.classList.add('border-[#0000FF]', 'focus:border-blue-300');
        nameOwner.classList.remove('border-red-600', 'focus:border-red-500');
    }

    // Validate CIN
    if (!CINRegex.test(CIN.value)) {
        CINError.style.display = 'block';
        CIN.classList.add('border-red-600', 'focus:border-red-500');
        CIN.classList.remove('border-[#0000FF]', 'focus:border-blue-300');
        isValid = false;
    } else {
        CINError.style.display = 'none';
        CIN.classList.add('border-[#0000FF]', 'focus:border-blue-300');
        CIN.classList.remove('border-red-600', 'focus:border-red-500');
    }

    // Validate phone
    if (!phoneRegex.test(phone.value)) {
        phoneError.style.display = 'block';
        phone.classList.add('border-red-600', 'focus:border-red-500');
        phone.classList.remove('border-[#0000FF]', 'focus:border-blue-300');
        isValid = false;
    } else {
        phoneError.style.display = 'none';
        phone.classList.add('border-[#0000FF]', 'focus:border-blue-300');
        phone.classList.remove('border-red-600', 'focus:border-red-500');
    }

    // Submit form if valid
    if (isValid) {
        ownerCreateForm.submit();
    }
});

// Input event listeners
nameOwner.addEventListener('input', function() {
    validateInput(nameOwner, nameRegex, nameError);
});

CIN.addEventListener('input', function() {
    validateInput(CIN, CINRegex, CINError);
});

phone.addEventListener('input', function() {
    validateInput(phone, phoneRegex, phoneError);
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