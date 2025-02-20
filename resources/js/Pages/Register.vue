<template>
    <div class="max-w-md mx-auto mt-10 bg-white p-6 rounded-lg shadow-md">
      <h2 class="text-xl font-semibold mb-4">Register</h2>
      <form @submit.prevent="register">
        <div>
          <label class="block font-medium">Name</label>
          <input v-model="form.name" type="text" class="w-full p-2 border rounded-md" required>
        </div>
        <div class="mt-4">
          <label class="block font-medium">Email</label>
          <input v-model="form.email" type="email" class="w-full p-2 border rounded-md" required>
        </div>
        <div class="mt-4">
          <label class="block font-medium">Password</label>
          <input v-model="form.password" type="password" class="w-full p-2 border rounded-md" required>
        </div>
        <div class="mt-4">
          <label class="block font-medium">Confirm Password</label>
          <input v-model="form.password_confirmation" type="password" class="w-full p-2 border rounded-md" required>
          
        </div>
        <button type="submit" class="mt-4 w-full bg-blue-500 text-white py-2 rounded-md">Register</button>
      </form>
      <p v-if="message" class="mt-2 text-green-500">{{ message }}</p>
    </div>
  </template>
  
  <script>
  import axios from 'axios';
  
  export default {
    data() {
      return {
        form: {
          name: '',
          email: '',
          password: '',
          password_confirmation: '',
        },
        message: ''
      };
    },
    methods: {
      async register() {
        console.log('Register method called');
        try {
          const response = await axios.post('/api/register', this.form);
          this.message = response.data.message;
          this.form = { name: '', email: '', password: '', password_confirmation: '' };
        } catch (error) {
          console.error(error.response.data);
        }
      }
    }
  };
  </script>