<template>
    <div class="card" @click="activeCard()">
        <div class="left">
            <div class="user-header">
                <div class="avatar">
                    <img :src="l.avatar">
                </div>
                <h2>{{ l.name }}</h2>
            </div>
            <font-awesome-icon icon="user-secret" />
        </div>
        <div class="right">

            <!-- <h3>{{ l.address}}</h3>
            <h3>{{ l.city}}</h3> -->
            <!-- hours - {{ l.hours }}<br> -->
            <!-- <p>{{coordinates.lat}} {{coordinates.lng}}</p> -->
            <p>last seen at</p>
            <p>{{position.lat}} - {{position.lng}} 5 minutes ago</p>
        </div>
        <div class="ellipse"><p>{{ l.state }}</p></div>
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
               this.$emit('info')
           }
        }
    }
</script>

<style scoped lang="scss">

    .card {
        width: 100%;
        max-width: 320px;
        height: 164px;
        background: #343434;
        border-radius: 10px;
        padding: 15px;
        margin-bottom: 15px;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        transition: all ease-in-out .2s;
        // position: relative;
        z-index: 99;
        cursor: pointer;

        &:hover {
            margin-top: 15px;
            height: 500px;
            background-color: #fec92d;
            border: none;
            color: #343434;

            .ellipse {
                opacity: 1;
                border: none;
                background: #343434;
                transition: all ease-in-out 1s;

                p {
                    color: #fff;
                    opacity: 1;
                }
            }

            .left {
                .user-header {
                    margin-bottom: 30px;

                    .avatar {
                        transform: translate(0, -60%);
                        border: 1px solid #fec92d;
                        transition: all ease .9s;

                        img {

                        }
                    }

                    h2 {
                        transform: translateY(-60%) scale(1.1);
                    }
                }
            }
        }

        h3,h2 {
            font-size: 12px;
            transition: all ease-in-out .6s;
        }

        .left {
            display: flex;
            justify-content: space-between;
            align-items: center;
            z-index: 999;
            .user-header {
                display: flex;
                align-items: center;
                transition: all ease-in-out .6s;

                .avatar {
                    width: 45px;
                    height: 45px;
                    border-radius: 50%;
                    margin-right: 20px;
                    color: #343434;
                    overflow: hidden;
                    transition: all ease-in-out .6s;
                    img {
                        width: 50px;
                        height: 50px;
                    }
                }

                 h2 {
                     text-transform: lowercase;
                     font-size: 13px;
                     font-weight: bold;
                 }
            }
        }

        .right {
            z-index: 999;
            p {
                font-size: 10px;
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

        @media only screen
            and (min-device-width: 320px)
            and (max-device-width: 568px)
            and (-webkit-min-device-pixel-ratio: 2)
            and (orientation: portrait) {
                    .card {
                        height: 164px;
                        min-height: 164px;
                    }
            }

</style>

