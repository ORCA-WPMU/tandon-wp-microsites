<?php

if ( function_exists( 'acf_add_options_page' ) ) {
  acf_add_options_page();
  acf_add_options_sub_page( 'Hero' );
}

if ( function_exists( 'acf_add_options_page' ) ) {
  acf_add_options_page();
  acf_add_options_sub_page( 'About' );
}

if ( function_exists( 'acf_add_options_page' ) ) {
  acf_add_options_page();
  acf_add_options_sub_page( 'Event Details' );
}

if ( function_exists( 'acf_add_options_page' ) ) {
  acf_add_options_page();
  acf_add_options_sub_page( 'Homepage' );
}

// if ( function_exists( 'acf_add_options_page' ) ) {
//   acf_add_options_page();
//   acf_add_options_sub_page( 'Principals' );
// }

if ( function_exists( 'acf_add_options_page' ) ) {
  acf_add_options_page();
  acf_add_options_sub_page( 'Global' );
}

if ( function_exists( 'acf_set_options_page_menu' ) ) {
  acf_set_options_page_menu( __( 'NYU Settings' ) );
}

add_filter( 'timber_context', 'mytheme_timber_context'  );

function mytheme_timber_context( $context ) {


    $context['flexblock'] = get_field('nyu_flexible_content', 'option');

    $context['experiencetitle'] = get_field('experience_title', 'option');
    $context['experiencesubtitle'] = get_field('experience_subtitle', 'option');
    $context['experienceleftcolumn'] = get_field('experience_left_column', 'option');
    $context['experiencerightcolumn'] = get_field('experience_right_column', 'option');

    $context['herotitle'] = get_field('hero_title', 'option');
    $context['heroimage'] = get_field('hero_image', 'option');
    $context['herotrue'] = get_field('hero_true', 'option');
    $context['hero_img'] = get_field('background_image', 'option');
    $context['hero_header_title'] = get_field('header_title', 'option');
    $context['hero_cta'] = get_field('cta', 'option');
    $context['hero_left_col_list'] = get_field('left_col_bulleted_list', 'option');
    $context['hero_right_col_list'] = get_field('right_col_bulleted_list', 'option');
    $context['fullheight'] = get_field('full_height', 'option');
    $context['ifherobackgroundimage'] = get_field('is_hero_background_image', 'option');
    $context['herobackgroundcolor'] = get_field('hero_background_color', 'option');
    $context['herotextcolor'] = get_field('hero_text_color', 'option');
    $context['herofixed'] = get_field('hero_fixed', 'option');
    $context['herobackgroundcoloropacity'] = get_field('hero_background_color_opacity', 'option');
    $context['heroregistration'] = get_field('registration', 'option');
    $context['heroagendacta'] = get_field('agenda', 'option');
    $context['heroagendactaanchor'] = get_field('agenda_anchor', 'option');

    $context['carousel'] = get_field('hero_carousel', 'option');
    $context['carouseltitle'] = get_field('carousel_title', 'option');
    $context['iscarouselbackgroundimage'] = get_field('is_carousel_background_image', 'option');
    $context['carouselbackgroundcolor'] = get_field('carousel_background_color', 'option');
    $context['carouseltextcolor'] = get_field('carousel_text_color', 'option');
    $context['carouselimage'] = get_field('carousel_image', 'option');
    $context['carouselfixed'] = get_field('carousel_fixed', 'option');
    $context['carouselbackgroundcoloropacity'] = get_field('carousel_background_color_opacity', 'option');

    $context['townhall'] = get_field('town_hall_repeater', 'option');
    $context['townhall_intro'] = get_field('intro_text', 'option');
    $context['townhall_footer'] = get_field('footer_text', 'option');

    $context['email'] = get_field('email', 'option');
    $context['phone'] = get_field('phone', 'option');
    $context['socialmedia'] = get_field('social_media_repeater', 'option');
    $context['socialmedia'] = get_field('social_media', 'option');

    $context['testimonial'] = get_field('testimonial_repeater', 'option');

    $context['flexblock'] = get_field('nyu_flexible_content', 'option');

    $context['agendacontent'] = get_field('agenda_repeater', 'option');
    $context['agendaintro'] = get_field('agenda_intro', 'option');
    $context['agendafooter'] = get_field('agenda_footer', 'option');

    $context['globalbackgroundimage'] = get_field('global_background_image', 'option');
    $context['backgroundcolor'] = get_field('background_color', 'option');

    $context['aboutsection'] = get_field('about_section', 'option');
    $context['aboutprimarytitle'] = get_field('primary_title', 'option');
    $context['aboutsecondarytitle'] = get_field('secondary_title', 'option');
    $context['aboutwysiwyg'] = get_field('about_wysiwyg', 'option');
    $context['centercontent'] = get_field('center_content', 'option');
    $context['abouttitle'] = get_field('about_title', 'option');
    $context['aboutsubtitle'] = get_field('about_sub_title', 'option');
    $context['aboutcopy'] = get_field('about_copy', 'option');
    $context['aboutbackgroundimage'] = get_field('about_background_image', 'option');
    $context['aboutbackgroundcolor'] = get_field('about_background_color', 'option');
    $context['abouttextcolor'] = get_field('about_text_color', 'option');

    $context['parallax'] = get_field('parallax', 'option');
    $context['parallaxamount'] = get_field('parallax_amount', 'option');
    $context['fullheight'] = get_field('full_height', 'option');

    $context['istherebackgroundimage'] = get_field('is_there_background_image', 'option');
    $context['backgroundcoloropacity'] = get_field('background_color_opacity', 'option');
    $context['backgroundfixed'] = get_field('fixed', 'option');


    $context['peronsheadshot'] = get_field('headshot', 'option');
    $context['peronstitle'] = get_field('job_title', 'option');
    $context['peronsbio'] = get_field('bio', 'option');

    $context['alerttrue'] = get_field('nyu_an_alert', 'option');
    $context['alert'] = get_field('nyu_alert', 'option');

    $context['principalstitle'] = get_field('principals_title', 'option');
    $context['principalssubtitle'] = get_field('principals_subtitle', 'option');
    $context['principalsintro'] = get_field('principals_intro', 'option');
    $context['principalsrepeater'] = get_field('principals_repeater', 'option');

    $context['backgroundcolor'] = get_field('background_color', 'option');

    $context['downloadfile'] = get_field('files', 'option');

    $context['featimage'] = get_field('feat_image', 'option');

    $context['featurednews'] = get_field('featured_news', 'option');

    $context['eventbackgroundcolor'] = get_field('event_background_color', 'option');
    $context['eventbackgroundopacity'] = get_field('opacity', 'option');
    $context['eventtextcolor'] = get_field('event_text_color', 'option');
    $context['eventfixed'] = get_field('event_fixed', 'option');
    $context['upcomingevent'] = get_field('upcoming_event', 'option');
    $context['eventdate'] = get_field('event_date', 'option');
    $context['eventtitle'] = get_field('event_title', 'option');

    $context['footerleftblock'] = get_field('footer_left_block', 'option');
    $context['footercenterblock'] = get_field('footer_center_block', 'option');
    $context['footerrightblock'] = get_field('footer_right_block', 'option');

    $context['primarycolor'] = get_field('primary_color', 'option');
    $context['secondarycolor'] = get_field('secondary_color', 'option');

    $context['headshot'] = get_field('speaker_image', 'option');

    return $context;

}