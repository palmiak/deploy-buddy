"use strict";

Object.defineProperty(exports, "__esModule", {
  value: true
});
/**
 * Redux dispatch multiple actions
 */

function multi(_ref) {
  var dispatch = _ref.dispatch;

  return function (next) {
    return function (action) {
      return Array.isArray(action) ? action.filter(Boolean).map(dispatch) : next(action);
    };
  };
}

/**
 * Exports
 */

exports.default = multi;