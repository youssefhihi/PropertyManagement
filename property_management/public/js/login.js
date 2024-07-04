// ------------------------------------Login Form-----------------------------------------------

// Validate input function
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

// login form
var loginForm = document.getElementById('loginForm');
var loginEmail = loginForm.querySelector('.loginEmail');
var loginPassword = loginForm.querySelector('.loginPassword');
var passwordBox = loginForm.querySelector('.passwordbox');
var emailBox = loginForm.querySelector('.emailbox');

// error messages variables
var EmailLoginHelp = loginForm.querySelector('.emailLoginError');
var PasswordLoginHelp = loginForm.querySelector('.passwordLoginError');

const EmailRegex = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
const PasswordRegex = /^(?=.*[0-9])(?!.*[^0-9a-zA-Z-_@])[a-zA-Z0-9-_@]{8,}$/;
const NameRegex = /^[a-zA-Z0-9\s]{3,50}$/;
// Login Form Submit function
// Login Form Submit function
loginForm.addEventListener('submit', e => {
  e.preventDefault();
  var passwordLoginValue = loginPassword.value;
  var isValid = true;

  if (!PasswordRegex.test(passwordLoginValue)) {
    PasswordLoginHelp.style.display = 'block';
    passwordBox.classList.add('border-red-600');
    passwordBox.classList.remove('border-green-600');
    isValid = false;
  } else {
    PasswordLoginHelp.style.display = 'none';
    passwordBox.classList.remove('border-red-600');
    passwordBox.classList.add('border-green-600');
  }

  if (!EmailRegex.test(loginEmail.value)) {
    EmailLoginHelp.style.display = 'block';
    emailBox.classList.add('border-red-600');
    emailBox.classList.remove('border-green-600');
    isValid = false;
  } else {
    EmailLoginHelp.style.display = 'none';
    emailBox.classList.remove('border-red-600');
    emailBox.classList.add('border-green-600');
  }

  // Submit form if valid
  if (isValid) {
    loginForm.submit();
  }
});

// Email Error Check for Login
loginEmail.addEventListener('input', function() {
  validateInput(loginEmail, EmailRegex, EmailLoginHelp, emailBox);
});

// Password Error Check for Login
loginPassword.addEventListener('input', function() {
  validateInput(loginPassword, PasswordRegex, PasswordLoginHelp, passwordBox);
});

