<?php
if(isset($_GET['video'])){
    $video=$_GET['video'];
?>
<div>
    <video width="100%" style="height: 100%; border:0.1rem solid black;" class='card-img-top' controls>
        <source src="product/<?= $video ?>" type="video/mp4">
    </video>
</div>
<?php
}
?>
