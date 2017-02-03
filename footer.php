</main>
<footer class="footer" role="contentinfo">
    <div class="footer-wrapper">
        <div id="footer-widget">
            <?php
                if(is_active_sidebar('footer-widget')){
                    dynamic_sidebar('footer-widget');
                }
            ?>
        </div>
    </div>

    <div class="site-info">
        <p><?php echo('PetNet Theme');?></p>
    </div>
</footer>

<!--</div>-->

<?php wp_footer(); ?>

</body>
</html>
