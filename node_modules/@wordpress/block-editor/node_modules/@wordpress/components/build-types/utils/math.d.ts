/**
 * Parses and retrieves a number value.
 *
 * @param {unknown} value The incoming value.
 *
 * @return {number} The parsed number value.
 */
export function getNumber(value: unknown): number;
/**
 * Safely adds 2 values.
 *
 * @param {Array<number|string>} args Values to add together.
 *
 * @return {number} The sum of values.
 */
export function add(...args: Array<number | string>): number;
/**
 * Safely subtracts 2 values.
 *
 * @param {Array<number|string>} args Values to subtract together.
 *
 * @return {number} The difference of the values.
 */
export function subtract(...args: Array<number | string>): number;
/**
 * Clamps a value based on a min/max range with rounding
 *
 * @param {number} value The value.
 * @param {number} min   The minimum range.
 * @param {number} max   The maximum range.
 * @param {number} step  A multiplier for the value.
 *
 * @return {number} The rounded and clamped value.
 */
export function roundClamp(value?: number, min?: number, max?: number, step?: number): number;
/**
 * Clamps a value based on a min/max range with rounding.
 * Returns a string.
 *
 * @param {Parameters<typeof roundClamp>} args Arguments for roundClamp().
 * @return {string} The rounded and clamped value.
 */
export function roundClampString(value?: number | undefined, min?: number | undefined, max?: number | undefined, step?: number | undefined): string;
//# sourceMappingURL=math.d.ts.map