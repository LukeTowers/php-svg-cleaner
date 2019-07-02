<?php namespace LukeTowers\SVGCleaner;

class SVG
{
    /**
     * Default SVG header value
     */
    const DEFAULT_HEADER = '<?xml version="1.0" encoding="utf-8" ?>' . "\n" . '<!DOCTYPE svg PUBLIC "-//W3C//DTD SVG 1.1//EN" "http://www.w3.org/Graphics/SVG/1.1/DTD/svg11.dtd">';

    /**
     * Default SVG namespace
     */
    const DEFAULT_NAMESPACE = 'http://www.w3.org/2000/svg';

    /**
     * Default SVG attribute corrections
     */
    const DEFAULT_ATTR_CORRECTIONS = [
        'id="Layer_1"'             => '',
        'xmlns="&ns_svg;"'         => 'xmlns="http://www.w3.org/2000/svg"',
        'xmlns:xlink="&ns_xlink;"' => 'xmlns:xlink="http://www.w3.org/1999/xlink"',
    ];

    /**
     * Default whitelisted SVG tags
     * @see {https://developer.mozilla.org/en-US/docs/Web/SVG/Element}
     */
    const DEFAULT_ALLOWED_TAGS = [
        'a',
        'altglyph',
        'altglyphdef',
        'altglyphitem',
        'animate',
        'animatecolor',
        'animatemotion',
        'animatetransform',
        'audio',
        'canvas',
        'circle',
        'clippath',
        'color-profile',
        'cursor',
        'defs',
        'desc',
        'discard',
        'ellipse',
        'feblend',
        'fecolormatrix',
        'fecomponenttransfer',
        'fecomposite',
        'feconvolvematrix',
        'fediffuselighting',
        'fedisplacementmap',
        'fedistantlight',
        'fedropshadow',
        'feflood',
        'fefunca',
        'fefuncb',
        'fefuncg',
        'fefuncr',
        'fegaussianblur',
        'feimage',
        'femerge',
        'femergenode',
        'femorphology',
        'feoffset',
        'fepointlight',
        'fespecularlighting',
        'fespotlight',
        'fetile',
        'feturbulence',
        'filter',
        'font',
        'font-face',
        'font-face-format',
        'font-face-name',
        'font-face-src',
        'font-face-uri',
        'g',
        'glyph',
        'glyphref',
        'hatch',
        'hatchpath',
        'hkern',
        'image',
        'line',
        'lineargradient',
        'marker',
        'mask',
        'mesh',
        'meshgradient',
        'meshpatch',
        'meshrow',
        'metadata',
        'missing-glyph',
        'mpath',
        'path',
        'pattern',
        'polygon',
        'polyline',
        'radialgradient',
        'rect',
        'set',
        'solidcolor',
        'stop',
        'style',
        'svg',
        'switch',
        'symbol',
        'text',
        'textpath',
        'title',
        'tref',
        'tspan',
        'unknown',
        'use',
        'video',
        'view',
        'vkern',
    ];

