# flicflac Theme

This is a Wordpress Theme for an association 

## Code Snippets for Wordpress

- Get the links of wp_menu
<?php 
    
    // Check name of my menu of top
        $menu_name = 'top-menu';

    // if menu locations and if exists location-name

        if ( ( $locations = get_nav_menu_locations() ) && isset( $locations[ $menu_name ] ) ) {


            $menu = wp_get_nav_menu_object( $locations[ $menu_name ] );
            
            $menu_items = wp_get_nav_menu_items($menu->term_id);

            foreach ($menu_items as $key => $item) {
        ?>
                <!-- Navigation Links --> 
            <li class="menu-item">           
                <a href="" data-target="<?php echo strtolower($item->title); ?>"><?php echo __($item->title); ?></a>
            </li>    
        <?php    
            };
        }                                    
?>

- Set video header for my theme


