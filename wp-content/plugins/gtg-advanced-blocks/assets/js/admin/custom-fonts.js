!function(n){var r={};function a(e){if(r[e])return r[e].exports;var t=r[e]={i:e,l:!1,exports:{}};return n[e].call(t.exports,t,t.exports,a),t.l=!0,t.exports}a.m=n,a.c=r,a.d=function(e,t,n){a.o(e,t)||Object.defineProperty(e,t,{enumerable:!0,get:n})},a.r=function(e){"undefined"!=typeof Symbol&&Symbol.toStringTag&&Object.defineProperty(e,Symbol.toStringTag,{value:"Module"}),Object.defineProperty(e,"__esModule",{value:!0})},a.t=function(t,e){if(1&e&&(t=a(t)),8&e)return t;if(4&e&&"object"==typeof t&&t&&t.__esModule)return t;var n=Object.create(null);if(a.r(n),Object.defineProperty(n,"default",{enumerable:!0,value:t}),2&e&&"string"!=typeof t)for(var r in t)a.d(n,r,function(e){return t[e]}.bind(null,r));return n},a.n=function(e){var t=e&&e.__esModule?function(){return e.default}:function(){return e};return a.d(t,"a",t),t},a.o=function(e,t){return Object.prototype.hasOwnProperty.call(e,t)},a.p="",a(a.s=619)}({0:function(e,t,n){var r;!function(){"use strict";var i={}.hasOwnProperty;function c(){for(var e=[],t=0;t<arguments.length;t++){var n=arguments[t];if(n){var r=typeof n;if("string"==r||"number"==r)e.push(n);else if(Array.isArray(n)&&n.length){var a=c.apply(null,n);a&&e.push(a)}else if("object"==r)for(var o in n)i.call(n,o)&&n[o]&&e.push(o)}}return e.join(" ")}e.exports?(c.default=c,e.exports=c):void 0===(r=function(){return c}.apply(t,[]))||(e.exports=r)}()},619:function(e,t,n){e.exports=n(626)},626:function(e,t,n){"use strict";n.r(t);var r=n(0),o=n.n(r),a=wp.element,i=a.createContext,c=(a.useContext,i([])),f=c.Provider,s=c.Consumer,u=c;function l(e){return(l="function"==typeof Symbol&&"symbol"==typeof Symbol.iterator?function(e){return typeof e}:function(e){return e&&"function"==typeof Symbol&&e.constructor===Symbol&&e!==Symbol.prototype?"symbol":typeof e})(e)}function m(e,t){if(!(e instanceof t))throw new TypeError("Cannot call a class as a function")}function d(e,t){for(var n=0;n<t.length;n++){var r=t[n];r.enumerable=r.enumerable||!1,r.configurable=!0,"value"in r&&(r.writable=!0),Object.defineProperty(e,r.key,r)}}function p(e,t,n){return t&&d(e.prototype,t),n&&d(e,n),e}function v(e,t){if("function"!=typeof t&&null!==t)throw new TypeError("Super expression must either be null or a function");e.prototype=Object.create(t&&t.prototype,{constructor:{value:e,writable:!0,configurable:!0}}),t&&y(e,t)}function y(e,t){return(y=Object.setPrototypeOf||function(e,t){return e.__proto__=t,e})(e,t)}function b(o){var i=function(){if("undefined"==typeof Reflect||!Reflect.construct)return!1;if(Reflect.construct.sham)return!1;if("function"==typeof Proxy)return!0;try{return Date.prototype.toString.call(Reflect.construct(Date,[],function(){})),!0}catch(e){return!1}}();return function(){var e,t,n,r,a=h(o);return t=i?(e=h(this).constructor,Reflect.construct(a,arguments,e)):a.apply(this,arguments),n=this,!(r=t)||"object"!==l(r)&&"function"!=typeof r?function(e){if(void 0!==e)return e;throw new ReferenceError("this hasn't been initialised - super() hasn't been called")}(n):r}}function h(e){return(h=Object.setPrototypeOf?Object.getPrototypeOf:function(e){return e.__proto__||Object.getPrototypeOf(e)})(e)}function g(e){return function(e){if(Array.isArray(e))return x(e)}(e)||function(e){if("undefined"!=typeof Symbol&&Symbol.iterator in Object(e))return Array.from(e)}(e)||k(e)||function(){throw new TypeError("Invalid attempt to spread non-iterable instance.\nIn order to be iterable, non-array objects must have a [Symbol.iterator]() method.")}()}function _(e,t,n,r,a,o,i){try{var c=e[o](i),s=c.value}catch(e){return void n(e)}c.done?t(s):Promise.resolve(s).then(r,a)}function E(c){return function(){var e=this,i=arguments;return new Promise(function(t,n){var r=c.apply(e,i);function a(e){_(r,t,n,a,o,"next",e)}function o(e){_(r,t,n,a,o,"throw",e)}a(void 0)})}}function R(t,e){var n,r=Object.keys(t);return Object.getOwnPropertySymbols&&(n=Object.getOwnPropertySymbols(t),e&&(n=n.filter(function(e){return Object.getOwnPropertyDescriptor(t,e).enumerable})),r.push.apply(r,n)),r}function S(a){for(var e=1;e<arguments.length;e++){var o=null!=arguments[e]?arguments[e]:{};e%2?R(Object(o),!0).forEach(function(e){var t,n,r;t=a,r=o[n=e],n in t?Object.defineProperty(t,n,{value:r,enumerable:!0,configurable:!0,writable:!0}):t[n]=r}):Object.getOwnPropertyDescriptors?Object.defineProperties(a,Object.getOwnPropertyDescriptors(o)):R(Object(o)).forEach(function(e){Object.defineProperty(a,e,Object.getOwnPropertyDescriptor(o,e))})}return a}function w(e,t){return function(e){if(Array.isArray(e))return e}(e)||function(e,t){if("undefined"==typeof Symbol||!(Symbol.iterator in Object(e)))return;var n=[],r=!0,a=!1,o=void 0;try{for(var i,c=e[Symbol.iterator]();!(r=(i=c.next()).done)&&(n.push(i.value),!t||n.length!==t);r=!0);}catch(e){a=!0,o=e}finally{try{r||null==c.return||c.return()}finally{if(a)throw o}}return n}(e,t)||k(e,t)||function(){throw new TypeError("Invalid attempt to destructure non-iterable instance.\nIn order to be iterable, non-array objects must have a [Symbol.iterator]() method.")}()}function k(e,t){if(e){if("string"==typeof e)return x(e,t);var n=Object.prototype.toString.call(e).slice(8,-1);return"Object"===n&&e.constructor&&(n=e.constructor.name),"Map"===n||"Set"===n?Array.from(e):"Arguments"===n||/^(?:Ui|I)nt(?:8|16|32)(?:Clamped)?Array$/.test(n)?x(e,t):void 0}}function x(e,t){(null==t||t>e.length)&&(t=e.length);for(var n=0,r=new Array(t);n<t;n++)r[n]=e[n];return r}function O(e){var t=e.sectionIndex,n=e.key,o=e.fileType,i=e.file,c=e.onChange,r=i.font_attach_id,a=w(P(void 0),2),s=a[0],u=a[1];function l(e,t){var n=0<arguments.length&&void 0!==e?e:"",r=1<arguments.length?t:void 0,a=S({},i);a.font_attach_id=n,a.font_item_attach_type=o.name,u(r),c(a)}return C(function(){r&&void 0===s&&wp.media.attachment(r).fetch().then(function(e){u(e.url)})},[r,s]),React.createElement("div",{className:"item"},React.createElement("div",{className:"file-type"},React.createElement("label",{for:"file-".concat(t,"-").concat(n)},o.name.toUpperCase()," ",T("File"))),React.createElement("div",{className:"file-input"},React.createElement("input",{type:"text",placeholder:o.description,value:s,disabled:!0})),React.createElement("div",{className:"file-action"},r?React.createElement("button",{className:"action remove button",onClick:function(){return l("","")}},T("Remove")):React.createElement("button",{className:"action upload button",onClick:function(e){var t;if(e.preventDefault(),void 0===t){var n="";switch(o.name){case"svg":n="image/svg+xml";break;case"otf":n="application/vnd.ms-opentype";break;case"woff":n="application/x-font-woff";break;case"woff2":n="application/x-font-woff2";break;case"ttf":n="application/x-font-ttf";break;case"eot":n="application/vnd.ms-fontobject"}(t=wp.media.frames.file_frame=wp.media({multiple:!1,library:{type:n}})).on("select",function(){var e=t.state().get("selection").first().toJSON();l(e.id,e.url)}),t.open()}else t.open()}},T("Upload"))))}function j(n){function o(e,t){var n=S({},c);n[e]=t,f(n)}var r=n.font_id,a=n.font_name,i=n.index,c=(n.key,n.font),e=n.font,t=e.font_item_weight,s=e.font_item_style,u=e.flashOpen,l=e.items,f=n.onChange,m=n.removeItem,d=w(P(0===i||u),2),p=d[0],v=d[1];return C(function(){var t,e="gutengeek-font-css-".concat(r,"-").concat(i);return a&&((t=document.createElement("style")).setAttribute("type","text/css"),t.setAttribute("id",e),W(n).then(function(e){e&&(t.innerHTML=e,document.head.appendChild(t))})),function(){document.getElementById(e)&&document.getElementById(e).remove()}},[l,a,t,s]),React.createElement("div",{className:"section"},React.createElement("div",{className:"header gutengeek-flex"},React.createElement("div",{className:"font-weight"},React.createElement("label",{for:"font-weight-".concat(i)},T("Font Weight")),React.createElement("select",{id:"font-weight-".concat(i),onChange:function(e){return o("font_item_weight",e.target.value)},value:t},F.map(function(e){return React.createElement("option",{value:e,index:i},e.toString())}))),React.createElement("div",{className:"font-style"},React.createElement("label",{for:"font-style-".concat(i)},T("Font Style")),React.createElement("select",{id:"font-style-".concat(i),onChange:function(e){return o("font_item_style",e.target.value)},value:s},D.map(function(e,t){return React.createElement("option",{value:e,key:t},e)}))),React.createElement("div",{className:"font-example"},React.createElement("label",{style:{fontFamily:a,fontWeight:t,fontStyle:s}},T("Example"))),React.createElement("div",{className:"actions gutengeek-flex"},React.createElement("a",{className:"gutengeek-button-trash",onClick:function(){return v(!p)}},p?React.createElement("span",{class:"dashicons dashicons-arrow-up-alt2"}):React.createElement("span",{class:"dashicons dashicons-arrow-down-alt2"}),T(p?"Close":"Open")),React.createElement("a",{className:"gutengeek-button-trash",onClick:function(){m()}},React.createElement("span",{class:"dashicons dashicons-trash"})," ",T("Remove")))),p&&React.createElement("div",{className:"body"},React.createElement("div",{className:"files-list"},B.map(function(t,a){var e=l.find(function(e){return e&&e.font_item_attach_type==t.name});return React.createElement(O,{fileType:t,file:e||{},sectionIndex:i,index:a,key:a,onChange:function(e){return t=a,n=e,(r=g(l))[t]=n,void o("items",r);var t,n,r}})}))))}var N=wp.element,M=N.Component,I=(N.Fragment,N.render),P=N.useState,C=N.useLayoutEffect,T=wp.i18n.__,A=jQuery,F=["normal","bold","bolder","lighter",100,200,300,400,500,600,700,800,900],D=["normal","italic","oblique"],B=[{name:"woff",label:T("WOFF")},{name:"woff2",label:T("WOFF 2")},{name:"tff",label:T("TFF")},{name:"svg",label:T("SVG")},{name:"eot",label:T("EOT")}],W=function(){var t=E(regeneratorRuntime.mark(function e(t){var n,r;return regeneratorRuntime.wrap(function(e){for(;;)switch(e.prev=e.next){case 0:return t.font_name,n=t.font,n.font_item_weight,n.font_item_style,r=(r=n.items).map(function(){var t=E(regeneratorRuntime.mark(function e(t){var n;return regeneratorRuntime.wrap(function(e){for(;;)switch(e.prev=e.next){case 0:if(t.font_attach_id)return e.next=3,wp.media.attachment(t.font_attach_id).fetch();e.next=7;break;case 3:n=e.sent,t.url=n.url,e.next=8;break;case 7:t.url="";case 8:return e.abrupt("return",t);case 9:case"end":return e.stop()}},e)}));return function(e){return t.apply(this,arguments)}}()),e.next=4,Promise.all(r);case 4:if(0===(r=e.sent).length)return e.abrupt("return","");e.next=7;break;case 7:return e.abrupt("return",wp.gutengeek.helper.generateCustomFontCSS(t));case 8:case"end":return e.stop()}},e)}));return function(e){return t.apply(this,arguments)}}(),U=function(){v(t,M);var e=b(t);function t(){return m(this,t),e.apply(this,arguments)}return p(t,[{key:"render",value:function(){return React.createElement(s,null,function(e){var t=e.font_id,n=e.font_name,o=e.items,i=e.updateItems,r=e.removeItem;return React.createElement("div",{className:"items items-list"},o.map(function(e,a){return React.createElement(j,{font_id:t,font_name:n,font:e,key:a,index:a,onChange:function(e){return t=a,n=e,(r=g(o))[t]=n,void i(r);var t,n,r},removeItem:function(){return r(a)}})}))})}}]),t}(),q=function(){v(t,M);var e=b(t);function t(){return m(this,t),e.apply(this,arguments)}return p(t,[{key:"render",value:function(){return React.createElement(s,null,function(e){var t=e.font_name,n=e.items,r=e.addItem,a=e.updateTitle,o=e.errors,i=e.errorMessage,c=e.successMessage;return React.createElement("div",{id:"titlediv"},i&&React.createElement("div",{className:"notice notice-error"},React.createElement("p",null,i)),c&&React.createElement("div",{className:"notice notice-success"},React.createElement("p",null,c)),o.font_name&&React.createElement("div",{className:"error"},React.createElement("p",null,o.font_name)),React.createElement("div",{id:"titlewrap"},React.createElement("label",{className:t?"screen-reader-text":"",id:"title-prompt-text",for:"title"},T("Font Name")),React.createElement("input",{type:"text",name:"post_title",size:"30",value:t,onChange:function(e){return a(e.target.value)},id:"title",spellcheck:"true",autocomplete:"off"})),n&&0<n.length&&React.createElement(U,null),React.createElement("button",{onClick:function(e){return r(e)},className:"gutengeek-button add-more"},T("Add Font Variation")))})}}]),t}(),J=function(){v(t,M);var e=b(t);function t(){return m(this,t),e.apply(this,arguments)}return p(t,[{key:"render",value:function(){return React.createElement(s,null,function(e){e.id;var t=e.font_status,n=e.isDirty,r=e.onSubmit,a=e.isSaving;return React.createElement("div",{id:"side-sortables",className:"meta-box-sortables"},React.createElement("div",{id:"submitdiv",className:"postbox"},React.createElement("h2",{className:"hndle"},T("Publish")),React.createElement("div",{className:"inside"},React.createElement("div",{class:"submitbox",id:"submitpost"},React.createElement("div",{id:"major-publishing-actions"},"publish"===t&&React.createElement("div",{id:"delete-action"},React.createElement("a",{href:window.gutengeek_custom_font_data.trash_url,className:"submitdelete deletion"},T("Move To Trash"))),React.createElement("div",{id:"publishing-action"},React.createElement("button",{name:"save",type:"submit",onClick:function(){return r()},disabled:n?"":"disabled",className:o()("button button-primary button-large",a?"is-saving":""),id:"publish"},T(n?"Update":"Save"))),React.createElement("div",{class:"clear"}))))))})}}]),t}(),L=function(){v(r,M);var n=b(r);function r(e){var t;return m(this,r),(t=n.call(this,e)).state={font_id:"",font_name:"",font_status:"",items:[],isDirty:!1,errors:{},isSaving:!1,errorMessage:"",successMessage:"",setErrorMessage:function(e){return t.setState({errorMessage:e})},setSuccessMessage:function(e){return t.setState({successMessage:e})}},t}return p(r,[{key:"componentDidMount",value:function(){var e=this.props,t=e.font_id,n=e.items,r=e.font_name,a=e.font_status;this.setState({font_id:t,font_name:r,items:n,font_status:a}),n||this.addItem()}},{key:"addItem",value:function(){var e=this.state,t=e.font_id,n=(e.font_name,e.items),r=n?g(n):[];r.push({font_item_id:"",font_id:t,font_item_weight:"normal",font_item_style:"normal",items:[],flashOpen:1}),this.setState({isDirty:!0,items:r})}},{key:"updateTitle",value:function(e){this.setState({isDirty:!0,font_name:e})}},{key:"updateItems",value:function(e){this.setState({isDirty:!0,items:e})}},{key:"setError",value:function(e,t){var n=S({},this.state.errors);n[e]=t,this.setState({errors:n})}},{key:"removeItem",value:function(e){var t=g(this.state.items);t.splice(e,1),this.setState({items:t})}},{key:"onSubmit",value:function(){var c=this,e=this.state,t=e.font_id,n=e.font_name,r=e.items,a=(e.errors,e.isSaving),o=e.font_status;a||this.setState({errorMessage:"",successMessage:"",errors:{}},function(){if(!n||0==n.trim().length)return c.setError("font_name",T("Font Name is required")),!1;var e={font_id:t,font_name:n,font_status:o,items:r};A.ajax({url:ajaxurl,method:"POST",data:{action:"wp_ajax_gutengeek_save_font",font:e,nonce:window.gutengeek_custom_font_data.save_nonce},beforeSend:function(){c.setState({isSaving:!0})}}).always(function(){c.setState({isSaving:!1})}).done(function(e){var t,n=e.data,r=e.success,a=n.redirect,o=n.font,i=n.message;if(a&&(window.location.href=a),i){if(!r)return void c.setState({errorMessage:i});c.setState({successMessage:i})}o&&(t=S({},c.state),c.setState(S(S({},t),o)))}).fail(function(e){var t=e.responseJSON;t&&t.data&&t.data.message&&c.setState({errorMessage:t.data.message})})})}},{key:"render",value:function(){var t=this,e=this.state,n=e.font_id,r=e.font_name,a=e.items,o=e.font_status,i=e.isDirty,c=e.errors,s=e.isSaving,u=e.errorMessage,l=e.successMessage;return React.createElement("div",{id:"poststuff"},React.createElement(f,{value:{font_id:n,font_name:r,items:a,font_status:o,isDirty:i,errors:c,isSaving:s,addItem:function(){return t.addItem()},updateItems:function(e){return t.updateItems(e)},updateTitle:function(e){return t.updateTitle(e)},removeItem:function(e){return t.removeItem(e)},onSubmit:function(e){return t.onSubmit(e)},errorMessage:u,successMessage:l,setErrorMessage:function(e){return t.setState({errorMessage:e})},setSuccessMessage:function(e){return t.setState({successMessage:e})}}},React.createElement("div",{id:"post-body",className:"metabox-holder columns-2"},React.createElement("div",{id:"post-body-content"},React.createElement(q,null)),React.createElement("div",{id:"postbox-container-1"},React.createElement(J,null)))))}}]),r}();L.contextType=u,wp.domReady(function(){if(document.getElementById("gutengeek-blocks-custom-fonts-form"))I(React.createElement(L,window.gutengeek_custom_font_data.font),document.getElementById("gutengeek-blocks-custom-fonts-form"));else if(document.getElementById("gutengeek-blocks-custom-fonts"))for(var e=document.querySelectorAll("#the-list .column-example .example"),t=0;t<e.length;t++){var a=e[t],o=(o=a.getAttribute("data-font"))&&JSON.parse(o),n="gutengeek-font-style-".concat(t),i=document.createElement("style");i.setAttribute("type","text/css"),i.setAttribute("id",n),W(o).then(function(e){var t,n,r;e&&(i.innerHTML=e,document.head.appendChild(i),a.style.fontFamily=o.font_name,o.font&&(n=(t=o.font).font_item_weight,r=t.font_item_style,a.style.fontWeight=n,a.style.fontStyle=r))})}})}});