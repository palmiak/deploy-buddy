"use strict";

Object.defineProperty(exports, "__esModule", {
  value: true
});
exports["default"] = wrap;

var _object = _interopRequireDefault(require("object.assign"));

var _react = _interopRequireDefault(require("react"));

var _propTypes = _interopRequireDefault(require("prop-types"));

function _interopRequireDefault(obj) { return obj && obj.__esModule ? obj : { "default": obj }; }

var propTypes = {
  children: _propTypes["default"].node
};
var defaultProps = {
  children: undefined
};
var Wrapper = (0, _object["default"])(function (_ref) {
  var children = _ref.children;
  return children;
}, {
  propTypes: propTypes,
  defaultProps: defaultProps
});

function wrap(element) {
  return /*#__PURE__*/_react["default"].createElement(Wrapper, null, element);
}
//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJzb3VyY2VzIjpbIi4uL3NyYy93cmFwV2l0aFNpbXBsZVdyYXBwZXIuanN4Il0sIm5hbWVzIjpbInByb3BUeXBlcyIsImNoaWxkcmVuIiwiUHJvcFR5cGVzIiwibm9kZSIsImRlZmF1bHRQcm9wcyIsInVuZGVmaW5lZCIsIldyYXBwZXIiLCJ3cmFwIiwiZWxlbWVudCJdLCJtYXBwaW5ncyI6Ijs7Ozs7Ozs7O0FBQUE7O0FBQ0E7Ozs7QUFFQSxJQUFNQSxTQUFTLEdBQUc7QUFDaEJDLEVBQUFBLFFBQVEsRUFBRUMsc0JBQVVDO0FBREosQ0FBbEI7QUFJQSxJQUFNQyxZQUFZLEdBQUc7QUFDbkJILEVBQUFBLFFBQVEsRUFBRUk7QUFEUyxDQUFyQjtBQUlBLElBQU1DLE9BQU8sR0FBRyx3QkFBYztBQUFBLE1BQUdMLFFBQUgsUUFBR0EsUUFBSDtBQUFBLFNBQWtCQSxRQUFsQjtBQUFBLENBQWQsRUFBMEM7QUFBRUQsRUFBQUEsU0FBUyxFQUFUQSxTQUFGO0FBQWFJLEVBQUFBLFlBQVksRUFBWkE7QUFBYixDQUExQyxDQUFoQjs7QUFFZSxTQUFTRyxJQUFULENBQWNDLE9BQWQsRUFBdUI7QUFDcEMsc0JBQU8sZ0NBQUMsT0FBRCxRQUFVQSxPQUFWLENBQVA7QUFDRCIsInNvdXJjZXNDb250ZW50IjpbImltcG9ydCBSZWFjdCBmcm9tICdyZWFjdCc7XG5pbXBvcnQgUHJvcFR5cGVzIGZyb20gJ3Byb3AtdHlwZXMnO1xuXG5jb25zdCBwcm9wVHlwZXMgPSB7XG4gIGNoaWxkcmVuOiBQcm9wVHlwZXMubm9kZSxcbn07XG5cbmNvbnN0IGRlZmF1bHRQcm9wcyA9IHtcbiAgY2hpbGRyZW46IHVuZGVmaW5lZCxcbn07XG5cbmNvbnN0IFdyYXBwZXIgPSBPYmplY3QuYXNzaWduKCh7IGNoaWxkcmVuIH0pID0+IGNoaWxkcmVuLCB7IHByb3BUeXBlcywgZGVmYXVsdFByb3BzIH0pO1xuXG5leHBvcnQgZGVmYXVsdCBmdW5jdGlvbiB3cmFwKGVsZW1lbnQpIHtcbiAgcmV0dXJuIDxXcmFwcGVyPntlbGVtZW50fTwvV3JhcHBlcj47XG59XG4iXX0=
//# sourceMappingURL=wrapWithSimpleWrapper.js.map