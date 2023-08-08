import{h as w,i as k,v as y,o as i,f as h,T as v,c as u,w as m,a as o,u as s,Z as x,t as V,g as c,b as r,j as B,d as p,n as C,e as $}from"./app-38bdbff5.js";import{_ as P}from"./GuestLayout-d463f09a.js";import{_ as f,a as g,b as _}from"./TextInput-29cb7a73.js";import{P as q}from"./PrimaryButton-b71cd2f0.js";import"./ApplicationLogo-7adbd795.js";import"./_plugin-vue_export-helper-c27b6911.js";const N=["value"],S={__name:"Checkbox",props:{checked:{type:[Array,Boolean],required:!0},value:{default:null}},emits:["update:checked"],setup(l,{emit:e}){const d=l,n=w({get(){return d.checked},set(t){e("update:checked",t)}});return(t,a)=>k((i(),h("input",{type:"checkbox",value:l.value,"onUpdate:modelValue":a[0]||(a[0]=b=>n.value=b),class:"rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500"},null,8,N)),[[y,n.value]])}},U={key:0,class:"mb-4 font-medium text-sm text-green-600"},L=["onSubmit"],R={class:"mt-4"},j={class:"block mt-4"},D={class:"flex items-center"},E=r("span",{class:"ml-2 text-sm text-gray-600"},"Remember me",-1),F={class:"flex items-center justify-end mt-4"},H={__name:"Login",props:{canResetPassword:{type:Boolean},status:{type:String}},setup(l){const e=v({email:"",password:"",remember:!1}),d=()=>{e.post(route("login"),{onFinish:()=>e.reset("password")})};return(n,t)=>(i(),u(P,null,{default:m(()=>[o(s(x),{title:"Log in"}),l.status?(i(),h("div",U,V(l.status),1)):c("",!0),r("form",{onSubmit:$(d,["prevent"])},[r("div",null,[o(f,{for:"email",value:"Email"}),o(g,{id:"email",type:"email",class:"mt-1 block w-full",modelValue:s(e).email,"onUpdate:modelValue":t[0]||(t[0]=a=>s(e).email=a),required:"",autofocus:"",autocomplete:"username"},null,8,["modelValue"]),o(_,{class:"mt-2",message:s(e).errors.email},null,8,["message"])]),r("div",R,[o(f,{for:"password",value:"Password"}),o(g,{id:"password",type:"password",class:"mt-1 block w-full",modelValue:s(e).password,"onUpdate:modelValue":t[1]||(t[1]=a=>s(e).password=a),required:"",autocomplete:"current-password"},null,8,["modelValue"]),o(_,{class:"mt-2",message:s(e).errors.password},null,8,["message"])]),r("div",j,[r("label",D,[o(S,{name:"remember",checked:s(e).remember,"onUpdate:checked":t[2]||(t[2]=a=>s(e).remember=a)},null,8,["checked"]),E])]),r("div",F,[l.canResetPassword?(i(),u(s(B),{key:0,href:n.route("password.request"),class:"underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"},{default:m(()=>[p(" Forgot your password? ")]),_:1},8,["href"])):c("",!0),o(q,{class:C(["ml-4",{"opacity-25":s(e).processing}]),disabled:s(e).processing},{default:m(()=>[p(" Log in ")]),_:1},8,["class","disabled"])])],40,L)]),_:1}))}};export{H as default};
