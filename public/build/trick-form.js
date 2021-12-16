(self["webpackChunk"] = self["webpackChunk"] || []).push([["trick-form"],{

/***/ "./assets/js/trick-form.js":
/*!*********************************!*\
  !*** ./assets/js/trick-form.js ***!
  \*********************************/
/***/ ((__unused_webpack_module, __unused_webpack_exports, __webpack_require__) => {

__webpack_require__(/*! core-js/modules/es.regexp.exec.js */ "./node_modules/core-js/modules/es.regexp.exec.js");

__webpack_require__(/*! core-js/modules/es.string.replace.js */ "./node_modules/core-js/modules/es.string.replace.js");

function handleDeleteButton() {
  $("button[data-action='delete']").click(function () {
    var target = this.dataset.target;
    $(target).remove();
  });
}

function updateCounter() {
  var count = +$("#trick_images div.form-group").length;
  var countVideo = +$("#trick_videos div.form-group").length;
  $("#widgets-counter-image").val(count);
  $("#widgets-counter-video").val(countVideo);
}

$("#add-image").click(function () {
  // Recuperation du numero des futurs champs que je vais créer
  var index = +$("#widgets-counter-image").val(); // Recuperation du prototype des entrées
  // AddEventListener sur le click etc...

  var tmpl = $("#trick_images").data("prototype").replace(/__name__/g, index); // Injection du code du prototype au sein de la div

  $("#trick_images").append(tmpl); // On gére le "placehold" de fichier lorsqu'un fichier est uploadé

  bsCustomFileInput.init();
  $("#widgets-counter-image").val(index + 1); // Gestion du bouton Supprimer

  handleDeleteButton();
});
$("#add-video").click(function () {
  // Recuperation du numero des futurs champs que je vais créer
  var index = +$("#widgets-counter-video").val(); // Recuperation du prototype des entrées
  // AddEventListener sur le click etc...

  var tmpl = $("#trick_videos").data("prototype").replace(/__name__/g, index); // Injection du code du prototype au sein de la div

  $("#trick_videos").append(tmpl);
  $("#widgets-counter-video").val(index + 1); // Gestion du bouton Supprimer

  handleDeleteButton();
});
updateCounter();
handleDeleteButton();

/***/ })

},
/******/ __webpack_require__ => { // webpackRuntimeModules
/******/ var __webpack_exec__ = (moduleId) => (__webpack_require__(__webpack_require__.s = moduleId))
/******/ __webpack_require__.O(0, ["vendors-node_modules_core-js_internals_export_js-node_modules_core-js_internals_function-appl-5a1e08","vendors-node_modules_core-js_modules_es_string_replace_js"], () => (__webpack_exec__("./assets/js/trick-form.js")));
/******/ var __webpack_exports__ = __webpack_require__.O();
/******/ }
]);
//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJmaWxlIjoidHJpY2stZm9ybS5qcyIsIm1hcHBpbmdzIjoiOzs7Ozs7Ozs7Ozs7QUFBQSxTQUFTQSxrQkFBVCxHQUE4QjtBQUMxQkMsRUFBQUEsQ0FBQyxDQUFDLDhCQUFELENBQUQsQ0FBa0NDLEtBQWxDLENBQXdDLFlBQVU7QUFDOUMsUUFBTUMsTUFBTSxHQUFHLEtBQUtDLE9BQUwsQ0FBYUQsTUFBNUI7QUFDQUYsSUFBQUEsQ0FBQyxDQUFDRSxNQUFELENBQUQsQ0FBVUUsTUFBVjtBQUNILEdBSEQ7QUFJSDs7QUFFRCxTQUFTQyxhQUFULEdBQXlCO0FBQ3JCLE1BQU1DLEtBQUssR0FBRyxDQUFDTixDQUFDLENBQUMsOEJBQUQsQ0FBRCxDQUFrQ08sTUFBakQ7QUFDQSxNQUFNQyxVQUFVLEdBQUcsQ0FBQ1IsQ0FBQyxDQUFDLDhCQUFELENBQUQsQ0FBa0NPLE1BQXREO0FBRUFQLEVBQUFBLENBQUMsQ0FBQyx3QkFBRCxDQUFELENBQTRCUyxHQUE1QixDQUFnQ0gsS0FBaEM7QUFDQU4sRUFBQUEsQ0FBQyxDQUFDLHdCQUFELENBQUQsQ0FBNEJTLEdBQTVCLENBQWdDRCxVQUFoQztBQUNIOztBQUVEUixDQUFDLENBQUMsWUFBRCxDQUFELENBQWdCQyxLQUFoQixDQUFzQixZQUFVO0FBQzVCO0FBQ0EsTUFBTVMsS0FBSyxHQUFHLENBQUNWLENBQUMsQ0FBQyx3QkFBRCxDQUFELENBQTRCUyxHQUE1QixFQUFmLENBRjRCLENBSTVCO0FBQ0E7O0FBQ0EsTUFBTUUsSUFBSSxHQUFHWCxDQUFDLENBQUMsZUFBRCxDQUFELENBQW1CWSxJQUFuQixDQUF3QixXQUF4QixFQUFxQ0MsT0FBckMsQ0FBNkMsV0FBN0MsRUFBMERILEtBQTFELENBQWIsQ0FONEIsQ0FRNUI7O0FBQ0FWLEVBQUFBLENBQUMsQ0FBQyxlQUFELENBQUQsQ0FBbUJjLE1BQW5CLENBQTBCSCxJQUExQixFQVQ0QixDQVc1Qjs7QUFDQUksRUFBQUEsaUJBQWlCLENBQUNDLElBQWxCO0FBRUFoQixFQUFBQSxDQUFDLENBQUMsd0JBQUQsQ0FBRCxDQUE0QlMsR0FBNUIsQ0FBZ0NDLEtBQUssR0FBRyxDQUF4QyxFQWQ0QixDQWdCNUI7O0FBQ0FYLEVBQUFBLGtCQUFrQjtBQUNyQixDQWxCRDtBQW9CQUMsQ0FBQyxDQUFDLFlBQUQsQ0FBRCxDQUFnQkMsS0FBaEIsQ0FBc0IsWUFBVTtBQUM1QjtBQUNBLE1BQU1TLEtBQUssR0FBRyxDQUFDVixDQUFDLENBQUMsd0JBQUQsQ0FBRCxDQUE0QlMsR0FBNUIsRUFBZixDQUY0QixDQUk1QjtBQUNBOztBQUNBLE1BQU1FLElBQUksR0FBR1gsQ0FBQyxDQUFDLGVBQUQsQ0FBRCxDQUFtQlksSUFBbkIsQ0FBd0IsV0FBeEIsRUFBcUNDLE9BQXJDLENBQTZDLFdBQTdDLEVBQTBESCxLQUExRCxDQUFiLENBTjRCLENBUTVCOztBQUNBVixFQUFBQSxDQUFDLENBQUMsZUFBRCxDQUFELENBQW1CYyxNQUFuQixDQUEwQkgsSUFBMUI7QUFFQVgsRUFBQUEsQ0FBQyxDQUFDLHdCQUFELENBQUQsQ0FBNEJTLEdBQTVCLENBQWdDQyxLQUFLLEdBQUcsQ0FBeEMsRUFYNEIsQ0FhNUI7O0FBQ0FYLEVBQUFBLGtCQUFrQjtBQUNyQixDQWZEO0FBaUJBTSxhQUFhO0FBRWJOLGtCQUFrQiIsInNvdXJjZXMiOlsid2VicGFjazovLy8uL2Fzc2V0cy9qcy90cmljay1mb3JtLmpzIl0sInNvdXJjZXNDb250ZW50IjpbImZ1bmN0aW9uIGhhbmRsZURlbGV0ZUJ1dHRvbigpIHtcbiAgICAkKFwiYnV0dG9uW2RhdGEtYWN0aW9uPSdkZWxldGUnXVwiKS5jbGljayhmdW5jdGlvbigpe1xuICAgICAgICBjb25zdCB0YXJnZXQgPSB0aGlzLmRhdGFzZXQudGFyZ2V0O1xuICAgICAgICAkKHRhcmdldCkucmVtb3ZlKCk7XG4gICAgfSk7XG59XG5cbmZ1bmN0aW9uIHVwZGF0ZUNvdW50ZXIoKSB7XG4gICAgY29uc3QgY291bnQgPSArJChcIiN0cmlja19pbWFnZXMgZGl2LmZvcm0tZ3JvdXBcIikubGVuZ3RoO1xuICAgIGNvbnN0IGNvdW50VmlkZW8gPSArJChcIiN0cmlja192aWRlb3MgZGl2LmZvcm0tZ3JvdXBcIikubGVuZ3RoO1xuXG4gICAgJChcIiN3aWRnZXRzLWNvdW50ZXItaW1hZ2VcIikudmFsKGNvdW50KTtcbiAgICAkKFwiI3dpZGdldHMtY291bnRlci12aWRlb1wiKS52YWwoY291bnRWaWRlbyk7XG59XG5cbiQoXCIjYWRkLWltYWdlXCIpLmNsaWNrKGZ1bmN0aW9uKCl7XG4gICAgLy8gUmVjdXBlcmF0aW9uIGR1IG51bWVybyBkZXMgZnV0dXJzIGNoYW1wcyBxdWUgamUgdmFpcyBjcsOpZXJcbiAgICBjb25zdCBpbmRleCA9ICskKFwiI3dpZGdldHMtY291bnRlci1pbWFnZVwiKS52YWwoKTtcblxuICAgIC8vIFJlY3VwZXJhdGlvbiBkdSBwcm90b3R5cGUgZGVzIGVudHLDqWVzXG4gICAgLy8gQWRkRXZlbnRMaXN0ZW5lciBzdXIgbGUgY2xpY2sgZXRjLi4uXG4gICAgY29uc3QgdG1wbCA9ICQoXCIjdHJpY2tfaW1hZ2VzXCIpLmRhdGEoXCJwcm90b3R5cGVcIikucmVwbGFjZSgvX19uYW1lX18vZywgaW5kZXgpO1xuXG4gICAgLy8gSW5qZWN0aW9uIGR1IGNvZGUgZHUgcHJvdG90eXBlIGF1IHNlaW4gZGUgbGEgZGl2XG4gICAgJChcIiN0cmlja19pbWFnZXNcIikuYXBwZW5kKHRtcGwpO1xuXG4gICAgLy8gT24gZ8OpcmUgbGUgXCJwbGFjZWhvbGRcIiBkZSBmaWNoaWVyIGxvcnNxdSd1biBmaWNoaWVyIGVzdCB1cGxvYWTDqVxuICAgIGJzQ3VzdG9tRmlsZUlucHV0LmluaXQoKTtcblxuICAgICQoXCIjd2lkZ2V0cy1jb3VudGVyLWltYWdlXCIpLnZhbChpbmRleCArIDEpO1xuXG4gICAgLy8gR2VzdGlvbiBkdSBib3V0b24gU3VwcHJpbWVyXG4gICAgaGFuZGxlRGVsZXRlQnV0dG9uKCk7XG59KTtcblxuJChcIiNhZGQtdmlkZW9cIikuY2xpY2soZnVuY3Rpb24oKXtcbiAgICAvLyBSZWN1cGVyYXRpb24gZHUgbnVtZXJvIGRlcyBmdXR1cnMgY2hhbXBzIHF1ZSBqZSB2YWlzIGNyw6llclxuICAgIGNvbnN0IGluZGV4ID0gKyQoXCIjd2lkZ2V0cy1jb3VudGVyLXZpZGVvXCIpLnZhbCgpO1xuXG4gICAgLy8gUmVjdXBlcmF0aW9uIGR1IHByb3RvdHlwZSBkZXMgZW50csOpZXNcbiAgICAvLyBBZGRFdmVudExpc3RlbmVyIHN1ciBsZSBjbGljayBldGMuLi5cbiAgICBjb25zdCB0bXBsID0gJChcIiN0cmlja192aWRlb3NcIikuZGF0YShcInByb3RvdHlwZVwiKS5yZXBsYWNlKC9fX25hbWVfXy9nLCBpbmRleCk7XG5cbiAgICAvLyBJbmplY3Rpb24gZHUgY29kZSBkdSBwcm90b3R5cGUgYXUgc2VpbiBkZSBsYSBkaXZcbiAgICAkKFwiI3RyaWNrX3ZpZGVvc1wiKS5hcHBlbmQodG1wbCk7XG5cbiAgICAkKFwiI3dpZGdldHMtY291bnRlci12aWRlb1wiKS52YWwoaW5kZXggKyAxKTtcblxuICAgIC8vIEdlc3Rpb24gZHUgYm91dG9uIFN1cHByaW1lclxuICAgIGhhbmRsZURlbGV0ZUJ1dHRvbigpO1xufSk7XG5cbnVwZGF0ZUNvdW50ZXIoKTtcblxuaGFuZGxlRGVsZXRlQnV0dG9uKCk7Il0sIm5hbWVzIjpbImhhbmRsZURlbGV0ZUJ1dHRvbiIsIiQiLCJjbGljayIsInRhcmdldCIsImRhdGFzZXQiLCJyZW1vdmUiLCJ1cGRhdGVDb3VudGVyIiwiY291bnQiLCJsZW5ndGgiLCJjb3VudFZpZGVvIiwidmFsIiwiaW5kZXgiLCJ0bXBsIiwiZGF0YSIsInJlcGxhY2UiLCJhcHBlbmQiLCJic0N1c3RvbUZpbGVJbnB1dCIsImluaXQiXSwic291cmNlUm9vdCI6IiJ9