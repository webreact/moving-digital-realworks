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
<?php if ($features) : ?>
<div class="helpmee-widget helpmee-widget-features">
	<div class="header">
		<h3 class="title pull-left">Kenmerken door vrienden</h3>
		<a href="<?php echo $viral_details->urls->feature; ?>" class="btn btn-primary pull-right" target="_blank" tabindex="0"><i class="fa fa-plus"></i> <span class="hidden-xs">Toevoegen</span></a>
	</div>
	<ul class="features">
		<?php foreach ($features as $feature) : ?>
			<li class="feature">
				<div class="name">
					<?php echo $feature->text; ?>
					<a href="<?php echo $viral_details->urls->feature; ?>" class="add" target="_blank" tabindex="0"><i class="fa fa-plus"></i></a>
				</div>
				<div class="endorsers">
					<div class="count">
						<?php echo count($feature->endorsements); ?>
					</div>

					<span class="endorserImage passportImage">
	                                                    <img alt="Endorser" src="<?php echo $feature->user->image; ?>">
	                                                </span>
					<a class="more" href="<?php echo $viral_details->urls->feature; ?>" tabindex="0">
						<i class="fa fa-chevron-right"></i>
					</a>
				</div>
			</li>
		<?php endforeach; ?>
	</ul>
</div>
<?php endif; ?>