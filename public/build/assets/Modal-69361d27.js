import{D as y,A as w,E as f,h as v,o as h,c as x,a as o,w as l,i as n,b as t,y as c,z as i,n as p,r as b,g,G as k}from"./app-c3725b55.js";const _=["id"],B=t("div",{class:"absolute inset-0 bg-gray-500 opacity-75"},null,-1),C=[B],N={__name:"Modal",props:{show:{type:Boolean,default:!1},maxWidth:{type:String,default:"2xl"},closeable:{type:Boolean,default:!0}},emits:["close"],setup(e,{emit:m}){const s=e;y(()=>s.show,()=>{s.show?document.body.style.overflow="hidden":document.body.style.overflow=null});const r=()=>{s.closeable&&m("close")},d=a=>{a.key==="Escape"&&s.show&&r()};w(()=>document.addEventListener("keydown",d)),f(()=>{document.removeEventListener("keydown",d),document.body.style.overflow=null});const u=v(()=>({sm:"sm:max-w-sm",md:"sm:max-w-md",lg:"sm:max-w-lg",xl:"sm:max-w-xl","2xl":"sm:max-w-2xl"})[s.maxWidth]);return(a,E)=>(h(),x(k,{to:"body"},[o(c,{"leave-active-class":"duration-200"},{default:l(()=>[n(t("div",{id:a.id,class:"fixed inset-0 z-50 px-4 py-6 overflow-y-auto sm:px-0","scroll-region":""},[o(c,{"enter-active-class":"duration-300 ease-out","enter-from-class":"opacity-0","enter-to-class":"opacity-100","leave-active-class":"duration-200 ease-in","leave-from-class":"opacity-100","leave-to-class":"opacity-0"},{default:l(()=>[n(t("div",{class:"fixed inset-0 transition-all transform",onClick:r},C,512),[[i,e.show]])]),_:1}),o(c,{"enter-active-class":"duration-300 ease-out","enter-from-class":"translate-y-4 opacity-0 sm:translate-y-0 sm:scale-95","enter-to-class":"translate-y-0 opacity-100 sm:scale-100","leave-active-class":"duration-200 ease-in","leave-from-class":"translate-y-0 opacity-100 sm:scale-100","leave-to-class":"translate-y-4 opacity-0 sm:translate-y-0 sm:scale-95"},{default:l(()=>[n(t("div",{class:p(["mb-6 overflow-hidden transition-all transform bg-white rounded-lg shadow-xl sm:w-full sm:mx-auto",u.value])},[e.show?b(a.$slots,"default",{key:0}):g("",!0)],2),[[i,e.show]])]),_:3})],8,_),[[i,e.show]])]),_:3})]))}};export{N as _};
