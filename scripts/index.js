function toggleNav() {
  var navbarcollapse = document.getElementById("navbar-collapse");
  var navbar = document.getElementById("navbar");
  var bodyWrapper = document.getElementById("body-wrapper");

  if (navbarcollapse.style.display === "none") { //Bringing the navbar back up
    navbarcollapse.style.display = "block";
    navbar.style.width = "15%";
    bodyWrapper.style.marginLeft = "20%";
  } else { //Hiding the navbar
    navbarcollapse.style.display = "none";
    navbar.style.width = "5.5%";
    bodyWrapper.style.marginLeft = "10.5%";
  }
}
