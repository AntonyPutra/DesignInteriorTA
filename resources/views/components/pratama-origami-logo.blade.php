{{-- Pratama 3D Origami / Ribbon 'P' Logo Component --}}
@props(['width' => '54', 'height' => '64', 'class' => ''])

<svg width="{{ $width }}" height="{{ $height }}" viewBox="0 0 54 64" fill="none" xmlns="http://www.w3.org/2000/svg" class="{{ $class }}">
    {{-- Vertical white stem --}}
    <path d="M6 22H18V64H6V22Z" fill="#FFFFFF" />
    
    {{-- Top red origami ribbon fold --}}
    <path d="M6 18L32 0L48 12L22 30L6 18Z" fill="#D32F2F" />
    
    {{-- Side right crimson shadow facet --}}
    <path d="M48 12L48 34L22 52L22 30L48 12Z" fill="#991B1B" />
</svg>
