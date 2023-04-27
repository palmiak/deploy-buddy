/**
 * External dependencies
 */
import type { CSSProperties, ReactNode, ReactText } from 'react';
/**
 * Internal dependencies
 */
import type { Props as ControlLabelProps } from '../control-label/types';
import type { Props as GridProps } from '../../grid/types';
export declare type FormGroupLabelProps = ControlLabelProps & {
    labelHidden?: boolean;
    id?: ReactText;
};
export declare type FormGroupContentProps = FormGroupLabelProps & {
    alignLabel?: CSSProperties['textAlign'];
    help?: ReactNode;
    horizontal?: boolean;
    label?: ReactNode;
    spacing?: CSSProperties['width'];
    truncate?: boolean;
};
declare type Horizontal = GridProps & {
    horizontal: true;
};
declare type Vertical = {
    horizontal: false;
};
export declare type FormGroupProps = FormGroupContentProps & (Horizontal | Vertical);
export {};
//# sourceMappingURL=types.d.ts.map