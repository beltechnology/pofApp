<?php namespace App\library {
use Session;	
use DB;	
	
    class myFunctions {
        public function is_ok($moduleId) {
			
			$userModule = DB::table('usermodule')
                        ->where('designationId',session()->get('designationId'))			
                        ->where('active','Y')			
                        ->get()	;
				$moduleCheck = false;
				foreach($userModule as $module)
				{
					if($module->moduleId == $moduleId)
					{
						$moduleCheck = true;
					}
			//		echo $module->moduleId."<br>";
				}
			//	echo session()->get('designationId');
				if(!session()->get('currentStateId') ||(!session()->get('designationId')) ||(!session()->get('userEntityId')) ||(empty($userModule)) || ($moduleCheck == false)){
				return true;
			}
			
		}
    }
}
?>