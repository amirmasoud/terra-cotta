(window["webpackJsonp"] = window["webpackJsonp"] || []).push([[0],{

/***/ "./resources/js/config/content.json":
/*!******************************************!*\
  !*** ./resources/js/config/content.json ***!
  \******************************************/
/*! exports provided: icons, tags, categories, types, groups, fields, users, roles, default */
/***/ (function(module) {

eval("module.exports = JSON.parse(\"{\\\"icons\\\":{\\\"title\\\":\\\"icons\\\",\\\"singular\\\":\\\"icon\\\",\\\"api\\\":\\\"/api/settings/icons/\\\",\\\"form\\\":[{\\\"name\\\":\\\"name\\\",\\\"label\\\":\\\"name\\\",\\\"type\\\":\\\"text\\\"},{\\\"name\\\":\\\"class\\\",\\\"label\\\":\\\"class\\\",\\\"type\\\":\\\"text\\\"},{\\\"name\\\":\\\"prefix\\\",\\\"label\\\":\\\"prefix\\\",\\\"type\\\":\\\"text\\\"}]},\\\"tags\\\":{\\\"title\\\":\\\"tags\\\",\\\"singular\\\":\\\"tag\\\",\\\"api\\\":\\\"/api/settings/tags/\\\",\\\"form\\\":[{\\\"name\\\":\\\"name\\\",\\\"label\\\":\\\"name\\\",\\\"type\\\":\\\"text\\\"},{\\\"name\\\":\\\"color\\\",\\\"label\\\":\\\"color\\\",\\\"type\\\":\\\"color\\\"}]},\\\"categories\\\":{\\\"title\\\":\\\"categories\\\",\\\"singular\\\":\\\"category\\\",\\\"api\\\":\\\"/api/settings/categories/\\\",\\\"form\\\":[{\\\"name\\\":\\\"name\\\",\\\"label\\\":\\\"name\\\",\\\"type\\\":\\\"text\\\"},{\\\"name\\\":\\\"icon_id\\\",\\\"label\\\":\\\"icon_id\\\",\\\"type\\\":\\\"autocomplete\\\",\\\"source\\\":\\\"/api/settings/icons/\\\",\\\"attr\\\":\\\"icon\\\"},{\\\"name\\\":\\\"roles\\\",\\\"label\\\":\\\"name\\\",\\\"type\\\":\\\"checkbox\\\",\\\"source\\\":\\\"/api/settings/roles/\\\",\\\"attr\\\":\\\"name\\\"}]},\\\"types\\\":{\\\"title\\\":\\\"types\\\",\\\"singular\\\":\\\"type\\\",\\\"api\\\":\\\"/api/settings/types/\\\",\\\"form\\\":[{\\\"name\\\":\\\"name\\\",\\\"label\\\":\\\"name\\\",\\\"type\\\":\\\"text\\\"}]},\\\"groups\\\":{\\\"title\\\":\\\"groups\\\",\\\"singular\\\":\\\"group\\\",\\\"api\\\":\\\"/api/settings/groups/\\\",\\\"form\\\":[{\\\"name\\\":\\\"name\\\",\\\"label\\\":\\\"name\\\",\\\"type\\\":\\\"text\\\"},{\\\"name\\\":\\\"icon_id\\\",\\\"label\\\":\\\"icon_id\\\",\\\"type\\\":\\\"autocomplete\\\",\\\"source\\\":\\\"/api/settings/icons/\\\",\\\"attr\\\":\\\"icon\\\"},{\\\"name\\\":\\\"safe_id\\\",\\\"label\\\":\\\"safe_id\\\",\\\"type\\\":\\\"autocomplete\\\",\\\"source\\\":\\\"/api/safes/\\\",\\\"attr\\\":\\\"safe\\\"}]},\\\"fields\\\":{\\\"title\\\":\\\"fields\\\",\\\"singular\\\":\\\"field\\\",\\\"api\\\":\\\"/api/settings/fields/\\\",\\\"form\\\":[{\\\"name\\\":\\\"label\\\",\\\"label\\\":\\\"label\\\",\\\"type\\\":\\\"text\\\"},{\\\"name\\\":\\\"value\\\",\\\"label\\\":\\\"value\\\",\\\"type\\\":\\\"text\\\"},{\\\"name\\\":\\\"icon_id\\\",\\\"label\\\":\\\"icon_id\\\",\\\"type\\\":\\\"autocomplete\\\",\\\"source\\\":\\\"/api/settings/icons/\\\",\\\"attr\\\":\\\"icon\\\"},{\\\"name\\\":\\\"type_id\\\",\\\"label\\\":\\\"type_id\\\",\\\"type\\\":\\\"autocomplete\\\",\\\"source\\\":\\\"/api/settings/types/\\\",\\\"attr\\\":\\\"type\\\"},{\\\"name\\\":\\\"group_id\\\",\\\"label\\\":\\\"group_id\\\",\\\"type\\\":\\\"autocomplete\\\",\\\"source\\\":\\\"/api/settings/groups/\\\",\\\"attr\\\":\\\"group\\\"},{\\\"name\\\":\\\"safe_id\\\",\\\"label\\\":\\\"safe_id\\\",\\\"type\\\":\\\"autocomplete\\\",\\\"source\\\":\\\"/api/safes/\\\",\\\"attr\\\":\\\"safe\\\"}]},\\\"users\\\":{\\\"title\\\":\\\"users\\\",\\\"singular\\\":\\\"user\\\",\\\"api\\\":\\\"/api/settings/users/\\\",\\\"form\\\":[{\\\"name\\\":\\\"name\\\",\\\"label\\\":\\\"name\\\",\\\"type\\\":\\\"text\\\"},{\\\"name\\\":\\\"email\\\",\\\"label\\\":\\\"email\\\",\\\"type\\\":\\\"text\\\"},{\\\"name\\\":\\\"password\\\",\\\"label\\\":\\\"password\\\",\\\"type\\\":\\\"password\\\"},{\\\"name\\\":\\\"roles\\\",\\\"label\\\":\\\"roles\\\",\\\"type\\\":\\\"role\\\",\\\"attr\\\":\\\"roles\\\"}]},\\\"roles\\\":{\\\"title\\\":\\\"roles\\\",\\\"singular\\\":\\\"role\\\",\\\"api\\\":\\\"/api/settings/roles/\\\",\\\"form\\\":[{\\\"name\\\":\\\"name\\\",\\\"label\\\":\\\"name\\\",\\\"type\\\":\\\"text\\\"},{\\\"name\\\":\\\"permissions\\\",\\\"label\\\":\\\"permissions\\\",\\\"type\\\":\\\"permission\\\",\\\"attr\\\":\\\"permissions\\\"}]}}\");//# sourceURL=[module]\n//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJzb3VyY2VzIjpbXSwibmFtZXMiOltdLCJtYXBwaW5ncyI6IiIsImZpbGUiOiIuL3Jlc291cmNlcy9qcy9jb25maWcvY29udGVudC5qc29uLmpzIiwic291cmNlUm9vdCI6IiJ9\n//# sourceURL=webpack-internal:///./resources/js/config/content.json\n");

/***/ }),

/***/ "./resources/js/config/safe.json":
/*!***************************************!*\
  !*** ./resources/js/config/safe.json ***!
  \***************************************/
/*! exports provided: safes, default */
/***/ (function(module) {

eval("module.exports = JSON.parse(\"{\\\"safes\\\":{\\\"title\\\":\\\"safes\\\",\\\"singular\\\":\\\"safe\\\",\\\"api\\\":\\\"/api/safes/\\\",\\\"form\\\":[{\\\"name\\\":\\\"name\\\",\\\"label\\\":\\\"name\\\",\\\"type\\\":\\\"text\\\"},{\\\"name\\\":\\\"categories\\\",\\\"label\\\":\\\"categories\\\",\\\"type\\\":\\\"tags\\\",\\\"source\\\":\\\"/api/settings/categories/\\\",\\\"placeholder\\\":\\\"add_category\\\"},{\\\"name\\\":\\\"tags\\\",\\\"label\\\":\\\"tags\\\",\\\"type\\\":\\\"tags\\\",\\\"source\\\":\\\"/api/settings/tags/\\\",\\\"placeholder\\\":\\\"add_tag\\\"},{\\\"name\\\":\\\"groups\\\",\\\"label\\\":\\\"groups\\\",\\\"type\\\":\\\"groupField\\\"}]}}\");//# sourceURL=[module]\n//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJzb3VyY2VzIjpbXSwibmFtZXMiOltdLCJtYXBwaW5ncyI6IiIsImZpbGUiOiIuL3Jlc291cmNlcy9qcy9jb25maWcvc2FmZS5qc29uLmpzIiwic291cmNlUm9vdCI6IiJ9\n//# sourceURL=webpack-internal:///./resources/js/config/safe.json\n");

/***/ }),

/***/ "./resources/js/mixins/config.js":
/*!***************************************!*\
  !*** ./resources/js/mixins/config.js ***!
  \***************************************/
/*! exports provided: config */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
eval("__webpack_require__.r(__webpack_exports__);\n/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, \"config\", function() { return config; });\n/* harmony import */ var typy__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! typy */ \"./node_modules/typy/lib/index.js\");\n/* harmony import */ var typy__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(typy__WEBPACK_IMPORTED_MODULE_0__);\n/* harmony import */ var _config_content_json__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ~/config/content.json */ \"./resources/js/config/content.json\");\nvar _config_content_json__WEBPACK_IMPORTED_MODULE_1___namespace = /*#__PURE__*/__webpack_require__.t(/*! ~/config/content.json */ \"./resources/js/config/content.json\", 1);\n/* harmony import */ var _config_safe_json__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ~/config/safe.json */ \"./resources/js/config/safe.json\");\nvar _config_safe_json__WEBPACK_IMPORTED_MODULE_2___namespace = /*#__PURE__*/__webpack_require__.t(/*! ~/config/safe.json */ \"./resources/js/config/safe.json\", 1);\n\n\n\nvar config = {\n  data: function data() {\n    return {\n      content: _config_content_json__WEBPACK_IMPORTED_MODULE_1__,\n      safe: _config_safe_json__WEBPACK_IMPORTED_MODULE_2__\n    };\n  },\n  methods: {\n    /**\n     * Get config key by domain.\n     *\n     * @param  {string} key\n     * @return {string}\n     */\n    config: function config(key) {\n      return typy__WEBPACK_IMPORTED_MODULE_0___default()(this[this.domain][this.$route.params.content || this.content], key).safeObject;\n    }\n  }\n};//# sourceURL=[module]\n//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJzb3VyY2VzIjpbIndlYnBhY2s6Ly8vLi9yZXNvdXJjZXMvanMvbWl4aW5zL2NvbmZpZy5qcz81ODJjIl0sIm5hbWVzIjpbImNvbmZpZyIsImRhdGEiLCJjb250ZW50IiwiY29udGVudENvbmZpZyIsInNhZmUiLCJzYWZlQ29uZmlnIiwibWV0aG9kcyIsImtleSIsInQiLCJkb21haW4iLCIkcm91dGUiLCJwYXJhbXMiLCJzYWZlT2JqZWN0Il0sIm1hcHBpbmdzIjoiQUFBQTtBQUFBO0FBQUE7QUFBQTtBQUFBO0FBQUE7QUFBQTtBQUFBO0FBQUE7QUFDQTtBQUNBO0FBRU8sSUFBTUEsTUFBTSxHQUFHO0FBQ3BCQyxNQUFJLEVBQUUsZ0JBQVk7QUFDaEIsV0FBTztBQUNMQyxhQUFPLEVBQUVDLGlEQURKO0FBRUxDLFVBQUksRUFBRUMsOENBQVVBO0FBRlgsS0FBUDtBQUlELEdBTm1CO0FBUXBCQyxTQUFPLEVBQUU7QUFDUDs7Ozs7O0FBTUFOLFVBUE8sa0JBT0FPLEdBUEEsRUFPSztBQUNWLGFBQU9DLDJDQUFDLENBQUMsS0FBSyxLQUFLQyxNQUFWLEVBQWtCLEtBQUtDLE1BQUwsQ0FBWUMsTUFBWixDQUFtQlQsT0FBbkIsSUFBOEIsS0FBS0EsT0FBckQsQ0FBRCxFQUFnRUssR0FBaEUsQ0FBRCxDQUFzRUssVUFBN0U7QUFDRDtBQVRNO0FBUlcsQ0FBZiIsImZpbGUiOiIuL3Jlc291cmNlcy9qcy9taXhpbnMvY29uZmlnLmpzLmpzIiwic291cmNlc0NvbnRlbnQiOlsiaW1wb3J0IHQgZnJvbSAndHlweSdcbmltcG9ydCBjb250ZW50Q29uZmlnIGZyb20gJ34vY29uZmlnL2NvbnRlbnQuanNvbidcbmltcG9ydCBzYWZlQ29uZmlnIGZyb20gJ34vY29uZmlnL3NhZmUuanNvbidcblxuZXhwb3J0IGNvbnN0IGNvbmZpZyA9IHtcbiAgZGF0YTogZnVuY3Rpb24gKCkge1xuICAgIHJldHVybiB7XG4gICAgICBjb250ZW50OiBjb250ZW50Q29uZmlnLFxuICAgICAgc2FmZTogc2FmZUNvbmZpZyxcbiAgICB9XG4gIH0sXG5cbiAgbWV0aG9kczoge1xuICAgIC8qKlxuICAgICAqIEdldCBjb25maWcga2V5IGJ5IGRvbWFpbi5cbiAgICAgKlxuICAgICAqIEBwYXJhbSAge3N0cmluZ30ga2V5XG4gICAgICogQHJldHVybiB7c3RyaW5nfVxuICAgICAqL1xuICAgIGNvbmZpZyhrZXkpIHtcbiAgICAgIHJldHVybiB0KHRoaXNbdGhpcy5kb21haW5dW3RoaXMuJHJvdXRlLnBhcmFtcy5jb250ZW50IHx8IHRoaXMuY29udGVudF0sIGtleSkuc2FmZU9iamVjdFxuICAgIH0sXG4gIH1cbn1cbiJdLCJzb3VyY2VSb290IjoiIn0=\n//# sourceURL=webpack-internal:///./resources/js/mixins/config.js\n");

/***/ }),

/***/ "./resources/js/mixins/content.js":
/*!****************************************!*\
  !*** ./resources/js/mixins/content.js ***!
  \****************************************/
/*! exports provided: content */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
eval("__webpack_require__.r(__webpack_exports__);\n/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, \"content\", function() { return content; });\n/* harmony import */ var _babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @babel/runtime/regenerator */ \"./node_modules/@babel/runtime/regenerator/index.js\");\n/* harmony import */ var _babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0__);\n/* harmony import */ var vform__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! vform */ \"./node_modules/vform/dist/vform.common.js\");\n/* harmony import */ var vform__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(vform__WEBPACK_IMPORTED_MODULE_1__);\n/* harmony import */ var axios__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! axios */ \"./node_modules/axios/index.js\");\n/* harmony import */ var axios__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(axios__WEBPACK_IMPORTED_MODULE_2__);\n/* harmony import */ var _config__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ./config */ \"./resources/js/mixins/config.js\");\n/* harmony import */ var _helper__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! ./helper */ \"./resources/js/mixins/helper.js\");\n\n\nfunction asyncGeneratorStep(gen, resolve, reject, _next, _throw, key, arg) { try { var info = gen[key](arg); var value = info.value; } catch (error) { reject(error); return; } if (info.done) { resolve(value); } else { Promise.resolve(value).then(_next, _throw); } }\n\nfunction _asyncToGenerator(fn) { return function () { var self = this, args = arguments; return new Promise(function (resolve, reject) { var gen = fn.apply(self, args); function _next(value) { asyncGeneratorStep(gen, resolve, reject, _next, _throw, \"next\", value); } function _throw(err) { asyncGeneratorStep(gen, resolve, reject, _next, _throw, \"throw\", err); } _next(undefined); }); }; }\n\n\n\n\n\nvar content = {\n  mixins: [_config__WEBPACK_IMPORTED_MODULE_3__[\"config\"], _helper__WEBPACK_IMPORTED_MODULE_4__[\"helper\"]],\n  data: function data() {\n    return {\n      domain: 'content',\n      loading: true,\n      form: new vform__WEBPACK_IMPORTED_MODULE_1___default.a({}),\n      resource: null,\n      data: null\n    };\n  },\n  computed: {\n    api: function api() {\n      return this.config('api');\n    }\n  },\n  created: function () {\n    var _created = _asyncToGenerator(\n    /*#__PURE__*/\n    _babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0___default.a.mark(function _callee() {\n      return _babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0___default.a.wrap(function _callee$(_context) {\n        while (1) {\n          switch (_context.prev = _context.next) {\n            case 0:\n              _context.next = 2;\n              return this.formReady();\n\n            case 2:\n              _context.next = 4;\n              return this.showReady();\n\n            case 4:\n              this.loading = false;\n\n            case 5:\n            case \"end\":\n              return _context.stop();\n          }\n        }\n      }, _callee, this);\n    }));\n\n    function created() {\n      return _created.apply(this, arguments);\n    }\n\n    return created;\n  }(),\n  methods: {\n    /**\n     * Store a new resource.\n     *\n     * @param  {object} event\n     * @return {void}\n     */\n    storeResource: function () {\n      var _storeResource = _asyncToGenerator(\n      /*#__PURE__*/\n      _babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0___default.a.mark(function _callee2(event) {\n        var createRoute, editRoute, _ref, data;\n\n        return _babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0___default.a.wrap(function _callee2$(_context2) {\n          while (1) {\n            switch (_context2.prev = _context2.next) {\n              case 0:\n                createRoute = this.$route.name.split('.');\n                createRoute[createRoute.length - 1] = 'edit';\n                editRoute = createRoute.join('.');\n                _context2.next = 5;\n                return this.form.post(this.api);\n\n              case 5:\n                _ref = _context2.sent;\n                data = _ref.data;\n                this.$router.push({\n                  name: editRoute,\n                  params: {\n                    'resource': data.data.id\n                  }\n                });\n\n              case 8:\n              case \"end\":\n                return _context2.stop();\n            }\n          }\n        }, _callee2, this);\n      }));\n\n      function storeResource(_x) {\n        return _storeResource.apply(this, arguments);\n      }\n\n      return storeResource;\n    }(),\n\n    /**\n     * Fill a update form.\n     *\n     * @param  {integer|string} resourceId\n     * @return {void}\n     */\n    fillResource: function () {\n      var _fillResource = _asyncToGenerator(\n      /*#__PURE__*/\n      _babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0___default.a.mark(function _callee3() {\n        var _this = this;\n\n        var _ref2, data;\n\n        return _babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0___default.a.wrap(function _callee3$(_context3) {\n          while (1) {\n            switch (_context3.prev = _context3.next) {\n              case 0:\n                _context3.next = 2;\n                return axios__WEBPACK_IMPORTED_MODULE_2___default.a.get(this.api + this.$route.params.resource + '/edit');\n\n              case 2:\n                _ref2 = _context3.sent;\n                data = _ref2.data;\n                this.data = data.data;\n                this.form.keys().forEach(function (key) {\n                  _this.form[key] = data.data[key];\n                });\n\n              case 6:\n              case \"end\":\n                return _context3.stop();\n            }\n          }\n        }, _callee3, this);\n      }));\n\n      function fillResource() {\n        return _fillResource.apply(this, arguments);\n      }\n\n      return fillResource;\n    }(),\n\n    /**\n     * Update a resource and redirect after success response.\n     *\n     * @param  {object} event\n     * @return {void}\n     */\n    updateResource: function () {\n      var _updateResource = _asyncToGenerator(\n      /*#__PURE__*/\n      _babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0___default.a.mark(function _callee4(event) {\n        return _babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0___default.a.wrap(function _callee4$(_context4) {\n          while (1) {\n            switch (_context4.prev = _context4.next) {\n              case 0:\n                _context4.next = 2;\n                return this.form.patch(this.api + this.$route.params.resource);\n\n              case 2:\n              case \"end\":\n                return _context4.stop();\n            }\n          }\n        }, _callee4, this);\n      }));\n\n      function updateResource(_x2) {\n        return _updateResource.apply(this, arguments);\n      }\n\n      return updateResource;\n    }(),\n\n    /**\n     * Show a resource.\n     *\n     * @param  {integer|string} resourceId\n     * @return {void}\n     */\n    showResource: function () {\n      var _showResource = _asyncToGenerator(\n      /*#__PURE__*/\n      _babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0___default.a.mark(function _callee5() {\n        var _ref3, data;\n\n        return _babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0___default.a.wrap(function _callee5$(_context5) {\n          while (1) {\n            switch (_context5.prev = _context5.next) {\n              case 0:\n                _context5.next = 2;\n                return axios__WEBPACK_IMPORTED_MODULE_2___default.a.get(this.api + this.$route.params.resource);\n\n              case 2:\n                _ref3 = _context5.sent;\n                data = _ref3.data;\n                this.resource = data.data;\n\n              case 5:\n              case \"end\":\n                return _context5.stop();\n            }\n          }\n        }, _callee5, this);\n      }));\n\n      function showResource() {\n        return _showResource.apply(this, arguments);\n      }\n\n      return showResource;\n    }(),\n\n    /**\n     * Ready form for edit and create.\n     *\n     * @return {void}\n     */\n    formReady: function () {\n      var _formReady = _asyncToGenerator(\n      /*#__PURE__*/\n      _babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0___default.a.mark(function _callee6() {\n        var name, i;\n        return _babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0___default.a.wrap(function _callee6$(_context6) {\n          while (1) {\n            switch (_context6.prev = _context6.next) {\n              case 0:\n                if (!['edit', 'create'].includes(this.action())) {\n                  _context6.next = 6;\n                  break;\n                }\n\n                // For create and edit\n                name = this.config('form').map(function (f) {\n                  return f.name;\n                });\n\n                for (i = name.length - 1; i >= 0; i--) {\n                  this.$set(this.form, name[i], '');\n                } // For edit\n\n\n                if (!(this.action() == 'edit')) {\n                  _context6.next = 6;\n                  break;\n                }\n\n                _context6.next = 6;\n                return this.fillResource();\n\n              case 6:\n              case \"end\":\n                return _context6.stop();\n            }\n          }\n        }, _callee6, this);\n      }));\n\n      function formReady() {\n        return _formReady.apply(this, arguments);\n      }\n\n      return formReady;\n    }(),\n\n    /**\n     * Ready form for edit and create.\n     *\n     * @return {void}\n     */\n    showReady: function () {\n      var _showReady = _asyncToGenerator(\n      /*#__PURE__*/\n      _babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0___default.a.mark(function _callee7() {\n        return _babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0___default.a.wrap(function _callee7$(_context7) {\n          while (1) {\n            switch (_context7.prev = _context7.next) {\n              case 0:\n                if (!['show'].includes(this.action())) {\n                  _context7.next = 3;\n                  break;\n                }\n\n                _context7.next = 3;\n                return this.showResource();\n\n              case 3:\n              case \"end\":\n                return _context7.stop();\n            }\n          }\n        }, _callee7, this);\n      }));\n\n      function showReady() {\n        return _showReady.apply(this, arguments);\n      }\n\n      return showReady;\n    }()\n  }\n};//# sourceURL=[module]\n//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJzb3VyY2VzIjpbIndlYnBhY2s6Ly8vLi9yZXNvdXJjZXMvanMvbWl4aW5zL2NvbnRlbnQuanM/MzliZiJdLCJuYW1lcyI6WyJjb250ZW50IiwibWl4aW5zIiwiY29uZmlnIiwiaGVscGVyIiwiZGF0YSIsImRvbWFpbiIsImxvYWRpbmciLCJmb3JtIiwiRm9ybSIsInJlc291cmNlIiwiY29tcHV0ZWQiLCJhcGkiLCJjcmVhdGVkIiwiZm9ybVJlYWR5Iiwic2hvd1JlYWR5IiwibWV0aG9kcyIsInN0b3JlUmVzb3VyY2UiLCJldmVudCIsImNyZWF0ZVJvdXRlIiwiJHJvdXRlIiwibmFtZSIsInNwbGl0IiwibGVuZ3RoIiwiZWRpdFJvdXRlIiwiam9pbiIsInBvc3QiLCIkcm91dGVyIiwicHVzaCIsInBhcmFtcyIsImlkIiwiZmlsbFJlc291cmNlIiwiYXhpb3MiLCJnZXQiLCJrZXlzIiwiZm9yRWFjaCIsImtleSIsInVwZGF0ZVJlc291cmNlIiwicGF0Y2giLCJzaG93UmVzb3VyY2UiLCJpbmNsdWRlcyIsImFjdGlvbiIsIm1hcCIsImYiLCJpIiwiJHNldCJdLCJtYXBwaW5ncyI6Ijs7Ozs7Ozs7Ozs7Ozs7OztBQUFBO0FBQ0E7QUFDQTtBQUNBO0FBRU8sSUFBTUEsT0FBTyxHQUFHO0FBQ3JCQyxRQUFNLEVBQUUsQ0FBQ0MsOENBQUQsRUFBU0MsOENBQVQsQ0FEYTtBQUdyQkMsTUFIcUIsa0JBR2I7QUFDTixXQUFPO0FBQ0xDLFlBQU0sRUFBRSxTQURIO0FBRUxDLGFBQU8sRUFBRSxJQUZKO0FBR0xDLFVBQUksRUFBRSxJQUFJQyw0Q0FBSixDQUFTLEVBQVQsQ0FIRDtBQUlMQyxjQUFRLEVBQUUsSUFKTDtBQUtMTCxVQUFJLEVBQUU7QUFMRCxLQUFQO0FBT0QsR0FYb0I7QUFhckJNLFVBQVEsRUFBRTtBQUNSQyxPQUFHLEVBQUUsZUFBWTtBQUNmLGFBQU8sS0FBS1QsTUFBTCxDQUFZLEtBQVosQ0FBUDtBQUNEO0FBSE8sR0FiVztBQW1CZlUsU0FuQmU7QUFBQTtBQUFBO0FBQUE7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anMvbWl4aW5zL2NvbnRlbnQuanMuanMiLCJzb3VyY2VzQ29udGVudCI6WyJpbXBvcnQgRm9ybSBmcm9tICd2Zm9ybSdcbmltcG9ydCBheGlvcyBmcm9tICdheGlvcydcbmltcG9ydCB7IGNvbmZpZyB9IGZyb20gJy4vY29uZmlnJ1xuaW1wb3J0IHsgaGVscGVyIH0gZnJvbSAnLi9oZWxwZXInXG5cbmV4cG9ydCBjb25zdCBjb250ZW50ID0ge1xuICBtaXhpbnM6IFtjb25maWcsIGhlbHBlcl0sXG5cbiAgZGF0YSAoKSB7XG4gICAgcmV0dXJuIHtcbiAgICAgIGRvbWFpbjogJ2NvbnRlbnQnLFxuICAgICAgbG9hZGluZzogdHJ1ZSxcbiAgICAgIGZvcm06IG5ldyBGb3JtKHt9KSxcbiAgICAgIHJlc291cmNlOiBudWxsLFxuICAgICAgZGF0YTogbnVsbFxuICAgIH1cbiAgfSxcblxuICBjb21wdXRlZDoge1xuICAgIGFwaTogZnVuY3Rpb24gKCkge1xuICAgICAgcmV0dXJuIHRoaXMuY29uZmlnKCdhcGknKVxuICAgIH0sXG4gIH0sXG5cbiAgYXN5bmMgY3JlYXRlZCAoKSB7XG4gICAgYXdhaXQgdGhpcy5mb3JtUmVhZHkoKVxuICAgIGF3YWl0IHRoaXMuc2hvd1JlYWR5KClcbiAgICB0aGlzLmxvYWRpbmcgPSBmYWxzZVxuICB9LFxuXG4gIG1ldGhvZHM6IHtcbiAgICAvKipcbiAgICAgKiBTdG9yZSBhIG5ldyByZXNvdXJjZS5cbiAgICAgKlxuICAgICAqIEBwYXJhbSAge29iamVjdH0gZXZlbnRcbiAgICAgKiBAcmV0dXJuIHt2b2lkfVxuICAgICAqL1xuICAgIGFzeW5jIHN0b3JlUmVzb3VyY2UgKGV2ZW50KSB7XG4gICAgICBsZXQgY3JlYXRlUm91dGUgPSB0aGlzLiRyb3V0ZS5uYW1lLnNwbGl0KCcuJylcbiAgICAgIGNyZWF0ZVJvdXRlW2NyZWF0ZVJvdXRlLmxlbmd0aCAtIDFdID0gJ2VkaXQnXG4gICAgICBsZXQgZWRpdFJvdXRlID0gY3JlYXRlUm91dGUuam9pbignLicpXG5cbiAgICAgIGNvbnN0IHsgZGF0YSB9ID0gYXdhaXQgdGhpcy5mb3JtLnBvc3QodGhpcy5hcGkpXG5cbiAgICAgIHRoaXMuJHJvdXRlci5wdXNoKHsgbmFtZTogZWRpdFJvdXRlLCBwYXJhbXM6IHsgJ3Jlc291cmNlJzogZGF0YS5kYXRhLmlkIH0gfSlcbiAgICB9LFxuXG4gICAgLyoqXG4gICAgICogRmlsbCBhIHVwZGF0ZSBmb3JtLlxuICAgICAqXG4gICAgICogQHBhcmFtICB7aW50ZWdlcnxzdHJpbmd9IHJlc291cmNlSWRcbiAgICAgKiBAcmV0dXJuIHt2b2lkfVxuICAgICAqL1xuICAgIGFzeW5jIGZpbGxSZXNvdXJjZSAoKSB7XG4gICAgICBjb25zdCB7IGRhdGEgfSA9IGF3YWl0IGF4aW9zLmdldCh0aGlzLmFwaSArIHRoaXMuJHJvdXRlLnBhcmFtcy5yZXNvdXJjZSArICcvZWRpdCcpXG4gICAgICB0aGlzLmRhdGEgPSBkYXRhLmRhdGFcbiAgICAgIHRoaXMuZm9ybS5rZXlzKCkuZm9yRWFjaChrZXkgPT4ge1xuICAgICAgICB0aGlzLmZvcm1ba2V5XSA9IGRhdGEuZGF0YVtrZXldXG4gICAgICB9KVxuICAgIH0sXG5cbiAgICAvKipcbiAgICAgKiBVcGRhdGUgYSByZXNvdXJjZSBhbmQgcmVkaXJlY3QgYWZ0ZXIgc3VjY2VzcyByZXNwb25zZS5cbiAgICAgKlxuICAgICAqIEBwYXJhbSAge29iamVjdH0gZXZlbnRcbiAgICAgKiBAcmV0dXJuIHt2b2lkfVxuICAgICAqL1xuICAgIGFzeW5jIHVwZGF0ZVJlc291cmNlIChldmVudCkge1xuICAgICAgYXdhaXQgdGhpcy5mb3JtLnBhdGNoKHRoaXMuYXBpICsgdGhpcy4kcm91dGUucGFyYW1zLnJlc291cmNlKVxuICAgIH0sXG5cbiAgICAvKipcbiAgICAgKiBTaG93IGEgcmVzb3VyY2UuXG4gICAgICpcbiAgICAgKiBAcGFyYW0gIHtpbnRlZ2VyfHN0cmluZ30gcmVzb3VyY2VJZFxuICAgICAqIEByZXR1cm4ge3ZvaWR9XG4gICAgICovXG4gICAgYXN5bmMgc2hvd1Jlc291cmNlICgpIHtcbiAgICAgIGNvbnN0IHsgZGF0YSB9ID0gYXdhaXQgYXhpb3MuZ2V0KHRoaXMuYXBpICsgdGhpcy4kcm91dGUucGFyYW1zLnJlc291cmNlKVxuICAgICAgdGhpcy5yZXNvdXJjZSA9IGRhdGEuZGF0YVxuICAgIH0sXG5cbiAgICAvKipcbiAgICAgKiBSZWFkeSBmb3JtIGZvciBlZGl0IGFuZCBjcmVhdGUuXG4gICAgICpcbiAgICAgKiBAcmV0dXJuIHt2b2lkfVxuICAgICAqL1xuICAgIGFzeW5jIGZvcm1SZWFkeSAoKSB7XG4gICAgICBpZiAoWydlZGl0JywgJ2NyZWF0ZSddLmluY2x1ZGVzKHRoaXMuYWN0aW9uKCkpKSB7XG4gICAgICAgIC8vIEZvciBjcmVhdGUgYW5kIGVkaXRcbiAgICAgICAgbGV0IG5hbWUgPSB0aGlzLmNvbmZpZygnZm9ybScpLm1hcChmID0+IGYubmFtZSlcbiAgICAgICAgZm9yICh2YXIgaSA9IG5hbWUubGVuZ3RoIC0gMTsgaSA+PSAwOyBpLS0pIHtcbiAgICAgICAgICB0aGlzLiRzZXQodGhpcy5mb3JtLCBuYW1lW2ldLCAnJylcbiAgICAgICAgfVxuICAgICAgICAvLyBGb3IgZWRpdFxuICAgICAgICBpZiAodGhpcy5hY3Rpb24oKSA9PSAnZWRpdCcpIHtcbiAgICAgICAgICBhd2FpdCB0aGlzLmZpbGxSZXNvdXJjZSgpXG4gICAgICAgIH1cbiAgICAgIH1cbiAgICB9LFxuXG4gICAgLyoqXG4gICAgICogUmVhZHkgZm9ybSBmb3IgZWRpdCBhbmQgY3JlYXRlLlxuICAgICAqXG4gICAgICogQHJldHVybiB7dm9pZH1cbiAgICAgKi9cbiAgICBhc3luYyBzaG93UmVhZHkgKCkge1xuICAgICAgaWYgKFsnc2hvdyddLmluY2x1ZGVzKHRoaXMuYWN0aW9uKCkpKSB7XG4gICAgICAgIGF3YWl0IHRoaXMuc2hvd1Jlc291cmNlKClcbiAgICAgIH1cbiAgICB9XG4gIH1cbn1cbiJdLCJzb3VyY2VSb290IjoiIn0=\n//# sourceURL=webpack-internal:///./resources/js/mixins/content.js\n");

/***/ }),

