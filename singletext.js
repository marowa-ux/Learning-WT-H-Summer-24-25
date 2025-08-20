// Wait until DOM is loaded
document.addEventListener("DOMContentLoaded", function () {
  const usernameInput = document.getElementById("username");

  // Add event listener to convert to uppercase as user types
  usernameInput.addEventListener("input", function () {
    this.value = this.value.toUpperCase();
  });
});
