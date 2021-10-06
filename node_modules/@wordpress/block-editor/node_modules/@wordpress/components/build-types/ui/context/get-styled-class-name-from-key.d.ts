import memoize from 'memize';
/**
 * Generates the connected component CSS className based on the namespace.
 *
 * @param  namespace The name of the connected component.
 * @return The generated CSS className.
 */
declare function getStyledClassName(namespace: string): string;
export declare const getStyledClassNameFromKey: typeof getStyledClassName & memoize.MemizeMemoizedFunction;
export {};
//# sourceMappingURL=get-styled-class-name-from-key.d.ts.map