function validateForm() {
  var name = document.getElementById("name").value;
  var email = document.getElementById("email").value;
  var password = document.getElementById("reg-password").value;
  if (name === "") {
      alert("Name is required.");
      document.getElementById("name").focus();
      return false;
  }

  if (email === "") {
      alert("Email is required.");
      document.getElementById("email").focus();
      return false;
  }
  if (password === "") {
      alert("Password is required.");
      document.getElementById("reg-password").focus();
      return false;
  }

  return true;
}