!function(o){var e={};function r(t){if(e[t])return e[t].exports;var p=e[t]={i:t,l:!1,exports:{}};return o[t].call(p.exports,p,p.exports,r),p.l=!0,p.exports}r.m=o,r.c=e,r.d=function(o,e,t){r.o(o,e)||Object.defineProperty(o,e,{enumerable:!0,get:t})},r.r=function(o){"undefined"!=typeof Symbol&&Symbol.toStringTag&&Object.defineProperty(o,Symbol.toStringTag,{value:"Module"}),Object.defineProperty(o,"__esModule",{value:!0})},r.t=function(o,e){if(1&e&&(o=r(o)),8&e)return o;if(4&e&&"object"==typeof o&&o&&o.__esModule)return o;var t=Object.create(null);if(r.r(t),Object.defineProperty(t,"default",{enumerable:!0,value:o}),2&e&&"string"!=typeof o)for(var p in o)r.d(t,p,function(e){return o[e]}.bind(null,p));return t},r.n=function(o){var e=o&&o.__esModule?function(){return o.default}:function(){return o};return r.d(e,"a",e),e},r.o=function(o,e){return Object.prototype.hasOwnProperty.call(o,e)},r.p="/",r(r.s=81)}({81:function(o,e,r){o.exports=r(82)},82:function(o,e){$((function(){"use strict";$('[data-toggle="popover"]').popover(),$('[data-popover-color="head-primary"]').popover({template:'<div class="popover popover-head-primary" role="tooltip"><div class="arrow"></div><h3 class="popover-header"></h3><div class="popover-body"></div></div>'}),$('[data-popover-color="head-secondary"]').popover({template:'<div class="popover popover-head-secondary" role="tooltip"><div class="arrow"></div><h3 class="popover-header"></h3><div class="popover-body"></div></div>'}),$('[data-popover-color="primary"]').popover({template:'<div class="popover popover-primary" role="tooltip"><div class="arrow"></div><h3 class="popover-header"></h3><div class="popover-body"></div></div>'}),$('[data-popover-color="secondary"]').popover({template:'<div class="popover popover-secondary" role="tooltip"><div class="arrow"></div><h3 class="popover-header"></h3><div class="popover-body"></div></div>'}),$(document).on("click",(function(o){$('[data-toggle="popover"],[data-original-title]').each((function(){$(this).is(o.target)||0!==$(this).has(o.target).length||0!==$(".popover").has(o.target).length||((($(this).popover("hide").data("bs.popover")||{}).inState||{}).click=!1)}))}))}))}});