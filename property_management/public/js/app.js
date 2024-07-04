const sidebar = document.querySelector("aside");
const maxSidebar = document.querySelector(".max")
const miniSidebar = document.querySelector(".mini")
const roundout = document.querySelector(".roundout")
const maxToolbar = document.querySelector(".max-toolbar")
const logo = document.querySelector('.logo')
const content = document.querySelector('.content')
const moon = document.querySelector(".moon")
const sun = document.querySelector(".sun")

function openNav() {
    if(sidebar.classList.contains('-translate-x-48')){
        // max sidebar 
        sidebar.classList.remove("-translate-x-48")
        sidebar.classList.add("translate-x-none")
        maxSidebar.classList.remove("hidden")
        maxSidebar.classList.add("flex")
        miniSidebar.classList.remove("flex")
        miniSidebar.classList.add("hidden")
        maxToolbar.classList.add("translate-x-0")
        maxToolbar.classList.remove("translate-x-24","scale-x-0")
        logo.classList.remove("ml-12")
        content.classList.remove("ml-12")
        content.classList.add("ml-12","md:ml-60")
    }else{
        // mini sidebar
        sidebar.classList.add("-translate-x-48")
        sidebar.classList.remove("translate-x-none")
        maxSidebar.classList.add("hidden")
        maxSidebar.classList.remove("flex")
        miniSidebar.classList.add("flex")
        miniSidebar.classList.remove("hidden")
        maxToolbar.classList.add("translate-x-24","scale-x-0")
        maxToolbar.classList.remove("translate-x-0")
        logo.classList.add('ml-12')
        content.classList.remove("ml-12","md:ml-60")
        content.classList.add("ml-12")

    }

}


function CreateModel()
{
   if(document.getElementById('addProperty').classList.contains('hidden')){
        document.getElementById('addProperty').classList.remove('hidden')
    }else{
        document.getElementById('addProperty').classList.add('hidden')      
    }
}

function editModel(id)
{
   if(document.getElementById(`editProperty${id}`).classList.contains('hidden')){
        document.getElementById(`editProperty${id}`).classList.remove('hidden')
    }else{
        document.getElementById(`editProperty${id}`).classList.add('hidden')      
    }
}

function readMore(id){
    if(document.getElementById(`readMore${id}`).classList.contains('hidden')){
        document.getElementById(`readMore${id}`).classList.remove('hidden')
    }else{
        document.getElementById(`readMore${id}`).classList.add('hidden')      
    }
}

function CreateOwner()
{
   if(document.getElementById('addOwner').classList.contains('hidden')){
        document.getElementById('addOwner').classList.remove('hidden')
    }else{
        document.getElementById('addOwner').classList.add('hidden')      
    }
}
function editOwner(id){
   if(document.getElementById(`editOwner${id}`).classList.contains('hidden')){
        document.getElementById(`editOwner${id}`).classList.remove('hidden')
    }else{
        document.getElementById(`editOwner${id}`).classList.add('hidden')      
    }
}

function Createtenant()
{
   if(document.getElementById('addtenant').classList.contains('hidden')){
        document.getElementById('addtenant').classList.remove('hidden')
    }else{
        document.getElementById('addtenant').classList.add('hidden')      
    }
}
function edittenant(id){
   if(document.getElementById(`edittenant${id}`).classList.contains('hidden')){
        document.getElementById(`edittenant${id}`).classList.remove('hidden')
    }else{
        document.getElementById(`edittenant${id}`).classList.add('hidden')      
    }
}
