import './bootstrap';

import 'swiper/css';
import 'swiper/css/effect-fade';

import {initSwiper} from './components/swiper';
import {initServiceTables} from "./components/serviceTable.js";

document.addEventListener('DOMContentLoaded', () => {
  initSwiper('.swiper');
  initServiceTables();
});
