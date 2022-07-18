<?php 

add_action( 'admin_menu', 'extra_post_info_menu' );  

function extra_post_info_menu() {    
    $page_title = 'WordPress Extra Post Info';   
    $menu_title = 'Extra Post Info';   
    $capability = 'manage_options';   
    $menu_slug  = 'extra-post-info';   
    $function   = 'extra_post_info_page';   
    $icon_url   = 'dashicons-media-code';   
    $position   = 4;    
    add_menu_page( $page_title, $menu_title, $capability, $menu_slug, $function, $icon_url, $position ); 
    add_action( 'admin_init', 'update_extra_post_info' ); 
} 
 
if( !function_exists("extra_post_info_page") ) { 
    
    function extra_post_info_page(){ 
        
        ob_start(); ?>   

        <header class="plugin-header">
            <img src="<?php echo ENVIXO_PLUGIN_URL . '/assets/images/imagem-2.png'?>" width="149" />
        </header>

        <main>

        <form method="post" action="options.php">

            <?php settings_fields( 'envixo-info-options' ); ?>
            <?php do_settings_sections( 'envixo_example_plugin' ); 
            
            function envixo_plugin_setting_img() {
                
                $options = get_option( 'envixo-info-options');

                echo ' 
                    <div class="upload-area">                
                        <input type="hidden" class="misha-upl" id="upload_image" size="36" name="envixo-info-options[img]" value= '. esc_attr($options['img']) . ' /> 
                        <input id="upload_image_button" class="btn-upload misha-upl" type="button" value="Selecionar foto de perfil" />
                        <a href="#" class="misha-rmv inv"><span class="remove"></span></a>
                        <input type="hidden" name="misha-img" value="">
                    </div>
                    ';
            }

            echo envixo_plugin_setting_img();
                
                ?>

                <table class="form-table">
                    <tr valign="top">
                        <th class="test" scope="row">Preencha o nome do autor:</th>
                    </tr>
                        <td> <?php

                        function envixo_plugin_setting_title(){
                            $options = get_option( 'envixo-info-options');
                            echo '<input type="text" name="envixo-info-options[title]" value="' . esc_attr($options['title']) . '" placeholder="Ex: Patrick Espake"/>';
                        }

                        echo envixo_plugin_setting_title();
                            
                            ?>
                        </td>
                </table>

                <table class="form-table">
                    <tr valign="top">
                        <th class="test" scope="row">Biografia do autor:</th>
                    </tr>
                        <td>
                            <?php 
                                function envixo_plugin_setting_description(){
                                    $options = get_option( 'envixo-info-options');
                                    echo '<textarea rows="4" cols="50" name="envixo-info-options[description]" value="' . esc_attr($options['description']) . '" placeholder="Ex: Lorem ipsum dolor..."></textarea>';
                                }

                                echo envixo_plugin_setting_description();
                            ?>
                        
                    
                    </td>
                </table>

                <input style="
                            background: #23C062 0% 0% no-repeat padding-box;
                            border-radius: 10px;
                            opacity: 1;
                            width: 230px;
                            border: none;
                            color: white;
                            padding: 16px 33px;
                            cursor: pointer;
                            margin-top: 36px;
                            font-family: 'Quicksand', sans-serif;
                " name="submit" id="btn" type="submit" value="<?php esc_attr_e( 'Salvar informações' ); ?>" />
            </form>

        <?php 

    } 

    if( !function_exists("update_extra_post_info") ) { 
        function update_extra_post_info() {   
            register_setting( 'envixo-info-options', 'envixo-info-options' ); 
            add_settings_section('plugin_settings', '', 'envixo_example_plugin', 'extra_post_info_page');

            add_settings_field('envixo_plugin_setting_title', '', 'envixo_plugin_setting_title', 'extra_post_info_page', 'plugin_settings');

            add_settings_field('envixo_plugin_setting_description', '', 'envixo_plugin_setting_description', 'extra_post_info_page', 'plugin_settings');

            add_settings_field('envixo_plugin_setting_img', '', 'envixo_plugin_setting_img', 'envixo_example_plugin', 'envixo_title');
        } 
    }

    if( !function_exists("extra_post_info") ) {    

            function extra_post_info($content)   {     

                    $extra_info = get_option( 'extra_post_info' );    

                    $text = get_option( 'envixo-info-options');
                    
                    $last_content = '
                    
                    <style>
                        .contained { 
                            display: grid;
                            font-family: "Quicksand", sans-serif;
                        }
                    
                        .author-ctt { 
                            display: grid;
                            grid-template-columns: 1fr 540px;
                            width: 795px;
                            background: #FAFAFA 0% 0% no-repeat padding-box;
                            box-shadow: 0px 3px 6px #00000014;
                            border: 1px solid #EAEAEA;
                            border-radius: 10px;
                            opacity: 1;
                            justify-self: center;
                            padding: 31px;
                            gap: 30px;
                            color: #2D385D;
                        }

                        .author-description {
                            display: grid;
                            align-content: center;
                        }
                    
                        .content h2 {
                            color: #2D385D;
                            font-size: 28px;
                            font-weight: bold;
                        }

                        .content p {
                            font-size: 18px;
                        }

                        #btn {
                            background: #23C062 0% 0% no-repeat padding-box;
                            border-radius: 10px;
                            opacity: 1;
                            width: 230px;
                        }

                    </style>
                    
                    <div class="contained">
                        <div class="author-ctt">
                            <div class="author-icon">
                                <a id="img" href="#" class="misha-upl"><img src="' . esc_attr($text['img']) . '" width="184"/></a>
                            </div>
                            <div class="author-description">
                                <h2 class="">
                                    ' . esc_attr($text['title']) . '
                                </h2>
                                <p>
                                    ' . esc_attr($text['description']) . '
                                </p>
                            </div>
                        </div>
                    </div>';

                    return $content . $last_content;

            }  

            add_filter( 'the_content', 'extra_post_info' );  
        }

        return ob_get_clean();
    } 
    ?> 
    </main>