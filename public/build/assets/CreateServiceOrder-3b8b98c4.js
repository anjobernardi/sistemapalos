import{m as te,l as b,T as se,B as oe,o as d,f as l,a as p,u as s,Z as ae,w as _,b as e,t as n,e as v,i as c,C as D,F as y,q as h,p as g,g as m,v as E,d as S,n as ie}from"./app-1fccee16.js";import{_ as de}from"./AuthenticatedLayout-712e724b.js";import{P as le}from"./PrimaryButton-156da6aa.js";import{_ as ne,D as ce}from"./SecondaryButton-9dbdc84e.js";import{_ as R}from"./Modal-d49873a3.js";import"./ApplicationLogo-4584d013.js";import"./_plugin-vue_export-helper-c27b6911.js";const ue=e("h2",{class:"text-xl font-semibold leading-tight text-gray-800"},"Ordem de Serviço",-1),me={class:"py-12"},pe={class:"mx-auto max-w-7xl sm:px-6 lg:px-8"},_e={class:"overflow-hidden bg-white shadow-sm sm:rounded-lg"},ge={class:"bg-white dark:bg-gray-900"},ye={class:"max-w-2xl px-4 py-8 mx-auto lg:py-16"},be={class:"mb-4 text-xl font-bold text-gray-900 dark:text-white"},ve=["onSubmit"],he={class:"grid gap-4 sm:grid-cols-2 sm:gap-6"},fe=e("label",{for:"maintenance_id",class:"block mb-2 text-sm font-medium text-gray-900 dark:text-white"},"Manutenção",-1),xe=["value"],ke=e("label",{for:"status_service_order_id",class:"block mb-2 text-sm font-medium text-gray-900 dark:text-white"},"Status OS",-1),we=["value"],qe=e("label",{for:"equipment_situation_id",class:"block mb-2 text-sm font-medium text-gray-900 dark:text-white"},"Situação do Equipamento",-1),Se=["value"],Ce={class:"w-full"},Ve={key:0},Oe={class:"col-span-2 row-span-2"},Ue={class:"w-full text-sm text-left text-gray-500 border border-separate rounded-lg border-spacing-2 border-slate-300 dark:text-gray-400"},De=e("thead",{class:"text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400"},[e("tr",null,[e("th",{scope:"col",class:"p-4"},[e("div",{class:"flex items-center"},[e("input",{id:"checkbox-all-search",type:"checkbox",class:"w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600"}),e("label",{for:"checkbox-all-search",class:"sr-only"},"checkbox")])]),e("th",{scope:"col",class:"px-6 py-3"}," ID "),e("th",{scope:"col",class:"px-6 py-3"}," Descrição "),e("th",{scope:"col",class:"px-6 py-3"}," Periodo ")])],-1),Ee={class:"bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600"},Me={class:"w-4 p-4"},Be={class:"flex items-center"},Te=["value"],$e=e("label",{for:"checkbox-table-search-1",class:"sr-only"},"checkbox",-1),Fe={scope:"row",class:"px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white"},Ne={class:"px-6 py-4"},ze={class:"px-6 py-4"},je={class:"col-span-2 row-span-2"},Ae=e("label",{for:"opening_user",class:"block mb-2 text-sm font-medium text-gray-900 dark:text-white"},"Usuário abertura",-1),Ie=["value"],Pe={key:2},He={class:"w-full"},Le=e("label",{for:"value_labor",class:"block mb-2 text-sm font-medium text-gray-900 dark:text-white"},"Hora trabalhada",-1),Ze={key:0},Ge={class:"w-full"},Je=e("label",{for:"value_parts",class:"block mb-2 text-sm font-medium text-gray-900 dark:text-white"},"Valor peças",-1),Ke={key:0},Qe={class:"w-full"},Re=e("label",{for:"third_part_service",class:"block mb-2 text-sm font-medium text-gray-900 dark:text-white"},"Valor terceiros",-1),We={key:0},Xe={class:"w-full"},Ye=e("label",{for:"observation",class:"block mb-2 text-sm font-medium text-gray-900 dark:text-white"},"Observação",-1),er={key:0},rr={class:"sm:col-span-2"},tr=e("label",{for:"description",class:"block mb-2 text-sm font-medium text-gray-900 dark:text-white"},"Descrição",-1),sr={key:0},or={class:"flex items-center mb-4"},ar=e("label",{for:"mechanical_team",class:"ml-2 text-sm font-medium text-gray-900 dark:text-gray-300"},"Time mecânico",-1),ir={key:0},dr={class:"flex items-center mb-4"},lr=e("label",{for:"electrical_team",class:"ml-2 text-sm font-medium text-gray-900 dark:text-gray-300"},"Time elétrico",-1),nr={key:0},cr={class:"flow-root"},ur={class:"float-left"},mr=["href"],pr=e("button",{type:"button",class:"inline-flex items-center mr-2 mb-2 px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center text-white bg-gray-700 rounded-lg focus:ring-4 focus:ring-primary-200 dark:focus:ring-primary-900 hover:bg-gray-800"}," Cancelar ",-1),_r=[pr],gr={class:"float-right"},yr=["href"],br={class:"bg-white dark:bg-gray-900"},vr={class:"overflow-hidden bg-white shadow-sm sm:rounded-lg"},hr={class:"relative overflow-x-auto shadow-md sm:rounded-lg"},fr={class:"w-full text-sm text-left text-gray-500 dark:text-gray-400"},xr=e("thead",{class:"text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400"},[e("tr",null,[e("th",{scope:"col",class:"px-6 py-3"}," Equipamento Id "),e("th",{scope:"col",class:"px-6 py-3"},[e("div",{class:"flex items-center"},[S(" Identificação "),e("a",{href:"#"},[e("svg",{xmlns:"http://www.w3.org/2000/svg",class:"w-3 h-3 ml-1","aria-hidden":"true",fill:"currentColor",viewBox:"0 0 320 512"},[e("path",{d:"M27.66 224h264.7c24.6 0 36.89-29.78 19.54-47.12l-132.3-136.8c-5.406-5.406-12.47-8.107-19.53-8.107c-7.055 0-14.09 2.701-19.45 8.107L8.119 176.9C-9.229 194.2 3.055 224 27.66 224zM292.3 288H27.66c-24.6 0-36.89 29.77-19.54 47.12l132.5 136.8C145.9 477.3 152.1 480 160 480c7.053 0 14.12-2.703 19.53-8.109l132.3-136.8C329.2 317.8 316.9 288 292.3 288z"})])])])]),e("th",{scope:"col",class:"px-6 py-3"}," Descrição "),e("th",{scope:"col",class:"px-6 py-3"}," Ativo "),e("th",{scope:"col",class:"px-6 py-3"}," Ação ")])],-1),kr={class:"bg-white border-b dark:bg-gray-800 dark:border-gray-700"},wr={scope:"row",class:"px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white"},qr={scope:"row",class:"px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white"},Sr={class:"px-6 py-4"},Cr={class:"px-6 py-4"},Vr={class:"px-6 py-4 text-right"},Or=["onClick"],Ur={class:"p-6"},Dr=e("h2",{class:"text-lg font-medium text-gray-900"}," Tem certeza que deseja encerrar a Ordem de Serviço? ",-1),Er=e("p",{class:"mt-1 text-sm text-gray-600"}," Após o encerramento não será mais possivel alterá-la. ",-1),Mr={class:"flex justify-end mt-6"},Lr={__name:"CreateServiceOrder",props:["auth","service_order","maintenances","status_service_orders","equipment_situations","equipments"],setup(u){var B,T,$,F,N,z,j,A,I,P,H,L,Z,G;const{auth:C,service_order:o,maintenances:Br,status_service_orders:Tr,equipment_situations:$r,equipments:Fr}=u,M=te(),f=b(!0);f.value=o.mechanical_team==1;const x=b(!0);x.value=o.electrical_team==1;const k=b(!1),V=b(!1),w=b([]);let O=[];((B=o.equipment)==null?void 0:B.parts.length)>=1?O=o.equipment.parts:O=[{id:((T=o.equipment)==null?void 0:T.parts.id)??null,description:(($=o.equipment)==null?void 0:$.parts.description)??null,period:((F=o.equipment)==null?void 0:F.parts.period)??null,active:((N=o.equipment)==null?void 0:N.parts.active)??null}],o.id>=1&&(w.value=o.parts.map(i=>i.id));const r=se("getparams",{service_order:{id:o.id??null,maintenance_id:o.maintenance_id??null,status_service_order_id:o.status_service_order_id??null,equipment_situation_id:o.equipment_situation_id??null,equipment_id:o.equipment_id??null,opening_user:((z=o.open_user)==null?void 0:z.name)??null,closing_user:((j=o.close_user)==null?void 0:j.name)??null,value_labor:o.value_labor??null,value_parts:o.value_parts??null,third_part_service:o.third_part_service??null,observation:o.observation??null,description:o.description??null,electrical_team:o.electrical_team??null,mechanical_team:o.mechanical_team??null,closed:o.closed??!1,created_by_company_id:o.created_by_company_id??null,equipment:{identification:((A=o.equipment)==null?void 0:A.identification)??null,qrcode:((I=o.equipment)==null?void 0:I.qrcode)??null,description:((P=o.equipment)==null?void 0:P.description)??null,location:((H=o.equipment)==null?void 0:H.location)??null,predictive:((L=o.equipment)==null?void 0:L.predictive)??null,active:((Z=o.equipment)==null?void 0:Z.active)??null,created_by_company_id:((G=o.equipment)==null?void 0:G.created_by_company_id)??null,parts:O}}}),W=async()=>{await r.transform(i=>({id:i.service_order.id??null,maintenance_id:i.service_order.maintenance_id,status_service_order_id:i.service_order.status_service_order_id,equipment_situation_id:i.service_order.equipment_situation_id,equipment_id:i.service_order.equipment_id,opening_user:i.service_order.opening_user?o.open_user.id:C.user.id,closing_user:i.service_order.closing_user?o.close_user.id:C.user.id,value_labor:i.service_order.value_labor,value_parts:i.service_order.value_parts,third_part_service:i.service_order.third_part_service,observation:i.service_order.observation,description:i.service_order.description,electrical_team:f.value,mechanical_team:x.value,closed:!1,created_by_company_id:C.user.company_id,selected:w.value})).post(route("create_service_order.store",r.service_order),{onSuccess:async i=>{M.success("Ordem de Serviço gravada com sucesso!")},onError:i=>{r.errors=i,M.error("Ocorreu um erro")}})},X=()=>{V.value=!0},Y=async i=>{r.service_order.equipment_id=i.id,r.service_order.equipment=i,k.value=!1},ee=()=>{k.value=!0},q=()=>{k.value=!1,V.value=!1,r.reset()},re=async i=>{await r.patch(route("create_service_order.close",i),{preserveScroll:!0,onSuccess:()=>q(),onFinish:()=>r.reset()})};return(i,a)=>{const U=oe("maska");return d(),l(y,null,[p(s(ae),{title:"Ordem de Serviço"}),p(de,null,{header:_(()=>[ue]),default:_(()=>{var J,K;return[e("div",me,[e("div",pe,[e("div",_e,[e("section",ge,[e("div",ye,[e("h2",be,n(u.service_order.id>0?"Editar Ordem de Serviço":"Nova Ordem de serviço")+" - "+n(u.service_order.number_so),1),e("form",{onSubmit:v(W,["prevent"])},[e("div",he,[e("div",null,[fe,c(e("select",{"onUpdate:modelValue":a[0]||(a[0]=t=>s(r).service_order.maintenance_id=t),class:"bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"},[(d(!0),l(y,null,h(u.maintenances,t=>(d(),l("option",{value:t.id},n(t.description),9,xe))),256))],512),[[D,s(r).service_order.maintenance_id]])]),e("div",null,[ke,c(e("select",{"onUpdate:modelValue":a[1]||(a[1]=t=>s(r).service_order.status_service_order_id=t),id:"status_service_order_id",class:"bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"},[(d(!0),l(y,null,h(u.status_service_orders,t=>(d(),l("option",{value:t.id},n(t.description),9,we))),256))],512),[[D,s(r).service_order.status_service_order_id]])]),e("div",null,[qe,c(e("select",{"onUpdate:modelValue":a[2]||(a[2]=t=>s(r).service_order.equipment_situation_id=t),id:"equipment_situation_id",class:"bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"},[(d(!0),l(y,null,h(u.equipment_situations,t=>(d(),l("option",{value:t.id},n(t.description),9,Se))),256))],512),[[D,s(r).service_order.equipment_situation_id]])]),e("div",Ce,[e("a",{href:"#",onClick:a[3]||(a[3]=v(t=>ee(),["prevent"])),class:"font-medium text-blue-600 dark:text-blue-500 hover:underline"},"Equipamento"),c(e("input",{"onUpdate:modelValue":a[4]||(a[4]=t=>s(r).service_order.equipment.identification=t),type:"text",name:"equipment_id",id:"equipment_id",class:"bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500",placeholder:"Equipamento",required:""},null,512),[[g,s(r).service_order.equipment.identification]]),s(r).errors.equipment_id?(d(),l("div",Ve,n(s(r).errors.equipment_id),1)):m("",!0)]),e("div",Oe,[e("table",Ue,[De,e("tbody",null,[(d(!0),l(y,null,h((J=s(r).service_order.equipment)==null?void 0:J.parts,t=>(d(),l("tr",Ee,[e("td",Me,[e("div",Be,[c(e("input",{"onUpdate:modelValue":a[5]||(a[5]=Q=>w.value=Q),value:t.id,id:"checkbox-table-search-1",type:"checkbox",multiple:"",class:"w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600"},null,8,Te),[[E,w.value]]),$e])]),e("th",Fe,n(t.id),1),e("td",Ne,n(t.description),1),e("td",ze,n(t.period),1)]))),256))])])]),e("div",je,[Ae,(K=u.service_order.open_user)!=null&&K.id?(d(),l("input",{key:0,value:s(r).service_order.opening_user,type:"text",name:"opening_user",id:"opening_user",class:"bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500",placeholder:"Usuário",readonly:""},null,8,Ie)):c((d(),l("input",{key:1,"onUpdate:modelValue":a[6]||(a[6]=t=>u.auth.user.name=t),type:"text",name:"opening_user",id:"opening_user",class:"bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500",placeholder:"Usuário",required:"",readonly:""},null,512)),[[g,u.auth.user.name]]),s(r).errors.opening_user?(d(),l("div",Pe,n(s(r).errors.opening_user),1)):m("",!0)]),e("div",He,[Le,c(e("input",{"onUpdate:modelValue":a[7]||(a[7]=t=>s(r).service_order.value_labor=t),"data-maska":"0.99","data-maska-tokens":"0:\\d:multiple|9:\\d:optional",type:"text",name:"value_labor",id:"value_labor",class:"bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500",placeholder:"Valor hora"},null,512),[[g,s(r).service_order.value_labor],[U]]),s(r).errors.value_labor?(d(),l("div",Ze,n(s(r).errors.value_labor),1)):m("",!0)]),e("div",Ge,[Je,c(e("input",{"onUpdate:modelValue":a[8]||(a[8]=t=>s(r).service_order.value_parts=t),"data-maska":"0.99","data-maska-tokens":"0:\\d:multiple|9:\\d:optional",type:"text",name:"value_parts",id:"value_parts",class:"bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500",placeholder:"Valor peças"},null,512),[[g,s(r).service_order.value_parts],[U]]),s(r).errors.value_parts?(d(),l("div",Ke,n(s(r).errors.value_parts),1)):m("",!0)]),e("div",Qe,[Re,c(e("input",{"onUpdate:modelValue":a[9]||(a[9]=t=>s(r).service_order.third_part_service=t),"data-maska":"0.99","data-maska-tokens":"0:\\d:multiple|9:\\d:optional",type:"text",name:"third_part_service",id:"third_part_service",class:"bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500",placeholder:"Valor terceiros"},null,512),[[g,s(r).service_order.third_part_service],[U]]),s(r).errors.third_part_service?(d(),l("div",We,n(s(r).errors.third_part_service),1)):m("",!0)]),e("div",Xe,[Ye,c(e("input",{"onUpdate:modelValue":a[10]||(a[10]=t=>s(r).service_order.observation=t),type:"text",name:"observation",id:"observation",class:"bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500",placeholder:"Observação"},null,512),[[g,s(r).service_order.observation]]),s(r).errors.observation?(d(),l("div",er,n(s(r).errors.observation),1)):m("",!0)]),e("div",rr,[tr,c(e("textarea",{"onUpdate:modelValue":a[11]||(a[11]=t=>s(r).service_order.description=t),id:"description",rows:"8",class:"block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500",placeholder:"Descrição da ordem de serviço"},null,512),[[g,s(r).service_order.description]]),s(r).errors.description?(d(),l("div",sr,n(s(r).errors.description),1)):m("",!0)]),e("div",or,[c(e("input",{"onUpdate:modelValue":a[12]||(a[12]=t=>f.value=t),id:"mechanical_team",type:"checkbox",value:"1",class:"w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600"},null,512),[[E,f.value]]),ar,s(r).errors.mechanical_team?(d(),l("div",ir,n(s(r).errors.mechanical_team),1)):m("",!0)]),e("div",dr,[c(e("input",{"onUpdate:modelValue":a[13]||(a[13]=t=>x.value=t),id:"electrical_team",type:"checkbox",value:"1",class:"w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600"},null,512),[[E,x.value]]),lr,s(r).errors.electrical_team?(d(),l("div",nr,n(s(r).errors.electrical_team),1)):m("",!0)])]),e("div",cr,[e("div",ur,[p(le,{method:"post",type:"submit",class:"inline-flex items-center mr-2 mb-2 px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center text-white bg-green-600 rounded-lg focus:ring-4 focus:ring-green-300 dark:focus:ring-green-800 hover:bg-green-800"},{default:_(()=>[S(" Salvar ")]),_:1}),e("a",{href:i.route("service_order.index")},_r,8,mr)]),e("div",gr,[e("a",{href:i.route("service_order.index")},[e("button",{type:"button",onClick:a[14]||(a[14]=v(t=>X(),["prevent"])),class:"inline-flex justify-items-end mr-2 mb-2 px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center text-white bg-yellow-400 rounded-lg focus:ring-4 focus:ring-primary-200 dark:focus:ring-primary-900 hover:bg-yellow-500"}," Fechar OS ")],8,yr)])])],40,ve)])])])])]),e("section",br,[p(R,{show:k.value,onClose:q},{default:_(()=>[e("div",vr,[e("div",hr,[e("table",fr,[xr,e("tbody",null,[(d(!0),l(y,null,h(u.equipments,t=>(d(),l("tr",kr,[e("th",wr,n(t.id),1),e("th",qr,n(t.identification),1),e("td",Sr,n(t.description),1),e("td",Cr,n(t.active),1),e("td",Vr,[e("a",{href:"#",onClick:v(Q=>Y(t),["prevent"]),class:"font-medium text-blue-600 dark:text-blue-500 hover:underline"},"Selecionar",8,Or)])]))),256))])])])])]),_:1},8,["show"]),p(R,{show:V.value,onClose:q},{default:_(()=>[e("div",Ur,[Dr,Er,e("div",Mr,[p(ne,{onClick:q},{default:_(()=>[S(" Cancel ")]),_:1}),p(ce,{class:ie(["ml-3",{"opacity-25":s(r).processing}]),disabled:s(r).processing,onClick:a[15]||(a[15]=v(t=>re(s(r).service_order.id),["prevent"]))},{default:_(()=>[S(" Fechar OS ")]),_:1},8,["class","disabled"])])])]),_:1},8,["show"])])]}),_:1})],64)}}};export{Lr as default};