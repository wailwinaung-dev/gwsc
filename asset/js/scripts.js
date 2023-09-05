// SIDEBAR TOGGLE

var sidebarOpen = false;
var sidebar = document.getElementById('sidebar');

function openSidebar() {
  if (!sidebarOpen) {
    sidebar.classList.add('sidebar-responsive');
    sidebarOpen = true;
  }
}

function closeSidebar() {
  if (sidebarOpen) {
    sidebar.classList.remove('sidebar-responsive');
    sidebarOpen = false;
  }
}

//Change Image in Edit Page (Attraction, features packages)
// Get references to the file input and image elements
const fileInput = document.getElementById('file');
const previewImage = document.getElementById('image');

// Add an event listener to the file input
fileInput.addEventListener('change', (event) => {
  // Check if a file was selected
  if (event.target.files && event.target.files[0]) {
    // Get the selected file
    const selectedFile = event.target.files[0];

    // Create a FileReader to read the file
    const reader = new FileReader();

    // Set up a callback for when the file is loaded
    reader.onload = (e) => {
      // Update the src attribute of the image with the data URL of the selected file
      previewImage.src = e.target.result;
    };

    // Read the file as a data URL
    reader.readAsDataURL(selectedFile);
  } else {
    // Clear the src attribute if no file is selected
    previewImage.src = '';
  }
});

