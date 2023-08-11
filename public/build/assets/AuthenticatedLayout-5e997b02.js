import{A as B}from"./ApplicationLogo-587af17b.js";import{z,C as D,h as y,l as M,o as i,f as _,b as e,r as f,i as L,y as q,a as r,w as s,n as c,x as E,c as m,u as b,j as x,d as o,t as w,g as k}from"./app-5a1e3b4d.js";const N={class:"relative"},$={__name:"Dropdown",props:{align:{type:String,default:"right"},width:{type:String,default:"48"},contentClasses:{type:String,default:"py-1 bg-white"}},setup(a){const n=a,t=v=>{d.value&&v.key==="Escape"&&(d.value=!1)};z(()=>document.addEventListener("keydown",t)),D(()=>document.removeEventListener("keydown",t));const l=y(()=>({48:"w-48"})[n.width.toString()]),g=y(()=>n.align==="left"?"origin-top-left left-0":n.align==="right"?"origin-top-right right-0":"origin-top"),d=M(!1);return(v,h)=>(i(),_("div",N,[e("div",{onClick:h[0]||(h[0]=S=>d.value=!d.value)},[f(v.$slots,"trigger")]),L(e("div",{class:"fixed inset-0 z-40",onClick:h[1]||(h[1]=S=>d.value=!1)},null,512),[[q,d.value]]),r(E,{"enter-active-class":"transition ease-out duration-200","enter-from-class":"transform opacity-0 scale-95","enter-to-class":"transform opacity-100 scale-100","leave-active-class":"transition ease-in duration-75","leave-from-class":"transform opacity-100 scale-100","leave-to-class":"transform opacity-0 scale-95"},{default:s(()=>[L(e("div",{class:c(["absolute z-50 mt-2 rounded-md shadow-lg",[l.value,g.value]]),style:{display:"none"},onClick:h[2]||(h[2]=S=>d.value=!1)},[e("div",{class:c(["rounded-md ring-1 ring-black ring-opacity-5",a.contentClasses])},[f(v.$slots,"content")],2)],2),[[q,d.value]])]),_:3})]))}},u={__name:"DropdownLink",props:{href:{type:String,required:!0}},setup(a){return(n,t)=>(i(),m(b(x),{href:a.href,class:"block w-full px-4 py-2 text-left text-sm leading-5 text-gray-700 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 transition duration-150 ease-in-out"},{default:s(()=>[f(n.$slots,"default")]),_:3},8,["href"]))}},C={__name:"NavLink",props:{href:{type:String,required:!0},active:{type:Boolean}},setup(a){const n=a,t=y(()=>n.active?"inline-flex items-center px-1 pt-1 border-b-2 border-indigo-400 text-sm font-medium leading-5 text-gray-900 focus:outline-none focus:border-indigo-700 transition duration-150 ease-in-out":"inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-sm font-medium leading-5 text-gray-500 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out");return(l,g)=>(i(),m(b(x),{href:a.href,class:c(t.value)},{default:s(()=>[f(l.$slots,"default")]),_:3},8,["href","class"]))}},p={__name:"ResponsiveNavLink",props:{href:{type:String,required:!0},active:{type:Boolean}},setup(a){const n=a,t=y(()=>n.active?"block w-full pl-3 pr-4 py-2 border-l-4 border-indigo-400 text-left text-base font-medium text-indigo-700 bg-indigo-50 focus:outline-none focus:text-indigo-800 focus:bg-indigo-100 focus:border-indigo-700 transition duration-150 ease-in-out":"block w-full pl-3 pr-4 py-2 border-l-4 border-transparent text-left text-base font-medium text-gray-600 hover:text-gray-800 hover:bg-gray-50 hover:border-gray-300 focus:outline-none focus:text-gray-800 focus:bg-gray-50 focus:border-gray-300 transition duration-150 ease-in-out");return(l,g)=>(i(),m(b(x),{href:a.href,class:c(t.value)},{default:s(()=>[f(l.$slots,"default")]),_:3},8,["href","class"]))}},j={class:"min-h-screen bg-gray-100"},O={class:"bg-white border-b border-gray-100"},R={class:"px-4 mx-auto max-w-7xl sm:px-6 lg:px-8"},V={class:"flex justify-between h-16"},A={class:"flex"},P={class:"flex items-center shrink-0"},T={class:"hidden space-x-8 sm:-my-px sm:ml-10 sm:flex"},U={class:"hidden sm:flex sm:items-center sm:ml-6"},F={class:"relative ml-3"},G=e("span",{class:"inline-flex rounded-md"},[e("button",{type:"button",class:"inline-flex items-center px-3 py-2 text-sm font-medium leading-4 text-gray-500 transition duration-150 ease-in-out bg-white border border-transparent rounded-md hover:text-gray-700 focus:outline-none"},[o(" Parametros "),e("svg",{class:"ml-2 -mr-0.5 h-4 w-4",xmlns:"http://www.w3.org/2000/svg",viewBox:"0 0 20 20",fill:"currentColor"},[e("path",{"fill-rule":"evenodd",d:"M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z","clip-rule":"evenodd"})])])],-1),H={class:"hidden sm:flex sm:items-center sm:ml-6"},I={class:"relative ml-3"},J=e("span",{class:"inline-flex rounded-md"},[e("button",{type:"button",class:"inline-flex items-center px-3 py-2 text-sm font-medium leading-4 text-gray-500 transition duration-150 ease-in-out bg-white border border-transparent rounded-md hover:text-gray-700 focus:outline-none"},[o(" Relatórios "),e("svg",{class:"ml-2 -mr-0.5 h-4 w-4",xmlns:"http://www.w3.org/2000/svg",viewBox:"0 0 20 20",fill:"currentColor"},[e("path",{"fill-rule":"evenodd",d:"M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z","clip-rule":"evenodd"})])])],-1),K={class:"hidden sm:flex sm:items-center sm:ml-6"},Q={class:"relative ml-3"},W={class:"inline-flex rounded-md"},X={type:"button",class:"inline-flex items-center px-3 py-2 text-sm font-medium leading-4 text-gray-500 transition duration-150 ease-in-out bg-white border border-transparent rounded-md hover:text-gray-700 focus:outline-none"},Y=e("svg",{class:"ml-2 -mr-0.5 h-4 w-4",xmlns:"http://www.w3.org/2000/svg",viewBox:"0 0 20 20",fill:"currentColor"},[e("path",{"fill-rule":"evenodd",d:"M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z","clip-rule":"evenodd"})],-1),Z={class:"flex items-center -mr-2 sm:hidden"},ee={class:"w-6 h-6",stroke:"currentColor",fill:"none",viewBox:"0 0 24 24"},te={class:"pt-2 pb-3 space-y-1"},se={class:"pt-2 pb-3 space-y-1"},re={class:"pt-2 pb-3 space-y-1"},oe={class:"pt-4 pb-1 border-t border-gray-200"},ne={class:"px-4"},ae={class:"text-base font-medium text-gray-800"},ie={class:"text-sm font-medium text-gray-500"},le={class:"mt-3 space-y-1"},de={key:0,class:"bg-white shadow"},ue={class:"px-4 py-6 mx-auto max-w-7xl sm:px-6 lg:px-8"},he={__name:"AuthenticatedLayout",props:["auth"],setup(a){const n=M(!1);return(t,l)=>(i(),_("div",null,[e("div",j,[e("nav",O,[e("div",R,[e("div",V,[e("div",A,[e("div",P,[r(b(x),{href:t.route("dashboard.index")},{default:s(()=>[r(B,{class:"block w-auto text-gray-800 fill-current h-9"})]),_:1},8,["href"])]),e("div",T,[r(C,{href:t.route("dashboard.index"),active:t.route().current("dashboard.index")},{default:s(()=>[o(" Dashboard ")]),_:1},8,["href","active"]),r(C,{href:t.route("equipment.index"),active:t.route().current("equipment.index")},{default:s(()=>[o(" Equipamentos ")]),_:1},8,["href","active"]),r(C,{href:t.route("service_order.index"),active:t.route().current("service_order.index")},{default:s(()=>[o(" Ordens de Serviço ")]),_:1},8,["href","active"]),e("div",U,[e("div",F,[r($,{align:"right",width:"48"},{trigger:s(()=>[G]),content:s(()=>[r(u,{href:t.route("equipment_situation.index")},{default:s(()=>[o(" Situação do equipamento ")]),_:1},8,["href"]),r(u,{href:t.route("maintenance.index")},{default:s(()=>[o(" Tipos de Manutenção ")]),_:1},8,["href"]),r(u,{href:t.route("status_service_order.index")},{default:s(()=>[o(" Status da OS ")]),_:1},8,["href"])]),_:1})])]),e("div",H,[e("div",I,[r($,{align:"right",width:"48"},{trigger:s(()=>[J]),content:s(()=>[r(u,{href:t.route("maintenance_report.index")},{default:s(()=>[o(" Manutenções")]),_:1},8,["href"])]),_:1})])])])]),e("div",K,[e("div",Q,[r($,{align:"right",width:"48"},{trigger:s(()=>[e("span",W,[e("button",X,[o(w(t.$page.props.auth.user.name)+" ",1),Y])])]),content:s(()=>[r(u,{href:t.route("profile.edit")},{default:s(()=>[o(" Perfil ")]),_:1},8,["href"]),t.$page.props.auth.user.is_admin?(i(),m(u,{key:0,href:t.route("register")},{default:s(()=>[o(" Registrar ")]),_:1},8,["href"])):k("",!0),r(u,{href:t.route("logout"),method:"post",as:"button"},{default:s(()=>[o(" Sair ")]),_:1},8,["href"])]),_:1})])]),e("div",Z,[e("button",{onClick:l[0]||(l[0]=g=>n.value=!n.value),class:"inline-flex items-center justify-center p-2 text-gray-400 transition duration-150 ease-in-out rounded-md hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500"},[(i(),_("svg",ee,[e("path",{class:c({hidden:n.value,"inline-flex":!n.value}),"stroke-linecap":"round","stroke-linejoin":"round","stroke-width":"2",d:"M4 6h16M4 12h16M4 18h16"},null,2),e("path",{class:c({hidden:!n.value,"inline-flex":n.value}),"stroke-linecap":"round","stroke-linejoin":"round","stroke-width":"2",d:"M6 18L18 6M6 6l12 12"},null,2)]))])])])]),e("div",{class:c([{block:n.value,hidden:!n.value},"sm:hidden"])},[e("div",te,[r(p,{href:t.route("dashboard.index"),active:t.route().current("dashboard.index")},{default:s(()=>[o(" Dashboard ")]),_:1},8,["href","active"])]),e("div",se,[r(p,{href:t.route("equipment.index"),active:t.route().current("equipment.index")},{default:s(()=>[o(" Equipamentos ")]),_:1},8,["href","active"])]),e("div",re,[r(p,{href:t.route("service_order.index"),active:t.route().current("service_order.index")},{default:s(()=>[o(" Ordens de Serviço ")]),_:1},8,["href","active"])]),e("div",oe,[e("div",ne,[e("div",ae,w(t.$page.props.auth.user.name),1),e("div",ie,w(t.$page.props.auth.user.email),1)]),e("div",le,[r(p,{href:t.route("profile.edit")},{default:s(()=>[o(" Profile ")]),_:1},8,["href"]),t.$page.props.auth.user.is_admin?(i(),m(p,{key:0,href:t.route("register")},{default:s(()=>[o(" Register ")]),_:1},8,["href"])):k("",!0),r(p,{href:t.route("logout"),method:"post",as:"button"},{default:s(()=>[o(" Log Out ")]),_:1},8,["href"])])])],2)]),t.$slots.header?(i(),_("header",de,[e("div",ue,[f(t.$slots,"header")])])):k("",!0),e("main",null,[f(t.$slots,"default")])])]))}};export{he as _};
