<?php global $bp_options; ?>
<?php if ( ! empty( $bp_options['solReklam'] ) || ! empty( $bp_options['sagReklam'] ) ) { ?>
    <div class="lholder container">
		<?php
		if ( ! empty( $bp_options['solReklam'] ) ) {
			?>
            <div class="leftr">
				<?= $bp_options['solReklam'] ?>
            </div>
			<?php
		} ?>
		<?php
		if ( ! empty( $bp_options['solReklam'] ) ) {
			?>
            <div class="righttr">
				<?= $bp_options['sagReklam'] ?>
            </div>
			<?php
		} ?>
    </div>
<?php } ?>

<?php if ( $bp_options['ustReklam'] && ! empty( $bp_options['ustReklam'] ) ) : ?>
    <div class="ads" style="margin-bottom:20px;">
		<?= $bp_options['ustReklam'] ?>
    </div>
<?php endif; ?>