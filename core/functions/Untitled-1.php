$register_courses=array(
			//'user_id'		=>	$user_data['user_id'],
			'course_code'	=>	$_POST['course_code'],
			//'username'		=>	$user_data['username']		
			);
			
			
			/*registering cousres but it wasn't recognising my functions so i copied it and put it here */
			//array_walk($register_courses, 'array_sanitize');
			$fields= '`'.implode('`,`',array_keys($register_courses)).'`';
			$data= '\''.implode('\',\'',$register_courses).'\'';
			echo $data; die();