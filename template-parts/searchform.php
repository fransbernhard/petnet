<?php
/**
 * Template for displaying search forms in petnet
 *
 */
?>

<form role="search" method="get" class="search-form" action="<?php echo home_url( '/' ); ?>">
		<label class="searchLabel">
				<span type="submit" class="search-submit"><i class="fa fa-search" aria-hidden="true"></i></span>
				<input type="text" class="search-field" placeholder="Search" value="<?php echo get_search_query(); ?>" name="s" />
				<div class="filter-icon">
						<span class="fa-task"></span>
				</div>
		</label>
</form>
