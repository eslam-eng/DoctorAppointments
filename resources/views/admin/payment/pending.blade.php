@extends('admin.layout')
@section('title')
{{__("message.Pending Payment")}} | {{__("message.Admin")}} {{__("message.Pending Payment")}}
@stop
@section('meta-data')
@stop
@section('content')
<div class="main-content">
   <div class="page-content">
      <div class="container-fluid">
         <div class="row">
            <div class="col-12">
               <div class="page-title-box d-flex align-items-center justify-content-between">
                  <h4 class="mb-0">{{__("message.Pending Payment")}}</h4>
                  <div class="page-title-right">
                     <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item active">{{__("message.Pending Payment")}}</li>
                     </ol>
                  </div>
               </div>
            </div>
         </div>
         <div class="row">
            <div class="col-12">
               <div class="card">
                  <div class="card-body">
                     @if(Session::has('message'))
                     <div class="col-sm-12">
                        <div class="alert  {{ Session::get('alert-class', 'alert-info') }} alert-dismissible fade show" role="alert">{{ Session::get('message') }}
                           <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                           <span aria-hidden="true">&times;</span>
                           </button>
                        </div>
                     </div>
                     @endif
                     <h4 class="card-title">{{__("message.Pending Payment")}} {{__("message.List")}}</h4>
                     
                     <table id="pendingpaymenttable" class="table table-bordered dt-responsive tablels">
                        <thead>
                           <tr>
                              <th>{{__("message.Doctor Name")}}</th>
                              <th>{{__("message.Amount")}}</th>
                              <th>{{__("message.total_booking")}}</th>
                              <th>{{__("message.Action")}}</th>
                           </tr>
                        </thead>
                     </table>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
@stop
@section('footer')
@stop