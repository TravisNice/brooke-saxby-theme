<?php

	class brookeSaxbyRecentPostsWidget extends WP_Widget {
		
		public function __construct() {
			
			parent::__construct(
					    'brookeSaxbyRecentPosts', // Base ID
					    'Brooke Saxby\'s Recent Posts', // Name
					    array(
						  'description' => __( 'Brooke Saxby\'s Recent Posts displayed just like on the blog role', 'text_domain' ),
						  'title' => __( 'Recent Posts', 'text_domain' )
						  )
			);
			
		}
		
		public function widget( $args, $instance ) {
			
			extract( $args );
			
			$title = apply_filters( 'widget_title', $instance['title'] );
			
			echo $before_widget;
			
			if ( !empty( $title ) ) {
				
				echo $before_title . $title . $after_title;
				
			}
			

			$queryObject = new WP_Query( 'posts_per_page=5' );
			
			if ( $queryObject->have_posts() ) {
								
				while ( $queryObject->have_posts() ) {
		
					$queryObject->the_post();
					
					echo '<div class="widget_block">';
					
					if( has_post_thumbnail() ) {
					
						get_template_part( 'template-parts/excerpt', 'thumb' );
						
					}

					else {
			
						get_template_part( 'template-parts/excerpt', 'nothumb' );
			
					}
					
		
					get_template_part( 'template-parts/excerpt', 'rule' );
					
					echo '</div>';
		
				}
				
			}
			

			echo $after_widget;
			
		}
		
		public function form( $instance ) {
			
			if ( isset( $instance[ 'title' ] ) ) {
				$title = $instance[ 'title' ];
			}
			else {
				$title = __( 'New title', 'text_domain' );
			}
			?>
			<p>
			<label for="<?php echo $this->get_field_name( 'title' ); ?>"><?php _e( 'Title:' ); ?></label>
<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
</p>
<?php
		}
	
		public function update( $new_instance, $old_instance ) {
			$instance = array();
			$instance['title'] = ( !empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
			
			return $instance;
		}
		
	}
?>
