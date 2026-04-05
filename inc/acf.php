<?php
//-- Synchronization ACF JSON
// add_filter('acf/settings/save_json', 'cwt_acf_json_save_point');
// add_filter('acf/settings/load_json', 'cwt_acf_json_load_point');
// //Save
// function cwt_acf_json_save_point($path)
// {
//     $path = get_stylesheet_directory() . '/acf-json';
//     return $path;
// }
// //Load
// function cwt_acf_json_load_point($paths)
// {
//     unset($paths[0]);
//     array_push($paths, get_stylesheet_directory() . '/acf-json');
//     return $paths;
// }

//-- ACF Theme options
class cwt_acf_custom_blocks
{
    private $category = "";
    private $paths = array(
        'frontpage' => array(
            'path' => 'partials/front-page/',
            'name' => 'Strona Główna'
        ),
        'page' => array(
            'path' => 'partials/page/',
            'name' => 'Strony'
        ),
        'main' => array(
            'path' => 'partials/',
            'name' => 'Main'
        ),
    );
    public function __construct()
    {
        $this->category = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', CWT_THEME_NAME)));
        add_filter('block_categories', array($this, 'register_block_categories'), 10, 2);

        /*acf_add_options_page(array(
            'page_title'    => 'Globalne ustawienia szablonu',
            'menu_title'    => 'Ustawienia szablonu',
            'menu_slug'     => 'theme-general-settings',
            'capability'    => 'edit_posts',
            'redirect'      => false
        ));*/
        if (function_exists('acf_register_block_type')) {
            add_action('acf/init', array($this, 'register_block_types'));
        }
    }
    public function register_block_categories($categories, $post)
    {
        array_unshift($categories, array(
            'slug' => $this->category,
            'title' => CWT_THEME_NAME,
            'icon'  => 'star-filled',
        ));
        return $categories;
    }

