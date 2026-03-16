import Swiper from 'swiper';
import {Autoplay, EffectFade} from 'swiper/modules';

/**
 * Инициализация Swiper слайдера
 * @param {string} selector - CSS селектор для слайдера
 * @param {object} options - Дополнительные настройки
 * @returns {Swiper|null}
 */
export function initSwiper(selector = '.swiper', options = {}) {
  const swiperElement = document.querySelector(selector);

  if (!swiperElement) {
    console.warn(`Swiper element "${selector}" not found`);
    return null;
  }

  const defaultOptions = {
    modules: [Autoplay, EffectFade],
    loop: true,
    autoplay: {
      delay: 2500,
      disableOnInteraction: false,
    },
    effect: 'fade',
    fadeEffect: {
      crossFade: true,
    },
    speed: 800,
  };

  const mergedOptions = {...defaultOptions, ...options};

  return new Swiper(selector, mergedOptions);
}
