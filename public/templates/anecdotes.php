<?php
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
<div class="helpmee-widget helpmee-widget-friends">
    <div class="header">
        <h3 class="title pull-left">Vrienden aan het woord</h3>
        <a href="<?php echo $viral_details->urls->anecdote; ?>" class="btn btn-primary pull-right" target="_blank" tabindex="0">
            <i class="fa fa-plus"></i> <span class="hidden-xs">Toevoegen</span>
        </a>
    </div>
	<?php if ($anecdotes) : ?>
        <ul class="anecdotes">
			<?php foreach ( $anecdotes as $anecdote ) : ?>
                <li class="anecdote">
                <span class="passportImage">
                    <img alt="Anecdote Friend" src="<?php echo $anecdote->user->image; ?>">
                </span>
                    <span class="text">
                    <q class="quote"><?php echo $anecdote->text; ?></q>
                    <span class="name"><?php echo $anecdote->user->name; ?></span>
                    <span class="options">
                        <a class="btn btn-default" href="<?php echo $viral_details->urls->anecdote; ?>" target="_blank" tabindex="0"><i class="fa  fa-external-link"></i></a>
                    </span>
                </span>
                </li>
			<?php endforeach; ?>
        </ul>
	<?php else : ?>
        <p class="no-anecdotes">Er zijn nog geen ervaringen van vrienden bekend.</p>
	<?php endif; ?>
</div>