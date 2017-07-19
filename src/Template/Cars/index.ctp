<script async defer
   src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDpUbAd2JvguzuzhNxeRlNvc2mEaeklTQg&callback=initMap">
</script>
<style>
   #map {
    height: 950px;
    width: 100%;
   }
</style>
   <div id="map"></div>


<script>
    //<!-- Map Code -->
    function initMap() {
       var uluru = {lat: 22.2499844, lng: 73.1888481};
       var map = new google.maps.Map(document.getElementById('map'), {
         zoom: 11,
         center: uluru
       });
       var marker = new google.maps.Marker({
         position: uluru,
         map: map
       });
     }
</script>



<script>
    //Pusher Code
    // Enable pusher logging - don't include this in production
    Pusher.logToConsole = true;

    var pusher = new Pusher('cdce5e2fc7aacb7ec5b0', {
      cluster: 'ap2',
      encrypted: true
    });

    var channel = pusher.subscribe('cars');
    channel.bind('location', function(data) {
        console.log("My EVENT: ", data.message);
      alert(data.message);
    });
  </script>
