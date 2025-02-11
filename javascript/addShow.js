var today = new Date();
var formattedDate = today.toISOString().split('T')[0];
document.getElementById('date-selector').value = formattedDate;
function updatePreview() {
    var movieSelect = document.getElementById('movieSelect').value || "Not selected";   //get value of all select options if select is blank display Not selected
    var cinemaSelect = document.getElementById('cinemaSelect').value || "Not selected";
    var dateSelect = document.getElementById('date-selector').value || "Not selected";
    var screenselect = document.getElementById('screenselect').value || "Not selected";
    var timeselect = document.getElementById('timeselect').value || "Not selected";
    document.getElementById('preview-movie').innerText = movieSelect;
    document.getElementById('preview-cinema').innerText = cinemaSelect;
    document.getElementById('preview-date').innerText = dateSelect;
    document.getElementById('preview-screen').innerText = screenselect;
    document.getElementById('preview-showtime').innerText = timeselect;
}

// Add event listeners to form fields
document.getElementById('movieSelect').addEventListener('change', updatePreview);  //When the option changes it will call function updatePreview
document.getElementById('cinemaSelect').addEventListener('change', updatePreview);
document.getElementById('date-selector').addEventListener('change', updatePreview);
document.getElementById('screenselect').addEventListener('change', updatePreview);
document.getElementById('timeselect').addEventListener('change', updatePreview);

function validateForm(){
    var movie = document.getElementById('movieSelect').value.trim(); //Validating form 
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