<?php
defined('_JEXEC') or die;

abstract class TSFilter {
	static function nosingleletter($string) {
		$string = str_replace("<br />", " <br />", $string);
		$str_array = explode(chr(32), $string);
		$count_str = count($str_array);
		$out_str = "";
		$zablokuj = 0;
		
		for($i = 0; $i < $count_str; $i++) {
			$pom = $str_array[$i];
			if ($pom == '<script' || $pom == 'JavaScript.</span><script') $zablokuj = 1;
			if ($pom == '</script>') $zablokuj = 0;
			if (strlen($pom) == 1 && $zablokuj == 0) {
				$out_str = $out_str.$pom."&nbsp;";
			}
			else {
				$out_str = $out_str.$pom." ";
			}
		}
		
		return $out_str;
	}
}
?>
