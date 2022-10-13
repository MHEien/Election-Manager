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
    

    $sql = "SELECT * FROM voters";
    $query = $conn->query($sql);
    $url = 'https://elections.biso.no';
    while($row = $query->fetch_assoc()){
             $mail->addAddress($row['email']);
            $body = "<div><p>Link to election: $url</p></div>
            <div>
            <table>
            <tr>
              <th>Voter's ID</th>
              <th>Password</th>
            </tr>
            <tr>
              <td>".$row['voters_id']."</td>
              <td>".$row['password']."</td>
            </tr>
          </table>
          </div>";

             $mail->Body = $body;
    
             try {
          $mail->send();
          echo "Message sent";
      } catch (Exception $e) {
          echo "Mailer Error";
      }

    
      $mail->clearAddresses();
         }
    
    $mail->smtpClose();
    header('location: voters.php');
?>