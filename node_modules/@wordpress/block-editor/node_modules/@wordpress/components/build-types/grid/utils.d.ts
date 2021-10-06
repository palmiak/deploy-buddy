/**
 * @param {keyof typeof ALIGNMENTS | undefined} alignment
 * @return {{ alignItems?: import('react').CSSProperties['alignItems'], justifyContent?: import('react').CSSProperties['justifyContent']}} CSS props for alignment
 */
export function getAlignmentProps(alignment: keyof typeof ALIGNMENTS | undefined): {
    alignItems?: import('react').CSSProperties['alignItems'];
    justifyContent?: import('react').CSSProperties['justifyContent'];
};
declare namespace ALIGNMENTS {
    namespace bottom {
        const alignItems: string;
        const justifyContent: string;
    }
    namespace bottomLeft {
        const alignItems_1: string;
        export { alignItems_1 as alignItems };
        const justifyContent_1: string;
        export { justifyContent_1 as justifyContent };
    }
    namespace bottomRight {
        const alignItems_2: string;
        export { alignItems_2 as alignItems };
        const justifyContent_2: string;
        export { justifyContent_2 as justifyContent };
    }
    namespace center {
        const alignItems_3: string;
        export { alignItems_3 as alignItems };
        const justifyContent_3: string;
        export { justifyContent_3 as justifyContent };
    }
    namespace spaced {
        const alignItems_4: string;
        export { alignItems_4 as alignItems };
        const justifyContent_4: string;
        export { justifyContent_4 as justifyContent };
    }
    namespace left {
        const alignItems_5: string;
        export { alignItems_5 as alignItems };
        const justifyContent_5: string;
        export { justifyContent_5 as justifyContent };
    }
    namespace right {
        const alignItems_6: string;
        export { alignItems_6 as alignItems };
        const justifyContent_6: string;
        export { justifyContent_6 as justifyContent };
    }
    namespace stretch {
        const alignItems_7: string;
        export { alignItems_7 as alignItems };
    }
    namespace top {
        const alignItems_8: string;
        export { alignItems_8 as alignItems };
        const justifyContent_7: string;
        export { justifyContent_7 as justifyContent };
    }
    namespace topLeft {
        const alignItems_9: string;
        export { alignItems_9 as alignItems };
        const justifyContent_8: string;
        export { justifyContent_8 as justifyContent };
    }
    namespace topRight {
        const alignItems_10: string;
        export { alignItems_10 as alignItems };
        const justifyContent_9: string;
        export { justifyContent_9 as justifyContent };
    }
}
export {};
//# sourceMappingURL=utils.d.ts.map