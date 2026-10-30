
// Get references to form elements
const titleInput = document.getElementById("entryTitle");
const contentInput = document.getElementById("entryContent");
const postButton = document.getElementById("button-post");
const clearButton = document.getElementById("button-clear");
const titleError = document.getElementById("title-error");
const contentError = document.getElementById("content-error");

// Clear button confirmation
clearButton.addEventListener("click", function() {
    const confirmed = confirm("Are you sure you want to clear all fields?");
    if (confirmed) {
        titleInput.value = "";
        contentInput.value = "";

        // Remove any error highlighting when cleared
        titleInput.classList.remove("input-error");
        contentInput.classList.remove("input-error");
        titleError.textContent = "";
        contentError.textContent = "";
    }
});

// Check for empty fields before submitting
postButton.addEventListener("click", function(e) {
    
    // check title
    if (titleInput.value.trim() === "") {
        e.preventDefault(); // Prevent form submission
        titleInput.classList.add("input-error");
        titleError.textContent = "Title cannot be empty.";
    }
    // check content
    if (contentInput.value.trim() === "") {
        e.preventDefault();
        contentInput.classList.add("input-error");
        contentError.textContent = "Content cannot be empty.";
    }

});

// Remove error highlighting when user starts typing
titleInput.addEventListener("input", function() {
    titleInput.classList.remove("input-error");
    titleError.textContent = "";
});

contentInput.addEventListener("input", function() {
    contentInput.classList.remove("input-error");
    contentError.textContent = "";
});