<?php

function Email($remail, $rname, $semail, $sname, $cc, $bcc, $subject, $message, $attachments, $priority, $type)  {

// Checks if carbon copy & blind carbon copy exist
if($cc != null){$cc="CC: ".$cc."\r\n";}else{$cc="";}
if($bcc != null){$bcc="BCC: ".$bcc."\r\n";}else{$bcc="";}
$priority="";
// Checks the importance of the email
if($priority == "high"){$priority = "X-Priority: 1\r\nX-MSMail-Priority: High\r\nImportance: High\r\n";}
elseif($priority == "low"){$priority = "X-Priority: 3\r\nX-MSMail-Priority: Low\r\nImportance: Low\r\n";}
else{$priority = "";}

// Checks if it is plain text or HTML
if($type == "plain"){$type="text/plain";}else{$type="text/html";}

// The boundary is set up to separate the segments of the MIME email
$boundary = md5(@date("Y-m-d-g:ia"));

// The header includes most of the message details, such as from, cc, bcc, priority etc. 
$header = "From: ".$sname." <".$semail.">\r\nMIME-Version: 1.0\r\nX-Mailer: PHP\r\nReply-To: ".$sname." <".$semail.">\r\nReturn-Path: ".$sname." <".$semail.">\r\n".$cc.$bcc.$priority."Content-Type: multipart/mixed; boundary = ".$boundary."\r\n\r\n";    
  
// The full message takes the message and turns it into base 64, this basically makes it readable at the recipients end
$fullmessage.= "--".$boundary."\r\nContent-Type: ".$type."; charset=UTF-8\r\nContent-Transfer-Encoding: base64\r\n\r\n".chunk_split(base64_encode($message));

// A loop is set up for the attachments to be included.
if($attachments != null) {
  foreach ($attachments as $attachment)  {
    $attachment = explode(":", $attachment);
    $fullmessage.= "--".$boundary."\r\nContent-Type: ".$attachment[1]."; name=\"".$attachment[2]."\"\r\nContent-Transfer-Encoding: base64\r\nContent-Disposition: attachment\r\n\r\n".chunk_split(base64_encode(file_get_contents($attachment[0])));
  }
}

// And finally the end boundary to set the end of the message
$fullmessage .= "--".$boundary."--";

echo $rname."<".$remail.">".$subject.$fullmessage."<br/><br/>".$header;

return mail($rname."<".$remail.">", $subject, $fullmessage, $header);
}

   $i=0; 
    
   $count=count(array_filter($_FILES['file']['name'])) ;  
   echo $count;
   $file=$_FILES['file'];
for($i=0;$i<$count;$i++){ 

  if ($file["error"][$i] > 0)
    {
    echo "Return Code: " . $file["error"][$i] . "<br />";
    }
  else
    {
    
    //To save attachments.
      move_uploaded_file($file["tmp_name"][$i],
      "upload/" . $file["name"][$i]);
      echo "Stored in: " . "upload/" . $file["name"][$i]." with type".$file["type"][$i];
      
      //

      
      
   } 
  }
$RecipientEmail = $_POST['recipient']; 
echo "kjkj".$RecipientEmail;

$RecipientName = $_POST['recipient'];

echo "jhjh".$RecipientName;
$SenderEmail = "contactus@saturnalia2k13.com"; 

$SenderName = "Admin";

$subject = $_POST['subject']; 

$cc = $_POST['cc']; 

$bcc = "";

// For HTML
$type = "";

$message = $_POST['content'];

$priority = "high";

if($count==0)
$attachments = "";
else{
for($i=0;$i<$count;$i++){ 

$attachments[$i] = "upload/".$file["name"][$i].":".$file["type"][$i].":".$file["name"][$i];

}
}

$sent = Email($RecipientEmail, 
              $RecipientName, 
              $SenderEmail, 
              $SenderName, 
              $cc, 
              $bcc, 
              $subject, 
              $message, 
              $attachments, 
              $priority, 
              $type);

echo $sent ? "Mail sent Successfully" : "Error in sending mail"; 

?>