    public function register_block_types()
    {
        //////////////* Main blocks register *///////////
        acf_register_block_type(array(
            'name'              => 'kontener',
            'title'             => '★ ' . __('Kontener', CWT_DOMAIN),
            'description'       => __('Kontener na treść. Niweluje pełną szerokość. Stosować tam, gdzie nie chcemy pełnej szerokości. Można stosować z grupą do zmiany koloru tła.', CWT_DOMAIN),
            'render_template'   => $this->paths['main']['path'].'container.php',
            'category'          =>  $this->category,
            'icon'              => 'align-center',
            // 'post_types' => array('page'),
            'supports' => [
                'align' => false,
                'color' => [ 'background' => true, 'text' => false ],
                'jsx' => true,
            ],
        ));
        acf_register_block_type(array(
            'name'              => 'przyciski',
            'title'             => '★ ' . __('Przyciski', CWT_DOMAIN),
            'description'       => __('Przycisk do wyboru', CWT_DOMAIN),
            'render_template'   => $this->paths['main']['path'].'buttons.php',
            'category'          =>  $this->category,
            'icon'              => 'align-center',
            // 'post_types' => array('page'),
            'supports' => [
                'align' => array('left', 'right','center'),
                'jsx' => true,
            ],
        ));
        acf_register_block_type(array(
            'name'              => 'ikony',
            'title'             => '★ ' . __('Ikony', CWT_DOMAIN),
            'description'       => __('Ikony do wyboru', CWT_DOMAIN),
            'render_template'   => $this->paths['main']['path'].'icons.php',
            'category'          =>  $this->category,
            'icon'              => 'star-filled',
            // 'post_types' => array('page'),
            'supports' => [
                'align' => array('left', 'center', 'right'),
                'jsx' => true,
            ],
        ));
        acf_register_block_type(array(
            'name'              => 'row',
            'title'             => '★ ' . __('Wiersz', CWT_DOMAIN),
            'description'       => __('Wiersz do użytku z kolumnami', CWT_DOMAIN),
            'render_template'   => $this->paths['main']['path'].'row.php',
            'category'          =>  $this->category,
            'icon'              => 'align-center',
            'supports' => [
                'jsx' => true,
            ],
        ));
        acf_register_block_type(array(
            'name'              => 'col8',
            'title'             => '★ ' . __('kolumna 8/12', CWT_DOMAIN),
            'description'       => __('Kolumna o szerokości 8/12. 12 to pełna szerokość. Stosować do kontenera.', CWT_DOMAIN),
            'render_template'   => $this->paths['main']['path'].'col8.php',
            'category'          =>  $this->category,
            'icon'              => 'align-center',
            'supports' => [
                'jsx' => true,
            ],
        ));
        acf_register_block_type(array(
            'name'              => 'col4',
            'title'             => '★ ' . __('kolumna 4/12', CWT_DOMAIN),
            'description'       => __('Kolumna o szerokości 4/12. 12 to pełna szerokość. Stosować do kontenera.', CWT_DOMAIN),
            'render_template'   => $this->paths['main']['path'].'col4.php',
            'category'          =>  $this->category,
            'icon'              => 'align-center',
            'supports' => [
                'jsx' => true,
            ],
        ));
        //////////////* /Main blocks register *///////////
        //////////////* Front page blocks register *///////////
        acf_register_block_type(array(
            'name'              => 'slider',
            'title'             => '★ ' . __('Slider', CWT_DOMAIN),
            'description'       => __('Użtwane w '.$this->paths['frontpage']['name'], CWT_DOMAIN),
            'render_template'   => $this->paths['frontpage']['path'].'carousel.php',
            'category'          =>  $this->category,
            'icon'              => 'star-filled',
            'supports' => [
                /*'align' => array('wide', 'full'),*/
                'jsx' => true,
            ],
        ));

        acf_register_block_type(array(
            'name'              => 'witaj',
            'title'             => '★ ' . __('Witaj', CWT_DOMAIN),
            'description'       => __('Użtwane w '.$this->paths['frontpage']['name'], CWT_DOMAIN),
            'render_template'   => $this->paths['frontpage']['path'].'welcome.php',
            'category'          =>  $this->category,
            'icon'              => 'star-filled',
            // 'post_types' => array('page'),
            'supports' => [
                'align' => false,
                'jsx' => true,
            ],
        ));

        acf_register_block_type(array(
            'name'              => 'zabiegi-kolumny',
            'title'             => '★ ' . __('Zabiegi kolumny', CWT_DOMAIN),
            'description'       => __('Użtwane w '.$this->paths['frontpage']['name'], CWT_DOMAIN),
            'render_template'   => $this->paths['frontpage']['path'].'treatment-col.php',
            'category'          =>  $this->category,
            'icon'              => 'star-filled',
            // 'post_types' => array('page'),
            'supports' => [
                'align' => false,
                'jsx' => true,
            ],
        ));

        acf_register_block_type(array(
            'name'              => 'zabiegi-lista',
            'title'             => '★ ' . __('Zabiegi lista', CWT_DOMAIN),
            'description'       => __('Użtwane w '.$this->paths['frontpage']['name'], CWT_DOMAIN),
            'render_template'   => $this->paths['frontpage']['path'].'treatment-list.php',
            'category'          =>  $this->category,
            'icon'              => 'star-filled',
            // 'post_types' => array('page'),
            'supports' => [
                'align' => false,
            ],
        ));

        acf_register_block_type(array(
            'name'              => 'opinie',
            'title'             => '★ ' . __('Opinie', CWT_DOMAIN),
            'description'       => __('Użtwane w '.$this->paths['frontpage']['name'], CWT_DOMAIN),
            'render_template'   => $this->paths['frontpage']['path'].'opinions.php',
            'category'          =>  $this->category,
            'icon'              => 'star-filled',
            // 'post_types' => array('page'),
            'supports' => [
                'align' => false,
            ],
        ));

        acf_register_block_type(array(
            'name'              => 'nasi-eksperci',
            'title'             => '★ ' . __('Nasi eksperci', CWT_DOMAIN),
            'description'       => __('Użtwane w '.$this->paths['frontpage']['name'], CWT_DOMAIN),
            'render_template'   => $this->paths['frontpage']['path'].'experts.php',
            'category'          =>  $this->category,
            'icon'              => 'star-filled',
            // 'post_types' => array('page'),
            'supports' => [
                'align' => false,
                'jsx' => true,
            ],
        ));

        acf_register_block_type(array(
            'name'              => 'faq',
            'title'             => '★ ' . __('FAQ', CWT_DOMAIN),
            'description'       => __('Użtwane w '.$this->paths['frontpage']['name'], CWT_DOMAIN),
            'render_template'   => $this->paths['frontpage']['path'].'faq.php',
            'category'          =>  $this->category,
            'icon'              => 'star-filled',
            // 'post_types' => array('page'),
            'supports' => [
                'align' => false,
            ],
        ));

        acf_register_block_type(array(
            'name'              => 'trzy-posty',
            'title'             => '★ ' . __('Trzy posty', CWT_DOMAIN),
            'description'       => __('Użtwane w '.$this->paths['frontpage']['name'], CWT_DOMAIN),
            'render_template'   => $this->paths['frontpage']['path'].'blog.php',
            'category'          =>  $this->category,
            'icon'              => 'star-filled',
            // 'post_types' => array('page'),
            'supports' => [
                'align' => false,
            ],
        ));

        acf_register_block_type(array(
            'name'              => 'w-czym-mozemy-pomoc',
            'title'             => '★ ' . __('W czym możemy pomóc', CWT_DOMAIN),
            'description'       => __('Użtwane w '.$this->paths['frontpage']['name'], CWT_DOMAIN),
            'render_template'   => $this->paths['frontpage']['path'].'help.php',
            'category'          =>  $this->category,
            'icon'              => 'star-filled',
            // 'post_types' => array('page'),
            'supports' => [
                'align' => false,
            ],
        ));

        acf_register_block_type(array(
            'name'              => 'kontakt',
            'title'             => '★ ' . __('Kontakt', CWT_DOMAIN),
            'description'       => __('Użtwane w '.$this->paths['frontpage']['name'], CWT_DOMAIN),
            'render_template'   => $this->paths['frontpage']['path'].'contact.php',
            'category'          =>  $this->category,
            'icon'              => 'star-filled',
            // 'post_types' => array('page'),
            'supports' => [
                'align' => false,
            ],
        ));
        //////////////* /Front page blocks register *///////////
        //////////////* Page blocks register *//////////////////
        acf_register_block_type(array(
            'name'              => 'before-first-visit',
            'title'             => '★ ' . __('Przed pierwszą wizytą', CWT_DOMAIN),
            'description'       => __('Użtwane w '.$this->paths['page']['name'], CWT_DOMAIN),
            'render_template'   => $this->paths['page']['path'].'before-first-visit.php',
            'category'          =>  $this->category,
            'icon'              => 'star-filled',
            // 'post_types' => array('page'),
            'supports' => [
                'align' => false,
            ],
        ));
        //////////////* /Page blocks register *//////////////////
        //////////////* About blocks register *//////////////////
        acf_register_block_type(array(
            'name'              => 'team-members',
            'title'             => '★ ' . __('Zespół', CWT_DOMAIN),
            'description'       => __('Użtwane w '.$this->paths['page']['name'], CWT_DOMAIN),
            'render_template'   => $this->paths['page']['path'].'about.php',
            'category'          =>  $this->category,
            'icon'              => 'star-filled',
            // 'post_types' => array('page'),
            'supports' => [
                'align' => false,
            ],
        ));
        acf_register_block_type(array(
            'name'              => 'about-carousel',
            'title'             => '★ ' . __('Karuzela O NAS', CWT_DOMAIN),
            'description'       => __('Użtwane w '.$this->paths['page']['name'], CWT_DOMAIN),
            'render_template'   => $this->paths['page']['path'].'about-carousel.php',
            'enqueue_assets' => function(){
                wp_enqueue_script( 'zsz-slicker', get_template_directory_uri() . '/assets/slick.js', array('jquery'), '', true );
            },
            'category'          =>  $this->category,
            'icon'              => 'star-filled',
            // 'post_types' => array('page'),
            'supports' => [
                'align' => false,
            ],
        ));
        acf_register_block_type(array(
            'name'              => 'knowledge-carousel',
            'title'             => '★ ' . __('Karuzela WIEDZA', CWT_DOMAIN),
            'description'       => __('Użtwane w '.$this->paths['page']['name'], CWT_DOMAIN),
            'render_template'   => $this->paths['page']['path'].'knowledge-carousel.php',
            'enqueue_assets' => function(){
                wp_enqueue_script( 'zsz-slicker', get_template_directory_uri() . '/assets/slick.js', array('jquery'), '', true );
            },
            'category'          =>  $this->category,
            'icon'              => 'star-filled',
            // 'post_types' => array('page'),
            'supports' => [
                'align' => false,
            ],
        ));
        //////////////* /About blocks register *//////////////////

        /*acf_register_block_type(array(
            'name'              => 'block_container',
            'title'             => '★ ' . __('Kontener z tłem', CWT_DOMAIN),
            'description'       => __('Kontener z możliwością ustalenia koloru tła', CWT_DOMAIN),
            'render_template'   => 'blocks/container.php',
            'category'          =>  $this->category, // [ common | formatting | layout | widgets | embed ]
            'icon'              => 'align-center',
            'mode'              => 'preview',
            // 'post_types' => array('page'),
            'supports' => array(
                'align' => true,
                'mode' => true,
                'jsx' => true
            ),
        ));*/
        /*acf_register_block_type(array(
            'name'              => 'block_table',
            'title'             => '★ ' . __('Service table', CWT_DOMAIN),
            'description'       => __('Service table.', CWT_DOMAIN),
            'render_template'   => 'blocks/service_table.php',
            'category'          =>  $this->category, // [ common | formatting | layout | widgets | embed ]
            'icon'              => 'table-row-after',
            // 'post_types' => array('page'),
            'supports' => [
                'align' => false,
                'anchor' => true
            ],
        ));

        acf_register_block_type(array(
            'name'              => 'service_list',
            'title'             => '★ ' . __('Service list', CWT_DOMAIN),
            'description'       => __('Service list.', CWT_DOMAIN),
            'render_template'   => 'blocks/service_list.php',
            'category'          =>  $this->category, // [ common | formatting | layout | widgets | embed ]
            'icon'              => 'layout',
            // 'post_types' => array('page'),
            'supports' => [
                'align' => false,
                'anchor' => true
            ],
        ));*/
    }
}
$cwt_acf_custom_blocks = new cwt_acf_custom_blocks();
