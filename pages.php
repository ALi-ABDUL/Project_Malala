<?php
//////////////////////////////////////////
//          ALi Abdul
//      Adelaide Australia
//  The Noob Coder :)   20-Feb-2016
//////////////////////////////////////////
?>
<?php
include ('include/structure/header.php');
include ('include/structure/navbar.php');
include ('include/structure/sidebar.php');
?>
<div id="content">
<?php 
include ('include/config.php');
    
    if(isset($_GET['id'])){
        
        $page_id = $_GET['id'];
        
    $stmt = $dbc->prepare("SELECT * FROM posts WHERE post_id = ?");
    
    $stmt->bindParam(1, $page_id, PDO::PARAM_STR);
    $stmt->execute();
    ?>
    
   <table width=auto border="0px" cellpadding="5px" cellspacing="5px">
       <?php 
       $stmt->setFetchMode(PDO::FETCH_OBJ);
       while($row = $stmt->fetch()){
       ?>
      
    <tr>
    <td colspan="2px" align="left"><h2><?php echo $row->post_title;?></h2></td>
    </tr>
    <tr>
    <td width="100px">Published on:</td>
    <td><?php echo $row->post_date;?></td>
    </tr>
    <tr>
    <td>Posted by:</td>
    <td><?php echo $row->post_author;?></td>
    </tr>
    <tr>
    <td colspan="2px"><hr/><center><img src="images/<?php echo $row->post_image;?>" width="600px" height="300px"/></center>
    <p><?php echo $row->post_contents;?></p></td>
    </tr>
    <?php } ?>
    <?php } ?>
    </table>
   
</div>

<?php
include ('include/structure/footer.php');
?>