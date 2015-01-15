

<?
//namespace Password;

class Password {

	public function validation($pawd)

	  {
	     if (strlen($pawd)<6)
           {
        	  echo "Password length is very short";
                  }
	      else {
	             return true;
	           }  
	           }
	    public function validationupp($pawd)
	         {        
	           if( !preg_match("#[A-Z]+#",$pawd))
                  {
            	    echo "please enter atleast one upper case character";
                        }
                          else       
                             {
       	                       return true;
                                   }      
                                   }
            public function validationspecial($pawd)
                {
                   if( !preg_match("#[\W]+#", $pawd) ) 
                        {
      	                 echo "please enter atleast one special character";
                            }
                             else   
                              {
                  	            return true;
                                 }      
                                 }
                public function validationnumber($pawd)
                      {
                        if(!preg_match("#[0-9]+#", $pawd))
                             {
      	                       echo "please enter atleast one number";
                                  }
                                    else
                                      {
                     	               return true;
                                             }
                                             }

                         public function validationcommon($pawd)
                              {
                                if(!preg_match("#[a-z/A-Z/0-9]+#", $pawd))

                                         {
                                            echo "please do not use common passwords enter a strong password ";
                                                }
                                                  else 
                                 	                 {
                                 		               return true;       
                                 		                }    
                }



                }                                     
 ?>