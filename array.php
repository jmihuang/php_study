	<?php
				/**
				*檢查重複
				*/
                $array = array(1, "hello", 1, "world", "hello");
				$countArray = array_count_values($array);

				// output
				//Array
				// (
				//     [1] => 2
				//     [hello] => 2
				//     [world] => 1
				// )
				
				foreach ($countArray as $key => $value) {
					echo $key;
				}

				/**
				*array_search //Booleans 
				*/

				
				echo array_search('hello' , $array);//1
				echo array_search('nu' , $array);

				/**
				*array_sum 加總
				*/

				$nums = array(1,10,12);
				echo array_sum($nums);


				/**
				*array_unique去除重複的
				*/

				$input = array("a" => "green", "red", "b" => "green", "blue", "red");
				$result = array_unique($input);
				print_r($result);

				// Array
				// (
				//     [a] => green
				//     [0] => red
				//     [1] => blue
				// )

	?>			