<?php
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

	include 'includes/session.php';
    require '../bower_components/phpmailer/src/Exception.php';
    require '../bower_components/phpmailer/src/PHPMailer.php';
    require '../bower_components/phpmailer/src/SMTP.php';

    $mail = new PHPMailer;
    $mail->isSMTP();
    $mail->Host = 'smtp.office365.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'elections@biso.no'; 
    $mail->Password = 'Elect!on22'; 
    $mail->SMTPSecure = 'tls';
    $mail->Port = 587;
    $mail->SMTPKeepAlive = true; 
    
    $mail->setFrom('elections@biso.no', 'BISO Elections');
    $mail->Subject = "Election Voter key";
    $mail->isHTML(true);
    
    if(isset($_POST['sendmailsingle'])){
        $id = $_POST['id'];
        $sql = "SELECT * FROM voters WHERE id = '$id'";
        $query = $conn->query($sql);
        $row = $query->fetch_assoc();
        $mail->addAddress($row['email']);
        $mail->Body = "Dear ".$row['firstname'].",<br><br>
        Your voter key is: ".$row['voters_key']."<br><br>
        Please use this key to login to the BISO Elections website.<br><br>
        Best regards,<br>
        BISO Elections";
        if($mail->send()){
            $_SESSION['success'] = 'Email sent successfully';
        }
        else{
            $_SESSION['error'] = $mail->ErrorInfo;
        }
    }
    else{
        $_SESSION['error'] = 'Select user to send email first';
    }

    header('location: voters.php');

?>