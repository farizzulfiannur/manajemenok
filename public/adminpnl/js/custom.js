function addInputField() {
    const inputFields = $("#input-fields");
    // Create a new input field
    const newField = $("<div class='col-md-6'>");
    newField.append('<label class="form-label"> Member ' + (inputFields.children().length + 1) + '</label>');
    newField.append('<div class="form-group"><select class="form-custom form-select form-select-lg" aria-label="Large select example"><option value="1">One</option><option value="2">Two</option></div></div>');
    newField.append('<select class="form-custom form-select form-select-lg" aria-label="Large select example">');
    // newField.append('<option selected>Open this select menu</option>');
    // newField.append('<option value="1">One</option>');
    // newField.append('<option value="2">Two</option>');
    // newField.append('</div>');
    // newField.append('</div>');

    // Append the new field to the form
    inputFields.append(newField);
}

// Call the function to add a new input field when the "Add Field" button is clicked
$(document).on("click", "#add-field", function() {
    addInputField();
});

// Submit form handler (you can customize this to handle the form submission)
$(document).on("submit", "#dynamic-form", function(event) {
    event.preventDefault();
    // Your form submission logic here
    alert("Form submitted!");
});

