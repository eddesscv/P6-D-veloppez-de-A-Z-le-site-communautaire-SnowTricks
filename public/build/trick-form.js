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
//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJmaWxlIjoidHJpY2stZm9ybS5qcyIsIm1hcHBpbmdzIjoiOzs7Ozs7Ozs7Ozs7QUFBQSxTQUFTQSxrQkFBVCxHQUE4QjtBQUMxQkMsRUFBQUEsQ0FBQyxDQUFDLDhCQUFELENBQUQsQ0FBa0NDLEtBQWxDLENBQXdDLFlBQVc7QUFDL0MsUUFBTUMsTUFBTSxHQUFHLEtBQUtDLE9BQUwsQ0FBYUQsTUFBNUI7QUFDQUYsSUFBQUEsQ0FBQyxDQUFDRSxNQUFELENBQUQsQ0FBVUUsTUFBVjtBQUNILEdBSEQ7QUFJSDs7QUFFRCxTQUFTQyxhQUFULEdBQXlCO0FBQ3JCLE1BQU1DLEtBQUssR0FBRyxDQUFDTixDQUFDLENBQUMsOEJBQUQsQ0FBRCxDQUFrQ08sTUFBakQ7QUFDQSxNQUFNQyxVQUFVLEdBQUcsQ0FBQ1IsQ0FBQyxDQUFDLDhCQUFELENBQUQsQ0FBa0NPLE1BQXREO0FBRUFQLEVBQUFBLENBQUMsQ0FBQyx3QkFBRCxDQUFELENBQTRCUyxHQUE1QixDQUFnQ0gsS0FBaEM7QUFDQU4sRUFBQUEsQ0FBQyxDQUFDLHdCQUFELENBQUQsQ0FBNEJTLEdBQTVCLENBQWdDRCxVQUFoQztBQUNIOztBQUVEUixDQUFDLENBQUMsWUFBRCxDQUFELENBQWdCQyxLQUFoQixDQUFzQixZQUFXO0FBQzdCO0FBQ0EsTUFBTVMsS0FBSyxHQUFHLENBQUNWLENBQUMsQ0FBQyx3QkFBRCxDQUFELENBQTRCUyxHQUE1QixFQUFmLENBRjZCLENBSTdCO0FBQ0E7O0FBQ0EsTUFBTUUsSUFBSSxHQUFHWCxDQUFDLENBQUMsZUFBRCxDQUFELENBQ1JZLElBRFEsQ0FDSCxXQURHLEVBRVJDLE9BRlEsQ0FFQSxXQUZBLEVBRWFILEtBRmIsQ0FBYixDQU42QixDQVU3Qjs7QUFDQVYsRUFBQUEsQ0FBQyxDQUFDLGVBQUQsQ0FBRCxDQUFtQmMsTUFBbkIsQ0FBMEJILElBQTFCLEVBWDZCLENBYTdCOztBQUNBSSxFQUFBQSxpQkFBaUIsQ0FBQ0MsSUFBbEI7QUFFQWhCLEVBQUFBLENBQUMsQ0FBQyx3QkFBRCxDQUFELENBQTRCUyxHQUE1QixDQUFnQ0MsS0FBSyxHQUFHLENBQXhDLEVBaEI2QixDQWtCN0I7O0FBQ0FYLEVBQUFBLGtCQUFrQjtBQUNyQixDQXBCRDtBQXNCQUMsQ0FBQyxDQUFDLFlBQUQsQ0FBRCxDQUFnQkMsS0FBaEIsQ0FBc0IsWUFBVztBQUM3QjtBQUNBLE1BQU1TLEtBQUssR0FBRyxDQUFDVixDQUFDLENBQUMsd0JBQUQsQ0FBRCxDQUE0QlMsR0FBNUIsRUFBZixDQUY2QixDQUk3QjtBQUNBOztBQUNBLE1BQU1FLElBQUksR0FBR1gsQ0FBQyxDQUFDLGVBQUQsQ0FBRCxDQUNSWSxJQURRLENBQ0gsV0FERyxFQUVSQyxPQUZRLENBRUEsV0FGQSxFQUVhSCxLQUZiLENBQWIsQ0FONkIsQ0FVN0I7O0FBQ0FWLEVBQUFBLENBQUMsQ0FBQyxlQUFELENBQUQsQ0FBbUJjLE1BQW5CLENBQTBCSCxJQUExQjtBQUVBWCxFQUFBQSxDQUFDLENBQUMsd0JBQUQsQ0FBRCxDQUE0QlMsR0FBNUIsQ0FBZ0NDLEtBQUssR0FBRyxDQUF4QyxFQWI2QixDQWU3Qjs7QUFDQVgsRUFBQUEsa0JBQWtCO0FBQ3JCLENBakJEO0FBbUJBTSxhQUFhO0FBRWJOLGtCQUFrQiIsInNvdXJjZXMiOlsid2VicGFjazovLy8uL2Fzc2V0cy9qcy90cmljay1mb3JtLmpzIl0sInNvdXJjZXNDb250ZW50IjpbImZ1bmN0aW9uIGhhbmRsZURlbGV0ZUJ1dHRvbigpIHtcbiAgICAkKFwiYnV0dG9uW2RhdGEtYWN0aW9uPSdkZWxldGUnXVwiKS5jbGljayhmdW5jdGlvbigpIHtcbiAgICAgICAgY29uc3QgdGFyZ2V0ID0gdGhpcy5kYXRhc2V0LnRhcmdldDtcbiAgICAgICAgJCh0YXJnZXQpLnJlbW92ZSgpO1xuICAgIH0pO1xufVxuXG5mdW5jdGlvbiB1cGRhdGVDb3VudGVyKCkge1xuICAgIGNvbnN0IGNvdW50ID0gKyQoXCIjdHJpY2tfaW1hZ2VzIGRpdi5mb3JtLWdyb3VwXCIpLmxlbmd0aDtcbiAgICBjb25zdCBjb3VudFZpZGVvID0gKyQoXCIjdHJpY2tfdmlkZW9zIGRpdi5mb3JtLWdyb3VwXCIpLmxlbmd0aDtcblxuICAgICQoXCIjd2lkZ2V0cy1jb3VudGVyLWltYWdlXCIpLnZhbChjb3VudCk7XG4gICAgJChcIiN3aWRnZXRzLWNvdW50ZXItdmlkZW9cIikudmFsKGNvdW50VmlkZW8pO1xufVxuXG4kKFwiI2FkZC1pbWFnZVwiKS5jbGljayhmdW5jdGlvbigpIHtcbiAgICAvLyBSZWN1cGVyYXRpb24gZHUgbnVtZXJvIGRlcyBmdXR1cnMgY2hhbXBzIHF1ZSBqZSB2YWlzIGNyw6llclxuICAgIGNvbnN0IGluZGV4ID0gKyQoXCIjd2lkZ2V0cy1jb3VudGVyLWltYWdlXCIpLnZhbCgpO1xuXG4gICAgLy8gUmVjdXBlcmF0aW9uIGR1IHByb3RvdHlwZSBkZXMgZW50csOpZXNcbiAgICAvLyBBZGRFdmVudExpc3RlbmVyIHN1ciBsZSBjbGljayBldGMuLi5cbiAgICBjb25zdCB0bXBsID0gJChcIiN0cmlja19pbWFnZXNcIilcbiAgICAgICAgLmRhdGEoXCJwcm90b3R5cGVcIilcbiAgICAgICAgLnJlcGxhY2UoL19fbmFtZV9fL2csIGluZGV4KTtcblxuICAgIC8vIEluamVjdGlvbiBkdSBjb2RlIGR1IHByb3RvdHlwZSBhdSBzZWluIGRlIGxhIGRpdlxuICAgICQoXCIjdHJpY2tfaW1hZ2VzXCIpLmFwcGVuZCh0bXBsKTtcblxuICAgIC8vIE9uIGfDqXJlIGxlIFwicGxhY2Vob2xkXCIgZGUgZmljaGllciBsb3JzcXUndW4gZmljaGllciBlc3QgdXBsb2Fkw6lcbiAgICBic0N1c3RvbUZpbGVJbnB1dC5pbml0KCk7XG5cbiAgICAkKFwiI3dpZGdldHMtY291bnRlci1pbWFnZVwiKS52YWwoaW5kZXggKyAxKTtcblxuICAgIC8vIEdlc3Rpb24gZHUgYm91dG9uIFN1cHByaW1lclxuICAgIGhhbmRsZURlbGV0ZUJ1dHRvbigpO1xufSk7XG5cbiQoXCIjYWRkLXZpZGVvXCIpLmNsaWNrKGZ1bmN0aW9uKCkge1xuICAgIC8vIFJlY3VwZXJhdGlvbiBkdSBudW1lcm8gZGVzIGZ1dHVycyBjaGFtcHMgcXVlIGplIHZhaXMgY3LDqWVyXG4gICAgY29uc3QgaW5kZXggPSArJChcIiN3aWRnZXRzLWNvdW50ZXItdmlkZW9cIikudmFsKCk7XG5cbiAgICAvLyBSZWN1cGVyYXRpb24gZHUgcHJvdG90eXBlIGRlcyBlbnRyw6llc1xuICAgIC8vIEFkZEV2ZW50TGlzdGVuZXIgc3VyIGxlIGNsaWNrIGV0Yy4uLlxuICAgIGNvbnN0IHRtcGwgPSAkKFwiI3RyaWNrX3ZpZGVvc1wiKVxuICAgICAgICAuZGF0YShcInByb3RvdHlwZVwiKVxuICAgICAgICAucmVwbGFjZSgvX19uYW1lX18vZywgaW5kZXgpO1xuXG4gICAgLy8gSW5qZWN0aW9uIGR1IGNvZGUgZHUgcHJvdG90eXBlIGF1IHNlaW4gZGUgbGEgZGl2XG4gICAgJChcIiN0cmlja192aWRlb3NcIikuYXBwZW5kKHRtcGwpO1xuXG4gICAgJChcIiN3aWRnZXRzLWNvdW50ZXItdmlkZW9cIikudmFsKGluZGV4ICsgMSk7XG5cbiAgICAvLyBHZXN0aW9uIGR1IGJvdXRvbiBTdXBwcmltZXJcbiAgICBoYW5kbGVEZWxldGVCdXR0b24oKTtcbn0pO1xuXG51cGRhdGVDb3VudGVyKCk7XG5cbmhhbmRsZURlbGV0ZUJ1dHRvbigpOyJdLCJuYW1lcyI6WyJoYW5kbGVEZWxldGVCdXR0b24iLCIkIiwiY2xpY2siLCJ0YXJnZXQiLCJkYXRhc2V0IiwicmVtb3ZlIiwidXBkYXRlQ291bnRlciIsImNvdW50IiwibGVuZ3RoIiwiY291bnRWaWRlbyIsInZhbCIsImluZGV4IiwidG1wbCIsImRhdGEiLCJyZXBsYWNlIiwiYXBwZW5kIiwiYnNDdXN0b21GaWxlSW5wdXQiLCJpbml0Il0sInNvdXJjZVJvb3QiOiIifQ==