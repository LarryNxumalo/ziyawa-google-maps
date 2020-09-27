<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>iiiyed</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link href="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/css/bootstrap-combined.no-icons.min.css" rel="stylesheet">
        <link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet">
        <!-- Styles -->
        <style lang="scss">
            #app {
                overflow: hidden;
                -webkit-font-smoothing: antialiased;
                -moz-osx-font-smoothing: grayscale;
            }
            *, html, body {
                -webkit-font-smoothing: antialiased;
                -moz-osx-font-smoothing: grayscale;
                box-sizing: border-box;
                padding: 0;
                margin: 0;
                scroll-snap-type: y mandatory;
            }
            body {
                color: #fff;
                font-family: 'Nunito', sans-serif;
                height: 100vh;
                width: 100vw;
            }

            .main {
                background-color: #181818;
                display: flex;
                /* flex-direction: column; */
                transition: all ease-in-out .8s;
                height: 100vh;
                width: 100vw;
                position: relative;
            }

            .main.dark {
                background: #cfcfcf;
            }

            .nav-and-map {
                background-color: #181818;
                width: 100%;
                display: flex;
                flex-direction: column;
                transition: all ease-in-out .8s;
            }
            .nav-and-map.dark {
                background-color: #cfcfcf;
            }
            .vue-map-container {
                height: 90vh;
                width: 100%;
            }
            .left-cards {
                backdrop-filter: blur(6.6833px);
                width: 100%;
                height: 100vh;
                max-width: 350px;
                display: flex;
                flex-direction: column;
                align-items:center;
                padding: 8px;
                border-radius: 10px;
                overflow: scroll;
                position: relative;
                border-radius: 10px;
                z-index: 999999;
                scroll-snap-type: y mandatory;
                scroll-padding: 10%;
            }
            .info-window {
                color: #343434;
            }

            @media only screen
                and (min-device-width: 320px)
                and (max-device-width: 568px)
                and (-webkit-min-device-pixel-ratio: 2)
                and (orientation: portrait) {

                    .main {
                        display: flex;
                        flex-direction: column-reverse;
                        position: relative;
                    }
                    .cards-and-map {
                        height: 90vh;
                        display: flex;
                        flex-direction: column-reverse;
                    }
                    .left-cards {
                        position: absolute;
                        top: 50%;
                        left: 0;
                        padding-top: 20px;
                        width: 100%;
                        max-width: 100%;
                        height: 45vh;
                        border-radius: 10px;
                    }

                    .vue-map-container {
                        height: 90vh;
                        width: 100%;
                    }
            }

        </style>
    </head>
    <body>
        <div class="content" id="app">
            <main class="main" :class="{ dark: isDark }">
                <!--nav-->
                <div class="left-cards">
                    <info-card
                        v-for="(l, index) in locations"
                        :key="l.id"
                        :l="l"
                        :position="getPosition(l)"
                        @info="handleMarkerClicked(l)"
                        >
                    </info-card>
                </div>
                <!--left-cards-->
                <div class="nav-and-map" :class="{ dark: isDark }">
                    <nav-bar @darkbg="toggleDarkMode">
                    </nav-bar>
                    <!--map with locatins goes here-->
                    <gmap-map
                        :zoom="17"
                        :center="mapCenter"
                        @click="handleMapClick">
                        <gmap-info-window
                            :options="infoWindowOptions"
                            :position="infoWindowPosition"
                            :opened="infoWindowOpened"
                            @closeclick="handleInfoWindowClose">

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
                    </gmap-map><!--end google map-->
                </div><!--end.cards-and-map-->
            </main><!--end.main-->
        </div><!--end.content-->
        <!--script call to main app.js file -->
        <script src="{{ mix('js/app.js') }}"></script>
    </body>
</html>
