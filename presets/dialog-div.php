<div class="bottom-container pt-3">
    <?php if((isset($_GET['value'])) || (isset($value))) : ?>
        <hr style="margin-bottom: 25px;">
        <div class="alert alert-dark" role="alert" style="box-shadow: #8D93AB 1px 2px 3px; transition: 2s;">
            <?php
            if (isset($_GET['value'])) {
                echo "{$_GET['value']}";
            } else {
                echo $value;
            } 
            ?>
        </div>
    <?php endif ?>
</div>