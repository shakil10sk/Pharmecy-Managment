         <!-- ========== Left Sidebar Start ========== -->

         <div class="left side-menu">
             <div class="sidebar-inner slimscrollleft">
                 <div class="user-details">
                     <div class="pull-left">
                         <img src="{{ asset('/frontend/images/admin.jpg') }}" alt="" class="thumb-md img-circle">
                     </div>
                     <div class="user-info">
                         <div class="dropdown">
                             <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">{{ Auth::user()->name }}
                                 <span class="caret"></span></a>
                             <ul class="dropdown-menu">
                                 <li><a href="javascript:void(0)"><i class="md md-face-unlock"></i> Profile<div
                                             class="ripple-wrapper"></div></a></li>
                                 <li><a href="javascript:void(0)"><i class="md md-settings"></i> Settings</a></li>
                                 <li><a href="javascript:void(0)"><i class="md md-lock"></i> Lock screen</a></li>
                                 <li><a href="javascript:void(0)"><i class="md md-settings-power"></i> Logout</a></li>
                             </ul>
                         </div>

                         <p class="text-muted m-0">Administrator</p>
                     </div>
                 </div>
                 <!--- Divider -->
                 <div id="sidebar-menu">
                     <ul>
                         <li>
                             <a 
                             @if(Auth::check() && Auth::user()->role == 1 ) href="{{  route('admin.dashboard') }}"
                             @elseif(Auth::check() && Auth::user()->role == 2 ) href="{{  route('user.dashboard') }}"
                             @endif 
                              class="waves-effect {{ Route::is('admin.dashboard') ? 'active' : '' }}"><i class="md md-home"></i><span> Dashboard
                                 </span></a>
                         </li>
                         @if(Auth::check() && Auth::user()->role == 1 )
                         <li class="has_sub">
                             <a href="#" class="waves-effect {{ Route::is('manufacturer.create') || Route::is('manufacturer.index')|| Route::is('manufacturer.edit')  ? 'active' : '' }} "><i class="fa fa-users"></i><span> Manufacturer </span><span
                                     class="pull-right"><i class="md md-add"></i></span></a>
                             <ul class="list-unstyled">
                                
                                <li class="{{ Route::is('manufacturer.create') ? 'active' : '' }}"  ><a href="{{ route('manufacturer.create') }}">Manufacture Add </a></li>
                                <li class="{{ Route::is('manufacturer.index') ? 'active' : '' }}"> <a  href="{{ route('manufacturer.index') }}">Manufacture List </a></li>
                                 <li><a href="email-read.html">View Mail</a></li>
                             </ul>
                         </li>

                         <li class="has_sub">
                             <a href="#" class="waves-effect {{ Route::is('medicineCategory.create') || Route::is('medicineCategory.index') || Route::is('medicineCategory.edit')||Route::is('medicineUnit.create') || Route::is('medicineUnit.index')|| Route::is('medicineUnit.edit')||Route::is('medicineType.create') || Route::is('medicineType.index')|| Route::is('medicineType.edit')||Route::is('medicineLeaf.create') || Route::is('medicineLeaf.index')|| Route::is('medicineLeaf.edit') ||Route::is('medicine.create') || Route::is('medicine.index')|| Route::is('medicine.edit')  ? 'active' : '' }} "><i class="fa fa-user"></i><span> Medicine  </span><span
                                     class="pull-right"><i class="md md-add"></i></span></a>
                             <ul class="list-unstyled">
                                
                                <li class="{{ Route::is('medicineCategory.create') ? 'active' : '' }}"  ><a href="{{ route('medicineCategory.create') }}"> Category Add </a></li>
                                <li class="{{ Route::is('medicineCategory.index') ? 'active' : '' }}"> <a  href="{{ route('medicineCategory.index') }}"> Category List </a></li>

                                <li class="{{ Route::is('medicineUnit.create') ? 'active' : '' }}"  ><a href="{{ route('medicineUnit.create') }}"> Unit Add </a></li>
                                <li class="{{ Route::is('medicineUnit.index') ? 'active' : '' }}"> <a  href="{{ route('medicineUnit.index') }}"> Unit List </a></li>
                            

                                <li class="{{ Route::is('medicineType.create') ? 'active' : '' }}"  ><a href="{{ route('medicineType.create') }}"> Add Type </a></li>
                                <li class="{{ Route::is('medicineType.index') ? 'active' : '' }}"> <a  href="{{ route('medicineType.index') }}"> Type List </a></li>
                            

                                <li class="{{ Route::is('medicineLeaf.create') ? 'active' : '' }}"  ><a href="{{ route('medicineLeaf.create') }}"> Add Leaf </a></li>
                                <li class="{{ Route::is('medicineLeaf.index') ? 'active' : '' }}"> <a  href="{{ route('medicineLeaf.index') }}"> Leaf List </a></li>
                            

                                <li class="{{ Route::is('medicine.create') ? 'active' : '' }}"  ><a href="{{ route('medicine.create') }}"> Medicine Add  </a></li>
                                <li class="{{ Route::is('medicine.index') ? 'active' : '' }}"> <a  href="{{ route('medicine.index') }}"> Medicine List </a></li>
                            
                            </ul>
                         </li>

                         @endif

                         <li>
                             <a href="/pos" class="waves-effect ">
                                 <i class="md md-palette"></i>
                                 <span>  POS</span>
                             </a>
                         </li>

                         <li>
                             <a href="{{ url('/invoice') }}" class="waves-effect "><i class="md md-event"></i><span> INVOICE</span></a>
                         </li>
                        

                         <li class="has_sub">
                             <a href="#" class="waves-effect">
                                 <i class="md md-invert-colors-on"></i><span> Medicine </span>
                                 <span class="pull-right">
                                     <i class="md md-add"></i>
                                 </span>
                             </a>
                             <ul class="list-unstyled">
                                 <li><a href="/medicine/add">Add Medicine</a></li>
                                 <li><a href="/medicine/view">View Medicine</a></li>
                                 <li><a href="/import-medicine">Import Medicine</a></li>
                             </ul>
                         </li>

                         <li class="has_sub">
                             <a href="#" class="waves-effect">
                                 <i class="md md-redeem"></i>
                                 <span> Employee</span>
                                 <span class="pull-right">
                                     <i class="md md-add"></i>
                                 </span>
                             </a>
                             <ul class="list-unstyled">
                                 <li>
                                     <a href="/employee/add">Create Employee</a>
                                 </li>
                                 <li>
                                     <a href="/employee/view">View Employee</a>
                                 </li>
                             </ul>
                         </li>

                         <i class="" aria-hidden="true"></i>
                         <li class="has_sub">
                             <a href="#" class="waves-effect">
                                 <i class="fa fa-sellsy"></i>
                                 <span>
                                     Customar
                                 </span>
                                 <span class="pull-right">
                                     <i class="md md-add"></i>
                                 </span>
                             </a>
                             <ul class="list-unstyled">
                                 <li>
                                     <a href="/customar/add">Add Customar</a>
                                 </li>
                                 <li>
                                     <a href="/customar/view">View Customar</a>
                                 </li>
                             </ul>
                         </li>

                         <li class="has_sub">
                             <a href="#" class="waves-effect">
                                 <i class="md md-invert-colors-on"></i>
                                 <span>
                                     category
                                 </span>
                                 <span class="pull-right">
                                     <i class="md md-add"></i>
                                 </span>
                             </a>
                             <ul class="list-unstyled">
                                 {{-- <li><a href="/create-employee">Add category</a></li> --}}
                                 <li>
                                     <a href="/add/category">Add category</a>
                                 </li>
                                 <li>
                                     <a href="/category">View category</a>
                                 </li>
                             </ul>
                         </li>

                         <li class="has_sub">
                             <a href="#" class="waves-effect">
                                 <i class="md md-invert-colors-on"></i>
                                 <span> Manufacturer </span>
                                 <span class="pull-right"> <i class="md md-add"></i></span>
                             </a>
                             <ul class="list-unstyled">
                                 <li>
                                     <a href="/manufacturer ">Manufacturer
                                     </a>
                                 </li>
                             </ul>
                         </li>

                     </ul>
                     <div class="clearfix"></div>
                 </div>
                 <div class="clearfix"></div>
             </div>
         </div>
         <!-- Left Sidebar End -->
