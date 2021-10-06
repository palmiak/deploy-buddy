/**
 * @param {GetAnimateOptions} options
 *
 * @return {string | void} ClassName that applies the animations
 */
export function getAnimateClassName(options: GetAnimateOptions): string | void;
export default function Animate({ type, options, children }: {
    type: any;
    options?: {} | undefined;
    children: any;
}): any;
export type AppearOrigin = "top" | "top left" | "top right" | "middle" | "middle left" | "middle right" | "bottom" | "bottom left" | "bottom right";
export type SlideInOrigin = "left" | "right";
export type AppearOptions = {
    type: 'appear';
    origin?: "top" | "top left" | "top right" | "middle" | "middle left" | "middle right" | "bottom" | "bottom left" | "bottom right" | undefined;
};
export type SlideInOptions = {
    type: 'slide-in';
    origin?: "left" | "right" | undefined;
};
export type LoadingOptions = {
    type: 'loading';
};
export type GetAnimateOptions = AppearOptions | SlideInOptions | LoadingOptions;
//# sourceMappingURL=index.d.ts.map