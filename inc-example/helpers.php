<?php

/*
 * If is there bg-grey, should have data-bg="path" and class="...bg-grey lazy"
 * */
//it is so bad delete this for prod
global $bgGrey_imgSrc, $bgDotted_imgSrc, $bgGreyDark_imgSrc, $ColShiftRight_imgSrc, $serviceBoxGreybg_imgSrc;
$bgGrey_imgSrc = get_template_directory_uri() . "/assets/img/bg-grey.jpg";
$bgDotted_imgSrc = get_template_directory_uri() . "/assets/img/bg-dotted.png";
$bgGreyDark_imgSrc = get_template_directory_uri() . "/assets/img/bg-grey-dark.jpg";
$ColShiftRight_imgSrc = $bgGrey_imgSrc;
$serviceBoxGreybg_imgSrc = $bgGrey_imgSrc;  //  .service-box-greybg

function zsz_the_main_menu()
{
    $menuitems = wp_get_nav_menu_items('main');
    if (!$menuitems) {
        return;
    }

    echo '<ul class="navbar-nav">';
    foreach ($menuitems as $key => $item) {
        //if menu item is heighest parent
        if ($item->menu_item_parent == 0) {
            //(if next element exist and isn't child) or (if it is last parent)
            if ((isset($menuitems[$key + 1]) && $menuitems[$key + 1]->menu_item_parent != $item->ID) || (!isset($menuitems[$key + 1]))) {
                echo '<li class="nav-item">';
                echo '<a class="nav-link" href="' . $item->url . '">' . $item->title . '</a>';
                echo "</li>";
            } //if next element exist and is child
            elseif (isset($menuitems[$key + 1]) && $menuitems[$key + 1]->menu_item_parent == $item->ID) {
                echo '<li class="nav-item">';
                echo '<a href="' . $item->url . '" class="nav-link dropdown-toggle" data-toggle="dropdown" aria-expanded="false">' . $item->title . '</a>';
                echo '<ul class="dropdown-menu">';
            }
        } //if menu item is child
        elseif ($item->menu_item_parent != 0) {
            //if next element exist and menu item is last child or next element don't exist
            if ((isset($menuitems[$key + 1]) && $menuitems[$key + 1]->menu_item_parent != $item->menu_item_parent) || (!isset($menuitems[$key + 1]))) {
                echo '<li><a class="dropdown-item" href="' . $item->url . '">' . $item->title . '</a></li>';
                echo "</ul>";
            } //if next element is child of same parent
            elseif ((isset($menuitems[$key + 1]) && $menuitems[$key + 1]->menu_item_parent == $item->menu_item_parent)) {
                echo '<li><a class="dropdown-item" href="' . $item->url . '">' . $item->title . '</a></li>';
            }
        }
    }
    echo '</ul>';
}

function zsz_the_oferta_menu()
{
    $menuitems = wp_get_nav_menu_items('oferta');
    if (!$menuitems) {
        return;
    }
    $subCo = 1; //Submenu Counter
    echo '<ul class="services-nav flex-column flex-nowrap">';
    foreach ($menuitems as $key => $item) {
        //if menu item is heighest parent
        if ($item->menu_item_parent == 0) {
            //flag to add show to class
            $isCollapsed = '';
            //checking if this menu parent is parent of active child;; (is set) && (is child of parent) -> tehn if (is active) = div collapse "show"
            for ($i = 1; (isset($menuitems[$key + $i])) && ($menuitems[$key + $i]->menu_item_parent == $item->ID); $i++) {
                if ($menuitems[$key + $i]->title == the_title('', '', false)) {
                    $isCollapsed = ' show';
                }
            }

            //(if next element exist and isn't child) or (if it is last parent)
            if ((isset($menuitems[$key + 1]) && $menuitems[$key + 1]->menu_item_parent != $item->ID) || (!isset($menuitems[$key + 1]))) {
                echo '<li class="nav-item">';
                echo '<a class="nav-link" href="' . $item->url . '">' . $item->title . '</a>';
                echo "</li>";
            } //if next element exist and is child
            elseif (isset($menuitems[$key + 1]) && $menuitems[$key + 1]->menu_item_parent == $item->ID) {
                echo '<li class="nav-item">';
                echo '<a href="#submenu' . $subCo . '" class="nav-link" data-toggle="collapse" data-target="#submenu' . $subCo . '">' . $item->title . '</a>';
                echo '<div class="collapse' . $isCollapsed . '" id="submenu' . $subCo . '">';
                echo '<ul class="flex-column nav">';
                $subCo++;
            }
        } //if menu item is child
        elseif ($item->menu_item_parent != 0) {
            //flag check if link is active
            $isActive = '';
            if ($item->title == the_title('', '', false)) {
                $isActive = ' active';
            }
            //if next element exist and menu item is last child or next element don't exist
            if ((isset($menuitems[$key + 1]) && $menuitems[$key + 1]->menu_item_parent != $item->menu_item_parent) || (!isset($menuitems[$key + 1]))) {
                echo '<li class="nav-item"><a class="nav-link' . $isActive . '" href="' . $item->url . '">' . $item->title . '</a></li>';
                echo "</ul>";
                echo "</div>";
            } //if next element is child of same parent
            elseif ((isset($menuitems[$key + 1]) && $menuitems[$key + 1]->menu_item_parent == $item->menu_item_parent)) {
                echo '<li class="nav-item"><a class="nav-link' . $isActive . '" href="' . $item->url . '">' . $item->title . '</a></li>';
            }
        }
    }
    echo '</ul>';
}

