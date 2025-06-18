document.getElementById("registrationForm").addEventListener("submit", function (e) {
  e.preventDefault(); // prevent default submission

  const email = document.getElementById("email").value.trim();
  const password = document.getElementById("password").value.trim();
  const gender = document.querySelector('input[name="gender"]:checked');
  const courses = document.querySelectorAll('input[name="courses"]:checked');
  const errorMsg = document.getElementById("errorMsg");

  const emailRegex = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
  const passwordRegex = /^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{6,}$/; // Minimum 6 chars, at least 1 letter and 1 number

  if (!emailRegex.test(email)) {
    errorMsg.textContent = "Invalid email format!";
    return;
  }

  if (!passwordRegex.test(password)) {
    errorMsg.textContent = "Password must be at least 6 characters, include letters and numbers.";
    return;
  }

  if (!gender) {
    errorMsg.textContent = "Please select your gender.";
    return;
  }

  if (courses.length === 0) {
    errorMsg.textContent = "Please select at least one course.";
    return;
  }

  errorMsg.textContent = "";
  alert("Form submitted successfully!");
  this.reset();
});
