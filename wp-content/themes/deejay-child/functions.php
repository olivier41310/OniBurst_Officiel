<?php
    //Créer une fonction qui va déclarer les feuilles de style
    function styles_complementaires(){
            // Les instructions
            // Faire le lien vers le style du parent
            // 2 paramètres minimum
            wp_enqueue_style('style-parent',get_template_directory_uri().'/style.css');
            // wp-content/themes/deejay/style.css           
            // bootstrap
            wp_enqueue_style('bootstrap','https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css');

            wp_enqueue_style('css-perso' ,get_stylesheet_directory_uri().'/css/main.css');
            wp_enqueue_style('bootstrap-icon',"https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css");
            wp_enqueue_script('bootstrap-js','https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js');
            // Faire le lien vers le style de l'enfant
            wp_enqueue_style('style-enfant',get_stylesheet_uri());
    }

    // On lance la fonction que l'on vient de créer
            add_action('wp_enqueue_scripts','styles_complementaires');
       //initialiser les menus
    if(function_exists('register_nav_menus')){
        register_nav_menus(
            array(
                'main'=>'Menu principal',
                'topbar'=>'Top Bar Menu',
                'footmenu'=>'Menu du Pied de Page'
            ));
    } 
        //initialiser les widgets : activation
        //sidebar = contenu qui se répète sur toutes les pages
        if(function_exists('register_sidebar')){
            register_sidebar(
                array(
                    'id'=>'premier',
                    'name'=>'Zone en bas de page',
                    'description'=>'Emplacement se trouvant en bas de chaque page du site',
                    'before_widget'=>'<div>',
                    'after_widget'=>'</div>'
            )
        );
    }
        if(function_exists('register_sidebar')){
            register_sidebar(
                array(
                    'id'=>'deuxieme',
                    'name'=>'Barre latérale droite',
                    'description'=>'Emplacement se trouvant à droite sur chaque article secondaire du site',
                    'before_widget'=>'<div>',
                    'after_widget'=>'</div>'
            )
        );
    }
    // ACTIVE DES OPTIONS DANS LE THEME
    // Le format des articles par défaut de Worpress
    add_theme_support('post-formats',array('aside','gallery','status','quote','link','link','video','audio','image'));
    // Le images mises en avant des articles
    add_theme_support('post-thumbnails');


