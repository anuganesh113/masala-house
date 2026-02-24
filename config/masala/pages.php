<?php

use App\Enums\Status;

return [
    'about' => [
        'name' => 'About',
        'template' => 'about',
        'image_one' => 'about-us.png',
        'excerpt' => '',
        'description' => "<p>Masala House was founded in 2015 by Chef Raj Sharma with a simple mission: to bring the authentic flavors of India to Concord, California. Born and raised in Delhi, Chef Raj learned the art of Indian cooking from his grandmother, who taught him the importance of freshly ground spices and traditional cooking techniques.</p>
                        <p>After moving to the United States and working in several renowned restaurants, Chef Raj decided to open Masala House to share his culinary heritage with the community. What started as a small family-run restaurant has now grown into a beloved dining destination known for its authentic flavors and warm hospitality.</p>
                        <p>At Masala House, we believe that food is more than just sustenance—it's a way to connect with culture, create memories, and bring people together. Every dish we serve is prepared with love, using time-honored recipes and the finest ingredients.</p>",
        'status' => Status::ACTIVE,
    ],
    'welcome_to_masala' => [
        'name' => 'Welcome To Masalahouse',
        'slug' => 'welcome-to-masala',
        'title' => 'Delicious Food, Friendly Staff, Cozy Atmosphere & Positive Emotions!',
        'image_one' => 'welcome-1.png',
        'image_two' => 'welcome-2.png',
    ],
    'our_story' => [
        'name' => 'Our Story',
        'slug' => 'our-story',
        'image_one' => 'welcome-1.png',
        'description' => "<p>Masala House was founded in 2015 by Chef Raj Sharma with a simple mission: to bring the authentic flavors of India to Concord, California. Born and raised in Delhi, Chef Raj
                        learned the art of Indian cooking from his grandmother, who taught him the importance of freshly ground spices and traditional cooking techniques.
                        After moving to the United States and working in several renowned restaurants, Chef Raj decided to open Masala House to share his culinary heritage with the community. What started
                        as a small family-run restaurant has now grown into a beloved dining destination known for its authentic flavors and warm hospitality.
                        At Masala House, we believe that food is more than just sustenance—it's a way to connect with culture, create memories, and bring people together. Every dish we serve is prepared with love, using time-honored recipes and the finest ingredients.</p>"
    ],
    'experience' => [
        'name' => 'Dining Experiences',
        'slug' => 'dining-experiences',
        'image_one' => 'dining-experience.png',
        'description' => "<p>Step into the world of Hyderabadi cuisine, where every dish carries the
                            legacy of centuries-old royal kitchens. Famous for its aromatic Biryani, slow-cooked over fragrant basmati rice with tender meats or vegetables,
                            Hyderabad’s culinary tradition also boasts a variety of kebabs, haleem, and rich Mughlai curries. The use of exotic spices, saffron, and dried fruits
                            creates layers of flavor that are both bold and delicate, offering a dining experience fit for royalty.</p>
                        <p>Beyond Biryani, Hyderabadi cuisine is a celebration of culinary artistry and heritage, with recipes passed down through generations. Each dish is
                            prepared with meticulous care, whether it’s a simple lentil curry or a lavish feast, promising a memorable taste of India’s historic Deccan region.
                            The cuisine invites you to savor not just food but the rich culture and tradition behind every bite.</p>"
    ],
    'menu' => [
        'name' => 'Menu',
        'template' => 'menu',
        'status' => Status::ACTIVE,
    ],
    'catering' => [
        'name' => 'Catering',
        'template' => 'catering',
        'status' => Status::ACTIVE,
    ],
    'gallery' => [
        'name' => 'Gallery',
        'template' => 'galleries',
    ],
    'blogs' => [
        'name' => 'Blogs',
        'title' => 'Latest News & Insights',
        'template' => 'blogs',
        'status' => Status::ACTIVE,
    ],
    'services' => [
        'name' => 'Our Services',
        'slug' => 'services',
        'title' => 'Why Choose Our Concord Catering Services',
        'excerpt' => 'Experience the best of Indian and Nepali catering with Masala House in Concord, CA',
        'template' => 'services',
    ],
    'contact' => [
        'name' => 'Contact',
        'template' => 'contact',
        'status' => Status::ACTIVE,
    ],
    'faqs' => [
        'name' => 'FAQs',
        'template' => 'faqs',
    ],
    'testimonials' => [
        'name' => 'Testimonials',
        'title' => 'What Our Guests Say',
        'excerpt' => '<p>Don\'t just take our word for it - hear what our valued customers have to say about their dining experiences</p>',
    ],
    'our_team' => [
        'name' => 'Our Team',
        'title' => 'Meet Our Team',
        'slug' => 'our-team',
        'excerpt' => "The passionate individuals behind Masala House's culinary excellence",
    ],
    'our_mission_vision' => [
        'name' => 'Our Mission & Vision',
        'slug' => 'our-mission-vision',
    ],
    'our_mission' => [
        'name' => 'Our Mission',
    ],
    'our_vision' => [
        'name' => 'Our Vision',
    ],
    'terms' => [
        'name' => 'Terms & Conditions',
        'title' => 'Terms And Conditions',
        'slug' => 'terms-conditions',
    ],
    'policy' => [
        'name' => 'Privacy Policy',
        'slug' => 'privacy-policy',
    ],
    'wonderful_dining' => [
        'name' => 'Wonderful Dining Experience & Indian Food',
        'slug' => 'wonderful-dining',
        'excerpt' => '<p>Lorem ipsum dolor sit amet consectetur adipiscing elit do eiusmod tempor incididunt ut labore et dolore magna minim veniam nostrud exercitation consectetur adipiscing elit do eiusmod tempor incididunt ut labore.</p>',
        'image_one' => 'wonderful-dining.png',
    ],
];
