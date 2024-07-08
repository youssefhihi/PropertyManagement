<header class=" text-white w-full fixed left-0 top-0 z-20">
        <nav class=" backdrop-filter backdrop-blur-xl py-4">
            <div class="px-8 md:px-14 lg:px-20 w-full">
                <div class="flex justify-between items-center">                   
                        <div class="flex justify-between items-center text-lg">
                            <a href="/">
                                <img class="h-12 rounded-full" src="{{asset('imgs/logo.png')}}" alt="">     
                            </a>
                        </div>                 
                  
                    @auth
                    <div class="">
                    <form method="POST" action="{{ route('logout') }}" class="flex items-end justify-end w-full  py-2 pr-10">
                        @csrf
                        <button class="bg-transparent flex space-x-3 bg-white hover:bg-[#0000FF] text-[#0000FF]  py-1 px-2 border border-[#0000FF] hover:text-white rounded-lg">
                            <x-icon name="logout" class="pt-1"/> <p>Log Out</p>         
                        </button>
                    </form>
                    </div>
                    @else
                    <div class="hidden md:flex space-x-3 items-center">
                        <a href="/register">
                            <button class="relative px-5 py-1 rounded-xl backdrop-filter backdrop-blur-md bg-white isolation-auto z-10 border-2 border-[#0000FF] text-[#0000FF] hover:text-white font-normal font-semibold
                    before:absolute before:w-full before:transition-all before:duration-700 before:hover:w-full before:-right-full before:hover:right-0 before:rounded-full  before:bg-[#0000FF] before:-z-10  before:aspect-square before:hover:scale-150 overflow-hidden before:hover:duration-700">
                                Sign Up         
                            </button>
                        </a>
                        <a href="/login">
                            <button class="relative px-5 py-1 rounded-xl backdrop-filter backdrop-blur-md bg-[#0000FF] isolation-auto z-10 border-2 border-[#0000FF] text-white hover:text-[#0000FF] font-normal font-semibold
                    before:absolute before:w-full before:transition-all before:duration-700 before:hover:w-full before:-right-full before:hover:right-0 before:rounded-full  before:bg-white before:-z-10  before:aspect-square before:hover:scale-150 overflow-hidden before:hover:duration-700">
                                Log In   
                        </button>
                        </a>
                    </div>
                        @endauth
                    <div class="md:hidden">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" class="inline-block w-6 h-6 stroke-current">           
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>               
                          </svg>
                    </div>
                </div>
            </div>
        </nav>
</header>