<template>
    <Sidebar>
      <slot></slot>
    </Sidebar>
  </template>
  
  <script>
  import Sidebar from '../Components/Sidebar.vue';
  
  export default {
    components: { Sidebar }
  };
  </script>