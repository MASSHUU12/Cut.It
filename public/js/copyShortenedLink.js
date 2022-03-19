/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!*******************************************!*\
  !*** ./resources/js/copyShortenedLink.js ***!
  \*******************************************/
$("#copy-link").click(function () {
  var temp = $("<input>").val($("#shortened-link").text()).select();
  navigator.clipboard.writeText(temp.val());
});
/******/ })()
;