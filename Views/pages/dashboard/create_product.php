<?php
/** @var \App\Core\View $this */
$this->setStyleSheet('');
?>

<div class="page">
    <h1 class="page_title">Create Product</h1>
    
    <form>
        <div class="input_box">
            <label>Name:</label>
            <input type="text" placeholder="Name...">
        </div>
        <div class="input_box">
            <label>Category:</label>
            <input type="text" placeholder="Category...">
        </div>
        <div class="input_box">
            <label>About:</label>
            <textarea placeholder="About..."></textarea>
        </div>
        <div class="input_box">
            <label>Type:</label>
            <select id="cars" name="cars">
                <option value="volvo">Select</option>
                <option value="volvo">Digital Art</option>
                <option value="saab">Fisic Art</option>
                <option value="mercedes">Bio Art</option>
            </select>
        </div>
        <div class="input_box">
            <input type="submit" value="Submit">
        </div>
    </form>
</div>