document.addEventListener("DOMContentLoaded", function () {
  const ageInput = document.getElementById("age");
  const messageDiv = document.getElementById("message");

  ageInput.addEventListener("input", function () {
    const age = parseInt(this.value, 10);

    // Clear previous message
    messageDiv.textContent = "";
    messageDiv.classList.remove("red-text");

    if (!isNaN(age)) {
      if (age < 40) {
        messageDiv.textContent = "To be a part of the community, you need to at least 40.";
      } else if (age >= 40 && age <= 50) {
        messageDiv.textContent = "You are the youngsters of this community.";
      } else if (age > 50) {
        messageDiv.textContent = "Top level members of the group";
        messageDiv.classList.add("red-text");
      }
    }
  });
});
