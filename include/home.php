<?php
//////////////////////////////////////////
//          ALi Abdul
//      Adelaide Australia
//  The Noob Coder :)   20-Feb-2016
//////////////////////////////////////////
?>
<div id="content">
<?php 
    include ('include/config.php');
    
    $stmt = $dbc->query("SELECT * FROM posts ORDER BY RAND() LIMIT 4");?>
    
        <table width=auto border="0px" cellpadding="5px" cellspacing="5px">
   <?php 
   $stmt->setFetchMode(PDO::FETCH_OBJ);
   while($row = $stmt->fetch()){?>
      
    <tr>
    <td colspan="2px" align="left"><h2><a href="pages.php?id=<?php echo $row->post_id; ?>"><?php echo $row->post_title;?></a></h2><hr/></td>
    </tr>
    <tr>
    <td colspan="2px"><a href="pages.php?id=<?php echo $row->post_id;?>"><img src="images/<?php echo $row->post_image;?>" id="img"/></a>
    <p><?php echo substr($row->post_contents,0,500).'...';?></p><a href="pages.php?id=<?php echo $row->post_id;?>" id="read">Read More...</a></td>
    </tr>
       
    <?php } ?>

    </table>
    

</div>