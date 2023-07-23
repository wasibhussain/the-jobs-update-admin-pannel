<?php
// Connect to the database
$db = new mysqli('localhost', 'root', '', 'job_posting');

// Check if the connection was successful
if ($db->connect_error) {
  die('Error connecting to database: ' . $db->connect_error);
}

// Get the job title
$job_title = $_POST['job_title'];

// Get the image
$image = $_FILES['image'];

// Get the description
$description = $_POST['description'];

// Get the date posted
$date_posted = $_POST['date_posted'];

// Get the category
$category = $_POST['category'];

// Get the newspaper
$newspaper = $_POST['newspaper'];

// Get the jobs education
$jobs_education = $_POST['jobs_education'];

// Get the location
$location = $_POST['location'];

// Get the organization
$organization = $_POST['organization'];

// Get the job industry
$job_industry = $_POST['job_industry'];

// Get the job type
$job_type = $_POST['job_type'];

// Get the job experience
$job_experience = $_POST['job_experience'];

// Get the expected last date
$expected_last_date = $_POST['expected_last_date'];

// Move the image file to the server
move_uploaded_file($image['tmp_name'], 'images/' . $image['name']);

// Get the image file name
$image_file_name = $image['name'];

// Insert the job into the database
$sql = "INSERT INTO jobs (job_title, image, description, date_posted, category, newspaper, jobs_education, location, organization, job_industry, job_type, job_experience, expected_last_date) VALUES ('$job_title', '$image_file_name', '$description', '$date_posted', '$category', '$newspaper', '$jobs_education', '$location', '$organization', '$job_industry', '$job_type', '$job_experience', '$expected_last_date')";

// Check if the job was added successfully
if ($db->query($sql) === TRUE) {
  // Redirect to the success page
  header("Location: success.html");
  exit; // Terminate the script to prevent further execution
} else {
  // Show an error message
  echo '<script>alert("Error adding job: ' . $db->error . '");</script>';
}

// Close the database connection
$db->close();
?>
