function toggleNav() {
  var navbarcollapse = document.getElementById("navbar-collapse");

  if (navbarcollapse.style.display === "none") { //Bringing the navbar back up
    navbarcollapse.style.display = "block";
  } else { //Hiding the navbar
    navbarcollapse.style.display = "none";
  }
}
