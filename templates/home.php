<?php
/*
Template Name:Home page
*/
get_header();
$fields = get_fields();
$slides = $fields['hero_block_slider'];
$args = array(
    'post_type' => 'product',
    'posts_per_page' => -1
);

$products = get_posts($args);

?>
<main>
    <section class="hero-block">
        <div class="slider owl-carousel">
            <?php
            if (isset($slides) && !empty($slides)) :
                foreach ($slides as $slide) :; ?>
                    <div class="item"><?php echo wp_get_attachment_image($slide['image'], 'full') ?? ''; ?></div>
                <?php
                endforeach;
            endif; ?>
        </div>
    </section>
    <section class="about">
        <h1 class="about__title"><?php echo $fields['about_title'] ?? ''; ?></h1>
        <div class="about__content">
            <?php echo $fields['about_description'] ?? ''; ?>
        </div>

        <button class="about__button"><?php echo $fields['about_button'] ?? ''; ?>
            <svg width="10" height="6" viewBox="0 0 10 6" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M1.50001 0.200012L5.00001 3.70001L8.50001 0.200012L9.90001 0.900012L5.00001 5.80001L0.100006 0.900012L1.50001 0.200012Z"
                      fill="#FF61E6"/>
            </svg>
        </button>
    </section>
    <section class="products">

        <?php if (isset($products) && !empty($products)) :
            foreach ($products as $product) :
                $product_permalink = get_permalink($product->ID);
                $product_name = $product->post_title;
                $product_price = get_post_meta($product->ID, '_regular_price', true);
                $image_id = get_post_meta($product->ID, '_thumbnail_id', true);
                $image_url = wp_get_attachment_image_src($image_id, 'full')[0];
                $product_description = get_post_field('post_content', $product->ID);
                $formatted_price = wc_price($product_price);
                $currency_symbol = get_woocommerce_currency_symbol(); ?>

                <div class="product__item">
                    <img src="<?php echo $image_url ?? '' ?>">
                    <h2 class="product__item-title"><?php echo $product_name ?? ''; ?></h2>
                    <div class="product__item-text">
                        <p class="product__item-description"><?php echo $product_description ?? ' '; ?></p>
                        <p class="product__item-price"><?php echo $currency_symbol . ' ' . $product_price ?? ''; ?></p>
                    </div>
                    <a href="<?php echo $product_permalink ?? ''; ?>" class="add-cart-button">סקירה מהירה</a>
                </div>

            <?php endforeach;
        endif; ?>
    </section>
</main>
<?php wp_footer() ?>