function zsz_page_breadcrumb()
{
    //var_dump(yoast_breadcrumb('sdfds', 'btbr', false));
    /*if ( function_exists('yoast_breadcrumb') ) {
        yoast_breadcrumb( '<p id="breadcrumbs">','</p>' );
    }*/
    global $wp_query;
    $post = $wp_query->get_queried_object();
    //var_dump($post);
    $post_type = "";
    if ($post->post_type !== 'page') {
        $post_type = get_post_type_object(get_post_type($post));
        $post_type = '<span class="breadcrumb_last">' . $post_type->labels->singular_name . '</span> /';
    }

    ?>
    <!--section zsz_page_breadcrumb-->
    <div class="section mt-0">
        <div class="breadcrumbs-wrap">
            <div class="container">
                <div class="breadcrumbs">
                    <a href="<?php bloginfo('url'); ?>">Strona główna</a>
                    <?php if(is_tag()):?>
                        <span>Tagi</span> /
                    <?php elseif (is_category()): ?>
                        <span>Kategoria</span> /
                    <?php elseif (!empty($id)): ?>
                        <a href="<?php echo get_permalink($id); ?>"><?php echo get_the_title($id); ?></a> /
                    <?php endif; ?>
                    <?php if(!is_tag() && !is_category()): ?>
                        <?php echo $post_type; ?>
                    <?php endif; ?>
                    <span class="breadcrumb_last"><?php echo $post->post_title?$post->post_title:$post->name; ?></span>
                </div>
            </div>
        </div>
    </div>
    <!--//section zsz_page_breadcrumb-->
    <?php
}

//Display logo
function zsz_the_logo(string $url = "/", ?string $classCss = '')
{
    $logo = wp_get_attachment_image_src(get_theme_mod('custom_logo'), 'full');
    if (has_custom_logo()) {
        echo '<a href="' . $url . '" class="' . $classCss . '">';
        echo '<img src="' . esc_url($logo[0]) . '" alt="" class="img-fluid">';
        echo '</a>';
    } else {
        echo '<a href="' . get_home_url() . '">' . get_bloginfo('name') . '</a>';
    }
}

function zsz_the_image(array $image, string $size = null, string $class = '')
{
    $img = array();
    if (isset($size)) {
        $img['src'] = $image['sizes'][$size];
        $img['width'] = $image['sizes'][$size . '-width'];
        $img['height'] = $image['sizes'][$size . '-height'];
    } else {
        $img['src'] = $image['url'];
        $img['width'] = $image['width'];
        $img['height'] = $image['height'];
    }
    $img['alt'] = $image['alt'];
    $imgSizes = $image['sizes'];
    $dataSizes = '';
    $counter = 0;
    foreach ($imgSizes as $imgSize) {
        if ($counter % 3 == 0) {
            $dataSizes = $dataSizes . ' ' . $imgSize;
        } elseif ($counter % 3 == 1) {
            $dataSizes = $dataSizes . ' ' . $imgSize . 'w,';
        }
        $counter++;
    }
    //return:
    echo '<img width="' . $img['width'] . '" height="' . $img['height'] . '" data-src="' . $img['src'] . '" alt="' . $img['alt'] . '" data-srcset="' . $dataSizes . '" class="' . $class . ' lazy">';
}

function zsz_blog_pagination(WP_Query $query)
{

    if ($query->max_num_pages <= 1) return;

    $big = 999999999; // need an unlikely integer

    $pages = paginate_links(array(
            'prev_next' => false,
            'base' => str_replace($big, '%#%', esc_url(get_pagenum_link($big))),
            'format' => '?paged=%#%',
            'current' => max(1, get_query_var('paged')),
            'total' => $query->max_num_pages,
            'type' => 'array',
        ));
    if (is_array($pages)) {
        echo '<ul class="pagination justify-content-center">';
        foreach ($pages as $page) {
            $pieces = explode('class="', $page);
            //check if string of page link contain 'current' which mean current page
            if(strpos($page, 'current' ) !== false){
                echo '<li class="page-item active">'.$pieces[0].'class="page-link '.$pieces[1].'</li>';
            }
            else{
                echo '<li class="page-item">'.$pieces[0].'class="page-link '.$pieces[1].'</li>';
            }

        }
        echo '</ul>';
    }
}