<?php
//////////////////////////////////////////
//          ALi Abdul
//      Adelaide Australia
//  The Noob Coder :)   20-Feb-2016
//////////////////////////////////////////
?>
<?php 
session_start();
include('../../config.php');?>
<!doctype html>
<html>
<head>
    <title>:: Administration Area ::</title>
    <link rel="stylesheet" type="text/css" href="../../css/mini_style.css" media=" screen and (max-width: 200px)" />
    <link rel="stylesheet" type="text/css" href="../../css/admin_style.css" />
</head>
<body id="admin"> 
    <div id="AdminZone">
    <div class="statistics"><span class="StTitle"><center>Article Settings</center></span><hr/><br/>
<?php
   
FUNCTION SavePost($dbc){     
    if(isset($_POST['save'])){
        
        $stmt = $dbc->prepare("UPDATE posts SET 
        post_title      = :title, 
        post_date       = :date, 
        post_author     = :author, 
        post_keywords   = :keywords, 
        post_contents   = :contents
        WHERE post_id   = :id");
       
        $Dt = array(
        ':title'    => $_POST['title'],
        ':date'     => $_POST['date'],
        ':author'   => $_POST['author'],
        ':keywords' => $_POST['keywords'],
        ':contents' => $_POST['content'],
        ':id'       => $_POST['id']);
        
        if($stmt->execute($Dt)){
            echo '<p>Post Edited, Reload page to save!</p>';
            }
        }
}
FUNCTION DeletePost($dbc){
    if(isset($_POST['delete'])){
        
        $stmt = $dbc->prepare("DELETE FROM posts WHERE post_id = ?");
        $stmt->bindParam(1, $_POST['id']);
        
        if($stmt->execute()>0){
            echo '<p>Post Delete Successfully!</p>';
        }
    }
}
        
DeletePost($dbc);        
SavePost($dbc);

?>
<table border='1px' width="100%" cellspacing="2px" cellpadding="2px">
    <tr bgcolor="lightgray">
        <td>Post_Id</td>
        <td>Post_Date</td>
        <td>Post_Author</td>
        <td>Post_Title</td>
        <td>Post_Content</td>
        <td>Post_Image</td>
        <td>Post_Keywords</td>
        </tr>
    <tr>
    </tr>
    
    <?php
    
        $stmt = $dbc->prepare("SELECT * FROM posts ORDER BY post_id ASC LIMIT 6");
        if($stmt->execute()>0){
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
                foreach($stmt as $x){?>
    <form action="arti_set.php" method="post" enctype="multipart/form-data">
    <tr id="tr">
        <td><input type="text" name="id" id="tr" value="<?php echo $x['post_id'];?>" size="2px"/></td>
        <td><input type="text" name="date" value="<?php echo $x['post_date'];?>" size="6px"/></td>
        <td><input type="text" name="author" value="<?php echo $x['post_author'];?>" size="8px"/></td>
        <td><textarea row="3px" cols="15px" name="title"><?php echo $x['post_title'];?></textarea></td>
        <td><textarea rows="3px" cols="20px" name="content"><?php echo $x['post_contents'];?></textarea></td>
        <td><img src="../../../images/<?php echo $x['post_image'];?>" title="<?php echo $x['post_image'];?>" width="80px" height="50px"/></td>
        <td><input type="text" name="keywords" value="<?php echo $x['post_keywords'];?>" size="20px"/>
            <p align="right"><button type="submit" name="save">Save Post</button>
                <button type="submit" name="delete">Delete Post</button></p></td>
    </tr>
         </form>
        <?php } }?>
   
        
        </table>    
   </div>    
        <div class="adminSidebar"><p>Admin Tools</p>
    <div class="AdminLinks">
        <ul>
            <li><a href="./../admin.php">Dashboard</a></li>
            <li>Article Settings</li>
            <li><a href="post_arti.php">Insert Article</a></li>
            <li><a href="sign_out.php">Sign out</a></li>
            <li><a href="./../../../index.php"><button>View The Main Index Page</button></a></li>
        </ul>
        </div>
    </div>

    </div>
      
</body>
</html>