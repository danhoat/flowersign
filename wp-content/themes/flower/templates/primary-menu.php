    <!-- +++++++++++ 카테고리 메뉴( 카테고리 메뉴를 미노출 하실 분은 style="display:none;" 처리 하세요. ex) id="cateSwiper" class="nav_wrap" style="display:none;" ) +++++++++++ -->
    <div id="cateSwiper" class="nav_wrap">
        <div class="resp_wrap">
            <div class="nav_category_area">
                <div class="designCategoryNavigation">
                    <ul class="respCategoryList">

                    



                        <?php

                        $menu_name = 'primary_menu';

                        if ( ( $locations = get_nav_menu_locations() ) && isset( $locations[ $menu_name ] ) ) {
                            $menu_items = wp_get_nav_menu_object( $locations[ $menu_name ] );
                            $menu_items = wp_get_nav_menu_items( $menu_items );

                            $menu_list = '';

                            $count = 0;
                            $submenu = false;

                            if( $menu_items && !is_wp_error($menu_items) ){
                                foreach( $menu_items as $menu_item ) {
                                    
                               
                                    $link = $menu_item->url;
                                    $title = $menu_item->title;
                                    
                                    if ( !$menu_item->menu_item_parent ) {
                                        $parent_id = $menu_item->ID;
                                        
                                        $menu_list .= '<li class="categoryDepth1 item">' ."\n";
                                        $menu_list .= '<a href="'.$link.'" class=" categoryDepthLink title"><em>'.$title.'</em></a>' ."\n";
                                    }

                                    if ( $parent_id == $menu_item->menu_item_parent ) {

                                        if ( !$submenu ) {
                                            $submenu = true;
                                            $menu_list .= '<ul class="sub-menu">' ."\n";
                                        }

                                        $menu_list .= '<li class="categoryDepth1">' ."\n";
                                        $menu_list .= '<a href="'.$link.'" class="categoryDepthLink"><em>'.$title.'</em></a>' ."\n";
                                        $menu_list .= '</li>' ."\n";
                                            

                                        if ( $menu_items[ $count + 1 ]->menu_item_parent != $parent_id && $submenu ){
                                            $menu_list .= '</ul>' ."\n";
                                            $submenu = false;
                                        }

                                    }

                                    if ( isset($menu_items[ $count + 1 ]) && $menu_items[ $count + 1 ]->menu_item_parent != $parent_id ) { 
                                        $menu_list .= '</li>' ."\n";      
                                        $submenu = false;
                                    }

                                    $count++;
                                }
                            }
                            echo $menu_list;
                        }
                    
                    ?>




                        <li class="categoryDepth1">
                            <a class="top_menu_myinfo " href="#"></a>
                        </li>
                        <li class="categoryDepth1">
                            <?php global $woocommerce; ?>
                            <a class="top_menu_cart" designelement="text" textindex="31"  href="<?php echo wc_get_cart_url();?>"><span class="cart_cnt2"><?php echo $woocommerce->cart->cart_contents_count;?></span></a>

                       

                        </li>


                        <li class="categoryDepth1">
                            <a class="top_menu_search" designelement="text" textindex="32" href="javascript:void(0);"></a>
                        </li>
                        <!-- 꽃청 수정 END -->
                    </ul>
                    
                </div>
            </div>
        </div>
    </div>
    <!-- +++++++++++ //카테고리 메뉴 +++++++++++ -->
    <!-- end header Line_599 !-->