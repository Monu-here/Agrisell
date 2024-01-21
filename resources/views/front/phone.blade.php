 @extends('front.layout')
 @section('css')
     <style>
         /* Chrome, Safari, Edge, Opera */
         input::-webkit-outer-spin-button,
         input::-webkit-inner-spin-button {
             -webkit-appearance: none;
             margin: 0;
         }

         /* Firefox */
         input[type=number] {
             -moz-appearance: textfield;
         }
     </style>
 @endsection
 @section('content')
     @php
         $logo = getLogoSetting();
     @endphp
     <section class="h-100 gradient-form" style="background-color: #F6F7FB;">
         <div class="container py-5 h-100">
             <div class="row d-flex justify-content-center align-items-center h-100">
                 <div class="col-xl-10">
                     <div class="card rounded-3 text-black">
                         <div class="row g-0">
                             <div class="col-lg-6">
                                 <div class="card-body">
                                     <div class="d-flex align-items-center mb-1">
                                         @if ($logo)
                                             <img src="{{ asset($logo->image) }}" style="width: 100px;" alt="logo">
                                         @endif
                                         <h6 class="m-0">{{ config('app.name') }}</h6>
                                     </div>

                                     <form action="{{ route('front.front.front.phone.post') }}" method="POST">
                                         @csrf

                                         @php
                                             $info = session('info');
                                         @endphp
                                         <h6>
                                             Dear {{ $info['name'] }}, <br> Please enter your phone no to continue.
                                         </h6>
                                         <hr class="mb-4">
                                         <div class="row">
                                             <div class="col-md-9 ">
                                                 <input type="number" id="phone" class="form-control" name="phone"
                                                     placeholder="98xxxxxxxx"  maxlength="10"/>
                                             </div>
                                             <div class="col-md-3">
                                                 <button type="submit"
                                                     class="btn btn-outline-primary h-100 w-100">Continue</button>
                                             </div>
                                         </div>
                                         <hr>
                                         <div style="min-height: 100px;">
                                             some policy " here will
                                             some policy
                                             that you have to accept"
                                         </div>
                                     </form>

                                 </div>
                             </div>
                             <div class="col-lg-6 d-flex align-items-center justify-content-center gradient-custom-2"
                                 style="background: #F9FAFC; border-top-left-radius: 50px;">
                                 <div class=" px-3 py-4 p-md-5 mx-md-4 text-center">
                                     <h4 class="mb-4">Welcome to {{config('app.name')}} </h4>

                                     <p class="small mb-0">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do
                                         eiusmod exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                                 </div>

                             </div>
                         </div>
                     </div>
                 </div>
             </div>
         </div>
     </section>
 @endsection
