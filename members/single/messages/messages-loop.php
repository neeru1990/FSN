<?php do_action( 'bp_before_member_messages_loop' ); ?>

<?php if ( bp_has_message_threads( bp_ajax_querystring( 'messages' ) ) ) : ?>
<!-- No pagination but more messages will be loaded through ajax 
	<div class="pagination no-ajax" id="user-pag">

		<div class="pag-count" id="messages-dir-count">
			<?php //bp_messages_pagination_count(); ?>
		</div>

		<div class="pagination-links" id="messages-dir-pag">
			<?php //bp_messages_pagination(); ?>
		</div>

	</div>
	-->
	<!-- .pagination -->

	<?php do_action( 'bp_after_member_messages_pagination' ); ?>

	<?php do_action( 'bp_before_member_messages_threads'   ); ?>

	<div id="message-threads" class="messages-notices">
		<?php while ( bp_message_threads() ) : bp_message_thread(); ?>

		<div id="m-<?php bp_message_thread_id(); ?>" class="<?php bp_message_css_class(); ?><?php if ( bp_message_thread_has_unread() ) : ?> unread<?php else: ?>read<?php endif; ?>">
			<div class="row">
				<div class="col-md-1 col-sm-1 col-xs-1">
					<div class="thread-avatar"><?php bp_message_thread_avatar(); ?>
					</div>
				</div>
				<div class="col-xs-7 col-md-7 col-sm-7">
				<?php if ( 'sentbox' != bp_current_action() ) : ?>
					<div class="thread-from">
					<!-- no From: only name should be visible -->
						<?php //_e( 'From:', 'buddypress' ); ?> <?php bp_message_thread_from(); ?><?php else: ?>
						<!-- posted date moved out of thead-from-->
					</div>
					<div class="thread-from">
						<?php _e( 'To:', 'buddypress' ); ?> <?php bp_message_thread_to(); ?>
						<?php endif; ?>
						<!-- posted date moved out of thead-from-->
					</div>
				</div>
				<div class="col-md-4 col-sm-4 col-xs-4">
					<div class="last-posted-date">
						<span class="activity"><?php bp_message_thread_last_post_date(); ?>
							
						</span>
					</div>
				</div>
			</div>  <!-- message row avatar and from and time -->
			<div class="row">
				<div class="col-xs-10 col-md-10 col-sm-10">
					<div class="thread-info">
						<p><a href="<?php bp_message_thread_view_link(); ?>" title="<?php esc_attr_e( "View Message", "buddypress" ); ?>"><?php bp_message_thread_subject(); ?></a></p>
						<p class="thread-excerpt"><?php bp_message_thread_excerpt(); ?></p>
					</div>
				</div>
				<div class="col-xs-2 col-sm-2 col-md-2">
			<?php do_action( 'bp_messages_inbox_list_item' ); ?>

					<div class="thread-options">
						<input type="checkbox" name="message_ids[]" value="<?php bp_message_thread_id(); ?>" />
						<a class="button confirm" href="<?php bp_message_thread_delete_link(); ?>" title="<?php esc_attr_e( "Delete Message", "buddypress" ); ?>"><?php _e( 'Delete', 'buddypress' ); ?></a> &nbsp;
					</div>
				</div>
			</div> <!-- message content row end -->
		</div>

		<?php endwhile; ?>
	</div><!-- #message-threads -->

<!-- options nav hidden for now 
	<div class="messages-options-nav">
		<?php //bp_messages_options(); ?>
	</div>
-->
	<!-- .messages-options-nav -->

	<?php do_action( 'bp_after_member_messages_threads' ); ?>

	<?php do_action( 'bp_after_member_messages_options' ); ?>

<?php else: ?>

	<div id="message" class="info">
		<p><?php _e( 'Sorry, no messages were found.', 'buddypress' ); ?></p>
	</div>

<?php endif;?>

<?php do_action( 'bp_after_member_messages_loop' ); ?>
