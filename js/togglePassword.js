// Function that toggles inputted password as visible or hidden
let togglePassword = () => {
  // Password elements
  const togglePasswordButtons = document.querySelector("#togglePasswordButtons");
  const openEye = document.querySelector("#openEye");
  const closedEye = document.querySelector("#closedEye");
  const password = document.querySelector("#password");
  // ...

  // Password visibility is set to false or hidden by default
  let passwordVisibility = false;
  // ...

  togglePasswordButtons.addEventListener("click", function () {
    if (!passwordVisibility) {
      // Show password
      password.type = "text";
      closedEye.classList.add("hide");
      openEye.classList.remove("hide");
    } else {
      // Hide Password
      password.type = "password";
      closedEye.classList.remove("hide");
      openEye.classList.add("hide");
    }
    passwordVisibility = !passwordVisibility;
  });
};

togglePassword();
// ...
