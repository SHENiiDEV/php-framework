<?php
if ( !isset( $_SESSION ) ) session_start();
if ( !$_POST ) exit;
if ( !defined( "PHP_EOL" ) ) define( "PHP_EOL", "\r\n" );

$to = "info@ring-travel.de";
$absenderadresse = 'bestellung@transfer-berlin.ru';
$subject = "Запрос на трансфер от " . date("Y/m/d");

foreach ($_POST as $key => $value) {
    if (ini_get('magic_quotes_gpc'))
        $_POST[$key] = stripslashes($_POST[$key]);
    $_POST[$key] = htmlspecialchars(strip_tags($_POST[$key]));
}

// Spam Check
$cookie = $_COOKIE["timesp"];
$timestamp = time();
$spm = 'ok';

// Language
// Spam Check
$l = $_COOKIE["lang"];
$msend = 'Cообщение отправлено';
$mmessage = 'Ваш запрос отправлен';
$mtel = 'Телефон';
$mtext = 'Сообщение';
$mclose = 'Закрыть';
$mname = 'Имя';
$entername = 'Введите имя';
$namelg = 'Имя должно быть не короче двух букв';
$enterml = 'Введите Ваш email';
$mllg = 'Пожалуйста введите правильный email';
$entermg = 'Введите Ваше сообщение';
$mglg = 'Сообщение должно состоять минимум из 10 букв';
$erlst = 'Выявлены следующие ошибки';

if ($l=='de'){
	$msend = 'Nachricht verschickt';
	$mmessage = 'Ihre Anfrage wurde verschickt';
	$mtel = 'Telefon';
	$mtext = 'Text';
	$mclose = 'Schließen';
	$mname = 'Name';
	$entername = 'Geben Sie Ihren Namen ein';
	$namelg = 'Name muss mindestens aus 2 Buchtaben bestehen';
	$enterml = 'Geben Sie Ihre E-Mail ein';
	$mllg = 'Die eingegebene E-Mail existiert nicht';
	$entermg = 'Schreiben Sie bitte eine Nachricht';
	$mglg = 'Nachricht muss mindestens aus 10 Buchtaben bestehen';
	$erlst = 'Folgende Fehler gefunden';
}
if ($l=='en'){
	$msend = 'Message send';
	$mmessage = 'Your request has been send';
	$mtel = 'Phone';
	$mtext = 'Request';
	$mname = 'Name';
	$mclose = 'Close';
	$entername = 'Enter your name';
	$namelg = 'The name must consist of at least 2 letters';
	$enterml = 'Enter your email';
	$mllg = 'This email is incorrect';
	$entermg = 'Enter your message';
	$mglg = 'Message must consist of at least 10 letters';
	$erlst = 'The following errors were detected';
}
if ($l=='de'){$l = "DEUTSCH";} elseif ($l=='en'){$l = "ENGLISH";} else {$l='Русский';}


// Assign the input values to variables for easy reference
$name      = @$_POST["name"];
$email     = @$_POST["email"];
$phone     = @$_POST["phone"];
$message   = @$_POST["comment"];

// Test input values for errors
$errors = array();
 //php verif name
if(isset($_POST["name"])){
        if (!$name) {
            $errors[] = $mclose;
        } elseif(strlen($name) < 2)  {
            $errors[] = $namelg;
        }
}
    //php verif email
if(isset($_POST["email"])){
    if (!$email) {
        $errors[] = $enterml;
    } else if (!validEmail($email)) {
        $errors[] = $mllg;
    }
}

//php verif comment
if(isset($_POST["comment"])){
    if (strlen($message) < 10) {
        if (!$message) {
            $errors[] = $entermg;
        } else {
            $errors[] = $mglg;
        }
    }
}

