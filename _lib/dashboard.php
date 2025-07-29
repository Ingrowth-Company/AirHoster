<?php
/*
* Dashboard functions
* Desenvolvedor: Bruno Lima
*/

// SAUDAÇÃO CUSTOMIZADA
function replace_howdy( $wp_admin_bar ) {
    $my_account=$wp_admin_bar->get_node('my-account');
    $newtitle = str_replace( 'Olá', 'Bem vindo', $my_account->title );
    $wp_admin_bar->add_node( array(
        'id' => 'my-account',
        'title' => $newtitle,
    ) );
}
add_filter( 'admin_bar_menu', 'replace_howdy',25 );

// CUSTOMIZAR O FOOTER (ASSINATURA DO PROJETO)
function remove_footer_admin () {
    echo '© '.get_bloginfo('name');
}
add_filter('admin_footer_text', 'remove_footer_admin');

// REMOVER WIDGETS
function remove_widgets_painel() {
    remove_meta_box( 'dashboard_incoming_links', 'dashboard', 'normal' );
    remove_meta_box( 'dashboard_plugins', 'dashboard', 'normal' );
    remove_meta_box( 'dashboard_primary', 'dashboard', 'normal' );
    remove_meta_box( 'dashboard_secondary', 'dashboard', 'normal' );
    remove_meta_box( 'dashboard_incoming_links', 'dashboard', 'normal' );
    remove_meta_box( 'dashboard_quick_press', 'dashboard', 'side' );
    remove_meta_box( 'dashboard_recent_drafts', 'dashboard', 'side' );
    remove_meta_box( 'dashboard_recent_comments', 'dashboard', 'normal' );
    remove_meta_box( 'dashboard_activity', 'dashboard', 'normal' );
    remove_meta_box( 'dashboard_right_now', 'dashboard', 'normal' );
    remove_meta_box( 'wpseo-dashboard-overview', 'dashboard', 'side' );
}
add_action( 'admin_init', 'remove_widgets_painel' );

// ADCIONANDO WIDGETS
function setup_suporte_widgets() {
    global $wp_meta_boxes;
    wp_add_dashboard_widget('custom_help_widget', 'Bruno Lima | Suporte', 'suporte_dashboard_help');
}

function suporte_dashboard_help() {
    echo 'Se você tiver qualquer dúvida ou precisar de ajuda, por favor, entre em contato: <a href="https://web.whatsapp.com/send?phone=5585987745679&amp;text=Ol%C3%A1,%20como%20podemos%20ajuda-lo?" target="_blank" title="Whatsapp">(85) 9 8774-5679</a> ou mande um e-mail para <a href="mailto:bruno@convertte.com.br">bruno@convertte.com.br</a>';
}

add_action('wp_dashboard_setup', 'setup_suporte_widgets');