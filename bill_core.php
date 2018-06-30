<?php
	//網站根目錄實體路徑,是BillCore.php所在位置，作撰寫(視本檔所在位置做變動)
	define('ProjectRootDisk', dirname(dirname(__FILE__))."/");
	//網站根目錄URL路徑(視環境做變動)
	//define('ProjectRootUrl',"http://demo.artie.com.tw/tangao.com.tw/beta/");
	
	define("BSLASH","\\");
	define("SQUOTES","'");
	define("DQUOTES","\""); 
	/**
	 *
	 * 
	 * 全域PHP元件
	 * 
	 * 引入PHP元件前,必先引入全域PHP元件
	 *
	 * @category
	 *   
	 * @package myGlobal
	 * @license   
	 * @example  
	 * @example <br />
	 *  <br />
	 *  <br />
	 *  <br />
	 *  <br />
	 * @version  0.01
	 * @since 2014-12-07
	 * @author Bill Liu <o7z3149o0@hotmail.com>
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
		 * 檢查輸入的值是否為有長度字串 
		 *
		 * @param mixed $checked_var 要檢查的變數
		 * @return bool
		 * @throws Exception
		 * @todo 
		 * @since 2014-12-07
		 * @author Bill Liu <o7z3149o0@hotmail.com>
		 */
		static public function is_non_empty_string($checked_var) {
			if (gettype($checked_var) !== 'string') {
				return false;
			}
			if ($checked_var === '') {
				return false;
			}
			return true;
		}
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
		 * @todo 
		 * @since 2014-12-07
		 * @author Bill Liu <o7z3149o0@hotmail.com>
		 */
		static public function is_non_empty_array($checked_var) {
			if (gettype($checked_var) !== 'array') {
				return false;
			}
			if (count($checked_var) === 0) {
				return false;
			}
			return true;
		}
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
		 * @todo 
		 * @since 2014-12-07
		 * @author Bill Liu <o7z3149o0@hotmail.com>
		 */
		static public function is_non_empty_number($checked_var) {
			if (gettype($checked_var) !== 'double' && gettype($checked_var) !== 'integer') {
				return false;
			}
			return true;
		}
		static public function is_solid_number($checked_var) {
			return self::is_non_empty_number($checked_var);
		}
		/**
		 * 
		 * 產生隨意字串
		 *
		 * @param int $wordlength 輸出長度
		 * @param bool $is_number 是否允許數字出現
		 * @return string
		 * @throws Exception
		 * @todo 
		 * @since 2014-12-07
		 * @author Bill Liu <o7z3149o0@hotmail.com>
		 */
		static public function random_word($wordlength, $is_number = false) {

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
		 * 檢查輸入的字串是否以xxx字串開頭
		 *
		 * @param string $subword xxx字串
		 * @param string $testword 被檢查的字串
		 * @return bool
		 * @throws Exception
		 * @todo 
		 * @since 2014-12-07
		 * @author Bill Liu <o7z3149o0@hotmail.com>
		 */
		static public function is_start_with($subword, $testword) {
			if (preg_match('/^' . preg_quote($subword, '/') . '/Dsu', $testword) == 0) {
				return false;
			} else {
				return true;
			}
		}

		/**
		 * 
		 * 檢查輸入的字串是否以xxx字串結尾
		 *
		 * @param string $subword xxx字串
		 * @param string $testword 被檢查的字串
		 * @return bool
		 * @throws Exception
		 * @todo 
		 * @since 2014-12-07
		 * @author Bill Liu <o7z3149o0@hotmail.com>
		 */
		static public function is_end_with($subword, $testword) {
			if (preg_match('/' . preg_quote($subword, '/') . '$/Dsu', $testword) == 0) {
				return false;
			} else {
				return true;
			}
		}
		/**
		 * 
		 * 檢查是否包含子字串
		 *
		 * @param string $subword xxx字串
		 * @param string $testword 被檢查的字串
		 * @return bool
		 * @throws Exception
		 * @todo 
		 * @since 2016-05-10
		 * @author Bill Liu <o7z3149o0@hotmail.com>
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
		 * @todo 
		 * @since 2014-12-07
		 * @author Bill Liu <o7z3149o0@hotmail.com>
		 */
		static public function get_start_subword($charscount, $sourceword) {
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
		 * @todo 
		 * @since 2014-12-07
		 * @author Bill Liu <o7z3149o0@hotmail.com>
		 */
		static public function get_end_subword($charscount, $sourceword) {

			return substr($sourceword, -1 * $charscount);
		}
		
		/**
		 * 
		 * 取得字串的第n1至第n2個字元
		 *
		 * @param int $first_nth
		 * @param int $second_nth	 
		 * @param string $sourceword 來源字串
		 * @return string
		 * @throws Exception
		 * @todo 
		 * @since 2014-12-07
		 * @author Bill Liu <o7z3149o0@hotmail.com>
		 */
		static public function get_start_end_subword($first_nth,$second_nth,$sourceword) {
			$return_string=@substr($sourceword, $first_nth-1,$second_nth-$first_nth+1);
			$return_string=(string)$return_string;
			return $return_string;
		}
		
		/**
		 * 
		 * 將繁體中文字串轉為簡體中文字串
		 *
		 * @param string $zh_string 來源字串
		 * @return string
		 * @throws Exception
		 * @todo 
		 * @since 2014-12-07
		 * @author Bill Liu <o7z3149o0@hotmail.com>
		 */
		static public function transform_zh_to_cn($zh_string) {
			return iconv("gb2312", "UTF-8", iconv("BIG5", "gb2312", iconv("UTF-8", "BIG5", $zh_string)));
		}

		/**
		 * 
		 * 設定url的query string
		 *
		 * @param string $the_url 
		 * @param array $updated_params
		 * @return string
		 * @throws Exception
		 * @todo 
		 * @since 2014-12-07
		 * @author Bill Liu <o7z3149o0@hotmail.com>
		 */
		static public function set_url_params($the_url, $updated_params) {
			$result_string = '';
			if (self::is_non_empty_string($the_url) && is_array($updated_params)) {
				
			} else {
				return $result_string;
			}
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
						foreach ($overwrite_param as $param_name => $param_value) {
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
		 * 取得url的params
		 *
		 * @param string $the_url 
		 * @return Array
		 * @throws Exception
		 * @todo 
		 * @since 2015-10-25
		 * @author Bill Liu <bill@artiegroup.com.tw>
		 */
		static public function get_url_params($the_url) {
			$result_array = array();
			if (self::is_non_empty_string($the_url)) {
				
			} else {
				return $result_array;
			}
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
		 * @todo 
		 * @since 2014-12-07
		 * @author Bill Liu <o7z3149o0@hotmail.com>
		 */
		static public function two_dimension_array_merge($the_first_array, $the_second_array) {
			if (
					self::is_non_empty_array($the_first_array) &&
					self::is_non_empty_array($the_second_array)
			) {
				
			} else {
				throw new Exception('param error');
			}
			$result_array = array();

			foreach ($the_second_array as $array_key => $array_value) {
				if (is_array($array_value) === false) {
					throw new Exception('param error');
				}

				if (array_key_exists($array_key, $the_first_array)) {
					if ($the_first_array[$array_key] === false) {
						throw new Exception('param error');
					}
					$result_array[$array_key] = array_merge($the_first_array[$array_key], $array_value);
				} else {
					$result_array[$array_key] = $array_value;
				}
			}
			foreach ($the_first_array as $array_key => $array_value) {
				if (is_array($array_value) === false) {
					throw new Exception('param error');
				}

				if (array_key_exists($array_key, $result_array)) {
					continue;
				} else {
					$result_array[$array_key] = $array_value;
				}
			}
			return $result_array;
		}

	   
		
		static public function fetch_specific_string($source_string,$start_string,$end_string)
		{
			if(is_string($source_string)===false){
				alert('source_string argument error');
				return;
			}
			if(is_string($start_string)===false){
				alert('start_string argument error');
				return;
			}
			if(is_string($end_string)===false){
				alert('end_string argument error');
				return;
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
		
		static public function remove_start_string($source_string,$start_string)
		{
			if(is_string($source_string)===false){
				alert('source_string argument error');
				return;
			}
			if(is_string($start_string)===false){
				alert('start_string argument error');
				return;
			}
		
			$start_string=preg_replace('/^'.preg_quote($start_string,'/').'/Dsu','',$source_string);
			return $start_string;
		}
		
		static public function remove_end_string($source_string,$end_string)
		{
			if(is_string($source_string)===false){
				alert('source_string argument error');
				return;
			}
			if(is_string($end_string)===false){
				alert('end_string argument error');
				return;
			}
		
			$end_string=preg_replace('/'.preg_quote($end_string,'/').'$/Dsu','',$source_string);
			return $end_string;
		}
		
		/**
		 * 
		 * 偵測網頁瀏覽者之環境
		 *
		 * @return array
		 * @throws Exception
		 * @todo 
		 * @since 2014-12-07
		 * @author Bill Liu <o7z3149o0@hotmail.com>
		 */
		static public function parse_http_user_agent() {
			//若device不為空字串 代表裝置是手機
		   $return_data=array(
				'device'=>'',
				'browser_type'=>'',
				'browser_version'=>''
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
		
		static public function ensure_string($checked_var) {
			if (isset($checked_var)===false){
				 return '';
			}
			
			if (gettype($checked_var) !== 'string') {
				return '';
			}
		   
			return $checked_var;
		}
		
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
		
		/*
		
		*/
		
		/**
		 * 
		 * 解構子
		 *
		 */
		public function __destruct() {
			//釋放成員
		}

	}



	#檔案管理函式
	class myFile
	{
	  

		#▄▄▄▄▄▄▄▄▄建構函數▄▄▄▄▄▄▄▄▄ #
		public function __construct() {

		}    
		#▄▄▄▄▄▄▄▄▄▄▄▄▄▄▄▄ 檢測本次所POST的資料是否超過伺服器限制 ▄▄▄▄▄▄▄▄▄▄▄▄▄▄▄▄▄▄'
		#說明:輸入檔案路徑
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
		
		#▄▄▄▄▄▄▄▄▄▄▄▄▄▄▄▄ 判斷檔案是否存在 ▄▄▄▄▄▄▄▄▄▄▄▄▄▄▄▄▄▄'
		#說明:輸入檔案路徑
		static public function is_file_exist($file_path)
		{	
			if($fp = @fopen($file_path, "rb")){
				fclose($fp);
				return true;
			}else{
				return false;
			}		
		
		}
		
		#▄▄▄▄▄▄▄▄▄▄▄▄▄▄▄▄ 計算檔案大小 ▄▄▄▄▄▄▄▄▄▄▄▄▄▄▄▄▄▄'
		#在windows下，filesize函式失效，故以此函式替代
		#說明:knowfilesize(file路徑)，反回的大小單位為byte
		static public function knowfilesize($file_path){
			
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
		
		#▄▄▄▄▄▄▄▄▄▄▄▄▄▄▄▄ 下載檔案 ▄▄▄▄▄▄▄▄▄▄▄▄▄▄▄▄▄▄'
		#下載檔案時,直接下載不開啟檔案
		#說明:uploadfile_download(上傳檔案id,顯示用下載檔名)
		#上傳檔案id 相對於專案根磁碟路徑的路徑
		static public function uploadfile_download($uploadfile_id,$custom_name='') {
		
			if(myGlobal::is_non_empty_string($uploadfile_id)){
			}else{
				throw new Exception("error");
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
		#▄▄▄▄▄▄▄▄▄▄▄▄▄▄▄▄ ▄▄▄▄▄▄▄▄▄▄▄▄▄▄▄▄▄▄'
		#解析上載的檔案
		#說明:在有上傳檔案的網頁 這個函式一定會先執行
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
		
		#▄▄▄▄▄▄▄▄▄▄▄▄▄▄▄▄ ▄▄▄▄▄▄▄▄▄▄▄▄▄▄▄▄▄▄'
		#
		#說明:
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
			if(is_dir(ProjectRootDisk.'ej03xu3/update/'.$file_settings['uploaddir'])){
			
			}else{
				
				return ProjectRootDisk.'ej03xu3/update/'.$file_settings['uploaddir'].' is not exist';
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
		
		#▄▄▄▄▄▄▄▄▄▄▄▄▄▄▄▄ ▄▄▄▄▄▄▄▄▄▄▄▄▄▄▄▄▄▄'
		#
		#說明:
		static public function uploadfile_rename($uploadfile_id,$to_name,$is_have_log=false,$is_overwrite=true,$connkey='conn1'){
			$file_attrs=array();
			if(myGlobal::is_non_empty_string($uploadfile_id)){
			
			}else{
				throw new Exception('$uploadfile_id param error');
			}
			
			if(myGlobal::is_non_empty_string($to_name)){
			
			}else{
				throw new Exception('$to_name param error');
			}
			
			if(self::uploadfile_isexist($uploadfile_id)){
			
			}else{
				
				throw new Exception(ProjectRootDisk.$uploadfile_id.' is not exist');
			}
			
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
			
			//處理檔案
			if($is_have_log){
				$update_columns=array(
					'uploadfile_id'=>$new_uploadfile_id
				);
				
				try{
					myDataHelper::v1_updatedr('uploadfile',$update_columns,"WHERE uploadfile_id='{$uploadfile_id}'",$connkey);
				}catch(Exception $ee){
					throw $ee;
					//die(myDataHelper::$lastsql);
				}
			}
		
			return $file_attrs;
		}
		static public function uploadfile_move($source_uploadfile_id,$destination_uploadfile_id,$is_have_log=true,$is_overwrite=false,$connkey='conn1'){
			$file_attrs=array();
			if(myGlobal::is_non_empty_string($source_uploadfile_id)){
			
			}else{
				return false;
			}
			
			if(myGlobal::is_non_empty_string($destination_uploadfile_id)){
			
			}else{
				return false;
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
		
			
			//處理檔案
			if($is_have_log){
				$updated_row=array(
					'uploadfile_id'=>$destination_uploadfile_id
				);
				
				try{
					myDataHelper::v1_updatedr('uploadfile',$updated_row,"WHERE uploadfile_id='{$source_uploadfile_id}'",$connkey);
				}catch(Exception $ee){
					throw $ee;
					//die(myDataHelper::$lastsql);
				}
			}
		
			return true;
		}
		
		static public function uploadfile_remove($uploadfile_id,$connkey='conn1'){
			if(myGlobal::is_non_empty_string($uploadfile_id)){
			
			}else{
				return true;
			}
			
			$diskfilepath=self::uploadfile_getdiskpath($uploadfile_id);
			if(self::is_file_exist($diskfilepath)){
			
			}else{
				return false;
			}
			
		
			return @unlink($diskfilepath);
				
		}
		static public function uploadfile_view($uploadfile_id,$connkey='conn1'){
			$return_data=array();
			if(myGlobal::is_non_empty_string($uploadfile_id)){
			
			}else{
				return $return_data;
			}
			$uploadfile_id=myDataHelper::v1_escape_for_sql($uploadfile_id);
			$strsql		= 
			"SELECT * FROM uploadfile ".
			"WHERE uploadfile_id='{$uploadfile_id}';";
			$return_data=myDataHelper::v1_getrow($strsql,$connkey);

			return $return_data;
		}
		static public function uploadfile_isexist($uploadfile_id,$is_have_log=false,$connkey='conn1'){
			$is_exist=false;
			if($uploadfile_id){
			}else{
				return $is_exist;
			}
			
			if(self::is_file_exist(self::uploadfile_getdiskpath($uploadfile_id))){
			}else{
				return $is_exist;
			}
			
			if($is_have_log){
				$uploadfile_id=myDataHelper::v1_escape_for_sql($uploadfile_id);
				$strsql		= 
				"SELECT COUNT(uploadfile_id) FROM uploadfile ".
				"WHERE uploadfile_id='{$uploadfile_id}';";
				$colval=myDataHelper::v1_getcolval($strsql,$connkey);
				
				if((int)$colval>0){
				}else{
					return $is_exist;
				}
			}
			
			$is_exist=true;
			return $is_exist;
		}
		
		//檔案計算單位byte
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
		static public function v1_convert_from_bytenum($num,$tounit){
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
		
		static public function uploadfile_getdiskpath($uploadfile_id){
			$diskpath='';
			if($uploadfile_id==''){
				return $diskpath;
			}
			$diskpath=ProjectRootDisk.$uploadfile_id;
			
			return $diskpath;
			 
		}

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
		
		static public function get_file_extension($file_name){
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
		static public function get_remote_file($fileurl){
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
		static public function get_security_filename($filename,$is_have_dir=false){
			$return_data='';
			if(myGlobal::is_solid_string($filename)){
			
			}else{
				return $return_data;
			}
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
			$temp_file_part=preg_replace('/[^A-Za-z0-9_]/', '_',$temp_file_part);
			return $temp_file_part;
		}
		/*
			$params['dir_name']
			$params['main_name_prefix']
			$params['main_name']
			$params['main_name_suffix']
			$params['extension']
			
		*/
		static public function get_new_filename($filename,$params=array()){
			$return_data='';
			if(myGlobal::is_solid_string($filename)){
			
			}else{
				return $return_data;
			}
			
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
	
	
	class myImage{


		#▄▄▄▄▄▄▄▄▄建構函數▄▄▄▄▄▄▄▄▄ #
		public function __construct() {

		}

		#▄▄▄▄▄▄▄▄▄▄▄▄▄▄▄▄▄讀取BMP圖檔，輸出資源 ▄▄▄▄▄▄▄▄▄▄▄▄▄▄▄▄▄▄
		#EX:imagecreatefrombmp(來源圖檔路徑)，傳回值為 資源 或 FALSE   
		static function imagecreatefrombmp($filename) { 
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
		
		
		 
		#▄▄▄▄▄▄▄▄▄▄▄▄▄▄▄▄▄壓縮圖片 ▄▄▄▄▄▄▄▄▄▄▄▄▄▄▄▄▄▄
		#EX:easy_process_compression，傳回值為資訊陣列
		#params['position'] params['coordinate']
		
		static function easy_process_compression($uploadfile_id,$about_info=array(),$type='') { 
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
			 * 將日期數字格式字串(20141207063300) 轉為 自定義的日期格式字串
			 *
			 * @param string $datebigint 欲轉換之日期數字格式字串
			 * @param string $the_format 
			 * @param string $emptystring 若$datebigint為空 則呈現該字串
			 * @return array
			 * @throws Exception
			 * @todo 
			 * @since 2014-12-07
			 * @author Bill Liu <o7z3149o0@hotmail.com>
			 */
			static public function datebigint_formattedstring($datebigint, $the_format, $emptystring = '') {
				$returnstring = $emptystring;
				if (myGlobal::is_non_empty_string($datebigint) && $datebigint !== '0') {
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
			 * @todo 
			 * @since 2014-12-07
			 * @author Bill Liu <o7z3149o0@hotmail.com>
			 */
			static public function datebigint_parse($datebigint) {
				$return_array=array();
				if (myGlobal::is_non_empty_string($datebigint)) {
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
				}
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
	function v1_get_raw_gpc($gpcdata) {
		$ResultString='';
		
		if(get_magic_quotes_gpc()){
		
			$ResultString=preg_replace('/'.BSLASH.'x{005c}(['.SQUOTES.DQUOTES.BSLASH.'x{005c}])/','${1}',$gpcdata);
		}else{
		
			$ResultString=$gpcdata;
		}
		return $ResultString;
	
	}
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
		
		$tmpresult= mysql_real_escape_string($neverprocess);
		
		if($tmpresult){
		}else{
			$ResultString=preg_replace(
				array('/'.SQUOTES.'/i'),
				array(BSLASH.SQUOTES),
				$ResultString
			);
		}
		
		return $ResultString;
	}
	function v1_escape_for_html($strInput) {
		$ResultString=htmlspecialchars($strInput,ENT_QUOTES);
		return $ResultString;
	}
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
	
	//$ispure 在網頁呈現時 資料是否為單純文字
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