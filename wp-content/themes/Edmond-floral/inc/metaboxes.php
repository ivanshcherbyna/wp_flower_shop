<?php

// INCLUDE THIS BEFORE you load your ReduxFramework object config file.


// You may replace $redux_opt_name with a string if you wish. If you do so, change loader.php
// as well as all the instances below.
$redux_opt_name = THEME_OPT;

if ( !function_exists( "redux_add_metaboxes" ) ):
	function redux_add_metaboxes($metaboxes) {

		$home_page_options[] = array(

				'title'		 	=> __('home page sector', 'mytheme' ),
				'icon_class'    => 'icon-large',
				'icon' 			=> 'el-icon-website',
				'fields'		=> array(

					array(
						'id' => 'section-start',
						'type' => 'section',
						'title' => __('Location Heading', 'mytheme'),
						'subtitle' => __('Place the text on the top of the main background', 'mytheme'),
						'indent' => true
					),
					array(
						'title' => __('Head text', 'mytheme'),
						'type' => 'editor',
						'id' =>'location-head-text',
						"default" => 'About Edmons Floral'
					),
					array(
						'title' => __('Location inner text', 'mytheme'),
						'type' => 'editor',
						'id' =>'location-head-inner-text',
						"default" => '31 central street | Wellesley, MA 02481	Mon - Sat : 9am - 6pm | sun: Closed'
					),
					array(
						'title' => __('Phone number', 'mytheme'),
						'type' => 'editor',
						'id' =>'location-phone-text',
						"default" => '(800) 457 - 4901'
					),
					array(
						'id'     => 'section-end',
						'type'   => 'section',
						'indent' => false,
					),
					array(
						'title' => __('Location text', 'mytheme'),
						'type' => 'editor',
						'id' =>'location-general-text',
						"default" => 'Located in the heart of downtown Wellesley, Our passionate florists and beautiful blooms make this flower shop burst with personality. while it may be
            small in size, every table is brimming with the makings for the perfects hostess gift or floral centerpiece for your table! Goergeous fresh Flower Arrangement,
            custom bouquest, signature candles, unique flowering plants, and a variety of vases and containers are artfully -curated and designed with attention to detail
            . You’ll adore exploring our gifts for every occasion, selecting holiday decor for your home, or arranging same-day flower delivery to Belmont, Dhedam , Dover
            Needham , sherborn waltham =, wellesley , and many more surrounding towns in greater Bostin'
					),
					array(
						'title' => __('Location background', 'mytheme'),
						'type' => 'background',
						'id' =>'location-background-img',
						'default' => '#a8a9ad'
					),

					array(
						'title' =>__('Background Uploader image', 'mytheme'),
						'subtitle' => 'Upload your background',
						'desc' => 'Background from head site Shop',
						'type' => 'media',
						'id' => 'background-homepage-img'
					),
					array(
						'title'=>__('Homepage images', 'mytheme' ),
						'id' => 'homepage-images',
						'type' => 'slides',
						'subtitle'    => __( 'Upload images with drag and drop sortings. In theme use 12 images.', 'mytheme' ),
						'desc'        => __( 'Add your image for use in homepage', 'mytheme' ),
						'placeholder' => array(
							'title'       => __( 'This is a title', 'mytheme' ),
							'description' => __( 'Description Here', 'mytheme' ),
							'url'         => __( 'Give us a link!', 'mytheme' ),
							)
						)
					)
				
			);
		$about_page_options[] = array(
			'title'		 	=> __('about page sector', 'mytheme' ),
			'icon_class'    => 'icon-large',
			'icon' 			=> 'el-icon-website',
			'fields'		=> array(
				array(
					'title' => __('About inner text on background', 'mytheme'),
					'type' => 'editor',
					'id' =>'inner-about-text',
					"default" => 'About Edmons Floral'
				),

				array(
					'title' =>__('Background Uploader image', 'mytheme'),
					'subtitle' => 'Upload your background',
					'desc' => 'Background from head site Shop',
					'type' => 'media',
					'id' => 'background-about-img'
				),
				array(
					'title'=>__('Meet Section images', 'mytheme' ),
					'id' => 'about-page-images-meet',
					'type' => 'slides',
					'subtitle'    => __( 'Upload images with drag and drop sortings.', 'mytheme' ),
					'desc'        => __( 'Add your image for use in to inks on meet', 'mytheme' ),
					'placeholder' => array(
						'title'       => __( 'This is a title', 'mytheme' ),
						'description' => __( 'Description Here', 'mytheme' ),
						'url'         => __( 'Give us a link!', 'mytheme' ),
					)
				)
			)

			
		);
        $policy_page_options[] = array(
            'title'		 	=> __('policy page sector', 'mytheme' ),
            'icon_class'    => 'icon-large',
            'icon' 			=> 'el-icon-website',
            'fields'		=> array(
                array(
                    'title' => __('Policy inner text on background', 'mytheme'),
                    'type' => 'editor',
                    'id' =>'inner-policy-text',
                    "default" => 'Privacy Policy'
                ),
                array(
                    'title' => __('About text', 'mytheme'),
                    'type' => 'editor',
                    'id' =>'policy-page-text',
                    "default" => '',
					'args'   => array(
						'wpautop'            => true,
					)
				),
                array(
                    'title' =>__('Background Uploader image', 'mytheme'),
                    'subtitle' => 'Upload your background',
                    'desc' => 'Background from head site Shop',
                    'type' => 'media',
                    'id' => 'background-policy-img'
                )
            )


        );
        $contact_page_options[] = array(
            'title'		 	=> __('contact page sector', 'mytheme' ),
            'icon_class'    => 'icon-large',
            'icon' 			=> 'el-icon-website',
            'fields'		=> array(
                array(
                    'title' => __('Contact head text on top', 'mytheme'),
                    'type' => 'editor',
                    'id' =>'contact-head-text',
                    'default' => 'Contact Edmon Flora Flower'
                ),
                array(
                    'title' => __('contact subhead text', 'mytheme'),
                    'type' => 'editor',
                    'id' =>'contact-subhead-text',
                    'default' => 'We’d love to hear from you'
                  )
                )
            );
        $retail_page_options[] = array(
            'title'		 	=> __('retail page sector', 'mytheme' ),
            'icon_class'    => 'icon-large',
            'icon' 			=> 'el-icon-website',
            'fields'		=> array(
                array(
                    'title' => __('Retail head text on background', 'mytheme'),
                    'type' => 'text',
                    'id' =>'inner-retail-text',
                    "default" => 'The Retail Experience'
                ),
                array(
                    'title' => __('Retail subhead text', 'mytheme'),
                    'type' => 'editor',
                    'id' =>'retail-subhead-text',
                    "default" => 'Shop The world of winston Flowers',

                ),
                array(
                    'title' =>__('Background Uploader image', 'mytheme'),
                    'subtitle' => 'Upload your background',
                    'desc' => 'Background from head page',
                    'type' => 'media',
                    'id' => 'background-retail-img'
                ),
                array(
                    'id'               => 'frontpage_sections',
                    'type'             => 'repeatable_list',
                    'accordion'      => true,
                    'title'            => __('Sections', 'mytheme'),
                    'add_button'     => __( 'Add Section'),
                    'remove_button'  => __( 'Delete Section'),
                    'fields'         => array(
                        array(
                            'id'       => 'ph_section_head',
                            'type'     => 'text',
                            'title'    => __('Section Head', 'mytheme'),
                        ),
                        array(
                            'id'       => 'ph_section_title',
                            'type'     => 'editor',
                            'title'    => __('Section Title', 'mytheme'),
                        ),
                        array(
                            'id'      => 'ph_section_image',
                            'type'    => 'media',
                            'title'   => __('Section Image','mytheme'),
                             ),
                        array(
                            'id'       => 'button-set-left-right',
                            'type'     => 'button_set',
                            'title'    => __('Check position', 'mytheme'),
                            'desc'     => __('left or right position text on page', 'redux-framework-demo'),
                            'multi'    => false,
                            'options' => array(
                                '1' => 'left',
                                '2' => 'right',
                                             ),
                            'default'=> '1'
                        )

                    )
                ),
                    array(
                        'title' => __('Retail descrition head text', 'mytheme'),
                        'type' => 'text',
                        'id' =>'retail-desc-head-text',
                        "default" => 'Our Flagship Locations',

                    ),
                    array(
                        'title' => __('Retail descrition left head text', 'mytheme'),
                        'type' => 'text',
                        'id' =>'retail-desc-head-left-text',
                        "default" => 'Back bay',

                    ),
                    array(
                        'title' => __('Retail descrition left text', 'mytheme'),
                        'type' => 'editor',
                        'id' =>'retail-desc-left-text',
                        "default" => 'Visit where it all began . Since maynard winston first wheeled his pushcart of 
                        flower down Boston’s fashionable newburry street in 1944, to the signature black storefront that 
                        is an icon of back bay today , winston flower continues the timeless tradition of providing the 
                        world best blooms to its clients',

                    ),
                    array(
                        'title' =>__('Retail description Background image left', 'mytheme'),
                        'subtitle' => 'Upload your background',
                        'desc' => 'Background from description on page',
                        'type' => 'media',
                        'id' => 'background-desc-left-img'
                    ),
                    array(
                        'title' => __('Retail descrition right head text', 'mytheme'),
                        'type' => 'text',
                        'id' =>'retail-desc-head-right-text',
                        "default" => 'Chestnut Hill, MA',

                    ),
                    array(
                        'title' => __('Retail descrition right text', 'mytheme'),
                        'type' => 'editor',
                        'id' =>'retail-desc-right-text',
                        "default" => 'Located in the heart of Chesnut Hill , our premier massachuseets locations is home to our 
                        Garden design center and green houses and offers a full range floral design services as well as indoor
                         and outdoor plants',

                    ),
                    array(
                        'title' =>__('Retail description Background image right', 'mytheme'),
                        'subtitle' => 'Upload your background',
                        'desc' => 'Background from description on page',
                        'type' => 'media',
                        'id' => 'background-desc-right-img'
                    ),

            )



        );
		$design_interior_page_options[] = array(
			'title'		 	=> __('design page sector', 'mytheme' ),
			'icon_class'    => 'icon-large',
			'icon' 			=> 'el-icon-website',
			'fields'		=> array(
				array(
					'title' => __('Design head text', 'mytheme'),
					'type' => 'text',
					'id' =>'design-head-text',
					"default" => 'Garden Design Interior'
				),
				array(
					'id'               => 'design_sections',
					'type'             => 'repeatable_list',
					'accordion'      => true,
					'title'           => __('Sections', 'mytheme'),
					'add_button'     => __( 'Add Section'),
					'remove_button'  => __( 'Delete Section'),
					'fields'         => array(
						array(
							'id'       => 'ph_design_section_head',
							'type'     => 'text',
							'title'    => __('Section Head', 'mytheme'),
						),
						array(
							'id'       => 'ph_design_section_title',
							'type'     => 'editor',
							'title'    => __('Section Title', 'mytheme'),
						),
						array(
							'id'      => 'ph_design_section_image',
							'type'    => 'media',
							'title'   => __('Section Image','mytheme'),
						),
						array(
							'id'       => 'design_button-set-left-right',
							'type'     => 'button_set',
							'title'    => __('Check position', 'mytheme'),
							'desc'     => __('left or right position text on page', 'mytheme'),
							'multi'    => false,
							'options' => array(
								'1' => 'left',
								'2' => 'right',
							),
							'default'=> '1'
						),

						array(
							'id'       => 'design_section_head_portfolio',
							'type'     => 'text',
							'title'    => __('Text Head Portfolio', 'mytheme'),
						),
						array(
							'id'=>'title-for-1-image',
							'type' => 'text',
							'title' => __('title for 1 image', 'mytheme'),
							'default' => ''
						),
						array(
							'id'=>'link-for-1-image',
							'type' => 'text',
							'title' => __('url for 1 image', 'mytheme'),
							'default' => ''
						),

						array(
							'id'      => 'ph_design-portfolio-image1',
							'type'    => 'media',
							'title'   => __('Section for [1] Image portfolio','mytheme'),
						),
						array(
							'id'=>'title-for-2-image',
							'type' => 'text',
							'title' => __('title for 2 image', 'mytheme'),
							'default' => ''
						),
						array(
							'id'=>'link-for-2-image',
							'type' => 'text',
							'title' => __('url for 2 image', 'mytheme'),
							'default' => ''
						),
						array(
							'id'      => 'ph_design-portfolio-image2',
							'type'    => 'media',
							'title'   => __('Section for [2] Image portfolio','mytheme'),
						),
						array(
							'id'=>'title-for-3-image',
							'type' => 'text',
							'title' => __('title for 3 image', 'mytheme'),
							'default' => ''
						),
						array(
							'id'=>'link-for-3-image',
							'type' => 'text',
							'title' => __('url for 3 image', 'mytheme'),
							'default' => ''
						),
						array(
							'id'      => 'ph_design-portfolio-image3',
							'type'    => 'media',
							'title'   => __('Section for [3] Image portfolio','mytheme'),
						),
						array(
							'id'=>'title-for-4-image',
							'type' => 'text',
							'title' => __('title for 4 image', 'mytheme'),
							'default' => ''
						),
						array(
							'id'=>'link-for-4-image',
							'type' => 'text',
							'title' => __('url for 4 image', 'mytheme'),
							'default' => ''
						),
						array(
							'id'      => 'ph_design-portfolio-image4',
							'type'    => 'media',
							'title'   => __('Section for [4] Image portfolio','mytheme'),
						),

					)
				)
			)
		);
		$flowering_plants_page_options[] = array(
			'title'		 	=> __('Flowering plants page sector', 'mytheme' ),
			'icon_class'    => 'icon-large',
			'icon' 			=> 'el-icon-website',
			'fields'		=> array(
				array(
					'title' => __('Flowering under slider image', 'mytheme'),
					'type' => 'media',
					'id' =>'slider-under-img',

				),
				array(
					'title'=>__('Section for text slider', 'mytheme' ),
					'id' => 'flowering-link-slides',
					'type' => 'slides',
					'subtitle'    => __( 'Upload title, description and some link for slider.', 'mytheme' ),
					'desc'        => __( 'Dont use image on this', 'mytheme' ),
					'placeholder' => array(
						'title'       => __( 'This is a title', 'mytheme' ),
						'description' => __( 'Description Here', 'mytheme' ),
						'url'         => __( 'Give us a link!', 'mytheme' ),
					)
				),

				array(
					'title'=>__('Section for first row images', 'mytheme' ),
					'id' => 'section-three-images',
					'type' => 'slides',
					'subtitle'    => __( 'Upload images with drag and drop sortings. In theme use 3 images.', 'mytheme' ),
					'desc'        => __( 'Add your image for use in page', 'mytheme' ),
					'placeholder' => array(
						'title'       => __( 'This is a title', 'mytheme' ),
						'description' => __( 'Description Here', 'mytheme' ),
						'url'         => __( 'Give us a link!', 'mytheme' ),
					)
				),
				array(
					'title'=>__('Section for second row images', 'mytheme' ),
					'id' => 'section-second-images',
					'type' => 'slides',
					'subtitle'    => __( 'Upload images with drag and drop sortings. In theme use 2 images.', 'mytheme' ),
					'desc'        => __( 'Add your image for use in page', 'mytheme' ),
					'placeholder' => array(
						'title'       => __( 'This is a title', 'mytheme' ),
						'description' => __( 'Description Here', 'mytheme' ),
						'url'         => __( 'Give us a link!', 'mytheme' ),
					)
				),
				array(
					'title' => __('Flowering buttom image', 'mytheme'),
					'type' => 'media',
					'id' =>'home-cat-img',
					
				),
				array(
					'title' => __('Flowering buttom head text', 'mytheme'),
					'type' => 'text',
					'id' =>'home-cat-heading',
					"default" => 'Holiday Flowers'
				),
				array(
					'title' => __('Flowering head text', 'mytheme'),
					'type' => 'editor',
					'id' =>'home-cat-text',
					"default" => '<p>A new holiday season means embracing a blank canvas—ready for new memories, fresh beauty,
                            and gifts to be cherished. Here at Winston Flowers, our designers draw inspiration from the
                            changing winter landscapes and the festivity of the season, channeling these passions into ou
                            r Holiday Collection.</p>
                        <p>Dive into delicious new color palettes of plum, sage, citrus and earth tones. You’ll still find
                            classic reds, greens, and burgundies—but with updated styling, novel textures and modern
                            flourish. We celebrate the return of alpine treasures like the lines of a dogwood branch
                            the energetic green of conifer, and delicate hellebore blooms peeking through the snow.
                            Awash with the fragrance of fresh hyacinth, exotic blossoms of Vanda orchids,
                            and the exceptional beauty of the amaryllis, we present seasonal floral indulgences you’ve come
                            to love and wouldn’t want to miss giving or receiving. Whether you’re honoring traditions
                            or starting something new this year, we make holiday entertaining effortless and help you
                            complete your gift list beautifully.</p>'
				),
			)
		);
		$metaboxes[] = array(

			'id'            => 'home_page_options',
			'title'         => __( 'Home Page Options', THEME_OPT ),
			'post_types'    => array( 'page' ),
			'page_template' => array('front-page.php','test.php'),
			'position'      => 'normal',
			'priority'      => 'high',
			'sidebar'       => true,
			'sections'      => $home_page_options,

		);
		$metaboxes[] = array(
			'id'            => 'about_page_options',
			'title'         => __( 'About Page Options', THEME_OPT ),
			'post_types'    => array( 'page' ),
			'page_template' => array('about.php'),
			'position'      => 'normal',
			'priority'      => 'high',
			'sidebar'       => true,
			'sections'      => $about_page_options,
		);
        $metaboxes[] = array(
            'id'            => 'policy_page_options',
            'title'         => __( 'Policy Page Options', THEME_OPT ),
            'post_types'    => array( 'page' ),
            'page_template' => array('policy.php'),
            'position'      => 'normal',
            'priority'      => 'high',
            'sidebar'       => true,
            'sections'      => $policy_page_options,
        );
        $metaboxes[] = array(
            'id'            => 'contact_page_options',
            'title'         => __( 'Contact Page Options', THEME_OPT ),
            'post_types'    => array( 'page' ),
            'page_template' => array('contact.php'),
            'position'      => 'normal',
            'priority'      => 'high',
            'sidebar'       => true,
          'sections'        =>  $contact_page_options,
        );
        $metaboxes[] = array(
            'id'            => 'retail_page_options',
            'title'         => __( 'Contact Page Options', THEME_OPT ),
            'post_types'    => array( 'page' ),
            'page_template' => array('retail.php'),
            'position'      => 'normal',
            'priority'      => 'high',
            'sidebar'       => true,
            'sections'        =>  $retail_page_options,
        );
		$metaboxes[] = array(
			'id'            => 'design_interior_page_options',
			'title'         => __( 'Design interior Options', THEME_OPT ),
			'post_types'    => array( 'page' ),
			'page_template' => array('design-interior.php'),
			'position'      => 'normal',
			'priority'      => 'high',
			'sidebar'       => true,
			'sections'        =>  $design_interior_page_options,
		);
		$metaboxes[] =array(
			'id'            => 'flowering_plants_page_options',
			'title'         => __( 'Flowering plants Options', THEME_OPT ),
			'post_types'    => array( 'page' ),
			'page_template' => array('flowering-plants.php'),
			'position'      => 'normal',
			'priority'      => 'high',
			'sidebar'       => true,
			'sections'        =>  $flowering_plants_page_options,
		);
		
	return $metaboxes;
  }
  add_action("redux/metaboxes/{$redux_opt_name}/boxes", 'redux_add_metaboxes');
endif;

