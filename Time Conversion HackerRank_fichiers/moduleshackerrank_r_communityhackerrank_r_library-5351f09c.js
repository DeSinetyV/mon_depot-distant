(window.webpackJsonp=window.webpackJsonp||[]).push([[56],{LPUq:function(t,e,n){"use strict";n.d(e,"a",(function(){return m})),n.d(e,"b",(function(){return h}));var s=n("cDcd"),i=n.n(s),a=n("17x9"),o=n.n(a),r=n("ANjH"),d=n("/MKj"),c=n("s/Ur"),l=n.n(c),u=n("0e0P");const p={isMobile:o.a.bool.isRequired,isAppMounted:o.a.bool.isRequired};let h=function(t){let e=t.isAppMounted,n=t.isMobile,s=t.children;return e||n?i.a.createElement(l.a,{children:s,maxWidth:e?767:1e5,values:{width:320}}):null};h.propTypes=p;let m=function(t){let e=t.isAppMounted,n=t.isMobile,s=t.children;return!e&&n?null:i.a.createElement(l.a,{children:s,minWidth:e?768:0,values:{width:1240}})};function v(t){return{isMobile:t.metadata.isMobile}}m.propTypes=p;m=Object(r.d)(Object(d.c)(v),u.a)(m),h=Object(r.d)(Object(d.c)(v),u.a)(h)},QahQ:function(t,e,n){"use strict";var s=n("pVnL"),i=n.n(s),a=n("QILm"),o=n.n(a),r=n("lSNA"),d=n.n(r),c=n("cDcd"),l=n.n(c),u=n("/MKj"),p=n("17x9"),h=n.n(p),m=n("jNdJ");class v extends c.PureComponent{constructor(){super(...arguments),d()(this,"state",{adSeen:!1}),d()(this,"onAdSeen",t=>{!this.state.adSeen&&t.intersectionRatio>=1&&this.setState({adSeen:!0},()=>{this.metrics("View")})})}metrics(t){const e=this.props,n=e.sendMetrics,s=e.adUnit;n&&n(t,s)}render(){var t,e;const n=this.props,s=n.children,a=n.component,r=n.slot,d=n.adUnit,u=n.minItems,p=o()(n,["children","component","slot","adUnit","minItems"]),h=null!==(t=null==d||null===(e=d.metadata)||void 0===e?void 0:e.position)&&void 0!==t?t:this.props.position,v=l.a.Children.toArray(s);if(v.length<u||!d)return s;const A={root:null,rootMargin:"0px",threshold:1,onChange:this.onAdSeen};return l.a.createElement(c.Fragment,null,[...v.slice(0,h),l.a.createElement(m.a,i()({key:`NativeAd-${r}-${h}`},A),l.a.createElement(a,i()({slot:r,promoMeta:d,ref:this.onAdLoad,onClick:this.metrics.bind(this,"Click"),onClose:this.props.onClose},p))),...v.slice(h,v.length)])}}d()(v,"propTypes",{component:h.a.node.isRequired,slot:h.a.string.isRequired,position:h.a.number,sendMetrics:h.a.func,minItems:h.a.number,adUnit:h.a.shape({ad_unit_type:h.a.string,heading:h.a.string,subtitle:h.a.string,cta_link:h.a.string,cta_text:h.a.string,metadata:h.a.shape({position:h.a.number,background:h.a.string,ctas_arr:h.a.array})}),onClick:h.a.func,children:h.a.oneOfType([h.a.arrayOf(h.a.node),h.a.node])}),d()(v,"defaultProps",{minItems:0,position:0,children:null});e.a=Object(u.c)((t,e)=>{const n=e.slot,s="hackerrankx"===t.metadata.productNamespace?t.work.nativeAds:t.community.nativeAds;return{adUnit:s&&s[n]}})(v)},jNdJ:function(t,e,n){"use strict";var s=n("w13Q"),i=n("QILm"),a=n.n(i),o=n("lSNA"),r=n.n(o),d=n("cDcd"),c=n.n(d);class l extends d.PureComponent{render(){return this.props.children}}class u extends d.PureComponent{constructor(){super(...arguments),r()(this,"state",{observer:null}),r()(this,"hasUnmounted",!1)}loadObserverModules(){return new Promise((t,e)=>{(()=>{const s=e;n.e(118).then((e=>{void 0===window.IntersectionObserver&&(n("T39b"),n("9AAn"),n("Wr5T"));const s=n("fadw").default;t(s)}).bind(null,n)).catch(s)})()})}componentDidMount(){this.loadObserverModules().then(t=>{this.hasUnmounted||this.setState({observer:t})})}componentWillUnmount(){this.hasUnmounted=!0}render(){const t=this.props,e=t.children,n=a()(t,["children"]),s=this.state.observer,i=s||d.Fragment,o=s?n:{};return c.a.createElement(i,o,c.a.createElement(l,null,c.a.Children.only(e)))}}e.a=u,Object(s.d)("hackerrank_r_intersection_observer.js")},ySAj:function(t,e,n){"use strict";var s=n("ZaSc"),i=n("UQja"),a=n("Ckvm");const o=Object(a.b)(),r=o+"community/v1/",d=o+"ent/api/v1/",c={loadNativeAds:r+"promotion_slots/::slot",loadNativeAdsEnt:d+"promotion_slots/::slot",dismissNativeAd:r+"promotion_slots/dismiss_ad",dismissNativeAdEnt:d+"user_ad_unit_associations/ad_unit/::ad_unit_id",clearKeyNativeAd:r+"promotion_slots/clear_ad_unit_key"};function l(t){let e=arguments.length>1&&void 0!==arguments[1]?arguments[1]:{};return Object(i.a)(c,t,e)}var u=n("/SOd");const p={loadNativeAds:(t,e)=>n=>{const i=t.slot,a=t.productType;return Object(s.c)({url:l("hackerrank"===a?"loadNativeAds":"loadNativeAdsEnt",{slot:i}),ajaxServerConf:e,headers:{Accept:"application/vnd.api+json"},success:t=>{const e=(t.data.attributes||{}).ad_unit;n({type:u.a.NATIVE_AD.LOAD_NATIVE_ADS,data:{slot:i,adUnit:e}})}})},dismissNativeAd:(t,e)=>n=>{const i=t.slot,a=t.id,o=t.ad_unit_type,r=t.productType,d="hackerrank"===r?"dismissNativeAd":"dismissNativeAdEnt",c="hackerrank"===r?i:o;return Object(s.f)({url:l(d,{ad_unit_id:a}),ajaxServerConf:e,headers:{Accept:"application/vnd.api+json"},data:{ad_unit_id:a},success:()=>{n({type:u.a.NATIVE_AD.DISMISS_NATIVE_ADS,data:{slot:c}})},error:t=>{console.log("error ",t)}})}};e.a=p}}]);
//# sourceMappingURL=https://hrcdn.net/community-frontend/assets/sourcemaps/modules~hackerrank_r_community~hackerrank_r_library-5351f09c.js.map