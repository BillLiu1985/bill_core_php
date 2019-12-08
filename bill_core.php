<?php
	/**
	 * 建置網站常會用到的php函式庫
	 */

	 
	/**
	 * 須先抓取專案根目錄的磁碟路徑
	 * 視bill_core.php所在位置，作撰寫(視本檔所在位置做變動)
	 */
	define('ProjectRootDisk', dirname(dirname(__FILE__))."/");
	
	/**
	 * 需先設定專案根目錄的URL路徑
	 */
	define('ProjectRootUrl',"http://demo.artie.com.tw/tangao.com.tw/beta/");
	
	/**
	 * 為特定易混淆的字元設定常數，以利程式的維護性
	 */
	define("BSLASH","\\");//反斜線
	define("SQUOTES","'");//單引號
	define("DQUOTES","\"");//雙引號
	
	
	/**
	 *
	 * 
	 * 全域PHP元件
	 * 
	 * 引入PHP元件前,必先引入全域PHP元件
	 *
	 */
	class myGlobal {
		/**
		 * 
		 * 建構子
		 * 
		 */
		public function __construct() {
			
		}

		/**
		 * 
		 * 檢查輸入的變數是否為有長度字串 
		 *
		 * @param mixed $checked_var 要檢查的變數
		 * @return bool
		 * @throws Exception
		 */
		static public function is_non_empty_string($checked_var) {
			if (gettype($checked_var) !== 'string') {
				return false;
			}
			if ($checked_var === '') {
				return false;
			}
			return true;//若變數的資料型態是string且不為空，則返回true
		}
		
		/**
		 * 
		 * 檢查輸入的變數是否為有長度字串 
		 *
		 * @param mixed $checked_var 要檢查的變數
		 * @return bool
		 * @throws Exception
		 */
		static public function is_solid_string($checked_var) {
			return self::is_non_empty_string($checked_var);
		}
		
		/**
		 * 
		 * 檢查輸入的值是否為有元素陣列 
		 *
		 * @param mixed $checked_var 要檢查的變數
		 * @return bool
		 * @throws Exception
		 */
		static public function is_non_empty_array($checked_var) {
			if (gettype($checked_var) !== 'array') {
				return false;
			}
			if (count($checked_var) === 0) {
				return false;
			}
			return true;//若變數的資料型態是array且元素數目>0，則返回true
		}
		
		/**
		 * 
		 * 檢查輸入的值是否為有元素陣列 
		 *
		 * @param mixed $checked_var 要檢查的變數
		 * @return bool
		 * @throws Exception
		 */
		static public function is_solid_array($checked_var) {
			return self::is_non_empty_array($checked_var);
		}
		
		/**
		 * 
		 * 檢查輸入的值是否為數字型態
		 *
		 * @param mixed $checked_var 要檢查的變數
		 * @return bool
		 * @throws Exception
		 */
		static public function is_non_empty_number($checked_var) {
			if (gettype($checked_var) !== 'double' && gettype($checked_var) !== 'integer') {
				return false;
			}
			return true;//若變數的資料型態是double或integer，則返回true
		}
		
		/**
		 * 
		 * 檢查輸入的值是否為數字型態，若為0也會返回true
		 *
		 * @param mixed $checked_var 要檢查的變數
		 * @return bool
		 * @throws Exception
		 */
		static public function is_solid_number($checked_var) {
			return self::is_non_empty_number($checked_var);
		}
		
		/**
		 * 
		 * 產生特定長度的隨機字串
		 *
		 * @param int $wordlength 輸出長度
		 * @param bool $is_number 是否允許數字出現
		 * @return string
		 * @throws Exception
		 */
		static public function random_word($wordlength, $is_number = false) {
			if(is_integer($wordlength)){
				
			}else{
				throw new Exception('Call ' . __FUNCTION__ . ' fail.Because $wordlength error');
			}
			if(is_bool($is_number)){
				
			}else{
				throw new Exception('Call ' . __FUNCTION__ . ' fail.Because $is_number error');
			}
			
			$sGenerator = "";

			if ($is_number) {
				$possible_chars = '1234567890';
				$possible_chars_count = strlen($possible_chars);

				for ($tmp_cursor = 0; $tmp_cursor < $wordlength; $tmp_cursor++) {
					$sGenerator .= $possible_chars[rand() % $possible_chars_count];
				}
			} else {
				$possible_chars = 'abcdefghijkmnpqrstuvwxyzABCDEFGHIJKLMNPQRSTUVWXYZ1234567890';
				$possible_chars_count = strlen($possible_chars);

				for ($tmp_cursor = 0; $tmp_cursor < $wordlength; $tmp_cursor++) {
					$sGenerator .= $possible_chars[rand() % $possible_chars_count];
				}
			}
			return $sGenerator;
		}

		/**
		 * 
		 * 檢查輸入的字串是否以特定字串開頭
		 *
		 * @param string $subword 該特定字串
		 * @param string $testword 被檢查的字串
		 * @return bool
		 */
		static public function is_start_with($subword, $testword) {
			if(self::is_solid_string($subword)){
				
			}else{
				throw new Exception('Call ' . __FUNCTION__ . ' fail.Because $subword error');
			}
			if(self::is_solid_string($testword)){
				
			}else{
				throw new Exception('Call ' . __FUNCTION__ . ' fail.Because $testword error');
			}
			
			if (preg_match('/^' . preg_quote($subword, '/') . '/Dsu', $testword) == 0) {
				return false;
			} else {
				return true;
			}
		}

		/**
		 * 
		 * 檢查輸入的字串是否以特定字串結尾
		 *
		 * @param string $subword 該特定字串
		 * @param string $testword 被檢查的字串
		 * @return bool
		 */
		static public function is_end_with($subword, $testword) {
			if(self::is_solid_string($subword)){
				
			}else{
				throw new Exception('Call ' . __FUNCTION__ . ' fail.Because $subword error');
			}
			if(self::is_solid_string($testword)){
				
			}else{
				throw new Exception('Call ' . __FUNCTION__ . ' fail.Because $testword error');
			}

			if (preg_match('/' . preg_quote($subword, '/') . '$/Dsu', $testword) == 0) {
				return false;
			} else {
				return true;
			}
		}
		
		/**
		 * 
		 * 檢查是否包含特定的字串
		 *
		 * @param string $subword 該特定字串
		 * @param string $testword 被檢查的字串
		 * @return bool
		 * @throws Exception
		 */
		static public function is_contain_substring($subword, $testword) {
			if (preg_match('/' . preg_quote($subword, '/') . '/Dsu', $testword) == 0) {
				return false;
			} else {
				return true;
			}
		}
		
		/**
		 * 
		 * 取得字串的前x個字元
		 *
		 * @param int $charscount 字元數
		 * @param string $sourceword 來源字串
		 * @return string
		 * @throws Exception
		 */
		static public function get_start_subword($charscount, $sourceword) {
			if(is_integer($charscount) && $charscount>0 ){
			}else{
				throw new Exception('Call ' . __FUNCTION__ . ' fail.Because $charscount error');
			}
			
			if(is_string($sourceword)){
			}else{
				throw new Exception('Call ' . __FUNCTION__ . ' fail.Because $sourceword error');
			}


			return substr($sourceword, 0, $charscount);
		}

		/**
		 * 
		 * 取得字串的後x個字元
		 *
		 * @param int $charscount 字元數
		 * @param string $sourceword 來源字串
		 * @return string
		 * @throws Exception
		 */
		static public function get_end_subword($charscount, $sourceword) {
			if(is_integer($charscount)){
			}else{
				throw new Exception('Call ' . __FUNCTION__ . ' fail.Because $charscount error');
			}

			if(is_string($sourceword)){
			}else{
				throw new Exception('Call ' . __FUNCTION__ . ' fail.Because $sourceword error');
			}

			return substr($sourceword, -1 * $charscount);
		}
		
		/**
		 * 
		 * 取得字串的第n1至第n2個字元,
		 *
		 * @param int $first_nth 1代表第一個字元
		 * @param int $second_nth	 
		 * @param string $sourceword 來源字串
		 * @return string
		 * @throws Exception
		 */
		static public function get_start_end_subword($first_nth,$second_nth,$sourceword) {
			if(is_integer($first_nth) && $first_nth>0 ){
			}else{
				throw new Exception('Call ' . __FUNCTION__ . ' fail.Because $first_nth error');
			}
			if(is_integer($second_nth) && $second_nth>0 && $second_nth>=$first_nth ){
			}else{
				throw new Exception('Call ' . __FUNCTION__ . ' fail.Because $second_nth error');
			}
			
			if(is_string($sourceword)){
			}else{
				throw new Exception('Call ' . __FUNCTION__ . ' fail.Because $sourceword error');
			}

			$return_string=@substr($sourceword, $first_nth-1,$second_nth-$first_nth+1);
			$return_string=(string)$return_string;
			return $return_string;
		}
		
		/**
		 * 
		 * 將繁體中文字串轉為簡體中文字串
		 *
		 * @param string $zh_string 來源的繁體中文字
		 * @return string
		 * @throws Exception
		 */
		static public function transform_zh_to_cn($zh_string) {
			if(is_string($zh_string)){
			}else{
				throw new Exception('Call ' . __FUNCTION__ . ' fail.Because $zh_string error');
			}

			return iconv("gb2312", "UTF-8", iconv("BIG5", "gb2312", iconv("UTF-8", "BIG5", $zh_string)));
		}

		/**
		 * 
		 * 變更url的query參數部分
		 * @param string $the_url 
		 * @param array $updated_params
		 * @return string
		 * @throws Exception
		 *
		 * 舉例:
		 * $the_url='http://www.xxxx.com.tw/index.php?a=1&b=2&c=3';
		 * $the_new_url=myGlobal::set_url_params($the_url,array('a'=>'4','b'=>'5','c'=>'6'));
		 * echo $the_new_url;
		 * output為 http://www.xxxx.com.tw/index.php?a=4&b=5&c=6
		 *
		 */
		static public function set_url_params($the_url, $updated_params) {
			if (self::is_solid_string($the_url)) {
				
			}else {
				throw new Exception('Call ' . __FUNCTION__ . ' fail.Because $the_url error');
			}

			if (is_array($updated_params)) {
				
			}else {
				throw new Exception('Call ' . __FUNCTION__ . ' fail.Because $updated_params error');
			}

			$result_string = '';
			$temp_splits = explode('?', $the_url);


			if (preg_match('/' . '^http[s]*:\\/\\/.+$|^.+$' . '/Dsu', $temp_splits[0]) === 1) {
				
			} else {
				return $result_string;
			}

			if (count($temp_splits) === 1) {
				$parsed_to_url = $temp_splits[0];
				$new_query_parts = array();
				foreach ($updated_params as $param_name => $param_value) {
					$new_query_parts[] = $param_name . '=' . $param_value;
				}
				if (count($new_query_parts) == 0) {
					$result_string = $parsed_to_url;
				} else {
					$result_string = $parsed_to_url . '?' . implode('&', $new_query_parts);
				}
				return $result_string;
			}
			if (count($temp_splits) === 2) {
				$parsed_to_url = $temp_splits[0];
				$parsed_to_query = $temp_splits[1];
				$original_query_parts = explode('&', $parsed_to_query);
				if (count($original_query_parts) == 1) {
					if (count(explode('=', $original_query_parts[0])) == 1) {
						$new_query_parts = array();
						foreach ($updated_params as $param_name => $param_value) {
							$new_query_parts[] = $param_name . '=' . $param_value;
						}
						if (count($new_query_parts) == 0) {
							$result_string = $parsed_to_url;
						} else {
							$result_string = $parsed_to_url . '?' . implode('&', $new_query_parts);
						}
					}

					$temp_array = explode('=', $original_query_parts[0]);
					if (count($temp_array) == 2) {
						$overwrite_params = array();
						$overwrite_params[$temp_array[0]] = $temp_array[1];
						foreach ($updated_params as $param_name => $param_value) {
							$overwrite_params[$param_name] = $param_value;
						}
						$new_query_parts = array();
						foreach ($overwrite_params as $param_name => $param_value) {
							$new_query_parts[] = $param_name . '=' . $param_value;
						}
						if (count($new_query_parts) == 0) {
							$result_string = $parsed_to_url;
						} else {
							$result_string = $parsed_to_url . '?' . implode('&', $new_query_parts);
						}
					}
					return $result_string;
				}
				$overwrite_params = array();
				foreach ($original_query_parts as $original_query_part) {
					$temp_array = explode('=', $original_query_part);
					if (count($temp_array) == 1) {
						continue;
					} else {
						$overwrite_params[$temp_array[0]] = $temp_array[1];
					}
				}
				foreach ($updated_params as $param_name => $param_value) {
					$overwrite_params[$param_name] = $param_value;
				}

				$new_query_parts = array();
				foreach ($overwrite_params as $param_name => $param_value) {
					$new_query_parts[] = $param_name . '=' . $param_value;
				}
				if (count($new_query_parts) == 0) {
					$result_string = $parsed_to_url;
				} else {
					$result_string = $parsed_to_url . '?' . implode('&', $new_query_parts);
				}
				return $result_string;
			}
		}
		
		/**
		 * 
		 * 取得url的query參數部分
		 *
		 * @param string $the_url 
		 * @return Array
		 *
		 */
		static public function get_url_params($the_url) {
			if (self::is_solid_string($the_url)) {
				
			}else {
				throw new Exception('Call ' . __FUNCTION__ . ' fail.Because $the_url error');
			}

			$result_array = array();
			$temp_query_string=parse_url($the_url, PHP_URL_QUERY);
			 if (self::is_non_empty_string($temp_query_string)) {
				
			} else {
				return $result_array;
			}
			
			parse_str($temp_query_string,$result_array);
			return $result_array;
		}
		
		/**
		 * 
		 * 取得自定義的全域變數
		 *
		 * @return string
		 * @throws Exception
		 * @todo 
		 * @since 2014-12-07
		 * @author Bill Liu <o7z3149o0@hotmail.com>
		 */
		static public function get_custom_global_vars() {
			$result_array = array();

			$all_vars = $GLOBALS;
			foreach ($all_vars as $temp_key => $temp_value) {
				if (self::is_start_with('global_', $temp_key)) {
					$result_array[$temp_key] = $temp_value;
				}
			}

			return $result_array;
		}

		/**
		 * 
		 * 二維陣列的merge 仿效jquery的merge
		 *
		 * @param array $the_first_array 第一個陣列
		 * @param array $the_second_array 第二個陣列
		 * @return array
		 * @throws Exception
		 */
		static public function two_dimension_array_merge($the_first_array, $the_second_array) {
			if(myGlobal::is_solid_array($the_first_array)){
			}else{
				throw new Exception('Call ' . __FUNCTION__ . ' fail.Because $the_first_array error');
			}
			if(myGlobal::is_solid_array($the_second_array)){
			}else{
				throw new Exception('Call ' . __FUNCTION__ . ' fail.Because $the_second_array error');
			}
			
			$result_array = array();

			foreach ($the_second_array as $array_key => $array_value) {
				if (is_array($array_value) === false) {
					throw new Exception('Call ' . __FUNCTION__ . ' fail.Because $array_value error');
				}

				if (array_key_exists($array_key, $the_first_array)) {
					if ($the_first_array[$array_key] === false) {
						throw new Exception('Call ' . __FUNCTION__ . ' fail.Because $the_first_array error');
					}
					$result_array[$array_key] = array_merge($the_first_array[$array_key], $array_value);
				} else {
					$result_array[$array_key] = $array_value;
				}
			}
			foreach ($the_first_array as $array_key => $array_value) {
				if (is_array($array_value) === false) {
					throw new Exception('Call ' . __FUNCTION__ . ' fail.Because $the_first_array error');
				}

				if (array_key_exists($array_key, $result_array)) {
					continue;
				} else {
					$result_array[$array_key] = $array_value;
				}
			}
			return $result_array;
		}

		/**
		 * 
		 * 將特定字首字串及特定字尾字串的方式，去取得中間的字串
		 *
		 * @param string $source_string 要處理的來源字串
		 * @param string $start_string 特定字首字串
		 * @param string $end_string 特定字尾字串
		 * @return string 中間的字串
		 *
		 * 舉例:
		 * $the_string='data_row_a80235_id';
		 * $the_fetch_string=myGlobal::fetch_specific_string($the_string,'data_row_1','_id');
		 * echo $the_fetch_string;
		 * output為 a80235
		 *
		 */
		static public function fetch_specific_string($source_string,$start_string,$end_string)
		{
			if(is_string($source_string)){
			}else{
				throw new Exception('Call ' . __FUNCTION__ . ' fail.Because $source_string error');
			}

			if(is_string($start_string)){	
			}else{
				throw new Exception('Call ' . __FUNCTION__ . ' fail.Because $start_string error');
			}

			if(is_string($end_string)){
			}else{
				throw new Exception('Call ' . __FUNCTION__ . ' fail.Because $end_string error');
			}
			
			$temp_reg='/^'.preg_quote($start_string,'/').'(.+)'.preg_quote($end_string,'/').'$/Dsu';
			$temp_matches=array();
			$temp_result=@preg_match($temp_reg,$source_string,$temp_matches);
			if($temp_result===0 || $temp_result===false){
				return '';
			}else{
				return $temp_matches[1];
			}
		}
		
		/**
		 * 
		 * 若字串一開始有出現特定字串則移除掉
		 *
		 * @param string $source_string 要處理的來源字串
		 * @param string $start_string 該特定字串
		 * @return string 返回一個處理過後的新字串
		 * @throws Exception
		 *
		 * 舉例:
		 * $the_string='data_row_id_a80235';
		 * $the_result_string=myGlobal::remove_start_string($the_string,'data_row_id_');
		 * echo $the_result_string;
		 * output為 a80235
		 *
		 */
		static public function remove_start_string($source_string,$start_string)
		{
			if(self::is_solid_string($source_string)){
				
			}else{
				throw new Exception('Call ' . __FUNCTION__ . ' fail.Because $source_string error');
			}
			if(self::is_solid_string($start_string)){
				
			}else{
				throw new Exception('Call ' . __FUNCTION__ . ' fail.Because $start_string error');
			}

			
		
			$start_string=preg_replace('/^'.preg_quote($start_string,'/').'/Dsu','',$source_string);
			return $start_string;
		}
		
		/**
		 * 
		 * 若字串結尾有出現特定字串則移除掉
		 *
		 * @param string $source_string 要處理的來源字串
		 * @param string $end_string 該特定字串
		 * @return string 返回一個處理過後的新字串
		 * @throws Exception
		 *
		 * 舉例:
		 * $the_string='a80235_data_row_id';
		 * $the_result_string=myGlobal::remove_start_string($the_string,'_data_row_id');
		 * echo $the_result_string;
		 * output為 a80235
		 *
		 */
		static public function remove_end_string($source_string,$end_string)
		{
			if(is_string($source_string)){
				
			}else{
				throw new Exception('Call ' . __FUNCTION__ . ' fail.Because $source_string error');
			}

			if(is_string($end_string)){

			}else{
				throw new Exception('Call ' . __FUNCTION__ . ' fail.Because $end_string error');
			}
		
			$end_string=preg_replace('/'.preg_quote($end_string,'/').'$/Dsu','',$source_string);
			return $end_string;
		}
		
		/**
		 * 
		 * 偵測網頁瀏覽者之環境
		 *
		 * @return array
		 */
		static public function parse_http_user_agent() {
			//偵測完後 會返回的陣列
			$return_data=array(
				'device'=>'',	//若為有長度的字串 代表裝置是非電腦(可能是平板或手機或...)
				'browser_type'=>'',	//瀏覽器類型
				'browser_version'=>'' //瀏覽器版本
			);
			if(stripos($_SERVER['HTTP_USER_AGENT'],"iPod")!==false){
				$return_data['device']='iPod';
			}elseif(stripos($_SERVER['HTTP_USER_AGENT'],"iPhone")!==false){
				$return_data['device']='iPhone';
			}elseif(stripos($_SERVER['HTTP_USER_AGENT'],"iPad")!==false){
				$return_data['device']='iPad';
			}elseif(stripos($_SERVER['HTTP_USER_AGENT'],"iPad")!==false){
				$return_data['device']='iPad';
			}elseif(stripos($_SERVER['HTTP_USER_AGENT'],"Android")!==false){
				if(stripos($_SERVER['HTTP_USER_AGENT'],"mobile")!==false){
					$return_data['device']='Android Mobile';
				}else{
					$return_data['device']='Android Tablet';
				}
			}elseif(stripos($_SERVER['HTTP_USER_AGENT'],"webOS")!==false){
				$return_data['device']='webOS';
			}elseif(stripos($_SERVER['HTTP_USER_AGENT'],"BlackBerry")!==false){
				$return_data['device']='BlackBerry';
			}elseif(stripos($_SERVER['HTTP_USER_AGENT'],"RIM Tablet")!==false){
				$return_data['device']='RIM Tablet';
			}
			
			if(stripos($_SERVER['HTTP_USER_AGENT'],"MSIE")!==false){
				
				$return_data['browser_type']='MSIE';
				$temp_array=explode('; ',$_SERVER['HTTP_USER_AGENT']);
				foreach($temp_array as $temp_string){
					if(self::is_start_with('MSIE ',$temp_string)){
						$return_data['browser_version']=self::fetch_specific_string($temp_string,'MSIE ','');	
						break;
					}
				}
			}elseif(stripos($_SERVER['HTTP_USER_AGENT'],"Firefox")!==false){	
				$return_data['browser_type']='Firefox';
				
				$temp_array=explode(' ',$_SERVER['HTTP_USER_AGENT']);
				foreach($temp_array as $temp_string){
					
					if(self::is_start_with('Firefox/',$temp_string)){
						
						$return_data['browser_version']=self::fetch_specific_string($temp_string,'Firefox/','');	
						break;
					}
				}
			}elseif(stripos($_SERVER['HTTP_USER_AGENT'],"Chrome")!==false){		
				$return_data['browser_type']='Chrome';
				$temp_array=explode(' ',$_SERVER['HTTP_USER_AGENT']);
				foreach($temp_array as $temp_string){
					if(self::is_start_with('Chrome/',$temp_string)){
						$return_data['browser_version']=self::fetch_specific_string($temp_string,'Chrome/','');	
						break;
					}
				}
			}elseif(stripos($_SERVER['HTTP_USER_AGENT'],"Safari")!==false){	
				$return_data['browser_type']='Safari';
				$temp_array=explode(' ',$_SERVER['HTTP_USER_AGENT']);
				foreach($temp_array as $temp_string){
					if(self::is_start_with('Safari/',$temp_string)){
						$return_data['browser_version']=self::fetch_specific_string($temp_string,'Safari/','');	
						break;
					}
				}
			}elseif(stripos($_SERVER['HTTP_USER_AGENT'],"Opera")!==false){
				//Opera的user_agent比較詭異 版本不好判斷
				$return_data['browser_type']='Opera';	
			}
			
			return $return_data;
		}
		
		/**
		 * 
		 * 確保該變數為string型態的資料，也就是說任何資料型態的變數，經過
		 * 該函數處理後，一定會返回string型態的資料
		 *
		 * @param $checked_var 要處理的變數
		 * @return string
		 * @throws Exception
		 */
		static public function ensure_string($checked_var) {
			if (isset($checked_var)===false){
				 return '';
			}
			
			if (gettype($checked_var) !== 'string') {
				return '';
			}
		   
			return $checked_var;
		}
		
		/**
		 * 
		 * 確保該變數為array型態的資料，也就是說任何資料型態的變數，經過
		 * 該函數處理後，一定會返回array型態的資料
		 *
		 * @param $checked_var 要處理的變數
		 * @return array
		 * @throws Exception
		 */
		static public function ensure_array($checked_var) {
			$return_array=array();
			if (isset($checked_var)===false){
				 return $return_array;
			}
			
			if (gettype($checked_var) !== 'array') {
				return $return_array;
			}
		   
			return $checked_var;
		}
		
		
		/**
		 * 
		 * 解構子
		 *
		 */
		public function __destruct() {
			//釋放成員
		}
	}


	/**
	 * 常用的檔案操作函式庫
	 */
	class myFile
	{
		/**
		 * 建構子
		 */
		public function __construct() {

		}
		
		/**
		 * 檢測POST過來的資料是否超過伺服器限制
		 */
		static public function is_legal_post_size()
		{	
			//伺服器所限制的post的byte數
			$server_post_max_size_human = ini_get('post_max_size');//含單位
			$server_post_max_size=0;
			$unit = strtoupper(substr($server_post_max_size_human, -1));
			$num  = (float)substr($server_post_max_size_human, 0,-1);
			if($unit==='K'){
				$server_post_max_size=$num*1024;
			}elseif($unit==='M'){
				$server_post_max_size=$num*1024*1024;
			}elseif($unit==='G'){
				$server_post_max_size=$num*1024*1024*1024;
			}
			
			//本次表單所POST的資料量
			$request_post_size=(float)$_SERVER['CONTENT_LENGTH'];
			
			if($request_post_size>$server_post_max_size){
				return false;
			}
			return true;
			
		}
		
		/**
		 * 判斷檔案是否存在
		 */
		static public function is_file_exist($file_path)
		{	
			if(myGlobal::is_solid_string($file_path)){
			}else{
				throw new Exception('Call ' . __FUNCTION__ . ' fail.Because $file_path error');
			}
			if($fp = @fopen($file_path, "rb")){
				fclose($fp);
				return true;
			}else{
				return false;
			}
		}
		
		/**
		 * 計算檔案大小
		 * 在windows下，filesize函式失效，故以此函式替代，反回的大小單位為byte
		 */
		static public function knowfilesize($file_path){
			if(myGlobal::is_solid_string($file_path)){
			}else{
				throw new Exception('Call ' . __FUNCTION__ . ' fail.Because $file_path error');
			}

			if(self::is_file_exist($file_path)){
				
			}else{
				throw new Exception("讀檔失敗");
			}		
			$fp = @fopen($file_path, "rb");
			$body = '';
			while(feof($fp)==false){
				$body .= fread($fp, 1);
			}	
			
			fclose($fp);
			
			return strlen($body);
		}
		
		/**
		 * 下載檔案
		 * uploadfile_download(上傳檔案id,顯示用下載檔名)
		 * 上傳檔案id 相對於專案根磁碟路徑的路徑
		 */
		static public function uploadfile_download($uploadfile_id,$custom_name='') {
		
			if(myGlobal::is_solid_string($uploadfile_id)){
			}else{
				throw new Exception('Call ' . __FUNCTION__ . ' fail.Because $uploadfile_id error');
			}
			if(is_string($custom_name)){
			}else{
				throw new Exception('Call ' . __FUNCTION__ . ' fail.Because $custom_name error');
			}

			
			
			$diskfilepath=self::uploadfile_getdiskpath($uploadfile_id);
			//Gather relevent info about file
			$file_len        = self::knowfilesize($diskfilepath);
			
			$file_name   = basename($diskfilepath);
		
			$file_extension = self::get_file_extension($file_name);
			
			//This will set the Content-Type to the appropriate setting for the file
			switch( $file_extension ) {
				case "pdf": $file_property="application/pdf"; break;
				case "exe": $file_property="application/octet-stream"; break;
				case "zip": $file_property="application/zip"; break;
				case "doc": $file_property="application/msword"; break;
				case "xls": $file_property="application/vnd.ms-excel"; break;
				case "ppt": $file_property="application/vnd.ms-powerpoint"; break;
				case "gif": $file_property="image/gif"; break;
				case "png": $file_property="image/png"; break;
				case "jpeg":
				case "jpg": $file_property="image/jpg"; break;
				case "mp3": $file_property="audio/mpeg"; break;
				case "wav": $file_property="audio/x-wav"; break;
				case "mpeg":
				case "mpg":
				case "mpe": $file_property="video/mpeg"; break;
				case "mov": $file_property="video/quicktime"; break;
				case "avi": $file_property="video/x-msvideo"; break;
				case "txt": $file_property="text/plain"; break;

				//The following are for extensions that shouldn't be downloaded (sensitive stuff, like php files)
				case "php":
				case "htm":
				case "html": die("Cannot be used for ". $file_extension ." files!"); break;

				default: $file_property="application/force-download";
			}

			//Begin writing headers
			header("Pragma: public");
			header("Expires: 0");
			header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
			header("Cache-Control: public");
			header("Content-Description: File Transfer");

			//Use the switch-generated Content-Type
			header("Content-Type: {$file_property}");

			//Force the download
			if($custom_name){
				header("Content-Disposition: attachment; filename=\"{$custom_name}.{$file_extension}\";");
			}else{
				header("Content-Disposition: attachment; filename={$file_name};");
			}
			header("Content-Transfer-Encoding: binary");
			header("Content-Length: ".$file_len);
			readfile($diskfilepath);
			exit;
		}

		/**
		 * 檢測上載的檔案
		 * 在有上傳檔案的網頁 這個函式一定會先執行
		 */
		static public function uploadfile_check($inputname,$check_rules){
			//$check_rules["white_extensions"]
			//$check_rules["maxfilesize"],$check_rules["minfilesize"]
			//$check_rules['file_type']
			//$check_rules['filename_length_max']
			//$check_rules['pic_is_horizontal']
			//$check_rules['pic_is_vertical']
			//$check_rules['pic_width_min'],$check_rules['pic_height_min']
			//$check_rules['pic_width_max'],$check_rules['pic_height_max']
			//$check_rules['pic_width_fixed'],$check_rules['pic_height_fixed']
			//返回的結果若型態為字串，則檢查未通過
			//返回的結果若型態為陣列，則檢查通過，並返回該檔案相關資訊
			if(myGlobal::is_solid_string($inputname)){
			}else{
				throw new Exception('Call ' . __FUNCTION__ . ' fail.Because $inputname error');
			}	
			if(is_array($check_rules)){
			}else{
				throw new Exception('Call ' . __FUNCTION__ . ' fail.Because $check_rules error');
			}

			$checkresult='';
			
			//檢查上傳的檔案
			if(self::is_legal_post_size()===false){
				
				$checkresult='此次POST的總資料量超過伺服器限制';
				return $checkresult;
			}
			if($_FILES[$inputname]===null){
				
				$checkresult='input name is not exist';
				return $checkresult;
			}
			if($_FILES[$inputname]['error'] !== UPLOAD_ERR_OK ){
				
				$checkresult='檔案上載失敗1'.$_FILES[$inputname]['error'];
				return $checkresult;
			}
			if(is_uploaded_file($_FILES[$inputname]["tmp_name"])===false){
				$checkresult='檔案上載失敗2';
				return $checkresult;
			}
			if($_FILES[$inputname]["name"]===null){
				$checkresult='檔案上載失敗3';
				return $checkresult;
			}
			if(isset($check_rules['filename_length_max']) && myGlobal::is_non_empty_number($check_rules['filename_length_max'])){
				$temp_file_name_length=strlen($_FILES[$inputname]["name"]);
				if($temp_file_name_length==0 || $temp_file_name_length>$check_rules['filename_length_max'] ){
					$checkresult='檔名長度過長或為0';
					return $checkresult;
				}
			}else{
				$temp_file_name_length=strlen($_FILES[$inputname]["name"]);
				if($temp_file_name_length==0 || $temp_file_name_length>260 ){
					$checkresult='檔名長度過長或為0';
					return $checkresult;
				}
			}
			if(isset($check_rules['white_extensions']) && myGlobal::is_solid_array($check_rules["white_extensions"])){
				$get_file_extension=self::get_file_extension($_FILES[$inputname]['name']);
				if($get_file_extension==''){
					$checkresult="副檔名違法";
					return $checkresult;
				}
				
				if(in_array($get_file_extension,$check_rules["white_extensions"])==false){
					$checkresult="副檔名違法";
					return $checkresult;
				}
			}
		
			$file_size=self::knowfilesize($_FILES[$inputname]["tmp_name"]);
			if(isset($check_rules["maxfilesize"])){
				if($file_size>$check_rules["maxfilesize"]){
					$checkresult="檔案過大";
					return $checkresult;
				}
			}
			if(isset($check_rules["minfilesize"])){
				if($file_size<$check_rules["minfilesize"]){
					$checkresult="檔案過小";
					return $checkresult;
				}
			}
			if(isset($check_rules['file_type']) && $check_rules['file_type']=='pic'){
				if(myGlobal::is_start_with('image/', $_FILES[$inputname]['type']) ){
				}else{
					$checkresult="檔案非圖檔";
					return $checkresult;
				}
			}
			$is_horizontal=1;
			if(isset($check_rules['file_type']) && $check_rules['file_type']=='pic'){
				$about_img=getimagesize($_FILES[$inputname]["tmp_name"]);
				if($check_rules['pic_is_horizontal']){
					
					if($about_img[0]>=$about_img[1]){
					
					}else{
						$checkresult="圖片必須為橫圖";
						return $checkresult;
					}
				}
				if($check_rules['pic_is_vertical']){
					
					if($about_img[0]<=$about_img[1]){
						
					}else{
						$checkresult="圖片必須為窄圖";
						return $checkresult;
					}
				}
				
					
				if($check_rules['pic_width_max']){
					
					if($about_img[0]>$check_rules['pic_width_max']){
						$checkresult="圖片的寬超過上限";
						return $checkresult;
					}
					
				}
				if($check_rules['pic_width_min']){
					
					if($about_img[0]<$check_rules['pic_width_min']){
						$checkresult="圖片的寬低於下限";
						return $checkresult;
					}
					
				}
				if($check_rules['pic_height_max']){
					
					if($about_img[1]>$check_rules['pic_height_max']){
						$checkresult="圖片的高超過上限";
						return $checkresult;
					}
					
				}
				if($check_rules['pic_height_min']){
					
					if($about_img[1]<$check_rules['pic_height_min']){
						$checkresult="圖片的高低於下限";
						return $checkresult;
					}
					
				}
				
				if($about_img[0]<$about_img[1]){
					$is_horizontal=0;
				}
			}
			$file_attrs=array();
			$file_attrs['tmp_diskpath']=$_FILES[$inputname]["tmp_name"];
			$file_attrs['size']=$file_size;
			$file_attrs['property']=$_FILES[$inputname]['type'];
			$file_attrs['is_horizontal']=$is_horizontal;		
			return $file_attrs;
		}
		
		/**
		 * 處理檔案的上載
		 */
		static public function uploadfile_add($file_settings,$check_rules,$is_overwrite=true){
			//$file_settings["inputname"]
			//$file_settings["use"]
			//$file_settings["uploaddir"]
			//$file_settings['is_original_filename']
			//$file_settings['custom_main_filename']
	
			
			//$check_rules["white_extensions"]
			//$check_rules["maxfilesize"],$check_rules["minfilesize"]
			//$check_rules['file_type']
			//$check_rules['filename_length_max']
			//$check_rules['pic_is_horizontal']
			//$check_rules['pic_is_vertical']
			//$check_rules['pic_width_min'],$check_rules['pic_height_min']
			//$check_rules['pic_width_max'],$check_rules['pic_height_max']
			//$check_rules['pic_width_fixed'],$check_rules['pic_height_fixed']
			if(myGlobal::is_solid_array($file_settings)){
			}else{
				throw new Exception('Call ' . __FUNCTION__ . ' fail.Because $file_settings error');
			}
			if(is_array($check_rules)){
			}else{
				throw new Exception('Call ' . __FUNCTION__ . ' fail.Because $check_rules error');
			}
			if(is_bool($is_overwrite)){
			}else{
				throw new Exception('Call ' . __FUNCTION__ . ' fail.Because $is_overwrite error');
			}
			
			$file_attrs=null;
			$checkresult=self::uploadfile_check(
				$file_settings['inputname'],
				$check_rules
			);
			if(is_array($checkresult))
			{	
				$file_attrs=$checkresult;
			}else{
				return $checkresult;
			}
			if(myGlobal::is_non_empty_string($file_settings['uploaddir'])){
			
			}else{
				$file_settings['uploaddir']='uploadfile';
			}
			if(is_dir(ProjectRootDisk.'Uploads/'.$file_settings['uploaddir'])){
			
			}else{
				
				return ProjectRootDisk.'Uploads/'.$file_settings['uploaddir'].' is not exist';
			}
			
			//檢查上傳的檔案
			if(myGlobal::is_non_empty_string($file_settings['custom_main_filename'])){
				$temp_uploaddir=$file_settings['uploaddir'];
				$temp_custom_main_filename=$file_settings['custom_main_filename'];
				$temp_extension=self::get_file_extension($_FILES[$file_settings['inputname']]['name']);
				
				$new_file_path='ej03xu3/update/'.$temp_uploaddir.'/'.
				$temp_custom_main_filename.'.'.$temp_extension;
				if($is_overwrite){
				
				}else{
					while(self::uploadfile_isexist($new_file_path)){
						$temp_custom_main_filename='new_'.$temp_custom_main_filename;
						$new_file_path='ej03xu3/update/'.$temp_uploaddir.'/'.
						$temp_custom_main_filename.'.'.$temp_extension;	
					}
				}
				$file_attrs['id']=$new_file_path;
				$file_attrs['custom_id']=$temp_uploaddir.'/'.$temp_custom_main_filename.'.'.$temp_extension;
				$file_attrs['name']=$temp_custom_main_filename.'.'.$temp_extension;
				$file_attrs['original_name']=$_FILES[$file_settings['inputname']]['name'];
				$file_attrs['main_name']=$temp_custom_main_filename;
				$file_attrs['extension']=$temp_extension;
				$file_attrs['original_main_name']=basename($file_attrs['original_name'],'.'.$file_attrs['extension']);
				$file_attrs['uploaddir']=$temp_uploaddir;
			}else{		
				if($file_settings['is_original_filename']===true){
					$temp_uploaddir=$file_settings['uploaddir'];
					$temp_filename=$_FILES[$file_settings['inputname']]['name'];
					
					$new_file_path='ej03xu3/update/'.$temp_uploaddir.'/'.
					$temp_filename;
					
					while(self::uploadfile_isexist($new_file_path)){
						$temp_filename='new_'.$temp_filename;
						$new_file_path='ej03xu3/update/'.$temp_uploaddir.'/'.
						$temp_filename;	
					}
					
					$file_attrs['id']=$new_file_path;
					
					$file_attrs['custom_id']=$temp_uploaddir.'/'.$temp_filename;
					$file_attrs['original_name']=$_FILES[$file_settings['inputname']]['name'];
					
					$file_attrs['name']=$temp_filename;
					$file_attrs['extension']=self::get_file_extension($temp_filename);
					
					
					
					$file_attrs['main_name']=basename($temp_filename,'.'.$file_attrs['extension']);
					$file_attrs['uploaddir']=$temp_uploaddir;
					
					$file_attrs['original_main_name']=basename($file_attrs['original_name'],'.'.$file_attrs['extension']);
				}else{
					$temp_filename=uniqid('upload_',true).'.'.self::get_file_extension($_FILES[$file_settings['inputname']]['name']);
					$file_attrs['id']='ej03xu3/update/'.$file_settings['uploaddir'].'/'.
					$temp_filename;
					
					$file_attrs['custom_id']=$file_settings['uploaddir'].'/'.
					$temp_filename;
					
					$file_attrs['original_name']=$_FILES[$file_settings['inputname']]['name'];
					$file_attrs['name']=$temp_filename;
					$file_attrs['extension']=self::get_file_extension($temp_filename);
					$file_attrs['main_name']=basename($temp_filename,'.'.$file_attrs['extension']);
					$file_attrs['uploaddir']=$temp_uploaddir;
					
					$file_attrs['original_main_name']=basename($file_attrs['original_name'],'.'.$file_attrs['extension']);
					
				}
			}
			
			
			$truely_diskpath=self::uploadfile_getdiskpath($file_attrs['id']);
			
			move_uploaded_file($file_attrs['tmp_diskpath'],iconv('utf-8','big5',$truely_diskpath));
			return $file_attrs;
		}
		
		/**
		 * 變更檔名
		 */
		static public function uploadfile_rename($uploadfile_id,$to_name,$is_overwrite=true){
			if(myGlobal::is_solid_string($uploadfile_id)){
			}else{
				throw new Exception('Call ' . __FUNCTION__ . ' fail.Because $uploadfile_id error');
			}
			if(myGlobal::is_solid_string($to_name)){
			}else{
				throw new Exception('Call ' . __FUNCTION__ . ' fail.Because $to_name error');
			}
			if(is_bool($is_overwrite)){
			}else{
				throw new Exception('Call ' . __FUNCTION__ . ' fail.Because $is_overwrite error');
			}

			if(self::uploadfile_isexist($uploadfile_id)){
			
			}else{
				
				throw new Exception(ProjectRootDisk.$uploadfile_id.' is not exist');
			}
			$file_attrs=array();
			$the_extension_part=self::get_file_extension($uploadfile_id);
			$new_uploadfile_id=dirname($uploadfile_id).'/'.$to_name.$the_extension_part;
			
			if($is_overwrite){
			
			}else{
				while(self::uploadfile_isexist($new_uploadfile_id)){
					$to_name='new_'.$to_name;
					$new_uploadfile_id=dirname($uploadfile_id).'/'.
					$to_name.$the_extension_part;	
				}
			}
			
			if(rename(ProjectRootDisk.$uploadfile_id,ProjectRootDisk.$new_uploadfile_id)){
			
			}else{
				throw new Exception('rename fail');
			}
			$file_attrs['id']=$new_uploadfile_id;
			
			
			return $file_attrs;
		}
		
		/**
		 * 移動檔案
		 */
		static public function uploadfile_move($source_uploadfile_id,$destination_uploadfile_id,$is_overwrite=false){
			if(myGlobal::is_solid_string($source_uploadfile_id)){
			}else{
				throw new Exception('Call ' . __FUNCTION__ . ' fail.Because $source_uploadfile_id error');
			}
			
			if(myGlobal::is_solid_string($destination_uploadfile_id)){
			}else{
				throw new Exception('Call ' . __FUNCTION__ . ' fail.Because $destination_uploadfile_id error');
			}

			if(is_bool($is_overwrite)){
			}else{
				throw new Exception('Call ' . __FUNCTION__ . ' fail.Because $is_oberwrite error');
			}
		
			if(self::uploadfile_isexist($source_uploadfile_id)){
			
			}else{
				return false;
			}
			if(self::uploadfile_isexist($destination_uploadfile_id)){
				if($is_overwrite){
					
				}else{
					return false;
				}
			}
			
			
			if(@rename(ProjectRootDisk.$source_uploadfile_id,ProjectRootDisk.$destination_uploadfile_id)){
			
			}else{
				return false;
			}
		
			return true;
		}
		
		/**
		 * 刪除檔案
		 */
		static public function uploadfile_remove($uploadfile_id){
			if(myGlobal::is_solid_string($uploadfile_id)){
			}else{
				throw new Exception('Call ' . __FUNCTION__ . ' fail.Because $uploadfile_id error');
			}

			
			$diskfilepath=self::uploadfile_getdiskpath($uploadfile_id);
			if(self::is_file_exist($diskfilepath)){
			
			}else{
				return false;
			}
			
		
			return @unlink($diskfilepath);
				
		}
		
		/**
		 * 檢測檔案是否存在
		 */
		static public function uploadfile_isexist($uploadfile_id){
			if(myGlobal::is_solid_string($uploadfile_id)){
			}else{
				throw new Exception('Call ' . __FUNCTION__ . ' fail.Because $uploadfile_id error');
			}

			$is_exist=false;
			if($uploadfile_id){
			}else{
				return $is_exist;
			}
			
			if(self::is_file_exist(self::uploadfile_getdiskpath($uploadfile_id))){
			}else{
				return $is_exist;
			}
			
			
			
			$is_exist=true;
			return $is_exist;
		}
		
		
		/**
		 * 磁碟檔案 容量換算
		 */
		static public function v1_convert_to_bytenum($num,$fromunit){
			$bytenum=0;	
			if($fromunit=='KB'){
				$bytenum=1024*$num;
			}elseif($fromunit=='MB'){	
				$bytenum=1024*1024*$num;
			}elseif($fromunit=='GB'){
				$bytenum=1024*1024*1024*$num;
			}else{
				$bytenum=$num;
			}
			return $bytenum;
		}
		
		/**
		 * 磁碟檔案 容量換算
		 */
		static public function v1_convert_from_bytenum($num,$tounit){
			if(myGlobal::is_solid_number($num)){
			}else{
				throw new Exception('Call ' . __FUNCTION__ . ' fail.Because $num error');
			}
			if(myGlobal::is_solid_string($tounit)){
			}else{
				throw new Exception('Call ' . __FUNCTION__ . ' fail.Because $tounit error');
			}

			$tounitnum=0;	
			if($tounit=='KB'){
				$tounitnum=round($num/1024,2);
			}elseif($tounit=='MB'){	
				$tounitnum=round($num/1024/1024,2);
			}elseif($tounit=='GB'){
				$tounitnum=round($num/1024/1024/1024,2);
			}else{
				$tounitnum=$num;
			}
			return $tounitnum;
		}
		
		/**
		 * 從uploadfile_id返回磁碟時體路徑
		 */
		static public function uploadfile_getdiskpath($uploadfile_id){
			if(myGlobal::is_solid_string($uploadfile_id)){
			}else{
				throw new Exception('Call ' . __FUNCTION__ . ' fail.Because $uploadfile_id error');
			}

			$diskpath='';
			if($uploadfile_id==''){
				return $diskpath;
			}
			$diskpath=ProjectRootDisk.$uploadfile_id;
			
			return $diskpath;
			 
		}
		
		/**
		 * 取得目前程式執行對應的url，不包含查詢參數
		 */
		static public function getnowurl(){
			$urlpath='';
			$get_protocol='';
			if(
				isset($_SERVER['HTTPS']) && ($_SERVER['HTTPS'] == 'on' || $_SERVER['HTTPS'] == 1) ||
				isset($_SERVER['HTTP_X_FORWARDED_PROTO']) && $_SERVER['HTTP_X_FORWARDED_PROTO'] == 'https'
			){
				$get_protocol='https://';
			}else {
				$get_protocol= 'http://';
			}
			$urlpath=$get_protocol.$_SERVER['HTTP_HOST'].$_SERVER["SCRIPT_NAME"];
			
			return $urlpath;
			 
		}
		
		/**
		 * 取得目前程式執行的url，含查詢參數
		 */
		static public function get_now_full_url(){
			$urlpath='';
			$get_protocol='';
			if(
				isset($_SERVER['HTTPS']) && ($_SERVER['HTTPS'] == 'on' || $_SERVER['HTTPS'] == 1) ||
				isset($_SERVER['HTTP_X_FORWARDED_PROTO']) && $_SERVER['HTTP_X_FORWARDED_PROTO'] == 'https'
			){
				$get_protocol='https://';
			}else {
				$get_protocol= 'http://';
			}
			$urlpath=$get_protocol.$_SERVER['HTTP_HOST'].$_SERVER["REQUEST_URI"];
			
			return $urlpath;
			 
		}
		
		/**
		 * 取得檔案的副檔名
		 */
		static public function get_file_extension($file_name){
			if(myGlobal::is_solid_string($file_name)){
			}else{
				throw new Exception('Call ' . __FUNCTION__ . ' fail.Because $file_name error');
			}

			$file_extension='';
			if(strrchr($file_name,".")===false){
				
			}else{
				$temp_string=strrchr($file_name,".");
				if($temp_string===false){
					
				}else{
					$temp_string=substr($temp_string,1);
					if(empty($temp_string)){
					
					}else{
						$file_extension=strtolower($temp_string);
					}
				}
			}
			
			
			return $file_extension;
			 
		}
		
		/**
		 * 取得指定url的圖片資料
		 */
		static public function get_remote_file($fileurl){
			if(myGlobal::is_solid_string($fileurl)){
			}else{
				throw new Exception('Call ' . __FUNCTION__ . ' fail.Because $fileurl error');
			}
			$return_content='';
			$headers[] = 'Accept: image/gif, image/x-bitmap, image/jpeg, image/pjpeg';
			$headers[] = 'Connection: Keep-Alive';
			$headers[] = 'Content-type: application/x-www-form-urlencoded;charset=UTF-8';
			// 初始化一個 cURL 對象
			$curl = curl_init();

			curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
			curl_setopt($curl, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows; U; Windows NT 5.1; zh-CN; rv:1.9.0.5) Gecko/2008120122 Firefox/3.0.5 FirePHP/0.2.1");

			curl_setopt($curl, CURLOPT_REFERER, "http://www.google.com.tw/"); //有時候需要設定該網站網址才能抓取圖片
			curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);
			// 設置你需要抓取的URL
			curl_setopt($curl, CURLOPT_URL, $fileurl);

			// 設置header
			curl_setopt($curl, CURLOPT_HEADER, 0);

			// 設置cURL 參數，要求結果保存到字符串中還是輸出到屏幕上。
			curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

			// 運行cURL，請求網頁
			$return_content = curl_exec($curl);

			// 關閉URL請求
			curl_close($curl);

			 return $return_content;
		}
		
		/**
		 * 確保檔案名稱是合法的
		 */
		static public function get_security_filename($filename,$is_have_dir=false){
			
			if(myGlobal::is_solid_string($filename)){
			}else{
				throw new Exception('Call ' . __FUNCTION__ . ' fail.Because $filename error');
			}
			if(is_bool($is_have_dir)){
				throw new Exception('Call ' . __FUNCTION__ . ' fail.Because $is_have_dir error');
			}
			
			$return_data='';
			$filename=trim($filename);
			$temp_file_extension=self::get_file_extension($filename);
			$temp_file_main=myGlobal::fetch_specific_string($filename,'','.'.$temp_file_extension);
			
			if($is_have_dir){
				
				$temp_file_parts=explode('/',$temp_file_main);
				$temp_file_parts=array_map(
					'self::process_for_secure'
					,$temp_file_parts
				);
				$temp_file_main=implode('/',$temp_file_parts);
			}else{
				$temp_file_main=preg_replace('/[^A-Za-z0-9_]/', '_', $temp_file_main);
			}
			if($temp_file_extension){
				$return_data=$temp_file_main.'.'.$temp_file_extension;
			}else{
				$return_data=$temp_file_main;
			}
			return $return_data;
		}
		static public function process_for_secure($temp_file_part){
			if(myGlobal::is_solid_string($temp_file_part)){
			}else{
				throw new Exception('Call ' . __FUNCTION__ . ' fail.Because $temp_file_part error');
			}

			$temp_file_part=preg_replace('/[^A-Za-z0-9_]/', '_',$temp_file_part);
			return $temp_file_part;
		}

		/**
		 * 根據傳入的參數 去變更檔案路徑
		 * $params['dir_name']
		 *	$params['main_name_prefix']
		 *	$params['main_name']
		 *	$params['main_name_suffix']
		 *	$params['extension']
		 */
		static public function get_new_filename($filename,$params=array()){
			if(myGlobal::is_solid_string($filename)){
			}else{
				throw new Exception('Call ' . __FUNCTION__ . ' fail.Because $filename error');
			}
			if(myGlobal::is_solid_array($params)){
			
			}else{
				throw new Exception('Call ' . __FUNCTION__ . ' fail.Because $params error');
			}


			$return_data='';
			$temp_array=pathinfo($filename);
			$original_dir_name=$temp_array['dirname'];
			$original_main_name=$temp_array['filename'];
			$original_extension=$temp_array['extension'];
			
			if(myGlobal::is_solid_string($params['dir_name'])){
				$return_data.=$params['dir_name'].'/';
			}else{
				$return_data.=$original_dir_name.'/';
			}
			
			if(myGlobal::is_solid_string($params['main_name_prefix'])){
				$return_data.=$params['main_name_prefix'];
			}
			if(myGlobal::is_solid_string($params['main_name'])){
				$return_data.=$params['main_name'];
			}else{
				$return_data.=$original_main_name;
			}
			if(myGlobal::is_solid_string($params['main_name_suffix'])){
				$return_data.=$params['main_name_suffix'];
			}
			
			if(myGlobal::is_solid_string($params['extension'])){
				$return_data.='.'.$params['extension'];
			}else{
				if(myGlobal::is_solid_string($original_extension)){
					$return_data.='.'.$original_extension;
				}
			}
			
			return $return_data;
		}
		
		/*
			php原生函式:
			mixed pathinfo( string $path [, int $options = PATHINFO_DIRNAME | PATHINFO_BASENAME | PATHINFO_EXTENSION | PATHINFO_FILENAME ] )
			說明:取得檔案路徑相關資訊
			example:
			$path="/a/b/test.php";
			will return:
			Array
			(
				[dirname] => /a/b
				[basename] => test.php
				[extension] => php
				[filename] => test
			)
		*/
		/*
			php原生函式:
			mixed mime_content_type ( string $filename )
			說明:取得檔案的mime資訊
			
		*/
		/*
			php原生函式:
			array getimagesize ( string $filename [, array &$imageinfo ] )
			說明:取得圖片資訊，若不是圖片返回false
			will return:
			Array
			(
				[0] => 350
				[1] => 318
				[2] => 2
				[3] => width="350" height="318"
				[bits] => 8
				[channels] => 3
				[mime] => image/jpeg
			)
			
		*/
	}
	
	
	/**
	 * 常用的處理圖片的函式庫
	 */
	class myImage{


		#▄▄▄▄▄▄▄▄▄建構函數▄▄▄▄▄▄▄▄▄ #
		public function __construct() {

		}

		/**
		 * 讀取BMP圖檔，輸出資源
		 * imagecreatefrombmp(來源圖檔路徑)，傳回值為 資源 或 FALSE
		 */	
		static function imagecreatefrombmp($filename) { 
			if(myGlobal::is_solid_string($filename)){
			}else{
				throw new Exception('Call ' . __FUNCTION__ . ' fail.Because $filename error');
			}

			// Ouverture du fichier en mode binaire 
			if ( ! $f1 = @fopen ($filename, "rb")) return FALSE ; 
			// 1 : Chargement des ent?tes FICHIER 
			$FILE = unpack ( "vfile_type/Vfile_size/Vreserved/Vbitmap_offset" , fread($f1 ,14)); 
			if ( $FILE ['file_type'] != 19778 ) return FALSE ; 
			// 2 : Chargement des ent?tes BMP 
			$BMP = unpack ( 'Vheader_size/Vwidth/Vheight/vplanes/vbits_per_pixel' . 
					'/Vcompression/Vsize_bitmap/Vhoriz_resolution' . 
					'/Vvert_resolution/Vcolors_used/Vcolors_important' , fread ( $f1 , 40 )); 
			$BMP [ 'colors' ] = pow ( 2 , $BMP['bits_per_pixel ' ]); 
			if ( $BMP ['size_bitmap'] == 0 ) $BMP ['size_bitmap']=$FILE ['file_size']-$FILE ['bitmap_offset']; 
			$BMP ['bytes_per_pixel'] = $BMP ['bits_per_pixel'] / 8 ; 
			$BMP ['bytes_per_pixel2'] = ceil ( $BMP ['bytes_per_pixel']); 
			$BMP ['decal'] = ( $BMP ['width']*$BMP ['bytes_per_pixel'] / 4 ); 
			$BMP ['decal'] -= floor ( $BMP ['width'] * $BMP ['bytes_per_pixel'] / 4 ); 
			$BMP ['decal'] = 4 - ( 4 * $BMP ['decal']); 
			if ( $BMP ['decal'] == 4 ) $BMP ['decal'] = 0 ; 
			// 3 : Chargement des couleurs de la palette 
			$PALETTE = array (); 
			if ( $BMP ['colors'] < 16777216 ){ 
				$PALETTE = unpack ( 'V' . $BMP ['colors'] , fread ( $f1 , $BMP ['colors'] * 4 )); 
			} 
			// 4 : Cr?ation de l'image 
			$IMG = fread ( $f1 , $BMP ['size_bitmap']); 
			$VIDE = chr ( 0 ); 
			$res = imagecreatetruecolor( $BMP ['width'] , $BMP ['height']); 
			$P = 0 ; 
			$Y = $BMP ['height'] - 1 ; 
			while ( $Y >= 0 ){ 
				$X = 0 ; 
				while ( $X < $BMP ['width']){ 
					if ( $BMP ['bits_per_pixel'] == 24 ) 
						$COLOR = @unpack ( "V" , substr($IMG,$P,3).$VIDE ); 
					elseif ( $BMP['bits_per_pixel']== 16 ){ 
						$COLOR = unpack ( "n" , substr ( $IMG , $P , 2 )); 
						$COLOR [1] = $PALETTE [ $COLOR [ 1 ] + 1 ]; 
					}elseif ( $BMP['bits_per_pixel']== 8 ){ 
						$COLOR = unpack ( "n" , $VIDE . substr ( $IMG , $P , 1 )); 
						$COLOR [1] = $PALETTE [ $COLOR [ 1 ] + 1 ]; 
					}elseif ( $BMP['bits_per_pixel']== 4 ){ 
						$COLOR = unpack ( "n" , $VIDE . substr ( $IMG , floor ( $P ) , 1 )); 
						if (( $P * 2 ) % 2 == 0 ) 
							$COLOR [1] = ( $COLOR [1] >> 4 ) ; 
						else 
							$COLOR [1] = ( $COLOR [1] & 0x0F ); 
						$COLOR [1] = $PALETTE [ $COLOR [1] + 1 ]; 
					}elseif ( $BMP['bits_per_pixel']== 1 ){ 
						$COLOR = unpack ( "n" , $VIDE . substr ( $IMG , floor ( $P ) , 1 )); 
						if (( $P * 8 ) % 8 == 0 ) $COLOR [ 1 ] = $COLOR [ 1 ] >> 7 ; 
						elseif (( $P * 8 ) % 8 == 1 ) $COLOR [1] = ( $COLOR [1] & 0x40 ) >> 6 ; 
						elseif (( $P * 8 ) % 8 == 2 ) $COLOR [1] = ( $COLOR [1] & 0x20 ) >> 5 ; 
						elseif (( $P * 8 ) % 8 == 3 ) $COLOR [1] = ( $COLOR [1] & 0x10 ) >> 4 ; 
						elseif (( $P * 8 ) % 8 == 4 ) $COLOR [1] = ( $COLOR [1] & 0x8 ) >> 3 ; 
						elseif (( $P * 8 ) % 8 == 5 ) $COLOR [1] = ( $COLOR [1] & 0x4 ) >> 2 ; 
						elseif (( $P * 8 ) % 8 == 6 ) $COLOR [1] = ( $COLOR [1] & 0x2 ) >> 1 ; 
						elseif (( $P * 8 ) % 8 == 7 ) $COLOR [1] = ( $COLOR [1] & 0x1 ); 
						$COLOR [1] = $PALETTE [ $COLOR [1] + 1 ]; 
					}else return FALSE ; 
					imagesetpixel( $res , $X , $Y , $COLOR [ 1 ]); 
					$X ++ ; 
					$P += $BMP['bytes_per_pixel']; 
				} 
				$Y -- ; 
				$P += $BMP['decal']; 
			} 
			// Fermeture du fichier 
			fclose ( $f1 ); 
			return $res ; 
		} 
		
		/**
		 * 壓縮圖片
		 * easy_process_compression，傳回值為資訊陣列
		 * params['position'] params['coordinate']
		 */	
		static function easy_process_compression($uploadfile_id,$about_info=array(),$type='') { 
			if(myGlobal::is_solid_string($uploadfile_id)){
			}else{
				throw new Exception('Call ' . __FUNCTION__ . ' fail.Because $uploadfile_id error');
			}
			if(myGlobal::is_solid_array($about_info)){
			}else{
				throw new Exception('Call ' . __FUNCTION__ . ' fail.Because $about_info error');
			}
			if(is_string($type)){
			}else{
				throw new Exception('Call ' . __FUNCTION__ . ' fail.Because $type error');
			}	
			$return_data=array(
				'is_success'=>'1',
				'display_message'=>'系統忙碌',
				'develop_message'=>''
			);
			try{
				if($type=='resize_to_any_size'){
					$be_processed_pic_filepath=ProjectRootDisk.$uploadfile_id;
					$be_processed_pic_canvas=null;
					$is_process_transparent='0';
					//原始的圖處理過後 變成符合特定長寬比的圖片
					$be_processed_pic_info=getimagesize($be_processed_pic_filepath);
					if($be_processed_pic_info){
					
					}else{
						throw new Exception('$be_processed_pic_filepath is wrong 1');
					}
					if($be_processed_pic_info['mime']=='image/gif'){
						$be_processed_pic_canvas=imagecreatefromgif($be_processed_pic_filepath);
						$is_process_transparent='1';
					}elseif($be_processed_pic_info['mime']=='image/jpeg'){
						$be_processed_pic_canvas=imagecreatefromjpeg($be_processed_pic_filepath);
					}elseif($be_processed_pic_info['mime']=='image/png'){
						$be_processed_pic_canvas=imagecreatefrompng($be_processed_pic_filepath);
						$is_process_transparent='1';
					}else{
						throw new Exception('$be_processed_pic_filepath is wrong 2'.$be_processed_pic_info['mime']);
					}

						
					$be_processed_pic_canvas_width=imagesx($be_processed_pic_canvas);
					$be_processed_pic_canvas_height=imagesy($be_processed_pic_canvas);
					$be_processed_pic_draw_width = $be_processed_pic_canvas_width;
					$be_processed_pic_draw_height = $be_processed_pic_canvas_height;
					$be_processed_pic_draw_x = 0;
					$be_processed_pic_draw_y = 0;
					
					$output_pic_canvas_width=(int)$about_info['width'];
					$output_pic_canvas_height=(int)$about_info['height'];
					$output_pic_canvas = imagecreatetruecolor( 
						$output_pic_canvas_width, $output_pic_canvas_height
					); 
					if($is_process_transparent=='1'){
						imagealphablending($output_pic_canvas,false);
						imagesavealpha($output_pic_canvas, true);//透明	
						$output_pic_canvas_color = imagecolorallocatealpha($output_pic_canvas, 0, 0, 0, 127);
					}else{
						$output_pic_canvas_color = imagecolorallocate($output_pic_canvas, 255, 255, 255);	
					}
					imagefill($output_pic_canvas, 0, 0, $output_pic_canvas_color);
					
					$output_pic_draw_width=0;
					$output_pic_draw_height=0;
					$output_pic_draw_x=0;
					$output_pic_draw_y=0;
					

					if($be_processed_pic_draw_width <= $output_pic_canvas_width){
						//不縮寬
						if($be_processed_pic_draw_height <= $output_pic_canvas_height){
							//不縮高
							$output_pic_draw_width=$be_processed_pic_draw_width;
							$output_pic_draw_height=$be_processed_pic_draw_height;
							$output_pic_draw_x=($output_pic_canvas_width-$output_pic_draw_width)/2;
							$output_pic_draw_y=($output_pic_canvas_height-$output_pic_draw_height)/2; 
						}else{
							//需縮高
							$output_pic_draw_height=$output_pic_canvas_height;
							$output_pic_draw_width=$output_pic_draw_height*($be_processed_pic_draw_width/$be_processed_pic_draw_height);
							$output_pic_draw_x=($output_pic_canvas_width-$output_pic_draw_width)/2;
							$output_pic_draw_y=0;
						}
						imagecopyresampled(
							$output_pic_canvas,
							$be_processed_pic_canvas,
							$output_pic_draw_x,$output_pic_draw_y,
							$be_processed_pic_draw_x,$be_processed_pic_draw_y,  
							$output_pic_draw_width,$output_pic_draw_height, 
							$be_processed_pic_draw_width, $be_processed_pic_draw_height
						);
					}else{
						//縮寬
						$temp_pic_draw_width=$output_pic_canvas_width;
						$temp_pic_draw_height=$temp_pic_draw_width*($be_processed_pic_draw_height/$be_processed_pic_draw_width);
						$temp_pic_canvas_width=$temp_pic_draw_width;
						$temp_pic_canvas_height=$temp_pic_draw_height;
						$temp_pic_draw_x=0;
						$temp_pic_draw_y=0;
						
						
						$temp_pic_canvas = imagecreatetruecolor( 
							$temp_pic_canvas_width,$temp_pic_canvas_height
						); 
						if($is_process_transparent=='1'){
							imagealphablending($temp_pic_canvas,false);
							imagesavealpha($temp_pic_canvas, true);//透明
						}
						
						imagecopyresampled(
							$temp_pic_canvas,
							$be_processed_pic_canvas,
							$temp_pic_draw_x,$temp_pic_draw_y,
							$be_processed_pic_draw_x,$be_processed_pic_draw_y,  
							$temp_pic_draw_width,$temp_pic_draw_height, 
							$be_processed_pic_draw_width, $be_processed_pic_draw_height
						);
					
						if($temp_pic_draw_height <= $output_pic_canvas_height){
							//不縮高
							$output_pic_draw_width=$temp_pic_draw_width;
							$output_pic_draw_height=$temp_pic_draw_height;
							$output_pic_draw_x=($output_pic_canvas_width-$output_pic_draw_width)/2;
							$output_pic_draw_y=($output_pic_canvas_height-$output_pic_draw_height)/2; 
						}else{
							//縮高
							$output_pic_draw_height=$output_pic_canvas_height;
							$output_pic_draw_width=$output_pic_draw_height*($be_processed_pic_draw_width/$be_processed_pic_draw_height);
							$output_pic_draw_x=($output_pic_canvas_width-$output_pic_draw_width)/2;
							$output_pic_draw_y=0;
						}
					
						
						imagecopyresampled(
							$output_pic_canvas,
							$temp_pic_canvas,
							$output_pic_draw_x,$output_pic_draw_y,
							$temp_pic_draw_x,$temp_pic_draw_y,  
							$output_pic_draw_width,$output_pic_draw_height, 
							$temp_pic_draw_width, $temp_pic_draw_height
						);
						imagedestroy($temp_pic_canvas);
						
					}
					
					imagedestroy($be_processed_pic_canvas);
					myFile::uploadfile_remove($uploadfile_id);
					
					if($be_processed_pic_info['mime']=='image/gif'){
						imagegif(
							$output_pic_canvas,
							$be_processed_pic_filepath
						);
					}elseif($be_processed_pic_info['mime']=='image/jpeg'){
						imagejpeg(
							$output_pic_canvas,
							$be_processed_pic_filepath
						);
					}elseif($be_processed_pic_info['mime']=='image/png'){
						imagepng(
							$output_pic_canvas,
							$be_processed_pic_filepath
						);
					}else{
						imagepng(
							$output_pic_canvas,
							$be_processed_pic_filepath
						);
					}

					
					imagedestroy($output_pic_canvas);

				}
				
			}catch(Exception $ex){
				$return_data['is_success']='0';
				$return_data['develop_message']=$ex->getMessage();
			}
			return $return_data;
		}
		
		#▄▄▄▄▄▄▄▄▄解構函數▄▄▄▄▄▄▄▄▄#
		public function __destruct() {

		}
	}
	
	/**
	 * 常用的處理日期的函式庫
	 */
	class myDatetime {
		/**
		 * 
		 * 建構子
		 * 
		 */
		public function __construct() {
			
		}
		
		 /**
		 * 
		 * 檢查日期時間資料格式 本日期時間程式庫的格式稱為datebigint 
		 * 例：20191208235930 Y(年)m(月)d(日)H(時)i(分)s(秒)   '0'代表空值
		 * @param string $testword 欲轉換之日期數字格式字串 
		 * @param string $which_is_empty 哪個字串代表尚為有日期資料
		 * @return bool
		 * @throws Exception
		 */
		static public function is_check_datebigint($testword) {
			if(myGlobal::is_solid_string($testword)){
			}else{
				throw new Exception('Call ' . __FUNCTION__ . ' fail.Because $testword error');
			}
			

			$returnresult = false;
			$validate_rule='/(^\\d{4}\\d{2}\\d{2}[0-1][0-9][0-5][0-9][0-5][0-9]$)|(^\\d{4}\\d{2}\\d{2}[2][0-3][0-5][0-9][0-5][0-9]$)/Dsu';
			$temp_result=preg_match($validate_rule,$testword);
			if($temp_result===false){
				throw new Exception('Call ' . __FUNCTION__ . ' fail.Because $validate_rule error');
			}elseif($temp_result===1){
				$returnresult=true;
			}

			return $returnresult;
		}
		
		 /**
		 * 
		 * 將日期數字格式字串(20141207063300) 轉為 自定義的日期格式字串
		 *
		 * @param string $datebigint 欲轉換之日期數字格式字串
		 * @param string $the_format 
		 * @param string $emptystring 若$datebigint為空 則呈現該字串
		 * @return array
		 * @throws Exception
		 */
		static public function datebigint_formattedstring($datebigint, $the_format, $emptystring = '') {
			if(self::is_check_datebigint($datebigint) || $datebigint==='0' ){

			}else{
				throw new Exception('Call ' . __FUNCTION__ . ' fail.Because $datebigint error');
			}
			
			if(myGlobal::is_solid_string($the_format)){
			}else{
				throw new Exception('Call ' . __FUNCTION__ . ' fail.Because $the_format error');
			}

			if(is_string($emptystring)){
			}else{
				throw new Exception('Call ' . __FUNCTION__ . ' fail.Because $emptystring error');
			}

			$returnstring = $emptystring;
			if ($datebigint !== '0') {
				sscanf($datebigint, '%4s%2s%2s%2s%2s%2s', $year, $month, $day, $hour, $minute, $second);

				$returnstring = str_replace(
					array('Y', 'm', 'd', 'H', 'i', 's'), array($year, $month, $day, $hour, $minute, $second), $the_format
				);
			}
			return $returnstring;
		}

		 /**
		 * 
		 * 解析 日期數字格式字串(20141207063300) 
		 *
		 * @param string $datebigint 欲轉換之日期數字格式字串
		 * @return array 索引為year,month,day,hour,minute,second
		 * @throws Exception
		 */
		static public function datebigint_parse($datebigint) {
			if(self::is_check_datebigint($datebigint)){

			}else{
				throw new Exception('Call ' . __FUNCTION__ . ' fail.Because $datebigint error');
			}
			$return_array=array();
			
			sscanf($datebigint, '%4s%2s%2s%2s%2s%2s', $year, $month, $day, $hour, $minute, $second);
			if($day && $day!='00' ){
			
			}else{
				$day=1;
			}
			$the_timestamp=mktime((int)$hour,(int)$minute,(int)$second,(int)$month,(int)$day,(int)$year);
			$the_same_month_first_day_timestamp=mktime(0,0,0,(int)$month,1,(int)$year);
			$return_array['Y']=$year;
			$return_array['m']=$month;
			$return_array['d']=$day;
			$return_array['H']=$hour;
			$return_array['i']=$minute;
			$return_array['s']=$day;
			$return_array['M']=date('M',$the_timestamp);
			$return_array['t']=date('t',$the_timestamp);
			$return_array['same_month_first_day_w']=date('w',$the_same_month_first_day_timestamp);
			
			 return $return_array;
		}

	   /**
		 * 
		 * 解構子
		 *
		 */
		public function __destruct() {
			//釋放成員
		}

	}
	
	/**
	* 確保從前端傳來的資料是最原始的資料
	*/
	function v1_get_raw_gpc($gpcdata) {
		$ResultString='';
		
		if(get_magic_quotes_gpc()){
		
			$ResultString=preg_replace('/'.BSLASH.'x{005c}(['.SQUOTES.DQUOTES.BSLASH.'x{005c}])/','${1}',$gpcdata);
		}else{
		
			$ResultString=$gpcdata;
		}
		return $ResultString;
	
	}
	
	/**
	* 確保字串在sql字串裡就是單純的字串，不會干擾sql的正常運作
	* 為了讓執行sql時有更多的彈性，於是自行組合sql，然後送交執行。
	* 自行組合sql，須考慮到sql injection的問題
	* 舉例:
	* $the_sql="SELECT product_name,product_desc FROM product ".
	* "WHERE product_id='.v1_escape_for_sql($_GET['id']).'";
	*/
	function v1_escape_for_sql($neverprocess) {	
		$ResultString='';
		
		$ResultString=preg_replace(
			array('/`/i','/´/i'),
			array(SQUOTES,SQUOTES),
			$neverprocess
		);
		
		$ResultString=preg_replace(
			array('/--/i'),
			array(''),
			$ResultString
		);
		
		
		$ResultString=preg_replace(
			array('/'.SQUOTES.'/i'),
			array(BSLASH.SQUOTES),
			$ResultString
		);
		
		
		return $ResultString;
	}
	
	/**
	* 確保字串在html裡就是單純的字串，不會干擾瀏覽器的正常運作
	*/
	function v1_escape_for_html($strInput) {
		$ResultString=htmlspecialchars($strInput,ENT_QUOTES);
		return $ResultString;
	}
	
	/**
	* 確保html裡沒有非法的腳本語法
	*/
	function v1_escape_for_xss($strInput) {
		$ResultString='';
		$ResultString=preg_replace(
			array('/<script>/i','/<\\/script>/i'),
			array('&lt;script&gt;','&lt;/script&gt;'),
			$strInput
		);
		$ResultString=preg_replace(
			array('/javascript:/i','/vbscript:/i'),
			array('javascript：','vbscript：'),
			$ResultString
		);
		return $ResultString;
	}
	
	/**
	 * 確保client端傳過來得資料，不會干擾網站正常的運行
	 * 
	 * 在我的架構裡，是資料存到資料庫前，就會做相關資安的處理。
	 * 而不是日後，從資料庫抓出資料，要顯示前，在做資安的處理。
	 * 
	 */
	function v1_process_external_data($thestring,$ispure=true) {
		$ResultString=trim($thestring);
		
		$ResultString=v1_get_raw_gpc($ResultString);
		
		if($ispure){
			$ResultString=v1_escape_for_html($ResultString);
			$ResultString=str_replace(array("\r\n","\n"),"<br />",$ResultString);
		}else{
			$ResultString=v1_escape_for_xss($ResultString);
		}
		$ResultString=v1_escape_for_sql($ResultString);
		$ResultString=preg_replace(
			array('/[\\x{0000}-\\x{001f}]/Dsu','/[\\x{007f}]/Dsu'),
			array(''),
			$ResultString
		);
		return $ResultString;
	}
?>