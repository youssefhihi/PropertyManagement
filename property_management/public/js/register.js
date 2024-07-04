
// ------------------------------------register Form-----------------------------------------------

var registerForm = document.getElementById('registerForm');
var registerEmail = registerForm.querySelector('.registerEmail');
var registerName = registerForm.querySelector('.registername');
var registerPassword = registerForm.querySelector('.registerPassword');
var registerPasswordConfirm = registerForm.querySelector('.registerConfirmPassword');
var passwordregisterBox = registerForm.querySelector('.passwordbox');
var emailRegisterBox = registerForm.querySelector('.emailbox');
var nameBox = registerForm.querySelector('.namebox');
var passwordConfirmbox = registerForm.querySelector('.passwordConfirmbox');

// error messages variables
var EmailregisterHelp = registerForm.querySelector('.emailregisterError');
var NameregisterHelp = registerForm.querySelector('.nameregisterError');
var PasswordregisterHelp = registerForm.querySelector('.passwordregisterError');
var passwordConfirmHelp = registerForm.querySelector('.passwordConfirmError');



// register Form Submit function
registerForm.addEventListener('submit', e => {
  e.preventDefault();
  console.log('form submitted');
  var isValid = true;

  // Name validation
  if (!NameRegex.test(registerName.value)) {
    NameregisterHelp.style.display = 'block';
    nameBox.classList.add('border-red-600');
    nameBox.classList.remove('border-green-600');
    isValid = false;
  } else {
    NameregisterHelp.style.display = 'none';
    nameBox.classList.remove('border-red-600');
    nameBox.classList.add('border-green-600');
  }

  // Password validation
  if (!PasswordRegex.test(registerPassword.value)) {
    PasswordregisterHelp.style.display = 'block';
    passwordregisterBox.classList.add('border-red-600');
    passwordregisterBox.classList.remove('border-green-600');
    isValid = false;
  } else {
    PasswordregisterHelp.style.display = 'none';
    passwordregisterBox.classList.remove('border-red-600');
    passwordregisterBox.classList.add('border-green-600');
  }

  // Email validation
  if (!EmailRegex.test(registerEmail.value)) {
    EmailregisterHelp.style.display = 'block';
    emailRegisterBox.classList.add('border-red-600');
    emailRegisterBox.classList.remove('border-green-600');
    isValid = false;
  } else {
    EmailregisterHelp.style.display = 'none';
    emailRegisterBox.classList.remove('border-red-600');
    emailRegisterBox.classList.add('border-green-600');
  }

  // Confirm Password validation
  if (registerPasswordConfirm.value !== registerPassword.value || registerPasswordConfirm.value === '') {
    passwordConfirmHelp.style.display = 'block';
    passwordConfirmbox.classList.add('border-red-600');
    passwordConfirmbox.classList.remove('border-green-600');
    isValid = false;
  } else {
    passwordConfirmHelp.style.display = 'none';
    passwordConfirmbox.classList.remove('border-red-600');
    passwordConfirmbox.classList.add('border-green-600');
  }

  // Submit form if valid
  if (isValid) {
    registerForm.submit();
  }
});

// Email Error Check for register
registerEmail.addEventListener('input', function() {
  validateInput(registerEmail, EmailRegex, EmailregisterHelp, emailRegisterBox);
});

// Password Error Check for register
registerPassword.addEventListener('input', function() {
  validateInput(registerPassword, PasswordRegex, PasswordregisterHelp, passwordregisterBox);
});

// Name Error Check for register
registerName.addEventListener('input', function() {
  validateInput(registerName, NameRegex, NameregisterHelp, nameBox);
});

// Confirm Password Error Check for register
registerPasswordConfirm.addEventListener('input', function() {
  validateConfirmPassword(registerPassword, registerPasswordConfirm, passwordConfirmHelp, passwordConfirmbox);
});



// Validate confirm password function
function validateConfirmPassword(password, confirmPassword, errorElement, container) {
  if (confirmPassword.value !== password.value || confirmPassword.value === '') {
    errorElement.style.display = 'block';
    container.classList.add('border-red-600');
    container.classList.remove('border-green-600');
  } else {
    errorElement.style.display = 'none';
    container.classList.remove('border-red-600');
    container.classList.add('border-green-600');
  }
}

function validateInput(input, regex, errorElement, container) {
  if (!regex.test(input.value)) {
    errorElement.style.display = 'block';
    container.classList.add('border-red-600');
    container.classList.remove('border-green-600');
  } else {
    errorElement.style.display = 'none';
    container.classList.remove('border-red-600');
    container.classList.add('border-green-600');
  }
}
const EmailRegex = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
const PasswordRegex = /^(?=.*[0-9])(?!.*[^0-9a-zA-Z-_@])[a-zA-Z0-9-_@]{8,}$/;
const NameRegex = /^[a-zA-Z0-9\s]{3,50}$/;
