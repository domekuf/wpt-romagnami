<?php
get_header();
?>
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-light fixed-top py-3" id="mainNav">
            <div class="container">
                <a class="navbar-brand js-scroll-trigger text-uppercase" href="#page-top"><?php bloginfo('name'); ?></a>
                <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <?php
                wp_nav_menu(
                    array(
                        'container_class' => 'collapse navbar-collapse',
                        'container_id' => 'navbarResponsive',
                        'menu_class' => 'navbar-nav ml-auto my-2 my-lg-0 text-uppercase',
                        'theme_location' => 'main',
                        'walker' => new RmgWalkerMainMenu()
                    )
                );
                class RmgWalkerMainMenu extends Walker_Nav_Menu {
                    function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
                        global $wp_query;
                        $indent = ( $depth > 0 ? str_repeat( "    ", $depth ) : '' ); // code indent
                        // Depth-dependent classes.
                        $depth_classes = array(
                            ( $depth == 0 ? 'main-menu-item' : 'sub-menu-item' ),
                            ( $depth >=2 ? 'sub-sub-menu-item' : '' ),
                            ( $depth % 2 ? 'menu-item-odd' : 'menu-item-even' ),
                            'menu-item-depth-' . $depth
                        );
                        $depth_class_names = esc_attr( implode( ' ', $depth_classes ) );
                        // Passed classes.
                        $classes = empty( $item->classes ) ? array() : (array) $item->classes;
                        $class_names = esc_attr( implode( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item ) ) );
                        // Build HTML.
                        $output .= $indent . '<li id="nav-menu-item-'. $item->ID . '" class="nav-item ' . $depth_class_names . ' ' . $class_names . '">';
                        // Link attributes.
                        $attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
                        $attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
                        $attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';
                        $attributes .= ! empty( $item->ID )         ? ' href="#pg'. esc_attr( $item->ID         ) .'"' : '';
                        $attributes .= ' class="nav-link js-scroll-trigger menu-link ' . ( $depth > 0 ? 'sub-menu-link' : 'main-menu-link' ) . '"';
                        $aclass = 'class="nav-link js-scroll-trigger"';
                        $ahref = 'href="#page-'.$item->ID.'"';
                        $item_output = sprintf( '%1$s<a%2$s>%3$s%4$s%5$s</a>%6$s',
                            $args->before,
                            $attributes,
                            $args->link_before,
                            apply_filters( 'the_title', $item->title, $item->ID ),
                            $args->link_after,
                            $args->after
                        );
                        $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
                    }
                }
                ?>
            </div>
        </nav>
        <!-- Masthead-->
        <header class="masthead">
            <div class="container h-100">
                <div class="row h-100 align-items-center justify-content-center text-center">
                    <div class="col-lg-10 align-self-end">
                        <h1 class="text-uppercase text-white font-weight-bold"><?php bloginfo('name'); ?></h1>
                        <hr class="divider my-4" />
                    </div>
                    <div class="col-lg-8 align-self-baseline">
                        <p class="text-white-75 font-weight-light mb-5">
                            <?php bloginfo('description'); ?>
                        </p>
                        <a class="btn btn-primary btn-xl js-scroll-trigger" href="#about">Find Out More</a>
                    </div>
                </div>
            </div>
        </header>
        <!-- About-->
        <section class="page-section bg-primary" id="about">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-8 text-center">
                        <h2 class="text-white mt-0">We've got what you need!</h2>
                        <hr class="divider light my-4" />
                        <p class="text-white-50 mb-4">Start Bootstrap has everything you need to get your new website up and running in no time! Choose one of our open source, free to download, and easy to use themes! No strings attached!</p>
                        <a class="btn btn-light btn-xl js-scroll-trigger" href="#services">Get Started!</a>
                    </div>
                </div>
            </div>
        </section>
        <!-- Services-->
        <section class="page-section" id="services">
            <div class="container">
                <h2 class="text-center mt-0">At Your Service</h2>
                <hr class="divider my-4" />
                <div class="row">
                    <div class="col-lg-3 col-md-6 text-center">
                        <div class="mt-5">
                            <i class="fas fa-4x fa-gem text-primary mb-4"></i>
                            <h3 class="h4 mb-2">Sturdy Themes</h3>
                            <p class="text-muted mb-0">Our themes are updated regularly to keep them bug free!</p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 text-center">
                        <div class="mt-5">
                            <i class="fas fa-4x fa-laptop-code text-primary mb-4"></i>
                            <h3 class="h4 mb-2">Up to Date</h3>
                            <p class="text-muted mb-0">All dependencies are kept current to keep things fresh.</p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 text-center">
                        <div class="mt-5">
                            <i class="fas fa-4x fa-globe text-primary mb-4"></i>
                            <h3 class="h4 mb-2">Ready to Publish</h3>
                            <p class="text-muted mb-0">You can use this design as is, or you can make changes!</p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 text-center">
                        <div class="mt-5">
                            <i class="fas fa-4x fa-heart text-primary mb-4"></i>
                            <h3 class="h4 mb-2">Made with Love</h3>
                            <p class="text-muted mb-0">Is it really open source if it's not made with love?</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Portfolio-->
        <div id="portfolio">
            <div class="container-fluid p-0">
                <div class="row no-gutters">
                        <?php
                        $i = 0;
                        while ( have_posts() ) {
                            the_post();
                            $i ++;
                        ?>
                        <div class="col-lg-4 col-sm-6">
                            <a class="portfolio-box" href="<?=get_template_directory_uri()?>/assets/img/portfolio/fullsize/1.jpg">
                                <img class="img-fluid" src="<?=get_template_directory_uri()?>/assets/img/portfolio/thumbnails/1.jpg" alt="" />
                                <div class="portfolio-box-caption">
                                    <div class="project-category text-white-50"><?=the_title()?></div>
                                    <div class="project-name"><?=the_excerpt()?></div>
                                </div>
                            </a>
                        </div>
                        <?php
                        }
                        while ($i % 3 != 0) {
                            $i++
                        ?>
                        <div class="col-lg-4 col-sm-6">
                            <a class="portfolio-box" href="<?=get_template_directory_uri()?>/assets/img/portfolio/fullsize/1.jpg">
                                <img class="img-fluid" src="<?=get_template_directory_uri()?>/assets/img/portfolio/thumbnails/1.jpg" alt="" />
                                <div class="portfolio-box-caption">
                                    <div class="project-category text-white-50">placeholder</div>
                                    <div class="project-name">boh</div>
                                </div>
                            </a>
                        </div>
                        <?php
                        }
                        ?>
                    <div class="col-lg-4 col-sm-6">
                        <a class="portfolio-box" href="<?=get_template_directory_uri()?>/assets/img/portfolio/fullsize/2.jpg">
                            <img class="img-fluid" src="<?=get_template_directory_uri()?>/assets/img/portfolio/thumbnails/2.jpg" alt="" />
                            <div class="portfolio-box-caption">
                                <div class="project-category text-white-50">Category</div>
                                <div class="project-name">Project Name</div>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-4 col-sm-6">
                        <a class="portfolio-box" href="<?=get_template_directory_uri()?>/assets/img/portfolio/fullsize/3.jpg">
                            <img class="img-fluid" src="<?=get_template_directory_uri()?>/assets/img/portfolio/thumbnails/3.jpg" alt="" />
                            <div class="portfolio-box-caption">
                                <div class="project-category text-white-50">Category</div>
                                <div class="project-name">Project Name</div>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-4 col-sm-6">
                        <a class="portfolio-box" href="<?=get_template_directory_uri()?>/assets/img/portfolio/fullsize/4.jpg">
                            <img class="img-fluid" src="<?=get_template_directory_uri()?>/assets/img/portfolio/thumbnails/4.jpg" alt="" />
                            <div class="portfolio-box-caption">
                                <div class="project-category text-white-50">Category</div>
                                <div class="project-name">Project Name</div>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-4 col-sm-6">
                        <a class="portfolio-box" href="<?=get_template_directory_uri()?>/assets/img/portfolio/fullsize/5.jpg">
                            <img class="img-fluid" src="<?=get_template_directory_uri()?>/assets/img/portfolio/thumbnails/5.jpg" alt="" />
                            <div class="portfolio-box-caption">
                                <div class="project-category text-white-50">Category</div>
                                <div class="project-name">Project Name</div>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-4 col-sm-6">
                        <a class="portfolio-box" href="<?=get_template_directory_uri()?>/assets/img/portfolio/fullsize/6.jpg">
                            <img class="img-fluid" src="<?=get_template_directory_uri()?>/assets/img/portfolio/thumbnails/6.jpg" alt="" />
                            <div class="portfolio-box-caption p-3">
                                <div class="project-category text-white-50">Category</div>
                                <div class="project-name">Project Name</div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Call to action-->
        <section class="page-section bg-dark text-white">
            <div class="container text-center">
                <h2 class="mb-4">Free Download at Start Bootstrap!</h2>
                <a class="btn btn-light btn-xl" href="https://startbootstrap.com/themes/creative/">Download Now!</a>
            </div>
        </section>
        <!-- Contact-->
        <section class="page-section" id="contact">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-8 text-center">
                        <h2 class="mt-0">Let's Get In Touch!</h2>
                        <hr class="divider my-4" />
                        <p class="text-muted mb-5">Ready to start your next project with us? Give us a call or send us an email and we will get back to you as soon as possible!</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4 ml-auto text-center mb-5 mb-lg-0">
                        <i class="fas fa-phone fa-3x mb-3 text-muted"></i>
                        <div>+1 (555) 123-4567</div>
                    </div>
                    <div class="col-lg-4 mr-auto text-center">
                        <i class="fas fa-envelope fa-3x mb-3 text-muted"></i>
                        <!-- Make sure to change the email address in BOTH the anchor text and the link target below!-->
                        <a class="d-block" href="mailto:contact@yourwebsite.com">contact@yourwebsite.com</a>
                    </div>
                </div>
            </div>
        </section>
<?php
get_footer();
