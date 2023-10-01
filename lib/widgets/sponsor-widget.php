<?php
class Evnt_Mngmnt_Sponsor_Widget extends \Elementor\Widget_Base
{

    public function get_name()
    {
        return 'evnt_mngmnt_sponsor_widget';
    }

    public function get_title()
    {
        return esc_html__('Sponsor Widget', 'evnt-mngmnt-addon');
    }

    public function get_icon()
    {
        return 'eicon-code';
    }

    public function get_categories()
    {
        return ['basic'];
    }

    public function get_keywords()
    {
        return ['sponsors', 'widgets'];
    }

    protected function render()
    {
        $args = array(
            'post_type' => 'sponsor',
            'posts_per_page' => -1,
        );

        $sponsor_query = new WP_Query($args);

?>
        <div class="sponsors">

            <?php
            // Display the sponsor images
            if ($sponsor_query->have_posts()) :
                while ($sponsor_query->have_posts()) : $sponsor_query->the_post();

                    //get sponsor logos          
                    $sponsor_image = get_the_post_thumbnail(get_the_ID(), 'large');

                    if ($sponsor_image) {
                        echo $sponsor_image;
                    }



                endwhile;
                wp_reset_query(); // Restore the global post data
            else :
                echo 'No sponsor found.';
            endif;

            ?>

        </div>

<?php } //render end

} //end class