    /**
     * Default allowed SVG attributes
     * @see {https://developer.mozilla.org/en-US/docs/Web/SVG/Attribute}
     */
    const DEFAULT_ALLOWED_ATTRS = [
        'accent-height',
        'accumulate',
        'additive',
        'alignment-baseline',
        'allowreorder',
        'alphabetic',
        'amplitude',
        'arabic-form',
        'ascent',
        'attributename',
        'attributetype',
        'autoreverse',
        'azimuth',
        'basefrequency',
        'baseline-shift',
        'baseprofile',
        'bbox',
        'begin',
        'bias',
        'by',
        'calcmode',
        'cap-height',
        'class',
        'clip',
        'clippathunits',
        'clip-path',
        'clip-rule',
        'color',
        'color-interpolation',
        'color-interpolation-filters',
        'color-profile',
        'color-rendering',
        'contentstyletype',
        'cursor',
        'cx',
        'cy',
        'd',
        'decelerate',
        'descent',
        'diffuseconstant',
        'direction',
        'display',
        'divisor',
        'dominant-baseline',
        'dur',
        'dx',
        'dy',
        'edgemode',
        'elevation',
        'enable-background',
        'end',
        'exponent',
        'externalresourcesrequired',
        'fill',
        'fill-opacity',
        'fill-rule',
        'filter',
        'filterres',
        'filterunits',
        'flood-color',
        'flood-opacity',
        'font-family',
        'font-size',
        'font-size-adjust',
        'font-stretch',
        'font-style',
        'font-variant',
        'font-weight',
        'format',
        'from',
        'fx',
        'fy',
        'g1',
        'g2',
        'glyph-name',
        'glyph-orientation-horizontal',
        'glyph-orientation-vertical',
        'glyphref',
        'gradienttransform',
        'gradientunits',
        'hanging',
        'height',
        'href',
        'horiz-adv-x',
        'horiz-origin-x',
        'id',
        'ideographic',
        'image-rendering',
        'in',
        'in2',
        'intercept',
        'k',
        'k1',
        'k2',
        'k3',
        'k4',
        'kernelmatrix',
        'kernelunitlength',
        'kerning',
        'keypoints',
        'keysplines',
        'keytimes',
        'lang',
        'lengthadjust',
        'letter-spacing',
        'lighting-color',
        'limitingconeangle',
        'local',
        'marker-end',
        'marker-mid',
        'marker-start',
        'markerheight',
        'markerunits',
        'markerwidth',
        'mask',
        'maskcontentunits',
        'maskunits',
        'mathematical',
        'max',
        'media',
        'method',
        'min',
        'mode',
        'name',
        'numoctaves',
        'offset',
        'opacity',
        'operator',
        'order',
        'orient',
        'orientation',
        'origin',
        'overflow',
        'overline-position',
        'overline-thickness',
        'panose-1',
        'paint-order',
        'pathlength',
        'patterncontentunits',
        'patterntransform',
        'patternunits',
        'pointer-events',
        'points',
        'pointsatx',
        'pointsaty',
        'pointsatz',
        'preservealpha',
        'preserveaspectratio',
        'primitiveunits',
        'r',
        'radius',
        'refx',
        'refy',
        'rendering-intent',
        'repeatcount',
        'repeatdur',
        'requiredextensions',
        'requiredfeatures',
        'restart',
        'result',
        'rotate',
        'rx',
        'ry',
        'scale',
        'seed',
        'shape-rendering',
        'slope',
        'spacing',
        'specularconstant',
        'specularexponent',
        'speed',
        'spreadmethod',
        'startoffset',
        'stddeviation',
        'stemh',
        'stemv',
        'stitchtiles',
        'stop-color',
        'stop-opacity',
        'strikethrough-position',
        'strikethrough-thickness',
        'string',
        'stroke',
        'stroke-dasharray',
        'stroke-dashoffset',
        'stroke-linecap',
        'stroke-linejoin',
        'stroke-miterlimit',
        'stroke-opacity',
        'stroke-width',
        'style',
        'surfacescale',
        'systemlanguage',
        'tabindex',
        'tablevalues',
        'target',
        'targetx',
        'targety',
        'text-anchor',
        'text-decoration',
        'text-rendering',
        'textlength',
        'to',
        'transform',
        'type',
        'u1',
        'u2',
        'underline-position',
        'underline-thickness',
        'unicode',
        'unicode-bidi',
        'unicode-range',
        'units-per-em',
        'v-alphabetic',
        'v-hanging',
        'v-ideographic',
        'v-mathematical',
        'values',
        'version',
        'vert-adv-y',
        'vert-origin-x',
        'vert-origin-y',
        'viewbox',
        'viewtarget',
        'visibility',
        'width',
        'widths',
        'word-spacing',
        'writing-mode',
        'x',
        'x-height',
        'x1',
        'x2',
        'xchannelselector',
        'xlink:actuate',
        'xlink:arcrole',
        'xlink:href',
        'xlink:role',
        'xlink:show',
        'xlink:title',
        'xlink:type',
        'xml:base',
        'xml:lang',
        'xml:space',
        'xmlns',
        'xmlns:xlink',
        'xmlns:xml',
        'y',
        'y1',
        'y2',
        'ychannelselector',
        'z',
        'zoomandpan',
    ];

    /**
     * The protocols that are allowed for URLs by default
     */
    const DEFAULT_ALLOWED_PROTOCOLS = [
        'http',
        'https',
    ];

    /**
     * The domains that are allowed for URLs by default
     */
    const DEFAULT_ALLOWED_DOMAINS = [
        'creativecommons.org',
        'inkscape.org',
        'sodipodi.sourceforge.net',
        'w3.org',
    ];

    /**
     * Prepare the provided options by merging them with the default options as appropriate
     *
     * @param array $defaultOptions
     * @param array $options
     * @return array
     */
    protected static function prepareOptions(array $defaultOptions, array $options)
    {
        $defaultOptions = array_merge(['mergeDefaults' => true], $defaultOptions);

        $mergedOptions = array_merge($defaultOptions, $options);

        if ($mergedOptions['mergeDefaults']) {
            foreach ($options as $key => $value) {
                if (is_array($value)) {
                    $mergedOptions[$key] = array_merge($defaultOptions[$key], $value);
                }
            }
        }

        return $mergedOptions;
    }

