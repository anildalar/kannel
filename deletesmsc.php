<?php 
	if( !empty($_GET['smsc'])){
		
		$smsc =  $_GET['smsc'];
		$smsc1='./smsc.conf';
		$smsc2='./smsc2.conf';
		
		copy($smsc1,$smsc2);
		//unlink($smsc1);
		
		$smsc2file = fopen($smsc2, "r");
		
		$smsc1file = fopen($smsc1, "w+");
		
		
		//Output lines until EOF is reached
		$found = false;
		while(! feof($smsc2file)) {
			
			$line = fgets($smsc2file);
			$d = explode('=',$line);
			//echo $d[0];
			if($d[0] == 'smsc-id'){
				if(trim($d[1]) == $smsc ){
					$found = true;
				}else{
					$found = false;
				}
			}
			//echo $found;
			if($found == false){
				fwrite($smsc1file,$line);
			}		  
		}
		fclose($smsc2file);
		fclose($smsc1file);
		
		unlink($smsc2);
	}
	
	
	
	

?>
<?php 
/*
group=smsc
smsc=smpp
smsc-id=DOLLOR1
host=
port=
smsc-username=
smsc-password=
transceiver-mode=true
system-type=
service-type=
interface-version=
throughput=
address-range=
source-addr-ton=
source-addr-npi=
dest-addr-ton=
dest-addr-npi=
allowed-smsc-id=
enquire-link-interval=
ssl-client-certkey-file=
use-ssl=
my-number=
receive-port=
max-pending-submits=
reconnect-delay=
source-addr-autodetect=
bind-addr-ton=
bind-addr-npi=
msg-id-type=
alt-charset=
alt-addr-charset=
connection-timeout=0
wait-ack=
wait-ack-expire=
validityperiod=
esm-class=
log-format=



*/