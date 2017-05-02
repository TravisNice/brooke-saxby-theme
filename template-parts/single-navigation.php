<div class="navigation_container">
	<div class="col span-6 left align-left bottom-16">
		<?php
			if ( get_previous_post_link() ) {
				previous_post_link();
			}
			else {
				echo '&nbsp;';
			}
		?>
	</div>
	<div class="col span-6 left align-right bottom-16">
		<?php
			if ( get_next_post_link() ) {
				next_post_link();
			}
			else {
				echo '&nbsp;';
			}
		?>
	</div>
</div>
