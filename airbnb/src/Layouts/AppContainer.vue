<template>
  <div class="container-lg sm:container-xl">
    <NavBar ></NavBar>

    <slot></slot>

    <AppFooter></AppFooter>
  </div>
</template>

<script>
import AppFooter from "./AppFooter";
import NavBar from "./NavBar";
export default {
  components: {
    NavBar,
    AppFooter,
  },
};
</script>

