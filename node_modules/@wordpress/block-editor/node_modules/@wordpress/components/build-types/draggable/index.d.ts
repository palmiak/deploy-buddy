/**
 * @typedef RenderProp
 * @property {(event: import('react').DragEvent) => void} onDraggableStart `onDragStart` handler.
 * @property {(event: import('react').DragEvent) => void} onDraggableEnd   `onDragEnd` handler.
 */
/**
 * @typedef Props
 * @property {(props: RenderProp) => JSX.Element | null}  children                         Children.
 * @property {(event: import('react').DragEvent) => void} [onDragStart]                    Callback when dragging starts.
 * @property {(event: import('react').DragEvent) => void} [onDragOver]                     Callback when dragging happens over the document.
 * @property {(event: import('react').DragEvent) => void} [onDragEnd]                      Callback when dragging ends.
 * @property {string}                                     [cloneClassname]                 Classname for the cloned element.
 * @property {string}                                     [elementId]                      ID for the element.
 * @property {any}                                        [transferData]                   Transfer data for the drag event.
 * @property {string}                                     [__experimentalTransferDataType] The transfer data type to set.
 * @property {import('react').ReactNode}                  __experimentalDragComponent      Component to show when dragging.
 */
/**
 * @param {Props} props
 * @return {JSX.Element} A draggable component.
 */
export default function Draggable({ children, onDragStart, onDragOver, onDragEnd, cloneClassname, elementId, transferData, __experimentalTransferDataType: transferDataType, __experimentalDragComponent: dragComponent, }: Props): JSX.Element;
export type RenderProp = {
    /**
     * `onDragStart` handler.
     */
    onDraggableStart: (event: import('react').DragEvent) => void;
    /**
     * `onDragEnd` handler.
     */
    onDraggableEnd: (event: import('react').DragEvent) => void;
};
export type Props = {
    /**
     * Children.
     */
    children: (props: RenderProp) => JSX.Element | null;
    /**
     * Callback when dragging starts.
     */
    onDragStart?: ((event: import('react').DragEvent) => void) | undefined;
    /**
     * Callback when dragging happens over the document.
     */
    onDragOver?: ((event: import('react').DragEvent) => void) | undefined;
    /**
     * Callback when dragging ends.
     */
    onDragEnd?: ((event: import('react').DragEvent) => void) | undefined;
    /**
     * Classname for the cloned element.
     */
    cloneClassname?: string | undefined;
    /**
     * ID for the element.
     */
    elementId?: string | undefined;
    /**
     * Transfer data for the drag event.
     */
    transferData?: any;
    /**
     * The transfer data type to set.
     */
    __experimentalTransferDataType?: string | undefined;
    /**
     * Component to show when dragging.
     */
    __experimentalDragComponent: import('react').ReactNode;
};
//# sourceMappingURL=index.d.ts.map