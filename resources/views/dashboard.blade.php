<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Welcome to Home page, Home page will be available soon!!...') }}<br>
            {{ __('You can check out the other pages') }}<br>
            {{ __('Meanwhile you can comment anything here') }}
        </h2>
    </x-slot>


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                
 <form method="POST" action="{{url('homecomment') }}">
            @csrf

            <div>
                <x-jet-label for="homecomment" value="{{ __('Enter your comment') }}" />
                <x-jet-input  maxlength="5"  id="homecomment" class="block mt-1 w-full" type="text" name="homecomment" :value="old('homecomment')" required autofocus />
            </div>

          

         
            <div class="flex items-center justify-end mt-4">
          
<!--
          <x-jet-button class="ml-4" ng-hide="!inputcheck">
                    {{ __('Register') }}
                </x-jet-button>
            -->

<x-jet-button class="ml-4" >
                     {{('Comment')}}
                </x-jet-button>
            </div>
        </form>


              
<!--
                <thead>
                    <tr class="bg-gray-100">
                        <th class="px-4 py-2 ">Transaction</th>
                        <th class="px-4 py-2">Name</th>
                        <th class="px-4 py-2">Commentdata</th>
                        <th class="px-4 py-2">Timestamp</th>
                    </tr>
                </thead>
-->
              

            </div>
        </div>
    </div>



    <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
              @foreach($allcomments as $his)

                <x-jet-button style="background-color: white;color: black" class="ml-4">
                     <div><b style="font-size: 20px;">{{ $his->name }}</b> &nbsp; <a style="text-transform: lowercase;">------>>> &nbsp;</a><a style="font-size: 20px;">{{ $his->commentdata }}</a> <a style="text-align: right;">{{ $his->commentedat }}</a></div>
                     
                </x-jet-button> 

                       <br><br>
                       
                    @endforeach
    </div>
    </div>
    </div>
</x-app-layout>
