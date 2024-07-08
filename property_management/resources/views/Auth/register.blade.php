<x-user-layout>

<div class="h-screen flex">
          <div style=" background: linear-gradient(rgba(2,2,2,0.7),rgba(0,0,0,0.7)),url('{{asset('imgs/login2.jpg')}}') center center" class="hidden lg:flex w-full lg:w-1/3 bg-cover object-fit bg-no-repeat
          justify-around items-center">
            <div 
                  class=" 
                  bg-black 
                  opacity-20 
                  inset-0 
                  z-0"
                  >

                  </div>
            <div class="w-full mx-auto px-20 flex-col items-center space-y-6">
              <h1 class="text-[#0000FF] font-semibold text-xl font-sans">{{config('app.name')}}</h1>
              <p class="text-white mt-1">here where you can found your dream house </p>
              <div class="flex justify-center lg:justify-start mt-6">
                  <a href="#" class="hover:bg-[#0000FF] hover:border-[#0000FF] hover:text-white hover:-translate-y-1 transition-all duration-500 bg-white text-[#0000FF] mt-4 px-4 py-2 rounded-2xl font-bold mb-2">Join Us</a>
              </div>
            </div>
          </div>
          <div class="flex w-full md:mt-16 justify-center items-center bg-white ">
            <div class="w-full">
            <form id="registerForm" action="{{ route('register') }}" method="post" class="bg-white rounded-md shadow-sm px-5">
               @csrf
                @method('POST')
                <h1 class="text-[#0000FF] font-bold text-2xl mb-8">Welcome To {{config('app.name')}}</h1>
                <p class="text-sm text-center font-normal text-gray-600"></p>
                <x-error-input class="my-3 w-full" :messages="$errors->all()" />
                <div class="flex flex-col items-center md:flex-row md:justify-between gap-3 py-2 px-3 w-full h-full rounded-2xl">
                    
                    <div class="flex flex-col space-y-1 w-full md:gap-10">
                    <div class="flex flex-col space-y-1 w-full">
                        <div class="namebox flex items-center border-2 border-[#0000FF] py-2 px-3 rounded-2xl">

                        <input class="registername pl-2 w-full outline-none border-none" type="text" name="name" placeholder="Name" />
                        </div>
                        <p class="nameregisterError hidden text-red-500 text-sm mt-1">Invalid name format</p>
                    </div>
                    <div class="flex flex-col space-y-1 w-full">
                        <div class="emailbox flex items-center border-2 border-[#0000FF] py-2 px-3 rounded-2xl">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path strokeLinecap="round" strokeLinejoin="round" strokeWidth="2" d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207" />
                        </svg>
                        <input class="registerEmail pl-2 w-full outline-none border-none" type="text" name="email" placeholder="Email Address" />
                        </div>
                        <p class="emailregisterError hidden text-red-500 text-sm mt-1">Invalid email format</p>
                    </div>
                    </div>
                    <div class="flex flex-col space-y-1 w-full md:gap-10">
                    <div class="flex flex-col space-y-1 w-full">
                        <div class="passwordbox flex items-center border-2 border-[#0000FF] py-2 px-3 rounded-2xl">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" viewBox="0 0 20 20" fill="currentColor">
                            <path fillRule="evenodd" d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z" clipRule="evenodd" />
                        </svg>
                        <input class="registerPassword pl-2 w-full outline-none border-none" type="password" name="password" placeholder="Password" />
                        </div>
                        <p class="passwordregisterError hidden text-red-500 text-sm mt-1">Invalid password format</p>
                    </div>
                    <div class="flex flex-col space-y-1 w-full">
                        <div class="passwordConfirmbox flex items-center border-2 border-[#0000FF] py-2 px-3 rounded-2xl">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" viewBox="0 0 20 20" fill="currentColor">
                            <path fillRule="evenodd" d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z" clipRule="evenodd" />
                        </svg>
                        <input class="registerConfirmPassword pl-2 w-full outline-none border-none" type="password" name="password_confirmation" placeholder="Confirm Password" />
                        </div>
                        <p class="passwordConfirmError hidden text-red-500 text-sm mt-1">Passwords do not match</p>
                    </div>
                    </div>
                </div>
                <button type="submit" class="block w-96 mx-auto bg-[#0000FF] mt-5 py-2 rounded-2xl duration-500 text-white font-semibold mb-2">Register</button>
                <div class="flex justify-between mt-4">
                    <a href="/login" class="text-sm ml-2 hover:text-blue-500 cursor-pointer hover:-translate-y-1 duration-500 transition-all">Already have an account?</a>
                </div>
                </form>

            </div>
            
          </div>
      </div>
      <script src="{{asset('js/register.js')}}"></script>

</x-user-layout>
