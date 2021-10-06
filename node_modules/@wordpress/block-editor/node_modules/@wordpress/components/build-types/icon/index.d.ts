/**
 * External dependencies
 */
import type { ComponentType, SVGProps } from 'react';
import type { IconKey as DashiconIconKey } from '../dashicon/types';
declare type IconType<P> = DashiconIconKey | ComponentType<P> | JSX.Element;
interface BaseProps<P> {
    /**
     * The icon to render. Supported values are: Dashicons (specified as
     * strings), functions, Component instances and `null`.
     *
     * @default null
     */
    icon?: IconType<P> | null;
    /**
     * The size (width and height) of the icon.
     *
     * @default 24
     */
    size?: number;
}
declare type AdditionalProps<T> = T extends ComponentType<infer U> ? U : T extends DashiconIconKey ? SVGProps<SVGSVGElement> : {};
export declare type Props<P> = BaseProps<P> & AdditionalProps<IconType<P>>;
declare function Icon<P>({ icon, size, ...additionalProps }: Props<P>): JSX.Element | null;
export default Icon;
//# sourceMappingURL=index.d.ts.map