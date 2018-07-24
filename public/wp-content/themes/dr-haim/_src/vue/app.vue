
const app = new Vue({
  el: "#app",
  data() {
    return {
      step: 1
    };
  },
  methods: {
    prev() {
      this.step--;
    },
    next() {
      this.step++;
    }
  }
});
