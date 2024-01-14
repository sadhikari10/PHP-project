
document.getElementById('regform').addEventListener('submit', function (event) {
    // Prevent the default form submission
    event.preventDefault();

    // Collect form data
    var formData = $('#regform').serialize();

    // Make an AJAX request to the PHP file
    $.ajax({
        type: 'POST',
        url: 'Adddata.php',
        data: formData,
        success: function(response) {
            // Update the content of the "error-container" div with the response (error messages)
            $('#errorcontainer').html(response);
        },
        error: function(error) {
            console.log('Error:', error);
        }
    });
});