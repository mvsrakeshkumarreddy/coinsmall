<x-app-layout>
    <x-slot name="header">
   @foreach ($usedrefid as $usedrefid)
        <h2 class="font-semibold text-xl text-gray-800 leading-tight" style="text-align: left;">
           &nbsp; 
            <x-jet-button style="float: left;" class="ml-4">
                     <a> {{ __('My Referral id') }} {{ __('-') }} @{{ curid }}</a>
                </x-jet-button> 
        <span style="float: right;">
                 <x-jet-button class="ml-4" ng-click="myFuncref()" ng-show="useref">
                     <a> {{('Use Referral Code')}}</a>
                </x-jet-button>
                <x-jet-button class="ml-4" ng-click="myFuncref()" ng-hide="useref">
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

 <form method="POST" action="{{url('refadd') }}">
            @csrf

            <div>
                <x-jet-label for="refcd" value="{{ __('Enter Referral Code') }}" />
                <x-jet-input  maxlength="5" ng-model="inputcheck" ng-change="checkavailability()" id="refcd" class="block mt-1 w-full" type="text" name="refcd" :value="old('refcd')" required autofocus />
            </div>

          

         
            <div class="flex items-center justify-end mt-4">
          
<!--
          <x-jet-button class="ml-4" ng-hide="!inputcheck">
                    {{ __('Register') }}
                </x-jet-button>
            -->

<x-jet-button class="ml-4" ng-hide="!inputcheck">
                     {{('Use')}}
                </x-jet-button>
            </div>
        </form>


            </div>
        </div>
    </div>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                
            </div>
        </div>
    </div>
    <script>

var myApp = angular.module('myApp', []);
         
         myApp.controller('myCtrl', function($scope) {


$scope.showing=false;
$scope.useref=true;
$scope.count=100;
//$scope.working=true;



$scope.working = {!! json_encode($usedrefid->usedrefid) !!};

$scope.curid = {!! json_encode($usedrefid->id) !!};


$scope.availableids = {!! json_encode($history) !!};


//$scope.availableid = $scope.availableids[0].id;

//$scope.inputlength = $scope.inputcheck.length;

$scope.checkavailability=function()
{
    $scope.checkedrefid = 0;
    if($scope.inputcheck.length>=5)
    {
        //alert('time to check now');

        for (var i = 0; i < $scope.availableids.length; i++) 
        {
            

            if($scope.inputcheck == $scope.availableids[i].id)
            {
                $scope.checkedrefid++;
            }
            
        }

        if($scope.checkedrefid == 0)
        {
            alert('No id available, please enter another id');
            $scope.inputcheck = null;
        }
        
        if($scope.inputcheck == $scope.curid)
        {
            alert('its your id, please enter another id');
            $scope.inputcheck = null;
        }

    }

};




$scope.myFuncref=function()
{



if($scope.working==0)
{
    if($scope.showing==false)
    {

    $scope.showing=true;
    $scope.useref=false;
    }
    else
    {
        $scope.showing=false;
        $scope.useref=true;
    }
}



else
{
    $scope.showing=false;
    alert('You have already used Referral Code');
}

};

//$scope.working=$usedrefid->usedrefid;
$scope.myFunc=function(){

if($scope.working==0)
{
    /*
    $scope.showing=true;
    if($scope.showing==false)
     
     {
        $scope.showing=true;
        $scope.useref=false;
     }
     
     else
     
     {
        $scope.showing=false;
        $scope.useref=true;
     }
     */
     $scope.working=1;
}

else
{
    $scope.showing=false;
    $window.open( "popup", "width=300,height=200,left=10,top=150");
}

     
    };


     });


</script>
</x-app-layout>
