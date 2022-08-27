"use strict";function _typeof(t){return(_typeof="function"==typeof Symbol&&"symbol"==typeof Symbol.iterator?function(t){return typeof t}:function(t){return t&&"function"==typeof Symbol&&t.constructor===Symbol&&t!==Symbol.prototype?"symbol":typeof t})(t)}function _regeneratorRuntime(){_regeneratorRuntime=function(){return i};var i={},t=Object.prototype,l=t.hasOwnProperty,e="function"==typeof Symbol?Symbol:{},r=e.iterator||"@@iterator",n=e.asyncIterator||"@@asyncIterator",o=e.toStringTag||"@@toStringTag";function a(t,e,n){return Object.defineProperty(t,e,{value:n,enumerable:!0,configurable:!0,writable:!0}),t[e]}try{a({},"")}catch(t){a=function(t,e,n){return t[e]=n}}function c(t,e,n,r){var o,a,i,c,e=e&&e.prototype instanceof d?e:d,e=Object.create(e.prototype),r=new w(r||[]);return e._invoke=(o=t,a=n,i=r,c="suspendedStart",function(t,e){if("executing"===c)throw new Error("Generator is already running");if("completed"===c){if("throw"===t)throw e;return S()}for(i.method=t,i.arg=e;;){var n=i.delegate;if(n){n=function t(e,n){var r=e.iterator[n.method];if(void 0===r){if(n.delegate=null,"throw"===n.method){if(e.iterator.return&&(n.method="return",n.arg=void 0,t(e,n),"throw"===n.method))return u;n.method="throw",n.arg=new TypeError("The iterator does not provide a 'throw' method")}return u}r=s(r,e.iterator,n.arg);if("throw"===r.type)return n.method="throw",n.arg=r.arg,n.delegate=null,u;r=r.arg;return r?r.done?(n[e.resultName]=r.value,n.next=e.nextLoc,"return"!==n.method&&(n.method="next",n.arg=void 0),n.delegate=null,u):r:(n.method="throw",n.arg=new TypeError("iterator result is not an object"),n.delegate=null,u)}(n,i);if(n){if(n===u)continue;return n}}if("next"===i.method)i.sent=i._sent=i.arg;else if("throw"===i.method){if("suspendedStart"===c)throw c="completed",i.arg;i.dispatchException(i.arg)}else"return"===i.method&&i.abrupt("return",i.arg);c="executing";n=s(o,a,i);if("normal"===n.type){if(c=i.done?"completed":"suspendedYield",n.arg===u)continue;return{value:n.arg,done:i.done}}"throw"===n.type&&(c="completed",i.method="throw",i.arg=n.arg)}}),e}function s(t,e,n){try{return{type:"normal",arg:t.call(e,n)}}catch(t){return{type:"throw",arg:t}}}i.wrap=c;var u={};function d(){}function p(){}function h(){}var e={},m=(a(e,r,function(){return this}),Object.getPrototypeOf),m=m&&m(m(L([]))),f=(m&&m!==t&&l.call(m,r)&&(e=m),h.prototype=d.prototype=Object.create(e));function y(t){["next","throw","return"].forEach(function(e){a(t,e,function(t){return this._invoke(e,t)})})}function _(i,c){var e;this._invoke=function(n,r){function t(){return new c(function(t,e){!function e(t,n,r,o){var a,t=s(i[t],i,n);if("throw"!==t.type)return(n=(a=t.arg).value)&&"object"==_typeof(n)&&l.call(n,"__await")?c.resolve(n.__await).then(function(t){e("next",t,r,o)},function(t){e("throw",t,r,o)}):c.resolve(n).then(function(t){a.value=t,r(a)},function(t){return e("throw",t,r,o)});o(t.arg)}(n,r,t,e)})}return e=e?e.then(t,t):t()}}function g(t){var e={tryLoc:t[0]};1 in t&&(e.catchLoc=t[1]),2 in t&&(e.finallyLoc=t[2],e.afterLoc=t[3]),this.tryEntries.push(e)}function v(t){var e=t.completion||{};e.type="normal",delete e.arg,t.completion=e}function w(t){this.tryEntries=[{tryLoc:"root"}],t.forEach(g,this),this.reset(!0)}function L(e){if(e){var n,t=e[r];if(t)return t.call(e);if("function"==typeof e.next)return e;if(!isNaN(e.length))return n=-1,(t=function t(){for(;++n<e.length;)if(l.call(e,n))return t.value=e[n],t.done=!1,t;return t.value=void 0,t.done=!0,t}).next=t}return{next:S}}function S(){return{value:void 0,done:!0}}return a(f,"constructor",p.prototype=h),a(h,"constructor",p),p.displayName=a(h,o,"GeneratorFunction"),i.isGeneratorFunction=function(t){t="function"==typeof t&&t.constructor;return!!t&&(t===p||"GeneratorFunction"===(t.displayName||t.name))},i.mark=function(t){return Object.setPrototypeOf?Object.setPrototypeOf(t,h):(t.__proto__=h,a(t,o,"GeneratorFunction")),t.prototype=Object.create(f),t},i.awrap=function(t){return{__await:t}},y(_.prototype),a(_.prototype,n,function(){return this}),i.AsyncIterator=_,i.async=function(t,e,n,r,o){void 0===o&&(o=Promise);var a=new _(c(t,e,n,r),o);return i.isGeneratorFunction(e)?a:a.next().then(function(t){return t.done?t.value:a.next()})},y(f),a(f,o,"Generator"),a(f,r,function(){return this}),a(f,"toString",function(){return"[object Generator]"}),i.keys=function(n){var t,r=[];for(t in n)r.push(t);return r.reverse(),function t(){for(;r.length;){var e=r.pop();if(e in n)return t.value=e,t.done=!1,t}return t.done=!0,t}},i.values=L,w.prototype={constructor:w,reset:function(t){if(this.prev=0,this.next=0,this.sent=this._sent=void 0,this.done=!1,this.delegate=null,this.method="next",this.arg=void 0,this.tryEntries.forEach(v),!t)for(var e in this)"t"===e.charAt(0)&&l.call(this,e)&&!isNaN(+e.slice(1))&&(this[e]=void 0)},stop:function(){this.done=!0;var t=this.tryEntries[0].completion;if("throw"===t.type)throw t.arg;return this.rval},dispatchException:function(n){if(this.done)throw n;var r=this;function t(t,e){return a.type="throw",a.arg=n,r.next=t,e&&(r.method="next",r.arg=void 0),!!e}for(var e=this.tryEntries.length-1;0<=e;--e){var o=this.tryEntries[e],a=o.completion;if("root"===o.tryLoc)return t("end");if(o.tryLoc<=this.prev){var i=l.call(o,"catchLoc"),c=l.call(o,"finallyLoc");if(i&&c){if(this.prev<o.catchLoc)return t(o.catchLoc,!0);if(this.prev<o.finallyLoc)return t(o.finallyLoc)}else if(i){if(this.prev<o.catchLoc)return t(o.catchLoc,!0)}else{if(!c)throw new Error("try statement without catch or finally");if(this.prev<o.finallyLoc)return t(o.finallyLoc)}}}},abrupt:function(t,e){for(var n=this.tryEntries.length-1;0<=n;--n){var r=this.tryEntries[n];if(r.tryLoc<=this.prev&&l.call(r,"finallyLoc")&&this.prev<r.finallyLoc){var o=r;break}}var a=(o=o&&("break"===t||"continue"===t)&&o.tryLoc<=e&&e<=o.finallyLoc?null:o)?o.completion:{};return a.type=t,a.arg=e,o?(this.method="next",this.next=o.finallyLoc,u):this.complete(a)},complete:function(t,e){if("throw"===t.type)throw t.arg;return"break"===t.type||"continue"===t.type?this.next=t.arg:"return"===t.type?(this.rval=this.arg=t.arg,this.method="return",this.next="end"):"normal"===t.type&&e&&(this.next=e),u},finish:function(t){for(var e=this.tryEntries.length-1;0<=e;--e){var n=this.tryEntries[e];if(n.finallyLoc===t)return this.complete(n.completion,n.afterLoc),v(n),u}},catch:function(t){for(var e=this.tryEntries.length-1;0<=e;--e){var n,r,o=this.tryEntries[e];if(o.tryLoc===t)return"throw"===(n=o.completion).type&&(r=n.arg,v(o)),r}throw new Error("illegal catch attempt")},delegateYield:function(t,e,n){return this.delegate={iterator:L(t),resultName:e,nextLoc:n},"next"===this.method&&(this.arg=void 0),u}},i}function _classCallCheck(t,e){if(!(t instanceof e))throw new TypeError("Cannot call a class as a function")}function _defineProperties(t,e){for(var n=0;n<e.length;n++){var r=e[n];r.enumerable=r.enumerable||!1,r.configurable=!0,"value"in r&&(r.writable=!0),Object.defineProperty(t,r.key,r)}}function _createClass(t,e,n){return e&&_defineProperties(t.prototype,e),n&&_defineProperties(t,n),Object.defineProperty(t,"prototype",{writable:!1}),t}function _defineProperty(t,e,n){return e in t?Object.defineProperty(t,e,{value:n,enumerable:!0,configurable:!0,writable:!0}):t[e]=n,t}function _toConsumableArray(t){return _arrayWithoutHoles(t)||_iterableToArray(t)||_unsupportedIterableToArray(t)||_nonIterableSpread()}function _nonIterableSpread(){throw new TypeError("Invalid attempt to spread non-iterable instance.\nIn order to be iterable, non-array objects must have a [Symbol.iterator]() method.")}function _unsupportedIterableToArray(t,e){var n;if(t)return"string"==typeof t?_arrayLikeToArray(t,e):"Map"===(n="Object"===(n=Object.prototype.toString.call(t).slice(8,-1))&&t.constructor?t.constructor.name:n)||"Set"===n?Array.from(t):"Arguments"===n||/^(?:Ui|I)nt(?:8|16|32)(?:Clamped)?Array$/.test(n)?_arrayLikeToArray(t,e):void 0}function _iterableToArray(t){if("undefined"!=typeof Symbol&&null!=t[Symbol.iterator]||null!=t["@@iterator"])return Array.from(t)}function _arrayWithoutHoles(t){if(Array.isArray(t))return _arrayLikeToArray(t)}function _arrayLikeToArray(t,e){(null==e||e>t.length)&&(e=t.length);for(var n=0,r=new Array(e);n<e;n++)r[n]=t[n];return r}function asyncGeneratorStep(t,e,n,r,o,a,i){try{var c=t[a](i),l=c.value}catch(t){return void n(t)}c.done?e(l):Promise.resolve(l).then(r,o)}function _asyncToGenerator(c){return function(){var t=this,i=arguments;return new Promise(function(e,n){var r=c.apply(t,i);function o(t){asyncGeneratorStep(r,e,n,o,a,"next",t)}function a(t){asyncGeneratorStep(r,e,n,o,a,"throw",t)}o(void 0)})}}var urlQuery=new Proxy(new URLSearchParams(window.location.search),{get:function(t,e){return t.get(e)}}),BACKEND_URL="http://backend/http",PATH_CONTENT="./source/static",PATH_IMAGE="".concat(PATH_CONTENT,"/img"),PATH_CONTENT_JS="".concat(PATH_CONTENT,"/js"),LIMIT_OFFSET_APPLICATION="&limit=10&offset=".concat(pageApplicationOffset()),LIMIT_OFFSET_MIN="&limit=10&offset=0",switchThemeSwitch=document.querySelector(".switch-theme__switch");function smoothTransitionTheme(){var t,e=window.document.styleSheets[0],n="* {\n        -webkit-transition: 500ms !important;\n        -o-transition: 500ms !important;\n        transition: 500ms !important;\n    }".trim();"*"!=e.cssRules[e.cssRules.length-1].selectorText&&(e.insertRule(n,e.cssRules.length),t=e.cssRules.length-1,setTimeout(function(){e.deleteRule(t)},500))}var switchThemeIcon,svgs={moon:'<svg width="0.875rem" height="16" viewBox="0 0 14 16" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M5.935 7.793A5.937 5.937 0 0 0 .989 1.94 7.633 7.633 0 0 1 5.935.126c4.228 0 7.667 3.44 7.667 7.667 0 4.228-3.44 7.667-7.667 7.667a7.633 7.633 0 0 1-4.946-1.814 5.937 5.937 0 0 0 4.946-5.853zm0 6.183a6.19 6.19 0 0 0 6.183-6.183A6.19 6.19 0 0 0 5.935 1.61c-.526 0-1.047.068-1.55.199a7.421 7.421 0 0 1 0 11.969 6.154 6.154 0 0 0 1.55.198z" fill="#1A68AA"/><path d="M5.935 7.793A5.937 5.937 0 0 0 .989 1.94 7.633 7.633 0 0 1 5.935.126c4.228 0 7.667 3.44 7.667 7.667 0 4.228-3.44 7.667-7.667 7.667a7.633 7.633 0 0 1-4.946-1.814 5.937 5.937 0 0 0 4.946-5.853zm0 6.183a6.19 6.19 0 0 0 6.183-6.183A6.19 6.19 0 0 0 5.935 1.61c-.526 0-1.047.068-1.55.199a7.421 7.421 0 0 1 0 11.969 6.154 6.154 0 0 0 1.55.198z" stroke="#1A68AA"/></svg>',sun:'<svg width="1.375rem" height="1.375rem" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M16.5 16.5 18 18l-1.5-1.5zM19 11h2-2zM5.5 5.5 4 4l1.5 1.5zm11 0L18 4l-1.5 1.5zm-11 11L4 18l1.5-1.5zM1 11h2-2zM11 1v2-2zm0 18v2-2zm4-8a4 4 0 1 1-8 0 4 4 0 0 1 8 0z" stroke="#FFA61B" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg>'},monthShort=(switchThemeSwitch&&(switchThemeIcon=document.querySelector(".switch-theme__icon"),"_dark"===localStorage.getItem("theme")&&(switchThemeSwitch.classList.toggle("_active"),document.body.classList.toggle("_dark"),switchThemeIcon.innerHTML=svgs.moon),switchThemeSwitch.onclick=function(){smoothTransitionTheme(),switchThemeSwitch.classList.toggle("_active"),document.body.classList.toggle("_dark"),"_dark"===localStorage.getItem("theme")?(localStorage.setItem("theme",""),switchThemeIcon.innerHTML=svgs.sun):(localStorage.setItem("theme","_dark"),switchThemeIcon.innerHTML=svgs.moon)}),["янв","фев","мар","апр","май","июн","июл","авг","сен","окт","ноя","дек"]);function throttle(n,r){var o=!1;return function(){var t,e;o||(t=this,e=arguments,o=!0,setTimeout(function(){n.apply(t,e),o=!1},r))}}function removeClass(t,e){t.classList.contains(e)&&t.classList.remove(e)}function normalizeDate(t){var e=1<arguments.length&&void 0!==arguments[1]&&arguments[1],n=(n=t.slice(5)).slice(n.length-2)+" "+monthShort[+n.slice(0,2)-1];return n=e?" "+t.substr(t.length-4):n}function roundingMilliseconds(t){return Math.round(t/1e3)}function normalizeDateSql(t){t=t.split(" ");return"".concat(t[2],"-").concat(monthShort.indexOf(t[1])+1,"-").concat(t[0])}function setAnimation(t,e){var n=2<arguments.length&&void 0!==arguments[2]?arguments[2]:"d-flex",r=3<arguments.length&&void 0!==arguments[3]?arguments[3]:"_hide",o=4<arguments.length&&void 0!==arguments[4]?arguments[4]:500;t.classList.contains(e)||(t.classList.add(n),t.classList.add(r),setTimeout(function(){t.classList.contains(e)||(t.classList.remove(n),t.classList.remove(r))},o))}var selects=document.querySelectorAll("._select");function select(t){t&&t.forEach(function(t){var e=t.querySelector("._select__show"),n=t.querySelector("._select__arrow"),r=t.querySelector("._select__list");t.addEventListener("click",function(t){t.pointerId<=-1||(n.classList.toggle("_active"),r.classList.toggle("_show-flex"),setAnimation(r))}),t.querySelectorAll("._select__item").forEach(function(t){t.addEventListener("click",function(){e.value=t.textContent.trim()})})})}select(selects);var selectSearch=document.querySelectorAll("._select-search");function checkInputValue(t){return t?t.value:null}function applicationStatusColor(t){return t<86400?"status-recently":172800<t?"status-48h":"status-24h"}function removeApplication(t){return _removeApplication.apply(this,arguments)}function _removeApplication(){return(_removeApplication=_asyncToGenerator(_regeneratorRuntime().mark(function t(e){var n;return _regeneratorRuntime().wrap(function(t){for(;;)switch(t.prev=t.next){case 0:return n=document.querySelector('.service__item[data-id="'.concat(e,'"]')),t.abrupt("return",fetch("".concat(BACKEND_URL,"/application?id=").concat(e),{method:"DELETE"}).then(function(t){if(200<=t.status&&t.status<300)return t.json()}).then(function(){n.remove()}));case 2:case"end":return t.stop()}},t)}))).apply(this,arguments)}function getApplications(t,e){return _getApplications.apply(this,arguments)}function _getApplications(){return(_getApplications=_asyncToGenerator(_regeneratorRuntime().mark(function t(e,n){var r,o,a,i=arguments;return _regeneratorRuntime().wrap(function(t){for(;;)switch(t.prev=t.next){case 0:if(r=2<i.length&&void 0!==i[2]?i[2]:null,o=4<i.length&&void 0!==i[4]&&i[4],a=e,(!(3<i.length&&void 0!==i[3])||i[3])&&(a.innerHTML=""),"cargo"==n)return t.next=8,fetch("".concat(BACKEND_URL,"/").concat(n,"/").concat(r)).then(function(t){if(200<=t.status&&t.status<300)return t.json();throw error}).then(function(t){t[0]&&t.forEach(function(t){return applicationHtml(a,t,!0,o)})}).catch(function(){a.insertAdjacentHTML("beforeend",'<div class="text-center mt-1">Не найдено</div>')});t.next=9;break;case 8:return t.abrupt("return",t.sent);case 9:if("transport"==n)return t.next=12,fetch("".concat(BACKEND_URL,"/").concat(n,"/").concat(r)).then(function(t){if(200<=t.status&&t.status<300)return t.json();throw error}).then(function(t){t[0]&&t.forEach(function(t){return applicationHtml(a,t,!0,o)})}).catch(function(){a.insertAdjacentHTML("beforeend",'<div class="text-center mt-1">Не найдено</div>')});t.next=13;break;case 12:return t.abrupt("return",t.sent);case 13:case"end":return t.stop()}},t)}))).apply(this,arguments)}function applicationHtml(t,e){var n=2<arguments.length&&void 0!==arguments[2]?arguments[2]:null,r=3<arguments.length&&void 0!==arguments[3]?arguments[3]:null;return t.insertAdjacentHTML("beforeend",'<li class="service__item" data-id="'.concat(null==e?void 0:e.application_id,'">\n            <div class="service__status\n            ').concat(applicationStatusColor(roundingMilliseconds(new Date-new Date(null==e?void 0:e.date_created))),'\n            ">\n            </div>\n             <div class="service__date">\n                 ').concat(normalizeDate(null==e?void 0:e.date_start)," - ").concat(normalizeDate(null==e?void 0:e.date_end),'\n            </div>\n            <div class="service__way">\n                <div class="service__way_item">\n                    <img class="flag-img" src="').concat(PATH_IMAGE,"/").concat(showFlag(null==e||null==(t=e.from)?void 0:t.country),'" alt="').concat(null==e||null==(t=e.from)?void 0:t.country,'">\n                    <span>\n                        ').concat(null==e||null==(t=e.from)?void 0:t.city,'\n                    </span>\n                </div>\n                <div class="service__way_item">\n                    <img class="flag-img" src="').concat(PATH_IMAGE,"/").concat(showFlag(null==e||null==(t=e.to)?void 0:t.country),'" alt="').concat(null==e||null==(t=e.to)?void 0:t.country,'">\n                    <span>\n                        ').concat(null==e||null==(t=e.to)?void 0:t.city,'\n                    </span>\n                </div>\n            </div>\n            <div class="service__payment">\n                ').concat(n?null!=e&&e.price?(null==e?void 0:e.price)+" &#8381;":"Запрос цены":null==e?void 0:e.upload_type,'\n            </div>\n            <div class="service__transport">\n                ').concat(null==e?void 0:e.transport,"\n            </div>\n            ").concat(r?'\n            <a href="application_edit?id='.concat(null==e?void 0:e.application_id,'">\n                <svg width="1.25rem" height="1.25rem" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">\n                    <path d="M9.99967 3.33337H5.33301C4.22844 3.33337 3.33301 4.2288 3.33301 5.33337V14.6667C3.33301 15.7713 4.22844 16.6667 5.33301 16.6667H14.6663C15.7709 16.6667 16.6663 15.7713 16.6663 14.6667V10M7.49967 12.5V10.4167L14.7913 3.12504C15.3666 2.54974 16.2994 2.54974 16.8747 3.12504V3.12504C17.45 3.70034 17.45 4.63308 16.8747 5.20837L12.9163 9.16671L9.58301 12.5H7.49967Z" stroke="var(--default-color)" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>\n                </svg>            \n            </a>\n            <button onclick="removeApplication(').concat(null==e?void 0:e.application_id,')">\n                <svg width="1.125rem" height="1.125rem" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">\n                    <path d="M4.5 5.625L13.5 14.625M13.5 5.625L4.5 14.625" stroke="#E94141" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>\n                </svg>\n            </button>\n            '):'<a href="'.concat(n?"cargo":"transport","?id=").concat(null==e?void 0:e.application_id,'">\n                <button class="service__button button-grey">\n                    Посмотреть\n                </button>\n            </a>\n            <a href="').concat(n?"cargo":"transport","?id=").concat(null==e?void 0:e.application_id,'">\n                <button class="service__button button-dark">\n                    Связаться\n                </button>\n            </a>'),"\n        </li>"))}function setQueryParamsUrl(t){return"?"+t.join("&")}function inputAcceptableLength(t,e){return t.value.trim().length>e}function showFlag(t){return"Россия"==t?"flag_russia.png":"Казахстан"==t?"flag_kazakhstan.png":"Белорусия"==t?"flag_belarus.png":"Украина"==t?"flag_ukraine.png":void 0}selectSearch&&selectSearch.forEach(function(t){var r=t.querySelector("._select-input"),o=t.querySelectorAll("._select__item"),e=t.querySelector("._select-search__list");r.oninput=throttle(function(){var n=r.value;n=(n=n.trim()).toLowerCase(),o.forEach(function(e){var t=e.textContent;t=(t=t.trim()).toLowerCase(),n.length<1?(e.style.display="",removeClass(r,"_active")):(r.classList.add("_active"),-1===t.search(n)?e.style.display="":e.style.display="block",e.addEventListener("click",function(t){t.pointerId<=-1||(r.value=e.textContent.trim(),o.forEach(function(t){return t.style.display=""}),removeClass(r,"_active"))}))}),e.classList.add("_show-flex"),r.onblur=function(){setTimeout(function(){o.forEach(function(t){return t.style.display=""}),removeClass(r,"_active")},100)}},500)});var cargoList=document.querySelector(".cargo__list"),tranposrtList=document.querySelector(".transport__list");function getCountElems(t){return _getCountElems.apply(this,arguments)}function _getCountElems(){return(_getCountElems=_asyncToGenerator(_regeneratorRuntime().mark(function t(e){var n;return _regeneratorRuntime().wrap(function(t){for(;;)switch(t.prev=t.next){case 0:return n=null,t.next=3,fetch("".concat(BACKEND_URL,"/count/").concat(e)).then(function(t){return t.json()}).then(function(t){return n=t}).catch(function(t){return console.log(t)});case 3:return t.sent,t.next=6,n;case 6:return t.abrupt("return",t.sent);case 7:case"end":return t.stop()}},t)}))).apply(this,arguments)}function removeURLParameter(t,e){var n=t.split("?");if(2<=n.length){for(var r=encodeURIComponent(e)+"=",o=n[1].split(/[&;]/g),a=o.length;0<a--;)-1!==o[a].lastIndexOf(r,0)&&o.splice(a,1);return n[0]+(0<o.length?"?"+o.join("&"):"")}return t}function renderNavigtaionBottom(t){var o,a,i=document.querySelector(".navigation-bottom");i&&(o=parseInt(urlQuery.p||1),a=10*Math.floor(o/10),i.innerHTML="",getCountElems(t).then(function(t){var e=Math.floor(t.count/10+1),n=removeURLParameter(document.URL,"p");if(n=(n=(n=(n=new URL(n)).search).substring(1))?"&"+n:"",e)for(var r=a;r<=e;r++)if(0!==r){if(1===e)break;if(10+a<=r){i.innerHTML+='\n                    <li class="navigation-bottom_item">\n                        <a class="navigation-bottom_href _next_page" href="?p='.concat(10*Math.floor(o/10+1)).concat(n,'">\n                            Следующая страница\n                        </a>\n                    </li>\n                ');break}i.innerHTML+='\n                <li class="navigation-bottom_item">\n                    <a class="navigation-bottom_href '.concat(o==r?"_active":"",'" href="?p=').concat(r).concat(n,'">\n                        ').concat(r,"\n                    </a>\n                </li>\n            ")}}))}function pageApplicationOffset(){var t=urlQuery.p||1;return t<0?0:10*(t-1)}var inputs,_dateStartInput,_dateEndInput,catalogFilter=document.querySelector(".catalog__filter"),filterButton=document.querySelector(".filter__button"),filterResetButton=document.querySelector(".filter__reset-button");function searchActiveButton(p,h){return function(t){t.preventDefault();var t=document.querySelector(".filter"),e=t.from,n=t.to,r=checkInputValue(t.transport_upload),o=checkInputValue(t.date_start),a=checkInputValue(t.date_end),i=checkInputValue(t.upload_type),c=checkInputValue(t.price_min),l=checkInputValue(t.price_max),s=checkInputValue(t.volume_min),u=checkInputValue(t.volume_max),d=checkInputValue(t.mass_min),t=checkInputValue(t.mass_max),e=e[_toConsumableArray(e).findIndex(function(t){return t.checked})],n=n[_toConsumableArray(n).findIndex(function(t){return t.checked})],e=checkInputValue(e),n=checkInputValue(n),e=[e?"from=".concat(e):null,n?"to=".concat(n):null,r?"transport_upload=".concat(r):null,o?"date_start=".concat(normalizeDateSql(o)):null,a?"date_end=".concat(normalizeDateSql(a)):null,i?"upload_type=".concat(i):null,c?"price_min=".concat(c):null,l?"price_max=".concat(l):null,s?"volume_min=".concat(s):null,u?"volume_max=".concat(u):null,d?"mass_min=".concat(d):null,t?"mass_max=".concat(t):null];return e=setQueryParamsUrl(e=e.filter(function(t){return null!=t})),e=window.location.search+(window.location.search?"&":"?")+e.substring(1),window.history.pushState({},null,e),renderNavigtaionBottom("".concat(e+=LIMIT_OFFSET_APPLICATION,"&type=").concat(h)),getApplications(p,h,e)}}function setFilterButton(t,e){if(filterButton)return filterButton.onclick=searchActiveButton(t,e)}function renderCargoList(){"transport"!=urlQuery.type&&(setFilterButton(cargoList,"cargo"),getApplications(cargoList,"cargo",window.location.search+LIMIT_OFFSET_APPLICATION),renderNavigtaionBottom(window.location.search+"&type=cargo"))}function renderApplicationList(t,e){setFilterButton(t,e),getApplications(t,e,window.location.search+LIMIT_OFFSET_APPLICATION),renderNavigtaionBottom(window.location.search+"&type=".concat(e))}catalogFilter&&(inputs=catalogFilter.querySelectorAll('input[type="text"], input[type="number"]'),_dateStartInput=catalogFilter.querySelector(".date_start__input"),_dateEndInput=catalogFilter.querySelector(".date_end__input"),catalogFilter.onclick=function(){(inputAcceptableLength(_dateStartInput,0)||inputAcceptableLength(_dateEndInput,0))&&(filterButton.disabled=!1)},catalogFilter.oninput=throttle(function(){filterButton.disabled=!_toConsumableArray(inputs).some(function(t){return inputAcceptableLength(t,0)})},100),filterResetButton.addEventListener("click",function(){inputs.forEach(function(t){return t.value=""}),filterButton.disabled=!0,window.history.pushState({},document.title,window.location.pathname+("transport"===urlQuery.type?"?type=transport":""))})),cargoList&&"transport"!=urlQuery.type&&renderApplicationList(cargoList,"cargo"),tranposrtList&&renderApplicationList(tranposrtList,"transport");var setFilterResetButton,indexCatalogTranposrt,indexPageTitle,tableServiceNameFourth,searchCargo=document.querySelector(".search-cargo"),searchTransport=document.querySelector(".search-transport"),catalogIndex=document.querySelector(".catalog__index"),ApplicationListIndex=document.querySelector("#application__list_index"),modal=(searchCargo&&searchTransport&&catalogIndex&&(setFilterResetButton=function(e,n){filterResetButton.onclick=throttle(function(){getApplications(e,n,LIMIT_OFFSET_MIN),renderNavigtaionBottom("&type=".concat(n));var t=document.querySelectorAll(".navigation-bottom_href");t[0]&&(t.forEach(function(t){return removeClass(t,"_active")}),t[0].classList.add("_active"))},400)},indexCatalogTranposrt=function(){searchTransport.classList.add("_active"),indexPageTitle.textContent="транспорт",tableServiceNameFourth.textContent="Тип загрузки",filterButton.onclick=searchActiveButton(ApplicationListIndex,"transport"),setFilterResetButton(ApplicationListIndex,"transport"),renderApplicationList(ApplicationListIndex,"transport"),removeClass(searchCargo,"_active")},indexPageTitle=catalogIndex.querySelector(".index__page-title__selected"),tableServiceNameFourth=catalogIndex.querySelector(".table__service_name:nth-child(4)"),setFilterResetButton(cargoList,"cargo"),searchCargo.addEventListener("click",function(){searchCargo.classList.add("_active"),indexPageTitle.textContent="груз",tableServiceNameFourth.textContent="Оплата",filterButton.onclick=searchActiveButton(cargoList,"cargo"),setFilterResetButton(cargoList,"cargo"),renderApplicationList(cargoList,"cargo"),removeClass(searchTransport,"_active"),window.history.pushState({},document.title,window.location.pathname)}),"transport"==urlQuery.type&&indexCatalogTranposrt(),searchTransport.addEventListener("click",function(){indexCatalogTranposrt(),window.history.pushState({},null,window.location.pathname+"?type=transport")})),document.querySelector(".modal")),headerBurgerFixed=document.querySelector(".header__burger-fixed"),headerBrgerActive=document.querySelector(".header__burger_active"),headerBurgerClose=document.querySelector(".header__burger_close");function headerBurger(e,t,n){(t||n||e)&&(t.addEventListener("click",function(){e.classList.add("_active"),document.body.classList.add("_hidden-scroll")}),n.addEventListener("click",function(){removeClass(e,"_active"),removeClass(document.body,"_hidden-scroll")}),e.addEventListener("click",function(t){t.target===e&&(removeClass(e,"_active"),removeClass(document.body,"_hidden-scroll"))}))}headerBurger(headerBurgerFixed,headerBrgerActive,headerBurgerClose);var calendarStart,calendarEnd,loginInput,passwordInput,loginButton,emailInput,telephoneInput,_loginInput,nameInput,_passwordInput,passwordConfirmInput,registrationButton,disabledPrice,price,hasPrice,Calendar=function(){function o(t,e,n){var r=this;_classCallCheck(this,o),_defineProperty(this,"setInput",function(t,e){if(e)return r.day=t,r.inputHtml.value="".concat(t," ").concat(monthShort[r.month]," ").concat(r.year),removeClass(r.calendarHtml,"display-block"),r.render()}),this.calendarHtml=t,this.monthHtml=t.querySelector(".calendar__month_text"),this.calendarMonthLeft=t.querySelector(".calendar__month_left"),this.calendarMonthRight=t.querySelector(".calendar__month_right"),this.daysHtml=t.querySelectorAll(".calendar__day_item"),this.inputHtml=e,this.buttonShow=n,this.day=(new Date).getDate(),this.months=["Январь","Февраль","Март","Апрель","Май","Июнь","Июль","Август","Сентябрь","Октябрь","Ноябрь","Декабрь"],this.month=(new Date).getMonth(),this.year=(new Date).getFullYear()}return _createClass(o,[{key:"render",value:function(){this.monthHtml.textContent=this.months[this.month],this.days()}},{key:"decrementMonth",value:function(){var t=this;this.calendarMonthLeft.addEventListener("click",function(){--t.month,t.month<0&&(--t.year,t.month=11),t.render()})}},{key:"incrementMonth",value:function(){var t=this;this.calendarMonthRight.addEventListener("click",function(){t.month+=1,11<t.month&&(t.year+=1,t.month=0),t.render()})}},{key:"show",value:function(){var t=this;return this.buttonShow.addEventListener("click",function(){t.hideCalendars(),t.calendarHtml.classList.toggle("display-block"),setAnimation(t.calendarHtml,"display-block","d-block")})}},{key:"days",value:function(){var n=this;if(this.daysHtml)for(var r=!0,o=!0,t=0;t<this.daysHtml.length;t++)!function(t){var e=new Date(n.year,n.month,1).getDay(),e=(0===e&&(e+=7),new Date(n.year,n.month,t-e+2));n.daysHtml[t].textContent=e.getDate(),removeClass(n.daysHtml[t],"_disabled"),removeClass(n.daysHtml[t],"_active"),n.day==n.daysHtml[t].textContent&&n.month===(new Date).getMonth()&&n.year===(new Date).getFullYear()&&n.daysHtml[t].classList.add("_active"),1==+n.daysHtml[t].textContent&&(r=!1),n.lockBeforeAndAfter(n.daysHtml[t],e),!r&&o&&1<+n.daysHtml[t].textContent&&(o=!1),(r=n.daysHtml[t-1]&&+n.daysHtml[t-1].textContent>+n.daysHtml[t].textContent&&!o?!0:r)&&n.daysHtml[t].classList.add("_disabled"),n.daysHtml[t].onclick=function(){n.setInput(n.daysHtml[t].textContent,!n.daysHtml[t].classList.contains("_disabled")),n.hideCalendars(),setAnimation(n.calendarHtml,"display-block","d-block")}}(t)}},{key:"lockBeforeAndAfter",value:function(t,e){return this.inputHtml==dateStartInput?!dateEndInput.value||new Date(normalizeDateSql(dateEndInput.value))>=e?void 0:t.classList.add("_disabled"):!dateStartInput.value||new Date(normalizeDateSql(dateStartInput.value))<=e?void 0:t.classList.add("_disabled")}},{key:"hideCalendars",value:function(){var e=this;return document.querySelectorAll(".calendar").forEach(function(t){t!==e.calendarHtml&&removeClass(t,"display-block")})}},{key:"start",value:function(){this.render(),this.decrementMonth(),this.incrementMonth(),this.show()}}]),o}(),calendarFirst=document.querySelector(".calendar"),calendarSecond=document.querySelectorAll(".calendar")[1],dateStartInput=document.querySelector(".date_start__input"),dateEndInput=document.querySelector(".date_end__input"),login=(calendarFirst&&((calendarStart=new Calendar(calendarFirst,dateStartInput,document.querySelector(".calendar-from__active"))).start(),dateStartInput.onclick=function(){dateEndInput.value&&calendarStart.render()}),calendarSecond&&((calendarEnd=new Calendar(calendarSecond,dateEndInput,document.querySelectorAll(".calendar-from__active")[1])).start(),dateEndInput.onclick=function(){dateStartInput.value&&calendarEnd.render()}),document.querySelector(".login")),registration=(login&&(loginInput=login.querySelector("#login"),passwordInput=login.querySelector("#password"),loginButton=login.querySelector(".login__button"),login.oninput=throttle(function(){return inputAcceptableLength(loginInput,2)&&inputAcceptableLength(passwordInput,4)?loginButton.disabled=!1:loginButton.disabled=!0},100)),document.querySelector(".registration")),information=(registration&&(emailInput=registration.querySelector("#user_email"),telephoneInput=registration.querySelector("#user_telephone"),_loginInput=registration.querySelector("#user_login"),nameInput=registration.querySelector("#user_name"),_passwordInput=registration.querySelector("#user_password"),passwordConfirmInput=registration.querySelector("#user_password_confirm"),registrationButton=registration.querySelector(".registration__button"),registration.oninput=throttle(function(){return!inputAcceptableLength(emailInput,3)||!(inputAcceptableLength(telephoneInput,3)&&inputAcceptableLength(_loginInput,3)&&inputAcceptableLength(nameInput,3)&&inputAcceptableLength(_passwordInput,4)&&_passwordInput.value==passwordConfirmInput.value)?registrationButton.disabled=!0:registrationButton.disabled=!1},100)),document.querySelector(".information")),myApplicationList=(information&&(disabledPrice=function(){if(hasPrice.checked)return price.disabled=!0},price=document.querySelector("#price"),hasPrice=document.querySelector("#has_price"),disabledPrice(),hasPrice.onchange=function(){return disabledPrice(),price.disabled=!1}),document.querySelector(".my-application__list")),myApplicationListSecond=document.querySelectorAll(".my-application__list")[1],myCargoList=document.querySelector(".my_cargo__list"),myTransportList=document.querySelector(".my_transport__list");function MyApplictaionScrollListener(r,o){fetch("".concat(BACKEND_URL,"/count?type=").concat(o,"&my_application=true")).then(function(t){return t.json()}).then(function(e){var n=10;myApplicationList.addEventListener("scroll",throttle(_asyncToGenerator(_regeneratorRuntime().mark(function t(){return _regeneratorRuntime().wrap(function(t){for(;;)switch(t.prev=t.next){case 0:if(e.count<n)return t.abrupt("return");t.next=2;break;case 2:if(this.scrollHeight-this.offsetHeight>1.33*this.scrollTop)return t.abrupt("return");t.next=4;break;case 4:getApplications(r,o,LIMIT_OFFSET_APPLICATION+n+"&my_application=true",!1,!0),n+=10;case 6:case"end":return t.stop()}},t,this)})),500))})}myApplicationList&&MyApplictaionScrollListener(myCargoList,"cargo"),myApplicationListSecond&&MyApplictaionScrollListener(myTransportList,"transport"),myCargoList&&myTransportList&&(getApplications(myCargoList,"cargo",LIMIT_OFFSET_APPLICATION+"&my_application=true",!1,!0),getApplications(myTransportList,"transport",LIMIT_OFFSET_APPLICATION+"&my_application=true",!1,!0));var userAvatar,accountCardImage=document.querySelector(".account-card__image");accountCardImage&&((userAvatar=accountCardImage.querySelector("#user_avatar")).onchange=function(t){var e=new FormData;return e.append("avatar",this.files[0]),fetch("".concat(BACKEND_URL,"/avatar"),{method:"POST",body:e}).then(function(t){if(200<=t.status&&t.status<300)return t.json()}).then(function(t){t.path&&(accountCardImage.innerHTML='<img class="account-card__img" src="'.concat(t.path,'" alt="">'))})}),document.body.addEventListener("click",function(r){selects&&selects.forEach(function(t){var e=t.querySelector("._select__show"),n=t.querySelector("._select__arrow"),t=t.querySelector("._select__list");r.target!=e&&r.target!=n&&(e.classList.contains("_active")&&(e.classList.remove("_active"),n.classList.remove("_active")),t.classList.contains("_show-flex")&&(t.classList.remove("_show-flex"),t.classList.add("_hide")))})},!1);