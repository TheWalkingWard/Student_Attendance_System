document.getElementById('role-select').addEventListener('change', function() {
    var label = document.querySelector('label[for="username"]');
    if (this.value === 'user') {
        label.textContent = 'Student Number';
    } else {
        label.textContent = 'Username';
    }
});
