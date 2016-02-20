<?php
//////////////////////////////////////////
//          ALi Abdul
//      Adelaide Australia
//  The Noob Coder :)   20-Feb-2016
//////////////////////////////////////////
?>
<div id="content">
<?php
   
    if(
        isset($_POST['submit'])&&
        isset($_POST['name'])&&
        isset($_POST['email'])&&
        isset($_POST['enq'])&&
        isset($_POST['message'])
    ){
        $name   = strip_tags($_POST['name']);
        $email  = strip_tags($_POST['email']);
        $enq    = strip_tags($_POST['enq']);
        $mess    = nl2br($_POST['message']); 
        
    if(
        !empty($name)&&
        !empty($email)&&
        !empty($enq)&&
        !empty($mess)
    ){
        
        $adminEmail     = 'alitech@yopmail.com';
        $subject        = 'Contact From Malala CMS site!';
        $Message        = "Name: $name<br/>Email: $email<br/>Enquiry: $enq<br/>Message:<br/> $mess<br/>";
        $header = "From: $email\r\n";
        $header .= "Content-type: text/html\r\n";            
            
        $SendMail = mail($adminEmail, $subject, $Message, $header);
    if($SendMail <> 0){
        
        echo '<br/><b><centr>Thank you for your message</b><br/>one of our customer service will reply to your email within 48 hours or maybe less, I am not sure, sorry! However, If you have added a real email otherwise just forget about it mate!</center><br/>';
    }else{ echo 'O man, you not that lucky today! Even a simple email didn\'t go through, begga!';}
        
        
    }else{ echo 'O No, you left some boxes empty!';}
        
    }
    
?>
<form method="post" action="<?php $_SERVER['PHP_SELF'];?>" enctype="multipart/form-data">
    <table width="100%" height="auto" align="center" border="0px" cellspacing="5px" cellpadding="5px">

<tr>
<td>Your Name:</td>
<td><input type="text" name="name" size="45px"/></td>
</tr>

<tr>
<td>Your Email:</td>
<td><input type="email" name="email" size="45px"/></td>
</tr>

<tr>
<td>Enquiry:</td>
<td>
<select name="enq">
    <option>Select Enquiry</option>
    <option>This cms is fully sick mate!</option>
    <option>Mate, you should be working for Google!</option>
    <option>Hey, Cool CMS man!</option>
    <option>It's alright</option>
    <option>Still buggy</option>
    <option>O man, this cms sux</option>
    <option>You are such a noob coder!</option>
    <option>How long have you been a proggie person?</option>
    <option>Other Enquiries</option>
</select>
</td>
</tr>
<tr>
<td>Your Message:</td>
<td><textarea rows="14px" cols="80px" name="message"></textarea></td>
</tr>

<tr>
<td colspan="2" align="center"><input type="submit" name="submit" value="Send The Message to HQ"/></td>
</tr>

        </table>
        </form>
</div>