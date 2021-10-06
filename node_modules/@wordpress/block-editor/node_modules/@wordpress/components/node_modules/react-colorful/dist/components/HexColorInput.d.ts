import React from "react";
interface ComponentProps {
    prefixed: boolean;
    color: string;
    onChange: (newColor: string) => void;
}
declare type InputProps = Omit<React.InputHTMLAttributes<HTMLInputElement>, "onChange" | "value">;
export declare const HexColorInput: (props: Partial<InputProps & ComponentProps>) => JSX.Element;
export {};
