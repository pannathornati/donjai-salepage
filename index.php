<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package donjai
 */

get_header();?>


<?php donjai_banner_title(get_the_ID()); ?>

<div class="s-container main-body">
    <div id="primary" class="content-area">
        <main id="main" class="site-main">

            <section class="error-404 not-found">
                <header class="page-header hide">
                    <h1 class="page-title"><?php esc_html_e('That page can&rsquo;t be found.', 'donjai');?></h1>
                </header>

                <div class="page-content">
                    <p><?php esc_html_e('หากท่านติดปัญหาสามารถติดต่อเจ้าหน้าที่ผู้ดูแลเว็บไซต์', 'donjai');?></p>
                    <button class="btn-primary">ติดต่อเรา</button>
                </div>
            </section>

        </main>
    </div>
</div>

<?php get_footer();?>