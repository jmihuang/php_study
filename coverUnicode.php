		//Reference https://blog.longwin.com.tw/2011/06/php-html-unicode-convert-2011/

		//cover
		function unicode($str){
			$unicode_html = base_convert(bin2hex(mb_convert_encoding($str, 'ucs-4', 'utf-8')), 16, 10); // 25105
			return $unicode_html;
		}

		//decode
		function decode($unicode_html){
			$str = mb_convert_encoding($unicode_html, 'UTF-8', 'HTML-ENTITIES'); // '我', $unicode_html = '&#25105'
			?>

			return $str;
		}
		

