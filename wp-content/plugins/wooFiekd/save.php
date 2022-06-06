<?php

    function saveFields($post_id)
    {
        // выпадающий список
        $woocommerce_select = $_POST['_select'];
        if ( ! empty( $woocommerce_select ) ) {
            update_post_meta( $post_id, '_select', esc_attr( $woocommerce_select ) );
        }


        // Сохранение группы произвольных полей.
        $woocommerce_pack_width = $_POST['data'];
        if (!empty($woocommerce_pack_width)) {
            update_post_meta($post_id, 'data', esc_attr($woocommerce_pack_width));
        }

        $woocommerce_pack_height = $_POST['produkts_image'];
        if (!empty($woocommerce_pack_height)) {
            update_post_meta($post_id, 'produkts_image', esc_attr($woocommerce_pack_height));
        }

    }


    add_action( 'woocommerce_process_product_meta', 'saveFields', 10 );