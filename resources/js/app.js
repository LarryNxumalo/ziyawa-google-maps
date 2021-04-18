
require('./bootstrap');

window.Vue = require('vue');
//Imports
import * as VueGoogleMaps from 'vue2-google-maps';
import VueGeolocation from 'vue-browser-geolocation';

//Components
Vue.component('info-card',
    require('./components/InfoCard.vue').default);

//Google Maps APIs
Vue.use(VueGeolocation)
Vue.use(VueGoogleMaps, {
    load: {
        key: 'API-KEY-HERE'
    }
});

//App
const app = new Vue({
    el: '#app',
    data() {
        return {
            locations: [],
            infoWindowOptions: {
                pixelOffset: {
                    width: 0,
                    height: -35
                }
            },
            activeLocation: {},
            infoWindowOpened: false,
            coordinates: {
                lat: 0,
                lng: 0
            },
        }
    },
    //API call for our locations object from the db:seed table
    created(){
        axios.get('/api/locations')
        .then((res) => this.locations = res.data)
        .catch((err) => console.log(err));
        //Browser api for current location coords
        this.$getLocation({})
            .then(coordinates => {
                this.coordinates = coordinates;
            })
            .catch(error => alert(alert))
    },
    methods: {
        getPosition(l){
            return {
                lat:parseFloat(l.latitude),
                lng:parseFloat(l.longitude)
            }
        },
        handleMarkerClicked(l){
            this.activeLocation = l;
            this.infoWindowOpened = true
        },
        handleInfoWindowClose(){
            this.activeLocation = {};
            this.infoWindowOpened = false
        },
        //when the map point is clicked using the lat and lng methods
        handleMapClick(e){
            this.locations.push({
                name: 'Placeholder',
                hours: "00:00pm - 00:00",
                city: "Orlando",
                state: 'FL',
                latitude: e.latLng.lat(),
                longitude: e.latLng.lng()
            });
            //from the click event add or push this object to api
            axios.post('api/locations/create',{
                latitude: e.latLng.lat(),
                longitude: e.latLng.lng
            })
        }

    },
    //Computed prop unlike data constantly evaluating return value that could change depending on other data points
    computed: {
        mapCenter() {
            if(!this.locations.length) {
                return {
                    lat: -25.9406434,
                    lng: 28.1028126
                }
            }
            // for each of the locations available
            // calculate center point for all of them
            // calculate medium point for all of them
            // get bounding box and zoom level based on largest/smallest values...

            return {
                lat: parseFloat(this.locations[0].latitude),
                lng: parseFloat(this.locations[0].longitude)
            }
        },
        //returning lat and lng generated from the position of the activeLocation
        infoWindowPosition() {
            return {
                lat: parseFloat(this.activeLocation.latitude),
                lng: parseFloat(this.activeLocation.longitude)
            }
        },
    }
});
