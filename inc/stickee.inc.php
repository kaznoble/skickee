<?php

class Stickee {

public $widget_pack = [250,500,1000,2000,5000];
public $set_widget = [];
public $count = 0;

	function func_widget_closest($widget, $widgetPacks) {
		$this->widget_pack;
		if(!empty($widgetPacks))
			$this->widget_pack = explode(',', $widgetPacks);
		$closest = null;
		
		foreach($this->widget_pack As $wid)
		{
			if ($closest === null || abs($widget - $closest) > abs($wid - $widget))	
			{
				$closest = $wid;
			}
		}
		return $closest;
	}

	function func_widget($widget, $vWidgetPacks) {
		//global $widget_pack, $set_widget, $count;
		$widget_closest = $this->func_widget_closest($widget, $vWidgetPacks);
		$set_widget[$this->count] = $widget_closest;
		
		if($widget_closest < $widget)
		{
			$widget_less = $widget - $widget_closest;
			while($widget_closest > 0 && $widget_less > 0)
			{
				$this->count++;
				$widget_closest = $this->func_widget_closest($widget_less, $vWidgetPacks);
				$set_widget[$this->count] = $widget_closest;
				$widget_less = $widget_less - $widget_closest;
			}		
		}
		
		$widget_arr = array_count_values($set_widget);
		foreach($widget_arr As $wid_pack => $wid_arr)
		{
			if($wid_arr > 1)
			{
				$wid_tot = $wid_pack * $wid_arr;
				if(in_array($wid_tot, $this->widget_pack))
				{
					$wid_arr_count = $wid_arr;
					while($wid_arr_count >= 0)
					{	
						if (($key = array_search($wid_pack, $set_widget)) !== false) {
							unset($set_widget[$key]);
						}
						$wid_arr_count--;
					}
					array_push($set_widget,$wid_tot);
				}
			}
		}
		
		rsort($set_widget);
		$html = '';
		foreach($set_widget As $packs)
		{
			$html .= $packs . '<br />';
		}
		return $html;
	}
}