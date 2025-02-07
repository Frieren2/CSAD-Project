const today = new Date();
const formattedDate = today.toISOString().split('T')[0];
document.getElementById('date-selector').value = formattedDate;
function updatePreview() {
    document.getElementById('preview-movie').innerText = document.getElementById('movieSelect').value || "Not selected";
    document.getElementById('preview-cinema').innerText = document.getElementById('cinemaSelect').value || "Not selected";
    document.getElementById('preview-date').innerText = document.getElementById('date-selector').value || "Not selected";
    document.getElementById('preview-screen').innerText = document.getElementById('screenselect').value || "Not selected";
    document.getElementById('preview-showtime').innerText = document.getElementById('timeselect').value || "Not selected";
}

// Add event listeners to form fields
document.getElementById('movieSelect').addEventListener('change', updatePreview);
document.getElementById('cinemaSelect').addEventListener('change', updatePreview);
document.getElementById('date-selector').addEventListener('input', updatePreview);
document.getElementById('screenselect').addEventListener('change', updatePreview);
document.getElementById('timeselect').addEventListener('change', updatePreview);

function validateForm(){
    var movie = document.getElementById('movieSelect').value.trim();
    var cinema= document.getElementById('cinemaSelect').value.trim();
    var date = document.getElementById('date-selector').value.trim();
    var screen = document.getElementById('screenselect').value.trim();
    var time = document.getElementById('timeselect').value.trim();
    if(movie===""){
        alert("Please select a movie");
        return false;
    }
    else if(cinema===""){
        alert("Please select a cinema");
        return false;
    }
    else if(date===""){
        alert("Please select a date");
        return false;
    }
    else if(screen===""){
        alert("Please select a screen");
        return false;
    }
    else if(time===""){
        alert("Please select a showtime");
        return false;
    }
    else{
        return true;
    }
}