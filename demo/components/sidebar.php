<?php 
require "./theme_color.php";
?>

<div class="col-lg-2 pt-3 px-5 border-end" style="height:100vh">
                <div>
                    <div>
                    <h5 style="cursor:pointer;"><a href="./index.php" style="text-decoration:none;color:<?php 
                    if($loc=='MY LISTS')echo $THEME_COLOR;
                    else echo '#121615'
                     ?>;">📝 MY LISTS</a></h5>
                    </div>

                    <div class="mt-4">
                    <h5><a href="./syt.php" style="text-decoration:none;color:<?php 
                    if($loc=='SEND YOUR THOUGHT')echo $THEME_COLOR;
                    else echo '#121615'
                     ?>;">✨ SEND YOUR THOUGHT</a></h5>
                    </div>
                </div>
</div>