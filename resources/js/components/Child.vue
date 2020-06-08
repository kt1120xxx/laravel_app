<template>
  <div>
    <h1>"{{ this.msg }}"</h1>
    <button @click="CountUp">カウントアップ</button>
  </div>
</template>

<script>
export default {
  name: 'Child',
  props: {
    msg: String
  },
  methods: {
    CountUp () {
      this.$emit("ChildBtnClick",{num : 100, test:'test'});
    }
    
  },
}
</script>