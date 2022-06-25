<template>
  <nav>
    <router-link to="/">Home</router-link> |
    <router-link to="/about">Jobs</router-link> |
    <router-link to="/dep">Departments</router-link>
  </nav>
  <router-view />
</template>
<style scoped>
nav {
  padding: 15px;
  text-align: center;
  font-size: 18px;
}

nav a {
  font-weight: bold;
  color: black;
  font-family: "Poppins";
  text-decoration: none;
}

nav a.router-link-exact-active {
  color: rgba(35, 188, 199, 0.849);
}
</style>
