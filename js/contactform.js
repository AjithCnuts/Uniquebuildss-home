
  document.getElementById("myForm").addEventListener("submit", function(event) {
    event.preventDefault();  // Prevent default form submission

    // Example of sending form data
    var formData = new FormData(this);

    // Example of using fetch to send data to your deployed server endpoint
    fetch("https://your-server-endpoint.com/send_email", { // Replace with your actual URL
      method: "POST",
      body: formData,
    })
    .then(response => response.json())  // Assuming the server returns JSON
    .then(data => {
      if (data.message === 'Email sent successfully!') {
        // Reset form fields
        document.getElementById("myForm").reset();

        // Optionally, show a success message
        alert("Form submitted successfully!");

        // Redirect or perform additional actions if needed
      } else {
        // Handle error or failed submission
        alert("There was an issue with the form submission. Please try again.");
      }
    })
    .catch(error => {
      // Handle network or other errors
      alert("An error occurred. Please try again.");
    });
  });
