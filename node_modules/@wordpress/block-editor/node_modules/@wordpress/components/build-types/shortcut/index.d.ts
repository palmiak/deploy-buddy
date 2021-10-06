export default Shortcut;
export type Shortcut = string | {
    display: string;
    ariaLabel: string;
};
export type Props = {
    /**
     * Shortcut configuration
     */
    shortcut: Shortcut;
    /**
     * Classname
     */
    className?: string | undefined;
};
/** @typedef {string | { display: string, ariaLabel: string }} Shortcut */
/**
 * @typedef Props
 * @property {Shortcut} shortcut    Shortcut configuration
 * @property {string}   [className] Classname
 */
/**
 * @param {Props} props Props
 * @return {JSX.Element | null} Element
 */
declare function Shortcut({ shortcut, className }: Props): JSX.Element | null;
//# sourceMappingURL=index.d.ts.map