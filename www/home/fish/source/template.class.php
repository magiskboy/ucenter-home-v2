<?php

/**
 * Tiêu bản lớp hành động
 * Create by seaif@zealv.com
 */

class STemplate {
	private static $instance = null;
	private $force; //Biên dịch bắt buộc
	private $cplDir; //Xây dựng con đường
	private $tplId; //Tiêu bản hiện tại
	private $tplDir; //Tiêu bản nguồn con đường
	private $tplBak; //Thay thế mẫu con đường
	private $RelPath; //Hãy là đường dẫn tương đối để hoàn thành
	private $LangPack; //Gói ngôn ngữ quốc tế
	/**
	 * Hình thức lối đi riêng
	 */
	public static function getInstance($args = array()) {
		if(self::$instance == null) {
			$className = __class__;
			self::$instance = new $className($args);
		}
		return self::$instance;
	}
	/**
	 * Thi công
	 */
	private function __construct($myCFG) {
		//Kết hợp bên ngoài các thông số
		$defCFG = array(
			'force' => false,
			'cplDir' => 'cpl/',
			'tplId' => 'zealv',
			'tplDir' => 'tpl/',
			'tplBak' => 'tpl/default/',
			'RelPath' => array('images/'),
			'LangPack' => array()
		);
		$CFG = array_merge($defCFG, array_intersect_key($myCFG, $defCFG));
		//Bắt đầu của sự tham gia đầu tiên của nội bộ
		foreach($CFG as $key => $val)
			$this->$key = $val;
		$this->langName = $this->LangPack ? array_shift($this->LangPack) : 0;
		//Sửa đổi các bản mẫu và xây dựng con đường
		$this->tplDir .= $CFG['tplId'] . '/';
		$this->cplDir .= $CFG['tplId'] . '_' . ($this->langName ? $this->langName . '_' : '');
	}
	/**
	 * Tải biên soạn các mẫu hoặc quay trở lại con đường của mình
	 * @param string $name Nguồn Tiêu bản Tên
	 * @param string $cName Biên soạn mẫu tên
	 * @param array  $vars Bảng biến được nhập khẩu
	 */
	public function show($name, $cName = '', $vars = array()) {
		$cplFile = $this->getCFile($name, $cName, $vars);
		if($cplFile) {
			extract($GLOBALS, EXTR_SKIP);
			extract($vars, EXTR_OVERWRITE);
			include $cplFile;
			return true;
		} else
			return false;
	}
	/**
	 * Quay trở lại con đường đã được biên dịch mẫu
	 * @param string $name Nguồn Tiêu bản Tên
	 * @param string $cName Biên soạn mẫu tên
	 * @param array  $vars Bảng biến được nhập khẩu
	 */
	public function getCFile($name, $cName = '', $vars = array()) {
		if($tplFile = $this->getTFile($name)) {
			$cName = $cName ? $cName : $name;
			$cplFile = $this->cplDir . str_replace('/', '_', $cName) . '.php';
			if($this->force || !is_file($cplFile) || filemtime($cplFile) < filemtime($tplFile)) {
				$this->vars = $vars; //Bảng biến được nhập khẩu
				$content = file_get_contents($tplFile);
				$content = $this->compile($content);
				file_put_contents($cplFile, $content);
			}
			return $cplFile;
		} else
			return '';
	}
	/**
	 * Quay lại nguồn tiêu bản con đường
	 * @param string $name Nguồn Tiêu bản Tên
	 */
	private function getTFile($name) {
		$tplFile = $this->tplDir . $name . '.htm';
		if(!file_exists($tplFile)) {
			$tplFile = $this->tplBak . $name . '.htm';
			if(!file_exists($tplFile)) return '';
		}
		return $tplFile;
	}
	/**
	 * Biên soạn nội dung mẫu
	 * @param string $content Tiêu bản Nội dung
	 */
	private function compile($content) {
		//Bảng biến nhập khẩu
		extract($GLOBALS, EXTR_SKIP);
		extract($this->vars, EXTR_OVERWRITE);
		//Hoàn thành đường dẫn tương đối
		foreach($this->RelPath as $rep) {
			if($rep = trim($rep)) {
				if(substr($rep, -1) != '/') $rep .= '/';
				$content = str_replace($rep, $this->tplDir . $rep, $content);
			}
		}
		//Thay thế các mẫu thẻ
		$content = preg_replace(
			array(
				'/<\?php.*\?>/iUs',
				'/(\{|<!--\{):(.+)(\}-->|\})/iU',
				'/(\{|<!--\{)(if|for|foreach)\s(.+)(\}-->|\})/iU',
				'/(\{|<!--\{)elseif(.+)(\}-->|\})/iU',
				'/(\{|<!--\{)else(\}-->|\})/iU',
				'/(\{|<!--\{)\/(if|for|foreach)(\}-->|\})/iU',
				'/(\{|<!--\{)php\s(.+)(\}-->|\})/iUs',
				'/(\{|<!--\{)tpl\s(.+)(\}-->|\})/iUe',
				'/(\{|<!--\{)lang\s(.+)(\}-->|\})/iUe'
			),
			array(
				'', //Bỏ qua các mã PHP gốc
				'<?php echo \\2; ?>', //Xuất khẩu
				'<?php \\2(\\3) { ?>', //Bắt đầu Logic
				'<?php } elseif(\\2) { ?>', //Logic
				'<?php } else { ?>', //Logic
				'<?php } ?>', //Hợp lý kết thúc
				'<?php \\2 ?>', //PHP code thực hiện
				'$this->_cpl("\\2")', //Nested mẫu
				'$this->_lang("\\2")' //Ngôn ngữ Tags
			), 
			$content
		);
		//Xóa dòng trống và đường không gian đầu tiên
		$content = preg_replace('/^([\r\n])\s*/', '', $content);
		$content = preg_replace('/([\r\n])\s*/', '\\1', $content);
		return $content;
	}
	/**
	 * Xử lý các mẫu lồng nhau
	 */
	private function _cpl($name) {
		if($tplFile = $this->getTFile($name)) {
			$content = file_get_contents($tplFile);
			$content = $this->compile($content);
			return "\n{$content}\n";
		}
		return $name;
	}
	/**
	 * Thay thế các thẻ ngôn ngữ
	 */
	private function _lang($word) {
		if(array_key_exists($word, $this->LangPack)) {
			$word = $this->LangPack[$word];
		}
		return $word;
	}
}

?>