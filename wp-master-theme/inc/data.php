<?php
/**
 * Static business + menu data — mirrors src/lib/business.ts and src/lib/menu.ts.
 * All page templates read from these helpers so a single edit updates the whole theme.
 */
if ( ! defined( 'ABSPATH' ) ) { exit; }

function oven_business() {
    return array(
        'name'         => 'The Oven Pizza Chichawatni',
        'short_name'   => 'The Oven Pizza',
        'tagline'      => 'Fresh from the fire. Straight to your table.',
        'rating'       => '4.8',
        'reviews'      => 140,
        'address'      => 'Kamboh Road, Street No. 12, Block 12, Chichawatni, Punjab, Pakistan',
        'address_short'=> 'Kamboh Road, Block 12, Chichawatni',
        'plus_code'    => 'GMGR+R5 Chichawatni',
        'phone'        => '+92 300 1580250',
        'phone_raw'    => '+923001580250',
        'whatsapp'     => '923001580250',
        'hours'        => 'Open Daily · 11:00 AM – 2:00 AM',
        'price_range'  => 'Rs 1 – 1000',
        'map_embed'    => 'https://www.google.com/maps?q=Chichawatni,+Punjab,+Pakistan&output=embed',
        'map_link'     => 'https://maps.google.com/?q=The+Oven+Pizza+Chichawatni',
        'social'       => array(
            'facebook'  => 'https://facebook.com/theovenpizzachichawatni',
            'instagram' => 'https://instagram.com/theovenpizzachichawatni',
            'tiktok'    => 'https://tiktok.com/@theovenpizzamianchannu',
        ),
    );
}

function oven_wa_link( $msg = "Hi! I'd like to place an order." ) {
    $b = oven_business();
    return 'https://wa.me/' . $b['whatsapp'] . '?text=' . rawurlencode( $msg );
}
function oven_tel_link() { $b = oven_business(); return 'tel:' . $b['phone_raw']; }

function oven_img( $file ) { return esc_url( get_template_directory_uri() . '/assets/images/' . $file ); }

function oven_categories() {
    return array( 'Signature Pizza', 'Stuffed Crust', 'Classic Pizza', 'Sandwiches', 'Burgers', 'Chicken', 'Sides', 'Drinks' );
}

