<?php get_header(); ?>


<!-- https://codex.wordpress.org/fr:La_Boucle_En_Action -->

<div class="container">
  	<div class="row">
    	<div class="col-12">
            <div class="single">

                <?php if (have_posts()) : ?>
                    <?php while (have_posts()) : the_post(); ?>
                        <div class="post">
                            <article>
                                <h1 id="post-<?php the_ID(); ?>"><?php the_title(); ?></a></h1>
                                <div class="postmetadata">
                                    <div class="cat-links"><?php the_category(', ') ?></div>
                                    <div class="date"><?php the_time('j F, Y') ?></div>
                                    <!--<div class="author"><?php the_author(); ?></div>-->
                                    <div class="comments-link"><?php comments_popup_link('Aucun commentaire', '1 Commentaire', '% Commentaires'); ?></div>
                                    <?php if (is_admin_bar_showing()) : ?>
                                        <div class="edit-post"><?php edit_post_link('Modifier','',''); ?></div>
                                    <?php endif; ?>
                                </div>

                                <div class="separator"></div>

                                <div class="excerpt">
                                    <?php
                                        $post = get_post($id);
                                        $content_arr = get_extended($post->post_content);
                                        echo apply_filters('the_content', $content_arr['main']);
                                    ?>
                                </div>
                                <?php
                                    if ( has_post_thumbnail() ) {
                                        the_post_thumbnail();
                                    }
                                ?>
                                <?php echo apply_filters('the_content', $content_arr['extended']); ?>
                            </article>

                            <div class="separator"></div>
                            
                            <!-- About Author -->
                            <div class="about-author-wraper">
                                <div class="row">
                                    <div class="col-3">
                                        <?php echo get_avatar( $post->post_author, 96 ); ?>
                                    </div>
                                    <div class="col-9">
                                        <div class="author-nickname">Publié par <?php the_author_posts_link(); ?></div>
                                        <div class="author-bio"><?php the_author_description(); ?></div>    
                                        <div class="author-all-posts"><a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ), get_the_author_meta( 'user_nicename' ) ); ?>">Voir tous les articles</a></div>
                                    </div>
                                </div>
                            </div><!-- .about-author-wraper -->
                       
                    <?php endwhile; ?>
                <?php else : ?>
                    <h2 class="center">Not Found</h2>
                    <p class="center"><?php _e("Sorry, but you are looking for something that isn't here."); ?></p>
                <?php endif; ?>
    
            </div><!-- .single -->
		</div><!-- .col-* -->
	</div><!-- .row -->
</div><!-- .container -->

<div class="separator"></div>

<?php get_footer();
