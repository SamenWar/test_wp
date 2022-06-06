
	<form action="woofield.php" method="post">
        <label for="name">Наименование товаа</label><br>
        <input type="text" id="name" name="name" value="Назовите товар"><br>
        <label for="date">Дата добавления товара</label><br>
        <input type="date" id="date" name="date" ><br>
        <label for="prise">Стоимость товара</label><br>
        <input type="text" id="prise" name="prise" value="999"><br>
        <label for="image">Изображение товара</label><br>
        <input type="file" id="image" name="image" ><br>
        <button type="submit"></button>
    </form>
    <script>


    </script>
    <?php
    add_action( 'wp_enqueue_scripts', 'myajax_data', 99 );
    function myajax_data(){


	    wp_localize_script( 'twentyseventeen-script', 'myajax',
		    array(
			    'url' => admin_url('admin-ajax.php')
		    )
	    );

    }

    add_action( 'wp_footer', 'my_action_javascript', 99 ); // для фронта
    function my_action_javascript() {
	    ?>
        <script type="text/javascript" >
            jQuery(document).ready(function($) {
                var data = {
                    action: 'my_action',
                };

            });
        </script>
	    <?php
    }