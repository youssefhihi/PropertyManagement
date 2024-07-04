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


//-------------------------------------------------------------------------------------------------------



// edit model 
// Function to open edit modal
function editModel(tenantId) {
    // Example: Handling modal open/close
    var edittenantModal = document.getElementById('edittenant' + tenantId);
    edittenantModal.classList.toggle('hidden');
}

// Function to validate and submit edit form
function validateAndSubmitEditForm(tenantId) {
    var form = document.querySelector('#edittenant' + tenantId + ' form');
    var nameTenant = form.querySelector('#name-edit');
    var CIN = form.querySelector('#CIN-edit');
    var Phone = form.querySelector('#Phone-edit');
    var property = form.querySelector('#property-edit');

   
    // Error elements
    var imageError = form.querySelector('#image-error-edit');
    var nameTenantError = form.querySelector('#name-error-edit');
    var CINError = form.querySelector('#CIN-error-edit');
    var PhoneError = form.querySelector('#Phone-error-edit');
    var propertyError = form.querySelector('#property-error-edit');



    // Validate nameTenant
    if (!nameTenantRegex.test(nameTenant.value)) {
        nameTenantError.style.display = 'block';
        nameTenant.classList.add('border-red-600', 'focus:border-red-500');
        nameTenant.classList.remove('border-[#0000FF]', 'focus:border-blue-300');
        isValid = false;
    } else {
        nameTenantError.style.display = 'none';
        nameTenant.classList.add('border-[#0000FF]', 'focus:border-blue-300');
        nameTenant.classList.remove('border-red-600', 'focus:border-red-500');
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

    // Validate Phone
    if (!PhoneRegex.test(Phone.value)) {
        PhoneError.style.display = 'block';
        Phone.classList.add('border-red-600', 'focus:border-red-500');
        Phone.classList.remove('border-[#0000FF]', 'focus:border-blue-300');
        isValid = false;
    } else {
        PhoneError.style.display = 'none';
        Phone.classList.add('border-[#0000FF]', 'focus:border-blue-300');
        Phone.classList.remove('border-red-600', 'focus:border-red-500');
    }

 

    // Validate property
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
        form.submit();
    }
}

// Event listeners for form submission
document.addEventListener('DOMContentLoaded', function() {
    // Example: Adding event listeners to all edit forms
    var editForms = document.querySelectorAll('.editTenant');
    editForms.forEach(function(form) {
        var tenantId = form.dataset.tenantId;

        form.addEventListener('submit', function(e) {
            e.preventDefault();
            validateAndSubmitEditForm(tenantId);
        });
    });
});













// Function to open edit modal
function editModel(tenantId) {
    var edittenantModal = document.getElementById('edittenant' + tenantId);
    edittenantModal.classList.toggle('hidden');
}

// Function to validate and submit edit form
function validateAndSubmitEditForm(tenantId) {
    var form = document.querySelector('#edittenant' + tenantId + ' form');
    var nameTenant = form.querySelector('#name-edit');
    var CIN = form.querySelector('#CIN-edit');
    var Phone = form.querySelector('#phone-edit');
    var property = form.querySelector('#property-edit');

    var nameTenantError = form.querySelector('#name-error-edit');
    var CINError = form.querySelector('#CIN-error-edit');
    var PhoneError = form.querySelector('#phone-error-edit');
    var propertyError = form.querySelector('#property-error-edit');

    var isValid = true;

    // Validate nameTenant
    if (!nameTenant.value.trim()) {
        nameTenantError.style.display = 'block';
        nameTenant.classList.add('border-red-600', 'focus:border-red-500');
        nameTenant.classList.remove('border-[#0000FF]', 'focus:border-blue-300');
        isValid = false;
    } else {
        nameTenantError.style.display = 'none';
        nameTenant.classList.add('border-[#0000FF]', 'focus:border-blue-300');
        nameTenant.classList.remove('border-red-600', 'focus:border-red-500');
    }

    // Validate CIN
    if (!CIN.value.trim()) {
        CINError.style.display = 'block';
        CIN.classList.add('border-red-600', 'focus:border-red-500');
        CIN.classList.remove('border-[#0000FF]', 'focus:border-blue-300');
        isValid = false;
    } else {
        CINError.style.display = 'none';
        CIN.classList.add('border-[#0000FF]', 'focus:border-blue-300');
        CIN.classList.remove('border-red-600', 'focus:border-red-500');
    }

    // Validate Phone
    if (!Phone.value.trim()) {
        PhoneError.style.display = 'block';
        Phone.classList.add('border-red-600', 'focus:border-red-500');
        Phone.classList.remove('border-[#0000FF]', 'focus:border-blue-300');
        isValid = false;
    } else {
        PhoneError.style.display = 'none';
        Phone.classList.add('border-[#0000FF]', 'focus:border-blue-300');
        Phone.classList.remove('border-red-600', 'focus:border-red-500');
    }

    // Validate property
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
        form.submit();
    }
}

// Event listeners for form submission
document.addEventListener('DOMContentLoaded', function() {
    // Adding event listeners to all edit forms
    var editForms = document.querySelectorAll('[id^="editTenant"]');
    editForms.forEach(function(form) {
        var tenantId = form.id.replace('editTenant', ''); // Extract tenantId from form ID

        form.addEventListener('submit', function(e) {
            e.preventDefault();
            validateAndSubmitEditForm(tenantId);
        });
    });
});
