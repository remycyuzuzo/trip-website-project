import { getImageSrc } from '../../utils/imageUtils';
var SCROLL_EFFECT_CSS_CLASS = 'scroll-css-var--scrollEffect'; // exclusion of Edge18: https://jira.wixpress.com/browse/BOLT-1828

var isEdge18 = function isEdge18(windowObj) {
    return RegExp('Edge\/18').test(windowObj.navigator.userAgent);
};

var isIntersectionObserverSupported = function isIntersectionObserverSupported() {
    return window && 'IntersectionObserver' in window && 'IntersectionObserverEntry' in window && 'intersectionRatio' in window.IntersectionObserverEntry.prototype && 'isIntersecting' in window.IntersectionObserverEntry.prototype && !isEdge18(window);
}; // due to bug in intersectionObserver Edge18 for strips with parallax|reveal effect, images in fixed position


var ImageLoader = /*#__PURE__*/function () {
    function ImageLoader(mutationService) {
        this.mutationService = mutationService;

        if (isIntersectionObserverSupported()) {
            this.intersectionObserver = new IntersectionObserver(this.getViewPortIntersectionHandler(), {
                rootMargin: '50% 0px'
            });
            this.scrollEffectsIntersectionObserver = new IntersectionObserver(this.getScrollEffectsIntersectionHandler(), {
                rootMargin: '10% 0px'
            });
        }
    }

    var _proto = ImageLoader.prototype;

    _proto.isImageInViewPort = function isImageInViewPort(boundingRect, screenHeight) {
        return boundingRect.top + boundingRect.height >= 0 && boundingRect.bottom - boundingRect.height <= screenHeight;
    };

    _proto.loadImage = function loadImage(wixImageNode, _ref) {
        var screenHeight = _ref.screenHeight,
            boundingRect = _ref.boundingRect,
            withScrollEffectVars = _ref.withScrollEffectVars;

        // TODO: do not check manually is-in-viewport, breaks lazy-load of fixed positioned images
        // but find solution for hover-box blink
        if (!this.intersectionObserver || this.isImageInViewPort(boundingRect, screenHeight)) {
            this.setImageSource(wixImageNode);
        } else {
            this.intersectionObserver.unobserve(wixImageNode);
            this.intersectionObserver.observe(wixImageNode);
        }

        if (withScrollEffectVars && this.scrollEffectsIntersectionObserver) {
            this.scrollEffectsIntersectionObserver.unobserve(wixImageNode);
            this.scrollEffectsIntersectionObserver.observe(wixImageNode);
        }
    };

    _proto.onImageDisconnected = function onImageDisconnected(wixImageNode) {
        if (this.intersectionObserver) {
            this.intersectionObserver.unobserve(wixImageNode);
        }

        if (this.scrollEffectsIntersectionObserver) {
            this.scrollEffectsIntersectionObserver.unobserve(wixImageNode);
        }
    };

    _proto.setSrcAttribute = function setSrcAttribute(imageNode, isSvg, src) {
        var currentSrc = getImageSrc(imageNode, isSvg);

        if (currentSrc === src) {
            return;
        }

        if (isSvg) {
            imageNode.setAttributeNS('http://www.w3.org/1999/xlink', 'xlink:href', src);
        } else {
            imageNode.src = src;
        }
    };

    _proto.setSourceSetAttribute = function setSourceSetAttribute(sourceNode, src) {
        var currentSrc = sourceNode.srcset;

        if (currentSrc === src) {
            return;
        }

        sourceNode.srcset = src;
    };

    _proto.setImageSource = function setImageSource(wixImageNode) {
        var _this = this;

        var isSvg = wixImageNode.dataset.isSvg === 'true';
        var imageNode = wixImageNode.querySelector(isSvg ? 'image' : 'img');
        var pictureNode = wixImageNode.querySelector('picture');
        this.setSrcAttribute(imageNode, isSvg, wixImageNode.dataset.src);

        if (pictureNode) {
            Array.from(pictureNode.querySelectorAll('source')).forEach(function (sourceNode) {
                _this.setSourceSetAttribute(sourceNode, sourceNode.dataset.srcset);
            });
        }
    };

    _proto.getViewPortIntersectionHandler = function getViewPortIntersectionHandler() {
        var _this2 = this;

        return function (entries, observer) {
            entries.filter(function (entry) {
                return entry.isIntersecting;
            }).forEach(function (entry) {
                var lazyImage = entry.target;

                _this2.setImageSource(lazyImage);

                observer.unobserve(lazyImage);
            });
        };
    };

    _proto.getScrollEffectsIntersectionHandler = function getScrollEffectsIntersectionHandler() {
        var _this3 = this;

        return function (entries) {
            return entries.forEach(function (entry) {
                var wixImageNode = entry.target;

                if (entry.isIntersecting) {
                    _this3.mutationService.mutate(function () {
                        return wixImageNode.classList.add(SCROLL_EFFECT_CSS_CLASS);
                    });
                } else {
                    _this3.mutationService.mutate(function () {
                        return wixImageNode.classList.remove(SCROLL_EFFECT_CSS_CLASS);
                    });
                }
            });
        };
    };

    return ImageLoader;
}();

export default ImageLoader;
//# sourceMappingURL=imageLoader.js.map