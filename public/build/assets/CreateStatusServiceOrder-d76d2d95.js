import{m as h,T as x,o as m,f as l,a,u as r,Z as f,w as i,b as e,t as d,e as y,i as b,p as v,g as S,d as w,F as k}from"./app-38bdbff5.js";import{_ as O}from"./AuthenticatedLayout-c10e4482.js";import{P as N}from"./PrimaryButton-b71cd2f0.js";import"./ApplicationLogo-7adbd795.js";import"./_plugin-vue_export-helper-c27b6911.js";const V=e("h2",{class:"text-xl font-semibold leading-tight text-gray-800"},"Status OS",-1),B={class:"py-12"},C={class:"mx-auto max-w-7xl sm:px-6 lg:px-8"},T={class:"overflow-hidden bg-white shadow-sm sm:rounded-lg"},D={class:"bg-white dark:bg-gray-900"},E={class:"max-w-2xl px-4 py-8 mx-auto lg:py-16"},F={class:"mb-4 text-xl font-bold text-gray-900 dark:text-white"},M=["onSubmit"],P={class:"grid gap-4 sm:grid-cols-2 sm:gap-6"},q={class:"w-full"},U=e("label",{for:"description",class:"block mb-2 text-sm font-medium text-gray-900 dark:text-white"},"Descrição",-1),Z={key:0},$={class:"grid-cols-2"},j=["href"],z=e("button",{type:"button",class:"inline-flex items-center mr-2 mb-2 px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center text-white bg-gray-700 rounded-lg focus:ring-4 focus:ring-primary-200 dark:focus:ring-primary-900 hover:bg-gray-800"}," Cancelar ",-1),A=[z],L={__name:"CreateStatusServiceOrder",props:["auth","status_service_order"],setup(o){const{auth:_,status_service_order:c}=o,n=h(),t=x("getparams",{status_service_order:c}),g=async()=>{await t.transform(s=>({id:c.id??null,description:s.status_service_order.description,created_by_company_id:_.user.company_id})).post(route("create_status_service_order.store",t.status_service_order),{onSuccess:async s=>{n.success("Status da OS gravada com sucesso!")},onError:s=>{t.errors=s,n.error("Ocorreu um erro")}})};return(s,u)=>(m(),l(k,null,[a(r(f),{title:"Status OS"}),a(O,null,{header:i(()=>[V]),default:i(()=>[e("div",B,[e("div",C,[e("div",T,[e("section",D,[e("div",E,[e("h2",F,d(o.status_service_order.id>0?"Editar Status OS":"Novo Status OS")+" - "+d(o.status_service_order.id),1),e("form",{onSubmit:y(g,["prevent"])},[e("div",P,[e("div",q,[U,b(e("input",{"onUpdate:modelValue":u[0]||(u[0]=p=>r(t).status_service_order.description=p),type:"text",name:"description",id:"description",class:"bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500",placeholder:"Status da OS",required:""},null,512),[[v,r(t).status_service_order.description]]),r(t).errors.description?(m(),l("div",Z,d(r(t).errors.description),1)):S("",!0)])]),e("div",$,[a(N,{method:"post",type:"submit",class:"inline-flex items-center mr-2 mb-2 px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center text-white bg-green-600 rounded-lg focus:ring-4 focus:ring-green-300 dark:focus:ring-green-800 hover:bg-green-800"},{default:i(()=>[w(" Salvar ")]),_:1}),e("a",{href:s.route("status_service_order.index")},A,8,j)])],40,M)])])])])])]),_:1})],64))}};export{L as default};
