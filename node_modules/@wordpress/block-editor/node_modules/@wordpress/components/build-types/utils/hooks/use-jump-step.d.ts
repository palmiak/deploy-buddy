export default useJumpStep;
/**
 * A custom hook that calculates a step value (used by elements like input
 * [type="number"]). This value can be modified based on whether the Shift
 * key is being held down.
 *
 * For example, a shiftStep of 10, and a step of 1...
 * Starting from 10, the next incremented value will be 11.
 *
 * Holding down shift...
 * Starting from 10, the next incremented value will be 20.
 *
 * @param {Object}  props                           Properties for the hook.
 * @param {boolean} [props.isShiftStepEnabled=true] Determines if jumping values with shift is enabled
 * @param {number}  [props.shiftStep=10]            Multiplier to jump by, when holding shift key.
 * @param {number}  [props.step=1]                  Multiplier to jump by, when not-holding shift key.
 *
 * @return {number} The jump step value.
 */
declare function useJumpStep({ isShiftStepEnabled, shiftStep, step, }: {
    isShiftStepEnabled: boolean | undefined;
    shiftStep: number | undefined;
    step: number | undefined;
}): number;
//# sourceMappingURL=use-jump-step.d.ts.map