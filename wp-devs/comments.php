<?php
/**
 * The template for displaying comments
 *
 * The area of the page that contains both current comments
 * and the comment form.
 *
 * @package WordPress
 * @subpackage WP Devs
 * @since WP Devs 1.0
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() ) {
	return;
}
?>
<style>*{padding:0;}</style>
<div id="comments" class="comments-area">
	<?php if ( have_comments() ) : ?>
		<h2 class="comments-title mb-6 font-bold text-xl">
			<?php
				$comments_number = get_comments_number();
				if ( 1 === $comments_number ) {
					printf( __( 'One comment on "%s"', 'textdomain' ), get_the_title() );
				} else {
					printf( _n( '%1$s comment on "%2$s"', '%1$s comments on "%2$s"', $comments_number, 'textdomain' ), number_format_i18n( $comments_number ), get_the_title() );
				}
			?>
		</h2>
		<ol class="comment-list mb-8">
			<?php wp_list_comments( array( 
				'style' => 'ol', 
				'short_ping' => true,
				'reply_text' => '<span class="block mt-3 reply-btn bg-blue-600 text-white font-medium rounded-lg px-4 py-2 hover:bg-blue-700 transition duration-300 cursor-pointer">Reply</span>',
				'callback' => null,
				'end-callback' => null,
				'avatar_size' => 48,
				'format' => 'html5',
			) ); ?>
		</ol>
		<style>
.reply-btn {
    display: inline-block;
    margin-top: 0.75rem;
    margin-bottom: 0.25rem;
    min-width: 80px;
    text-align: center;
}
</style>
		<?php the_comments_navigation(); ?>
	<?php endif; ?>

	<?php if ( ! comments_open() && get_comments_number() ) : ?>
		<p class="no-comments"><?php _e( 'Comments are closed.', 'textdomain' ); ?></p>
	<?php endif; ?>

	<div id="respond" class="comment-respond">
        <?php
        $commenter = wp_get_current_commenter();
        $req = get_option( 'require_name_email' );
        $aria_req = ( $req ? " aria-required='true'" : '' );

        comment_form( array(
            'class_form' => 'comment-form space-y-4 bg-white rounded-xl shadow-md p-6',
            'class_submit' => 'bg-blue-600 text-white font-medium rounded-lg px-6 py-3 hover:bg-blue-700 transition duration-300',
            'title_reply_before' => '<h3 id="reply-title" class="comment-reply-title font-bold text-lg mb-4">',
            'title_reply_after' => '</h3>',
            'comment_field' =>
                '<div class="mb-4">'
                . '<label for="comment" class="block text-gray-700 font-medium mb-2">' . _x( 'Comment', 'noun' ) . '</label>'
                . '<textarea id="comment" name="comment" cols="45" rows="6" required class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500"></textarea>'
                . '</div>',
            'fields' => array(
                'author' =>
                    '<div class="mb-4">'
                    . '<label for="author" class="block text-gray-700 font-medium mb-2">' . __( 'Name', 'textdomain' ) . ( $req ? ' <span class="text-red-500">*</span>' : '' ) . '</label>'
                    . '<input id="author" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30"' . $aria_req . ' class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500" />'
                    . '</div>',
                'email' =>
                    '<div class="mb-4">'
                    . '<label for="email" class="block text-gray-700 font-medium mb-2">' . __( 'Email', 'textdomain' ) . ( $req ? ' <span class="text-red-500">*</span>' : '' ) . '</label>'
                    . '<input id="email" name="email" type="email" value="' . esc_attr(  $commenter['comment_author_email'] ) . '" size="30"' . $aria_req . ' class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500" />'
                    . '</div>',
                'url' =>
                    '<div class="mb-4">'
                    . '<label for="url" class="block text-gray-700 font-medium mb-2">' . __( 'Website', 'textdomain' ) . '</label>'
                    . '<input id="url" name="url" type="url" value="' . esc_attr( $commenter['comment_author_url'] ) . '" size="30" class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500" />'
                    . '</div>',
            ),
            'submit_field' => '<div class="mt-6">%1$s %2$s</div>',
        ) );
        ?>
    </div>
</div><!-- .comments-area -->
