/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!*******************************************!*\
  !*** ./resources/js/copyShortenedLink.js ***!
  \*******************************************/
$("#copy-link").click(function () {
  $("#shortened-link").select();
  navigator.clipboard.writeText($("#shortened-link").text());
});
/******/ })()
;