if ($errors) {
        // Output errors and die with a failure message
    $errortext = "";
    foreach ($errors as $error) {
        $errortext .= '<li>'. $error . "</li>";
    }
    echo '<div class="alert alert-danger">'.$erlst.':<br><ul>'. $errortext .'</ul></div>';
}else{
	// Spam Check
	if ($cookie==''){$spm = 'no cookie';}
	if ($spm=='ok'){if ($timestamp-$cookie<60){$spm ='no cookie';}}

	setcookie("timesp","",time() - 3600);

    // Send the email
    $headers  = "From: $absenderadresse" . PHP_EOL;
	// $headers .= "Reply-To: $email" . PHP_EOL;
    $headers .= "MIME-Version: 1.0" . PHP_EOL;
    $headers .= "Content-type: text/plain; charset=utf-8" . PHP_EOL;
    $headers .= "Content-Transfer-Encoding: quoted-printable" . PHP_EOL;

    $mailBody  = "Получено сообщение от: $name" . PHP_EOL . PHP_EOL;
    //$mailBody .= (!empty($company))?'Company: '. PHP_EOL.$company. PHP_EOL . PHP_EOL:'';
    //$mailBody .= (!empty($quoteType))?'project Type: '. PHP_EOL.$quoteType. PHP_EOL . PHP_EOL:'';
	//$mailBody .= "Дата трансфера: $transfer_day $transfer_month $transfer_year". PHP_EOL . PHP_EOL;
    $mailBody .= "Сообщение :" . PHP_EOL;
    $mailBody .= $message . PHP_EOL . PHP_EOL;
    $mailBody .= "Свяжетесь с $name на языке $l по email: $email ";
    $mailBody .= (isset($phone) && !empty($phone))?" или по телефону $phone." . PHP_EOL . PHP_EOL:'';
    $mailBody .= "-------------------------------------------------------------------------------------------" . PHP_EOL;

	if ($spm != 'no cookie'){
		if(mail($to, $subject, $mailBody, $headers)){
			echo '
	<div class="modal fade" id="handler-answer" tabindex="-1" role="dialog" aria-labelledby="meinModalLabel">
	  <div class="modal-dialog" role="document">
		<div class="modal-content">
		  <div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-label="Schließen"><span aria-hidden="true">&times;</span></button>
			<h2 class="modal-title" id="meinModalLabel">'.$msend.'</h2>
		  </div>
		  <div class="modal-body">
			<p>'.$mmessage.' <br/>'.$mname.': ' . $name .'<br/>E-Mail: '. $email.'<br/>'.$mtel.': '.$phone.' <br/>'.$mtext.': '.$message.'</p
		  </div>
		  <div class="modal-footer">
			<button type="button" class="btn btn-default" data-dismiss="modal">'.$mclose.'</button>
		  </div>
		</div>
	  </div>
	</div>				
	<script>
	$("#handler-answer").modal("show");
	</script>
	';
		}
	}	
}

// FUNCTIONS 
function validEmail($email) {
    $isValid = true;
    $atIndex = strrpos($email, "@");
    if (is_bool($atIndex) && !$atIndex) {
        $isValid = false;
    } else {
        $domain = substr($email, $atIndex + 1);
        $local = substr($email, 0, $atIndex);
        $localLen = strlen($local);
        $domainLen = strlen($domain);
        if ($localLen < 1 || $localLen > 64) {
            // local part length exceeded
            $isValid = false;
        } else if ($domainLen < 1 || $domainLen > 255) {
            // domain part length exceeded
            $isValid = false;
        } else if ($local[0] == '.' || $local[$localLen - 1] == '.') {
            // local part starts or ends with '.'
            $isValid = false;
        } else if (preg_match('/\\.\\./', $local)) {
            // local part has two consecutive dots
            $isValid = false;
        } else if (!preg_match('/^[A-Za-z0-9\\-\\.]+$/', $domain)) {
            // character not valid in domain part
            $isValid = false;
        } else if (preg_match('/\\.\\./', $domain)) {
            // domain part has two consecutive dots
            $isValid = false;
        } else if (!preg_match('/^(\\\\.|[A-Za-z0-9!#%&`_=\\/$\'*+?^{}|~.-])+$/', str_replace("\\\\", "", $local))) {
            // character not valid in local part unless
            // local part is quoted
            if (!preg_match('/^"(\\\\"|[^"])+"$/', str_replace("\\\\", "", $local))) {
                $isValid = false;
            }
        }
        if ($isValid && !(checkdnsrr($domain, "MX") || checkdnsrr($domain, "A"))) {
            // domain not found in DNS
            $isValid = false;
        }
    }
    return $isValid;
}

?>
