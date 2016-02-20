<?php
//////////////////////////////////////////
//          ALi Abdul
//      Adelaide Australia
//  The Noob Coder :)   20-Feb-2016
//////////////////////////////////////////
?>
<div id="sidebar">
    
    <h2>Latest News</h2><hr/>
<?php 
    session_start();
    include ('include/config.php');
        $stmt = $dbc->prepare("SELECT * FROM posts ORDER BY 1 DESC LIMIT 3");
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        
        Foreach($stmt as $value){?>
        
        <aside><div class="SidebarTitle">
            <a href="pages.php?id=<?php echo $value['post_id'];?>"><?php echo $value['post_title'];?></a></div>
            <img src="images/<?php echo $value['post_image'];?>" class="SideBImg"/><span class="SidebarContent">
            <?php echo substr($value['post_contents'],0,100); ?></span></aside>  
        <?php }?>
<?php
  
FUNCTION LoginZone($dbc){
    
    if(isset($_POST['submit'])&&isset($_POST['username'])&&isset($_POST['password'])){
        
        $AdminName = $_POST['username'];
        $AdminPass = $_POST['password'];
        
    if(!empty($AdminName)&&!empty($AdminPass)){
       
        $stmt = $dbc->prepare("SELECT * FROM admin WHERE admin_name = ? AND admin_pass = ?");
        $stmt->bindParam(1, $AdminName, PDO::PARAM_STR);
        $stmt->bindParam(2, sha1($AdminPass), PDO::PARAM_STR);
        
        if($stmt->execute() == true){
            if($stmt->rowCount()>=1){
                $_SESSION['username'] == $AdminName;
                header ('Location: ./include/admin/admin.php');
                
            }else{
                echo "<font color='red'><i>Sorry, wrong username or password!</i></font>";
            }
        }
    }
    }
}    
LoginZone($dbc);
 
?>
    
    <div class="Sidelogin">Admin Login
    <form action="<?php $_SERVER['PHP_SELF'];?>" method="POST">
        <br/><input type="text" name="username" placeholder="Type your Username" size="25px"/><br/><input type="password" name="password" placeholder="Type your password" size="25px"/><br/>
        <input type="submit" name="submit" value="Login"/>
            </form>
        </div>
</div>