const deleteForm = document.querySelectorAll('.delete-form');

deleteForm.forEach(
    form => {
        form.addEventListener('submit', (e) => {
            e.preventDefault();
            const check = confirm('Vuoi eliminare questo post?');
            if (check) e.target.submit();
        } )
    }
)