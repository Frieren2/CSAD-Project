
  
  // Example schedule data
  function handleDateChange(selectedDate) {
    const locationsContainer = document.getElementById('locations-container');
    locationsContainer.innerHTML = ""; // clear previous results
  
    // If we have data for the selected date, display it
    if (scheduleData[selectedDate]) {
      scheduleData[selectedDate].forEach((cinema) => {
        const locationDiv = document.createElement('div');
        locationDiv.className = "location";
        
        const heading = document.createElement('h3');
        heading.textContent = cinema.location;
        locationDiv.appendChild(heading);
        
        const ul = document.createElement('ul');
        
        cinema.times.forEach((time) => {
          const li = document.createElement('li');
          const btn = document.createElement('button');
          btn.className = "timing-btn";
          btn.textContent = time;
  

          btn.addEventListener('click', function() {
            const url = `index.php?page=select-seat&movieId=${encodeURIComponent(movieId)}`
                      + `&location=${encodeURIComponent(cinema.location)}`
                      + `&time=${encodeURIComponent(time)}`;
  
            window.location.href = url;
          });
  
          li.appendChild(btn);
          ul.appendChild(li);
        });
        
        locationDiv.appendChild(ul);
        locationsContainer.appendChild(locationDiv);
      });
    } else {
      // No data for selected date
      const noDataMsg = document.createElement('p');
      noDataMsg.textContent = "No showtimes available for the selected date.";
      locationsContainer.appendChild(noDataMsg);
    }
  }

  const scheduleData = {
    "2025-02-03": [
      {
        location: "Cathay Cineplex (Downtown)",
        times: ["10:00 AM", "1:00 PM", "4:00 PM", "7:00 PM"]
      },
      {
        location: "Golden Village (City Square)",
        times: ["10:00 AM", "1:00 PM", "7:00 PM"]
      }
    ],
    "2025-02-04": [
      {
        location: "Cathay Cineplex (Downtown)",
        times: [ "1:00 PM", "4:00 PM", "7:00 PM"]
      },
      {
        location: "Golden Village (City Square)",
        times: ["10:00 AM", "1:00 PM", "4:00 PM", "7:00 PM"]
      }
    ],
    "2025-02-05": [
      {
        location: "Cathay Cineplex (Downtown)",
        times: ["10:00 AM", "1:00 PM", "7:00 PM"]
      },
      {
        location: "Golden Village (City Square)",
        times: ["10:00 AM", "1:00 PM", "4:00 PM", "7:00 PM"]
      }
    ],
    "2025-02-06": [
      {
        location: "Cathay Cineplex (Downtown)",
        times: [ "1:00 PM", "4:00 PM", "7:00 PM"]
      },
      {
        location: "Golden Village (City Square)",
        times: ["10:00 AM", "4:00 PM", "7:00 PM"]
      }
    ],
    "2025-02-07": [
      {
        location: "Cathay Cineplex (Downtown)",
        times: ["10:00 AM", "1:00 PM", "4:00 PM", "7:00 PM"]
      },
      {
        location: "Golden Village (City Square)",
        times: ["10:00 AM", "1:00 PM", "7:00 PM"]
      }
    ],
    "2025-02-08": [
      {
        location: "Cathay Cineplex (Downtown)",
        times: ["10:00 AM", "1:00 PM", "4:00 PM", "7:00 PM"]
      },
      {
        location: "Golden Village (City Square)",
        times: ["10:00 AM", "1:00 PM", "4:00 PM", "7:00 PM"]
      }
    ],
    "2025-02-09": [
      {
        location: "Cathay Cineplex (Downtown)",
        times: ["10:00 AM", "1:00 PM", "4:00 PM", "7:00 PM"]
      },
      {
        location: "Golden Village (City Square)",
        times: ["10:00 AM", "1:00 PM", "4:00 PM", "7:00 PM"]
      }
    ]
  };



