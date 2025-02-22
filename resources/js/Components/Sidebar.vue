<template>
  <div class="flex">
    <div 
      class="h-screen bg-gray-800 text-white w-64 p-4 transition-all duration-300"
      :class="{ 'w-16': collapsed }"
    >
      <button @click="collapsed = !collapsed" class="mb-4 text-xl">
        <span v-if="collapsed">☰</span>
        <span v-else>✖</span>
      </button>

      <nav>
        <ul>
          <li class="mb-4">
            <a href="/home" class="block p-2 hover:bg-gray-700 rounded">🏠 Home</a>
          </li>
          <li class="mb-4">
            <a href="/register" class="block p-2 hover:bg-gray-700 rounded">📝 Register</a>
          </li>
          <li class="mb-4">
            <a href="/login" class="block p-2 hover:bg-gray-700 rounded">🔑 Login</a>
          </li>
          <li v-if="user" class="mb-4">
            <button @click="logout" class="w-full text-left p-2 hover:bg-red-500 rounded">🚪 Logout</button>
          </li>
        </ul>
      </nav>
    </div>

    <div class="flex-1 p-6">
      <slot></slot>
    </div>
  </div>
</template>

<script>
import { router } from '@inertiajs/vue3';
import { ref, onMounted } from 'vue';
import axios from 'axios';

export default {
  setup() {
    const collapsed = ref(false);
    const user = ref(null);

    const fetchUser = async () => {
      try {
        const response = await axios.get('/api/user');
        user.value = response.data;
      } catch (error) {
        console.error('Failed to fetch user:', error);
      }
    };

    const logout = async () => {
      await axios.post('/logout');
      router.visit('/login');
    };

    onMounted(() => {
      fetchUser();
    });

    return { collapsed, logout, user };
  },
};
</script>