function validateForm(event) {
  const firstName = document.forms["myForm"]["firstName"].value.trim();
  const lastName = document.forms["myForm"]["lastName"].value.trim();

  if (firstName === "" || lastName === "") {
    alert("Both fields must not be empty.");
    event.preventDefault();
    return false;
  }

  if (firstName.length < 2 || lastName.length < 2) {
    alert("Each field must have at least 2 characters.");
    event.preventDefault();
    return false;
  }

  return true; // allow submission
}
