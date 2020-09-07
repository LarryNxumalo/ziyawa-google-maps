<template>
        <!-- <div class="panel-header"> -->
            <!-- Your current location<br> -->
            <!-- These are your coordinates -->
            <!-- <p>{{coordinates.lat}} Latitude, {{coordinates.lng}} Longitude</p> -->
        <!-- </div> -->
        <div class="card" @click="activeCard()">
            <div class="ellipse"><p>{{ l.state }}</p></div>
            <div class="left">
                <h2>{{ l.name }}</h2>
                <h3>{{ l.address}}</h3>
                <h3>{{ l.city}}</h3>
            </div>
            <div class="right">
                hours - {{ l.hours }}<br>
                <p>{{position.lat}} Latitude, {{position.lng}} Longitude</p>
            </div>
        </div>
</template>

<script>

    export default {
        props: ['l', 'position'],
        data(){
            return {
            }
        },
        methods: {
           activeCard(){
               this.$emit('activate-location')
           }
        }
    }
</script>

<style scoped lang="scss">

        .card {
            width: 100%;
            max-width: 700px;
            border: 2px solid #fec92d;
            border-radius: 10px;
            padding: 20px;
            margin-bottom: 15px;
            display: flex;
            justify-content: space-between;
            transition: all ease-in-out .2s;
            position: relative;
            z-index: 1;
            cursor: pointer;


            &:hover {
                background-color: #fec92d;
                border: none;
                color: #343434;
                box-shadow: 0rem 0rem 1rem rgba(254, 201, 45, .6);
                // animation: pulseOut .8s ease-out infinite alternate;
                .ellipse{
                    opacity: 1;
                    border: none;
                    background: #343434;
                    animation: pulse 1s ease-in-out infinite alternate;
                    transition: all ease-in-out 1s;

                    p {
                        color: #fff;
                        opacity: 1;
                    }
                }
            }
            @keyframes pulse {
                0%{
                    transform: scale(.9);
                    box-shadow: 0rem 0rem 0rem 0 rgba(0, 0, 0, .3)
                }
                100%{
                    transform: scale(1);
                    box-shadow: 0rem 0rem .5rem .3rem rgba(0, 0, 0, .3)
                }
            }
            @keyframes pulseOut {
                0%{

                    box-shadow: 0rem 0rem 0rem rgba(254, 201, 45, .6);
                }
                100%{

                    box-shadow: 0rem 0rem 28rem rgba(254, 201, 45, .5);
                }
            }

            .ellipse {
                display: flex;
                align-items: center;
                justify-content: center;
                position: absolute;
                right: 8px;
                bottom: 8px;
                opacity: 0;
                width: 32px;
                height: 32px;
                border: 1px solid #fec92d;
                background: #fec92d;
                border-radius: 50%;
                z-index: 999999;
                transition: all ease-in-out;
                font-weight: 600;
                font-size: 12px;

                p {
                    opacity: 0;
                }
            }
        }

</style>

