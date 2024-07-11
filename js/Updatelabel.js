document.querySelectorAll('input[type="text"]').forEach(function (input) {
    input.addEventListener('keydown', function (event) {
        if (event.key === 'Enter') {
            event.preventDefault();
            console.log('Enter key pressed');  // Log a message when the Enter key is pressed

            updateLabel(input);
        }
    });
});

function updateLabel(input) {
    var name = input.name;
    var label = input.value;

    fetch('Update.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded',
        },
        body: 'name=' + encodeURIComponent(name) + '&label=' + encodeURIComponent(label)
    })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                console.log('Label updated successfully');
            } else {
                console.error('Failed to update label:', data.error);
            }
        })
        .catch((error) => {
            console.error('Error:', error);
        });
}