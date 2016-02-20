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
include('include/config.php');

    if(isset($_GET['submit'])&&!empty($_GET['search'])){
    $search = $_GET['search'];
    
    $stmt = $dbc->prepare("SELECT * FROM posts WHERE post_keywords LIKE  :keywords");
    
    $stmt->execute(array(':keywords'=>'%'.$search.'%'));
        
    if($stmt->rowCount()>=1){
        echo '<h3>['.$stmt->rowCount().'] Search results found</h3>';
        $stmt->setFetchMode(PDO::FETCH_LAZY);?>
    <table width=auto border="0px" cellpadding="5px" cellspacing="5px">
    
    <?php
        foreach($stmt as $keyword){?>       
    <tr>
    <td colspan="2px" align="left"><h2><a href="pages.php?id=<?php echo $keyword->post_id; ?>"><?php echo $keyword->post_title;?></a></h2><hr/></td>
    </tr>
    <tr>
    <td colspan="2px"><a href="pages.php?id=<?php echo $keyword->post_id;?>"><img src="images/<?php echo $keyword->post_image;?>" id="img"/></a>
    <p><?php echo substr($keyword->post_contents,0,200).'...';?></p>
    </tr>
       
    <?php } ?>

    </table>
        
<?php    
         }else{
        
        echo '<h3>Sorry ['.$stmt->rowCount().'] search results found</h3><hr/>';
    }
    }else{
        include('include/home.php');
    }
?>
</div>
<?php 
include ('include/structure/footer.php');
?>