<template>
    <nav>
        <i class="fa fa-camera-retro fa-lg"></i> fa-lg
<i class="fa fa-camera-retro fa-2x"></i> fa-2x
<i class="fa fa-camera-retro fa-3x"></i> fa-3x
<i class="fa fa-camera-retro fa-4x"></i> fa-4x
<!-- <i class="fa fa-camera-retro fa-5x"></i> fa-5x -->

        <!-- <h2 :class="{ dark: isDark}">iLokate</h2> -->
        <button :class="{ dark: isDark }" @click="darkMode()"></button>
    </nav>
</template>

<script>
export default {
    data(){
        return{
            isDark: false
        }
    },
    methods: {
        darkMode() {
            this.isDark = !this.isDark
            this.$emit('darkbg')
        }
    }
}
</script>

<style lang="scss" scoped>
    nav {
        height: 10vh;
        z-index: 99999;
        width: 70%;
        padding: 20px;
        display: flex;
        align-items: center;
        justify-content: space-evenly;
        backdrop-filter: blur(43.6833px);

        svg {
            width: 30px;
            height: 30px;
        }

        h2 {
             transition: all ease-in-out .8s;
            &.dark {
                color: #000;
            }
        }

        button {
            border-radius: 27px;
            width: 40px;
            height: 20px;
            background: transparent;
            border: .8px solid #fff;
            position: relative;
            padding: 1px;
            outline: none;
            transition: all ease-in-out .8s;

            &:before {
                content: '';
                width: 14px;
                height: 14px;
                background: white;
                border-radius: 50%;
                position: absolute;
                top: 50%;
                left: 27%;
                transform: translate(-50%, -50%);
                transition: all ease-in-out .8s;
            }

             &.dark{
                 border: .8px solid #000;
                &:before {
                    background: black;
                    top: 50%;
                    left: 73%;
                    transform: translate( -50%, -50%);
                    transition: all ease-in-out .8s;
                }
            }

        }
    }
</style>
