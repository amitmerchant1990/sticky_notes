<!--<div class="sleek-heading">STICKYNOTES APP</div>-->

<div id="sticky-notes">
    <?php foreach($stickynotes as $stickynote):?>
    <div class="sticky-note">
        <textarea id="stickynote-<?php echo $stickynote['Stickynote']['id'] ?>"><?php echo $stickynote['Stickynote']['note']; ?></textarea>
        <a href="#" id="remove-<?php echo $stickynote['Stickynote']['id'] ?>"class="delete-sticky">X</a>
        <p style="text-align: center; font-family: 'Arial Black', Gadget, sans-serif; font-size: 14px;">
            <?php 
                $date = explode(" ", $stickynote['Stickynote']['created']);
                echo date("F j, Y",strtotime($date[0])); 
            ?>
        </p>
    </div>
    
    <?php endforeach; ?>
    <div id="create">+</div>

</div>
<div class="clear-both"></div>