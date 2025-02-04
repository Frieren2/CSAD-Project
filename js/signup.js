document.getElementById("signup").addEventListener("submit", (event)=>{
    event.preventDefault();
    submit();
});

function submit(){
    // get input values
    const email = document.getElementById("email").value;
    const username = document.getElementById("username").value;
    const password = document.getElementById("password").value;

    // validate input


    // api call to submit
    fetch('/api/router.php?route=signup', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
        },
        body: JSON.stringify({ username, email, password }), // convert data to JSON
    })
        .then(response => {
            if (!response.ok) {
                throw new Error('Network response was not ok');
            }
            return response.json();
        })
        .then(data => {
            // set cookies, go to profile page
            alert(data['message']);
        })
        .catch(error => {
            // Handle errors
            document.getElementById('message').textContent = 'Signup failed. Try again.';
            console.error('Error:', error);
        });
}