/***/ "./resources/js/mixins/helper.js":
/*!***************************************!*\
  !*** ./resources/js/mixins/helper.js ***!
  \***************************************/
/*! exports provided: helper */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
eval("__webpack_require__.r(__webpack_exports__);\n/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, \"helper\", function() { return helper; });\nvar helper = {\n  methods: {\n    /**\n     * Get current route action.\n     *\n     * @return {string}\n     */\n    action: function action() {\n      return this.$route.name.split('.').slice(-1)[0];\n    }\n  }\n};//# sourceURL=[module]\n//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJzb3VyY2VzIjpbIndlYnBhY2s6Ly8vLi9yZXNvdXJjZXMvanMvbWl4aW5zL2hlbHBlci5qcz9lYzdhIl0sIm5hbWVzIjpbImhlbHBlciIsIm1ldGhvZHMiLCJhY3Rpb24iLCIkcm91dGUiLCJuYW1lIiwic3BsaXQiLCJzbGljZSJdLCJtYXBwaW5ncyI6IkFBQUE7QUFBQTtBQUFPLElBQU1BLE1BQU0sR0FBRztBQUNwQkMsU0FBTyxFQUFFO0FBQ1A7Ozs7O0FBS0FDLFVBTk8sb0JBTUc7QUFDUixhQUFPLEtBQUtDLE1BQUwsQ0FBWUMsSUFBWixDQUFpQkMsS0FBakIsQ0FBdUIsR0FBdkIsRUFBNEJDLEtBQTVCLENBQWtDLENBQUMsQ0FBbkMsRUFBc0MsQ0FBdEMsQ0FBUDtBQUNEO0FBUk07QUFEVyxDQUFmIiwiZmlsZSI6Ii4vcmVzb3VyY2VzL2pzL21peGlucy9oZWxwZXIuanMuanMiLCJzb3VyY2VzQ29udGVudCI6WyJleHBvcnQgY29uc3QgaGVscGVyID0ge1xuICBtZXRob2RzOiB7XG4gICAgLyoqXG4gICAgICogR2V0IGN1cnJlbnQgcm91dGUgYWN0aW9uLlxuICAgICAqXG4gICAgICogQHJldHVybiB7c3RyaW5nfVxuICAgICAqL1xuICAgIGFjdGlvbiAoKSB7XG4gICAgICByZXR1cm4gdGhpcy4kcm91dGUubmFtZS5zcGxpdCgnLicpLnNsaWNlKC0xKVswXVxuICAgIH1cbiAgfVxufVxuIl0sInNvdXJjZVJvb3QiOiIifQ==\n//# sourceURL=webpack-internal:///./resources/js/mixins/helper.js\n");

/***/ })

}]);