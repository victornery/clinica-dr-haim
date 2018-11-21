let openMenu = () => {
  let menu = document.querySelector(".nav");
  let icon = document.querySelector(".menu-icon");

  icon.addEventListener("click", () => {
    if (menu.classList.contains("nav-opened")) {
      menu.classList.remove("nav-opened");
    } else {
      menu.classList.add("nav-opened");
    }
  });
};

openMenu();