    /**
     * Load the provided SVG document as a DOMDocument object
     * handling poorly formatted documents, correcting common issues
     * and stripping out the following:
     * - comments
     * - XML, PHP, ASP, other server side languages
     *
     * @param string $svg
     * @param array $options [
     *      'mergeDefaults'     => bool, // Merges the default whitelists with the custom ones provided here, defaults to true
     *      'attrCorrections'   => ['id="Layer_1"' => ''] // Array of find & replace strings to fix in the SVG document
     * ]
     * @return DomDocument|false
     */
    protected static function loadSVG(string $svg, $options = [])
    {
        extract(static::prepareOptions([
            'attrCorrections'   => static::DEFAULT_ATTR_CORRECTIONS,
        ], $options));

        // Lowercase all tags
        $svg = preg_replace('/<svg/ui', '<svg', $svg);
        $svg = preg_replace('/<\/svg>/ui', '</svg>', $svg);

        // Find the start and end tags so we can cut out miscellaneous garbage.
        if (
            (false === ($start = mb_strpos($svg, '<svg', 0, 'UTF-8'))) ||
            (false === ($end = mb_strpos($svg, '</svg', 0, 'UTF-8')))
        ) {
            return false;
        }
        $svg = mb_substr($svg, $start, ($end - $start + 6), 'UTF-8');

        // Fix bugs from old versions of Illustrator and perform any other replacements requested
        $svg = str_replace(
            array_keys($attrCorrections),
            array_values($attrCorrections),
            $svg
        );

        // Remove XML, PHP, ASP, etc.
        $svg = preg_replace('/<\?(.*)\?>/Us', '', $svg);
        $svg = preg_replace('/<\%(.*)\%>/Us', '', $svg);

        // Verify all XML, PHP, ASP, removed
        if ((false !== strpos($svg, '<?')) || (false !== strpos($svg, '<%'))) {
            return false;
        }

        // Remove comments
        $svg = preg_replace('/<!--(.*)-->/Us', '', $svg);
        $svg = preg_replace('/\/\*(.*)\*\//Us', '', $svg);

        // Verify all comments removed
        if ((false !== strpos($svg, '<!--')) || (false !== strpos($svg, '/*'))) {
            return false;
        }

        // Open it.
        libxml_use_internal_errors(true);
        libxml_disable_entity_loader(true);
        $dom = new \DOMDocument('1.0', 'UTF-8');
        $dom->formatOutput = false;
        $dom->preserveWhiteSpace = false;
        $dom->loadXML(static::DEFAULT_HEADER . "\n{$svg}");

        // Make sure there are still SVG tags.
        $svgs = $dom->getElementsByTagName('svg');
        if (!$svgs->length) {
            return false;
        }

        return $dom;
    }

    /**
     * Sanitize the provided SVG document
     *
     * @param string $svg
     * @param array $options [
     *      'mergeDefaults'     => bool, // Merges the default whitelists with the custom ones provided here, defaults to true
     *      'attrCorrections'   => ['id="Layer_1"' => ''] // Array of find & replace strings to fix in the SVG document
     *      'allowedTags'       => ['bold', 'etc'] // The tags to allow in the SVG file
     *      'allowedAttributes' => ['onload', 'etc'] // The attributes to allow in the SVG file
     *      'allowedProtocols'  => ['https', 'file', 'ws', 'etc'] // The protocols for URLs allowed in the SVG file
     *      'allowedDomains'    => ['creativecommons.org', 'example.com', 'etc'] // The domains for URLs allowed in the SVG file
     * ]
     * @return string
     */
    public static function sanitize(string $svg, $options = [])
    {
        extract(static::prepareOptions([
            'allowedTags'       => static::DEFAULT_ALLOWED_TAGS,
            'allowedAttributes' => static::DEFAULT_ALLOWED_ATTRS,
            'allowedProtocols'  => static::DEFAULT_ALLOWED_PROTOCOLS,
            'allowedDomains'    => static::DEFAULT_ALLOWED_DOMAINS,
        ], $options));

        $svgDom = static::loadSvg($svg, $options);
    }

    /**
     * Clean the provided SVG document
     *
     * @param string $svg
     * @param array $options [
     *      '', //
     * ]
     * @return string
     */
    public static function clean(string $svg, $options = [])
    {

    }

    /**
     * Validate the provided SVG document
     *
     * @param string $svg
     * @param array $options [
     *      '', //
     * ]
     * @return bool
     */
    public static function validate(string $svg, $options = [])
    {

    }
}









// // SVG attribute corrections.

// // Clean svg options.
// const SVG_CLEAN_OPTIONS = array(
//     'clean_styles'=>false,			// Consistent formatting, group like rules.
//     'fix_dimensions'=>false,		// Supply missing width, height, viewBox.
//     'namespace'=>false,				// Add an svg: namespace.
//     'random_id'=>false,				// Randomize IDs.
//     'rewrite_styles'=>false,		// Redo classes for overlaps.
//     'sanitize'=>true,				// Remove invalid/dangerous bits.
//     'save'=>false,					// Overwrite the original file with a cleaned version.
//     'strip_data'=>false,			// Remove data-X attributes.
//     'strip_id'=>false,				// Remove all IDs.
//     'strip_style'=>false,			// Remove all styles.
//     'strip_title'=>false,			// Remove all titles.
//     'whitelist_attr'=>array(),		// Additional attributes to allow.
//     'whitelist_tags'=>array(),		// Additional tags to allow.
//     'whitelist_protocols'=>array(), // Additional protocols to allow.
//     'whitelist_domains'=>array(),	// Additional domains to allow.
// );

// // SVG IRI attributes.
// // @see {https://www.w3.org/TR/SVG/linking.html}
// const SVG_IRI_ATTRIBUTES = array(
//     'href',
//     'src',
//     'xlink:arcrole',
//     'xlink:href',
//     'xlink:role',
//     'xml:base',
//     'xmlns',
//     'xmlns:xlink',
// );