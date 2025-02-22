<template>
    <div class="max-w-md mx-auto mt-10 bg-white p-6 rounded-lg shadow-md">
      <h2 class="text-xl font-semibold mb-4">Login</h2>
      <form @submit.prevent="login">
        <div>
          <label class="block font-medium">Email</label>
          <input v-model="form.email" type="email" class="w-full p-2 border rounded-md" required>
        </div>
        <div class="mt-4">
          <label class="block font-medium">Password</label>
          <input v-model="form.password" type="password" class="w-full p-2 border rounded-md" required>
        </div>
        <button type="submit" class="mt-4 w-full bg-blue-500 text-white py-2 rounded-md">Login</button>
      </form>
  
      <button @click="goToRegister" class="mt-4 w-full bg-gray-500 text-white py-2 rounded-md">
        Don't have an account? Register
      </button>
    </div>
  </template>
  
  <script>
  import { router } from '@inertiajs/vue3';
  import axios from 'axios';
  
  export default {
    data() {
      return {
        form: {
          email: '',
          password: '',
        },
      };
    },
    methods: {
      async login() {
        try {
          const response = await axios.post('/api/login', this.form);
          console.log(response.data);
          router.visit('/home');
        } catch (error) {
          console.error("Login failed:", error.response?.data || error);
          alert("Invalid login credentials. Please try again.");
        }
      },
      goToRegister() {
        router.visit('/register'); 
      }
    }
  };
  </script>
  