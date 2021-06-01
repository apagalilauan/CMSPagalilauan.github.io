<form role="search" method="get" class="search-form" action="<?php echo esc_attr( esc_url( home_url('/') ) ); ?>">
	<div class="input-group">
	    <input type="text" name="s" id="search" class="form-control" placeholder="<?php esc_attr( esc_html_e( 'Search for...', 'dcode' ) ); ?>" <?php the_search_query(); ?>>
	    <span class="input-group-btn">
	        <button class="btn btn-primary search-submit" type="submit"><i class="fas fa-search"> </i></button>
	    </span>
	</div>
</form>