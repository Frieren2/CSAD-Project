const today = new Date();
const formattedDate = today.toISOString().split('T')[0]; // Format the date as YYYY-MM-DD
document.getElementById('date-selector').value = formattedDate;