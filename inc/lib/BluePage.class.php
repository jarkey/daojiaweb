<?php
/*

* ----------------------------------------------------
* ID     : BluePage.class
* Author : DJ <DJ@Bluessoft.com>
* ----------------------------------------------------
* Homepage: http://www.bluessoft.com/project/bluepage
* ----------------------------------------------------

*
*/

if ( ! class_exists ( "BluePage" ) )
{
    class BluePage
    {
    	var $_total ;               // ��¼����
    	var $_col ;                 // ÿҳ��ʾ��
    	var $_var     = 'page' ;    // ��ҳ��������Ĭ����page�����޸�Ϊ�����õı����� 	
    	var $_tvar    = 'total' ;   // ��¼����������
    	var $_setotal = true ;      // �Ƿ��Զ�����¼������ֵ��GET����
    	var $_pos     = 3 ;         // ��ǰҳ�ڷ�ҳ���е�λ��
    	var $_hide    = true ;      // �Ƿ������ظ���ҳ
    	var $_prefix  = '' ;        // ��ҳֵ��ǰ��,���� p123�е�p
    	var $_postfix = '' ;        // ��ҳֵ�ĺ���,���� 123p�е�p
    	var $_symbol  = '&' ;       // &��&amp;
    	var $_encode  = true ;      // �Ƿ��query string����
  	    
  	    var $_getlink = true ;      // �Ƿ�������
  	    var $_getqs   = true ;      // �Ƿ�ȡQuery String
  	    var $_qs      = '' ;        // Query String
  	    
  	    var $_order = 't|f|pg|p|bar|n|ng|m|i' ;       // html����Ϸ�ʽ���μ������ļ�
  	    var $_full  = 't|f|pg|p|bar|n|ng|m|sl|i' ;    // Full
  	    var $_file  = 'BluePage.default.inc.php' ;    // Ĭ�Ϸ�ҳhtml�����ļ�����Ҫ��Pager.class.phpͬ·��
    	
		/*
		����˵��:
		$nNum     ��ʾ���ٸ�ҳ��
		
		����:
		$aPDatas['offset']   offset
		$aPDatas['m']        ��ҳ(���ҳ)��
		$aPDatas['m_ln']     ��ҳ(���ҳ)�� ����  ��Ҫ$this->_getlink = true  ������ͬ
		$aPDatas['f_ln']     ��ҳ����
		$aPDatas['t']        ��ǰҳ��
		$aPDatas['p']        ��һҳҳ��
		$aPDatas['p_ln']     ��һҳ ����
		$aPDatas['n']        ��һҳ
		$aPDatas['n_ln']     ��һҳ ����
		$aPDatas['ng']       ��һ��ҳ��
		$aPDatas['ng_ln']    ��һ������
		$aPDatas['qs']       Query String ?�ź��沿�ݣ���Ҫ$this->_getqs = true ;
		
		��$this->_getlink = false ʱ:
		$aPDatas['bar']      ��ҳ����һά����
		��$this->_getlink = true ʱ:
		$aPDatas['bar']      ��ά���飬$aPDatas['bar'][num'] ��ҳ����   $aPDatas['bar'][ln'] ��ҳ����
		*/
    	function get( $nTotal , $nCol , $nNum = 10 )
    	{
    		$this->_total = intval ( $nTotal ) ;
    		$this->_col   = intval ( $nCol ) ;
			$aPDatas = array( ) ;
   			if ( isset( $_REQUEST[$this->_var] ) )
   			{
   				( $nThisPage = $this->getPage( $_REQUEST[$this->_var] ) ) > 1  
				? $aPDatas['t'] = $nThisPage 
				: $aPDatas['t'] = $nThisPage = 1 ;
   			}
			else
			{
				$aPDatas['t'] = $nThisPage = 1 ;
			}

		    if ( $this->_total < 1 || $this->_col < 1 )
		    {
		        $aPDatas['offset'] = 0 ;
		        $aPDatas['t'] = $aPDatas['m'] = $aPDatas['p'] = $aPDatas['n'] = 1 ;
		    }
		    else
		    {
			    $aPDatas['offset']   = $this->_col * ( $nThisPage - 1 ) ; 
			    $aPDatas['m']  = ceil ( $this->_total / $this->_col ) ;
			    $aPDatas['p']  = $nThisPage < 2 ? 1 : $nThisPage - 1 ;
			    $aPDatas['n'] = $nThisPage == $aPDatas['m'] ? $aPDatas['m']  : $nThisPage + 1 ;
		    }
		    
		    if ( $this->_getlink )
		    {
		    	$this->getQueryString () ;
		    	$aPDatas['m_ln']  = $this->setLink( $aPDatas['m'] ) ;
		        $aPDatas['p_ln']  = $this->setLink( $aPDatas['p'] ) ;
		        $aPDatas['n_ln']  = $this->setLink( $aPDatas['n'] ) ;
		        $aPDatas['f_ln']  = $this->setLink( 1 ) ;
		    }
		    $nNum = $nNum == 'all' ? $aPDatas['m'] :  intval ( $nNum ) ;

		    if ( $nNum ) 
		    {
			    $nSPage = ( $nSsPage = $nThisPage + 1 - $this->_pos ) < 1 ? 1 : $nSsPage ;
			    if ( $nSPage + $nNum > $aPDatas['m'] ) 
			    { 
			    	$nSPage = ( $nSsPage = $aPDatas['m'] - $nNum + 1 ) < 1 ? 1 : $nSsPage ;
			    }
			    $nEPage = ( $nEsPage = $nSPage + $nNum - 1 ) > $aPDatas['m'] 
			              ? $aPDatas['m'] : $nEsPage ; 
			    $aPDatas['pg']  = ( $nPGroup = $nThisPage - $nNum ) > 1 ?  $nPGroup  : 1 ;
			    $aPDatas['ng']  = ( $nNGroup = $nThisPage + $nNum ) < $aPDatas['m'] ? $nNGroup : $aPDatas['m'] ;
			    
			    $arrPageBar = array ( ) ; 
			    if ( $this->_getlink ) 
			    {
			    	$aPDatas['pg_ln'] = $this->setLink( $aPDatas['pg'] ) ; 
			    	$aPDatas['ng_ln'] = $this->setLink( $aPDatas['ng'] ) ;
			    	$k = 0 ;
			    	for ( $i = $nSPage ; $i <= $nEPage ; $i++ ) 
				    {
				        $arrPageBar[$k]['num']  = $i ;
				        $arrPageBar[$k]['ln'] = $this->setLink( $i ) ;
				        $k++ ;
				    }
			    }
			    else
			    {
				    for ( $i = $nSPage ; $i <= $nEPage ; $i++ ) 
				    {
				        $arrPageBar[] = $i ;
				    }
				}
			    $aPDatas['bar']  = $arrPageBar ;
			}
			if ( $this->_getqs )
			{
				if ( !$this->_qs )
				{
		    	    $this->getQueryString() ;
		    	    $aPDatas['qs'] = $this->_qs ;
		    	}
		    	else
		    	{
		    		$aPDatas['qs'] = $this->_qs ;
		    	}
			}
		    return $aPDatas ;
    	}
    	
    	function getFull( $aPDatas , $strHtmlFile = '' )
    	{
    		$this->_order = $this->_full ;
    		return $this->getHTML( $aPDatas , $strHtmlFile ) ;
    	}
    	
    	function getHTML( $aPDatas , $strHtmlFile = '' )
    	{
    	    if ( $strHtmlFile == '' )
    	    {
    	    	$strHtmlFile = str_replace("\\" , "/", dirname( __FILE__ ) ) . '/'. $this->_file  ;
    	    };
    		if ( file_exists ( $strHtmlFile ) )
    		{
    			include ( $strHtmlFile ) ; 
    			$aPA = explode( "|" , $this->_order ) ; 
    			if ( is_array( $aPA )  ) 
    			{
    				$strHtmlBody = '' ;
    				foreach ( $aPA as $nPAkey )
    				{
    					switch ( $nPAkey )
    					{
    						case 't' : 
    							$strHtmlBody .= sprintf( $PA['t'] , $this->_total ) ;
    						    break ;
    						case 'm' :
    							if ( $aPDatas['t'] != $aPDatas['m'] or !$this->_hide )   				
    						    	$strHtmlBody .= sprintf( $PA['m'] , $aPDatas['m_ln'] , $aPDatas['m'] ) ;

    							break ;
    						case 'f' :
    							if ( $aPDatas['t'] != 1  or !$this->_hide )
    						    $strHtmlBody .= sprintf( $PA['f'] , $this->setLink(1) ) ;
    							break ;
    						case 'pg' :
    						    if ( $aPDatas['t'] > $this->_pos  or !$this->_hide ) 
    						    $strHtmlBody .= sprintf( $PA['pg'] , $aPDatas['pg_ln'] ) ;
    							break ;
    						case 'p' :
    						    if ( $aPDatas['t'] > 1 or !$this->_hide ) $strHtmlBody .= sprintf( $PA['p'] , $aPDatas['p_ln'] ) ;
    							break ;
    						case 'bar' :
    						    $strBar = '' ;
    						    foreach ( $aPDatas['bar'] AS $aPBar ) 
    						    {
    						    	if ( $aPBar['num'] == $aPDatas['t'] )
    						    	{
    						    		$strBar .=  sprintf( $PA['bar_cur'] , $aPBar['num'] ) ;
    						    	}
    						    	else
    						    	{
    						    		$strBar .= sprintf( $PA['bar'] , $aPBar['ln'] , $aPBar['num'] ) ;
    						    	}
    						    }
    						    $strHtmlBody .= $strBar ;
    							break ;
    						case 'ng' :
    							if ( ( $aPDatas['t'] < $aPDatas['m'] + $this->_pos  - sizeof( $aPDatas['bar']) ) or !$this->_hide )
    						    	$strHtmlBody .= sprintf( $PA['ng'] , $aPDatas['ng_ln'] ) ;
    							break ;
    						case 'n' :
    							if ( $aPDatas['t'] < $aPDatas['m'] or !$this->_hide )
    						    $strHtmlBody .= sprintf( $PA['n'] , $aPDatas['n_ln'] ) ;
    							break ;
    						case 'sl':
    						    $strHtmlBody .= $this->getSlection ( $aPDatas['m'] , $PA['sl_head'] , $PA['sl'] , $PA['sl_end'] ) ;
    						    break ;
    						case 'i':
    						    $strHtmlBody .= sprintf( $PA['i'] , $aPDatas['qs'] , $this->_var, $this->_prefix , $this->_postfix ) ;
    						    break ;
    					}
    				}
    				return $PA['head'].$strHtmlBody.$PA['end'] ;
    			}
    		}
    		
            return '' ;
    	}
    	
    	function getPage( $mxPage ) 
    	{
    		if ( $this->_prefix )  $mxPage = str_replace( $this->_prefix  , '' , $mxPage ) ;
    		if ( $this->_postfix ) $mxPage = str_replace( $this->_postfix , '' , $mxPage ) ;
    		return intval( $mxPage ) ;
    	}
    	
    	function setLink( $nPage )
    	{
    		if ( $this->_setotal && !isset( $_REQUEST[$this->_tvar] ) )
    		{
    			$strLink = $this->_qs ? '?' . $this->_tvar . '=' . $this->_total . $this->_symbol . $this->_qs . $this->_var . '=' . $this->_prefix . $nPage . $this->_postfix 
    		                          : '?' . $this->_tvar . '=' . $this->_total . $this->_symbol . $this->_var . '=' . $this->_prefix . $nPage . $this->_postfix ; 
    		}
    		else
    		{
    			$strLink = $this->_qs ? '?' . $this->_qs . $this->_var . '=' . $this->_prefix . $nPage . $this->_postfix 
    		                           : '?' . $this->_var . '=' . $this->_prefix . $nPage . $this->_postfix ; 
    		}

    		return $strLink ;
    	}
    	
    	function getSlection ( $nMaxPage , $strSLHead , $strSL , $strSLEnd )
    	{
    		$nMax = intval ( $nMaxPage ) ; 
    		if ($nMax < 1 ) return;
    		if ( isset($_REQUEST[$this->_var]))
    		{
    			$nThisPage = $this->getPage( $_REQUEST[$this->_var] ) ;
    			if ( $nThisPage < 1 ) $nThisPage = 1 ; 
    			if ( $nThisPage > $nMax ) $nThisPage = $nMax ;
    		}
    		else
    		{
    			$nThisPage = 1 ;
    		}
						
			$strSLBODY = '' ;
			for ( $i = 1 ; $i<= $nMax ; $i++ )
			{
		        $strSLBODY .= sprintf( $strSL , $this->_qs , $this->_var , $this->_prefix ,  $this->_postfix , $i  ) ;
			}
			$strPattern = '/(\>' . $nThisPage . '<\/option>)/i' ;
			preg_match_all( $strPattern, $strSLBODY , $arrResult );
			$strSLBODY = str_replace( $arrResult[1][0], " selected " . $arrResult[1][0],$strSLBODY ) ;
			return $strSLHead . $strSLBODY . $strSLEnd  ;

    	}
    	
    	function getQueryString( )
    	{
    		$strPagepattern = '/('.$this->_var.'=('.$this->_prefix.')\d{0,}('.$this->_postfix.'))/' ;
 
		    preg_match_all( $strPagepattern, $_SERVER["QUERY_STRING"] , $arrResult );
		    if ( $arrResult[1] )
		    {
		    	$strQueryString = $arrResult[1][0] ? str_replace( "&".$arrResult[1][0] , "" , $_SERVER["QUERY_STRING"] ) : $_SERVER["QUERY_STRING"];
		    	$strQueryString = str_replace( $arrResult[1][0] , "" , $strQueryString ) ; 
		    }
		    else
		    {
		    	$strQueryString = $_SERVER["QUERY_STRING"] ;
		    }
		    
		    if ( $strQueryString ) 
		    {
		    	$strQueryString = $this->_encode ? htmlspecialchars($strQueryString).$this->_symbol : $strQueryString.$this->_symbol ;
		    } 
		    $this->_qs =  $strQueryString  ;
		    return true ;
    	}
    	
    	/*
    	//����mysqlȡ��¼���ĺ���
		function myGetCount( $strQuery , $rsConn )
		{
		    $resResult = @mysql_query ( $strQuery , $rsConn ) ;
		    while ( $arrRow = @mysql_fetch_row ( $resResult ) ) 
		    {
		        $nCount = $arrRow[0] ; 
		    }
		    @mysql_free_result( $resResult ) ;
		    return intval( $nCount ) ;
		}
		
		//����SQLserverȡ��¼���ĺ���
		function msGetCount( $strQuery , $rsConn )
		{
		    $resResult = @mssql_query ( $strQuery , $rsConn ) ;
		    while ( $arrRow = @mssql_fetch_row ( $resResult ) ) 
		    {
		        $nCount = $arrRow[0] ; 
		    }
		    @mssql_free_result( $resResult ) ;
		    return intval( $nCount ) ;
		}
    	*/
    }
}
?>