export function initHeaderMenu() {
  const menuBtn = document.querySelector('.header__menu');
  const menuList = document.querySelector('.header__list--menu');

  if (!menuBtn || !menuList) return;

  menuBtn.addEventListener('click', () => {
    const isOpen = menuList.classList.toggle('is-active');
    menuBtn.classList.toggle('is-active', isOpen);
    menuBtn.setAttribute('aria-expanded', isOpen);
  });
}
