//var $=jQuery.noConflict();
/*! lozad.js - v1.16.0 - 2020-09-06
* https://github.com/ApoorvSaxena/lozad.js
* Copyright (c) 2020 Apoorv Saxena; Licensed MIT */


(function (global, factory) {
  typeof exports === 'object' && typeof module !== 'undefined' ? module.exports = factory() :
  typeof define === 'function' && define.amd ? define(factory) :
  (global.lozad = factory());
}(this, (function () { 'use strict';

  /**
   * Detect IE browser
   * @const {boolean}
   * @private
   */
  var isIE = typeof document !== 'undefined' && document.documentMode;

  var defaultConfig = {
    rootMargin: '0px',
    threshold: 0,
    load: function load(element) {
      if (element.nodeName.toLowerCase() === 'picture') {
        var img = element.querySelector('img');
        var append = false;

        if (img === null) {
          img = document.createElement('img');
          append = true;
        }

        if (isIE && element.getAttribute('data-iesrc')) {
          img.src = element.getAttribute('data-iesrc');
        }

        if (element.getAttribute('data-alt')) {
          img.alt = element.getAttribute('data-alt');
        }

        if (append) {
          element.append(img);
        }
      }

      if (element.nodeName.toLowerCase() === 'video' && !element.getAttribute('data-src')) {
        if (element.children) {
          var childs = element.children;
          var childSrc = void 0;
          for (var i = 0; i <= childs.length - 1; i++) {
            childSrc = childs[i].getAttribute('data-src');
            if (childSrc) {
              childs[i].src = childSrc;
            }
          }

          element.load();
        }
      }

      if (element.getAttribute('data-poster')) {
        element.poster = element.getAttribute('data-poster');
      }

      if (element.getAttribute('data-src')) {
        element.src = element.getAttribute('data-src');
      }

      if (element.getAttribute('data-srcset')) {
        element.setAttribute('srcset', element.getAttribute('data-srcset'));
      }

      var backgroundImageDelimiter = ',';
      if (element.getAttribute('data-background-delimiter')) {
        backgroundImageDelimiter = element.getAttribute('data-background-delimiter');
      }

      if (element.getAttribute('data-background-image')) {
        element.style.backgroundImage = 'url(\'' + element.getAttribute('data-background-image').split(backgroundImageDelimiter).join('\'),url(\'') + '\')';
      } else if (element.getAttribute('data-background-image-set')) {
        var imageSetLinks = element.getAttribute('data-background-image-set').split(backgroundImageDelimiter);
        var firstUrlLink = imageSetLinks[0].substr(0, imageSetLinks[0].indexOf(' ')) || imageSetLinks[0]; // Substring before ... 1x
        firstUrlLink = firstUrlLink.indexOf('url(') === -1 ? 'url(' + firstUrlLink + ')' : firstUrlLink;
        if (imageSetLinks.length === 1) {
          element.style.backgroundImage = firstUrlLink;
        } else {
          element.setAttribute('style', (element.getAttribute('style') || '') + ('background-image: ' + firstUrlLink + '; background-image: -webkit-image-set(' + imageSetLinks + '); background-image: image-set(' + imageSetLinks + ')'));
        }
      }

      if (element.getAttribute('data-toggle-class')) {
        element.classList.toggle(element.getAttribute('data-toggle-class'));
      }
    },
    loaded: function loaded() {}
  };

  function markAsLoaded(element) {
    element.setAttribute('data-loaded', true);
  }

  function preLoad(element) {
    if (element.getAttribute('data-placeholder-background')) {
      element.style.background = element.getAttribute('data-placeholder-background');
    }
  }

  var isLoaded = function isLoaded(element) {
    return element.getAttribute('data-loaded') === 'true';
  };

  var onIntersection = function onIntersection(load, loaded) {
    return function (entries, observer) {
      entries.forEach(function (entry) {
        if (entry.intersectionRatio > 0 || entry.isIntersecting) {
          observer.unobserve(entry.target);

          if (!isLoaded(entry.target)) {
            load(entry.target);
            markAsLoaded(entry.target);
            loaded(entry.target);
          }
        }
      });
    };
  };

  var getElements = function getElements(selector) {
    var root = arguments.length > 1 && arguments[1] !== undefined ? arguments[1] : document;

    if (selector instanceof Element) {
      return [selector];
    }

    if (selector instanceof NodeList) {
      return selector;
    }

    return root.querySelectorAll(selector);
  };

  function lozad () {
    var selector = arguments.length > 0 && arguments[0] !== undefined ? arguments[0] : '.lozad';
    var options = arguments.length > 1 && arguments[1] !== undefined ? arguments[1] : {};

    var _Object$assign = Object.assign({}, defaultConfig, options),
        root = _Object$assign.root,
        rootMargin = _Object$assign.rootMargin,
        threshold = _Object$assign.threshold,
        load = _Object$assign.load,
        loaded = _Object$assign.loaded;

    var observer = void 0;

    if (typeof window !== 'undefined' && window.IntersectionObserver) {
      observer = new IntersectionObserver(onIntersection(load, loaded), {
        root: root,
        rootMargin: rootMargin,
        threshold: threshold
      });
    }

    var elements = getElements(selector, root);
    for (var i = 0; i < elements.length; i++) {
      preLoad(elements[i]);
    }

    return {
      observe: function observe() {
        var elements = getElements(selector, root);

        for (var _i = 0; _i < elements.length; _i++) {
          if (isLoaded(elements[_i])) {
            continue;
          }

          if (observer) {
            observer.observe(elements[_i]);
            continue;
          }

          load(elements[_i]);
          markAsLoaded(elements[_i]);
          loaded(elements[_i]);
        }
      },
      triggerLoad: function triggerLoad(element) {
        if (isLoaded(element)) {
          return;
        }

        load(element);
        markAsLoaded(element);
        loaded(element);
      },

      observer: observer
    };
  }

  return lozad;

})));

