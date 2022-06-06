<?php
/*
 * Plugin Name: addWooField
 * Description: Add field and images.
 * Author: Samen Prakhin
 */





 // add hiik
 add_action( 'woocommerce_product_options_general_product_data', 'art_woo_add_custom_fields' );


 
function art_woo_add_custom_fields() {
	// show the old dropdown category filter from WC 3.1.2

	global $product, $post;

	echo '<div class="options_group">'; // Группировка полей.

    echo '<h2><strong>Дополнительные поля</strong></h2>';

	// Выбор значения.
	woocommerce_wp_select(
		[
			'id'      => '_select',
			'label'   => 'Product type',
			'options' => [
				'Unique'   => __( 'unique', 'woocommerce' ),
				'Rare'   => __( 'rare', 'woocommerce' ),
				'Frequent' => __( 'frequent', 'woocommerce' ),
			],
		]
	);

	// Чекбокс.
	
	echo '</div>'; // Закрывающий тег Группировки полей
	// Выбор товаров.
	
	?>
    <div class="options_group">
	<p class="form-field product_field_type">
		<label for="product_field_type">Выбор категории</label>
		<select
			id="product_field_type"
			name="product_field_type[]"
			class="wc-product-search"
			multiple="multiple"
			style="width: 50%;"
			data-placeholder="<?php esc_attr_e( 'Search for a product…', 'woocommerce' ); ?>"
			data-action="woocommerce_json_search_products_and_variations"
			data-exclude="<?php echo intval( $post->ID ); ?>">
			<?php
			$product_ids            = [];
			$product_field_type_ids = get_post_meta( $post->ID, '_product_field_type_ids', true );

			if ( ! empty( $product_field_type_ids ) ) {
				$product_ids = array_map( 'absint', $product_field_type_ids );
			}

			if ( $product_ids ) {
				foreach ( $product_ids as $product_id ) {
					$product = wc_get_product( $product_id );

					echo sprintf(
						'<option value="%s" %s>%s</option>',
						esc_attr( $product_id ),
						selected( true, true, false ),
						esc_html( $product->get_formatted_name() )
					);
				}
			}
			?>
	    	</select>
		<span class="woocommerce-help-tip" data-tip="Тут можно указать какое-нибудь описание"></span>
    </p>
        <input

                class="input-text fn_clean wc_input_decimal"
                size="6"
                type="file"
                accept="produkts_image"
                name="produkts_image"
                value="<?php echo esc_attr( get_post_meta( $post->ID, 'produkts_image', true ) ); ?>"
                style="width: 15.75%;margin-right: 2%;"/>
        <input
                id="dateProductCreate"
                class="input-text fn_clean wc_input_decimal"
                size="6"
                type="date"
                name="date"
                value="<?php echo esc_attr( get_post_meta( $post->ID, 'data', true ) ); ?>"
                style="width: 15.75%;margin-right: 2%;"/>

        <span class="description">
		    	<button type="button" id="removeImg" class="button">Удалить картинку</button>
		</span>

    </p>

    <?php
        echo get_post_meta ( $post->ID , 'produkts_image', true );
    ?>
        <p class="form-field custom_field_type">
            <button type='button' class="save-button button button-primary button-large">создать товар</button>
            <button type="button" class="clear-button button button-primary button-large">Очистить поля</button>
        </p>
    </div>
<script>
    jQuery(document).ready( function( $ ){
        var data = {
            action: 'my_action',
            whatever: 1234
        };

        // с версии 2.8 'ajaxurl' всегда определен в админке
        jQuery.post( ajaxurl, data, function( response ){
            alert( 'Получено с сервера: ' + response );
        } );
    } );

    document.querySelectorAll(".clear-button")
        .forEach(function (elem) {
            elem.onclick = function (e) {

                let selector = this.dataset.clearSelector;
                document.querySelectorAll(selector)
                    .forEach(function (item) {
                        item.value = "";

                    });
            };
        });


    //save-buttob
    document.querySelectorAll(".save-button")
    jQuery(document).ready( function( $ ){
        var data = {
            action: 'CallOfHook',
        };


        jQuery.post( ajaxurl, data, function(){
            alert( 'Все ок!');
        } );
    } );</script>
    <?php

    // save
	require_once('save.php');



    add_action('цз_фофч_CallOfHook', 'saveForm');
    }
    function saveForm(){
        do_action('woocommerce_process_product_meta');
    }



    admin_enqueue_script('clear', plugins_url() . 'clear.js', array('jquery'));



