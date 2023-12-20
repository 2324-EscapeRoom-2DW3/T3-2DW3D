<template>
<div class="overlay-container container" :class="{ 'right-panel-active': isRightPanelActive }" ref="container">
      <div class="overlay">
        <div class="overlay-panel overlay-left">
          <h1>Welcome Back!</h1>
          <p>To keep connected with us please login with your personal info</p>
          <button class="ghost" id="signIn" @click="signIn">Sign In</button>
        </div>
        <div class="overlay-panel overlay-right">
          <h1>Hello, Friend!</h1>
          <p>Enter your personal details and start journey with us</p>
          <button class="ghost" id="signUp" @click="signUp">Sign Up</button>
        </div>
      </div>
    </div>
  </template>

  <script>
  export default {
    data() {
      return {
        isRightPanelActive: false
      };
    },
    methods: {
      signUp() {
        this.isRightPanelActive = true;
      },
      signIn() {
        this.isRightPanelActive = false;
      }
    }
  }
  </script>

  <style scoped>
  /* Your other CSS rules */

  /* LOGIN */
  /* Rest of your CSS styles */
  </style>
