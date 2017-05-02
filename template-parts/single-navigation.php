<div class="left navigation_container col span-12 bottom-16">
	<div class="col span-6 left align-left">
		<?php
			if ( get_previous_post_link() ) {
				previous_post_link();
			}
			else {
				echo '&nbsp;';
			}
		?>
	</div>
	<div class="col span-6 left align-right">
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
