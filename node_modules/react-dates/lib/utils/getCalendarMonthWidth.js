"use strict";

Object.defineProperty(exports, "__esModule", {
  value: true
});
exports["default"] = getCalendarMonthWidth;
function getCalendarMonthWidth(daySize, calendarMonthPadding) {
  return 7 * daySize + 2 * calendarMonthPadding + 1;
}