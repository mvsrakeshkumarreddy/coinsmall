<x-app-layout>
    <x-slot name="header">
@foreach ($walletbalance as $walletbalance)
        <h2 class="font-semibold text-xl text-gray-800 leading-tight" style="text-align: left;">
        &nbsp; 
            <x-jet-button style="float: left;" class="ml-4">
                     <a> {{ __('Wallet Balance') }} {{ __('-') }} {{ $walletbalance->walletbal }}</a>
                </x-jet-button> 
                <span style="float: right;">
                 <x-jet-button class="ml-4" ng-click="myFunc()" ng-show="addshow">
                     <a> {{('Add Money')}}</a>
                </x-jet-button>
                <x-jet-button class="ml-4" ng-click="myFunc()" ng-hide="addshow">
                     <a> {{('Close')}}</a>
                </x-jet-button>
                </span>
                
        </h2>
@endforeach

    </x-slot>

    <div class="py-12" ng-show="showing">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
@if (session('status'))
<div class="alert alert-success" role="alert">
    <button type="button" class="close" data-dismiss="alert">×</button>
    {{ session('status') }}
</div>
@elseif(session('failed'))
<div class="alert alert-danger" role="alert">
    <button type="button" class="close" data-dismiss="alert">×</button>
    {{ session('failed') }}
</div>
@endif
 <form method="POST" action="{{url('walletadd') }}">
            @csrf

            <div>
                <x-jet-label for="credit" value="{{ __('Amount') }}" />
                <x-jet-input ng-model="inputcheck" id="credit" class="block mt-1 w-full" type="text" name="credit" :value="old('credit')" required autofocus />
            </div>

          

         
            <div class="flex items-center justify-end mt-4">
          
<!--
          <x-jet-button class="ml-4" ng-hide="!inputcheck">
                    {{ __('Register') }}
                </x-jet-button>
            -->

<x-jet-button class="ml-4" ng-hide="!inputcheck">
                     {{('Add Money')}}
                </x-jet-button>
            </div>
        </form>


            </div>
        </div>
    </div>


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">


  <table class="table-fixed w-full">
                <thead>
                    <tr class="bg-gray-100">
<!--
                        <th class="px-4 py-2 ">Transaction</th>
-->
                        <th class="px-4 py-2">Credit</th>
                        <th class="px-4 py-2">Debit</th>
                        <th class="px-4 py-2">Amount added on</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($history as $his)
                    <tr>
<!--
                        <td class="border px-4 py-2" style="text-align: center;">{{ $his->id }}</td>
-->
                        <td class="border px-4 py-2" style="text-align: center;">{{ $his->credit }}</td>
                        <td class="border px-4 py-2" style="text-align: center;">{{ $his->debit }}</td>
                        <td class="border px-4 py-2" style="text-align: center;">{{ $his->addedat }}</td>
                       
                    </tr>
                    @endforeach
                </tbody>
            </table>


            </div>
        </div>
    </div>

<script>

var myApp = angular.module('myApp', []);
         
         myApp.controller('myCtrl', function($scope) {


$scope.showing=false;
$scope.addshow=true;
$scope.count=100;

$scope.myFunc=function(){
     if($scope.showing==false)
     
     {
        $scope.showing=true;
        $scope.addshow=false;
     }
     
     else
     
     {
        $scope.showing=false;
        $scope.addshow=true;
     }
    };


     });


</script>
</x-app-layout>
