<?php
if(!isset($_POST['submit']))
{

	echo "error; you need to submit the form!";
}

$name = $_POST['nimi'];
  $email = $_POST['email'];
  $teema = $_POST['teema'];
  $lisainfo = $_POST['lisainfo'];

//Valideerimine
if(empty($name)||empty($email)) 
{
    echo "Nimi ja Email peab olema lisatud!";
    exit;
}

if(IsInjected($email))
{
    echo "Bad email value!";
    exit;
}

$email_from = 'info@pilkuse.ee';
$email_subject = "Puhkemaja Kontaktivorm";
$email_body = "Teile on tulnud sõnum pilkuse puhkemaja kontaktivormilt:\n $teema . $lisainfo".
    
$to = "henrilindret@gmail.com";
$headers = "From: $email_from \r\n";
$headers .= "Reply-To: $visitor_email \r\n";
//Saadab meili
mail($to,$email_subject,$email_body,$headers);

header('Location: index.php');


// Function to validate against any email injection attempts
function IsInjected($str)
{
  $injections = array('(\n+)',
              '(\r+)',
              '(\t+)',
              '(%0A+)',
              '(%0D+)',
              '(%08+)',
              '(%09+)'
              );
  $inject = join('|', $injections);
  $inject = "/$inject/i";
  if(preg_match($inject,$str))
    {
    return true;
  }
  else
    {
    return false;
  }
}
   
?> 