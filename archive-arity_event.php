<?php

get_header();

$description = get_the_archive_description();
?>

<?php if ( have_posts() ) : ?>

	<header class="page-header alignwide">
		<!-- <php the_archive_title( '<h1 class="page-title">', '</h1>' ); > -->
		<!-- Getting rid of the archives word in the title -->
		<!-- there should be a better version of this https://wordpress.stackexchange.com/questions/175884/how-to-customize-the-archive-title/175903#175903 -->
		<h1 class="page-title">Events</h1>

		<?php if ( $description ) : ?>
			<div class="archive-description"><?php echo wp_kses_post( wpautop( $description ) ); ?></div>
		<?php endif; ?>
	</header><!-- .page-header -->

	<?php while ( have_posts() ) : ?>
		<?php the_post(); ?> <!-- this doesnt seem to need to close? -->
		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

			<?php if ( has_post_thumbnail() ) { ?>
				<div class="arity_grid">
			<?php } ?>
				<header class="entry-header">
					<?php the_title( sprintf( '<h2 class="entry-title default-max-width"><a href="%s">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
				</header><!-- .entry-header -->

				<div class="events-thumbnail">
					<?php if ( has_post_thumbnail() ) { ?>
						<a href="<?php the_permalink(); ?>">
							<?php the_post_thumbnail(); ?>
						</a>
						<?php } ?>
				</div>

					<div class="entry-content">
						<?php get_template_part( 'template-parts/excerpt/excerpt', get_post_format() ); ?>
					</div><!-- .entry-content -->

					<footer class="entry-footer default-max-width">
						<?php twenty_twenty_one_entry_meta_footer(); ?>
					</footer><!-- .entry-footer -->
				<?php if ( has_post_thumbnail() ) { ?>
					</div>
				<?php } ?>
		</article><!-- #post-${ID} -->

	<?php endwhile; ?>

	<?php twenty_twenty_one_the_posts_navigation(); ?>

<?php else : ?>
	<?php get_template_part( 'template-parts/content/content-none' ); ?>
<?php endif; ?>

<?php get_footer(); ?>
