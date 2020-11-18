<?php

namespace BookNotes;

class FlashMessage
{
    public static function showFlashMessage()
    {
        if (isset($_SESSION['message'])) { ?>
            <div class="alert alert-primary register-alert text-center" role="alert">
                <?php echo htmlspecialchars($_SESSION['message'], ENT_QUOTES); ?>
            </div>
            <?php unset($_SESSION['message']);
        }
    }
}