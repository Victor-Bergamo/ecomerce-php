<?php
	
	
	function FormatarValor($preco){
		unset($real,$real1,$real2,$centavos,$valor_formatado);
		$c=strlen($preco);
			if($c==3){
				unset($real,$real1,$real2,$centavos);
				$real=substr($preco,0,1);
				$centavos=substr($preco,1,2);
				$valor_formatado="R$ ".$real.",".$centavos;
			}
			if($c==4){
				unset($real,$real1,$real2,$centavos);
				$real=substr($preco,0,2);
				$centavos=substr($preco,2,2);
				$valor_formatado="R$ ".$real.",".$centavos;
			}
			if($c==5){
				unset($real,$real1,$real2,$centavos);
				$real=substr($preco,0,3);
				$centavos=substr($preco,3,2);
				$valor_formatado="R$ ".$real.",".$centavos;
			}
			if($c==6){
				unset($real,$real1,$real2,$centavos);
				$real1=substr($preco,0,1);
				$real2=substr($preco,1,3);
				$centavos=substr($preco,4,2);
				$valor_formatado="R$ ".$real1.".".$real2.",".$centavos;
			}
			if($c==7){
				unset($real,$real1,$real2,$centavos);		
				$real1=substr($preco,0,2);
				$real2=substr($preco,2,3);
				$centavos=substr($preco,5,2);
				$valor_formatado="R$ ".$real1.".".$real2.",".$centavos;
			}
			if($c==8){
				unset($real,$real1,$real2,$centavos);		
				$real1=substr($preco,0,3);
				$real2=substr($preco,3,3);
				$centavos=substr($preco,6,2);
				$valor_formatado="R$ ".$real1.".".$real2.",".$centavos;
			}
			if($c==9){
				unset($real,$real1,$real2,$real3,$centavos);		
				$real1=substr($preco,0,1);
				$real2=substr($preco,1,3);
				$real3=substr($preco,4,3);
				$centavos=substr($preco,7,2);
				$valor_formatado="R$ ".$real1.".".$real2.".".$real3.",".$centavos;
			}



		echo $valor_formatado;
		unset($preco);
	}
?>
