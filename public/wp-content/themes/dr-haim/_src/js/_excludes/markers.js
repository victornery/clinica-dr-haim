/*=========================================================================================
// OPEN FUNCTION
=========================================================================================*/
jQuery(function($) {

/*=========================================================================================
// PREENCHE O MAPA
=========================================================================================*/

$(document).ready(function () {
    //RENDER MAP
    function render_map($el) {
        // Var
        var $markers = $el.find('.item_mapa');

        // Vars
        var args = {    
            zoom: 12,
            //center: latlng,
            mapTypeId: google.maps.MapTypeId.ROADMAP,
            mapTypeControl: true,
        };  

        // Create map               
        var map = new google.maps.Map($el[0], args);
        // google.maps.event.addListener(map, 'click', function (event) {
        //   addMarker(event.latLng, "InfoWindow index #" + infowindows.length);
        // });

        // Add a markers reference
        map.markers = [];

        // Add markers
        $markers.each(function () {
            add_marker($(this), map);
        });

        // Center map
        center_map(map);        
        return map;
    }

    
    //MARKERS
    infowindows = new Array();
    function add_marker($marker, map) {
        var latlng = new google.maps.LatLng($marker.attr('data-lat'), $marker.attr('data-long'));
        var icon = null;       
        icon = $marker.attr('data-icone');
        
        var marker = new google.maps.Marker({
            icon: icon,
            position: latlng,
            map: map,
        });

        var infowindow = new google.maps.InfoWindow();
        infowindows.push(infowindow);

        //GERA ARRAY
        map.markers.push(marker);

        //CLICK MARKER (ABRE MODAL)
        google.maps.event.addListener(marker, 'click', function() {
                closeInfoWindows();
                var id   = $marker.attr("data-id");
                var info = $marker.attr("data-info");
                var link = $marker.attr("data-link");
                var InfoWindowContent = '<div id="content">'+
                        '<div id="bodyContent">'+
                            ''+info+''+
                            '<p><a href="'+link+'">Saiba Mais</a></p>'+
                        '</div>'+
                        '</div>';
                //Open new window 
                infowindow.setContent(InfoWindowContent);
                infowindow.open(map, marker);
                //showAddress(id);

        });
    }
    //FECHA INFOWINDOS
    function closeInfoWindows() {
        for (var i = 0; i < infowindows.length; i++) {
          infowindows[i].close();
        }
      }

    //CENTER (BOUND)
    function center_map(map) {
        var bounds = new google.maps.LatLngBounds();

        // Loop through all markers and create bounds
        $.each(map.markers, function (i, marker) {
            var latlng = new google.maps.LatLng(marker.position.lat(), marker.position.lng());
            bounds.extend(latlng);
            map.setZoom(12);
        });

        if (bounds.getNorthEast().equals(bounds.getSouthWest())) {
           var extendPoint = new google.maps.LatLng(bounds.getNorthEast().lat() + 0.01, bounds.getNorthEast().lng() + 0.01);
           bounds.extend(extendPoint);
        }

        map.fitBounds(bounds);
    }

    
    // FILTRO
    $(document).ready(function () {
        var map = null;

        $('#map').each(function () {
            map = render_map($(this));
        });

        // Filtering links click handler, it uses the filtering values (data-filterby and data-filtervalue)
        // to filter the markers based on the filter (custom) property set when the marker is created.
        $(document).on('click', '.filters a', function (event) {
            event.preventDefault();

            var $target = $(event.target);
            var id      = $target.data('filtervalue');
            var palco   = $('#map');
            var url     = $('.topo__logo a').attr('href');

            $('.ativo').attr('class', 'inativo');
            $target.attr('class','ativo');

            function get_markers(id) {       
                $.ajax({
                    url: url+"/wp-admin/admin-ajax.php",
                    type:'POST',
                    data: "action=markers&id="+ id, 
                    beforeSend: function() {
                        $('.map_mask').fadeIn(500);
                    },
                    success: function(html){
                        // console.log(html);
                        palco.html(html);
                        $('#map').each(function () {
                            map = render_map($(this));
                        });
                        $('.map_mask').fadeOut(800);

                    }
                });
                return false;
            }

            get_markers(id);
            console.log(id);
        });
    });
});

/*=========================================================================================
// CLOSE FUNCTION
=========================================================================================*/

});