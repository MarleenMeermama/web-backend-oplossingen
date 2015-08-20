<?php 

	class Percent {

		public $absolute;
		public $relative;
		public $hundred;
		public $nominal;


		public function __construct($new, $unit)
			{
				$this->absolute =  $this->formatNumber($new / $unit);
				$this->relative = $this->absolute - 1;
				$this->hundred = $this->absolute * 100;
				$this->nominal = 'status-quo';
				if ($this->absolute > 1){
					$this->nominal = 'positive';
				}else if($this->absolute < 1){
					$this->nominal = 'negative';
				}else{
					$this->nominal = 'status-quo';
				}

			}

		public function formatNumber($number){

			return number_format($number, 2,'.','');
		}
	}
 
?>	