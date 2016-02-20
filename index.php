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
include ('include/config.php');

if (isset($_GET['page'])){
    
if ($_GET['page'] == 'submit_article'){
    include ('include/submit_article.php');

}else if ($_GET['page'] == 'news'){
    include ('include/news.php');
    
}else if ($_GET['page'] == 'about'){
    include ('include/about.php');
    
}else if ($_GET['page'] == 'contact'){
    include ('include/contact.php');
    
}else{
     include('include/home.php');
}
}else{
    include('include/home.php');

}    include ('include/structure/footer.php');

?>