/// <reference types="react" />
export declare type ScrollableDirection = 'x' | 'y' | 'auto';
export declare type Props = {
    /**
     * Renders a scrollbar for a specific axis when content overflows.
     *
     * @default 'y'
     */
    scrollDirection?: ScrollableDirection;
    /**
     * Enables (CSS) smooth scrolling.
     *
     * @default false
     */
    smoothScroll?: boolean;
    /**
     * The children elements.
     */
    children: React.ReactNode;
};
//# sourceMappingURL=types.d.ts.map