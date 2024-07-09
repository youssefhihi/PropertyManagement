// Get form and input elements
var tenantCreateForm = document.getElementById('tenantCreateForm');
var nametenant = document.getElementById('name-create');
var CIN = document.getElementById('CIN-create');
var phone = document.getElementById('phone-create');
var property = document.getElementById('property-create');



// Error messages
var nameError = document.getElementById('name-error');
var CINError = document.getElementById('CIN-error');
var phoneError = document.getElementById('phone-error');
var propertyError = document.getElementById('property-error');


// Regex patterns
const nameTenantRegex = /^[a-zA-Z0-9\s]{3,50}$/;
const CINTenantRegex = /^[A-Z]{2}\d{6}$/;
const phoneTenantRegex = /^(06|05|07)\d{8}$/;; 

// Form submit event
tenantCreateForm.addEventListener('submit', function(e) {
    e.preventDefault();
    var isValid = true;

    // Validate name
    if (!nameTenantRegex.test(nametenant.value)) {
        nameError.style.display = 'block';
        nametenant.classList.add('border-red-600', 'focus:border-red-500');
        nametenant.classList.remove('border-[#0000FF]', 'focus:border-blue-300');
        isValid = false;
    } else {
        nameError.style.display = 'none';
        nametenant.classList.add('border-[#0000FF]', 'focus:border-blue-300');
        nametenant.classList.remove('border-red-600', 'focus:border-red-500');
    }

    // Validate CIN
    if (!CINTenantRegex.test(CIN.value)) {
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
    if (!phoneTenantRegex.test(phone.value)) {
        phoneError.style.display = 'block';
        phone.classList.add('border-red-600', 'focus:border-red-500');
        phone.classList.remove('border-[#0000FF]', 'focus:border-blue-300');
        isValid = false;
    } else {
        phoneError.style.display = 'none';
        phone.classList.add('border-[#0000FF]', 'focus:border-blue-300');
        phone.classList.remove('border-red-600', 'focus:border-red-500');
    }

    if (property.value === "") {
        propertyError.style.display = 'block';
        property.classList.add('border-red-600', 'focus:border-red-500');
        property.classList.remove('border-[#0000FF]', 'focus:border-blue-300');
        isValid = false;
    } else {
        propertyError.style.display = 'none';
        property.classList.add('border-[#0000FF]', 'focus:border-blue-300');
        property.classList.remove('border-red-600', 'focus:border-red-500');
    }

    // Submit form if valid
    if (isValid) {
        tenantCreateForm.submit();
    }
});

// Input event listeners
nametenant.addEventListener('input', function() {
    validateInput(nametenant, nameTenantRegex, nameError);
});

CIN.addEventListener('input', function() {
    validateInput(CIN, CINTenantRegex, CINError);
});

phone.addEventListener('input', function() {
    validateInput(phone, phoneTenantRegex, phoneError);
});


property.addEventListener('change', function() {
    if (property.value === "") {
        propertyError.style.display = 'block';
        property.classList.add('border-red-600', 'focus:border-red-500');
        property.classList.remove('border-[#0000FF]', 'focus:border-blue-300');
    } else {
        propertyError.style.display = 'none';
        property.classList.add('border-[#0000FF]', 'focus:border-blue-300');
        property.classList.remove('border-red-600', 'focus:border-red-500');
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







