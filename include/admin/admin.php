<?php
//////////////////////////////////////////
//          ALi Abdul
//      Adelaide Australia
//  The Noob Coder :)   20-Feb-2016
//////////////////////////////////////////
?>
<?php session_start(); ?>
<!doctype html>
<html>
<head>
    <title>:: Administration Area ::</title>
    <link rel="stylesheet" type="text/css" href="../css/mini_style.css" media=" screen and (max-width: 200px)" />
    <link rel="stylesheet" type="text/css" href="../css/admin_style.css" />
</head>
<body id="admin"> 
    <div id="AdminZone">
    <div class="statistics"><span class="StTitle"><center>Statistics</center></span><hr/>

    <div class="Info"><p>Information</p>
    <?php
    include('/../config.php');
    $stmt = $dbc->prepare("SELECT post_title FROM posts");
    $stmt->execute();

    if($stmt->rowCount() == True){
    echo '<span class="txt">Number of Articles: [ '.$stmt->rowCount().' ]</span>';
    }
    ?>
    <?php
    $stmt = $dbc->prepare("SELECT post_author FROM posts");
    $stmt->execute();

    if($stmt->rowCount() == True){
    echo '<br/><span class="txt">Number of Authors:  [ '.$stmt->rowCount().' ]</span>';
    }
    ?>
    <?php
    $stmt = $dbc->prepare("SELECT post_image FROM posts");
    $stmt->execute();

    if($stmt->rowCount() == True){
    echo '<br/><span class="txt">Number of uploaded images:  [ '.$stmt->rowCount().' ]</span>';
    }
    ?> 
</div>
<div class="LatestMembers"><p>Admin Info</p>

    <?php
    $stmt = $dbc->prepare("SELECT * FROM admin");
    $stmt->execute();

    if($stmt->rowCount() == True){
    $stmt->setFetchMode(PDO::FETCH_OBJ);
    while($row = $stmt->fetch()){
    echo '<span class="txt">Administration Name: <b>'.$row->admin_name.'</b><br/>';
    echo 'Administration Password: <b>'.substr($row->admin_pass,0, 20).'...</b></span>';
    }
    }
    ?>               
</div> 
        
<div class="ActiveArticles"><p>Active Articles</p><span class="txt">
    <?php

    $stmt = $dbc->prepare("SELECT * FROM posts LIMIT 9");
    $stmt->execute();

    if($stmt->rowCount()>0){
    $stmt->setFetchMode(PDO::FETCH_OBJ);
    while($row = $stmt->fetch()){?>
    <a href="./../../pages.php?id=<?php echo $row->post_id;?>" target="_blank"><?php echo $row->post_title.'<br/>';?></a>
    <?php
    }
    }
    ?>
    
</span></div>
    
    </div>
        
        <div class="adminSidebar"><p>Admin Tools</p>
    <div class="AdminLinks">
        <ul>
            <li>Dashboard</li>
            <li><a href="./includes/arti_set.php">Article Settings</a></li>
            <li><a href="./includes/post_arti.php">Insert Article</a></li>
            <li><a href="./includes/sign_out.php">Sign out</a></li>
            <li><a href="./../../index.php"><button>View The Main Index Page</button></a></li>
        </ul>
        </div>
    </div>

    </div>

        
        
</body>
</html>