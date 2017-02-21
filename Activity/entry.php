<?php

/**
 * BuddyPress - Activity Stream (Single Item)
 *
 * This template is used by activity-loop.php and AJAX functions to show
 * each activity.
 *
 * @package BuddyPress
 * @subpackage bp-default
 */

?>

<?php do_action( 'bp_before_activity_entry' ); ?>

<li class="<?php bp_activity_css_class(); ?> list-group-item" id="activity-<?php bp_activity_id(); ?>">
<!-- Moving the profile picture inside activity-content 
	<div class="activity-avatar">
		<a href="<?php //bp_activity_user_link(); ?>">

			<?php //bp_activity_avatar(); ?>

		</a>
	</div>
-->
<!-- row of individual post -->
	<div class="activity-content row">
<!-- Moved activity thumbnail inside activity content -->
<!-- row 1 or full 12 size column of individual post -->
		<div class="col-md-12 col-sm-12 col-xs-12">
			<div class="activity-avatar float_lists_left">
				<a href="<?php bp_activity_user_link(); ?>">

					<?php bp_activity_avatar(); ?>

				</a>
			</div>
			<div class="activity-header float_lists_left">

				<?php bp_activity_action(); ?>

			</div>
		</div>

		<?php if ( 'activity_comment' == bp_get_activity_type() ) : ?>

			<div class="activity-inreplyto">
				<strong><?php _e( 'In reply to: ', 'buddypress' ); ?></strong><?php bp_activity_parent_content(); ?> <a href="<?php bp_activity_thread_permalink(); ?>" class="view" title="<?php esc_attr_e( 'View Thread / Permalink', 'buddypress' ); ?>"><?php _e( 'View', 'buddypress' ); ?></a>
			</div>

		<?php endif; ?>

		<?php if ( bp_activity_has_content() ) : ?>
<!-- row 2 of individual post -->
			<div class="activity-inner col-md-12 col-sm-12 col-xs-12">
				<div class="float_lists_left activity-inner-text">
					<?php bp_activity_content_body(); ?>
				</div>
			</div>

		<?php endif; ?>

		<?php do_action( 'bp_activity_entry_content' ); ?>

		<?php if ( is_user_logged_in() ) : ?>
<!-- row 3 of individual post -->
			<div class="activity-meta float_lists_left col-md-12 col-sm-12 col-xs-12">
				<div class="float_lists_left activity-inner-text">
					<?php if ( bp_activity_can_comment() ) : ?>

						<a href="<?php bp_activity_comment_link(); ?>" class="button acomment-reply bp-primary-action" id="acomment-comment-<?php bp_activity_id(); ?>"><?php printf( __( 'Comment <span>%s</span>', 'buddypress' ), bp_activity_get_comment_count() ); ?></a>

					<?php endif; ?>

					<?php if ( bp_activity_can_favorite() ) : ?>

						<?php if ( !bp_get_activity_is_favorite() ) : ?>

							<a href="<?php bp_activity_favorite_link(); ?>" class="button fav bp-secondary-action" title="<?php esc_attr_e( 'Mark as Favorite', 'buddypress' ); ?>"><?php _e( 'Favorite', 'buddypress' ); ?></a>

						<?php else : ?>

							<a href="<?php bp_activity_unfavorite_link(); ?>" class="button unfav bp-secondary-action" title="<?php esc_attr_e( 'Remove Favorite', 'buddypress' ); ?>"><?php _e( 'Remove Favorite', 'buddypress' ); ?></a>

						<?php endif; ?>

					<?php endif; ?>

					<?php if ( bp_activity_user_can_delete() ) bp_activity_delete_link(); ?>

					<?php do_action( 'bp_activity_entry_meta' ); ?>
				</div>
			</div>

		<?php endif; ?>

	</div>

	<?php do_action( 'bp_before_activity_entry_comments' ); ?>

	<?php if ( ( is_user_logged_in() && bp_activity_can_comment() ) || bp_is_single_activity() ) : ?>

<!-- row 4 of individual post -->
		<div class="activity-comments">

			<?php bp_activity_comments(); ?>

			<?php if ( is_user_logged_in() ) : ?>

				<form action="<?php bp_activity_comment_form_action(); ?>" method="post" id="ac-form-<?php bp_activity_id(); ?>" class="ac-form"<?php bp_activity_comment_form_nojs_display(); ?>>

	<!-- moving the reply avatar into reply content area
					<div class="ac-reply-avatar"><?php //bp_loggedin_user_avatar( 'width=' . BP_AVATAR_THUMB_WIDTH . '&height=' . BP_AVATAR_THUMB_HEIGHT ); ?></div>
	-->
					<div class="ac-reply-content row">
						<div class="col-md-12 col-sm-12 col-xs-12">
							<div class="ac-reply-avatar float_lists_left"><?php // defining the width and height of comment avatar here so it can be small without applying any css
							/*
								bp_loggedin_user_avatar( 'width=' . 	BP_AVATAR_THUMB_WIDTH . '&height=' . BP_AVATAR_THUMB_HEIGHT );
								*/
								bp_loggedin_user_avatar( 'width=' . 	30 . '&height=' . 30 );?>
							</div>
							<div class="ac-textarea float_lists_left">
								<input id="ac-input-<?php bp_activity_id(); ?>" class="ac-input bp-suggestions form-control" name="ac_input_<?php bp_activity_id(); ?>" placeholder="Blurt it out"/>
							</div>
						</div>
<!-- comment should be posted on hiting enter
						<div class="col-md-12 col-sm-12 col-xs-12">
							<div class="form-group">
								<input type="submit" name="ac_form_submit" class="form-control" value="<?php //esc_attr_e( 'Post', 'buddypress' ); ?>" /> &nbsp; <?php //_e( 'or press esc to cancel.', 'buddypress' ); ?>
							</div>
							<div class="form-group">
								<input type="hidden" name="comment_form_id" value="<?php //bp_activity_id(); ?>" />
							</div>
						</div>
-->
					</div>

					<?php do_action( 'bp_activity_entry_comments' ); ?>

					<?php wp_nonce_field( 'new_activity_comment', '_wpnonce_new_activity_comment' ); ?>

				</form>

			<?php endif; ?>

		</div>

	<?php endif; ?>

	<?php do_action( 'bp_after_activity_entry_comments' ); ?>

</li>

<?php do_action( 'bp_after_activity_entry' ); ?>
