# php-svg-cleaner
SVG Sanitization / cleanup in PHP; WIP rebuild of https://github.com/Blobfolio/blob-common focusing on just SVG sanitization.

# NOT CURRENTLY IN A USABLE STATE

## Defaults:

### `$attrCorrections` | array
```php
[
    'id="Layer_1"'             => '',
    'xmlns="&ns_svg;"'         => 'xmlns="http://www.w3.org/2000/svg"',
    'xmlns:xlink="&ns_xlink;"' => 'xmlns:xlink="http://www.w3.org/1999/xlink"',
]
```

### `$svgHeader` | string
`'<?xml version="1.0" encoding="utf-8" ?>' . "\n" . '<!DOCTYPE svg PUBLIC "-//W3C//DTD SVG 1.1//EN" "http://www.w3.org/Graphics/SVG/1.1/DTD/svg11.dtd">'`

### `$svgNamespace` | string
`'http://www.w3.org/2000/svg'`

### `$allowedTags` | array | see [https://developer.mozilla.org/en-US/docs/Web/SVG/Element](https://developer.mozilla.org/en-US/docs/Web/SVG/Element)
```php
['a', 'altglyph', 'altglyphdef', 'altglyphitem', 'animate', 'animatecolor', 'animatemotion', 'animatetransform', 'audio', 'canvas', 'circle', 'clippath', 'color-profile', 'cursor', 'defs', 'desc', 'discard', 'ellipse', 'feblend', 'fecolormatrix', 'fecomponenttransfer', 'fecomposite', 'feconvolvematrix', 'fediffuselighting', 'fedisplacementmap', 'fedistantlight', 'fedropshadow', 'feflood', 'fefunca', 'fefuncb', 'fefuncg', 'fefuncr', 'fegaussianblur', 'feimage', 'femerge', 'femergenode', 'femorphology', 'feoffset', 'fepointlight', 'fespecularlighting', 'fespotlight', 'fetile', 'feturbulence', 'filter', 'font', 'font-face', 'font-face-format', 'font-face-name', 'font-face-src', 'font-face-uri', 'g', 'glyph', 'glyphref', 'hatch', 'hatchpath', 'hkern', 'image', 'line', 'lineargradient', 'marker', 'mask', 'mesh', 'meshgradient', 'meshpatch', 'meshrow', 'metadata', 'missing-glyph', 'mpath', 'path', 'pattern', 'polygon', 'polyline', 'radialgradient', 'rect', 'set', 'solidcolor', 'stop', 'style', 'svg', 'switch', 'symbol', 'text', 'textpath', 'title', 'tref', 'tspan', 'unknown', 'use', 'video', 'view', 'vkern']
```

### `$allowedAttrs` | array | see [https://developer.mozilla.org/en-US/docs/Web/SVG/Attribute](https://developer.mozilla.org/en-US/docs/Web/SVG/Attribute)
```php
['accent-height', 'accumulate', 'additive', 'alignment-baseline', 'allowreorder', 'alphabetic', 'amplitude', 'arabic-form', 'ascent', 'attributename', 'attributetype', 'autoreverse', 'azimuth', 'basefrequency', 'baseline-shift', 'baseprofile', 'bbox', 'begin', 'bias', 'by', 'calcmode', 'cap-height', 'class', 'clip', 'clippathunits', 'clip-path', 'clip-rule', 'color', 'color-interpolation', 'color-interpolation-filters', 'color-profile', 'color-rendering', 'contentstyletype', 'cursor', 'cx', 'cy', 'd', 'decelerate', 'descent', 'diffuseconstant', 'direction', 'display', 'divisor', 'dominant-baseline', 'dur', 'dx', 'dy', 'edgemode', 'elevation', 'enable-background', 'end', 'exponent', 'externalresourcesrequired', 'fill', 'fill-opacity', 'fill-rule', 'filter', 'filterres', 'filterunits', 'flood-color', 'flood-opacity', 'font-family', 'font-size', 'font-size-adjust', 'font-stretch', 'font-style', 'font-variant', 'font-weight', 'format', 'from', 'fx', 'fy', 'g1', 'g2', 'glyph-name', 'glyph-orientation-horizontal', 'glyph-orientation-vertical', 'glyphref', 'gradienttransform', 'gradientunits', 'hanging', 'height', 'href', 'horiz-adv-x', 'horiz-origin-x', 'id', 'ideographic', 'image-rendering', 'in', 'in2', 'intercept', 'k', 'k1', 'k2', 'k3', 'k4', 'kernelmatrix', 'kernelunitlength', 'kerning', 'keypoints', 'keysplines', 'keytimes', 'lang', 'lengthadjust', 'letter-spacing', 'lighting-color', 'limitingconeangle', 'local', 'marker-end', 'marker-mid', 'marker-start', 'markerheight', 'markerunits', 'markerwidth', 'mask', 'maskcontentunits', 'maskunits', 'mathematical', 'max', 'media', 'method', 'min', 'mode', 'name', 'numoctaves', 'offset', 'opacity', 'operator', 'order', 'orient', 'orientation', 'origin', 'overflow', 'overline-position', 'overline-thickness', 'panose-1', 'paint-order', 'pathlength', 'patterncontentunits', 'patterntransform', 'patternunits', 'pointer-events', 'points', 'pointsatx', 'pointsaty', 'pointsatz', 'preservealpha', 'preserveaspectratio', 'primitiveunits', 'r', 'radius', 'refx', 'refy', 'rendering-intent', 'repeatcount', 'repeatdur', 'requiredextensions', 'requiredfeatures', 'restart', 'result', 'rotate', 'rx', 'ry', 'scale', 'seed', 'shape-rendering', 'slope', 'spacing', 'specularconstant', 'specularexponent', 'speed', 'spreadmethod', 'startoffset', 'stddeviation', 'stemh', 'stemv', 'stitchtiles', 'stop-color', 'stop-opacity', 'strikethrough-position', 'strikethrough-thickness', 'string', 'stroke', 'stroke-dasharray', 'stroke-dashoffset', 'stroke-linecap', 'stroke-linejoin', 'stroke-miterlimit', 'stroke-opacity', 'stroke-width', 'style', 'surfacescale', 'systemlanguage', 'tabindex', 'tablevalues', 'target', 'targetx', 'targety', 'text-anchor', 'text-decoration', 'text-rendering', 'textlength', 'to', 'transform', 'type', 'u1', 'u2', 'underline-position', 'underline-thickness', 'unicode', 'unicode-bidi', 'unicode-range', 'units-per-em', 'v-alphabetic', 'v-hanging', 'v-ideographic', 'v-mathematical', 'values', 'version', 'vert-adv-y', 'vert-origin-x', 'vert-origin-y', 'viewbox', 'viewtarget', 'visibility', 'width', 'widths', 'word-spacing', 'writing-mode', 'x', 'x-height', 'x1', 'x2', 'xchannelselector', 'xlink:actuate', 'xlink:arcrole', 'xlink:href', 'xlink:role', 'xlink:show', 'xlink:title', 'xlink:type', 'xml:base', 'xml:lang', 'xml:space', 'xmlns', 'xmlns:xlink', 'xmlns:xml', 'y', 'y1', 'y2', 'ychannelselector', 'z', 'zoomandpan']
```