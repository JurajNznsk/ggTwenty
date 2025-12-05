document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('edit-character-form');
    const inputs = form.querySelectorAll('input[type="text"], input[type="number"], input[type="file"]');
    const messageBox = document.getElementById('message-box');

    // Show feedback
    function showFeedback(message, type = 'success') {
        messageBox.textContent = message;
        messageBox.className = `mt-3 alert alert-${type}`;
        messageBox.classList.remove('d-none');
        // Optionally hide the message after a few seconds
        setTimeout(() => {
            messageBox.classList.add('d-none');
        }, 5000);
    }

    // AJAX to send data
    function saveCharacterData(inputElement) {
        const formData = new FormData(form);

        fetch(form.action, {
            method: 'POST',
            body: formData
        })
            .then(response => {
                if (!response.ok) {
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
                showFeedback('Error saving data.', 'danger');
            });
    }

    // Event listeners for "autosave"
    inputs.forEach(input => {
        // Autosave when input field loses focus
        if (input.type !== 'file') {
            input.addEventListener('blur', function() {
                saveCharacterData(this);
            });
        }
    });

    // Handle Image Upload separately (it requires user interaction)
    const imageUpload = document.getElementById('image-upload');
    imageUpload.addEventListener('change', function() {
        saveCharacterData(this);
    });
});