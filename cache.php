<?php
class Cache { 
    
	private $expire = 86400; 
   
    function get($key) {
        $data = apc_fetch($key);
        if($data) {
			return $data;
		} else {
			return null;	
		}
    }

    function set($key, $value) {
        $this->delete($key);
			apc_store($key, $value, $this->expire);
		}

    public function delete($key) {
        if(apc_fetch($key)) {
			apc_delete($key);
		}
	 }
}
?>
