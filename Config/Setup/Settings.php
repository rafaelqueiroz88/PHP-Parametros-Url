<?php
if( isset( $_SESSION["developer_mode"] ) ) :
?>

<div class="container">
    <div class="row">
        <div class="col">
            <form>
                <input type="text" name="developer" /> <br />
                <input type="text" name="password" /> <br />
                <button>
                    Login
                </button>
            </form>
        </div>
    </div>
</div>

<?php
else :

?>

<?php

endif;