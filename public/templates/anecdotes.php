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
<h2>Anecdotes</h2>
<?php foreach ( $anecdotes as $anecdote ) : ?>
    <p><?php echo $anecdote->text; ?></p>
<?php endforeach; ?>
