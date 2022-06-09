<?php
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
</div>