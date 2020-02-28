<?php
use Carbon\Carbon;
/**
 * Provide a public-facing view for the plugin
 *
 * This file is used to markup the public-facing aspects of the plugin.
 *
 * @link       https://www.webreact.nl
 * @since      1.0.0
 *
 * @package    Moving_Digital_Realworks
 * @subpackage Moving_Digital_Realworks/public/partials
 */
?>

<!-- This file should primarily consist of HTML with a little bit of PHP. -->
<div class="card">
    <div class="card-header">Anecdotes</div>
    <?php
    $counter = 0;
    foreach ( $anecdotes as $anecdote ) :
    $carbonDate = Carbon::parse($anecdote->createdat)->setTimezone('Europe/Amsterdam');
    Carbon::setLocale('nl');
    if ($counter >= 1) {
	    echo '<div class="card-body border-top">';
    } else {
	    echo '<div class="card-body">';
    }
    ?>
        <h5 class="card-title"> <img class="anecdote-image" src="<?php echo $anecdote->user->image; ?>"><?php echo $anecdote->user->name; ?></h5>
        <p class="card-text"><i>"<?php echo $anecdote->text; ?>"</i></p>
        <p class="card-text"><small class="text-muted"><?php echo $carbonDate->diffForHumans(); ?></small></p>
    </div>
<?php $counter++; ?>
<?php endforeach; ?>
</div>
