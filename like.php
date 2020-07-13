<?php 
include 'includes/db.php';
if(isset($_POST['username']) && isset($_POST['post_id']) && isset($_POST['like'])){
    $username = $_POST['username'];
    $post_id  = $_POST['post_id'];
    
        $query  = "SELECT * FROM `likes` WHERE like_by= :username";
    $result = $conn->prepare($query);
    $result->execute(['username'=>$username]);
    $count = $result->rowCount();
    
    if($count < 1){
            $query  = "INSERT INTO `likes` (`like_id`, `post_id`, `like_by`) VALUES (NULL, :post_id, :username)";
    $result = $conn->prepare($query);
    $result->execute(['username'=>$username,'post_id'=>$post_id]);
    $query1  = "UPDATE post set post_like = post_like + 1 WHERE post_id =:post_id";
    $result1 = $conn->prepare($query1);
    $result1->execute(['post_id'=>$post_id]);
    }
    

}
if(isset($_POST['username']) && isset($_POST['post_id']) && isset($_POST['unlike'])){
    $username = $_POST['username'];
    $post_id  = $_POST['post_id'];
    
        $query  = "SELECT * FROM `likes` WHERE like_by= :username";
    $result = $conn->prepare($query);
    $result->execute(['username'=>$username]);
    $count = $result->rowCount();
    
    if($count == 1){
            $query  = "DELETE FROM `likes` WHERE like_by= :username";
    $result = $conn->prepare($query);
    $result->execute(['username'=>$username]);
        
            $query  = "UPDATE post set post_like = post_like - 1 WHERE post_id =:post_id";
    $result = $conn->prepare($query);
    $result->execute(['post_id'=>$post_id]);
    }
}
?>
