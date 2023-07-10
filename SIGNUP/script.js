// js/script.js

document.getElementById("signup-form").addEventListener("submit", function(event) {
  event.preventDefault(); // Prevent form submission

  // Get form values
  var email = document.getElementById("email").value;
  var username = document.getElementById("username").value;
  var password = document.getElementById("password").value;

  // Perform validation
  var isValid = true;
  var errorMessages = [];

  if (!validateEmail(email)) {
    isValid = false;
    errorMessages.push("Please enter a valid email address.");
  }

  if (!validateUsername(username)) {
    isValid = false;
    errorMessages.push("Username must be between 4 and 20 characters.");
  }

  if (!validatePassword(password)) {
    isValid = false;
    errorMessages.push("Password must be at least 8 characters long.");
  }

  if (!isValid) {
    displayErrors(errorMessages);
    return;
  }

  // If the form is valid, proceed with further actions (e.g., AJAX submission, etc.)
});

function validateEmail(email) {
  // Regular expression for email validation
  var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
  return emailRegex.test(email);
}

function validateUsername(username) {
  var minLength = 4;
  var maxLength = 20;
  return username.length >= minLength && username.length <= maxLength;
}

function validatePassword(password) {
  var minLength = 8;
  return password.length >= minLength;
}

function displayErrors(errors) {
  var errorContainer = document.getElementById("error-container");
  errorContainer.innerHTML = ""; // Clear previous error messages

  errors.forEach(function(error) {
    var errorElement = document.createElement("div");
    errorElement.classList.add("error-message");
    errorElement.textContent = error;
    errorContainer.appendChild(errorElement);
  });
}