(function (global, factory) {
  typeof exports === 'object' && typeof module !== 'undefined' ? module.exports = factory() :
  typeof define === 'function' && define.amd ? define(factory) :
  (global = global || self, global.LazyLoad = factory());
}(this, (function () { 'use strict';

  function _extends() {
    _extends = Object.assign || function (target) {
      for (var i = 1; i < arguments.length; i++) {
        var source = arguments[i];

        for (var key in source) {
          if (Object.prototype.hasOwnProperty.call(source, key)) {
            target[key] = source[key];
          }
        }
      }

      return target;
    };

    return _extends.apply(this, arguments);
  }

  var runningOnBrowser = typeof window !== "undefined";
  var isBot = runningOnBrowser && !("onscroll" in window) || typeof navigator !== "undefined" && /(gle|ing|ro)bot|crawl|spider/i.test(navigator.userAgent);
  var supportsIntersectionObserver = runningOnBrowser && "IntersectionObserver" in window;
  var supportsClassList = runningOnBrowser && "classList" in document.createElement("p");
  var isHiDpi = runningOnBrowser && window.devicePixelRatio > 1;

  var defaultSettings = {
    elements_selector: ".lazy",
    container: isBot || runningOnBrowser ? document : null,
    threshold: 300,
    thresholds: null,
    data_src: "src",
    data_srcset: "srcset",
    data_sizes: "sizes",
    data_bg: "bg",
    data_bg_hidpi: "bg-hidpi",
    data_bg_multi: "bg-multi",
    data_bg_multi_hidpi: "bg-multi-hidpi",
    data_poster: "poster",
    class_applied: "applied",
    class_loading: "loading",
    class_loaded: "loaded",
    class_error: "error",
    class_entered: "entered",
    class_exited: "exited",
    unobserve_completed: true,
    unobserve_entered: false,
    cancel_on_exit: true,
    callback_enter: null,
    callback_exit: null,
    callback_applied: null,
    callback_loading: null,
    callback_loaded: null,
    callback_error: null,
    callback_finish: null,
    callback_cancel: null,
    use_native: false
  };
  var getExtendedSettings = function getExtendedSettings(customSettings) {
    return _extends({}, defaultSettings, customSettings);
  };

  /* Creates instance and notifies it through the window element */
  var createInstance = function createInstance(classObj, options) {
    var event;
    var eventString = "LazyLoad::Initialized";
    var instance = new classObj(options);

    try {
      // Works in modern browsers
      event = new CustomEvent(eventString, {
        detail: {
          instance: instance
        }
      });
    } catch (err) {
      // Works in Internet Explorer (all versions)
      event = document.createEvent("CustomEvent");
      event.initCustomEvent(eventString, false, false, {
        instance: instance
      });
    }

    window.dispatchEvent(event);
  };
  /* Auto initialization of one or more instances of lazyload, depending on the 
      options passed in (plain object or an array) */


  var autoInitialize = function autoInitialize(classObj, options) {
    if (!options) {
      return;
    }

    if (!options.length) {
      // Plain object
      createInstance(classObj, options);
    } else {
      // Array of objects
      for (var i = 0, optionsItem; optionsItem = options[i]; i += 1) {
        createInstance(classObj, optionsItem);
      }
    }
  };

  var statusLoading = "loading";
  var statusLoaded = "loaded";
  var statusApplied = "applied";
  var statusEntered = "entered";
  var statusError = "error";
  var statusNative = "native";

  var dataPrefix = "data-";
  var statusDataName = "ll-status";
  var getData = function getData(element, attribute) {
    return element.getAttribute(dataPrefix + attribute);
  };
  var setData = function setData(element, attribute, value) {
    var attrName = dataPrefix + attribute;

    if (value === null) {
      element.removeAttribute(attrName);
      return;
    }

    element.setAttribute(attrName, value);
  };
  var getStatus = function getStatus(element) {
    return getData(element, statusDataName);
  };
  var setStatus = function setStatus(element, status) {
    return setData(element, statusDataName, status);
  };
  var resetStatus = function resetStatus(element) {
    return setStatus(element, null);
  };
  var hasEmptyStatus = function hasEmptyStatus(element) {
    return getStatus(element) === null;
  };
  var hasStatusLoading = function hasStatusLoading(element) {
    return getStatus(element) === statusLoading;
  };
  var hasStatusError = function hasStatusError(element) {
    return getStatus(element) === statusError;
  };
  var hasStatusNative = function hasStatusNative(element) {
    return getStatus(element) === statusNative;
  };
  var statusesAfterLoading = [statusLoading, statusLoaded, statusApplied, statusError];
  var hadStartedLoading = function hadStartedLoading(element) {
    return statusesAfterLoading.indexOf(getStatus(element)) >= 0;
  };

  var safeCallback = function safeCallback(callback, arg1, arg2, arg3) {
    if (!callback) {
      return;
    }

    if (arg3 !== undefined) {
      callback(arg1, arg2, arg3);
      return;
    }

    if (arg2 !== undefined) {
      callback(arg1, arg2);
      return;
    }

    callback(arg1);
  };

  var addClass = function addClass(element, className) {
    if (supportsClassList) {
      element.classList.add(className);
      return;
    }

    element.className += (element.className ? " " : "") + className;
  };
  var removeClass = function removeClass(element, className) {
    if (supportsClassList) {
      element.classList.remove(className);
      return;
    }

    element.className = element.className.replace(new RegExp("(^|\\s+)" + className + "(\\s+|$)"), " ").replace(/^\s+/, "").replace(/\s+$/, "");
  };

  var addTempImage = function addTempImage(element) {
    element.llTempImage = document.createElement("IMG");
  };
  var deleteTempImage = function deleteTempImage(element) {
    delete element.llTempImage;
  };
  var getTempImage = function getTempImage(element) {
    return element.llTempImage;
  };

  var unobserve = function unobserve(element, instance) {
    if (!instance) return;
    var observer = instance._observer;
    if (!observer) return;
    observer.unobserve(element);
  };
  var resetObserver = function resetObserver(observer) {
    observer.disconnect();
  };
  var unobserveEntered = function unobserveEntered(element, settings, instance) {
    if (settings.unobserve_entered) unobserve(element, instance);
  };

  var updateLoadingCount = function updateLoadingCount(instance, delta) {
    if (!instance) return;
    instance.loadingCount += delta;
  };
  var decreaseToLoadCount = function decreaseToLoadCount(instance) {
    if (!instance) return;
    instance.toLoadCount -= 1;
  };
  var setToLoadCount = function setToLoadCount(instance, value) {
    if (!instance) return;
    instance.toLoadCount = value;
  };
  var isSomethingLoading = function isSomethingLoading(instance) {
    return instance.loadingCount > 0;
  };
  var haveElementsToLoad = function haveElementsToLoad(instance) {
    return instance.toLoadCount > 0;
  };

  var getSourceTags = function getSourceTags(parentTag) {
    var sourceTags = [];

    for (var i = 0, childTag; childTag = parentTag.children[i]; i += 1) {
      if (childTag.tagName === "SOURCE") {
        sourceTags.push(childTag);
      }
    }

    return sourceTags;
  };
  var setAttributeIfValue = function setAttributeIfValue(element, attrName, value) {
    if (!value) {
      return;
    }

    element.setAttribute(attrName, value);
  };
  var resetAttribute = function resetAttribute(element, attrName) {
    element.removeAttribute(attrName);
  };
  var hasOriginalAttributes = function hasOriginalAttributes(element) {
    return !!element.llOriginalAttrs;
  };
  var saveOriginalImageAttributes = function saveOriginalImageAttributes(element) {
    if (hasOriginalAttributes(element)) {
      return;
    }

    var originalAttributes = {};
    originalAttributes["src"] = element.getAttribute("src");
    originalAttributes["srcset"] = element.getAttribute("srcset");
    originalAttributes["sizes"] = element.getAttribute("sizes");
    element.llOriginalAttrs = originalAttributes;
  };
  var restoreOriginalImageAttributes = function restoreOriginalImageAttributes(element) {
    if (!hasOriginalAttributes(element)) {
      return;
    }

    var originalAttributes = element.llOriginalAttrs;
    setAttributeIfValue(element, "src", originalAttributes["src"]);
    setAttributeIfValue(element, "srcset", originalAttributes["srcset"]);
    setAttributeIfValue(element, "sizes", originalAttributes["sizes"]);
  };
  var setImageAttributes = function setImageAttributes(element, settings) {
    setAttributeIfValue(element, "sizes", getData(element, settings.data_sizes));
    setAttributeIfValue(element, "srcset", getData(element, settings.data_srcset));
    setAttributeIfValue(element, "src", getData(element, settings.data_src));
  };
  var resetImageAttributes = function resetImageAttributes(element) {
    resetAttribute(element, "src");
    resetAttribute(element, "srcset");
    resetAttribute(element, "sizes");
  };
  var forEachPictureSource = function forEachPictureSource(element, fn) {
    var parent = element.parentNode;

    if (!parent || parent.tagName !== "PICTURE") {
      return;
    }

    var sourceTags = getSourceTags(parent);
    sourceTags.forEach(fn);
  };
  var forEachVideoSource = function forEachVideoSource(element, fn) {
    var sourceTags = getSourceTags(element);
    sourceTags.forEach(fn);
  };
  var restoreOriginalAttributesImg = function restoreOriginalAttributesImg(element) {
    forEachPictureSource(element, function (sourceTag) {
      restoreOriginalImageAttributes(sourceTag);
    });
    restoreOriginalImageAttributes(element);
  };
  var setSourcesImg = function setSourcesImg(element, settings) {
    forEachPictureSource(element, function (sourceTag) {
      saveOriginalImageAttributes(sourceTag);
      setImageAttributes(sourceTag, settings);
    });
    saveOriginalImageAttributes(element);
    setImageAttributes(element, settings);
  };
  var resetSourcesImg = function resetSourcesImg(element) {
    forEachPictureSource(element, function (sourceTag) {
      resetImageAttributes(sourceTag);
    });
    resetImageAttributes(element);
  };
  var setSourcesIframe = function setSourcesIframe(element, settings) {
    setAttributeIfValue(element, "src", getData(element, settings.data_src));
  };
  var setSourcesVideo = function setSourcesVideo(element, settings) {
    forEachVideoSource(element, function (sourceTag) {
      setAttributeIfValue(sourceTag, "src", getData(sourceTag, settings.data_src));
    });
    setAttributeIfValue(element, "poster", getData(element, settings.data_poster));
    setAttributeIfValue(element, "src", getData(element, settings.data_src));
    element.load();
  };
  var setSourcesFunctions = {
    IMG: setSourcesImg,
    IFRAME: setSourcesIframe,
    VIDEO: setSourcesVideo
  };
  var setBackground = function setBackground(element, settings, instance) {
    var bg1xValue = getData(element, settings.data_bg);
    var bgHiDpiValue = getData(element, settings.data_bg_hidpi);
    var bgDataValue = isHiDpi && bgHiDpiValue ? bgHiDpiValue : bg1xValue;
    if (!bgDataValue) return;
    element.style.backgroundImage = "url(\"".concat(bgDataValue, "\")");
    getTempImage(element).setAttribute("src", bgDataValue);
    manageLoading(element, settings, instance);
  }; // NOTE: THE TEMP IMAGE TRICK CANNOT BE DONE WITH data-multi-bg
  // BECAUSE INSIDE ITS VALUES MUST BE WRAPPED WITH URL() AND ONE OF THEM
  // COULD BE A GRADIENT BACKGROUND IMAGE

  var setMultiBackground = function setMultiBackground(element, settings, instance) {
    var bg1xValue = getData(element, settings.data_bg_multi);
    var bgHiDpiValue = getData(element, settings.data_bg_multi_hidpi);
    var bgDataValue = isHiDpi && bgHiDpiValue ? bgHiDpiValue : bg1xValue;

    if (!bgDataValue) {
      return;
    }

    element.style.backgroundImage = bgDataValue;
    manageApplied(element, settings, instance);
  };
  var setSources = function setSources(element, settings) {
    var setSourcesFunction = setSourcesFunctions[element.tagName];

    if (!setSourcesFunction) {
      return;
    }

    setSourcesFunction(element, settings);
  };
  var manageApplied = function manageApplied(element, settings, instance) {
    addClass(element, settings.class_applied);
    setStatus(element, statusApplied);

    if (settings.unobserve_completed) {
      // Unobserve now because we can't do it on load
      unobserve(element, settings);
    }

    safeCallback(settings.callback_applied, element, instance);
  };
  var manageLoading = function manageLoading(element, settings, instance) {
    updateLoadingCount(instance, +1);
    addClass(element, settings.class_loading);
    setStatus(element, statusLoading);
    safeCallback(settings.callback_loading, element, instance);
  };

  var elementsWithLoadEvent = ["IMG", "IFRAME", "VIDEO"];
  var hasLoadEvent = function hasLoadEvent(element) {
    return elementsWithLoadEvent.indexOf(element.tagName) > -1;
  };
  var checkFinish = function checkFinish(settings, instance) {
    if (instance && !isSomethingLoading(instance) && !haveElementsToLoad(instance)) {
      safeCallback(settings.callback_finish, instance);
    }
  };
  var addEventListener = function addEventListener(element, eventName, handler) {
    element.addEventListener(eventName, handler);
    element.llEvLisnrs[eventName] = handler;
  };
  var removeEventListener = function removeEventListener(element, eventName, handler) {
    element.removeEventListener(eventName, handler);
  };
  var hasEventListeners = function hasEventListeners(element) {
    return !!element.llEvLisnrs;
  };
  var addEventListeners = function addEventListeners(element, loadHandler, errorHandler) {
    if (!hasEventListeners(element)) element.llEvLisnrs = {};
    var loadEventName = element.tagName === "VIDEO" ? "loadeddata" : "load";
    addEventListener(element, loadEventName, loadHandler);
    addEventListener(element, "error", errorHandler);
  };
  var removeEventListeners = function removeEventListeners(element) {
    if (!hasEventListeners(element)) {
      return;
    }

    var eventListeners = element.llEvLisnrs;

    for (var eventName in eventListeners) {
      var handler = eventListeners[eventName];
      removeEventListener(element, eventName, handler);
    }

    delete element.llEvLisnrs;
  };
  var doneHandler = function doneHandler(element, settings, instance) {
    deleteTempImage(element);
    updateLoadingCount(instance, -1);
    decreaseToLoadCount(instance);
    removeClass(element, settings.class_loading);

    if (settings.unobserve_completed) {
      unobserve(element, instance);
    }
  };
  var loadHandler = function loadHandler(event, element, settings, instance) {
    var goingNative = hasStatusNative(element);
    doneHandler(element, settings, instance);
    addClass(element, settings.class_loaded);
    setStatus(element, statusLoaded);
    safeCallback(settings.callback_loaded, element, instance);
    if (!goingNative) checkFinish(settings, instance);
  };
  var errorHandler = function errorHandler(event, element, settings, instance) {
    var goingNative = hasStatusNative(element);
    doneHandler(element, settings, instance);
    addClass(element, settings.class_error);
    setStatus(element, statusError);
    safeCallback(settings.callback_error, element, instance);
    if (!goingNative) checkFinish(settings, instance);
  };
  var addOneShotEventListeners = function addOneShotEventListeners(element, settings, instance) {
    var elementToListenTo = getTempImage(element) || element;

    if (hasEventListeners(elementToListenTo)) {
      // This happens when loading is retried twice
      return;
    }

    var _loadHandler = function _loadHandler(event) {
      loadHandler(event, element, settings, instance);
      removeEventListeners(elementToListenTo);
    };

    var _errorHandler = function _errorHandler(event) {
      errorHandler(event, element, settings, instance);
      removeEventListeners(elementToListenTo);
    };

    addEventListeners(elementToListenTo, _loadHandler, _errorHandler);
  };

  var loadBackground = function loadBackground(element, settings, instance) {
    addTempImage(element);
    addOneShotEventListeners(element, settings, instance);
    setBackground(element, settings, instance);
    setMultiBackground(element, settings, instance);
  };

  var loadRegular = function loadRegular(element, settings, instance) {
    addOneShotEventListeners(element, settings, instance);
    setSources(element, settings);
    manageLoading(element, settings, instance);
  };

  var load = function load(element, settings, instance) {
    if (hasLoadEvent(element)) {
      loadRegular(element, settings, instance);
    } else {
      loadBackground(element, settings, instance);
    }
  };
  var loadNative = function loadNative(element, settings, instance) {
    addOneShotEventListeners(element, settings, instance);
    setSources(element, settings);
    setStatus(element, statusNative);
  };

  var cancelLoading = function cancelLoading(element, entry, settings, instance) {
    if (!settings.cancel_on_exit) return;
    if (!hasStatusLoading(element)) return;
    if (element.tagName !== "IMG") return; //Works only on images

    removeEventListeners(element);
    resetSourcesImg(element);
    restoreOriginalAttributesImg(element);
    removeClass(element, settings.class_loading);
    updateLoadingCount(instance, -1);
    resetStatus(element);
    safeCallback(settings.callback_cancel, element, entry, instance);
  };

  var onEnter = function onEnter(element, entry, settings, instance) {
    setStatus(element, statusEntered);
    addClass(element, settings.class_entered);
    removeClass(element, settings.class_exited);
    unobserveEntered(element, settings, instance);
    safeCallback(settings.callback_enter, element, entry, instance);
    if (hadStartedLoading(element)) return; //Prevent loading it again

    load(element, settings, instance);
  };
  var onExit = function onExit(element, entry, settings, instance) {
    if (hasEmptyStatus(element)) return; //Ignore the first pass, at landing

    addClass(element, settings.class_exited);
    cancelLoading(element, entry, settings, instance);
    safeCallback(settings.callback_exit, element, entry, instance);
  };

  var tagsWithNativeLazy = ["IMG", "IFRAME"];
  var shouldUseNative = function shouldUseNative(settings) {
    return settings.use_native && "loading" in HTMLImageElement.prototype;
  };
  var loadAllNative = function loadAllNative(elements, settings, instance) {
    elements.forEach(function (element) {
      if (tagsWithNativeLazy.indexOf(element.tagName) === -1) {
        return;
      }

      element.setAttribute("loading", "lazy"); //TODO: Move inside the loadNative method

      loadNative(element, settings, instance);
    });
    setToLoadCount(instance, 0);
  };

  var isIntersecting = function isIntersecting(entry) {
    return entry.isIntersecting || entry.intersectionRatio > 0;
  };

  var getObserverSettings = function getObserverSettings(settings) {
    return {
      root: settings.container === document ? null : settings.container,
      rootMargin: settings.thresholds || settings.threshold + "px"
    };
  };

  var intersectionHandler = function intersectionHandler(entries, settings, instance) {
    entries.forEach(function (entry) {
      return isIntersecting(entry) ? onEnter(entry.target, entry, settings, instance) : onExit(entry.target, entry, settings, instance);
    });
  };

  var observeElements = function observeElements(observer, elements) {
    elements.forEach(function (element) {
      observer.observe(element);
    });
  };
  var updateObserver = function updateObserver(observer, elementsToObserve) {
    resetObserver(observer);
    observeElements(observer, elementsToObserve);
  };
  var setObserver = function setObserver(settings, instance) {
    if (!supportsIntersectionObserver || shouldUseNative(settings)) {
      return;
    }

    instance._observer = new IntersectionObserver(function (entries) {
      intersectionHandler(entries, settings, instance);
    }, getObserverSettings(settings));
  };

  var toArray = function toArray(nodeSet) {
    return Array.prototype.slice.call(nodeSet);
  };
  var queryElements = function queryElements(settings) {
    return settings.container.querySelectorAll(settings.elements_selector);
  };
  var excludeManagedElements = function excludeManagedElements(elements) {
    return toArray(elements).filter(hasEmptyStatus);
  };
  var hasError = function hasError(element) {
    return hasStatusError(element);
  };
  var filterErrorElements = function filterErrorElements(elements) {
    return toArray(elements).filter(hasError);
  };
  var getElementsToLoad = function getElementsToLoad(elements, settings) {
    return excludeManagedElements(elements || queryElements(settings));
  };

  var retryLazyLoad = function retryLazyLoad(settings, instance) {
    var errorElements = filterErrorElements(queryElements(settings));
    errorElements.forEach(function (element) {
      removeClass(element, settings.class_error);
      resetStatus(element);
    });
    instance.update();
  };
  var setOnlineCheck = function setOnlineCheck(settings, instance) {
    if (!runningOnBrowser) {
      return;
    }

    window.addEventListener("online", function () {
      retryLazyLoad(settings, instance);
    });
  };

  var LazyLoad = function LazyLoad(customSettings, elements) {
    var settings = getExtendedSettings(customSettings);
    this._settings = settings;
    this.loadingCount = 0;
    setObserver(settings, this);
    setOnlineCheck(settings, this);
    this.update(elements);
  };

  LazyLoad.prototype = {
    update: function update(givenNodeset) {
      var settings = this._settings;
      var elementsToLoad = getElementsToLoad(givenNodeset, settings);
      setToLoadCount(this, elementsToLoad.length);

      if (isBot || !supportsIntersectionObserver) {
        this.loadAll(elementsToLoad);
        return;
      }

      if (shouldUseNative(settings)) {
        loadAllNative(elementsToLoad, settings, this);
        return;
      }

      updateObserver(this._observer, elementsToLoad);
    },
    destroy: function destroy() {
      // Observer
      if (this._observer) {
        this._observer.disconnect();
      } // Clean custom attributes on elements


      queryElements(this._settings).forEach(function (element) {
        delete element.llOriginalAttrs;
      }); // Delete all internal props

      delete this._observer;
      delete this._settings;
      delete this.loadingCount;
      delete this.toLoadCount;
    },
    loadAll: function loadAll(elements) {
      var _this = this;

      var settings = this._settings;
      var elementsToLoad = getElementsToLoad(elements, settings);
      elementsToLoad.forEach(function (element) {
        unobserve(element, _this);
        load(element, settings, _this);
      });
    }
  };

  LazyLoad.load = function (element, customSettings) {
    var settings = getExtendedSettings(customSettings);
    load(element, settings);
  };

  LazyLoad.resetStatus = function (element) {
    resetStatus(element);
  }; // Automatic instances creation if required (useful for async script loading)


  if (runningOnBrowser) {
    autoInitialize(LazyLoad, window.lazyLoadOptions);
  }

  return LazyLoad;

})));

//Vanilla Lazy Load
var lazyLoadInstance = new LazyLoad({
    // Your custom settings go here
});
//# sourceMappingURL=main.js.map
