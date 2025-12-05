document.addEventListener('DOMContentLoaded', function() {
    // 1. Get the form element and all relevant inputs
    const form = document.getElementById('edit-character-form');
    const inputs = form.querySelectorAll('input[type="text"], input[type="number"], input[type="file"]');
    const messageBox = document.getElementById('message-box');

    // Helper function to show feedback
    function showFeedback(message, type = 'success') {
        messageBox.textContent = message;
        messageBox.className = `mt-3 alert alert-${type}`; // Uses Bootstrap alert classes
        messageBox.classList.remove('d-none');
        // Optionally hide the message after a few seconds
        setTimeout(() => {
            messageBox.classList.add('d-none');
        }, 5000);
    }

    // 2. The AJAX function to send the data
    function saveCharacterData(inputElement) {
        // Create FormData object to easily capture all fields (including the hidden ID)
        const formData = new FormData(form);

        // You only strictly need the ID and the one field that changed,
        // but sending all fields is often simpler for a general save routine.

        fetch(form.action, { // Sends to the server's update URL
            method: 'POST',
            body: formData
        })
            .then(response => {
                if (!response.ok) {
                    // If the server returns an error status (e.g., 400 or 500)
                    return response.json().then(data => Promise.reject(data));
                }
                return response.json();
            })
            .then(data => {
                // Server successfully updated the data
                showFeedback('Changes saved successfully!', 'success');
            })
            .catch(error => {
                // Handle errors from the network or server-side validation
                console.error('Save failed:', error);
                showFeedback(`Error saving data: ${error.message || 'Check console for details.'}`, 'danger');
            });
    }

    // 3. Attach event listeners for autosave
    inputs.forEach(input => {
        // Autosave when an input field loses focus (blurs)
        if (input.type !== 'file') {
            input.addEventListener('blur', function() {
                saveCharacterData(this);
            });
        }
    });

    // 4. Handle Image Upload separately (it requires user interaction)
    const imageUpload = document.getElementById('image-upload');
    imageUpload.addEventListener('change', function() {
        // You'll need to add the image preview logic here as well
        // ... (existing image preview code) ...

        // Trigger the save after a new image is selected
        saveCharacterData(this);
    });
});