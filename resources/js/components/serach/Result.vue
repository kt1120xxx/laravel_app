<template>
    <div>
<!-- 外枠 -->
<div v-for="item in val"></div>
<!-- 外枠 -->
    </div>
</template>

<script>
export default {
    props: ['val'],
    data() {
        return {
            test:'aaaaa',
        }
    },
    mounted: function () {
        console.log(test);
    },

}
</script>