/**
 * @param {string} word
 * @param {number} headLength
 * @param {number} tailLength
 * @param {string} ellipsis
 */
export function truncateMiddle(word: string, headLength: number, tailLength: number, ellipsis: string): string;
/**
 *
 * @param {string}                        words
 * @param {typeof TRUNCATE_DEFAULT_PROPS} props
 */
export function truncateContent(words: string | undefined, props: typeof TRUNCATE_DEFAULT_PROPS): string;
export const TRUNCATE_ELLIPSIS: "…";
export namespace TRUNCATE_TYPE {
    const auto: string;
    const head: string;
    const middle: string;
    const tail: string;
    const none: string;
}
export namespace TRUNCATE_DEFAULT_PROPS {
    export { TRUNCATE_ELLIPSIS as ellipsis };
    import ellipsizeMode = TRUNCATE_TYPE.auto;
    export { ellipsizeMode };
    export const limit: number;
    export const numberOfLines: number;
}
//# sourceMappingURL=utils.d.ts.map