<?
/**
 * home_url
 * ホームURLを返す
 */
function sc_home_url($atts)
{
    //デフォルト値を設定
    $atts = shortcode_atts(
        array(
            "path"   => '/',
            "scheme" => 'relative', // "http" , "https" , "relative"（相対パス）
        ),
        $atts
    );

    //
    return home_url( $atts['path'], $atts['scheme'] );
}
add_shortcode('home_url', 'sc_home_url');