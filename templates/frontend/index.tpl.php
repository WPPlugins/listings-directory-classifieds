			<?php w2dc_renderMessages(); ?>
			
			<div class="w2dc_directory_frontpanel">
				<?php do_action('w2dc_directory_frontpanel'); ?>
				<?php if (get_option('w2dc_favourites_list')): ?>
				<input type="button" class="w2dc_favourites_link" value="<?php _e('My favourites', 'W2DC'); ?>" onClick="window.location='<?php echo add_query_arg('action', 'myfavourites', $w2dc_instance->index_page_url); ?>';" />
				<?php endif; ?>
			</div>

			<div class="entry-content">
				<?php $frontend_controller->search_form->display(); ?>
		
				<?php if (get_option('w2dc_show_categories_index')): ?>
				<?php w2dc_renderAllCategories(get_option('w2dc_categories_nesting_level'), 2, get_option('w2dc_show_category_count')); ?>
				<?php endif; ?>
				
				<?php $frontend_controller->google_map->display(false);?>

				<?php if (get_option('w2dc_listings_on_index')): ?>
				<div id="w2dc_found_listings">
					<?php echo sprintf(_n('Found %d listing', 'Found %d listings', $frontend_controller->query->found_posts, 'W2DC'), $frontend_controller->query->found_posts); ?>
				</div>

				<?php if ($frontend_controller->query->found_posts > 1): ?>
				<div id="w2dc_orderby_links">
					<?php if ($frontend_controller->query->found_posts) echo w2dc_orderLinks($frontend_controller->base_url); ?>
				</div>
				<?php endif; ?>
		
				<?php if ($frontend_controller->listings): ?>
					<?php while ($frontend_controller->query->have_posts()): ?>
					<?php $frontend_controller->query->the_post(); ?>
					<article id="post-<?php the_ID(); ?>" class="w2dc_listing <?php if ($frontend_controller->listings[get_the_ID()]->level->featured) echo 'w2dc_featured'; ?>">
						<?php $frontend_controller->listings[get_the_ID()]->display(); ?>

						<?php if (get_option('w2dc_listings_own_page')): ?>
						<a href="<?php the_permalink(); ?>"><?php _e('View listing >>', 'W2DC'); ?></a>
						<?php endif; ?>
					</article>
					<?php endwhile; ?>
					
					<?php $frontend_controller->renderPaginator(); ?>
				<?php endif; ?>
				<?php endif; ?>
			</div>