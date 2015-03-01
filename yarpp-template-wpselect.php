<?php
/*
YARPP Template: WPselect
Author: John Levandowski
Description: WPselect YARPP template.
*/
if (have_posts()): ?>
<div class="wpselect-yarpp entry-content">
<h3>Related Posts</h3>
<ul>
	<?php while (have_posts()) : the_post(); ?>
	<li><a href="<?php the_permalink() ?>" onclick="__gaTracker('send', 'event', 'related-post-click', 'yarpp', '<?php the_permalink() ?>');" rel="bookmark"><?php the_title(); ?></a><!-- (<?php the_score(); ?>)--></li>
	<?php endwhile; ?>
</ul>
</div>
<?php endif; ?>
