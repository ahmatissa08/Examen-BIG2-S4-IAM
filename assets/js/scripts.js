document.addEventListener('DOMContentLoaded', function() {
    const deleteButtons = document.querySelectorAll('input[name="delete"]');
    deleteButtons.forEach(button => {
        button.addEventListener('click', function(event) {
            const confirmation = confirm("Voulez-vous vraiment supprimer ce client?");
            if (!confirmation) {
                event.preventDefault();
            }
        });
    });
});
