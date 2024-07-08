


<div class = "fixed w-full z-30 flex bg-white  p-2 items-center justify-between h-16 px-10">
        <div class = "logo ml-12 text-white  transform ease-in-out duration-500 flex-none h-full flex items-center justify-center">
            <img src="doctor.png" alt="" class=" ml-2 h-14">
        </div>
        <!-- SPACER -->
        <div class = "grow h-full flex items-center justify-center " ></div>                    
                <div class = "flex-none h-full text-center flex space-x-10  items-center justify-center"> 
                    <div class="flex items-center ">
                        <span id="current-time" class=""> </span>
                        <i class="fas fa-calendar-alt"></i>
                    </div>              
                    <a href="/" class = "flex flex-col items-center px-3 mt-5">
                        <div class = "flex-none flex justify-center">
                            <div class="w-10 h-10 flex ">
                                <img src="{{asset('imgs/logo.png')}}" alt="profile" class="shadow rounded-full object-cover" />
                            </div>
                        </div>
                        <div class = " md:block text-sm md:text-md text-black ">{{Auth::user()->name}}</div>
                    </a>
              </div>
        </div>
    <aside class = "w-60 -translate-x-48 fixed transition transform ease-in-out duration-1000 z-50 flex h-screen bg-white  ">
        <!-- open sidebar button -->
        <div class = "max-toolbar translate-x-24  mx-auto scale-x-0 w-full -right-6 transition transform ease-in duration-300 flex items-center justify-between border-4 border-gray-200 border-gray-300 bg-gray-300  absolute top-2 rounded-full h-12">
            <div  class = "flex items-center space-x-3 group bg-gradient-to-r from-blue-700 to-blue-500 from-blue-200 via-blue-500 to-blue-800  pl-10 pr-2 py-1 rounded-full text-white  ">
                <div class= "transform ease-in-out duration-300 mr-12">
                {{ config('app.name') }} 
                </div>
            </div>
        </div>
        <div onclick="openNav()" class = "-right-6 transition transform ease-in-out duration-500 flex border-4 border-white  hover:bg-blue-300  bg-[#0000FF] absolute top-2 p-3 rounded-full text-white hover:rotate-45">          
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" shape-rendering="geometricPrecision" stroke="currentColor" class="w-4 h-4" text-rendering="geometricPrecision" image-rendering="optimizeQuality" fill-rule="evenodd" clip-rule="evenodd" viewBox="0 0 512 481.157"><path fill="currentColor" d="M35.64 0h159.702c19.604 0 35.641 16.037 35.641 35.64v145.308c0 19.604-16.037 35.64-35.641 35.64H35.64c-19.603 0-35.64-16.036-35.64-35.64V35.64C0 16.037 16.037 0 35.64 0zm281.017 264.569h159.702c19.604 0 35.641 16.036 35.641 35.64v145.307c0 19.604-16.037 35.641-35.641 35.641H316.657c-19.603 0-35.64-16.037-35.64-35.641V300.209c0-19.604 16.037-35.64 35.64-35.64zm-281.017 0h159.702c19.604 0 35.641 16.036 35.641 35.64v145.307c0 19.604-16.037 35.641-35.641 35.641H35.64C16.037 481.157 0 465.12 0 445.516V300.209c0-19.604 16.037-35.64 35.64-35.64zM316.657 0h159.702C495.963 0 512 16.037 512 35.64v145.308c0 19.604-16.037 35.64-35.641 35.64H316.657c-19.603 0-35.64-16.036-35.64-35.64V35.64c0-19.603 16.037-35.64 35.64-35.64z"/></svg>
        </div>
        <!-- MAX SIDEBAR-->
        <div class= "max hidden text-white mt-20 flex-col space-y-2 w-full h-[calc(100vh)]">
            <a href="/dashboard" class =  "hover:bg-[#0000FF] w-full text-[#0000FF] hover:text-white hover:text-white hover:ml-3 border-2 border-white  p-2 pl-8 rounded-full transform ease-in-out duration-300 flex flex-row items-center space-x-3">
                <x-icon name="dashboard"/>
                <div>
                    Dashboard
                </div>
            </a>
            <a href="/dashboard/properties" class =  "hover:bg-[#0000FF] w-full text-[#0000FF] hover:text-white  hover:ml-3 border-2 border-white p-2 pl-8 rounded-full transform ease-in-out duration-300 flex flex-row items-center space-x-3">                 
                <x-icon name="property"/>                  
                <div>
                    Properties
                </div>
            </a>
            <a href="/dashboard/owners" class =  "hover:bg-[#0000FF] w-full text-[#0000FF] hover:text-white  hover:ml-3 border-2 border-white p-2 pl-8 rounded-full transform ease-in-out duration-300 flex flex-row items-center space-x-3">                 
                <x-icon name="owner"/>                  
                <div>
                    Owners
                </div>
            </a>
            <a href="/dashboard/tenents" class =  "hover:bg-[#0000FF] w-full text-[#0000FF] hover:text-white  hover:ml-3 border-2 border-white p-2 pl-8 rounded-full transform ease-in-out duration-300 flex flex-row items-center space-x-3">                 
                <x-icon name="tenant"/>                  
                <div>
                    Tenants
                </div>
            </a>
            
            <form method="POST" action="{{ route('logout') }}" class="hover:bg-[#0000FF] w-full text-[#0000FF] hover:text-white hover:ml-3 border-2 border-white p-2 pl-8 rounded-full transform ease-in-out duration-300 flex flex-row items-center space-x-3">
                @csrf
                <x-icon name="logout"/>
                <button type="submit">
                    Log Out
                </button>
            </form>

        </div>
        <!-- MINI SIDEBAR-->
        <div class= "mini mt-20 flex flex-col space-y-2 w-full h-[calc(100vh)]">
            <a href="/dashboard" class= "hover:bg-[#0000FF] justify-end pr-5 text-[#0000FF] hover:text-white hover:ml-3 border-2 border-white hover:text-white w-full  p-3 rounded-full transform ease-in-out duration-300 flex">
                <x-icon name="dashboard"/>              
            </a>
            <a href="/dashboard/properties" class= "hover:bg-[#0000FF] justify-end pr-5 text-[#0000FF] hover:text-white hover:ml-3 border-2 border-white hover:text-white w-full   p-3 rounded-full transform ease-in-out duration-300 flex">
                <x-icon name="property"/>              
            </a>
            <a href="/dashboard/owners" class= "hover:bg-[#0000FF] hover:ml-4 justify-end pr-5 text-[#0000FF] hover:text-white hover:ml-3 border-2 border-white hover:text-white w-full  p-3 rounded-full transform ease-in-out duration-300 flex">
            <x-icon name="owner"/>              
            </a>
            <a href="/dashboard/tenants" class= "hover:bg-[#0000FF] hover:ml-4 justify-end pr-4 text-[#0000FF] hover:text-white hover:ml-3 border-2 border-white hover:text-white w-full  p-3 rounded-full transform ease-in-out duration-300 flex">
            <x-icon name="tenant"/>              
            </a>
        </div>
        
    </aside>
   