<?php
/**
 * Template Name: Contacts-Template
 **/
get_header(); ?>
    <div class="single-header" style="background-image: url('<?php echo get_template_directory_uri();?>/assets/images/photo.jpg')">
        <div class="single-header__block">
            <span class="number-line">01</span>
            <h3><?php the_title();?></h3>
        </div>
    </div>
    <div class="container contact-container">
        <div class="contact-page">
            <div class="contacts-info">
                <div class="contacts-info__block">
                    <div class="icons">
                        <div class="icon">
                            <span class="icon-telephone"></span>
                        </div>
                    </div>
                    <a href="tel:<?php the_field('phone');?>"><?php the_field('phone');?></a>
                </div>
                <div class="contacts-info__block">
                    <div class="icons">
                        <div class="icon">
                            <span class="icon-close-envelope"></span>
                        </div>
                    </div>
                    <a href="mailto:<?php the_field('mail');?>"><?php the_field('mail');?></a>
                </div>
                <div class="contacts-info__block">
                    <div class="icons">
                        <div class="icon place active">
                            <a href="javascript:map.setCenter(marker.getPosition());" data-name="office"><span class="icon-pin"></span></a>
                        </div>
                        <div class="icon bus">
                            <a href="javascript:map.setCenter(marker2.getPosition());" data-name="bus"><span class="icon-bus"></span></a>
                        </div>
                    </div>
                    <?php the_field('address');?>
                </div>
            </div>
            <div class="contacts-map">
                <?php
                $location = get_field('map');
                if( !empty($location) ):
                    ?>
                    <div class="acf-map" id="acf-map">
                        <div class="marker" id="office-location" data-lat="<?php echo $location['lat']; ?>" data-lng="<?php echo $location['lng']; ?>"></div>
                    </div>
                <?php endif;
                $location2 = get_field('map2');
                if( !empty($location2) ):
                ?>
                <input id="bus-location" data-bus-lat="<?php echo $location2['lat']; ?>" data-bus-lng="<?php echo $location2['lng']; ?>" hidden>
                <?php endif; ?>
            </div>
        </div>
        <div class="contact-form">
            <span class="number-line">02</span>
            <h3><?php _e('Contact us','tino') ?></h3>
            <?php
            $posts = get_field('form');
            if( $posts ):
                $cf7_id= $posts->ID;
            echo do_shortcode( '[contact-form-7 id="'.$cf7_id.'" ]' );
            endif; ?>
        </div>
    </div>


<?php get_footer(); ?>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDTvL7Pzl7b6WUhtOZQiQg_tM-Zdp1PXrg"></script>
<script type="text/javascript">
    var map;
    function initialize() {
        var mapOptionsWatertemp = {
            zoom		: 14,
            center:     new google.maps.LatLng($("#office-location").attr('data-lat'), $("#office-location").attr('data-lng')),
            mapTypeId	: google.maps.MapTypeId.ROADMAP,
            styles      :[
                {
                    "featureType": "administrative",
                    "elementType": "labels.text.fill",
                    "stylers": [
                        {
                            "color": "#444444"
                        }
                    ]
                },
                {
                    "featureType": "landscape",
                    "elementType": "all",
                    "stylers": [
                        {
                            "color": "#f2f2f2"
                        }
                    ]
                },
                {
                    "featureType": "poi",
                    "elementType": "all",
                    "stylers": [
                        {
                            "visibility": "off"
                        }
                    ]
                },
                {
                    "featureType": "road",
                    "elementType": "all",
                    "stylers": [
                        {
                            "saturation": -100
                        },
                        {
                            "lightness": 45
                        }
                    ]
                },
                {
                    "featureType": "road.highway",
                    "elementType": "all",
                    "stylers": [
                        {
                            "visibility": "simplified"
                        }
                    ]
                },
                {
                    "featureType": "road.arterial",
                    "elementType": "labels.icon",
                    "stylers": [
                        {
                            "visibility": "off"
                        }
                    ]
                },
                {
                    "featureType": "transit",
                    "elementType": "all",
                    "stylers": [
                        {
                            "visibility": "off"
                        }
                    ]
                },
                {
                    "featureType": "water",
                    "elementType": "all",
                    "stylers": [
                        {
                            "color": "#b6dae0"
                        },
                        {
                            "visibility": "on"
                        }
                    ]
                }
            ]
        }

        var latlng = new google.maps.LatLng( $("#office-location").attr('data-lat'), $("#office-location").attr('data-lng') );
        var buslatlng = new google.maps.LatLng( $("#bus-location").attr('data-bus-lat'), $("#bus-location").attr('data-bus-lng') );

        map = new google.maps.Map(document.getElementById('acf-map'), mapOptionsWatertemp);

        marker = new google.maps.Marker( {position: latlng, map: map,icon : '<?php echo get_template_directory_uri();?>/assets/images/Aventin_map.svg'} );
        marker2 = new google.maps.Marker( {position: buslatlng, map: map,icon : '<?php echo get_template_directory_uri();?>/assets/images/Aventin_map.svg'} );

    }

    google.maps.event.addDomListener(window,'load',initialize);

</script>
