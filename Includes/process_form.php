<?php
include 'db_connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $form_type = $_POST['form_type'];

    // Business Enquiry
    if ($form_type == "enquiry") {
        $name  = $_POST['name'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $msg   = $_POST['message'];

        $stmt = $conn->prepare("INSERT INTO enquiries (full_name, email, phone, message) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $name, $email, $phone, $msg);

        if ($stmt->execute()) {
            echo "<script>alert('Enquiry submitted successfully!'); window.location.href='index.html';</script>";
        }

    // Career Application
    } elseif ($form_type == "career") {
        $name  = $_POST['name'];
        $email = $_POST['email'];
        $job   = $_POST['job_post'];
        $other = $_POST['other_title'];

        // File upload
        $resume = "";
        if (!empty($_FILES['resume']['name'])) {
            $target_dir = "uploads/resumes/";
            if (!is_dir($target_dir)) mkdir($target_dir, 0777, true);
            $resume = $target_dir . time() . "_" . basename($_FILES["resume"]["name"]);
            move_uploaded_file($_FILES["resume"]["tmp_name"], $resume);
        }

        $stmt = $conn->prepare("INSERT INTO career_applications (full_name, email, job_post, other_title, resume_path) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("sssss", $name, $email, $job, $other, $resume);

        if ($stmt->execute()) {
            echo "<script>alert('Application submitted successfully!'); window.location.href='index.html';</script>";
        }

    // Feedback
    } elseif ($form_type == "feedback") {
        $name = $_POST['name'];
        $fb   = $_POST['feedback'];

        $stmt = $conn->prepare("INSERT INTO feedback (full_name, feedback) VALUES (?, ?)");
        $stmt->bind_param("ss", $name, $fb);

        if ($stmt->execute()) {
            echo "<script>alert('Thanks for your feedback!'); window.location.href='index.html';</script>";
        }

    // Complaint
    } elseif ($form_type == "complaint") {
        $name  = $_POST['name'];
        $issue = $_POST['issue'];

        $stmt = $conn->prepare("INSERT INTO complaints (name, issue) VALUES (?, ?)");
        $stmt->bind_param("ss", $name, $issue);

        if ($stmt->execute()) {
            echo "<script>alert('Complaint recorded. We will reach out.'); window.location.href='index.html';</script>";
        }
    }
}
?>
