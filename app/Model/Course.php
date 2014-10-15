<?php
    class Course extends AppModel{
     
		public $hasMany = array('Students');

    }
?>