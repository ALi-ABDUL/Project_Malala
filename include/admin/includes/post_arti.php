<?php
//////////////////////////////////////////
//          ALi Abdul
//      Adelaide Australia
//  The Noob Coder :)   20-Feb-2016
//////////////////////////////////////////
?>
<?php session_start();?>
<!doctype html>
<html>
<head>
    <title>:: Administration Area ::</title>
    <link rel="stylesheet" type="text/css" href="../css/admin_style.css" media=" screen and (max-width: 200px)" />
    <link rel="stylesheet" type="text/css" href="../../css/admin_style.css" />
</head>
<body id="admin"> 
    <div id="AdminZone">
    <div class="statistics"><span class="StTitle"><center>Post Article</center></span><hr/>
    
       
<?php 
include ('/../../config.php');
 if(isset($_POST['submit'])){
        
    $post_title     = strip_tags($_POST['title']);
    $post_author    = strip_tags($_POST['author']);
    $post_keywords  = strip_tags($_POST['keywords']);
    $post_cnt       = strip_tags($_POST['content']);
    $post_content   = preg_replace("/\r|\n/"," ",$post_cnt);
    $post_image     = $_FILES['image']['name'];
    $image_type     = $_FILES['image']['type'];
    $image_tmp      = $_FILES['image']['tmp_name'];
    $post_date      = date('d-m-y');
    
 if(
    !empty($post_title)
    &&!empty($post_author)
    &&!empty($post_keywords)
    &&!empty($post_content)
    &&!empty($post_image)){
     
 if(
    ($image_type == 'image/jpeg')||
    ($image_type == 'image/jpg') ||
    ($image_type == 'image/jpe') ||
    ($image_type == 'image/png') ||
    ($image_type == 'image/gif') ||
    ($image_type == 'image/bmp')){
         
     
move_uploaded_file($image_tmp,"../../../images/$post_image");
    
  
     
    $stmt = $dbc->prepare("INSERT INTO posts (
        post_title,
        post_date,
        post_author,
        post_image,
        post_keywords,
        post_contents) 
    VALUES (
        :title, 
        :date, 
        :author, 
        :image, 
        :keywords, 
        :contents)");
           
    $Data = array(
        ':title'    =>  $post_title, 
        ':date'     =>  $post_date,
        ':author'   =>  $post_author,
        ':image'    =>  $post_image,
        ':keywords' =>  $post_keywords,
        ':contents' =>  $post_content);
        
        if($stmt->execute($Data)<>0){
            if($stmt->rowCount() >= 1){
            echo '<p> Post Published Successfully</p>';
                
        }else{
            echo 'There was an error with the database!';
            
            }
            
    }
     }else{
     echo '<p>Cannot upload <font color="red">'.$image_type.' '.$post_image.'</font> format!</p>';
 }
    }else{
        echo '<p align="center">All fields are required!</p>';
    }
    }


  
?>

    <form method="post" action="<?php $_SERVER['PHP_SELF'];?>" enctype="multipart/form-data">
    <table width="100%" height="auto" align="center" border="1px" cellspacing="5px" cellpadding="5px">

<tr>
<td>Post Title</td>
<td><input type="text" name="title" value="<?php  if(isset($_POST['title'])){echo $_POST['title'];}?>" size="45px" placeholder="Type the Article Title here"/></td>
</tr>

<tr>
<td>Post Author</td>
<td><input type="text" name="author" value="<?php if(isset($_POST['author'])){echo $_POST['author'];}?>" size="45px" placeholder="Type the Article Author here"/></td>
</tr>

<tr>
<td>Post Keywords</td>
<td><input type="text" name="keywords" value="<?php if(isset($_POST['keywords'])){echo $_POST['keywords'];} ?>" size="45px" placeholder="Type The Article Keywords here"/></td>
</tr>

<tr>
<td>Post Image</td>
<td><input type="file" name="image" value="Upload image" size="45px"/></td>
</tr>
<tr>
<td>Post Content</td>
<td><textarea rows="14px" cols="80px" name="content" placeholder="Type The Article here"><?php if(isset($_POST['content'])){echo $_POST['content'];}?></textarea></td>
</tr>

<tr>
<td colspan="2" align="center"><input type="submit" name="submit" value="Publish Now"/>&nbsp;&nbsp;&nbsp;<input type="reset" value="Clear"/></td>
</tr>

        </table>
        </form>
    
        
    </div>
        
        <div class="adminSidebar"><p>Admin Tools</p>
    <div class="AdminLinks">
        <ul>
            <li><a href="./../admin.php">Dashboard</a></li>
            <li><a href="arti_set.php">Article Settings</a></li>
            <li>Insert Article</li>
            <li><a href="sign_out.php">Sign out</a></li>
            <li><a href="./../../../index.php"><button>View The Main Index Page</button></a></li>
        </ul>
        </div>
    </div>

    </div>

        
        
</body>
</html>