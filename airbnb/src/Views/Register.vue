<template>
 
<form class="bg-grey-lighter min-h-screen flex flex-col" @submit.prevent="submit">
  <p v-if="errors.length">
    <b>Please correct the following error(s):</b>
    <ul>
      <li v-for="error in errors" :key="error">{{ error }}</li>
    </ul>
  </p>
            <div class="container max-w-sm mx-auto flex-1 flex flex-col items-center justify-center px-2">
                <div class="bg-white px-6 py-8 rounded shadow-md text-black w-full">
                    <h1 class="mb-8 text-3xl text-center">Sign up</h1>
                    <input 
                      v-model="form.name"
                        type="text"
                        class="block border border-grey-light w-full p-3 rounded mb-4"
                        name="fullname"
                        placeholder="Full Name" />

                    <input 
                      v-model="form.email"
                        type="text"
                        class="block border border-grey-light w-full p-3 rounded mb-4"
                        name="email"
                        placeholder="Email" />

                    <input 
                      v-model="form.password"
                        type="password"
                        class="block border border-grey-light w-full p-3 rounded mb-4"
                        name="password"
                        placeholder="Password" />
                    <input 
                      v-model="form.confirmPassword"
                        type="password"
                        class="block border border-grey-light w-full p-3 rounded mb-4"
                        name="confirm_password"
                        placeholder="Confirm Password" />

                    <button
                        type="submit"
                        class="w-full text-center py-3 rounded bg-red-500 text-white hover:bg-green-dark focus:outline-none my-1"
                    >Create Account</button>

                    <div class="text-center text-sm text-grey-dark mt-4">
                        By signing up, you agree to the 
                        <a class="no-underline border-b border-grey-dark text-grey-dark" href="#">
                            Terms of Service
                        </a> and 
                        <a class="no-underline border-b border-grey-dark text-grey-dark" href="#">
                            Privacy Policy
                        </a>
                    </div>
                </div>

                <div class="text-grey-dark mt-6">
                    Already have an account? 
                    <router-link class="no-underline border-b border-blue text-blue" to="/SingIn">
                        Log in
                    </router-link>.
                </div>
            </div>
        </form>
</template>

<script>
import axios from "axios";

export default {
  name: "Register",

  data() {
    return {
      form: {
        name: "",
        email: "",
        password: "",
        confirmPassword: "",
      },
      errors: [],
    };
  },
  watch: {},
  methods: {
    
    validate() {
      if (this.form.password != this.form.confirmPassword) {
        this.errors.push("la password");
      }
    },

    submit() {
      this.validate();
      if (this.error.length != 0) {
        axios.post("/api/auth/register", { ...this.form });
      }
    },
  },
};
</script>

<style>
</style>