function oven_menu_items() {
    return array(
        array( 'category'=>'Signature Pizza','name'=>'The Oven Special','desc'=>'Our house special — chicken, olives, mushrooms, bell peppers, creamy garlic sauce, mozzarella.','price'=>'Rs 1550 – 2150','img'=>'pizza-2.jpg','popular'=>true,'spice'=>2 ),
        array( 'category'=>'Signature Pizza','name'=>'Arabic Bite','desc'=>'Spiced chicken, onions, jalapeños, cheddar & mozzarella on a golden crust.','price'=>'Rs 1300 – 1800','img'=>'pizza-3.jpg','popular'=>true,'spice'=>3 ),
        array( 'category'=>'Signature Pizza','name'=>'Creamy Chicken Pizza','desc'=>'Grilled chicken bathed in creamy white sauce with olives and herbs.','price'=>'Rs 1400 – 1950','img'=>'pizza-2.jpg','popular'=>false,'spice'=>1 ),
        array( 'category'=>'Stuffed Crust','name'=>'Crown Crust Supreme','desc'=>'A crown of cheese-stuffed edges around a fully-loaded chicken tikka centre.','price'=>'Rs 1650 – 2250','img'=>'pizza-3.jpg','popular'=>true,'spice'=>2 ),
        array( 'category'=>'Stuffed Crust','name'=>'Extreme Cheese Crust','desc'=>'Extra mozzarella baked into every bite of the crust. Cheese lovers only.','price'=>'Rs 1550 – 2100','img'=>'pizza-1.jpg','popular'=>false,'spice'=>1 ),
        array( 'category'=>'Classic Pizza','name'=>'Chicken Tikka','desc'=>'Marinated tikka chicken, onions, capsicum, tikka sauce, mozzarella.','price'=>'Rs 900 – 1600','img'=>'pizza-3.jpg','popular'=>false,'spice'=>3 ),
        array( 'category'=>'Classic Pizza','name'=>'Chicken Fajita','desc'=>'Fajita chicken with bell peppers, onions and a smoky tomato base.','price'=>'Rs 900 – 1600','img'=>'pizza-1.jpg','popular'=>false,'spice'=>2 ),
        array( 'category'=>'Classic Pizza','name'=>'Pepperoni Classic','desc'=>'Rich tomato base, thick pepperoni, molten mozzarella. A timeless favourite.','price'=>'Rs 950 – 1650','img'=>'pizza-1.jpg','popular'=>false,'spice'=>2 ),
        array( 'category'=>'Sandwiches','name'=>'Pan Sandwich','desc'=>'Grilled pan bread stuffed with cheesy chicken, served with crispy fries.','price'=>'Rs 550','img'=>'sandwich.jpg','popular'=>true,'spice'=>0 ),
        array( 'category'=>'Burgers','name'=>'Zinger Burger','desc'=>'Crispy zinger fillet, lettuce, mayo, cheese in a soft sesame bun.','price'=>'Rs 600','img'=>'burger.jpg','popular'=>true,'spice'=>2 ),
        array( 'category'=>'Burgers','name'=>'Reggy Burger','desc'=>'Signature reggy chicken patty with fresh veggies and house sauce.','price'=>'Rs 600','img'=>'burger.jpg','popular'=>false,'spice'=>0 ),
        array( 'category'=>'Chicken','name'=>'Chicken Wings','desc'=>'Golden roasted wings glazed with sesame and a squeeze of lemon.','price'=>'Rs 700','img'=>'wings.jpg','popular'=>true,'spice'=>3 ),
        array( 'category'=>'Chicken','name'=>'Chicken Shawarma (x2)','desc'=>'Two loaded chicken shawarma rolls with garlic sauce and fresh veg.','price'=>'Rs 400','img'=>'shawarma.jpg','popular'=>true,'spice'=>0 ),
        array( 'category'=>'Sides','name'=>'Golden Fries','desc'=>'Crispy hand-cut fries with our signature dip.','price'=>'Rs 250','img'=>'fries.jpg','popular'=>false,'spice'=>0 ),
        array( 'category'=>'Drinks','name'=>'Chilled Soft Drinks','desc'=>'Coke, Sprite, Fanta and more. Served ice-cold.','price'=>'Rs 80 – 200','img'=>'fries.jpg','popular'=>false,'spice'=>0 ),
    );
}

function oven_deals() {
    return array(
        array( 'title'=>'Small Pizza · Tikka / Fajita','price'=>'Rs 500','tag'=>'Deal 1','perks'=>array('Small Pizza','Fresh from the oven','Best for solo lunch'),'highlight'=>false ),
        array( 'title'=>'Medium Pizza · Tikka / Fajita','price'=>'Rs 800','tag'=>'Deal 2','perks'=>array('Medium Pizza','Serves 2 easily','Loaded toppings'),'highlight'=>true ),
        array( 'title'=>'Pan Sandwich Combo','price'=>'Rs 550','tag'=>'Deal 3','perks'=>array('Grilled Pan Sandwich','Crispy Fries','Chilled Drink option'),'highlight'=>false ),
        array( 'title'=>'Zinger / Reggy Burger','price'=>'Rs 600','tag'=>'Deal 4','perks'=>array('Signature Burger','Fries add-on ready','Fast service'),'highlight'=>false ),
        array( 'title'=>'2 Chicken Shawarma','price'=>'Rs 400','tag'=>'Deal 5','perks'=>array('Two full rolls','Loaded chicken','Garlic sauce'),'highlight'=>true ),
    );
}

/**
 * Inline SVG icons — Lucide-compatible shapes for parity with the React build.
 */
