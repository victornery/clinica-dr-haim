let openMenu = () => {
  let menu = document.querySelector(".haim-header__nav");
  let icon = document.querySelector(".menu-icon");

  icon.addEventListener("click", () => {
    if (menu.classList.contains("is-active")) {
      menu.classList.remove("is-active");
    } else {
      menu.classList.add("is-active");
    }
  });
};

openMenu();
