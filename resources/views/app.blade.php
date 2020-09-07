<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Ziyawa Google Maps</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <!-- Styles -->
        <style lang="scss">
            #app {
                display: flex;
                flex-direction: column;
            }
            html, body {
                background-color: #181818;
                color: #fff;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: .5rem .5rem;
                overflow: hidden;
            }
            .map-main {
                display: flex;
                justify-content: space-around;
            }
            .left-cards {
                width: 40%;
                display: flex;
                flex-direction: column;
                align-items:center;
                background: #343434;
                padding: 10px;
                border-radius: 10px;
                overflow: unset;
            }

            .info-window{
                color: #181818;
            }

        </style>
    </head>
    <body>
        <div class="content" id="app">
            <h2>Ziyawa</h2>
            <main class="map-main">
                <!--left-cards-->
                <div class="left-cards">
                    <info-card
                        v-for="(l, index) in locations"
                        :key="l.id"
                        :l="l"
                        :position="getPosition(l)"
                        >
                    </info-card>
                </div>
                <!--map with locatins goes here-->
                <gmap-map
                    :zoom="17"
                    :center="mapCenter"
                    style="width: 60%; height: 900px; z-index: 1;"
                    @click="handleMapClick">
                    <gmap-info-window
                        :options="infoWindowOptions"
                        :position="infoWindowPosition"
                        :opened="infoWindowOpened">
                        @closeclick="handleInfoWindowClose"
                        <div class="info-window">
                            <h3 v-text="activeLocation.name"></h3>
                            <h5 v-text="activeLocation.hours"></h5>
                            <p v-text="activeLocation.address"></p>
                            <p v-text="activeLocation.city + ',' + activeLocation.state"></p>
                            <a href="https://maps.google.com/maps?ll=-25.9257,28.1061&z=15&t=m&hl=en-GB&gl=US&mapclient=apiv3&cid=1888497041884224849" target="__blank">show on G-maps</a>
                        </div>
                    </gmap-info-window>
                    <gmap-marker
                        v-for="(l, index) in locations"
                        :key="l.id"
                        :position="getPosition(l)"
                        :clickable="true"
                        :draggable="false"
                        @click="handleMarkerClicked(l)">
                    </gmap-marker>
                </gmap-map>
            </main><!--end.map-main-->
        </div><!--end.content-->
        <!--script call to main app.js file -->
        <script src="{{ mix('js/app.js') }}"></script>
    </body>
</html>
