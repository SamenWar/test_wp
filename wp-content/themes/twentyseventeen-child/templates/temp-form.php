
<form action="" method="post">
    <input
            id="nameProductCreate"
            class="input-text fn_clean wc_input_decimal"
            size="6"
            type="text"
            accept="produkts_name"
            name="produkts_name"
            value="<?php echo esc_attr( get_post_meta( $post->ID, 'produkts_image', true ) ); ?>"
            style="width: 15.75%;margin-right: 2%;"/>
    <input
            id="imageProductCreate"
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
`   <input
            id="priseProductCreate"
            class="input-text fn_clean wc_input_decimal"
            size="6"
            type="int"
            name="prise"
            value="<?php echo esc_attr( get_post_meta( $post->ID, 'data', true ) ); ?>"
            style="width: 15.75%;margin-right: 2%;"/>
    `
    >

    <span class="description">
		    	<button type="button" id="removeImg" class="button">Удалить картинку</button>
		</span>

</form>