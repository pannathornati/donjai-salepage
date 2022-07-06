</div>
<!--#content-->

<?php if (is_active_sidebar( 'footbar' ) ) : ?>

<aside id="footbar" class="site-footbar">
    <div class="s-container">
        <?php dynamic_sidebar( 'footbar' ); ?>
    </div>
</aside>

<?php else: ?>

<div class="site-footer-space"></div>
<footer id="colophon" class="site-footer">
    <div class="s-container">
        <div class="site-info">
            &copy; <?php echo date("Y"); ?> <?php bloginfo( 'name' ); ?>. All rights reserved.
        </div>
    </div>
</footer>
<?php endif; ?>

</div>
<!--#page-->
<?php 
if(get_theme_mod('consent_enable', 0)) {
    get_template_part( 'template-parts/footer', 'consent' ); 
}
?>
<?php wp_footer(); ?>
</body>
</html>