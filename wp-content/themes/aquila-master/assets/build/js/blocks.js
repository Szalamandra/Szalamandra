!function(n){var a={};function o(e){if(a[e])return a[e].exports;var t=a[e]={i:e,l:!1,exports:{}};return n[e].call(t.exports,t,t.exports,o),t.l=!0,t.exports}o.m=n,o.c=a,o.d=function(e,t,n){o.o(e,t)||Object.defineProperty(e,t,{enumerable:!0,get:n})},o.r=function(e){"undefined"!=typeof Symbol&&Symbol.toStringTag&&Object.defineProperty(e,Symbol.toStringTag,{value:"Module"}),Object.defineProperty(e,"__esModule",{value:!0})},o.t=function(t,e){if(1&e&&(t=o(t)),8&e)return t;if(4&e&&"object"==typeof t&&t&&t.__esModule)return t;var n=Object.create(null);if(o.r(n),Object.defineProperty(n,"default",{enumerable:!0,value:t}),2&e&&"string"!=typeof t)for(var a in t)o.d(n,a,function(e){return t[e]}.bind(null,a));return n},o.n=function(e){var t=e&&e.__esModule?function(){return e.default}:function(){return e};return o.d(t,"a",t),t},o.o=function(e,t){return Object.prototype.hasOwnProperty.call(e,t)},o.p="",o(o.s=13)}([function(e,t){!function(){e.exports=this.wp.i18n}()},function(e,t){!function(){e.exports=this.wp.blockEditor}()},function(e,t){!function(){e.exports=this.React}()},function(e,t){!function(){e.exports=this.wp.blocks}()},function(e,t){!function(){e.exports=this.wp.components}()},function(e,t){!function(){e.exports=this.lodash}()},,,,,,,function(e,t,n){},function(e,t,n){"use strict";n.r(t);n(12);var a=n(2);function o(){return(o=Object.assign||function(e){for(var t=1;t<arguments.length;t++){var n=arguments[t];for(var a in n)Object.prototype.hasOwnProperty.call(n,a)&&(e[a]=n[a])}return e}).apply(this,arguments)}function c(e){return a.createElement("svg",o({width:20,height:20,viewBox:"0 0 417.813 417"},e),a.createElement("path",{xmlns:"http://www.w3.org/2000/svg",d:"M159.988 318.582c-3.988 4.012-9.43 6.25-15.082 6.25s-11.094-2.238-15.082-6.25L9.375 198.113c-12.5-12.5-12.5-32.77 0-45.246l15.082-15.086c12.504-12.5 32.75-12.5 45.25 0l75.2 75.203L348.104 9.781c12.504-12.5 32.77-12.5 45.25 0l15.082 15.086c12.5 12.5 12.5 32.766 0 45.246zm0 0",fill:"#06ab1c","data-original":"#2196f3"}))}function l(){return(l=Object.assign||function(e){for(var t=1;t<arguments.length;t++){var n=arguments[t];for(var a in n)Object.prototype.hasOwnProperty.call(n,a)&&(e[a]=n[a])}return e}).apply(this,arguments)}function i(e){return a.createElement("svg",l({width:20,height:20,viewBox:"0 0 123.05 123.05"},e),a.createElement("path",{d:"M121.325 10.925l-8.5-8.399c-2.3-2.3-6.1-2.3-8.5 0l-42.4 42.399L18.726 1.726c-2.301-2.301-6.101-2.301-8.5 0l-8.5 8.5c-2.301 2.3-2.301 6.1 0 8.5l43.1 43.1-42.3 42.5c-2.3 2.3-2.3 6.1 0 8.5l8.5 8.5c2.3 2.3 6.1 2.3 8.5 0l42.399-42.4 42.4 42.4c2.3 2.3 6.1 2.3 8.5 0l8.5-8.5c2.3-2.3 2.3-6.1 0-8.5l-42.5-42.4 42.4-42.399a6.13 6.13 0 00.1-8.602z",fill:"#e30101","data-original":"#000000",xmlns:"http://www.w3.org/2000/svg"}))}function r(e){var t={dos:c,donts:i};return!Object(u.isEmpty)(e)&&e in t?t[e]:t.dos}function s(e){var t=e.className,n=e.attributes,a=e.setAttributes,o=n.option,c=n.content,l=r(o);return React.createElement("div",{className:"aquila-icon-heading"},React.createElement("span",{className:"aquila-icon-heading__heading"},React.createElement(l,null)),React.createElement(f.RichText,{tagName:"h4",className:t,value:c,onChange:function(e){return a({contentVal:e})},placeholder:Object(p.__)("Heading…","aquila")}),React.createElement(f.InspectorControls,null,React.createElement(d.PanelBody,{title:Object(p.__)("Block Settings","aquila")},React.createElement(d.RadioControl,{label:Object(p.__)("Select the icon","aquila"),help:Object(p.__)("Controls icon selection","aquila"),selected:o,options:[{label:"Dos",value:"dos"},{label:"Dont's",value:"donts"}],onChange:function(e){a({optionVal:e})}}))))}var u=n(5),d=n(4),p=n(0),f=n(1),m=n(3);Object(m.registerBlockType)("aquila-blocks/heading",{title:Object(p.__)("Heading with Icon","aquila"),icon:"admin-customizer",description:Object(p.__)("Add Heading and select Icons","aquila"),category:"aquila",attributes:{option:{type:"string",default:"dos"},content:{type:"string",source:"html",selector:"h4",default:Object(p.__)("Dos","aquila")}},edit:s,save:function(e){var t=e.attributes,n=t.option,a=t.content,o=r(n);return React.createElement("div",{className:"aquila-icon-heading"},React.createElement("span",{className:"aquila-icon-heading__heading"},React.createElement(o,null)),React.createElement(f.RichText.Content,{tagName:"h4",value:a}))}});function g(e,t,n){return["core/column",{className:t},[["aquila-blocks/heading",{className:"aquila-dos-and-donts__heading",option:e,content:"<strong><span>".concat(n,"</span></strong>")}],["core/list",{className:"aquila-dos-and-donts__list"}]]]}function h(){return React.createElement("div",{className:"aquila-dos-and-donts"},React.createElement(f.InnerBlocks,{template:b,allowedBlocks:_,templateLock:!0}))}var b=[["core/group",{className:"aquila-dos-and-donts__group",backgroundColor:"pale-cyan-blue"},[["core/columns",{className:"aquila-dos-and-donts__cols"},[g("dos","aquila-dos-and-donts__col-one","Dos"),g("donts","aquila-dos-and-donts__col-two","Dont's")]]]]],_=["core/group"];Object(m.registerBlockType)("aquila-blocks/dos-and-donts",{title:Object(p.__)("Dos and dont's","aquila"),icon:"editor-table",description:Object(p.__)("Add headings and text","aquila"),category:"aquila",edit:h,save:function(){return React.createElement("div",{className:"aquila-dos-and-donts"},React.createElement(f.InnerBlocks.Content,null))}})}]);