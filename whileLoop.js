let input = ""; // Step 1: Initialize an empty string

while (input !== "stop") {  // Step 2: Check if input is NOT "stop"
    input = prompt("Type something (type 'stop' to exit):");  // Step 3: Get user input
    console.log("You typed:", input); // Step 4: Print what the user typed
}

console.log("Loop stopped!"); // Step 5: Loop exits when input is "stop"
