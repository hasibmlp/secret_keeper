<?php include_once '../includes/header.php'; 
 require_once '../config/database.php';
?>


<h1>Secrets</h1>

<?php 
        $userId = $_SESSION['userId'];
        $sql = "SELECT * FROM secrets WHERE userId = '$userId';";
        $result = mysqli_query($conn, $sql);
        $secrets = mysqli_fetch_all($result, MYSQLI_ASSOC);

        
?>

<?php if(empty($secrets)) {
    echo '<p class="lead mt3">no Secrets</p>';

}
?>

<?php foreach ($secrets as $item): ?>
<div class="card my-3  w-75">
    <div class="card-body text-center">
        <p><?php echo $item['postContent']; ?></p>
        <div class="text-secondary mt-2">
            By <?php  echo $item['timeDate'] ?>
        </div>
    </div>
</div>  
<?php endforeach; ?>