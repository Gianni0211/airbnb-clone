<template>
  <div
    class="flex flex-col h-20 z-50 w-full transition duration-300 bg-transparent"
    v-on-clickaway="closeSearchBox"
    :class="{
      'absolute top-50 text-white': scrollPosition < 50,
      ' fixed bg-white text-black shadow': scrollPosition > 50 || searchBox,
      'relative text-black shadow': this.$route.name != 'Home',
    }"
    :style="
      (scrollPosition < 50 && searchBox) || this.$route.name != 'Home'
        ? 'color: black;'
        : ''
    "
  >
    <nav
      class="navbar md:justify-between justify-center container-xl lg:px-40 p-10 pb-0 pt-5 relative"
      :class="{ 'h-48': searchBox }"
    >
      <router-link to="/">
        <img
          src="@/assets/images/logo.svg"
          alt="logo"
          class="w-10 h-10 justify-self-start hidden md:block"
        />
      </router-link>
      <div v-if="searchBox">
        <div class="tabs inline-block self-end text-black">
          <ul class="flex items-center justify-center">
            <li class="hover:border-b hover:border-black mr-8">
              <a href="#">Alloggi</a>
            </li>
            <li class="hover:border-bottom mr-8">
              <a href="#">Esperienze </a>
            </li>
            <li class="hover:border-bottom">
              <a href="#">Esperienze online</a>
            </li>
          </ul>
        </div>
      </div>
      <button
        v-else
        @click="activateSearchBox"
        class="relative flex items-center justify-around focus:outline-none md:w-64 w-full bg-white border border-gray-300 rounded-full hover:shadow-md"
        :class="{ hidden: searchBox }"
      >
        <div
          class="h-10 focus:outline-none -ml-16 flex justify-center items-center text-black"
        >
          inizia la ricerca
        </div>
        <div
          class="absolute right-2 rounded-full h-8 w-8 bg-air-500 focus:outline-none flex justify-center items-center"
        >
          <i class="fa fa-search text-white"></i>
        </div>
      </button>

      <ul class="style-none md:flex justify-between hidden">
        <li
          v-if="!searchBox"
          class="flex justify-center items-center mr-5 relative"
        >
          <a
            href="/host/request"
            class="hover-link py-2 px-5 rounded-full"
            :class="{ 'bg-hover': scrollPosition > 50 || searchBox }"
            >Diventa un host</a
          >
          <router-link
            to="/location/create"
            class="hover-link py-2 px-5 rounded-full"
            :class="{ 'bg-hover': scrollPosition > 50 || searchBox }"
            >Aggiungi il tuo spazio</router-link
          >
        </li>
        <li
          v-if="!searchBox"
          class="mr-5 flex justify-center items-center relative"
        >
          <a href=""
            ><i
              class="fas fa-globe hover-link px-4 py-3 rounded-full"
              :class="{ 'bg-hover': scrollPosition > 50 || searchBox }"
            ></i
          ></a>
        </li>
        <li
          class="h-10 w-20 px-5 py-5 rounded-full flex justify-around items-center border border-gray-300 relative hover:shadow-md bg-white text-black self-center"
          @click="togleUserModal"
        >
          <i class="fas fa-bars left-3 absolute"></i>
          <img
            :src="profilePic"
            alt="profile-pic"
            class="rounded-full w-8 h-8 ml-2 absolute right-2"
          />
        </li>
      </ul>
      <user-modal v-if="userOptions" v-on-clickaway="togleUserModal" />
    </nav>
    <div name="zoom-in" v-if="searchBox">
      <MobileModal class="md:hidden" @close="closeSearchBox"/>
      <search-bar class="hidden md:block transition duration-400"></search-bar>
      
    </div>
  </div>
</template>

<script>
import { directive as onClickaway } from "vue-clickaway";
import SearchBar from "../components/SearchBar";
import UserModal from "../components/UserModal";
import MobileModal from "../components/MobileModal";
import { mapGetters } from "vuex";

export default {
  name: "nav-bar",
  components: {
    SearchBar,
    UserModal,
    MobileModal,
  },
  data() {
    return {
      searchBox: false,
      scrollPosition: null,
      userOptions: false,
    };
  },
  computed: {
    ...mapGetters({ user: "auth/user" }),
    profilePic: function () {
      if (!this.user) {
        return "https://a0.muscache.com/defaults/user_pic-50x50.png?v=3";
      } else {
        return (
          this.user.profile_photo_path ||
          "https://a0.muscache.com/defaults/user_pic-50x50.png?v=3"
        );
      }
    },
  },

  methods: {
    activateSearchBox() {
      this.searchBox = true;
      if (window.innerWidth < 767) {
        this.mobile = true;
      }
    },
    closeSearchBox() {
      this.searchBox = false;
    },
    updateScroll() {
      this.scrollPosition = window.scrollY;
    },
    togleUserModal() {
      this.userOptions = !this.userOptions;
    },
  },
  watch: {
    scrollPosition: function () {
      this.closeSearchBox();
    },
  },
  mounted() {
    window.addEventListener("scroll", this.updateScroll);
  },

  directives: {
    onClickaway: onClickaway,
  },
  
};
</script>

<style scoped>
.navbar {
  @apply w-full;
}
.navbar {
  display: flex;
  align-items: center;
}
.nav {
  width: 100%;
}
.hover-link:hover {
  background: rgba(255, 255, 255, 0.15);
}
.bg-hover:hover {
  @apply bg-gray-50  !important;
}
/* 
.hover-link:hover::after {
  content: "";
  position: absolute;
  top: 0px;
  left: 0px;
  width: 100%;
  height: 100%;
 
  padding: 1.2rem 3rem;
  background: rgba(255, 255, 255, 0.15) !important;
  border-radius: 20px;

  z-index: -10;
} */
.zoom-in {
  transition: all 0.3s ease;
  transform: translateX(-100px), scale(0.9);
}
.zoom-in-enter,
.zoom-in-leave-to {
  transform: translateX(0px), scale(1);
}
</style>

