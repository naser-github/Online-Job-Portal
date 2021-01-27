<?php
session_start();
$id= $_SESSION['user_name'];

include '../db_con.php';
 
$sql = "SELECT * FROM seeker where sk_email = '$id'";
$result = mysqli_query($con, $sql);

$files = mysqli_fetch_all($result, MYSQLI_ASSOC);

if (isset($_POST["save"]))
{
    $filename = $_FILES['myfile']['name'];

    // destination of the file on the server
    $destination = 'uploads/' . $filename;

    // get the file extension
    $extension = pathinfo($filename, PATHINFO_EXTENSION);

    // the physical file on a temporary uploads directory on the server
    $file = $_FILES['myfile']['tmp_name'];
    $size = $_FILES['myfile']['size'];

    if (!in_array($extension, ['zip', 'pdf', 'docx'])) {
        echo "You file extension must be .zip, .pdf or .docx";
    } elseif ($_FILES['myfile']['size'] > 1000000) { // file shouldn't be larger than 1Megabyte
        echo "File too large!";
    } else {
        // move the uploaded (temporary) file to the specified destination
        if (move_uploaded_file($file, $destination)) {
            $sql = "UPDATE seeker SET sk_pdf='$filename' where sk_email = '$id'";
            if (mysqli_query($con, $sql)) {
                ?>
                    <script> 
                        alert("File Successfully uploaded");
                    </script>
                <?php
            }
        } else {
            ?>
                <script>
                    alert("Error!!!");
                </script>
            <?php
        }
    }
}

if (isset($_GET['file_id'])) {
    $id1 = $_GET['file_id'];

    // fetch file to download from database
    $sql = "SELECT * FROM seeker WHERE sk_email='$id' ";
    $result = mysqli_query($con, $sql);

    $file = mysqli_fetch_assoc($result);
    $filepath = 'uploads/' . $file['sk_pdf'];


    if (file_exists($filepath)) {
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename=' .basename($filepath) ); 
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Length: ' . filesize('uploads/' . $file['sk_pdf']));
        readfile('uploads/' . $file['sk_pdf']);
    }

}
?>

