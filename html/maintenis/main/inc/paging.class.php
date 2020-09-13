<?php
class paging
{
	var $page_url_var = 'page';
	var $align_links_count = '8';
	var $records_per_page = 25;
	var $use_back_forward = true;
	var $back_link_icon = 'Previous'; // &laquo; = «
	var $fwd_link_icon  = 'Next'; // &raquo; = »

	var $use_first_last = true;
	var $active_page_class = 'paging_this_page';

	function assign ( $url , $total_records , $records_per_page = false  )
	{
		$this->total_records = $total_records;
		
		
		//If $records_per_page given
		//at function, use it
		if ( $records_per_page != false )
			$this->records_per_page = $records_per_page;
		
	
		//Which page at we are?
		$this->current_page = ( $_GET[$this->page_url_var] ) ? $_GET[$this->page_url_var] : '1';
		
		$this->check_page_is_int ( $this->current_page );
		

		//-------------------------------------
		//Check if the url is given correctly
		//if we're not using js onclick
		//-------------------------------------
		if ( ! eregi ( '^onclick=' , $url ) )
		{
			if ( ! ereg ( '\?' , $url ) )
				$url .= '?';
			elseif ( ereg ( '\?.+' , $url ) && ! ereg ( '&$' , $url ) )
				$url .= '&';
				
			$url .= $this->page_url_var . '=';
		}
		else
			$this->onclick = true;
			
		$this->url = $url;

		
		if ( $this->active_page_class )
			$this->active_page_class = ' class="'.$this->active_page_class.'" ';
			
		//Let's clear the html function
		//to not generate same codes again
		unset ( $this->html );
	}
	
	
	function fetch ()
	{
		//If already generated?
		if ( $this->html )
			return $this->html;
		

		//Let's run our functions to generate
		$this->generate_pages();
		$this->generate_html();

		return $this->html;
	}
	
	
	function generate_pages ()
	{
		
		//-------------------------
		//Find the true page count
		//-------------------------
		
		$page_count = $this->total_records / $this->records_per_page;
		
		if ( $page_count != intval ( $page_count ) )
			$page_count = intval ( $page_count ) + 1;
		
		#######


		
		//How many links do we want to show?
		//Let's check if the page count less
		//than the align_links_count
		$max_link = $page_count > $this->align_links_count ? $this->align_links_count : $page_count;

		
		//Make start and end page equal first
		$start_page = $this->current_page;
		$end_page = $this->current_page;

		
		//Now start start_page decreasing
		//and end page increasing
		while ( $max_link > '0' )
		{			
			$looped = false;
			
			if ( $end_page < $page_count )
			{
				$end_page++;
				$max_link--;
				$looped = true;
			}
			
			if ( $start_page > '1' && $max_link != '0' )
			{
				$start_page--;
				$max_link--;
				$looped = true;
			}

			if ( $looped == false )
				break;
		}

		
		//---------------------------------
		//Let's make the page number links
		//From start page to end page
		//---------------------------------
		$i = $start_page;
		
		while ( $i <= $end_page )
		{
			if ( $i != $this->current_page )
			{
				$pagearray[] = $this->generate_link ( $i , $i, 'fg-button ui-button ui-state-default' ) ;
			}
			else
				$pagearray[] = $this->generate_link ( $i , $i, 'fg-button ui-button ui-state-default ui-state-disabled' ) ;
			$i++;
		}
		
		#######
		
		
		
		//Do we want to use first and last page links?
		if ( $this->use_first_last == true )
		{		
			
			//Just make the first page url if we need
			if ( $this->current_page > 1 )
			{
				$this->page_first = $this->generate_link ( 'First' , '1','first ui-corner-tl ui-corner-bl fg-button ui-button ui-state-default' )  ;
			} else {
				$this->page_first = $this->generate_link ( 'First' , '1','first ui-corner-tl ui-corner-bl fg-button ui-button ui-state-default ui-state-disabled' )  ;
			}
			
			//Just make the last page url if we need
			if ( $this->current_page < $page_count  )
			{
				$this->page_last = $this->generate_link ( 'Last' , $page_count,'last ui-corner-tr ui-corner-br fg-button ui-button ui-state-default' ) ;
			} else {				
				$this->page_last = $this->generate_link ( 'Last' , $page_count,'last ui-corner-tr ui-corner-br fg-button ui-button ui-state-default ui-state-disabled' ) ;
				
			}
		}
			
		//Do we want to use back and forward links?
		if ( $this->use_back_forward == true )
		{
			//Let's make "back" « link
			//if page is not the first
			if ( $this->current_page != '1' )
				$this->page_back = $this->generate_link ( $this->back_link_icon , $this->current_page - 1,'previous fg-button ui-button ui-state-default' ) . ' ' ;
				
			else $this->page_back = $this->generate_link ( $this->back_link_icon , $this->current_page,'previous fg-button ui-button ui-state-default ui-state-disabled' );
		
			
			//Let's make "forward" » link
			//if page is not the last
			if ( $this->current_page < $page_count )
				$this->page_fwd = ' ' . $this->generate_link ( $this->fwd_link_icon , $this->current_page + 1,'next fg-button ui-button ui-state-default' ) ;
			else $this->page_fwd = ' ' . $this->generate_link ( $this->fwd_link_icon , $this->current_page,'next fg-button ui-button ui-state-default ui-state-disabled' ) ;
		}
		
		
		//Let's make them global class variable
		$this->page_count = $page_count;
		$this->pagearray = $pagearray;
	
	}
	
	function generate_html ()
	{
		$html = implode ( ' ' , $this->pagearray );
		$html = $this->page_first . ' ' . $this->page_back . $html . $this->page_fwd . ' ' . $this->page_last;		
		$this->html = $html;
	}
	
	function generate_link ( $inner, $page_number, $class = '' )
	{
		//If we are using the js onclick
		if ( $this->onclick == true )
		{
			$onclick = ' ' . str_replace ( '[:page:]' , $page_number , $this->url );
			$url = '#';
		}
		//If not
		else
			$url = $this->url .  $page_number;

		if (strlen($class)>0){
			$class_code = 'class="'.$class.'"';
		} else $class_code = '';
		//that's the line, i did all codes for :)
		$link = '<a href="'.$url.'"'.$onclick.' '.$class_code.'>'.$inner.'</a>';
		
		return $link;
	}

	function check_page_is_int ( $current_page )
	{
		if ( ! ereg ( '^[0-9]+$' , $current_page ) )
			die ( 'Page number is not integer.' );
	}
	
	function sql_limit ( $records_per_page = false )
	{
		$current_page = ( $this->current_page ) ? $this->current_page : $_GET[$this->page_url_var];	
		$this->check_page_is_int ( $current_page );
		$records_per_page = ( $records_per_page == false ) ? $this->records_per_page : $records_per_page;
		$limit_start = ( $current_page - 1 ) * $records_per_page;
		$sql = $limit_start . ',' . $records_per_page;
		return $sql;
	}	
	
}