window.onload = function() {
    if (!sessionStorage.getItem('formClosed')) {
        setTimeout(function() {
            document.getElementById('queryForm').style.display = 'flex';
        }, 600000); // 60000 milliseconds = 1 minute
    }
};

function closeForm() {
    document.getElementById('queryForm').style.display = 'none';
    sessionStorage.setItem('formClosed', 'true');
    window.location.href = 'index.html'; // Redirect to index.html
}

