<?php
/** @var \App\Core\View $this */
$this->setStyleSheet('');
?>

<div class="page">
    <h1 class="page_title">Create Product</h1>
    
    <form method="POST" action="<?=$_ENV['APP_URL']?>/register/product">
        <div class="input_box">
            <label>Name:</label>
            <input type="text" name="name" placeholder="Name...">
        </div>
        <div class="input_box">
            <label>Price:</label>
            <input type="number" name="price" placeholder="Price...">
        </div>
        
        <div class="input_box">
            <label>Description:</label>
            <textarea name="description" placeholder="About..."></textarea>
        </div>
        <div class="input_box">
            <label>Image:</label>
            <input onchange="readURL(this); "type="file" accept="image/x-png,image/jpeg" name="image" placeholder="Select a Image...">
            <div class="image_preview">
                <div class="no_image">
                    <i class="fa-regular fa-image"></i>
                    <span>Preview</span>
                </div>
                <img src="" alt="">
            </div>
        </div>
        <div class="input_box">
            <input type="submit" name="action" value="Submit">
        </div>
    </form>
</div>

<script defer src="<?=$_ENV['APP_URL']?>/js/image_preview.js"></script>