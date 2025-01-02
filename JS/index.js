// Example addition to index.js

// Function to display the current date and time
function displayDateTime() {
  const now = new Date();
  console.log(`Current Date: ${now.toDateString()}`);
  console.log(`Current Time: ${now.toLocaleTimeString()}`);
}

// Event listener for DOMContentLoaded
document.addEventListener('DOMContentLoaded', () => {
  console.log('Index.js is loaded and running!');
  displayDateTime(); // Call the function when the page loads
});

// Example of adding a utility function
function calculateSquare(number) {
  if (isNaN(number)) {
    console.error('Invalid input: Not a number');
    return null;
  }
  return number * number;
}

// Test the utility function
console.log(`Square of 5: ${calculateSquare(5)}`);
