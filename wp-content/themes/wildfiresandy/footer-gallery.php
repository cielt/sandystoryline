<?php
/**
 * The template for displaying the footer for gallery pages.
 *
 * Contains the closing of the id=main div and all content after
 *
 * @package progression
 * @since progression 1.0
 */
?>
<div class="clearfix"></div>
</div><!-- close .width-container -->

</div><!-- close #main -->

<footer>
	
	<div class="width-container">
		
		<div id="copyright"><?php echo of_get_option('copyright_textarea', '&copy; 2012 All Rights Reserved. Developed by <a href="http://themeforest.net/user/ProgressionStudios/?ref=ProgressionStudios" target="_blank">Progression Studios</a>.'); ?></div>
		
	<div class="clearfix"></div>
	</div><!-- close .width-container -->
</footer>
<?php wp_footer(); ?>

<?php if(of_get_option('tracking_code')): ?>
	<?php echo '<script type="text/javascript">'; ?>
	<?php echo of_get_option('tracking_code'); ?>
	<?php echo '</script>'; ?>
<?php endif; ?>

</body>
</html>