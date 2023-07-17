?

    // Get the current date and time
    var currentDate = new Date();
    
    // Convert the current date to a string format compatible with the input field
    var currentDateString = currentDate.toISOString().slice(0, 16);
    
    // Set the minimum value of the input field to the current date and time
    document.getElementById("datetime").min = currentDateString