function oven_icon( $name, $cls = 'h-4 w-4' ) {
    $paths = array(
        'phone'      => '<path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"/>',
        'flame'      => '<path d="M8.5 14.5A2.5 2.5 0 0 0 11 12c0-1.38-.5-2-1-3-1.072-2.143-.224-4.054 2-6 .5 2.5 2 4.9 4 6.5 2 1.6 3 3.5 3 5.5a7 7 0 1 1-14 0c0-1.153.433-2.294 1-3a2.5 2.5 0 0 0 2.5 2.5z"/>',
        'clock'      => '<circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/>',
        'map-pin'    => '<path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"/><circle cx="12" cy="10" r="3"/>',
        'menu'       => '<line x1="4" x2="20" y1="12" y2="12"/><line x1="4" x2="20" y1="6" y2="6"/><line x1="4" x2="20" y1="18" y2="18"/>',
        'x'          => '<path d="M18 6 6 18"/><path d="m6 6 12 12"/>',
        'star'       => '<polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/>',
        'chevron-right'=> '<polyline points="9 18 15 12 9 6"/>',
        'chevron-down'=> '<polyline points="6 9 12 15 18 9"/>',
        'shield-check'=> '<path d="M20 13c0 5-3.5 7.5-7.66 8.95a1 1 0 0 1-.67-.01C7.5 20.5 4 18 4 13V6a1 1 0 0 1 1-1c2 0 4.5-1.2 6.24-2.72a1.17 1.17 0 0 1 1.52 0C14.51 3.81 17 5 19 5a1 1 0 0 1 1 1z"/><path d="m9 12 2 2 4-4"/>',
        'truck'      => '<path d="M14 18V6a2 2 0 0 0-2-2H4a2 2 0 0 0-2 2v11a1 1 0 0 0 1 1h2"/><path d="M15 18H9"/><path d="M19 18h2a1 1 0 0 0 1-1v-3.65a1 1 0 0 0-.22-.624l-3.48-4.35A1 1 0 0 0 17.52 8H14"/><circle cx="17" cy="18" r="2"/><circle cx="7" cy="18" r="2"/>',
        'award'      => '<circle cx="12" cy="8" r="6"/><path d="M15.477 12.89 17 22l-5-3-5 3 1.523-9.11"/>',
        'chef-hat'   => '<path d="M17 21a1 1 0 0 0 1-1v-5.35c0-.457.316-.844.727-1.041a4 4 0 0 0-2.134-7.589 5 5 0 0 0-9.186 0 4 4 0 0 0-2.134 7.588c.411.198.727.585.727 1.041V20a1 1 0 0 0 1 1z"/><path d="M6 17h12"/>',
        'plus'       => '<path d="M5 12h14"/><path d="M12 5v14"/>',
        'message-circle'=> '<path d="M7.9 20A9 9 0 1 0 4 16.1L2 22z"/>',
        'arrow-up'   => '<path d="m5 12 7-7 7 7"/><path d="M12 19V5"/>',
        'instagram'  => '<rect width="20" height="20" x="2" y="2" rx="5" ry="5"/><path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"/><line x1="17.5" x2="17.51" y1="6.5" y2="6.5"/>',
        'facebook'   => '<path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"/>',
        'mail'       => '<rect width="20" height="16" x="2" y="4" rx="2"/><path d="m22 7-8.97 5.7a1.94 1.94 0 0 1-2.06 0L2 7"/>',
        'heart'      => '<path d="M19 14c1.49-1.46 3-3.21 3-5.5A5.5 5.5 0 0 0 16.5 3c-1.76 0-3 .5-4.5 2-1.5-1.5-2.74-2-4.5-2A5.5 5.5 0 0 0 2 8.5c0 2.3 1.5 4.05 3 5.5l7 7Z"/>',
        'users'      => '<path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M22 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/>',
    );
    $svg = isset( $paths[ $name ] ) ? $paths[ $name ] : '';
    return '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="' . esc_attr( $cls ) . '" aria-hidden="true">' . $svg . '</svg>';
}
