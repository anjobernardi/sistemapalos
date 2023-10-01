import{m as f,l as b,T as w,o,f as r,a as l,u as v,Z as k,w as c,b as t,e as h,F as d,q as _,t as s}from"./app-c3725b55.js";import{_ as q}from"./AuthenticatedLayout-8d066e34.js";import{_ as C}from"./Modal-69361d27.js";import"./ApplicationLogo-a7e50e22.js";import"./_plugin-vue_export-helper-c27b6911.js";const R=t("h2",{class:"text-xl font-semibold leading-tight text-gray-800"},"Relatório",-1),B={class:"py-12"},M={class:"mx-auto max-w-7xl sm:px-6 lg:px-8"},$=["href"],D={class:"overflow-hidden bg-white shadow-sm sm:rounded-lg"},E={class:"col-span-2 row-span-2"},S={class:"relative overflow-x-auto shadow-md sm:rounded-lg"},j={class:"w-full text-sm text-left text-gray-500 dark:text-gray-400"},F=t("thead",{class:"text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400"},[t("tr",null,[t("th",{scope:"col",class:"px-6 py-3"}," Ordem de Serviço "),t("th",{scope:"col",class:"px-6 py-3"}," Equipamento "),t("th",{scope:"col",class:"px-6 py-3"}," Identificação "),t("th",{scope:"col",class:"px-6 py-3"}," Ítem "),t("th",{scope:"col",class:"px-6 py-3"}," Data ")])],-1),I={class:"bg-white border-b dark:bg-gray-800 dark:border-gray-700"},N={scope:"row",class:"px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white"},O={class:"px-6 py-4"},T={class:"px-6 py-4"},V={class:"px-6 py-4"},A={class:"px-6 py-4"},G={class:"p-6"},L={class:"w-full text-sm text-left text-gray-500 dark:text-gray-400"},Z=t("thead",{class:"text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400"},[t("tr",null,[t("th",{scope:"col",class:"px-6 py-3"}," Arquivo "),t("th",{scope:"col",class:"px-6 py-3"}," Download ")])],-1),z={class:"bg-white border-b dark:bg-gray-800 dark:border-gray-700"},H={scope:"row",class:"px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white"},J={scope:"row",class:"px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white"},K={class:"px-6 py-4 text-right"},P=["href"],tt={__name:"MaintenanceReport",props:["maintenances","filenames"],setup(p){const u=f(),i=b(!1),m=w("getparams",{}),g=async()=>{await m.get(route("maintenance_report.generate"),{onSuccess:async a=>{u.success("Relatório gerado com sucesso!")},onError:a=>{u.error("Ocorreu um erro, verifique os dados e tente novamente.")}})},y=()=>{i.value=!0},x=()=>{i.value=!1,m.reset()};return(a,n)=>(o(),r(d,null,[l(v(k),{title:"Relatório"}),l(q,null,{header:c(()=>[R]),default:c(()=>[t("div",B,[t("div",M,[t("a",{href:a.route("maintenance_report.index")},[t("button",{type:"button",onClick:n[0]||(n[0]=h(e=>g(),["prevent"])),class:"inline-flex justify-items-start mr-2 mb-2 px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center text-white bg-yellow-400 rounded-lg focus:ring-4 focus:ring-primary-200 dark:focus:ring-primary-900 hover:bg-yellow-500"}," Gerar relatório ")],8,$),t("button",{type:"button",onClick:n[1]||(n[1]=h(e=>y(),["prevent"])),class:"inline-flex justify-items-start mr-2 mb-2 px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center text-white bg-blue-500 rounded-lg focus:ring-4 focus:ring-primary-200 dark:focus:ring-primary-900 hover:bg-blue-600"}," Imprimir "),t("div",D,[t("div",E,[t("div",S,[t("table",j,[F,t("tbody",null,[(o(!0),r(d,null,_(p.maintenances,e=>(o(),r("tr",I,[t("th",N,s(e.service_order_id),1),t("td",O,s(e.equipment_id),1),t("td",T,s(e.identification),1),t("td",V,s(e.part_id),1),t("td",A,s(e.next_maintenance),1)]))),256))])])])])])])]),t("section",null,[l(C,{show:i.value,onClose:x},{default:c(()=>[t("div",G,[t("table",L,[Z,t("tbody",null,[(o(!0),r(d,null,_(p.filenames,e=>(o(),r("tr",z,[t("th",H,s(e),1),t("th",J,[t("td",K,[t("a",{href:a.route("maintenance_report.download",e),onClose:x,class:"font-medium text-blue-600 dark:text-blue-500 hover:underline",target:"_blank"},"Baixar",40,P)])])]))),256))])])])]),_:1},8,["show"])])]),_:1})],64))}};export{tt as default};