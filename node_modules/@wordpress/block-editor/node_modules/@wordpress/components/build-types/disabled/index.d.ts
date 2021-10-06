export default Disabled;
export type OwnProps = {
    /**
     * Classname for the disabled element.
     */
    className?: string | undefined;
    /**
     * Children to disable.
     */
    children: import('react').ReactNode;
    /**
     * Whether to disable the children.
     */
    isDisabled?: boolean | undefined;
};
/**
 * @typedef OwnProps
 * @property {string}                    [className]       Classname for the disabled element.
 * @property {import('react').ReactNode} children          Children to disable.
 * @property {boolean}                   [isDisabled=true] Whether to disable the children.
 */
/**
 * @param {OwnProps & import('react').HTMLAttributes<HTMLDivElement>} props
 * @return {JSX.Element} Element wrapping the children to disable them when isDisabled is true.
 */
declare function Disabled({ className, children, isDisabled, ...props }: OwnProps & import('react').HTMLAttributes<HTMLDivElement>): JSX.Element;
declare namespace Disabled {
    export { Context };
    export { Consumer };
}
declare const Context: import("react").Context<boolean>;
declare const Consumer: import("react").Consumer<boolean>;
//# sourceMappingURL=index.d.ts.map