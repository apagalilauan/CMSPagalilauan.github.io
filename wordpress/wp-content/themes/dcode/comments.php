<?php
/**
 * The template for displaying comments
 *
 * This is the template that displays the area of the page that contains both the current comments
 * and the comment form.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Dcode
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
<div class="clearfix"></div>
<section class="comment_area">
<?php
	// You can start editing here -- including this comment!
	if ( have_comments() ) :
		?>
		<h4 class="font-weight-bold mb-40">
			<?php
			$rdcode_comment_count = get_comments_number();
			if ( '1' === $rdcode_comment_count ) {
				printf(
					/* translators: 1: title. */
					esc_html__( 'One thought on &ldquo;%1$s&rdquo;', 'dcode' ),
					'<span>' . esc_html( get_the_title() ) . '</span>'
				);
			} else {
				printf(
					/* translators: 1: comment count number, 2: title. */
					esc_html( _nx( '%1$s thought on &ldquo;%2$s&rdquo;', '%1$s thoughts on &ldquo;%2$s&rdquo;', $rdcode_comment_count, 'comments title', 'dcode' ) ),
					esc_html( number_format_i18n( $rdcode_comment_count ) ),
					'<span>' . esc_html( get_the_title() ) . '</span>'
				);
			}
			?>
		</h4><!-- .comments-title -->
		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // Are there comments to navigate through? ?>
		<nav id="comment-nav-above" class="navigation comment-navigation" role="navigation">
			<h2 class="screen-reader-text"><?php esc_html_e( 'Comment navigation', 'dcode' ); ?></h2>
			<div class="nav-links">

				<div class="nav-previous"><?php previous_comments_link( esc_html__( 'Older Comments', 'dcode' ) ); ?></div>
				<div class="nav-next"><?php next_comments_link( esc_html__( 'Newer Comments', 'dcode' ) ); ?></div>

			</div><!-- .nav-links -->
		</nav><!-- #comment-nav-above -->
		<?php endif; // Check for comment navigation. ?>
		<div class="bg-gray p-4 mb-60">
			<ol class="comment-list comment-box">
				<?php
					wp_list_comments( array(
						'avatar_size' => 100,
						'style'       => 'ul',
						'short_ping'  => true,
						'type'        => 'comment',
					) );
				?>
			</ol><!-- .comment-list -->
		</div>
		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // Are there comments to navigate through? ?>
		<nav id="comment-nav-below" class="navigation comment-navigation" role="navigation">
			<h2 class="screen-reader-text"><?php esc_html_e( 'Comment navigation', 'dcode' ); ?></h2>
			<div class="nav-links">

				<div class="nav-previous"><?php previous_comments_link( esc_html__( 'Older Comments', 'dcode' ) ); ?></div>
				<div class="nav-next"><?php next_comments_link( esc_html__( 'Newer Comments', 'dcode' ) ); ?></div>

			</div><!-- .nav-links -->
		</nav><!-- #comment-nav-below -->
		<?php
		endif; // Check for comment navigation.

	endif; // Check for have_comments().

	// If comments are closed and there are comments, let's leave a little note, shall we?
	if ( ! comments_open() && get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) : ?>

		<p class="no-comments"><?php esc_html_e( 'Comments are closed.', 'dcode' ); ?></p>
	<?php
	endif;

	$comments_args = array(
        // Change the title of send button 
        'label_submit' => esc_html__( 'Post Comment', 'dcode' ),
        // Change the title of the reply section
        'title_reply' => esc_html__( 'Leave a Comment', 'dcode' ),
        'submit_button' => '<input name="%1$s" type="submit" id="%2$s" class="%3$s btn btn-primary btn-sm" value="%4$s" />',   
        // Remove "Text or HTML to be displayed after the set of comment fields".
        'comment_notes_after' => '',
        // Redefine your own textarea (the comment body).
        'comment_field' => '<div class="col-lg-12 mb-4">
                              <textarea class="form-control" rows="5" id="comment" name="comment" aria-required="true" placeholder="' . __( 'Your Comment', 'dcode' ) . '"></textarea>
                           </div>',
	);
	comment_form( $comments_args );
?>
</section><!-- #comments -->