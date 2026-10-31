 <?php
    
    session_start();
    include 'config.php';
    if (isset($_POST['add'])) {
        $fullname = $_POST['fullname'];
        $email = $_POST['email'];
        $date_of_birth = $_POST['date_of_birth'];
        $date_of_joining = $_POST['date_of_joining'];
        $salary = $_POST['salary'];
        $result = mysqli_query($conn, "SELECT * FROM employee WHERE email='$email'");
            if (mysqli_num_rows($result) > 0) {
                $_SESSION['old data']=$_POST;
            header("Location: add.php?error=email");
            exit;
            }
        if (strtotime($date_of_birth) >= strtotime($date_of_joining)) {
            echo "<script>
                    alert('Error: Date of birth cannot be greater than or equal to date of joining.');
                    window.history.back();
                </script>";
            exit; 
        } else {
            mysqli_query($conn, "INSERT INTO employee (fullname, email, date_of_birth, date_of_joining, salary) 
            VALUES ('$fullname', '$email', '$date_of_birth', '$date_of_joining', '$salary')");

        header("Location: show.php");
        exit;
    }}
    if (isset($_POST['update'])) {
        $id = $_GET['id'];
        $fullname = $_POST['fullname'];
        $email = $_POST['email'];
        $date_of_birth = $_POST['date_of_birth'];
        $date_of_joining = $_POST['date_of_joining'];
        $salary = $_POST['salary'];
            mysqli_query($conn, "UPDATE employee
                SET fullname='$fullname', email='$email', date_of_birth='$date_of_birth', date_of_joining='$date_of_joining', salary='$salary'
                WHERE emp_id='$id'");

        header("Location: show.php");
        exit;
    }
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        
        
        mysqli_query($conn, "DELETE FROM employee WHERE emp_id='$id'");
        header("Location: show.php");
        exit;
    }
?>