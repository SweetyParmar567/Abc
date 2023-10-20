<!-- Display the data -->
<div>
    <label>Name:</label>
    <input type="text" value="{{ $data->name }}" readonly>
</div>
<div>
    <label>Email:</label>
    <input type="text" value="{{ $data->email }}" readonly>
</div>

<!-- Edit button -->
<button id="edit-button">Edit</button>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const editButton = document.getElementById('edit-button');
        const inputFields = document.querySelectorAll('input[type="text"]');

        editButton.addEventListener('click', function () {
            inputFields.forEach(function (input) {
                input.readOnly = !input.readOnly;
            });
        });
    });
</script>