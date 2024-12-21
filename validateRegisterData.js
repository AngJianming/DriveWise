document.addEventListener("DOMContentLoaded", () => {
  // Reference to the registration form
  const registrationForm = document.getElementById("registrationForm");

  // Helper function to show validation feedback
  function setValidationFeedback(row, isValid, message = "") {
    if (isValid) {
      row.classList.remove("invalid");
      row.classList.add("valid");
      const errorMessage = row.querySelector(".error-message");
      if (errorMessage) {
        errorMessage.textContent = "";
      }
    } else {
      row.classList.remove("valid");
      row.classList.add("invalid");
      let errorMessage = row.querySelector(".error-message");
      if (!errorMessage) {
        errorMessage = document.createElement("div");
        errorMessage.classList.add("error-message");
        row.appendChild(errorMessage);
      }
      errorMessage.textContent = message;
    }
    return { isValid, message };
  }

  function validateUsername() {
    const username = document.getElementById("username");
    const row = document.getElementById("usernameRow");
    const regex = /^[A-Za-z0-9]{4,}$/; // Alphanumeric, at least 4 characters
    const isValid = regex.test(username.value.trim());
    const message = isValid ? "" : "Username must be at least 4 alphanumeric characters.";
    return setValidationFeedback(row, isValid, message);
  }

  function validatePassword() {
    const password = document.getElementById("password");
    const row = document.getElementById("passwordRow");
    const regex = /^.{4,}$/; // At least 4 characters
    const isValid = regex.test(password.value);
    const message = isValid ? "" : "Password must be at least 4 characters.";
    return setValidationFeedback(row, isValid, message);
  }

  function validateDOB() {
    const dob = document.getElementById("dob");
    const row = document.getElementById("dobRow");
    if (!dob.value) {
      const message = "Please enter your date of birth.";
      return setValidationFeedback(row, false, message);
    }

    const birthDate = new Date(dob.value);
    const today = new Date();
    let age = today.getFullYear() - birthDate.getFullYear();
    const monthDifference = today.getMonth() - birthDate.getMonth();
    if (
      monthDifference < 0 ||
      (monthDifference === 0 && today.getDate() < birthDate.getDate())
    ) {
      age--;
    }

    const isValid = age >= 16;
    const message = isValid ? "" : "You must be at least 16 years old.";
    return setValidationFeedback(row, isValid, message);
  }

  function validateEmail() {
    const email = document.getElementById("email");
    const row = document.getElementById("emailRow");
    const regex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/; // Simple email regex
    const isValid = regex.test(email.value.trim());
    const message = isValid ? "" : "Please enter a valid email address.";
    return setValidationFeedback(row, isValid, message);
  }

  // Utility function to display messages
  function displayMessage(messageText, isSuccess) {
    const message = document.getElementById("loginMessage");
    message.textContent = messageText;
    message.style.color = isSuccess ? "#28a745" : "#ff6b6b"; // Green for success, red for error
  }

  // Form validation
  function validateForm(event) {
    event.preventDefault(); // Prevent default form submission

    const errors = [];

    const usernameValidation = validateUsername();
    if (!usernameValidation.isValid) errors.push(usernameValidation.message);

    const passwordValidation = validatePassword();
    if (!passwordValidation.isValid) errors.push(passwordValidation.message);

    const dobValidation = validateDOB();
    if (!dobValidation.isValid) errors.push(dobValidation.message);

    const emailValidation = validateEmail();
    if (!emailValidation.isValid) errors.push(emailValidation.message);

    if (errors.length === 0) {
      displayMessage("Registration successful!", true);
      // Proceed with form submission or further processing
      // For example, submit the form data via AJAX or redirect
      // To submit the form normally, you can remove event.preventDefault()
      // Or use registrationForm.submit();
    } else {
      // Display all error messages to the user
      displayMessage(
        "Unable to register due to the following errors:\n" + errors.join("\n"),
        false
      );
    }
  }

  // Reset event handler
  registrationForm.addEventListener("reset", () => {
    const rows = document.querySelectorAll(".row");
    rows.forEach((row) => {
      row.classList.remove("valid");
      row.classList.remove("invalid");
      const errorMessage = row.querySelector(".error-message");
      if (errorMessage) {
        errorMessage.textContent = "";
      }
    });
    displayMessage("", true);
  });

  // Event listeners for real-time validation
  document.getElementById("username").addEventListener("input", validateUsername);
  document.getElementById("password").addEventListener("input", validatePassword);
  document.getElementById("dob").addEventListener("change", validateDOB);
  document.getElementById("email").addEventListener("input", validateEmail);

  // Form submission
  registrationForm.addEventListener("submit", validateForm);
});








