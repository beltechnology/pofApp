			<div class=" col-md-3 ">
             <nav class="main-menu">
            <ul class="nav nav-list">
                <li>
                    <a href="{{ url('/employee') }}">
                    	<i class="fa fa-user fa-2x"></i>
                         {{ trans('messages.EMPLOYEE_CREATION') }}
                        </span>
                    </a>
                  
                </li>
                <li class="has-subnav">
                    <a href="{{ url('/team') }}">
                        <i class="fa fa-users fa-2x"></i>
                         {{ trans('messages.TEAM_CREATION') }}
                        </span>
                    </a>
                    
                </li>
                <li class="has-subnav">
                    <a href="#">
                        <i class="fa fa-building-o fa-2x"></i>
                        {{ trans('messages.SCHOOLS') }}
                        </span>
                    </a>
                    
                </li>
                <li class="has-subnav">
                    <a href="#">
                       <i class="fa fa-newspaper-o fa-2x"></i>
                        {{ trans('messages.ADMIT_CARD') }}
                        </span>
                    </a>
                   
                </li>
                <li>
                    <a href="#">
                        <i class="glyphicon glyphicon-list-alt fa-2x"></i>
                          {{ trans('messages.ATTENDANCE_SHEET') }}
                        </span>
                    </a>
                </li>
                <li>
                    <a href="#">
                       <i class="fa fa-certificate fa-2x"></i>
                       {{ trans('messages.PARTICIPATION_CERTIFICATES') }}
                        </span>
                    </a>
                </li>
                 <li>
                    <a href="{{ url('/state') }}">
                       <i class="fa fa-certificate fa-2x"></i>
                       {{ trans('messages.STATE') }}
                        </span>
                    </a>
                </li>
                 <li>
                    <a href="{{ url('/district') }}">
                       <i class="fa fa-certificate fa-2x"></i>
                       {{ trans('messages.DISTRICT') }}
                        </span>
                    </a>
                </li>
                 <li>
                    <a href="{{ url('/citys') }}">
                       <i class="fa fa-certificate fa-2x"></i>
                       {{ trans('messages.CITY') }}
                        </span>
                    </a>
                </li>
                 <li>
                    <a href="{{ url('/locations') }}">
                       <i class="fa fa-certificate fa-2x"></i>
                       {{trans('messages.ADD_LOCATION')}}
                        </span>
                    </a>
                </li>
                 <li>
                    <a href="{{ url('/designations') }}">
                       <i class="fa fa-certificate fa-2x"></i>
                       {{trans('messages.ADD_DESIGNATION')}}
                        </span>
                    </a>
                </li>
				 <li>
                    <a href="{{ url('/class-name') }}">
                       <i class="fa fa-certificate fa-2x"></i>
                      {{ trans('messages.CLASS') }}
                        </span>
                    </a>
                </li>
                
            </ul>

        </nav>
        	
</div>